<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_object_sensors extends Model
{
    protected $table = 'gs_object_sensors';
    protected $fillable = [
        'sensor_id',
        'imei',
        'name',
        'type',
        'param',
        'data_list',
        'popup',
        'result_type',
        'text_1',
        'text_0',
        'units',
        'lv',
        'hv',
        'acc_ignore',
        'formula',
        'calibration',
        'dictionary',
    ];
}
