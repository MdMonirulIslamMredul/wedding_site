<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable=
    ['name',
    'phone',
    'car_model',
    'date',
    'time',
    'service_type',
    'note',
    'status'];
}
