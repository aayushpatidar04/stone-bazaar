<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchitectGallery extends Model
{
    protected $table = "architect_galleries";

    protected $fillable = [
        'user_id',
        'type',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
