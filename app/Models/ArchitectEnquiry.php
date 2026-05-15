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
        'city',
        'project_type',
        'property_type',
        'project_area',
        'project_status',
        'budget_range',
        'services_required',
        'scope_of_work',
        'design_preference',
        'requirements',
        'preferred_time',
        'referral_source',
        'reference_file',
        'message',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
