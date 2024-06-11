<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_user_object_drivers extends Model
{
    use HasFactory;
    protected $table = 'gs_user_object_drivers';
    protected $fillable = [
        'driver_id',
        'user_id',
        'driver_name',
        'driver_assign_id',
        'driver_idn',
        'driver_address',
        'driver_phone',
        'driver_email',
        'driver_desc',
        'driver_img_file',
    ];
}
