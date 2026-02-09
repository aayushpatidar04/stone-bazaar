<?php

namespace App\Models;

use App\LogModelChanges;
use Illuminate\Database\Eloquent\Model;

class SellerSubcategory extends Model
{
    use LogModelChanges;
    protected $table = "seller_subcategories";
    protected $fillable = [
        'seller_domain_id',
        'name',
        'description'
    ];

    public function domain(){
        return $this->belongsTo(SellerDomain::class, 'seller_domain_id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'seller_subcategory_id');
    }
}
