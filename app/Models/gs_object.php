<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_object extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'imei';
    protected $table = 'gs_objects';
    protected $fillable = [
        'imei',
        'protocol',
        'net_protocol',
        'ip',
        'port',
        'active',
        'object_expire',
        'object_expire_dt',
        'manager_id',
        'dt_server',
        'dt_tracker',
        'lat',
        'lng',
        'altitude',
        'angle',
        'speed',
        'loc_valid',
        'params',
        'dt_last_params_ble',
        'dt_last_stop',
        'dt_last_idle',
        'dt_last_move',
        'name',
        'icon',
        'map_arrows',
        'map_icon',
        'tail_color',
        'tail_points',
        'device',
        'sim_number',
        'model',
        'vin',
        'plate_number',
        'odometer_type',
        'engine_hours_type',
        'odometer',
        'engine_hours',
        'fcr',
        'time_adj',
        'accuracy',
        'unassign_driver',
        'accvirt',
        'accvirt_cn',
        'forward_loc_data',
        'forward_loc_data_imei',
        'dt_chat',
        'mileage_1',
        'mileage_2',
        'mileage_3',
        'mileage_4',
        'mileage_5',
        'dt_mileage',
        'last_img_file',
        'deviceId'
    ];
    
}
