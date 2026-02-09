<?php

namespace App\Models;

use App\LogModelChanges;
use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
    use LogModelChanges;
    
    protected $table ="product_enquiries";

    protected $fillable = [
        'product_id',
        'name',
        'email',
        'phone',
        'state',
        'city',
        'message',
        'status',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user(){
        return $this->product->subcategory->domain->user ?? null;
    }
}
