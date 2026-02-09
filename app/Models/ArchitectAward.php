<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchitectAward extends Model
{
    protected $table = "architect_awards";
    protected $fillable = [
        'user_id',
        'name',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
