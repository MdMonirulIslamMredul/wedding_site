<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

   protected $table = 'mission_visions';
    protected $fillable = ['mission_vision', 'text', 'pdf_file','portfolio'];
}
