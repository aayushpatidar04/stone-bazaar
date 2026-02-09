<?php

namespace App\Models;

use App\LogModelChanges;
use Illuminate\Database\Eloquent\Model;

class SellerEnquiry extends Model
{
    use LogModelChanges;

    protected $table = "seller_enquiries";

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'type',
        'message',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
