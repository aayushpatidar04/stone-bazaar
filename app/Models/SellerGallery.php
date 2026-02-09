<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerGallery extends Model
{
    protected $table = "seller_galleries";

    protected $fillable = [
        'user_id',
        'type',
        'image'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
