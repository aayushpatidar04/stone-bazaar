<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchitectEnquiry extends Model
{
    protected $table = "architect_enquiries";
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'message',
    ];  

    public function user(){
        return $this->belongsTo(User::class);
    }
}
