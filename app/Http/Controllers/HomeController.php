<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckArchitectVerification;
use App\Http\Middleware\CheckSellerVerification;
use App\Models\ArchitectEnquiry;
use App\Models\ProductEnquiry;
use App\Models\SellerEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    protected array $middleware = [
        'auth'
    ];

    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('Seller')) {
            return redirect()->route('seller.dashboard');
        }

        if ($user->hasRole('Architect')) {
            return redirect()->route('architect.dashboard');
        }

        if ($user->hasRole('Admin')) {
            return redirect()->route('admin.dashboard');
        }
        return view('home');
    }

    public function profile(){
        if(Auth::user()->hasRole('Admin')){
            return view('dashboard.admin.profile');
        }elseif(Auth::user()->hasRole('Seller')){
            $seller = Auth::user();
            return view('dashboard.seller.profile', compact('seller'));
        }elseif(Auth::user()->hasRole('Architect')){
            $architect = Auth::user();
            return view('dashboard.architect.profile', compact('architect'));
        }
    }

    public function enquiries(Request $request){
        if(Auth::user()->hasRole('Admin')){
            $sellerEnquiries = SellerEnquiry::with(['user.seller'])->latest()->get();
            $productEnquiries = ProductEnquiry::with(['product.subcategory.domain.user.seller'])->latest()->get();
            $architectEnquiries = ArchitectEnquiry::with(['user.architect'])->latest()->get();
            return view('dashboard.admin.enquiries', compact('sellerEnquiries', 'productEnquiries', 'architectEnquiries'));
        }elseif(Auth::user()->hasRole('Seller')){
           
            $sellerEnquiries = SellerEnquiry::with(['user.seller'])->whereNot('status', 'pending')->where('user_id', Auth::id())->latest()->get();
            $productEnquiries = ProductEnquiry::with(['product.subcategory.domain.user.seller'])->whereNot('status', 'pending')->whereHas('product.subcategory.domain.user', function ($q) { $q->where('id', Auth::id()); })->latest()->get();
            return view('dashboard.seller.enquiries', compact('sellerEnquiries', 'productEnquiries'));
        }elseif(Auth::user()->hasRole('Architect')){
           
            $architectEnquiries = ArchitectEnquiry::with(['user.architect'])->whereNot('status', 'pending')->where('user_id', Auth::id())->latest()->get();
            return view('dashboard.architect.enquiries', compact('architectEnquiries'));
        }
    }
}
