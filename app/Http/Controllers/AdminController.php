<?php

namespace App\Http\Controllers;

use App\Models\ArchitectEnquiry;
use App\Models\ProductEnquiry;
use App\Models\Query;
use App\Models\SellerEnquiry;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected array $middleware = [
        'auth',
        'role:Admin',
    ];

    public function index()
    {
        $data = [];

        // Sellers
        $data['total_sellers'] = User::role('Seller')->withTrashed()->count();
        $data['verified_sellers'] = User::role('Seller')->whereHas('seller', function ($q) {
            $q->where('status', 'approved');
        })->count();
        $data['pending_sellers'] = User::role('Seller')->whereHas('seller', function ($q) {
            $q->where('status', 'pending');
        })->count();
        $data['rejected_sellers'] = User::role('Seller')->whereHas('seller', function ($q) {
            $q->where('status', 'rejected');
        })->count();

        $data['total_designers'] = User::role('Architect')->withTrashed()->count();
        $data['verified_designers'] = User::role('Architect')->whereHas('architect', function ($q) {
            $q->where('status', 'approved');
        })->count();
        $data['pending_designers'] = User::role('Architect')->whereHas('architect', function ($q) {
            $q->where('status', 'pending');
        })->count();
        $data['rejected_designers'] = User::role('Architect')->whereHas('architect', function ($q) {
            $q->where('status', 'rejected');
        })->count();

        // Product enquiries
        $product_enquiries = ProductEnquiry::all();
        $data['product_enquiries_count'] = $product_enquiries->count();
        $data['pending_product_enquiries'] = $product_enquiries->where('status', 'pending')->count();
        $data['forwarded_product_enquiries'] = $product_enquiries->where('status', 'forwarded')->count();
        $data['closed_product_enquiries'] = $product_enquiries->where('status', 'closed')->count();

        // Seller enquiries
        $seller_enquiries = SellerEnquiry::all();
        $data['seller_enquiries_count'] = $seller_enquiries->count();
        $data['pending_seller_enquiries'] = $seller_enquiries->where('status', 'pending')->count();
        $data['forwarded_seller_enquiries'] = $seller_enquiries->where('status', 'forwarded')->count();
        $data['closed_seller_enquiries'] = $seller_enquiries->where('status', 'closed')->count();

        // Architect enquiries
        $architect_enquiries = ArchitectEnquiry::all();
        $data['architect_enquiries_count'] = $architect_enquiries->count();
        $data['pending_architect_enquiries'] = $architect_enquiries->where('status', 'pending')->count();
        $data['forwarded_architect_enquiries'] = $architect_enquiries->where('status', 'forwarded')->count();
        $data['closed_architect_enquiries'] = $architect_enquiries->where('status', 'closed')->count();

        return view('dashboard.admin.index', compact('data'));
    }


    public function sellers()
    {
        $sellers = User::role('Seller')->with('seller')->withTrashed()->count();
        $verified_sellers = User::role('Seller')->with('seller')->whereHas('seller', function ($q) {
            $q->where('status', 'approved');
        })->get();
        $pending_sellers = User::role('Seller')->with('seller')->whereHas('seller', function ($q) {
            $q->where('status', 'pending');
        })->get();
        $rejected_sellers = User::role('Seller')->with('seller')->withTrashed()->whereHas('seller', function ($q) {
            $q->where('status', 'rejected');
        })->get();
        return view('dashboard.admin.sellers', compact('sellers', 'verified_sellers', 'pending_sellers', 'rejected_sellers'));
    }

    public function sellerVerification(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|string|in:approved,rejected',
            'field' => 'required|string|in:gst_verification,location_verification,status',
            'remark' => 'required_if:action,rejected|string|max:1000',
        ]);
        $seller = User::role('Seller')->with('seller')->findOrFail($id);
        $action = $request->input('action');
        $field = $request->input('field');

        if (!in_array($action, ['approved', 'rejected'])) {
            return response()->json(['message' => 'Invalid action'], 400);
        }

        $seller->seller->$field = $action;
        $seller->seller->change_log_remark = $request->input('remark', null);
        $seller->seller->save();

        return response()->json([
            'message' => "Seller status has been successfully updated",
            'seller' => $seller->seller,
            'user' => $seller,
            'logs' => $seller->seller->verificationLogs()
        ]);
    }

    public function forwardSellerEnquiry($id)
    {
        $enquiry = SellerEnquiry::find($id);
        $enquiry->status = 'forwarded';
        $enquiry->save();

        return response()->json([
            'status' => true
        ]);
    }

    public function forwardProductEnquiry($id)
    {
        $enquiry = ProductEnquiry::find($id);
        $enquiry->status = 'forwarded';
        $enquiry->save();

        return response()->json([
            'status' => true
        ]);
    }

    public function forwardArchitectEnquiry($id)
    {
        $enquiry = ArchitectEnquiry::find($id);
        $enquiry->status = 'forwarded';
        $enquiry->save();

        return response()->json([
            'status' => true
        ]);
    }

    public function architects()
    {
        $architects = User::role('Architect')->with('architect')->withTrashed()->count();
        $verified_architects = User::role('Architect')->with('architect')->whereHas('architect', function ($q) {
            $q->where('status', 'verified');
        })->get();
        $pending_architects = User::role('Architect')->with('architect')->whereHas('architect', function ($q) {
            $q->where('status', 'pending');
        })->get();
        $rejected_architects = User::role('Architect')->with('architect')->withTrashed()->whereHas('architect', function ($q) {
            $q->where('status', 'rejected');
        })->get();
        return view('dashboard.admin.architects', compact('architects', 'verified_architects', 'pending_architects', 'rejected_architects'));
    }

    public function architectVerification(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|string|in:verified,rejected',
            'field' => 'required|string|in:portfolio_verification,status',
            'remark' => 'required_if:action,rejected|string|max:1000',
        ]);
        $architect = User::role('Architect')->with('architect')->findOrFail($id);
        $action = $request->input('action');
        $field = $request->input('field');

        if (!in_array($action, ['verified', 'rejected'])) {
            return response()->json(['message' => 'Invalid action'], 400);
        }

        $architect->architect->$field = $action;
        $architect->architect->change_log_remark = $request->input('remark', null);
        $architect->architect->save();

        return response()->json([
            'message' => "Architect status has been successfully updated",
            'architect' => $architect->architect,
            'user' => $architect,
            'logs' => $architect->architect->verificationLogs()
        ]);
    }

    public function queries(){
        $pending_queries = Query::where('status', 'pending')->get();
        $closed_queries = Query::where('status', 'closed')->latest()->get();
        return view('dashboard.admin.queries', compact('pending_queries', 'closed_queries'));
    }

    public function closeQuery($id){
        $query = Query::findOrFail($id);

        $query->status = 'closed';
        $query->save();

        return response()->json([
            'message' => 'Query closed successfully',
            'query' => $query
        ]);
    }

    public function deleteQuery($id){
        $query = Query::findOrFail($id);
        $query->delete();

        return response()->json([
            'message' => 'Query deleted successfully',
        ]);
    }

    public function plans(){
        $plans = SubscriptionPlan::all();
        return view('dashboard.admin.plans', compact('plans'));
    }

    public function addPlan(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'ideal_for' => 'required|string|max:255',
            'benefits' => 'required',
            'price_quarterly' => 'required|numeric|min:0',
            'price_annual' => 'required|numeric|min:0',
            'discount_percent' => 'required|numeric|min:0|max:100',
        ]);

        $plan = new SubscriptionPlan();
        $plan->name = $request->input('name');
        $plan->ideal_for = $request->input('ideal_for');
        $plan->benefits = json_decode($request->input('benefits'), true);
        $plan->price_quarterly = $request->input('price_quarterly');
        $plan->price_annual = $request->input('price_annual');
        $plan->discount_percent = $request->input('discount_percent');
        $plan->save();

        return redirect()->back()->with('message', 'Plan added successfully');
    }
    
}
