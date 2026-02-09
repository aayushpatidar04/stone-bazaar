<?php

namespace App\Models;

use App\LogModelChanges;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellerAward extends Model
{
    use LogModelChanges, SoftDeletes;

    protected $table = 'seller_awards';

    protected $fillable = [
        'user_id',
        'name',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
