<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_user_events extends Model
{
    use HasFactory;
    protected $table = 'gs_user_events';
    protected $fillable = [
        'event_id',
        'user_id',
        'type',
        'name',
        'active',
        'duration_from_last_event',
        'duration_from_last_event_minutes',
        'week_days',
        'day_time',
        'imei',
        'checked_value',
        'route_trigger',
        'zone_trigger',
        'routes',
        'zones',
        'notify_system',
        'notify_push',
        'notify_email',
        'notify_email_address',
        'notify_sms',
        'notify_sms_number',
        'notify_arrow',
        'notify_arrow_color',
        'notify_ohc',
        'notify_ohc_color',
        'email_template_id',
        'sms_template_id',
        'webhook_send',
        'webhook_url',
        'cmd_send',
        'cmd_gateway',
        'cmd_type',
        'cmd_string',
    ];
}
