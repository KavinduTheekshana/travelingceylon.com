<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Booking extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
