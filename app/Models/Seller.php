<?php

namespace App\Models;

use App\LogModelChanges;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use SoftDeletes, LogModelChanges;

    protected $table = 'sellers';

    protected $fillable = [
        'user_id',
        'business_name',
        'gst_number',
        'gst_certificate',
        'address',
        'city',
        'state',
        'pincode',
        'geo_location',
        'gst_verification',
        'location_verification',
        'status',
        'change_log_remark',
        'logo',
        'banner',
        'website',
        'about',
        'years_of_experience',
        'description',
        'warehouse_image',
        'office_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function verificationLogs()
    {
        return [
            'gstLog' => ChangeLog::where('table_name', 'sellers')
                ->where('row_id', $this->id)
                ->where('column_name', 'gst_verification')
                ->latest('created_at')
                ->first(),
            'locationLog' => ChangeLog::where('table_name', 'sellers')
                ->where('row_id', $this->id)
                ->where('column_name', 'location_verification')
                ->latest('created_at')
                ->first(),
            'statusLog' => ChangeLog::where('table_name', 'sellers')
                ->where('row_id', $this->id)
                ->where('column_name', 'status')
                ->latest('created_at')
                ->first(),
        ];
    }
}
