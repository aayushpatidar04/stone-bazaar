<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSellerVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->hasRole('Seller')) { 
            $seller = $user->seller; // relation: User hasOne Seller 
            if ($seller && $seller->status !== 'approved') { 
                // Redirect to verification status page 
                return redirect()->route('seller.verification-status');
            } 
        }

        return $next($request);
    }
}
