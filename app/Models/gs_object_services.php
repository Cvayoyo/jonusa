<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_object_services extends Model
{
    use HasFactory;
    protected $table = 'gs_object_services';
    protected $fillable = [
        'service_id',
        'imei',
        'name',
        'data_list',
        'popup',
        'odo',
        'odo_interval',
        'odo_last',
        'engh',
        'engh_interval',
        'engh_last',
        'days',
        'days_interval',
        'days_last',
        'odo_left',
        'odo_left_num',
        'engh_left',
        'engh_left_num',
        'days_left',
        'days_left_num',
        'update_last',
        'notify_service_expire',
    ];
}
