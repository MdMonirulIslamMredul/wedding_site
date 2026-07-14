<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionType extends Model
{
    use HasFactory;
    protected $table = 'competition_types';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $guarded = [];
}
