<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use App\Mail\EnquirySubmitted;
use App\Mail\NewArchitectEnquiryMail;
use App\Mail\NewEnquiryMail;
use App\Mail\NewProductEnquiryMail;
use App\Mail\ProductEnquirySubmitted;
use App\Models\ArchitectEnquiry;
use App\Models\Product;
use App\Models\ProductEnquiry;
use App\Models\SellerDomain;
use App\Models\SellerEnquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Mpdf\Mpdf;

class BasicController extends Controller
{
    public function index()
    {
        $sellers = User::role('Seller')->whereHas('seller', function ($q) {
            $q->whereNotNull('warehouse_image')->orWhereNotNull('office_image')->orWhereNotNull('logo');
        })->with('seller')->latest()->take(5)->get();
        $architects = User::role('Architect')->whereHas('architect', function ($q) {
            $q->WhereNotNull('logo');
        })->with('architect')->latest()->take(5)->get();

        return view('website.index', compact('sellers', 'architects'));
    }

    public function error404()
    {
        return view('errors.404');
    }

    public function sellers()
    {
        $sellers = User::role('Seller')->whereHas('seller', function ($q) {
            $q->whereNotNull('warehouse_image')->orWhereNotNull('office_image')->orWhereNotNull('logo');
        })->with('seller')->paginate(12);
        return view('website.sellers', compact('sellers'));
    }

    public function seller($id)
    {
        $seller = User::with(['seller'])->findOrFail($id);
        $sellerGallery = $seller->sellerGallery->groupBy('type')->map(function ($group) {
            return $group->take(3);
        });
        $sellerProducts = $seller->products()->inRandomOrder()->take(10)->get();
        return view('website.seller-details', compact('seller', 'sellerGallery', 'sellerProducts'));
    }

    public function sellerGallery($id){
        $seller = User::find($id);
        $sellerGallery = $seller->sellerGallery->groupBy('type');
        return view('website.seller-gallery', compact('seller', 'sellerGallery'));
    }

    public function sellerProducts($id, Request $request)
    {
        $seller = User::with(['seller', 'sellerDomains'])->findOrFail($id);
        if ($request->sub_category) {
            $products = Product::where('seller_subcategory_id', $request->sub_category)->paginate(9);
        } else if ($request->color && $request->domain) {
            $domain = SellerDomain::find($request->domain);
            $products = $domain->products()->where('color', $request->color)->paginate(9);
        } else {
            $products = $seller->products()->paginate(9);
        }
        return view('website.seller-products', compact('seller', 'products'));
    }

    public function downloadCatalogue($id)
    {
        $product = Product::with(['subcategory.domain.user.seller'])->find($id);

        $html = view('catalogue.product', compact('product'))->render();
        // dd($html);

        $mpdf = new Mpdf([
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_left' => 0,
            'margin_right' => 0,
            'orientation' => 'L',
            'tempDir' => public_path('app/mpdf'),
        ]);

        $mpdf->setBasePath(public_path());
        $mpdf->WriteHTML($html);
        return $mpdf->Output('catalogue.pdf', 'D');
    }

    public function saveSellerEnquiry(Request $request)
    {
        try {
            $data = $request->validate([
                'user_id' => 'required|exists:users,id',
                'name' => 'required',
                'phone' => 'required|numeric|digits:10',
                'email' => 'nullable',
                'type' => 'required',
                'message' => 'required',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed',
            ], 400);
        }

        $enquiry = SellerEnquiry::create($data);

        if ($enquiry->email) {
            Mail::to($enquiry->email)->send(new EnquirySubmitted($enquiry));
        }
        $admins = User::role('Admin')->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NewEnquiryMail($enquiry));
        }

        return response()->json([
            'status' => true,
            'message' => 'Enquiry submitted successfully! Team will connect with you soon.',
        ]);
    }

    public function productDetails($id)
    {
        $product = Product::with('subcategory.domain.user.seller')->find($id);
        $seller = $product->subcategory->domain->user;

        return view('website.product-details', compact('product', 'seller'));
    }

    public function saveProductEnquiry(Request $request)
    {
        try {
            $data = $request->validate([
                'product_id' => 'required|exists:products,id',
                'name' => 'required',
                'phone' => 'required|numeric|digits:10',
                'email' => 'nullable',
                'state' => 'required',
                'city' => 'required',
                'message' => 'required',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed',
            ], 400);
        }

        $enquiry = ProductEnquiry::create($data);

        if ($enquiry->email) {
            Mail::to($enquiry->email)->send(new ProductEnquirySubmitted($enquiry));
        }
        $admins = User::role('Admin')->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NewProductEnquiryMail($enquiry));
        }

        return response()->json([
            'status' => true,
            'message' => 'Enquiry submitted successfully! Team will connect with you soon.',
        ]);
    }

    public function architects()
    {
        $architects = User::role('Architect')->whereHas('architect', function ($q) {
            $q->whereNotNull('logo');
        })->with('architect')->paginate(12);
        return view('website.architects', compact('architects'));
    }

    public function architect($id)
    {
        $architect = User::with(['architect'])->findOrFail($id);
        $architectGallery = $architect->architectGallery->groupBy('type')->map(function ($group) {
            return $group->take(3);
        });
        return view('website.architect-details', compact('architect', 'architectGallery'));
    }

    public function saveArchitectEnquiry(Request $request)
    {
        try {
            $data = $request->validate([
                'user_id' => 'required|exists:users,id',
                'name' => 'required',
                'phone' => 'required|numeric|digits:10',
                'email' => 'required',
                'message' => 'required',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed',
            ], 400);
        }

        $enquiry = ArchitectEnquiry::create($data);

        if ($enquiry->email) {
            Mail::to($enquiry->email)->send(new EnquirySubmitted($enquiry));
        }
        $admins = User::role('Admin')->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NewArchitectEnquiryMail($enquiry));
        }

        return response()->json([
            'status' => true,
            'message' => 'Enquiry submitted successfully! Team will connect with you soon.',
        ]);
    }

}
