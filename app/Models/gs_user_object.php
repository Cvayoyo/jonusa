<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_user_object extends Model
{
    use HasFactory;
    protected $primaryKey = 'object_id';
    public $timestamps = false;
    protected $table = 'gs_user_objects';
    protected $fillable = [
        'object_id',
        'user_id',
        'imei',
        'group_id',
        'driver_id',
        'trailer_id'
    ];
}
