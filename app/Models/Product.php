<?php

namespace App\Models;

use App\LogModelChanges;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use LogModelChanges;
    protected $table = "products";
    protected $fillable = [
        'seller_subcategory_id',
        'name',
        'description',
        'images',
        'finishes',
        'sizes',
        'thickness',
        'color',
        'quality',
        'usage_area',
    ];

    protected $casts = [
        'images' => 'array',
        'finishes' => 'array',
        'sizes' => 'array',
        'usage_area' => 'array',
    ];

    public function subcategory(){
        return $this->belongsTo(SellerSubcategory::class, 'seller_subcategory_id');
    }
}
