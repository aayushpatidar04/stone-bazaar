<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerSubscription extends Model
{
    protected $table = 'seller_subscriptions';

    protected $fillable = [
        'user_id',
        'subscription_plan_id',
        'expiry_date',
        'amount_paid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }
}
