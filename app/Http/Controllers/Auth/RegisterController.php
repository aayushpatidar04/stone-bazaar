<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AdminNewSellerMail;
use App\Mail\AdminNewUserMail;
use App\Mail\UserWelcomeMail;
use App\Models\Architect;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        $user = Auth::user();

        if ($user->hasRole('Seller')) {
            return '/seller/dashboard';
        }

        if ($user->hasRole('Architect')) {
            return '/architect/dashboard';
        }

        return '/home'; // fallback
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected array $middleware = ['guest'];

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:Seller,Architect'],
            'phone_number' => ['required', 'numeric', 'unique:users,phone_number', 'digits:10'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([ 
                'name' => $data['name'], 
                'email' => $data['email'], 
                'phone_number' => $data['phone_number'], 
                'password' => Hash::make($data['password']), 
            ]);
            
            if($data['role'] == 'Seller'){
                $user->assignRole('Seller');
    
                $gstCertificatePath = null;
                if (request()->hasFile('gst_certificate')) { 
                    $file = request()->file('gst_certificate'); 
                    $filename = time().'_'.$file->getClientOriginalName(); 
                    $file->move(public_path('uploads/gst_certificates'), $filename); // Save relative path or URL 
                    $gstCertificatePath = asset('uploads/gst_certificates/'.$filename); 
                }
    
                $seller = Seller::create([ 
                    'user_id' => $user->id,
                    'business_name' => $data['business_name'],
                    'gst_number' => $data['gst_number'],
                    'gst_certificate' => $gstCertificatePath,
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'pincode' => $data['pincode'],
                ]);
    
                Mail::to($user->email)->send(new UserWelcomeMail($user));
                $admins = User::role('Admin')->get();
                foreach($admins as $admin){
                    Mail::to($admin->email)->send(new AdminNewSellerMail($user, $seller));
                }

            }elseif($data['role'] == 'Architect'){
                $user->assignRole('Architect');

                $portfolioPath = null;
                if (request()->hasFile('portfolio')) { 
                    $file = request()->file('portfolio'); 
                    $filename = time().'_'.$file->getClientOriginalName(); 
                    $file->move(public_path('uploads/portfolios'), $filename); // Save relative path or URL 
                    $portfolioPath = asset('uploads/portfolios/'.$filename); 
                }
    
                $architect = Architect::create([ 
                    'user_id' => $user->id,
                    'firm_name' => $data['firm_name'],
                    'specialization' => $data['specialization'],
                    'years_of_experience' => $data['years_of_experience'],
                    'portfolio' => $portfolioPath,
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'pincode' => $data['pincode'],
                ]);
    
                Mail::to($user->email)->send(new UserWelcomeMail($user));
                $admins = User::role('Admin')->get();
                foreach($admins as $admin){
                    Mail::to($admin->email)->send(new AdminNewUserMail($user, $architect));
                }
            }


            return $user;
        });
    }

    public function showRegistrationForm(Request $request){
        $request->validate([
            'role' => 'required|in:Seller,Architect',
        ]);

        if($request->role == 'Seller'){
            return view('auth.register_seller');
        }elseif($request->role == 'Architect'){
            return view('auth.register_architect');
        }
    }
}
