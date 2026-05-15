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
        'status',
        'city',
        'project_type',
        'stone_requirement',
        'quantity',
        'budget_range',
        'color_design',
        'delivery_location',
        'urgency',
        'reference_image',
        'forwarded_to'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
