<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\LogModelChanges;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, LogModelChanges, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'app_token',
        'web_token',
        'auth_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function booted() { 
        static::deleting(function ($user) { 
            if ($user->isForceDeleting()) { 
                // hard delete children 
                $user->seller()->withTrashed()->forceDelete();
            } else { 
                // soft delete children 
                $user->seller()->delete();
            } 
        });             
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }

    public function sellerAwards()
    {
        return $this->hasMany(SellerAward::class);
    }

    public function sellerCertificates()
    {
        return $this->hasMany(SellerCertificate::class);
    }

    public function sellerDomains(){
        return $this->hasMany(SellerDomain::class);
    }

    public function sellerSubcategories() { 
        return $this->hasManyThrough( 
            SellerSubcategory::class, 
            SellerDomain::class, 'user_id', 
            'seller_domain_id',
            'id',
            'id'
        );
    }

    public function sellerGallery(){
        return $this->hasMany(SellerGallery::class);
    }

    public function products() { 
        return Product::query() 
            ->select('products.*')
            ->join('seller_subcategories', 'products.seller_subcategory_id', '=', 'seller_subcategories.id') 
            ->join('seller_domains', 'seller_subcategories.seller_domain_id', '=', 'seller_domains.id') 
            ->where('seller_domains.user_id', $this->id);
    }

    public function sellerEnquiries(){
        return $this->hasMany(SellerEnquiry::class, 'user_id');
    }

    public function architect()
    {
        return $this->hasOne(Architect::class);
    }

    public function architectAwards()
    {
        return $this->hasMany(ArchitectAward::class);
    }

    public function architectCertificates()
    {
        return $this->hasMany(ArchitectCertificate::class);
    }

    public function architectGallery(){
        return $this->hasMany(ArchitectGallery::class);
    }

    public function architectEnquiries(){
        return $this->hasMany(ArchitectEnquiry::class, 'user_id');
    }

}
