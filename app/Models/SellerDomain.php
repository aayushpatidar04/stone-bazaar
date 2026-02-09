<?php

namespace App\Models;

use App\LogModelChanges;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellerDomain extends Model
{
    use LogModelChanges, SoftDeletes;
    protected $table = "seller_domains";
    protected $fillable = [
        'user_id',
        'domain'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subCategories(){
        return $this->hasMany(SellerSubcategory::class, 'seller_domain_id');
    }

    public function products(){
        return $this->hasManyThrough( 
            Product::class, 
            SellerSubcategory::class, 
            'seller_domain_id', // Foreign key on SellerSubcategory 
            'seller_subcategory_id', // Foreign key on Product 
            'id', // Local key on SellerDomain 
            'id' // Local key on SellerSubcategory 
        );
    }
}
