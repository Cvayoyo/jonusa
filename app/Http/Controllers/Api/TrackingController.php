<?php

namespace App\Http\Controllers\Api;
use App\Models\gs_user;
use App\Models\gs_themes;
use App\Models\gs_object;
use App\Models\gs_billing_plans;
use App\Models\gs_templates;
use App\Models\gs_user_object;
use App\Models\gs_user_object_groups;
use App\Models\gs_user_object_drivers;
use App\Models\gs_user_object_trailers;
use App\Models\gs_object_sensors;
use App\Models\gs_object_services;
use App\Models\gs_user_events;
use App\Models\gs_user_object_passengers;
use App\Models\gs_user_templates;
use App\Models\gs_user_kml;
use App\Models\gs_user_share_position;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function fn_settings(Request $request)
    {   
        switch ($request->cmd) {
            case 'load_user_data':
                $data = gs_user::find($request->user_id);
                $privileges_tmp = json_decode($data['privileges'], true);
                $dataPrivileges = array_values($privileges_tmp);
                $cpanel_privileges = ($dataPrivileges[0] == "user") ? "false" :$dataPrivileges[0];
                $units_value = explode(',', $data->units);
                $dashboard = json_decode($data->dashboard, true) ?? "false";
                return response()->json([
                    'username' => $data->username,
                    'email' => $data->email,
                    'manager_id' => (string) $data->manager_id,
                    "cpanel_privileges" => $cpanel_privileges,
                    "privileges" => $dataPrivileges[0],
                    "privileges_imei" => "",
                    "privileges_marker" => "",
                    "privileges_route" => "",
                    "privileges_zone" => "",
                    "privileges_dashboard"=>$dataPrivileges[10],
                    "privileges_kml"=>$dataPrivileges[9],
                    "privileges_history"=>$dataPrivileges[11],
                    "privileges_reports"=>$dataPrivileges[12],
                    "privileges_tachograph"=>$dataPrivileges[13],
                    "privileges_tasks"=>$dataPrivileges[14],
                    "privileges_rilogbook"=>$dataPrivileges[15],
                    "privileges_dtc"=>$dataPrivileges[16],
                    "privileges_maintenance"=>$dataPrivileges[17],
                    "privileges_expenses"=>$dataPrivileges[18],
                    "privileges_object_control"=>$dataPrivileges[19],
                    "privileges_image_gallery"=>$dataPrivileges[20],
                    "privileges_chat"=>$dataPrivileges[21],
                    "privileges_subaccounts"=>$dataPrivileges[22],
                    "billing"=>"true",
                    "obj_add"=>$data->obj_add,
                    "obj_limit"=>$data->obj_limit,
                    "obj_limit_num"=>$data->obj_limit_num,
                    "obj_days"=>$data->obj_days,
                    "obj_days_dt"=>$data->obj_days_dt,
                    "obj_edit"=>$data->obj_edit,
                    "obj_delete"=>$data->obj_delete,
                    "obj_history_clear"=>$data->obj_history_clear,
                    "chat_notify"=>$data->chat_notify,
                    "dashboard"=>$dashboard,
                    "map_sp"=>$data->map_sp,
                    "map_is"=>$data->map_is,
                    "map_rc"=>$data->map_rc,
                    "map_rhc"=>$data->map_rhc,
                    "map_ocp"=>$data->map_ocp,
                    "groups_collapsed"=>json_decode($data->groups_collapsed, true) ?? ["objects" => false, "markers" => false, "routes" => false, "zones" => false],
                    "od"=>$data->od,
                    "ohc"=>json_decode($data->ohc, true) ?? ["no_connection" => false, "no_connection_color" => "#FFAEAE", "stopped" => false, "stopped_color" => "#FFAEAE", "moving" => false, "moving_color" => "#B0E57C", "engine_idle" => false, "engine_idle_color" => "#FFF0AA", "event_sos" => false, "event_sos_color" => "#B4D8E7"],
                    "datalist"=>$data->datalist,
                    "datalist_items"=>$data->datalist_items,
                    "push_notify_desktop"=>$data->push_notify_desktop,
                    "push_notify_mobile"=>$data->push_notify_mobile,
                    "push_notify_mobile_interval"=>$data->push_notify_mobile_interval,
                    "sms_gateway"=>$data->sms_gateway,
                    "sms_gateway_type"=>$data->sms_gateway_type,
                    "sms_gateway_url"=>$data->sms_gateway_url,
                    "sms_gateway_identifier"=>$data->sms_gateway_identifier,
                    "sms_gateway_total_in_queue"=>$data->sms_gateway_total_in_queue,
                    "startup_tab"=>$data->startup_tab,
                    "language"=>$data->language,
                    "unit_distance"=>trim($units_value[0]),
                    "unit_capacity"=>trim($units_value[1]),
                    "unit_temperature"=>trim($units_value[2]),
                    "currency"=>$data->currency,
                    "dst"=>$data->dst,
                    "dst_start"=>$data->dst_start,
                    "dst_end"=>$data->dst_end,
                    "info"=>json_decode($data->info, true),
                    'info_user'=> "<a href=\"#\" onclick=\"settingsOpenUser();\" title=\"My account\"><img src=\"theme/tracking/images/user.svg\" border=\"0\" \/><span>$data->username</span>",

                ]);
            case 'load_object_group_data':
                $data = gs_user_object_groups::where('user_id', $request->user_id)->get();
                $response = [];
                $response[] = [
                    'name' => 'Ungrouped',
                    'desc' => '',
                    'visible' => true,
                    'follow' => false
                ];

                foreach ($data as $item) {
                    $response[$item->group_id] = [
                        'name' => $item->group_name,
                        'desc' => '',
                        'visible' => true,
                        'follow' => false
                    ];
                }

                return response()->json($response);
            
            case 'load_object_driver_data':
                $data = gs_user_object_drivers::where('user_id', $request->user_id)->get();
                $response = [];
                foreach ($data as $item) {
                    $response[$item->driver_id] = [
                        'name' => $item->driver_name,
                        'assign_id' => $item->driver_assign_id,
                        'idn' => $item->driver_idn,
                        'address' => $item->driver_address,
                        'phone' => $item->driver_email,
                        'desc' => $item->driver_desc,
                        'img' => $item->driver_img_file,
                    ];
                }

                return response()->json($response);

            case 'load_object_trailer_data':
                $data = gs_user_object_trailers::where('user_id', $request->user_id)->get();
                $response = [];
                foreach ($data as $item) {
                    $response[$item->trailer_id] = [
                        'name' => $item->trailer_name,
                        'assign_id' => $item->trailer_assign_id,
                        'model' => $item->trailer_model,
                        'vin' => $item->trailer_vin,
                        'plate_number' => $item->trailer_plate_number,
                        'desc' => $item->trailer_desc,
                    ];
                }

                return response()->json($response);

            case 'load_object_data':
                $gs_user_object = gs_user_object::where('user_id', $request->user_id)->get();
                $imei_values = $gs_user_object->pluck('imei')->toArray();
                $gs_object = gs_object::whereIn('imei', $imei_values)->get();
                $gs_object_sensors = gs_object_sensors::whereIn('imei', $imei_values)->get();
                $gs_object_services = gs_object_services::whereIn('imei', $imei_values)->get();

                // return $imei_values;
                $response = [];
                foreach ($gs_object as $item) {
                    $sensorData = $gs_object_sensors->where('imei', $item->imei)->toArray();
                    $sensorDataFormatted = [];

                    $servicesData = $gs_object_services->where('imei', $item->imei)->toArray();
                    $servicesDataFormatted = [];

                    foreach ($sensorData as $sensor) {
                        $sensorDataFormatted[$sensor['sensor_id']] = [
                            'name' => $sensor['name'],
                            'type' => $sensor['type'],
                            'param' => $sensor['param'],
                            'data_list' => $sensor['data_list'],
                            'popup' => $sensor['popup'],
                            'result_type' => $sensor['result_type'],
                            'text_1' => $sensor['text_1'],
                            'text_0' => $sensor['text_0'],
                            'units' => $sensor['units'],
                            'lv' => $sensor['lv'],
                            'hv' => $sensor['hv'],
                            'acc_ignore' => $sensor['acc_ignore'],
                            'formula' => $sensor['formula'],
                            'calibration' => json_decode($sensor['calibration']),
                            'dictionary' => json_decode($sensor['dictionary'])
                        ];
                    }
                    
                    foreach ($servicesData as $service) {
                        $servicesDataFormatted[$service['service_id']] = [
                            "name" => $service['name'],
                            "data_list" => $service['data_list'],
                            "popup" => $service['popup'],
                            "odo" => $service['odo'],
                            "odo_interval" => $service['odo_interval'],
                            "odo_last" => $service['odo_last'],
                            "engh" => $service['engh'],
                            "engh_interval" => $service['engh_interval'],
                            "engh_last" => $service['engh_last'],
                            "days" => $service['days'],
                            "days_interval" => $service['days_interval'],
                            "days_last" => $service['days_last'],
                            "odo_left" => $service['odo_left'],
                            "odo_left_num" => $service['odo_left_num'],
                            "engh_left" => $service['engh_left'],
                            "engh_left_num" => $service['engh_left_num'],
                            "days_left" => $service['days_left'],
                            "days_left_num" => $service['days_left_num'],
                            "update_last" => $service['update_last']
                        ];
                    }

                    $response[$item->imei] = [
                        $item->protocol,
                        "0",
                        "0",
                        "0",
                        $item->name,
                        $item->icon,
                        json_decode($item->map_arrows, true),
                        $item->map_icon,
                        $item->tail_color,
                        $item->tail_points,
                        $item->device,
                        $item->sim_number,
                        $item->model,
                        $item->vin,
                        $item->plate_number,
                        $item->odometer_type,
                        $item->engine_hours_type,
                        $item->odometer,
                        $item->engine_hours,
                        json_decode($item->fcr, true),
                        $item->time_adj,
                        json_decode($item->accuracy, true),
                        $item->unassign_driver,
                        $item->accvirt,
                        [
                            "param" => "",
                            "accvirt_1_cn" => "gr",
                            "accvirt_0_cn" => "lw",
                            "accvirt_1_val" => 12,
                            "accvirt_0_val" => 10
                        ],
                        $item->forward_loc_data,
                        $item->forward_loc_data_imei,
                        $sensorDataFormatted,
                        $servicesDataFormatted,
                        [],
                        ["acc","batteryLevel","blocked","charge","distance","hours","iccid","ignition","motion","result","rssi","sat","status","totalDistance"],
                        $item->active,
                        $item->object_expire,
                        $item->object_expire_dt

                        
                    ];
                }

                return response()->json($response);

            case 'load_event_data':
                $gs_user_events = gs_user_events::where('user_id', $request->user_id)->orderBy('event_id', 'desc')->get();

                $response = [];
                foreach ($gs_user_events as $event) {

                    $response[$event->event_id] = [
                        'type' => $event->type,
                        'name' => $event->name,
                        'active' => $event->active,
                        'duration_from_last_event' => $event->duration_from_last_event,
                        'duration_from_last_event_minutes' => $event->duration_from_last_event_minutes,
                        'week_days' => $event->week_days, // Contoh dengan semua hari aktif
                        'day_time' => json_decode($event->day_time, true),
                        'imei' => $event->imei,
                        'checked_value' => json_decode($event->checked_value, true) ?: $event->checked_value,
                        'route_trigger' => $event->route_trigger,
                        'zone_trigger' => $event->zone_trigger,
                        'routes' => $event->routes,
                        'zones' => $event->zones,
                        'notify_system' => $event->notify_system,
                        'notify_push' => $event->notify_push,
                        'notify_email' => $event->notify_email,
                        'notify_email_address' => $event->notify_email_address,
                        'notify_sms' => $event->notify_sms,
                        'notify_sms_number' => $event->notify_sms_number,
                        'email_template_id' => $event->email_template_id,
                        'sms_template_id' => $event->sms_template_id,
                        'notify_arrow' => $event->notify_arrow,
                        'notify_arrow_color' => $event->notify_arrow_color,
                        'notify_ohc' => $event->notify_ohc,
                        'notify_ohc_color' => $event->notify_ohc_color,
                        'webhook_send' => $event->webhook_send,
                        'webhook_url' => $event->webhook_url,
                        'cmd_send' => $event->cmd_send,
                        'cmd_gateway' => $event->cmd_gateway,
                        'cmd_type' => $event->cmd_type,
                        'cmd_string' => $event->cmd_string,
                        
                    ];
                }

                return response()->json($response);

            case 'load_template_data': //masih statis
                return response()->json([], 200);
            case 'load_kml_data': //masih statis
                return response()->json([], 200);
            case 'load_subaccount_data':
                $gs_user = gs_user::whereJsonContains('privileges->type', 'subuser')->where('manager_id', $request->user_id)->get();
                $response = [];
                foreach ($gs_user as $users) {
                    $privileges = json_decode($users->privileges, true);
                    $response[$users->id] = [
                        'active' => $users->active,
                        'username' => $users->username,
                        'email' => $users->email,
                        'account_expire' => $users->account_expire,
                        'account_expire_dt' => $users->account_expire_dt,
                        'dashboard' => $privileges['dashboard'] ?? false,
                        'history' => $privileges['history'] ?? false,
                        'reports' => $privileges['reports'] ?? false,
                        'tachograph' => $privileges['tachograph'] ?? false,
                        'tasks' => $privileges['tasks'] ?? false,
                        'rilogbook' => $privileges['rilogbook'] ?? false,
                        'dtc' => $privileges['dtc'] ?? false,
                        'maintenance' => $privileges['maintenance'] ?? false,
                        'expenses' => $privileges['expenses'] ?? false,
                        'object_control' => $privileges['object_control'] ?? false,
                        'image_gallery' => $privileges['image_gallery'] ?? false,
                        'chat' => $privileges['chat'] ?? false,
                        'imei' => $privileges['imei'] ?? "",
                        'marker' => $privileges['marker'] ?? "",
                        'route' => $privileges['route'] ?? "",
                        'zone' => $privileges['zone'] ?? "",
                        'au_active' => $privileges['au_active'] ?? false,
                        'au' => $privileges['au'] ?? ""
                    ];
                }

                return response()->json($response);

            case 'load_server_data':
                return response()->json([
                    "url_root" => "https://jontracking.com/",
                    "map_custom" => [],
                    "map_osm" => "true",
                    "map_bing" => "false",
                    "map_google" => "true",
                    "map_google_street_view" => "true",
                    "map_google_traffic" => "true",
                    "map_mapbox" => "false",
                    "map_arcgis" => "false",
                    "map_yandex" => "false",
                    "map_bing_key" => "",
                    "map_mapbox_key" => "",
                    "map_arcgis_key" => "",
                    "routing_osmr_service_url" => "https://router.project-osrm.org/route/v1",
                    "map_layer" => "osm",
                    "map_zoom" => "3",
                    "map_lat" => "-6",
                    "map_lng" => "106.827088",
                    "address_display_object_data_list" => "true",
                    "address_display_event_data_list" => "true",
                    "address_display_history_route_data_list" => "true",
                    "notify_obj_expire" => "true",
                    "notify_obj_expire_period" => "2",
                    "notify_account_expire" => "true",
                    "notify_account_expire_period" => "2",
                    "sim_number" => "true",
                    "object_control_default_templates" => "true"
                ]);
            case 'load_object_list':
                $_search= $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s;
                $gs_user_object = gs_user_object::where('user_id', $request->user_id)->get();
                $imei_values = $gs_user_object->pluck('imei')->toArray();
                $gs_object = gs_object::whereIn('imei', $imei_values)->orderBy($sidx, $sord)
                ->paginate($rows);

                $formattedData = $gs_object->getCollection()->map(function ($item) use ($s, $request) {
                    $gs_user_objects = gs_user_object::where('imei', $item->imei)->first();
                    if ($gs_user_objects) {
                        $group_id = $gs_user_objects->group_id;
                        $gs_user_object_groups = gs_user_object_groups::where('group_id', $group_id)->first();
                        // return $gs_user_object;
                        if ($gs_user_object_groups && $gs_user_object_groups->user_id == $request->user_id) {
                            $users_groups = "<a href=\"#\" onclick=\"settingsObjectGroupProperties('{$gs_user_object_groups->group_id}');\" title=\"Edit\">{$gs_user_object_groups->group_name}</a>";
                        } else {
                            $users_groups = null;
                        }
                    } else {
                        $users_groups = null;
                    }

                    if($item->active == 'false'){
                        $active_object = '<img src="theme/images/remove-red.svg" style="width:12px;" /></a>';
                    }else{
                        $active_object = '<img src="theme/images/tick-green.svg" /></a>';
                    }
                    if ($s) {
                        $cellValues = [
                            $item->imei,
                            $item->name,
                            $item->sim_number,
                        ];
        
                        foreach ($cellValues as $value) {
                            if (stripos($value, $s) !== false) {
                                return [
                                    'id' => $item->imei,
                                    'cell' => [
                                        $item->name,
                                        $item->imei,
                                        $users_groups,
                                        $active_object,
                                        $item->object_expire_dt,
                                        '<a href="#" onclick="settingsObjectEdit(\'' . $item->imei . '\');" title="Edit"><img src="theme/images/copy.svg" /></a><a href="#" onclick="settingsObjectDuplicate(\'' . $item->imei . '\');" title="Duplicate"><img src="theme/images/erase.svg" \/></a><a href="#" onclick="settingsObjectDelete(\'' . $item->imei . '\');" title="Delete"><img src="theme/images/remove3.svg" /></a>'
                                    ]
                                ];
                            }
                        }
                        return null;
                    }
                    return [
                        'id' => $item->imei,
                        'cell' => [
                            $item->name,
                            $item->imei,
                            $users_groups,
                            $active_object,
                            $item->object_expire_dt,
                            '<a href="#" onclick="settingsObjectEdit(\'' . $item->imei . '\');" title="Edit"><img src="theme/images/copy.svg" /></a><a href="#" onclick="settingsObjectDuplicate(\'' . $item->imei . '\');" title="Duplicate"><img src="theme/images/erase.svg" \/></a><a href="#" onclick="settingsObjectDelete(\'' . $item->imei . '\');" title="Delete"><img src="theme/images/remove3.svg" /></a>'
                        ]
                    ];
                })->filter()->values()->all(); 
                $records = $s ? count($formattedData) : $gs_object->total();
                $totalPages = ($s && $records > 0) ? count($formattedData) : $gs_object->lastPage();
                if ($records >= 1){
                    $response = [
                        'page' => $gs_object->currentPage(),
                        'total' => $totalPages,
                        'records' => $records,
                        'rows' => $formattedData,
                    ];
                }else{
                    $response = [
                        'page' => $gs_object->currentPage(),
                        'total' => $totalPages,
                        'records' => $records,
                    ];
                }
                return response()->json($response);

            case 'load_object_group_list':
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s;

                $groups = gs_user_object_groups::where('user_id', $request->user_id)
                                                ->orderBy($sidx, $sord);

                if ($_search) {
                    $searchTerm = strtolower($s); // Mengonversi term pencarian ke huruf kecil
                    
                    $groups->where(function($query) use ($searchTerm) {
                        $query->whereRaw('LOWER(group_name) like ?', ['%' . $searchTerm . '%'])
                            ->orWhere('group_id', 'like', '%' . $searchTerm . '%');
                    });
                }

                $groups = $groups->get();

                $data = [];

                foreach ($groups as $group) {
                    // Menghitung total_data_imei dari hasil yang telah difilter
                    $total_data_imei = $group->userObjects->count();

                    $cell = [
                        $group->group_name,
                        $total_data_imei,
                        "",
                        "<a href=\"#\" onclick=\"settingsObjectGroupProperties('$group->group_id');\" title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"settingsObjectGroupDelete('$group->group_id');\" title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                    ];

                    $data[] = [
                        'id' => (string)$group->group_id,
                        'cell' => $cell
                    ];
                }

                if (count($data) > 0) {
                    $response = [
                        'page' => $page,
                        'total' => ceil(count($groups) / $rows),
                        'records' => count($data),
                        'rows' => $data
                    ];
                } else {
                    $response = [
                        'page' => $page,
                        'total' => 1,
                        'records' => 0
                    ];
                }

                return response()->json($response);

            case 'load_object_driver_list':
                // Ambil request_userid dari request
                $requestUserId = $request->input('request_userid');

                // Set nilai-nilai yang diperlukan untuk paginasi dan pencarian
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s;

                // Query berdasarkan user_id
                $query = gs_user_object_drivers::where('user_id', $request->user_id);

                // Jika fitur pencarian diaktifkan
                if ($_search == 'true' && !empty($s)) {
                    $query->where(function ($q) use ($s) {
                        $q->where('driver_name', 'like', '%' . $s . '%')
                            ->orWhere('driver_idn', 'like', '%' . $s . '%')
                            ->orWhere('driver_desc', 'like', '%' . $s . '%');
                    });
                }

                // Lakukan sorting berdasarkan sidx dan sord
                $query->orderBy($sidx, $sord);

                // Lakukan paginasi
                $drivers = $query->paginate($rows);
                if ($drivers->isEmpty()) {
                    // Jika tidak ada hasil, kembalikan respons kosong
                    return response()->json([
                        'page' => $page,
                        'total' => 1,
                        'records' => 0,
                    ]);
                }

                // Buat struktur responsenya
                $response = [
                    'page' => $page,
                    'total' => $drivers->lastPage(),
                    'records' => $drivers->total(),
                    'rows' => []
                ];
                

                foreach ($drivers as $driver) {
                    // Buat baris untuk setiap driver
                    $row = [
                        'id' => (string)$driver->driver_id,
                        'cell' => [
                            $driver->driver_name,
                            $driver->driver_idn,
                            $driver->driver_desc,
                            "<a href=\"#\" onclick=\"settingsObjectDriverProperties('$driver->driver_id');\"  title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"settingsObjectDriverDelete('$driver->driver_id');\"  title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                        ]
                    ];
                    // Tambahkan baris ke dalam responsenya
                    $response['rows'][] = $row;
                }

                // Kembalikan responsenya dalam format JSON
                return response()->json($response);

            case 'load_object_passenger_list':
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s;

                // Query berdasarkan user_id
                $query = gs_user_object_passengers::where('user_id', $request->user_id);

                // Jika fitur pencarian diaktifkan
                if ($_search == 'true' && !empty($s)) {
                    $query->where(function ($q) use ($s) {
                        $q->where('passenger_name', 'like', '%' . $s . '%')
                            ->orWhere('passenger_idn', 'like', '%' . $s . '%')
                            ->orWhere('passenger_desc', 'like', '%' . $s . '%');
                    });
                }

                // Lakukan sorting berdasarkan sidx dan sord
                $query->orderBy($sidx, $sord);

                // Lakukan paginasi
                $passenger = $query->paginate($rows);
                if ($passenger->isEmpty()) {
                    // Jika tidak ada hasil, kembalikan respons kosong
                    return response()->json([
                        'page' => $page,
                        'total' => 1,
                        'records' => 0,
                    ]);
                }

                // Buat struktur responsenya
                $response = [
                    'page' => $page,
                    'total' => $passenger->lastPage(),
                    'records' => $passenger->total(),
                    'rows' => []
                ];
                

                foreach ($passenger as $passengers) {
                    // Buat baris untuk setiap passengers
                    $row = [
                        'id' => (string)$passengers->passenger_id,
                        'cell' => [
                            $passengers->passenger_name,
                            $passengers->passenger_idn,
                            $passengers->passenger_desc,
                            "<a href=\"#\" onclick=\"settingsObjectPassengerProperties('$passengers->passenger_id');\"  title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"settingsObjectPassengerDelete('$passengers->passenger_id');\"  title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                        ]
                    ];
                    // Tambahkan baris ke dalam responsenya
                    $response['rows'][] = $row;
                }

                // Kembalikan responsenya dalam format JSON
                return response()->json($response);
            
            case 'load_object_trailer_list':
                    $_search = $request->_search;
                    $rows = $request->rows;
                    $page = $request->page;
                    $sidx = $request->sidx;
                    $sord = $request->sord;
                    $s = $request->s;
    
                    // Query berdasarkan user_id
                    $query = gs_user_object_trailers::where('user_id', $request->user_id);
    
                    // Jika fitur pencarian diaktifkan
                    if ($_search == 'true' && !empty($s)) {
                        $query->where(function ($q) use ($s) {
                            $q->where('trailer_name', 'like', '%' . $s . '%')
                                ->orWhere('trailer_desc', 'like', '%' . $s . '%');
                        });
                    }
    
                    // Lakukan sorting berdasarkan sidx dan sord
                    $query->orderBy($sidx, $sord);
    
                    // Lakukan paginasi
                    $trailer = $query->paginate($rows);
                    if ($trailer->isEmpty()) {
                        // Jika tidak ada hasil, kembalikan respons kosong
                        return response()->json([
                            'page' => $page,
                            'total' => 1,
                            'records' => 0,
                        ]);
                    }
    
                    // Buat struktur responsenya
                    $response = [
                        'page' => $page,
                        'total' => $trailer->lastPage(),
                        'records' => $trailer->total(),
                        'rows' => []
                    ];
                    
    
                    foreach ($trailer as $trailers) {
                        // Buat baris untuk setiap trailers
                        $row = [
                            'id' => (string)$trailers->trailer_id,
                            'cell' => [
                                $trailers->trailer_name,
                                $trailers->trailer_desc,
                                "<a href=\"#\" onclick=\"settingsObjectTrailerProperties('$trailers->trailer_id');\"  title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"settingsObjectTrailerDelete('$trailers->trailer_id');\"  title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                            ]
                        ];
                        // Tambahkan baris ke dalam responsenya
                        $response['rows'][] = $row;
                    }
    
                    // Kembalikan responsenya dalam format JSON
                    return response()->json($response);

            case 'load_event_list':
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s;

                // Query berdasarkan user_id
                $query = gs_user_events::where('user_id', $request->user_id);

                // Jika fitur pencarian diaktifkan
                if ($_search == 'true' && !empty($s)) {
                    $query->where(function ($q) use ($s) {
                        $q->where('name', 'like', '%' . $s . '%');
                    });
                }

                // Lakukan sorting berdasarkan sidx dan sord
                $query->orderBy($sidx, $sord);

                // Lakukan paginasi
                $event = $query->paginate($rows);
                if ($event->isEmpty()) {
                    // Jika tidak ada hasil, kembalikan respons kosong
                    return response()->json([
                        'page' => $page,
                        'total' => 1,
                        'records' => 0,
                    ]);
                }

                // Buat struktur responsenya
                $response = [
                    'page' => $page,
                    'total' => $event->lastPage(),
                    'records' => $event->total(),
                    'rows' => []
                ];
                

                foreach ($event as $events) {
                    // Buat baris untuk setiap events
                    $string = $events->notify_system;
                    $con1 = "<img src=\"theme\/images\/tick-green.svg\" \/>";
                    $con2 = "<img src=\"theme\/images\/remove-red.svg\" style=\"width:12px;\" \/>";
                    $row = [
                        'id' => (string)$events->event_id,
                        'cell' => [
                            $events->name,
                            $events->active,
                            explode(',', $string)[0] === "true" ? $con1 : $con2,
                            $events->notify_push === "true" ? $con1 : $con2,
                            $events->notify_email === "true" ? $con1 : $con2,
                            $events->notify_sms === "true" ? $con1 : $con2,
                            "<a href=\"#\" onclick=\"settingsEventProperties('$events->event_id');\"  title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"settingsEventDelete('$events->event_id');\"  title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                        ]
                    ];
                    // Tambahkan baris ke dalam responsenya
                    $response['rows'][] = $row;
                }

                // Kembalikan responsenya dalam format JSON
                return response()->json($response);

            case 'load_template_list':
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s;

                // Query berdasarkan user_id
                $query = gs_user_templates::where('user_id', $request->user_id);

                // Jika fitur pencarian diaktifkan
                if ($_search == 'true' && !empty($s)) {
                    $query->where(function ($q) use ($s) {
                        $q->where('name', 'like', '%' . $s . '%');
                    });
                }

                // Lakukan sorting berdasarkan sidx dan sord
                $query->orderBy($sidx, $sord);

                // Lakukan paginasi
                $template = $query->paginate($rows);
                if ($template->isEmpty()) {
                    // Jika tidak ada hasil, kembalikan respons kosong
                    return response()->json([
                        'page' => $page,
                        'total' => 1,
                        'records' => 0,
                    ]);
                }

                // Buat struktur responsenya
                $response = [
                    'page' => $page,
                    'total' => $template->lastPage(),
                    'records' => $template->total(),
                    'rows' => []
                ];
                

                foreach ($template as $templates) {
                    // Buat baris untuk setiap templates
                    $row = [
                        'id' => (string)$templates->template_id,
                        'cell' => [
                            $templates->name,
                            $templates->desc,
                            "<a href=\"#\" onclick=\"settingsTemplateProperties('$templates->template_id');\"  title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"settingsTemplateDelete('$templates->template_id');\"  title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                            
                        ]
                    ];
                    // Tambahkan baris ke dalam responsenya
                    $response['rows'][] = $row;
                }

                // Kembalikan responsenya dalam format JSON
                return response()->json($response);

            case 'load_kml_list':
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s;

                // Query berdasarkan user_id
                $query = gs_user_kml::where('user_id', $request->user_id);

                // Jika fitur pencarian diaktifkan
                if ($_search == 'true' && !empty($s)) {
                    $query->where(function ($q) use ($s) {
                        $q->where('name', 'like', '%' . $s . '%');
                    });
                }

                // Lakukan sorting berdasarkan sidx dan sord
                $query->orderBy($sidx, $sord);

                // Lakukan paginasi
                $kml = $query->paginate($rows);
                if ($kml->isEmpty()) {
                    // Jika tidak ada hasil, kembalikan respons kosong
                    return response()->json([
                        'page' => $page,
                        'total' => 1,
                        'records' => 0,
                    ]);
                }

                // Buat struktur responsenya
                $response = [
                    'page' => $page,
                    'total' => $kml->lastPage(),
                    'records' => $kml->total(),
                    'rows' => []
                ];
                

                foreach ($kml as $kmls) {
                    $con1 = "<img src=\"theme\/images\/tick-green.svg\" \/>";
                    $con2 = "<img src=\"theme\/images\/remove-red.svg\" style=\"width:12px;\" \/>";
                    // Buat baris untuk setiap kmls
                    $row = [
                        'id' => (string)$kmls->kml_id,
                        'cell' => [
                            $kmls->name,
                            $kmls->active === "true" ? $con1 : $con2,
                            $kmls->desc,
                            "<a href=\"#\" onclick=\"settingsKMLProperties('$kmls->kml_id');\"  title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"settingsKMLDelete('$kmls->kml_id');\"  title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                            
                        ]
                    ];
                    // Tambahkan baris ke dalam responsenya
                    $response['rows'][] = $row;
                }

                // Kembalikan responsenya dalam format JSON
                return response()->json($response);

            case 'load_subaccount_list': //masih static di bagian response untuk total objeck
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s;

                // Query berdasarkan user_id
                $user = gs_user::find($request->user_id);
                $query = gs_user::whereJsonContains('privileges->type', 'subuser')->where('manager_id', $request->user_id);

                // Jika fitur pencarian diaktifkan
                if ($_search == 'true' && !empty($s)) {
                    $query->where(function ($q) use ($s) {
                        $q->where('name', 'like', '%' . $s . '%');
                    });
                }

                // Lakukan sorting berdasarkan sidx dan sord
                $query->orderBy($sidx, $sord);

                // Lakukan paginasi
                $subaccount = $query->paginate($rows);
                if ($subaccount->isEmpty()) {
                    // Jika tidak ada hasil, kembalikan respons kosong
                    return response()->json([
                        'page' => $page,
                        'total' => 1,
                        'records' => 0,
                    ]);
                }

                // Buat struktur responsenya
                $response = [
                    'page' => $page,
                    'total' => $subaccount->lastPage(),
                    'records' => $subaccount->total(),
                    'rows' => []
                ];
                

                foreach ($subaccount as $subaccounts) {
                    $con1 = "<img src=\"theme\/images\/tick-green.svg\" \/>";
                    $con2 = "<img src=\"theme\/images\/remove-red.svg\" style=\"width:12px;\" \/>";
                    // Buat baris untuk setiap subaccounts
                    $row = [
                        'id' => (string)$subaccounts->id,
                        'cell' => [
                            $subaccounts->username,
                            $subaccounts->email,
                            $subaccounts->active === "true" ? $con1 : $con2,
                            "",//masih static di bagian response untuk total objeck
                            "0/0/0",//masih static
                            "<a href=\"#\" onclick=\"settingsSubaccountProperties('$subaccounts->id');\"  title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"settingsSubaccountDelete('$subaccounts->id');\"  title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                            
                        ]
                    ];
                    // Tambahkan baris ke dalam responsenya
                    $response['rows'][] = $row;
                }

                // Kembalikan responsenya dalam format JSON
                return response()->json($response);
            default:
                return response()->json(['error' => 'Invalid action'], 400);
        }
    }

    public function fn_events(Request $request)
    {
        switch ($request->cmd) {
            case 'load_event_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);


            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }
    
    public function fn_places(Request $request)
    {
        switch ($request->cmd) {
            case 'load_places_group_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            case 'load_marker_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            case 'load_route_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            case 'load_zone_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_history(Request $request)
    {
        switch ($request->cmd) {
            case 'load_msg_list_empty'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_share(Request $request)
    {
        switch ($request->cmd) {
            case 'load_share_position_list':
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s;

                // Query berdasarkan user_id
                $query = gs_user_share_position::where('user_id', $request->user_id);

                // Jika fitur pencarian diaktifkan
                if ($_search == 'true' && !empty($s)) {
                    $query->where(function ($q) use ($s) {
                        $q->where($sidx, 'like', '%' . $s . '%');
                    });
                }

                // Lakukan sorting berdasarkan sidx dan sord
                $query->orderBy($sidx, $sord);

                // Lakukan paginasi
                $share = $query->paginate($rows);
                if ($share->isEmpty()) {
                    // Jika tidak ada hasil, kembalikan respons kosong
                    return response()->json([
                        'page' => $page,
                        'total' => 1,
                        'records' => 0,
                    ]);
                }

                // Buat struktur responsenya
                $response = [
                    'page' => $page,
                    'total' => $share->lastPage(),
                    'records' => $share->total(),
                    'rows' => []
                ];
                

                foreach ($share as $shares) {
                    $con1 = "<img src=\"theme\/images\/tick-green.svg\" \/>";
                    $con2 = "<img src=\"theme\/images\/remove-red.svg\" style=\"width:12px;\" \/>";
                    // Buat baris untuk setiap shares
                    $row = [
                        'id' => (string)$shares->share_id,
                        'cell' => [
                            $shares->name,
                            $shares->email,
                            $shares->phone,
                            "1",// masihstatis
                            $shares->active === "true" ? $con1 : $con2,
                            $shares->expire_dt,
                            "<a href=\"#\" onclick=\"sharePositionProperties('$shares->share_id');\"  title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"sharePositionDelete('$shares->share_id');\"  title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                            
                        ]
                    ];
                    // Tambahkan baris ke dalam responsenya
                    $response['rows'][] = $row;
                }

                // Kembalikan responsenya dalam format JSON
                return response()->json($response);
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_tasks(Request $request)
    {
        switch ($request->cmd) {
            case 'load_task_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_reports(Request $request)
    {
        switch ($request->cmd) {
            case 'load_report_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);

            case 'load_reports_generated_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_rilogbook(Request $request)
    {
        switch ($request->cmd) {
            case 'load_rilogbook_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_dtc(Request $request)
    {
        switch ($request->cmd) {
            case 'load_dtc_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_maintenance(Request $request)
    {
        switch ($request->cmd) {
            case 'load_maintenance_list'://masih statis
                $data = [
                    "page" => "1",
                    "total" => 1,
                    "records" => 8,
                    "rows" => [
                        [
                            "id" => "2587",
                            "cell" => [
                                "JONUSA BEAT",
                                "Ganti oli",
                                "1991 km",
                                "1962 km",
                                "0 h",
                                "-",
                                16,
                                74,
                                "<img src=\"theme/images/tick-green.svg\" />",
                                "<a href=\"#\" onclick=\"maintenanceObjectServiceProperties('864943041910304','2587');\" title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"maintenanceServiceDelete('2587');\" title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                            ]
                        ],
                        [
                            "id"=> "2599",
                            "cell"=> [
                                "JONUSA BEAT",
                                "Perpanjangan STNK",
                                "1991 km",
                                "-",
                                "0 h",
                                "-",
                                327,
                                38,
                                "<img src=\"theme\/images\/tick-green.svg\" \/>",
                                "<a href=\"#\" onclick=\"maintenanceObjectServiceProperties('864943041910304','2599');\" title=\"Edit\"><img src=\"theme\/images\/edit.svg\" \/><\/a><a href=\"#\" onclick=\"maintenanceServiceDelete('2599');\" title=\"Delete\"><img src=\"theme\/images\/remove3.svg\" \/><\/a>"
                            ]
                        ],
                        [
                            "id"=> "6",
                            "cell"=> [
                                "JONUSA BLADE",
                                "Ganti oli",
                                "879401 km",
                                "1750 km",
                                "0 h",
                                "-",
                                1,
                                59,
                                "<img src=\"theme\/images\/tick-green.svg\" \/>",
                                "<a href=\"#\" onclick=\"maintenanceObjectServiceProperties('351777090936012','6');\" title=\"Edit\"><img src=\"theme\/images\/edit.svg\" \/><\/a><a href=\"#\" onclick=\"maintenanceServiceDelete('6');\" title=\"Delete\"><img src=\"theme\/images\/remove3.svg\" \/><\/a>"
                            ]
                        ],
                        [
                            "id"=> "9",
                            "cell"=> [
                                "JONUSA BLADE",
                                "Perpanjangan STNK",
                                "879401 km",
                                "-",
                                "0 h",
                                "-",
                                227,
                                138,
                                "<img src=\"theme\/images\/tick-green.svg\" \/>",
                                "<a href=\"#\" onclick=\"maintenanceObjectServiceProperties('351777090936012','9');\" title=\"Edit\"><img src=\"theme\/images\/edit.svg\" \/><\/a><a href=\"#\" onclick=\"maintenanceServiceDelete('9');\" title=\"Delete\"><img src=\"theme\/images\/remove3.svg\" \/><\/a>"
                            ]
                        ],
                        [
                            "id"=> "1",
                            "cell"=> [
                                "JONUSA VARIO",
                                "Ganti oli",
                                "8521 km",
                                "692 km",
                                "0 h",
                                "-",
                                1,
                                59,
                                "<img src=\"theme\/images\/tick-green.svg\" \/>",
                                "<a href=\"#\" onclick=\"maintenanceObjectServiceProperties('862292052056025','1');\" title=\"Edit\"><img src=\"theme\/images\/edit.svg\" \/><\/a><a href=\"#\" onclick=\"maintenanceServiceDelete('1');\" title=\"Delete\"><img src=\"theme\/images\/remove3.svg\" \/><\/a>"
                            ]
                        ],
                        [
                            "id"=> "4",
                            "cell"=> [
                                "JONUSA VARIO",
                                "Perpanjangan STNK",
                                "8521 km",
                                "-",
                                "0 h",
                                "-",
                                337,
                                28,
                                "<img src=\"theme\/images\/tick-green.svg\" \/>",
                                "<a href=\"#\" onclick=\"maintenanceObjectServiceProperties('862292052056025','4');\" title=\"Edit\"><img src=\"theme\/images\/edit.svg\" \/><\/a><a href=\"#\" onclick=\"maintenanceServiceDelete('4');\" title=\"Delete\"><img src=\"theme\/images\/remove3.svg\" \/><\/a>"
                            ]
                        ],
                        [
                            "id"=> "2534",
                            "cell"=> [
                                "SIGRA",
                                "Ganti oli",
                                "12639 km",
                                "8586 km",
                                "0 h",
                                "-",
                                40,
                                140,
                                "<img src=\"theme\/images\/tick-green.svg\" \/>",
                                "<a href=\"#\" onclick=\"maintenanceObjectServiceProperties('3525030965','2534');\" title=\"Edit\"><img src=\"theme\/images\/edit.svg\" \/><\/a><a href=\"#\" onclick=\"maintenanceServiceDelete('2534');\" title=\"Delete\"><img src=\"theme\/images\/remove3.svg\" \/><\/a>"
                            ]
                        ],
                        [
                            "id"=> "2535",
                            "cell"=> [
                                "SIGRA",
                                "Perpanjangan STNK",
                                "12639 km",
                                "-",
                                "0 h",
                                "-",
                                164,
                                201,
                                "<img src=\"theme\/images\/tick-green.svg\" \/>",
                                "<a href=\"#\" onclick=\"maintenanceObjectServiceProperties('3525030965','2535');\" title=\"Edit\"><img src=\"theme\/images\/edit.svg\" \/><\/a><a href=\"#\" onclick=\"maintenanceServiceDelete('2535');\" title=\"Delete\"><img src=\"theme\/images\/remove3.svg\" \/><\/a>"
                            ]
                        ],
                        // Add more rows as needed
                    ]
                ];
        
                // Encode the data into JSON format
                $jsonResponse = json_encode($data);
        
                // Return JSON response
                return response($jsonResponse)->header('Content-Type', 'application/json');
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_expenses(Request $request)
    {
        switch ($request->cmd) {
            case 'load_expenses_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_cmd(Request $request)
    {
        switch ($request->cmd) {
            case 'load_cmd_gprs_exec_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'records' => 0,
                ]);

            case 'load_cmd_sms_exec_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'records' => 0,
                ]);
            
            case 'load_cmd_schedule_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'records' => 0,
                ]);

            case 'load_cmd_template_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'records' => 0,
                ]);
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_img(Request $request)
    {
        switch ($request->cmd) {
            case 'load_img_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_billing(Request $request)
    {
        switch ($request->cmd) {
            case 'load_billing_plan_list'://masih statis
                return response()->json([
                    'page' => "1",
                    'total' => 1,
                    'records' => 0,
                ]);
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }

    public function fn_objects(Request $request)
    {
        switch ($request->cmd) {
            case 'load_object_data'://masih statis
                $jsonData = [
                    "351777090936012" => [
                        "v" => true,
                        "f" => false,
                        "s" => false,
                        "evt" => false,
                        "evtac" => false,
                        "evtohc" => false,
                        "a" => "",
                        "l" => [],
                        "d" => [
                            [
                                "2024-06-08 10:36:24",
                                "2024-06-08 01:23:21",
                                "-6.272835",
                                "106.945102",
                                "0",
                                "197",
                                0,
                                [
                                    "acc" => "0",
                                    "archive" => "0",
                                    "batteryLevel" => "100",
                                    "blocked" => "1",
                                    "charge" => "1",
                                    "distance" => "0",
                                    "event" => "8",
                                    "hours" => "1166684000",
                                    "iccid" => "8962100759327133537",
                                    "ignition" => "0",
                                    "motion" => "0",
                                    "result" => "OK!",
                                    "rssi" => "4",
                                    "sat" => "7",
                                    "status" => "133",
                                    "totalDistance" => "12543474.83"
                                ]
                            ]
                        ],
                        "lif" => "",
                        "st" => "s",
                        "ststr" => "Stopped 9 h 15 min 11 s",
                        "p" => "gt06",
                        "cn" => 2,
                        "o" => 879401,
                        "eh" => "0",
                        "sr" => [
                            [
                                "name" => "Ganti oli",
                                "data_list" => "true",
                                "popup" => "true",
                                "status" => "Left (1750 km, 59 d)"
                            ],
                            [
                                "name" => "Perpanjangan STNK",
                                "data_list" => "true",
                                "popup" => "true",
                                "status" => "Left (138 d)"
                            ]
                        ]
                    ],
                    "3525030965" => [
                        "v" => true,
                        "f" => false,
                        "s" => false,
                        "evt" => false,
                        "evtac" => false,
                        "evtohc" => false,
                        "a" => "",
                        "l" => [],
                        "d" => [],
                        "lif" => "",
                        "st" => false,
                        "ststr" => "",
                        "p" => "gt06",
                        "cn" => 0,
                        "o" => 12639,
                        "eh" => "0",
                        "sr" => [
                            [
                                "name" => "Ganti oli",
                                "data_list" => "true",
                                "popup" => "true",
                                "status" => "Left (8586 km, 140 d)"
                            ],
                            [
                                "name" => "Perpanjangan STNK",
                                "data_list" => "true",
                                "popup" => "true",
                                "status" => "Left (201 d)"
                            ]
                        ]
                    ],
                    "862292052056025" => [
                        "v" => true,
                        "f" => false,
                        "s" => false,
                        "evt" => false,
                        "evtac" => false,
                        "evtohc" => false,
                        "a" => "",
                        "l" => [],
                        "d" => [
                            [
                                "2024-06-08 10:37:03",
                                "2024-06-06 12:20:31",
                                "-6.228084",
                                "106.921956",
                                "0",
                                "200",
                                0,
                                [
                                    "acc" => "0",
                                    "adc1" => "12.3",
                                    "archive" => "0",
                                    "batteryLevel" => "83",
                                    "blocked" => "0",
                                    "charge" => "1",
                                    "distance" => "0",
                                    "event" => "4",
                                    "hours" => "1717275206000",
                                    "iccid" => "8962100759328169548",
                                    "ignition" => "0",
                                    "motion" => "0",
                                    "odometer" => "72010",
                                    "result" => "OK!",
                                    "rssi" => "4",
                                    "sat" => "4",
                                    "status" => "4",
                                    "totalDistance" => "12131994.13"
                                ]
                            ]
                        ],
                        "lif" => "",
                        "st" => "s",
                        "ststr" => "Stopped 1 d 22 h 18 min 1 s",
                        "p" => "gt06",
                        "cn" => 2,
                        "o" => 8521,
                        "eh" => "0",
                        "sr" => [
                            [
                                "name" => "Ganti oli",
                                "data_list" => "true",
                                "popup" => "true",
                                "status" => "Left (692 km, 59 d)"
                            ],
                            [
                                "name" => "Perpanjangan STNK",
                                "data_list" => "true",
                                "popup" => "true",
                                "status" => "Left (28 d)"
                            ]
                        ]
                    ],
                    "864943041910304" => [
                        "v" => true,
                        "f" => false,
                        "s" => false,
                        "evt" => false,
                        "evtac" => false,
                        "evtohc" => false,
                        "a" => "",
                        "l" => [],
                        "d" => [
                            [
                                "2024-06-08 10:38:25",
                                "2024-06-08 10:38:24",
                                "-8.142239",
                                "114.398764",
                                "0",
                                "0",
                                0,
                                [
                                    "acc" => "0",
                                    "batteryLevel" => "83",
                                    "blocked" => "0",
                                    "charge" => "1",
                                    "distance" => "0",
                                    "hours" => "35704000",
                                    "ignition" => "0",
                                    "motion" => "0",
                                    "result" => "TIMER ACC ON:30s,ACC OFF:30s",
                                    "rssi" => "4",
                                    "sat" => "9",
                                    "status" => "69",
                                    "totalDistance" => "82501.32"
                                ]
                            ]
                        ],
                        "lif" => "",
                        "st" => "s",
                        "ststr" => "Stopped 8 s",
                        "p" => "gt06",
                        "cn" => 2,
                        "o" => 1991,
                        "eh" => "0",
                        "sr" => [
                            [
                                "name" => "Ganti oli",
                                "data_list" => "true",
                                "popup" => "true",
                                "status" => "Left (1962 km, 74 d)"
                            ],
                            [
                                "name" => "Perpanjangan STNK",
                                "data_list" => "true",
                                "popup" => "true",
                                "status" => "Left (38 d)"
                            ]
                        ]
                    ]
                    // Add more entries if needed
                ];
            
                return response()->json($jsonData);
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);

        }
    }
    
}
