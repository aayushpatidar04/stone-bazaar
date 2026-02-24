<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $table = "subscription_plans";

    protected $fillable = [
        'name',
        'ideal_for',
        'price_quarterly',
        'price_annual',
        'discount_percent',
        'benefits',
    ];

    protected $casts = [
        'benefits' => 'array',
    ];

    public function sellerSubscriptions()
    {
        return $this->hasMany(SellerSubscription::class);
    }
}
