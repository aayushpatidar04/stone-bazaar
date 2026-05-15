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
use App\Models\Query;
use App\Models\SellerDomain;
use App\Models\SellerEnquiry;
use App\Models\SubscriptionPlan;
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
        })->whereHas('seller', function ($q) {
            $q->where('is_featured', 1);
        })->with('seller')->get();
        $architects = User::role('Architect')->whereHas('architect', function ($q) {
            $q->WhereNotNull('logo');
        })->whereHas('architect', function ($q) {
            $q->where('is_featured', 1);
        })->with('architect')->get();

        return view('website.index', compact('sellers', 'architects'));
    }

    public function error404()
    {
        return view('errors.404');
    }

    public function sellers()
    {
        $featureds = User::role('Seller')->whereHas('seller', function ($q) {
            $q->whereNotNull('warehouse_image')->orWhereNotNull('office_image')->orWhereNotNull('logo');
        })->whereHas('seller', function ($q) {
            $q->where('is_featured', 1);
        })->with('seller')->get();
        $sellers = User::role('Seller')->whereHas('seller', function ($q) {
            $q->whereNotNull('warehouse_image')->orWhereNotNull('office_image')->orWhereNotNull('logo');
        })->with('seller')->paginate(12);
        return view('website.sellers', compact('sellers', 'featureds'));
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

    public function sellerGallery($id)
    {
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
                'name' => 'required|string|max:100',
                'phone' => 'required|numeric|digits:10',
                'email' => 'nullable|email',
                'city' => 'required|string|max:100',
                'project_type' => 'required|string',
                'stone_requirement' => 'required|string',
                'quantity' => 'required|string|max:100',
                'budget_range' => 'required|string|max:100',
                'color_design' => 'required|string|max:100',
                'delivery_location' => 'required|string',
                'urgency' => 'required|string',
                'message' => 'nullable|string',
                'reference_image' => 'nullable|file|image|max:5120', // 5MB
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed',
            ], 400);
        }

        // Handle file upload if present
        if ($request->hasFile('reference_image')) {
            $file = $request->file('reference_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('enquiry_images'), $filename);
            $data['reference_image'] = 'enquiry_images/' . $filename;
        }

        $data['type'] = $data['project_type'];
        // Default status
        $data['status'] = 'pending';

        $enquiry = SellerEnquiry::create($data);

        // Notify customer if email provided
        if (!empty($enquiry->email)) {
            Mail::to($enquiry->email)->send(new EnquirySubmitted($enquiry));
        }

        // Notify admins
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

    public function architectGallery($id)
    {
        $architect = User::find($id);
        $architectGallery = $architect->architectGallery->groupBy('type');
        return view('website.architect-gallery', compact('architect', 'architectGallery'));
    }

    public function architectCatalogue($id)
    {
        $architect = User::with(['architect', 'architectGallery'])->find($id);

        $html = view('catalogue.architect', compact('architect'))->render();
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

    public function saveArchitectEnquiry(Request $request)
    {
        try {
            $data = $request->validate([
                'user_id' => 'required|exists:users,id',
                'name' => 'required|string|max:100',
                'phone' => 'required|numeric|digits:10',
                'email' => 'nullable|email',
                'city' => 'required|string|max:100',
                'project_type' => 'required|string',
                'property_type' => 'required|string',
                'project_area' => 'nullable|string|max:100',
                'project_status' => 'nullable|string|max:50',
                'budget_range' => 'nullable|string|max:100',
                'services_required' => 'required|string',
                'scope_of_work' => 'nullable|array',
                'scope_of_work.*' => 'string',
                'design_preference' => 'nullable|string|max:100',
                'requirements' => 'nullable|string|max:500',
                'preferred_time' => 'nullable|string|max:50',
                'referral_source' => 'nullable|string|max:100',
                'reference_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
                'message' => 'nullable|string|max:500',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed',
            ], 400);
        }

        // Handle file upload
        if ($request->hasFile('reference_file')) {
            $file = $request->file('reference_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('architect_enquiries'), $filename);
            $data['reference_file'] = 'architect_enquiries/' . $filename;
        }

        // Convert scope_of_work array to JSON
        if (!empty($data['scope_of_work'])) {
            $data['scope_of_work'] = json_encode($data['scope_of_work']);
        }

        // Default status
        $data['status'] = 'pending';

        $enquiry = ArchitectEnquiry::create($data);

        // Notify customer if email provided
        if (!empty($enquiry->email)) {
            Mail::to($enquiry->email)->send(new EnquirySubmitted($enquiry));
        }

        // Notify admins
        $admins = User::role('Admin')->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new NewArchitectEnquiryMail($enquiry));
        }

        return response()->json([
            'status' => true,
            'message' => 'Enquiry submitted successfully! Team will connect with you soon.',
        ]);
    }


    public function contact()
    {
        return view('website.contact');
    }

    public function submitContactForm(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'company_name' => 'nullable',
                'email' => 'required|email',
                'phone' => 'required|numeric|digits:10',
                'vendor_category' => 'nullable',
                'message' => 'required',
            ]);

            $data['status'] = 'pending';

        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed',
            ], 400);
        }

        $query = Query::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Query submitted successfully! Team will connect with you soon.',
        ]);
    }

    public function plans()
    {
        $plans = SubscriptionPlan::all();
        return view('website.plans', compact('plans'));
    }
}
