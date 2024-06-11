<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_user_object_passengers extends Model
{
    use HasFactory;
    protected $table = 'gs_user_object_passengers';
    protected $fillable = [
        'passenger_id',
        'user_id',
        'passenger_name',
        'passenger_assign_id',
        'passenger_idn',
        'passenger_address',
        'passenger_phone',
        'passenger_email',
        'passenger_desc'
    ];
}
