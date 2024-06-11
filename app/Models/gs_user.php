<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class gs_user extends Model
{
    use HasApiTokens;
    public $timestamps = false;
    protected $table = 'gs_users';
    protected $fillable = [
        'id',
        'active',
        'account_expire',
        'account_expire_dt',
        'privileges',
        'manager_id',
        'manager_billing',
        'username',
        'password',
        'sess_hash',
        'email',
        'api',
        'api_key',
        'dt_reg',
        'dt_login',
        'ip',
        'notify_account_expire',
        'notify_object_expire',
        'info',
        'comment',
        'obj_add',
        'obj_limit',
        'obj_limit_num',
        'obj_days',
        'obj_days_dt',
        'obj_edit',
        'obj_delete',
        'obj_history_clear',
        'currency',
        'timezone',
        'dst',
        'dst_start',
        'dst_end',
        'startup_tab',
        'language',
        'units',
        'dashboard',
        'map_sp',
        'map_is',
        'map_rc',
        'map_rhc',
        'map_ocp',
        'groups_collapsed',
        'od',
        'ohc',
        'datalist',
        'datalist_items',
        'push_notify_identifier',
        'push_notify_desktop',
        'push_notify_mobile',
        'push_notify_mobile_interval',
        'chat_notify',
        'sms_gateway_server',
        'sms_gateway',
        'sms_gateway_type',
        'sms_gateway_url',
        'sms_gateway_identifier',
        'places_markers',
        'places_routes',
        'places_zones',
        'usage_email_daily',
        'usage_sms_daily',
        'usage_webhook_daily',
        'usage_api_daily',
        'usage_email_daily_cnt',
        'usage_sms_daily_cnt',
        'usage_webhook_daily_cnt',
        'usage_api_daily_cnt',
        'dt_usage_d',
    ];

}
