<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckArchitectVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->hasRole('Architect')) { 
            $architect = $user->architect; // relation: User hasOne Architect 
            if ($architect && $architect->status !== 'verified') { 
                // Redirect to verification status page 
                return redirect()->route('architect.verification-status');
            } 
        }

        return $next($request);
    }
}
