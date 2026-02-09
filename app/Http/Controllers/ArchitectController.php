<?php

namespace App\Http\Controllers;

use App\Models\ArchitectAward;
use App\Models\ArchitectCertificate;
use App\Models\ArchitectEnquiry;
use App\Models\ArchitectGallery;
use App\Models\ChangeLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchitectController extends Controller
{
    protected array $middleware = [
        'auth',
        'role:Architect',
    ];

    public function verificationStatus()
    {
        $architect = Auth::user()->architect;

        $portfolioLog = ChangeLog::where('table_name', 'architects')->where('row_id', $architect->id)->where('column_name', 'portfolio_verification')->latest('created_at')->first();

        $statusLog = ChangeLog::where('table_name', 'architects')->where('row_id', $architect->id)->where('column_name', 'status')->latest('created_at')->first();

        return view('dashboard.architect.verification-status', compact('architect', 'portfolioLog', 'statusLog'));
    }

    public function index()
    {
        return view('dashboard.architect.index');
    }

    public function updateBanner(Request $request)
    {
        $request->validate([
            'banner_image' => 'required|image|max:2048', // max 2MB
        ]);

        $architect = Auth::user()->architect;

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/architect_banners'), $filename);

            // Update architect's banner image path
            $architect->banner = asset('uploads/architect_banners/' . $filename);
            $architect->save();

            return response()->json(['success' => true, 'message' => 'Banner image updated successfully.', 'new_image_url' => $architect->banner], 200);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.'], 200);
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|max:2048', // max 2MB
        ]);

        $architect = Auth::user()->architect;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/architect_logos'), $filename);

            // Update architect's logo image path
            $architect->logo = asset('uploads/architect_logos/' . $filename);
            $architect->save();

            return response()->json(['success' => true, 'message' => 'Logo image updated successfully.', 'new_logo_url' => $architect->logo], 200);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.'], 200);
    }

    public function updateAbout(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|digits:10',
            'firm_name' => 'required|string|max:255',
            'years_of_experience' => 'nullable|numeric|min:0|max:100',
            'specialization' => 'required',
            'about' => 'nullable|string|max:2000',
        ]);

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');
        $user->architect->firm_name = $request->input('firm_name');
        $user->architect->years_of_experience = $request->input('years_of_experience');
        $user->architect->specialization = $request->input('specialization');
        $user->architect->about = $request->input('about');

        $user->architect->save();
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

        $user->architect->description = $request->input('description');

        $user->architect->save();

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
            $file->move(public_path('uploads/architect_awards'), $filename);

            // Save award details
            $architectAward = new ArchitectAward();
            $architectAward->user_id = Auth::id();
            $architectAward->name = $awardName;
            $architectAward->image = asset('uploads/architect_awards/' . $filename);
            $architectAward->save();
        }

        return response()->json([
            'status'  => true,
            'message' => 'Awards added successfully',
            'awards' => $architectAward->where('user_id', Auth::id())->latest()->take(count($request->name))->get()
        ]);
    }

    public function deleteAward(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:architect_awards,id',
        ]);

        $award = ArchitectAward::find($request->id);

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
            $file->move(public_path('uploads/architect_certificates'), $filename);

            // Save certificate details
            $architectCertificate = new ArchitectCertificate();
            $architectCertificate->user_id = Auth::id();
            $architectCertificate->name = $certificateName;
            $architectCertificate->image = asset('uploads/architect_certificates/' . $filename);
            $architectCertificate->save();
        }

        return response()->json([
            'status'  => true,
            'message' => 'Certificates added successfully',
            'certificates' => $architectCertificate->where('user_id', Auth::id())->latest()->take(count($request->name))->get()
        ]);
    }

    public function deleteCertificate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:architect_certificates,id',
        ]);

        $certificate = ArchitectCertificate::find($request->id);

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

    public function updateAboutImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // max 2MB
        ]);

        $architect = Auth::user()->architect;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'about_image_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/architect_about_images'), $filename);

            // Update architect's logo image path
            $architect->about_section_image = asset('uploads/architect_about_images/' . $filename);
            $architect->save();

            return response()->json(['success' => true, 'message' => 'About section image updated successfully.', 'new_image_url' => $architect->about_section_image], 200);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.'], 200);
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
                    $imageFile->move(public_path('uploads/architect_gallery'), $filename);

                    // Build full URL
                    $imageUrl = url('uploads/architect_gallery/' . $filename);

                    // Get type from request (type[0], type[1], etc.)
                    $type = $request->input("type.$index");

                    $image = ArchitectGallery::create([
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
        $architect = Auth::user();
        $images = $architect->architectGallery()->latest()->paginate(9);

        return view('dashboard.architect.gallery', compact('architect', 'images'));
    }

    public function deleteGallery($id){
        $gallery = ArchitectGallery::findOrFail($id); // Build full path from the stored URL 

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

    public function closeArchitectEnquiry($id)
    {
        $enquiry = ArchitectEnquiry::find($id);
        $enquiry->status = 'closed';
        $enquiry->save();

        return response()->json([
            'status' => true
        ]);
    }
}
