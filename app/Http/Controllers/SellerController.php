<?php

namespace App\Http\Controllers;

use App\LogModelChanges;
use App\Models\ChangeLog;
use App\Models\Product;
use App\Models\ProductEnquiry;
use App\Models\SellerAward;
use App\Models\SellerCertificate;
use App\Models\SellerDomain;
use App\Models\SellerEnquiry;
use App\Models\SellerGallery;
use App\Models\SellerSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{
    protected array $middleware = [
        'auth',
        'role:Seller',
    ];

    public function verificationStatus()
    {
        $seller = Auth::user()->seller;

        $gstLog = ChangeLog::where('table_name', 'sellers')->where('row_id', $seller->id)->where('column_name', 'gst_verification')->latest('created_at')->first();

        $locationLog = ChangeLog::where('table_name', 'sellers')->where('row_id', $seller->id)->where('column_name', 'location_verification')->latest('created_at')->first();

        $statusLog = ChangeLog::where('table_name', 'sellers')->where('row_id', $seller->id)->where('column_name', 'status')->latest('created_at')->first();

        return view('dashboard.seller.verification-status', compact('seller', 'gstLog', 'locationLog', 'statusLog'));
    }

    public function index()
    {
        return view('dashboard.seller.index');
    }

    public function updateBanner(Request $request)
    {
        $request->validate([
            'banner_image' => 'required|image|max:2048', // max 2MB
        ]);

        $seller = Auth::user()->seller;

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/seller_banners'), $filename);

            // Update seller's banner image path
            $seller->banner = asset('uploads/seller_banners/' . $filename);
            $seller->save();

            return response()->json(['success' => true, 'message' => 'Banner image updated successfully.', 'new_image_url' => $seller->banner], 200);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.'], 200);
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|max:2048', // max 2MB
        ]);

        $seller = Auth::user()->seller;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/seller_logos'), $filename);

            // Update seller's logo image path
            $seller->logo = asset('uploads/seller_logos/' . $filename);
            $seller->save();

            return response()->json(['success' => true, 'message' => 'Logo image updated successfully.', 'new_logo_url' => $seller->logo], 200);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.'], 200);
    }

    public function updateOfficeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // max 2MB
        ]);

        $seller = Auth::user()->seller;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'office_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/seller_office_images'), $filename);

            // Update seller's logo image path
            $seller->office_image = asset('uploads/seller_office_images/' . $filename);
            $seller->save();

            return response()->json(['success' => true, 'message' => 'Office image updated successfully.', 'new_image_url' => $seller->office_image], 200);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.'], 200);
    }

    public function updateWarehouseImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // max 2MB
        ]);

        $seller = Auth::user()->seller;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'warehouse_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/seller_warehouse_images'), $filename);

            // Update seller's logo image path
            $seller->warehouse_image = asset('uploads/seller_warehouse_images/' . $filename);
            $seller->save();

            return response()->json(['success' => true, 'message' => 'Warehouse image updated successfully.', 'new_image_url' => $seller->warehouse_image], 200);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.'], 200);
    }

    public function updateAbout(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|digits:10',
            'business_name' => 'required|string|max:255',
            'years_of_experience' => 'nullable|numeric|min:0|max:100',
            'website' => 'nullable|url|max:255',
            'about' => 'nullable|string|max:2000',
        ]);

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');
        $user->seller->business_name = $request->input('business_name');
        $user->seller->years_of_experience = $request->input('years_of_experience');
        $user->seller->website = $request->input('website');
        $user->seller->about = $request->input('about');

        $user->seller->save();
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Details updated successfully!',
            'user' => $user,
        ]);
    }

    public function updateDescription(Request $request)
    {

        $request->validate([
            'description' => 'nullable|string',
        ]);

        $user = Auth::user();

        $user->seller->description = $request->input('description');

        $user->seller->save();

        return response()->json([
            'status' => true,
            'message' => 'Description updated successfully!',
            'user' => $user,
        ]);
    }

    public function addAwards(Request $request)
    {
        $request->validate([
            'name'   => 'required|array|min:1',
            'name.*' => 'required|string|max:255',
            'image'  => 'required|array|min:1',
            'image.*' => 'required|image|max:2048',
        ]);

        foreach ($request->name as $index => $awardName) {
            $file = $request->image[$index];

            $filename = 'award_' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/seller_awards'), $filename);

            // Save award details
            $sellerAward = new SellerAward();
            $sellerAward->user_id = Auth::id();
            $sellerAward->name = $awardName;
            $sellerAward->image = asset('uploads/seller_awards/' . $filename);
            $sellerAward->save();
        }

        return response()->json([
            'status'  => true,
            'message' => 'Awards added successfully',
            'awards' => $sellerAward->where('user_id', Auth::id())->latest()->take(count($request->name))->get()
        ]);
    }

    public function deleteAward(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:seller_awards,id',
        ]);

        $award = SellerAward::find($request->id);

        $relativePath = str_replace(url('/'), '', $award->image);

        $fullPath = public_path($relativePath);
        

        if (file_exists($fullPath)) { 
            unlink($fullPath); 
        } 
        $award->delete();

        return response()->json([
            'status' => true,
            'message' => 'Award deleted successfully!',
        ]);
    }

    public function addCertificates(Request $request)
    {
        $request->validate([
            'name'   => 'required|array|min:1',
            'name.*' => 'required|string|max:255',
            'image'  => 'required|array|min:1',
            'image.*' => 'required|image|max:2048',
        ]);

        foreach ($request->name as $index => $certificateName) {
            $file = $request->image[$index];

            $filename = 'certificate_' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/seller_certificates'), $filename);

            // Save certificate details
            $sellerCertificate = new SellerCertificate();
            $sellerCertificate->user_id = Auth::id();
            $sellerCertificate->name = $certificateName;
            $sellerCertificate->image = asset('uploads/seller_certificates/' . $filename);
            $sellerCertificate->save();
        }

        return response()->json([
            'status'  => true,
            'message' => 'Certificates added successfully',
            'certificates' => $sellerCertificate->where('user_id', Auth::id())->latest()->take(count($request->name))->get()
        ]);
    }

    public function deleteCertificate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:seller_certificates,id',
        ]);

        $certificate = SellerCertificate::find($request->id);

        $relativePath = str_replace(url('/'), '', $certificate->image);

        $fullPath = public_path($relativePath);
        

        if (file_exists($fullPath)) { 
            unlink($fullPath); 
        } 

        $certificate->delete();

        return response()->json([
            'status' => true,
            'message' => 'Certificate deleted successfully!',
        ]);
    }

    public function uploadGallery(Request $request){
        $request->validate([
            'images'      => 'required|array|min:1',
            'images.*'    => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type'        => 'required|array|min:1',
        ]);

        if ($request->has('images')) {
            foreach ($request->file('images') as $index => $imageFile) {
                if ($imageFile) {
                    // Generate unique filename
                    $filename = time() . '_' . $index . '.' . $imageFile->getClientOriginalExtension();

                    // Move file to public/uploads/product_images
                    $imageFile->move(public_path('uploads/seller_gallery'), $filename);

                    // Build full URL
                    $imageUrl = url('uploads/seller_gallery/' . $filename);

                    // Get type from request (type[0], type[1], etc.)
                    $type = $request->input("type.$index");

                    $image = SellerGallery::create([
                        'user_id' => Auth::id(),
                        'type' => $type,
                        'image' => $imageUrl,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Photos uploaded successfully!');

    }

    public function gallery(){
        $seller = Auth::user();
        $images = $seller->sellerGallery()->latest()->paginate(9);

        return view('dashboard.seller.gallery', compact('seller', 'images'));
    }

    public function deleteGallery($id){
        $gallery = SellerGallery::findOrFail($id); // Build full path from the stored URL 

        $imageUrl = $gallery->image;
        $relativePath = str_replace(url('/'), '', $imageUrl);

        $fullPath = public_path($relativePath);
        

        if (file_exists($fullPath)) { 
            unlink($fullPath); 
        } 

        $gallery->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image deleted successfully!',
        ]);
    }

    public function products($domainId = null, $subcategoryId = null)
    {
        $query = SellerDomain::with(['subCategories.products'])->where('user_id', Auth::id());

        // If domain is passed
        if ($domainId) {
            $query->where('id', $domainId);
        }

        $domains = $query->get();

        // If subcategory is passed, filter products of that subcategory only
        if ($subcategoryId) {
            $domains->each(function ($domain) use ($subcategoryId) {
                $domain->subCategories = $domain->subCategories->filter(function ($sub) use ($subcategoryId) {
                    return $sub->id == $subcategoryId;
                });
            });
        }

        return view('dashboard.seller.products', compact('domains'));
    }

    public function updateDomain(Request $request)
    {
        $request->validate([
            'domains' => 'required|array|min:1',
            'domains.*' => 'required|string|max:255',
        ]);

        $userId = Auth::id();
        $newDomains = $request->domains;

        // Get current active domains
        $currentDomains = SellerDomain::where('user_id', $userId)->pluck('domain')->toArray();

        // Find domains to add
        $toAdd = array_diff($newDomains, $currentDomains);

        // Find domains to remove
        $toRemove = array_diff($currentDomains, $newDomains);

        // Soft delete domains not in new list
        if (!empty($toRemove)) {
            SellerDomain::where('user_id', $userId)
                ->whereIn('domain', $toRemove)
                ->delete(); // soft delete
        }

        // Add or restore domains
        foreach ($toAdd as $domain) {
            $existing = SellerDomain::withTrashed()
                ->where('user_id', $userId)
                ->where('domain', $domain)
                ->first();

            if ($existing) {
                // Restore if previously soft deleted
                $existing->restore();
            } else {
                // Create new if not existing at all
                SellerDomain::create([
                    'user_id' => $userId,
                    'domain' => $domain,
                ]);
            }
        }

        $domains = SellerDomain::with('user')
            ->where('user_id', $userId)
            ->get();

        return redirect()->route('seller.products', compact('domains'));
    }

    public function addSubCategory(Request $request)
    {
        $request->validate([
            'domain' => 'required|exists:seller_domains,id',
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $subCategory = SellerSubcategory::create([
            'seller_domain_id' => $request->domain,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'status' => true,
            'message' => 'SubCategory added successfully',
            'subcategory' => $subCategory,
        ]);
    }

    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subcategory' => 'required|exists:seller_subcategories,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'type'        => 'required|array|min:1',
            'finishes'    => 'nullable|string',
            'sizes'       => 'nullable|string',
            'thickness'   => 'nullable|string|max:50',
            'color'       => 'nullable|string|max:100',
            'quality'     => 'nullable|string',
            'usage_area'  => 'nullable|string',
            'images'      => 'required|array|min:1',
            'images.*'    => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Custom rule: ensure at least one type is "display"
        $validator->after(function ($validator) use ($request) {
            $types = $request->input('type', []);
            if (!in_array('display', $types)) {
                $validator->errors()->add('type', 'At least one image must be marked as Display.');
            }
        });

        $validator->validate();


        $imagesData = [];

        if ($request->has('images')) {
            foreach ($request->file('images') as $index => $imageFile) {
                if ($imageFile) {
                    // Generate unique filename
                    $filename = time() . '_' . $index . '.' . $imageFile->getClientOriginalExtension();

                    // Move file to public/uploads/product_images
                    $imageFile->move(public_path('uploads/product_images'), $filename);

                    // Build full URL
                    $imageUrl = url('uploads/product_images/' . $filename);

                    // Get type from request (type[0], type[1], etc.)
                    $type = $request->input("type.$index");

                    // Push into array
                    $imagesData[] = [
                        'type'  => $type,
                        'image' => $imageUrl,
                    ];
                }
            }
        }


        $product = Product::create([
            'seller_subcategory_id' => $request->subcategory,
            'name' => $request->name,
            'description' => $request->description,
            'images' => $imagesData,
            'finishes' => json_decode($request->finishes, true),
            'sizes' => json_decode($request->sizes, true),
            'thickness' => $request->thickness,
            'color' => $request->color,
            'quality' => $request->quality,
            'usage_area' => json_decode($request->usage_area, true),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Product added successfully',
            'product' => $product,
        ]);
    }

    public function closeSellerEnquiry($id)
    {
        $enquiry = SellerEnquiry::find($id);
        $enquiry->status = 'closed';
        $enquiry->save();

        return response()->json([
            'status' => true
        ]);
    }

    public function closeProductEnquiry($id)
    {
        $enquiry = ProductEnquiry::find($id);
        $enquiry->status = 'closed';
        $enquiry->save();

        return response()->json([
            'status' => true
        ]);
    }
}
