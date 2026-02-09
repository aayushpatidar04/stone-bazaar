<?php

namespace App\Models;

use App\LogModelChanges;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Architect extends Model
{
    use SoftDeletes, LogModelChanges;

    protected $table = "architects";
    protected $fillable = [
        'user_id',
        'firm_name',
        'years_of_experience',
        'specialization',
        'address',
        'city',
        'state',
        'pincode',
        'portfolio',
        'status',
        'protfolio_verification',
        'logo',
        'banner',
        'about',
        'description',
        'website',
        'profile_completion',
        'change_log_remark',
        'about_section_image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function verificationLogs()
    {
        return [
            'portfolioLog' => ChangeLog::where('table_name', 'architects')
                ->where('row_id', $this->id)
                ->where('column_name', 'portfolio_verification')
                ->latest('created_at')
                ->first(),
            'statusLog' => ChangeLog::where('table_name', 'architects')
                ->where('row_id', $this->id)
                ->where('column_name', 'status')
                ->latest('created_at')
                ->first(),
        ];
    }
}
