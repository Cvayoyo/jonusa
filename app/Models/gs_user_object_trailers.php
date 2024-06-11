<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_user_object_trailers extends Model
{
    use HasFactory;
    protected $table = 'gs_user_object_trailers';
    protected $fillable = [
        'trailer_id',
        'user_id',
        'trailer_name',
        'trailer_assign_id',
        'trailer_model',
        'trailer_vin',
        'trailer_plate_number',
        'trailer_desc',
    ];
}
