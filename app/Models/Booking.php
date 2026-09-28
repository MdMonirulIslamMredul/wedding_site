<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'event_date',
        'venue',
        'service_id',
        'package_id',
        'is_custom_package',
        'custom_package_details',
        'estimated_price',
        'notes',
        'is_view'
    ];

    protected $casts = [
        'is_custom_package' => 'boolean',
        'custom_package_details' => 'array',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
