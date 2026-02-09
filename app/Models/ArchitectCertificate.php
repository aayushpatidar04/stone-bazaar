<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchitectCertificate extends Model
{
    protected $table = "architect_certificates";
    protected $fillable = [
        'user_id',
        'name',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
