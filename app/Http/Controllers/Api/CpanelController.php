<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\gs_user;
use App\Models\gs_themes;
use App\Models\gs_object;
use App\Models\gs_billing_plans;
use App\Models\gs_templates;
use App\Models\gs_user_object;
use Carbon\Carbon;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\Mailer\Exception\TransportException;
use Illuminate\Support\Facades\DB;

use GuzzleHttp\Client;

class CpanelController extends Controller
{
    public function fn_cpanel(Request $request)
    {   
        switch ($request->cmd) {
            case 'load_cpanel_data':
                $users = gs_user::find($request->user_id);
                if (!$users) {
                    return response()->json(['message' => 'Not found'], 404);
                }
                $jsonData = $users['privileges'];
                $dataArray = json_decode($jsonData, true);
                $values = array_values($dataArray);
                $user_idd = $users['id'];
                $username = $users['username'];
                return response()->json([
                    'user_id' => $user_idd,
                    'privileges' => $values[0],
                    'manager_id' => $users['manager_id'],
                    'obj_add' => $users['obj_add'],
                    'obj_limit' => $users['obj_limit'],
                    'obj_limit_num' => $users['obj_limit_num'],
                    'obj_days' => $users['obj_days'],
                    'obj_days_dt' => $users['obj_days_dt'],
                    'language' => $users['language'],
                    'info'=> "<a href=\"#\" onclick=\"userEdit($user_idd);\" title=\"My account\"><img src=\"theme/images/user.svg\" style=\"width:12px;\" \/><span>$username</span>",
                ]);
            case 'load_manager_list':
                // $manager_id = gs_user::find("296");
                $response = [];
                $data = gs_user::whereJsonContains('privileges->type', 'manager')->get();
                foreach ($data as $manager) {
                    $manager_id = $manager->id;
                    $total_users = gs_user::where('manager_id', $manager_id)->count();
                    $total_objects = gs_object::where('manager_id', $manager_id)->count();
                    $username = $manager->username . ' (' . $total_users . ' - ' . $total_objects . '/' . $manager->obj_limit_num . ')';
                    $response[$manager_id] = [
                        'username' => $username,
                    ];
                }
                return response()->json($response);
            case 'load_server_data':
                return response()->json([
                    'server_api_key'=> '',
                    'server_api_ip'=> '',
                    'url_login'=> 'https=>//jontracking.com',
                    'url_help'=> 'https=>//wa.me/message/NAJBHDAXPOBQD1',
                    'url_contact'=> 'https=>//wa.me/message/NAJBHDAXPOBQD1',
                    'url_shop'=> '',
                    'url_sms_gateway_app'=> 'https=>//websms.co.id/api/smsgateway?token=5711f42fc8714f68b6aea4d5ccf363ee&to=%NUMBER%&msg=%MESSAGE%',
                    'connection_timeout'=> '5',
                    'history_period'=> '90',
                    'db_backup_time'=> '00=>00',
                    'db_backup_email'=> 'jonnusantara@gmail.com',
                    'name'=> 'JON Tracking',
                    'generator'=> 'JON Tracking Software',
                    'about'=> 'true',
                    'help_page'=> 'true',
                    'logo'=> 'logo.png',
                    'logo_small'=> 'logo_small.png',
                    'map_osm'=> 'true',
                    'map_bing'=> 'false',
                    'map_google'=> 'true',
                    'map_google_street_view'=> 'true',
                    'map_google_traffic'=> 'true',
                    'map_mapbox'=> 'false',
                    'map_arcgis'=> 'false',
                    'map_yandex'=> 'false',
                    'geocoder_service'=> 'nominatim',
                    'geocoder_cache'=> 'true',
                    'map_bing_key'=> '',
                    'map_google_key'=> 'AIzaSyCqFagr-wKLCNqe0ePlZhu57kgVf92qshU',
                    'map_mapbox_key'=> '',
                    'map_arcgis_key'=> '',
                    'map_yandex_key'=> '',
                    'geocoder_bing_key'=> '',
                    'geocoder_google_key'=> '',
                    'geocoder_mapbox_key'=> '',
                    'geocoder_pickpoint_key'=> '',
                    'routing_osmr_service_url'=> 'https=>//router.project-osrm.org/route/v1',
                    'map_layer'=> 'osm',
                    'map_zoom'=> '3',
                    'map_lat'=> '-6',
                    'map_lng'=> '106.827088',
                    'address_display_object_data_list'=> 'true',
                    'address_display_event_data_list'=> 'true',
                    'address_display_history_route_data_list'=> 'true',
                    'page_after_login'=> 'account',
                    'show_hide_password'=> 'true',
                    'allow_registration'=> 'true',
                    'account_expire'=> 'true',
                    'account_expire_period'=> '2',
                    'user_map_osm'=> 'true',
                    'user_map_bing'=> 'true',
                    'user_map_google'=> 'true',
                    'user_map_google_street_view'=> 'true',
                    'user_map_google_traffic'=> 'true',
                    'user_map_mapbox'=> 'false',
                    'user_map_arcgis'=> 'false',
                    'user_map_yandex'=> 'false',
                    'language'=> 'indonesian',
                    'unit_of_distance'=> 'km',
                    'unit_of_capacity'=> 'l',
                    'unit_of_temperature'=> 'c',
                    'currency'=> 'IDR',
                    'timezone'=> '+ 7 hour',
                    'dst'=> 'false',
                    'dst_start'=> '',
                    'dst_end'=> '',
                    'obj_add'=> 'trial',
                    'obj_limit'=> 'true',
                    'obj_limit_num'=> '1',
                    'obj_days'=> 'true',
                    'obj_days_num'=> '365',
                    'obj_days_trial'=> '2',
                    'obj_edit'=> 'true',
                    'obj_delete'=> 'false',
                    'obj_history_clear'=> 'true',
                    'kml'=> 'true',
                    'dashboard'=> 'true',
                    'history'=> 'true',
                    'reports'=> 'true',
                    'tachograph'=> 'true',
                    'tasks'=> 'true',
                    'rilogbook'=> 'true',
                    'dtc'=> 'true',
                    'maintenance'=> 'true',
                    'expenses'=> 'true',
                    'object_control'=> 'true',
                    'image_gallery'=> 'true',
                    'chat'=> 'true',
                    'subaccounts'=> 'true',
                    'sms_gateway_server'=> 'true',
                    'api'=> 'true',
                    'notify_obj_expire'=> 'true',
                    'notify_obj_expire_period'=> '2',
                    'notify_account_expire'=> 'true',
                    'notify_account_expire_period'=> '2',
                    'sim_number'=> 'true',
                    'reports_schedule'=> 'true',
                    'object_control_default_templates'=> 'true',
                    'places_markers'=> '0',
                    'places_routes'=> '0',
                    'places_zones'=> '0',
                    'usage_email_daily'=> '0',
                    'usage_sms_daily'=> '10000',
                    'usage_webhook_daily'=> '0',
                    'usage_api_daily'=> '0',
                    'billing'=> 'true',
                    'billing_gateway'=> 'custom',
                    'billing_currency'=> 'IDR',
                    'billing_recover_plan'=> 'true',
                    'billing_paypalv2_account'=> '',
                    'billing_paypalv2_client_id'=> '',
                    'billing_paypalv2_custom'=> '',
                    'billing_paypalv2_ipn_url'=> 'https=>//jontracking.com//api/billing/paypal.php',
                    'billing_paypal_account'=> '',
                    'billing_paypal_custom'=> '',
                    'billing_paypal_ipn_url'=> 'https=>//jontracking.com//api/billing/paypal.php',
                    'billing_custom_url'=> 'https=>//wa.me/6281111111531',
                    'email'=> 'support@jontracking.com',
                    'email_no_reply'=> '',
                    'email_signature'=> '--\njontracking.com',
                    'email_smtp'=> 'true',
                    'email_smtp_host'=> 'mail.jontracking.com',
                    'email_smtp_port'=> '465',
                    'email_smtp_auth'=> 'true',
                    'email_smtp_secure'=> 'ssl',
                    'email_smtp_username'=> 'support@jontracking.com',
                    'email_smtp_password'=> '@Jonusa230!',
                    'sms_gateway'=> 'true',
                    'sms_gateway_type'=> 'http',
                    'sms_gateway_number_filter'=> '',
                    'sms_gateway_url'=> 'http=>//pengirimwa.my.id/send-wa?hp=%NUMBER%&msg=%MESSAGE%&key=2aa2210894b1b5283c07c326a32c6835',
                    'sms_gateway_identifier'=> '11812562299887806881',
                    'server_cleanup_users_ae'=> 'false',
                    'server_cleanup_objects_not_activated_ae'=> 'false',
                    'server_cleanup_objects_not_used_ae'=> 'false',
                    'server_cleanup_db_junk_ae'=> 'true',
                    'server_cleanup_users_days'=> '30',
                    'server_cleanup_objects_not_activated_days'=> '90'
                ]);
            case 'stats':
                if ($request->user_id == '1'){
                    $users = gs_user::all();
                    $object = gs_object::all();
                    $object_online = gs_object::where('active', 'true');
                    // $object_exp = gs_object::all();
                    $object_exp = gs_object::all(); 
                }else{
                    $users = gs_user::where('manager_id', $request->user_id)->get();
                    $object = gs_object::where('manager_id', $request->user_id)->get();
                    $object_online = gs_object::where('manager_id', $request->user_id)
                                        ->where('active', 'true')
                                        ->get();
                    // $object_exp = gs_object::where('manager_id', $request->user_id)
                    //                     ->where('object_expire', 'false')
                    //                     ->get();  
                    $object_exp = gs_object::where('manager_id', $request->user_id)
                                        ->where('object_expire', 'false')
                                        ->get();  
                }
                
                return response()->json([
                    'total_users'=> $users->count(),
                    'total_objects'=>$object->count(),
                    'total_objects_online'=>$object_online->count(),
                    'total_unused_objects'=>'0',
                    'total_billing_plans'=>'0',
                    'sms_gateway_total_in_queue'=>'0'
                ]);
            case 'load_subaccount_list':
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $searchQuery = $request->s; // Ambil nilai pencarian dari request

                $query = gs_user::whereJsonContains('privileges->type', 'subuser');

                if (!empty($searchQuery)) {
                    $query->where(function($q) use ($searchQuery) {
                        $q->where('username', 'like', "%{$searchQuery}%")
                        ->orWhere('email', 'like', "%{$searchQuery}%")
                        ->orWhere('id', 'like', "%{$searchQuery}%");
                    });
                }

                $data = $query->orderBy($sidx, $sord)->paginate($rows);

                $formattedData = $data->getCollection()->map(function ($item) {
                    $tmp_data = gs_user::find($item->manager_id);
                    return [
                        'id' => $item->id,
                        'cell' => [
                            "<input id=\"dialog_subaccounts_subaccount_list_grid_username_$item->id\" value=\"$item->username\" type=\"text\"/>",
                            "<input id=\"dialog_subaccounts_subaccount_list_grid_email_$item->id\" value=\"$item->email\" type=\"text\"\/>",
                            "<input id=\"dialog_subaccounts_subaccount_list_grid_password_$item->id\" value=\"\" placeholder=\"Enter new password\" type=\"text\"\/>",
                            ($item->active == "true") 
                            ? "<a href=\"#\" onclick=\"userSubaccountsDeactivate('$item->id');\" title=\"Deactivate\"><img src=\"theme/images/tick-green.svg\"></a>"
                            : "<a href=\"#\" onclick=\"userSubaccountsActivate('$item->id');\" title=\"Activate\"><img src=\"theme/images/remove-red.svg\" style=\"width:12px;\"></a>",
                            "180.244.162.43",
                            "<a href=\"#\" onclick=\"userEdit('$item->manager_id');\">$tmp_data->username</a>",
                            "<a href=\"#\" onclick=\"userSubaccountsEdit('$item->id');\" title=\"Save\"><img src=\"theme\/images\/save.svg\" \/></a><a href=\"#\" onclick=\"userSubaccountsDelete('$item->id');\" title=\"Delete\"><img src=\"theme\/images\/remove3.svg\" \/></a>",
                            $item->active,
                        ]
                    ];
                });

                $response = [
                    'page' => $data->currentPage(),
                    'total' => $data->lastPage(),
                    'records' => $data->total(),
                    'rows' => $formattedData,
                ];

                return response()->json($response);
            
            case 'load_user_list':
                $_search= $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s; // Ambil nilai pencarian dari request
                $query = gs_user::query();

                // Jika ada manager_id yang spesifik
                if ($request->manager_id != '1') {
                    $query->where('manager_id', $request->manager_id);
                }
                if (!empty($s)) {
                    $query->where(function($q) use ($s) {
                        $q->where('username', 'like', "%{$s}%")
                          ->orWhere('email', 'like', "%{$s}%")
                          ->orWhere('id', 'like', "%{$s}%");
                    });
                }
                $data = $query->orderBy($sidx, $sord)->paginate($rows);
                
                $formattedData = $data->getCollection()->map(function ($item) use ($s) {
                    $object_list = gs_user_object::where('user_id', $item->id)->count();
                    $exp = $item->account_expire == 'false' ? '' : $item->account_expire_dt;
                    $active_user = $item->active == 'false' ? '<a href="#" onclick="userActivate(\'' . $item->id . '\');" title="Activate"><img src="theme/images/remove-red.svg" style="width:12px;" /></a>' : '<a href="#" onclick="userDeactivate(\'' . $item->id . '\');" title="Deactivate"><img src="theme/images/tick-green.svg" /></a>';
                    $api_user = $item->api == 'false' ? '<a href="#" onclick="userAPIActivate(\'' . $item->id . '\');" title="Activate"><img src="theme/images/remove-red.svg" style="width:12px;" /></a>' : '<a href="#" onclick="userAPIDeactivate(\'' . $item->id . '\');" title="Deactivate"><img src="theme/images/tick-green.svg" style="width:12px;" /></a>';
                    $subUserPrivilegesCount = gs_user::whereJsonContains('privileges->type', 'subuser')->where('manager_id', $item->id)->count();
                    $jsonData = $item->privileges;
                    $dataArray = json_decode($jsonData, true);
                    $values = array_values($dataArray);
                    return [
                        'id' => $item->id,
                        'cell' => [
                            $item->id, 
                            $item->username, 
                            $item->email, 
                            $active_user,
                            $exp,
                            $values[0],
                            $api_user,
                            $item->dt_reg,
                            $item->dt_login,
                            $item->ip,
                            $subUserPrivilegesCount,
                            $object_list,
                            '0',
                            '0',
                            '0',
                            '0',
                            '<a href="#" onclick="userEdit(\'' . $item->id . '\');" title="Edit"><img src="theme/images/edit.svg" /></a><a href="#" onclick="userDelete(\'' . $item->id . '\');" title="Delete"><img src="theme/images/remove3.svg" \/></a><a href="#" onclick="userLogin(\'' . $item->id . '\');" title="Login as user"><img src="theme/images/key.svg" /></a>'
                        ]
                    ];
                }); 
            
                $response = [
                    'page' => $data->currentPage(),
                    'total' => $data->lastPage(),
                    'records' => $data->total(),
                    'rows' => $formattedData,
                ];
            
                return response()->json($response);                
                
            case 'load_object_list':
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $s = $request->s; // Ambil nilai pencarian dari request

                if ($request->manager_id == '1') {
                    $query = gs_object::query();
                } else {
                    $query = gs_object::where('manager_id', $request->manager_id);
                }

                if ($s) {
                    $query->where(function($q) use ($s) {
                        $q->where('name', 'like', "%{$s}%")
                          ->orWhere('imei', 'like', "%{$s}%")
                          ->orWhere('sim_number', 'like', "%{$s}%")
                          ->orWhere('device', 'like', "%{$s}%");
                    });
                }

                $data = $query->orderBy($sidx, $sord)->paginate($rows);

                $formattedData = $data->getCollection()->map(function ($item) {
                    $users = gs_user_object::where('imei', $item->imei)->pluck('user_id');
                    $userLinks = [];
                    foreach ($users as $userId) {
                        $user = gs_user::find($userId);
                        if ($user) {
                            $userLinks[] = '<a href="#" onclick="userEdit(\'' . $userId . '\');">' . $user->username . '</a>';
                        }
                    }
                    $active_object = $item->active == 'false' ? '<a href="#" onclick="objectActivate(\'' . $item->imei . '\');" title="Activate"><img src="theme/images/remove-red.svg" style="width:12px;" /></a>' : '<a href="#" onclick="objectDeactivate(\'' . $item->imei . '\');" title="Deactivate"><img src="theme/images/tick-green.svg" /></a>';
                    $editLink = "<a href=\"#\" onclick=\"objectEdit('{$item->imei}');\" title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a>";
                    $clearHistoryLink = "<a href=\"#\" onclick=\"objectClearHistory('{$item->imei}');\" title=\"Clear history\"><img src=\"theme/images/erase.svg\" /></a>";
                    $deleteLink = "<a href=\"#\" onclick=\"objectDelete('{$item->imei}');\" title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>";
                    return [
                        'id' => $item->imei,
                        'cell' => [
                            $item->name, 
                            $item->imei, 
                            $active_object,
                            $item->object_expire_dt,
                            $item->device,
                            $item->sim_number,
                            $item->dt_last_idle,
                            $item->protocol,
                            $item->net_protocol,
                            $item->port,
                            '<img src="theme/images/connection-gsm-gps.svg" />', // Assuming connection status is always valid for simplicity
                            implode(', ', $userLinks),
                            $editLink . $clearHistoryLink . $deleteLink
                        ]
                    ];
                });

                $response = [
                    'page' => $data->currentPage(),
                    'total' => $data->lastPage(),
                    'records' => $data->total(),
                    'rows' => $formattedData,
                ];

                return response()->json($response);

            case 'load_user_object_list':
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = 'name';
                $sord = $request->sord;
                $user_id = $request->id; // Ambil nilai user_id dari request
                $searchTerm = $request->s;

                // Dapatkan semua imei dari gs_user_object berdasarkan user_id
                $imeis = gs_user_object::where('user_id', $user_id)->pluck('imei');

                $query = gs_object::whereIn('imei', $imeis);
                if ($_search && $searchTerm) {
                    $query->where(function($q) use ($searchTerm) {
                        $q->where('name', 'like', "%{$searchTerm}%")
                          ->orWhere('imei', 'like', "%{$searchTerm}%");
                    });
                }

                // Dapatkan semua data object dari gs_object berdasarkan imei yang didapat
                $data = $query->orderBy($sidx, $sord)->paginate($rows);

                $formattedData = $data->getCollection()->map(function ($item) {
                    $activeLink = $item->active == 'false' ? 
                        "<a href=\"#\" onclick=\"objectActivate('{$item->imei}');\" title=\"Activate\"><img src=\"theme/images/remove-red.svg\" style=\"width:12px;\" />" :
                        "<a href=\"#\" onclick=\"objectDeactivate('{$item->imei}');\" title=\"Deactivate\"><img src=\"theme/images/tick-green.svg\" style=\"width:12px;\" />";
                    $connectionStatus = $item->loc_valid == '1' ? 
                        "<img src=\"theme/images/connection-gsm-gps.svg\" />" : 
                        "<img src=\"theme/images/connection-no.svg\" />";
                    return [
                        'id' => $item->imei,
                        'cell' => [
                            $item->name,
                            $item->imei,
                            $activeLink,
                            $item->object_expire_dt,
                            $item->dt_last_idle,
                            $connectionStatus,
                            "<a href=\"#\" onclick=\"objectEdit('{$item->imei}');\" title=\"Edit\"><img src=\"theme/images/edit.svg\" /></a><a href=\"#\" onclick=\"objectClearHistory('{$item->imei}');\" title=\"Clear history\"><img src=\"theme/images/erase.svg\" /></a><a href=\"#\" onclick=\"userObjectDelete('{$item->imei}');\" title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>"
                        ]
                    ];
                });
            
                $response = [
                    'page' => $data->currentPage(),
                    'total' => $data->lastPage(),
                    'records' => $data->total(),
                    'rows' => $formattedData,
                ];
            
                return response()->json($response);
            
            
            case 'load_theme_list':
                $themes = gs_themes::all();
                // return response()->json($themes);
                $jsonData = $themes['0'];
                $dataArray = json_decode($jsonData, true);
                $values = array_values($dataArray);
                // if (!$themes) {
                //     return response()->json(['message' => 'Nnot found'], 404);
                // }
                return response()->json([
                    'theme_id' => $values['0'],
                    'name' => $values['1'],
                    'active' => $values['2']
                ]);

            case 'load_language_list':
                $languages = [
                    ["lng" => "albanian", "active" => false],
                    ["lng" => "arabic", "active" => false],
                    ["lng" => "azerbaijan", "active" => false],
                    ["lng" => "bengali", "active" => false],
                    ["lng" => "bulgarian", "active" => false],
                    ["lng" => "chinese", "active" => false],
                    ["lng" => "croatian", "active" => false],
                    ["lng" => "danish", "active" => false],
                    ["lng" => "dutch", "active" => false],
                    ["lng" => "estonian", "active" => false],
                    ["lng" => "farsi", "active" => false],
                    ["lng" => "french", "active" => false],
                    ["lng" => "german", "active" => false],
                    ["lng" => "greek", "active" => false],
                    ["lng" => "hungarian", "active" => false],
                    ["lng" => "indonesian", "active" => true],
                    ["lng" => "italian", "active" => false],
                    ["lng" => "japanese", "active" => false],
                    ["lng" => "latvian", "active" => false],
                    ["lng" => "lithuanian", "active" => false],
                    ["lng" => "mongolian", "active" => false],
                    ["lng" => "nederlands", "active" => false],
                    ["lng" => "norsk", "active" => false],
                    ["lng" => "pashto", "active" => false],
                    ["lng" => "polish", "active" => false],
                    ["lng" => "portuguese", "active" => false],
                    ["lng" => "romanian", "active" => false],
                    ["lng" => "russian", "active" => false],
                    ["lng" => "serbian", "active" => false],
                    ["lng" => "slovak", "active" => false],
                    ["lng" => "spanish", "active" => false],
                    ["lng" => "swedish", "active" => false],
                    ["lng" => "thai", "active" => false],
                    ["lng" => "turkish", "active" => false],
                    ["lng" => "vietnamese", "active" => false],
                ];
                return response()->json($languages);
            case 'load_template_list':
                $data = gs_templates::all();
                $templateNames = $data->pluck('name');
                return response()->json($templateNames);
            case 'load_user_subaccount_list':
                $_search = $request->_search;
                $rows = $request->rows;
                $page = $request->page;
                $sidx = $request->sidx;
                $sord = $request->sord;
                $searchQuery = $request->s; // Ambil nilai pencarian dari request

                $query = gs_user::whereJsonContains('privileges->type', 'subuser')->where('manager_id', $request->id);

                if (!empty($searchQuery)) {
                    $query->where(function($q) use ($searchQuery) {
                        $q->where('username', 'like', "%{$searchQuery}%")
                          ->orWhere('email', 'like', "%{$searchQuery}%")
                          ->orWhere('id', 'like', "%{$searchQuery}%");
                    });
                }

                $data = $query->orderBy($sidx, $sord)->paginate($rows);

                $formattedData = $data->getCollection()->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'cell' => [
                            "<input id=\"dialog_user_edit_subaccount_list_grid_username_$item->id\" value=\"$item->username\" type=\"text\"/>",
                            "<input id=\"dialog_user_edit_subaccount_list_grid_email_$item->id\" value=\"$item->email\" type=\"text\"/>",
                            "<input id=\"dialog_user_edit_subaccount_list_grid_password_$item->id\" value=\"\" placeholder=\"Enter new password\" type=\"text\"/>",
                            ($item->active == "true") 
                            ? "<a href=\"#\" onclick=\"userSubaccountDeactivate('$item->id');\" title=\"Deactivate\"><img src=\"theme/images/tick-green.svg\"></a>"
                            : "<a href=\"#\" onclick=\"userSubaccountActivate('$item->id');\" title=\"Activate\"><img src=\"theme/images/remove-red.svg\" style=\"width:12px;\"></a>",
                            $item->ip,
                            "<a href=\"#\" onclick=\"userSubaccountEdit('$item->id');\" title=\"Save\"><img src=\"theme/images/save.svg\" /></a><a href=\"#\" onclick=\"userSubaccountDelete('$item->id');\" title=\"Delete\"><img src=\"theme/images/remove3.svg\" /></a>",
                            $item->active,
                        ]
                    ];
                });

                $response = [
                    'page' => $data->currentPage(),
                    'total' => $data->lastPage(),
                    'records' => $data->total(),
                    'rows' => $formattedData,
                ];

                return response()->json($response);

            case 'activate_subaccounts':
                $data = gs_user::where('id', $request->id)->first();
                    if ($data) {
                        $data->active = "true";
                        $data->save();
                        return "OK";
                    }
                    return "FALSE";

            case 'deactivate_subaccounts':
                $data = gs_user::where('id', $request->id)->first();
                    if ($data) {
                        $data->active = "false";
                        $data->save();
                        return "OK";
                    }
                    return "FALSE";

            case 'activate_user_subaccount':
                $data = gs_user::where('id', $request->id)->first();
                    if ($data) {
                        $data->active = "true";
                        $data->save();
                        return "OK";
                    }
                    return "FALSE";

            case 'deactivate_user_subaccount':
                $data = gs_user::where('id', $request->id)->first();
                    if ($data) {
                        $data->active = "false";
                        $data->save();
                        return "OK";
                    }
                    return "FALSE";

            case 'activate_user':
                $data = gs_user::where('id', $request->id)->first();
                    if ($data) {
                        $data->active = "true";
                        $data->save();
                        return "OK";
                    }
                    return "FALSE";

            case 'deactivate_user':
                $data = gs_user::where('id', $request->id)->first();
                    if ($data) {
                        $data->active = "false";
                        $data->save();
                        return "OK";
                    }
                    return "FALSE";

            case 'activate_user_api':
                $data = gs_user::where('id', $request->id)->first();
                    if ($data) {
                        $data->api = "true";
                        $data->save();
                        return "OK";
                    }
                    return "FALSE";

            case 'deactivate_user_api':
                $data = gs_user::where('id', $request->id)->first();
                    if ($data) {
                        $data->api = "false";
                        $data->save();
                        return "OK";
                    }
                    return "FALSE";

            case 'activate_selected_users':
                if (!is_array($request->ids) || empty($request->ids)) {
                    return response()->json(['error' => 'Invalid or missing IDs.'], 422);
                }
                $users = gs_user::whereIn('id', $request->ids)->get();
                foreach ($users as $user) {
                    $user->active = "true"; 
                    $user->save();
                }
                return "OK";

            case 'deactivate_selected_users':
                if (!is_array($request->ids) || empty($request->ids)) {
                    return response()->json(['error' => 'Invalid or missing IDs.'], 422);
                }
                $users = gs_user::whereIn('id', $request->ids)->get();
                foreach ($users as $user) {
                    $user->active = "false"; 
                    $user->save();
                }
                return "OK"; 

            case 'activate_selected_objects':
                if (!is_array($request->imeis) || empty($request->imeis)) {
                    return response()->json(['error' => 'Invalid or missing IDs.'], 422);
                }
                $objects = gs_object::whereIn('imei', $request->imeis)->get();
                foreach ($objects as $object) {
                    $object->active = "true"; 
                    $object->save();
                }
                return "OK";
    
            case 'deactivate_selected_objects':
                if (!is_array($request->imeis) || empty($request->imeis)) {
                    return response()->json(['error' => 'Invalid or missing IDs.'], 422);
                }
                $objects = gs_object::whereIn('imei', $request->imeis)->get();
                foreach ($objects as $object) {
                    $object->active = "false"; 
                    $object->save();
                }
                return "OK";

            case 'delete_user':
                $data = gs_user::find($request->id);
                if (!$data) {
                    return response()->json([
                        'message' => 'Data not found',
                    ], 404);
                }
                $data->delete();
                return "OK";

            case 'delete_selected_users':
                if (!is_array($request->ids) || empty($request->ids)) {
                    return response()->json(['error' => 'Invalid or missing IDs.'], 422);
                }
                $data = gs_user::whereIn('id', $request->ids)->get();
                foreach ($data as $datas) {
                    $datas->delete();
                }
                return "OK"; 

            case 'load_user_data':
                $data = gs_user::find($request->user_id);
                return response()->json([
                    'active' => $data->active,
                    'account_expire' => $data->account_expire,
                    'account_expire_dt' => $data->account_expire_dt,
                    'privileges' => json_decode($data->privileges, true),
                    'manager_id' => (string) $data->manager_id,
                    'manager_billing' => $data->manager_billing,
                    'username' => $data->username,
                    'email' => $data->email,
                    'api' => $data->api,
                    'api_key' => $data->api_key,
                    'info' => json_decode($data->info, true),
                    'comment' => $data->comment,
                    'obj_add' => $data->obj_add,
                    'obj_limit' => $data->obj_limit,
                    'obj_limit_num' => (string) $data->obj_limit_num,
                    'obj_days' => $data->obj_days,
                    'obj_days_dt' => $data->obj_days_dt,
                    'obj_edit' => $data->obj_edit,
                    'obj_delete' => $data->obj_delete,
                    'obj_history_clear' => $data->obj_history_clear,
                    'sms_gateway_server' => $data->sms_gateway_server,
                    'places_markers' => $data->places_markers,
                    'places_routes' => $data->places_routes,
                    'places_zones' => $data->places_zones,
                    'usage_email_daily' => $data->usage_email_daily,
                    'usage_sms_daily' => $data->usage_sms_daily,
                    'usage_webhook_daily' => $data->usage_webhook_daily,
                    'usage_api_daily' => $data->usage_api_daily
                ]);
                return response()->json($responseData, 200);

            case 'edit_user':
                $user = gs_user::findOrFail($request->id);
                $user->active = $request->active;
                $user->account_expire = $request->account_expire;
                if($user->account_expire_dt){
                    $user->account_expire_dt;
                }
                $user->privileges = $request->privileges;
                $user->manager_id = $request->manager_id;
                $user->manager_billing = $request->manager_billing;
                $user->username = $request->username;
                if($request->password){
                    $user->password = md5($request->password);
                }
                $user->email = $request->email;
                $user->api = $request->api;
                $user->api_key = $request->api_key;
                $user->info = $request->info;
                $user->comment = $request->comment ?? '';
                $user->obj_add = $request->obj_add;
                $user->obj_limit = $request->obj_limit; 
                $user->obj_limit_num = $request->obj_limit_num;
                $user->obj_days = $request->obj_days;
                if($request->obj_days_dt){
                    $user->obj_days_dt = $request->obj_days_dt;
                }
                $user->obj_edit = $request->obj_edit ?? ''; 
                $user->obj_delete = $request->obj_delete ?? '';
                $user->obj_history_clear = $request->obj_history_clear ?? '';
                $user->sms_gateway_server = $request->sms_gateway_server ?? ''; 
                $user->places_markers = $request->places_markers ?? '';
                $user->places_routes = $request->places_routes ?? '';
                $user->places_zones = $request->places_zones ?? '';
                $user->usage_email_daily = $request->usage_email_daily ?? '';
                $user->usage_sms_daily = $request->usage_sms_daily ?? '';
                $user->usage_webhook_daily = $request->usage_webhook_daily ?? '';
                $user->usage_api_daily = $request->usage_api_daily ?? '';
                $user->save();
                return "OK";
                
            case 'get_user_expire_avg':
                $date = Carbon::now(); // Atau Anda bisa mendapatkan tanggal dari mana pun yang Anda butuhkan
                $formattedDate = $date->format('Y-m-d'); // Format tanggal ke "tahun-bulan-tanggal"
                return $formattedDate;
            case 'set_user_expire_selected':
                if (!is_array($request->ids) || empty($request->ids)) {
                    return response()->json(['error' => 'Invalid or missing IDs.'], 422);
                }
                $users = gs_user::whereIn('id', $request->ids)->get();
                foreach ($users as $user) {
                    $dt_exp = $request->expire_dt ?? NULL;
                    $user->account_expire = $request->expire;
                    $user->account_expire_dt = $dt_exp;
                    $user->save();
                }
                return "OK"; 

            case 'edit_subaccounts':
                $user = gs_user::findOrFail($request->id);
                $user->username = $request->username;
                $user->email = $request->email;
                if (!empty($request->password)) {
                    $user->password = md5($request->password);
                }
                $user->save();
                return "OK";

            case 'edit_user_subaccount':
                $user = gs_user::findOrFail($request->id);
                $user->username = $request->username;
                $user->email = $request->email;
                if (!empty($request->password)) {
                    $user->password = md5($request->password);
                }
                $user->save();
                return "OK";
            case 'delete_subaccounts':
                $data = gs_user::find($request->id);
                if ($data) {
                    $data->delete();
                    return "OK";
                }
                return "FALSE";
                
            case 'deactivate_object':
                $object = gs_object::where('imei', $request->imei)->first(); // Cari object berdasarkan IMEI
                if ($object) {
                    $object->active = 'false'; // Set status aktif baru
                    $object->save(); // Simpan perubahan
                    return "OK";
                }
                return response()->json(['message' => 'Object tidak ditemukan'], 404);

            case 'activate_object':
                $object = gs_object::where('imei', $request->imei)->first(); // Cari object berdasarkan IMEI
                if ($object) {
                    $object->active = 'true'; // Set status aktif baru
                    $object->save(); // Simpan perubahan
                    return "OK";
                }
                return response()->json(['message' => 'Object tidak ditemukan'], 404);

            case 'load_object_data':
                $object = gs_object::where('imei', $request->imei)->first();

                if (!$object) {
                    return response()->json(['message' => 'Object tidak ditemukan'], 404);
                }

                $users = gs_user_object::where('imei', $request->imei)->pluck('user_id');
                $userLinks = [];
                foreach ($users as $userId) {
                    $user = gs_user::find($userId);
                    if ($user) {
                        $userLinks[] = [
                            'value' => $user->id,
                            'text' => $user->username,
                        ];
                    }
                }

                $response = [
                    'active' => $object->active,
                    'object_expire' => $object->object_expire,
                    'object_expire_dt' => $object->object_expire_dt,
                    'name' => $object->name,
                    'imei' => $object->imei,
                    'model' => $object->model,
                    'vin' => $object->vin,
                    'plate_number' => $object->plate_number,
                    'device' => $object->device,
                    'sim_number' => $object->sim_number,
                    'manager_id' => $object->manager_id,
                    'users' => $userLinks
                ];

                return response()->json($response);

            case 'load_object_search_list':
                $managerId = $request->manager_id;
                $searchQuery = $request->search ?? '';

                $query = gs_object::select('imei', 'name')
                    ->when($managerId != 0, function ($query) use ($managerId) {
                        return $query->where('manager_id', $managerId);
                    })
                    ->when($searchQuery, function ($query) use ($searchQuery) {
                        return $query->where(function($q) use ($searchQuery) {
                            $q->whereRaw('LOWER(name) LIKE ?', ["%".strtolower($searchQuery)."%"])
                              ->orWhereRaw('LOWER(imei) LIKE ?', ["%".strtolower($searchQuery)."%"]);
                        });
                    })
                    ->get();

                $formattedObjects = $query->map(function ($object) {
                    return [
                        'value' => $object->imei,
                        'text' => $object->name
                    ];
                });

                return response()->json($formattedObjects);
            
            case 'load_user_search_list':
                $managerId = $request->manager_id;
                $searchQuery = $request->search ?? '';

                $query = gs_user::select('id', 'username', 'email')
                    ->when($managerId != 0, function ($query) use ($managerId) {
                        return $query->where('manager_id', $managerId);
                    })
                    ->when($searchQuery, function ($query) use ($searchQuery) {
                        return $query->where(function($q) use ($searchQuery) {
                            $q->whereRaw('LOWER(username) LIKE ?', ["%".strtolower($searchQuery)."%"])
                              ->orWhereRaw('LOWER(id) LIKE ?', ["%".strtolower($searchQuery)."%"])
                              ->orWhereRaw('LOWER(email) LIKE ?', ["%".strtolower($searchQuery)."%"]);
                        });
                    })
                    ->get();

                $formattedUsers = $query->map(function ($user) {
                    return [
                        'value' => $user->id,
                        'text' => $user->username
                    ];
                });

                return response()->json($formattedUsers);

            case 'delete_user_object':
                $imei = $request->imei;
                $userId = $request->user_id;
            
                $userObject = gs_user_object::where('imei', $imei)->where('user_id', $userId)->first();
            
                if ($userObject) {
                    $userObject->delete();
                    return 'OK';
                } else {
                    return response()->json(['message' => 'Objek tidak ditemukan'], 404);
                }

            case 'add_user_objects':
                $imeis = json_decode($request->imeis, true);
                if (!is_array($imeis)) {
                    return response()->json(['error' => 'IMEI harus dalam bentuk array JSON yang valid.'], 422);
                }

                $userObjects = [];
                foreach ($imeis as $imei) {
                    $exists = gs_user_object::where('user_id', $request->user_id)
                            ->where('imei', $imei)
                            ->exists();
                    if (!$exists) {
                        $newUserObject = new gs_user_object([
                            'user_id' => $request->user_id,
                            'imei' => $imei,
                            'group_id' => "0",  // Nilai default jika tidak disediakan
                            'driver_id' => "0", // Nilai default jika tidak disediakan
                            'trailer_id' => "0" // Nilai default jika tidak disediakan
                        ]);
                        $newUserObject->save();

                    }
                }
                return 'OK';

            

            case 'activate_selected_user_subaccounts':
                foreach ($request->ids as $idss) {
                    $users = gs_user::where('id', $idss)->first(); // Cari user berdasarkan user_id
                    if ($users) {
                        $users->active = 'true'; // Set status aktif baru
                        $users->save(); // Simpan perubahan
                    }
                }
                return 'OK';
            
            case 'deactivate_selected_user_subaccounts':
                foreach ($request->ids as $idss) {
                    $users = gs_user::where('id', $idss)->first(); // Cari user berdasarkan user_id
                    if ($users) {
                        $users->active = 'false'; // Set status aktif baru
                        $users->save(); // Simpan perubahan
                    }
                }
                return 'OK';
            case 'delete_selected_user_subaccounts':
                foreach ($request->ids as $idss) {
                    $users = gs_user::where('id', $idss)->first(); // Cari user berdasarkan user_id
                    if ($users) {
                        $users->delete(); // Simpan perubahan
                    }
                }
                return 'OK';

            case 'delete_user_subaccount':
                $users = gs_user::where('id', $request->id)->first(); // Cari user berdasarkan user_id
                if ($users) {
                    $users->delete(); // Simpan perubahan
                }
                return 'OK';

            case 'activate_selected_user_objects':
                foreach ($request->imeis as $imeis) {
                    $object = gs_object::where('imei', $imeis)->first(); // Cari object berdasarkan IMEI
                    if ($object) {
                        $object->active = 'true'; // Set status aktif baru
                        $object->save(); // Simpan perubahan
                    }
                }
                return 'OK';

            case 'deactivate_selected_user_objects':
                foreach ($request->imeis as $imeis) {
                    $object = gs_object::where('imei', $imeis)->first(); // Cari object berdasarkan IMEI
                    if ($object) {
                        $object->active = 'false'; // Set status aktif baru
                        $object->save(); // Simpan perubahan
                    }
                }
                return 'OK';

            case 'get_object_expire_avg':
                $object = gs_object::where('imei', $request->imeis)->first(); // Cari object berdasarkan IMEI
                if ($object) {
                    return $object->object_expire_dt;
                }

            case 'set_object_expire_selected':
                foreach ($request->imeis as $imeis) {
                    $object = gs_object::where('imei', $imeis)->first(); // Cari object berdasarkan IMEI
                    if ($object && $request->expire == 'true') {
                        $object->object_expire = 'true';
                        $object->object_expire_dt = $request->expire_dt; // Set status aktif baru
                        $object->save(); // Simpan perubahan
                    }else if ($object && $request->expire == 'false'){
                        $object->object_expire = 'false';
                        $object->object_expire_dt = null; // Set status aktif baru
                        $object->save(); // Simpan perubahan

                    }
                }
                return 'OK';

            case 'delete_selected_user_objects':
                foreach ($request->imeis as $imeis) {
                    $object = gs_user_object::where('imei', $imeis)->where('user_id', $request->user_id)->first();
                    if ($object) {
                        $object->delete();
                    }
                }
                return 'OK';

            case 'edit_object':
                $object = gs_object::where('imei', $request->imei)->first();
                if (!$object) {
                    return response()->json(['message' => 'Object tidak ditemukan'], 404);
                }
                $object->active = $request->active;
                $object->object_expire = $request->object_expire;
                if ($object && $request->object_expire == 'true') {
                    $object->object_expire_dt = $request->expire_dt; // Set status aktif baru
                }else if ($object && $request->object_expire == 'false'){
                    $object->object_expire_dt = null; // Set status aktif baru
                }
                $object->name = $request->name;
                if (!$request->new_imei){
                    $object->imei = $request->imei;
                }else{
                    $object->imei = $request->new_imei;
                }
                $object->model = $request->model ?? "";
                $object->vin = $request->vin ?? "";
                $object->plate_number = $request->plate_number ?? "";
                $object->device = $request->device ?? "";
                $object->sim_number = $request->sim_number ?? "";
                $object->manager_id = $request->manager_id;
                $object->save();

                $existingUserIds = gs_user_object::where('imei', $request->imei)
                                     ->pluck('user_id')
                                     ->toArray();

                $requestedUserIds = json_decode($request->user_ids, true);
                if (!is_array($requestedUserIds)) {
                    return response()->json(['error' => 'user_ids harus dalam bentuk array JSON yang valid.'], 422);
                }

                // Menambahkan user_id yang tidak ada di existingUserIds
                foreach ($requestedUserIds as $userId) {
                    if (!in_array($userId, $existingUserIds)) {
                        $newUserObject = new gs_user_object([
                            'user_id' => $userId,
                            'imei' => $request->imei,
                            'group_id' => "0",  // Nilai default jika tidak disediakan
                            'driver_id' => "0", // Nilai default jika tidak disediakan
                            'trailer_id' => "0" // Nilai default jika tidak disediakan
                        ]);
                        $newUserObject->save();
                    }
                }

                // Menghapus user_id yang tidak ada di requestedUserIds
                foreach ($existingUserIds as $userId) {
                    if (!in_array($userId, $requestedUserIds)) {
                        $userObject = gs_user_object::where('imei', $request->imei)
                                                    ->where('user_id', $userId)
                                                    ->first();
                        if ($userObject) {
                            $userObject->delete();
                        }
                    }
                }
                return "OK";

            case 'send_email':
                $userIds = json_decode($request->user_ids, true);
                if (!is_array($userIds)) {
                    return response()->json(['error' => 'user_ids harus dalam bentuk array.'], 422);
                }
                $users = gs_user::whereIn('id', $userIds)->get(['email']);
                foreach ($users as $user) {
                    $ke = $user->email;
                    $subjek = $request->subject;
                    $pesan = ($request->message ?? 'test') . "\n\n--\njontracking.com";
                    try {
                        Mail::raw($pesan, function ($message) use ($ke, $subjek) {
                            $message->to($ke)->subject($subjek);
                        });
                        
                    } catch (TransportException $e) {
                        return "ERROR_NOT_SENT";
                    }
                }
                
                return 'OK';

            case 'delete_selected_objects':
                if (!is_array($request->imeis) || empty($request->imeis)) {
                    return response()->json(['error' => 'Invalid or missing imei.'], 422);
                }
                $data = gs_object::whereIn('imei', $request->imeis)->get();
                foreach ($data as $datas) {
                    $datas->delete();
                }
                return "OK";

            case 'delete_object':
                $data = gs_object::find($request->imei);
                if (!$data) {
                    return response()->json([
                        'message' => 'Data not found',
                    ], 404);
                }
                $data->delete();
                return "OK";

            case 'load_log_list'://masih statis
                return 'OK';

            case 'load_billing_plan_list'://masih statis
                return 'OK';

            case 'load_custom_map_list'://masih statis
                return 'OK';

            default:
                return response()->json(['error' => 'Invalid action'], 400);
        }
    }

    public function fn_cpanel_users(Request $request)
    {   
        switch ($request->cmd) {
            case 'register_user':
                $managerId = $request->manager_id ? $request->manager_id : 0;
                $exists = gs_user::where('email', $request->email)->exists();
                if ($exists) {
                    return "ERROR_EMAIL_EXISTS";
                }
                $password = Str::random(6);
                if($request->send == "true"){
                    $ke = $request->email;
                    $subjek = "Registration at ".env('APP_NAME');
                    $pesan = "Hello,\nThank you for registering at ".env('APP_NAME').".\n\nAccess to GPS server: ".env('APP_URL')."\nUsername: ".$request->email."\nPassword: ".$password."\n\n\n--\njontracking.com";
                    try {
                        Mail::raw($pesan, function ($message) use ($ke, $subjek) {
                            $message->to($ke)->subject($subjek);
                        });
                        
                    } catch (TransportException $e) {
                        return "ERROR_NOT_SENT";
                    }
                }
                $date = Carbon::now(); // Atau Anda bisa mendapatkan tanggal dari mana pun yang Anda butuhkan
                $account_expire_dt = $date->format('Y-m-d'); // Format tanggal ke "tahun-bulan-tanggal"
                $dt_login = $date->format('Y-m-d H:i:s');
                $obj_days_dt = Carbon::now()->addYear()->format('Y-m-d');
                $user = new gs_user();
                $user->email = $request->email;
                $user->active = "true";
                $user->account_expire = "true";
                $user->account_expire_dt = $account_expire_dt;
                $user->privileges = json_encode(["type"=>"user","map_osm"=>true,"map_bing"=>true,"map_google"=>true,"map_google_street_view"=>true,"map_google_traffic"=>true,"map_mapbox"=>false,"map_arcgis"=>false,"map_yandex"=>false,"kml"=>true,"dashboard"=>true,"history"=>true,"reports"=>true,"tachograph"=>true,"tasks"=>true,"rilogbook"=>true,"dtc"=>true,"maintenance"=>true,"expenses"=>true,"object_control"=>true,"image_gallery"=>true,"chat"=>true,"subaccounts"=>true]);
                $user->manager_id = $managerId;
                $user->manager_billing = "";
                $user->username = $request->email;
                $user->password = md5($password);
                $user->sess_hash = "";
                $user->api = "true";
                $user->api_key = Str::upper(Str::random(32));
                $user->dt_reg = $dt_login;
                $user->dt_login = $dt_login;
                $user->ip = "";
                $user->notify_account_expire = "true";
                $user->notify_object_expire = "false";
                $user->info = json_encode(["name"=>"","company"=>"","address"=>"","post_code"=>"","city"=>"","country"=>"","phone1"=>"","phone2"=>"","email"=>""]);
                $user->comment = "";
                $user->obj_add = "trial";
                $user->obj_limit = "true";
                $user->obj_limit_num = "1";
                $user->obj_days = "true";
                $user->obj_days_dt = $obj_days_dt;
                $user->obj_edit = "true";
                $user->obj_delete = "false";
                $user->obj_history_clear = "true";
                $user->currency = "IDR";
                $user->timezone = "+ 7 hour";
                $user->dst = "false";
                $user->dst_start = "";
                $user->dst_end = "";
                $user->startup_tab = "";
                $user->language = "indonesian";
                $user->units= "km,l,c";
                $user->dashboard = "";
                $user->map_sp = "last";
                $user->map_is = "1";
                $user->map_rc = "";
                $user->map_rhc = "";
                $user->map_ocp = "";
                $user->groups_collapsed = "";
                $user->od = "";
                $user->ohc = "";
                $user->datalist = "";
                $user->datalist_items = "";
                $user->push_notify_identifier = "";
                $user->push_notify_desktop = "";
                $user->push_notify_mobile = "";
                $user->push_notify_mobile_interval = "0";
                $user->chat_notify = "";
                $user->sms_gateway_server = "true";
                $user->sms_gateway = "";
                $user->sms_gateway_type = "";
                $user->sms_gateway_url = "";
                $user->sms_gateway_identifier = "";
                $user->places_markers = "";
                $user->places_routes = "";
                $user->places_zones = "";
                $user->usage_email_daily = "";
                $user->usage_sms_daily = "";
                $user->usage_webhook_daily = "";
                $user->usage_api_daily = "";
                $user->usage_email_daily_cnt = "0";
                $user->usage_sms_daily_cnt = "0";
                $user->usage_webhook_daily_cnt = "0";
                $user->usage_api_daily_cnt = "0";
                $user->dt_usage_d = $account_expire_dt;
                $user->save();
                return "OK";
            
            default:
                return response()->json(['error' => 'Invalid action'], 400);
        }
    }
    public function fn_lng(Request $request)
    {   
        switch ($request->cmd) {
            case 'load_language':
                if($request->user_id)
                {
                    $user = gs_user::find($request->user_id);
                    switch ($user->language) {
                        case 'indonesian':
                            return response()->json([
                                'ABOUT'=> 'Tentang',
                                'ABSOLUTE'=> 'Mutlak',
                                'ACCENT_COLOR'=> 'Warna aksen',
                                'ACCESS_TO_GPS_SERVER_ACCOUNT'=> 'Akses ke server GPS',
                                'ACCESS_VIA_URL'=> 'Akses melalui URL',
                                'ACCOUNT'=> 'Akun',
                                'ACCOUNT_PRIVILEGES'=> 'Hak istimewa akun',
                                'ACCURACY'=> 'Akurasi',
                                'ACRES'=> 'Acres',
                                'ACTION'=> 'Aksi',
                                'ACTIVATE'=> 'Aktifkan',
                                'ACTIVATION_POSITION'=> 'Posisi aktivasi',
                                'ACTIVATION_TIME'=> 'Waktu aktivasi',
                                'ACTIVE'=> 'Aktif',
                                'ACTIVE_PERIOD'=> 'Periode aktif',
                                'ADD'=> 'Add',
                                'ADDITIONAL_INFO'=> 'Informasi tambahan',
                                'ADDITIONAL_PLANS_CAN_BE_PURCHASED_VIA_BILLING_SYSTEM'=> 'Paket tambahan dapat dibeli melalui sistem penagihan.',
                                'ADDRESS'=> 'Alamat',
                                'ADDRESS_CANT_BE_EMPTY'=> 'Alamat tidak boleh kosong.',
                                'ADDRESS_DISPLAY'=> 'Tampilan alamat',
                                'ADDRESS_SEARCH'=> 'Pencarian alamat',
                                'ADD_MARKER'=> 'Tambahkan penanda',
                                'ADD_OBJECT'=> 'Tambah objek',
                                'ADD_OBJECTS'=> 'Tambah objek',
                                'ADD_PLAN'=> 'Tambahkan rencana',
                                'ADD_ROUTE'=> 'Tambah rute',
                                'ADD_USER'=> 'Tambah pengguna',
                                'ADD_ZONE'=> 'Tambah zona',
                                'ADMINISTRATOR'=> 'Administrator',
                                'ADVANCED'=> 'Lanjutan',
                                'AFTER'=> 'Setelah',
                                'ALARM_ARM'=> 'Lengan Alarm',
                                'ALARM_DISARM'=> 'Alarm menonaktifkan',
                                'ALL'=> 'Semua',
                                'ALL_AVAILABLE_FIELDS_SHOULD_BE_FILLED_OUT'=> 'Semua field yang tersedia harus diisi.',
                                'ALL_OBJECTS'=> 'Semua objek',
                                'ALL_PROTOCOLS'=> 'Semua protokol',
                                'ALL_RIGHTS_RESERVED'=> 'Semua hak dilindungi undang-undang.',
                                'ALL_SELECTED'=> 'Semua dipilih',
                                'ALL_USER_ACCOUNTS'=> 'Semua akun pengguna',
                                'ALTITUDE'=> 'Ketinggian',
                                'ALTITUDE_GRAPH'=> 'Grafik ketinggian',
                                'ANGLE'=> 'Sudut',
                                'API'=> 'API',
                                'API_DAILY'=> 'Jumlah panggilan API (harian)',
                                'API_KEY'=> 'kunci API',
                                'APPEARANCE'=> 'Penampilan',
                                'APPLY_CURRENT_PLAN_TO_BELOW_SELECTED_OBJECTS'=> 'Terapkan rencana saat ini ke objek yang dipilih di bawah.',
                                'ARCGIS_MAPS_KEY'=> 'ArcGIS Maps key (get it here=> https=>//www.arcgis.com)',
                                'ARE_YOU_SURE_YOU_WANT_TO_ACTIVATE_SELECTED_ITEMS'=> 'Anda yakin ingin mengaktifkan item terpilih?',
                                'ARE_YOU_SURE_YOU_WANT_TO_ACTIVATE_SELECTED_OBJECTS'=> 'Anda yakin ingin mengaktifkan objek terpilih?',
                                'ARE_YOU_SURE_YOU_WANT_TO_CHANGE_OBJECT_IMEI'=> 'Anda yakin ingin mengubah objek IMEI?',
                                'ARE_YOU_SURE_YOU_WANT_TO_CHANGE_USER_PASSWORD'=> 'Anda yakin ingin mengubah kata sandi pengguna?',
                                'ARE_YOU_SURE_YOU_WANT_TO_CLEAR_DETECTED_SENSOR_CACHE'=> 'Anda yakin ingin menghapus cache sensor yang terdeteksi?',
                                'ARE_YOU_SURE_YOU_WANT_TO_CLEAR_GEOCODER_CACHE'=> 'Anda yakin ingin menghapus cache geocoder?',
                                'ARE_YOU_SURE_YOU_WANT_TO_CLEAR_HISTORY_EVENTS'=> 'Anda yakin ingin menghapus riwayat objek dan kejadian?',
                                'ARE_YOU_SURE_YOU_WANT_TO_CLEAR_SELECTED_ITEMS_HISTORY_EVENTS'=> 'Anda yakin ingin menghapus riwayat dan kejadian item terpilih?',
                                'ARE_YOU_SURE_YOU_WANT_TO_CLEAR_SMS_QUEUE'=> 'Anda yakin ingin menghapus antrian SMS?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DEACTIVATE_SELECTED_ITEMS'=> 'Anda yakin ingin menonaktifkan item terpilih?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE'=> 'Anda yakin ingin menghapus?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_BILLING_PLANS'=> 'Anda yakin ingin menghapus semua paket penagihan?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_CUSTOM_ICONS'=> 'Anda yakin ingin menghapus semua ikon kustom?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_CUSTOM_MAPS'=> 'Anda yakin ingin menghapus semua peta khusus?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_DRIVERS'=> 'Anda yakin ingin menghapus semua driver?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_DTC_RECORDS'=> 'Anda yakin ingin menghapus semua record DTC?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_EVENTS'=> 'Anda yakin ingin menghapus semua acara?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_GROUPS'=> 'Anda yakin ingin menghapus semua grup?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_IMAGES'=> 'Anda yakin ingin menghapus semua gambar?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_LOGBOOK_RECORDS'=> 'Apakah Anda yakin ingin menghapus semua catatan buku catatan?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_LOGS'=> 'Anda yakin ingin menghapus semua catatan?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_MARKERS'=> 'Anda yakin ingin menghapus semua penanda?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_OBJECT_CONTROL_TEMPLATES'=> 'Apakah Anda yakin ingin menghapus semua templat kendali objek?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_PASSENGERS'=> 'Anda yakin ingin menghapus semua penumpang?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_ROUTES'=> 'Anda yakin ingin menghapus semua rute?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_SELECTED_OBJECT_MESSAGES'=> 'Anda yakin ingin menghapus semua pesan objek terpilih?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_TASKS'=> 'Anda yakin ingin menghapus semua tugas?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_THEMES'=> 'Anda yakin ingin menghapus semua tema?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_TRAILERS'=> 'Anda yakin ingin menghapus semua trailer?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_ZONES'=> 'Anda yakin ingin menghapus semua zona?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_ITEMS'=> 'Anda yakin ingin menghapus item terpilih?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_ICON'=> 'Anda yakin ingin menghapus ikon ini?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_IMAGE'=> 'Anda yakin ingin menghapus gambar ini?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_OBJECT_FROM_SYSTEM'=> 'Apakah Anda yakin ingin menghapus objek ini (hapus seluruhnya dari semua pengguna dan sistem)?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_OBJECT_FROM_USER_ACCOUNT'=> 'Anda yakin ingin menghapus objek ini (hapus hanya dari akun pengguna)?',
                                'ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_UNUSED_OBJECT'=> 'Anda yakin ingin menghapus objek yang tidak digunakan ini?',
                                'ARE_YOU_SURE_YOU_WANT_TO_IMPORT'=> 'Anda yakin ingin mengimpor?',
                                'ARE_YOU_SURE_YOU_WANT_TO_OVERWRITE_SELECTED_COMMAND'=> 'Anda yakin ingin menimpa perintah yang dipilih?',
                                'ARE_YOU_SURE_YOU_WANT_TO_RESET_SERVER_API_KEY'=> 'Anda yakin ingin mengatur ulang kunci API Server?',
                                'ARE_YOU_SURE_YOU_WANT_TO_SEND_COMMAND_SELECTED_OBJECTS'=> 'Anda yakin ingin mengirim perintah ke objek yang dipilih?',
                                'ARE_YOU_SURE_YOU_WANT_TO_SEND_TEST_MESSAGE_TO_YOUR_EMAIL'=> 'Anda yakin ingin mengirim pesan percobaan ke email Anda?',
                                'ARE_YOU_SURE_YOU_WANT_TO_SEND_THIS_MESSAGE'=> 'Anda yakin ingin mengirim pesan ini?',
                                'ARE_YOU_SURE_YOU_WANT_TO_SET_EXPIRATION_FOR_SELECTED_ITEMS'=> 'Anda yakin ingin menyetel kedaluwarsa untuk item yang dipilih?',
                                'ARRIVED'=> 'Tiba',
                                'ARROW'=> 'Panah',
                                'ARROWS'=> 'Panah',
                                'AT_LEAST_ONE_CONDITION'=> 'Setidaknya satu kondisi harus ditambahkan.',
                                'AT_LEAST_ONE_MAP_SHOULD_BE_ENABLED'=> 'Setidaknya satu peta harus diaktifkan.',
                                'AT_LEAST_ONE_MARKER_SELECTED'=> 'At least one marker must be selected.',
                                'AT_LEAST_ONE_OBJECT_SELECTED'=> 'Setidaknya satu objek harus dipilih.',
                                'AT_LEAST_ONE_ROUTE_SELECTED'=> 'Setidaknya satu rute harus dipilih.',
                                'AT_LEAST_ONE_SENSOR_SELECTED'=> 'Setidaknya satu sensor harus dipilih.',
                                'AT_LEAST_ONE_ZONE_SELECTED'=> 'Setidaknya satu zona harus dipilih.',
                                'AT_LEAST_TWO_CALIBRATION_POINTS'=> 'Setidaknya dua titik pemeriksaan kalibrasi harus ditambahkan.',
                                'AT_OUR_SHOP'=> 'di toko kami=>',
                                'AUTO_ASSIGN'=> 'Tetapkan otomatis',
                                'AUTO_EXECUTE'=> 'Eksekusi otomatis',
                                'AUTO_HIDE'=> 'Sembunyikan otomatis',
                                'AVAILABLE_MAPS'=> 'Peta yang tersedia',
                                'AVAILABLE_MARKERS'=> 'Penanda yang tersedia',
                                'AVAILABLE_OBJECTS'=> 'Objek yang tersedia',
                                'AVAILABLE_ZONES'=> 'Zona yang tersedia',
                                'AVG_FUEL_CONSUMPTION'=> 'Rata-rata. konsumsi bahan bakar',
                                'AVG_FUEL_CONSUMPTION_100_KM'=> 'Rata-rata. kontra bahan bakar. (100 km) ',
                                'AVG_FUEL_CONSUMPTION_MPG'=> 'Rata-rata. kontra bahan bakar. (MPG) ',
                                'AVG_SPEED'=> 'Kecepatan rata-rata',
                                'BACK'=> 'Kembali',
                                'BACKGROUND_COLOR'=> 'Warna latar belakang',
                                'BACKUP'=> 'Cadangan',
                                'BATTERY'=> 'Baterai',
                                'BEFORE'=> 'Sebelum',
                                'BEFORE_2_DAYS'=> 'Sebelum 2 hari',
                                'BEFORE_3_DAYS'=> 'Sebelum 3 hari',
                                'BILLING'=> 'Penagihan',
                                'BILLING_ALLOWS_TO_PURCHASE_ADDITIONAL_PLANS'=> 'Penagihan memungkinkan untuk membeli rencana tambahan dan memperpanjang periode aktivitas objek. Paket yang dibeli akan muncul dalam daftar di bawah ini setelah pembayaran dikonfirmasi, kadang-kadang mungkin perlu waktu. ',
                                'BILLING_PLAN'=> 'Paket penagihan',
                                'BILLING_PLANS'=> 'Paket penagihan',
                                'BILLING_PLAN_LIST'=> 'Daftar rencana penagihan',
                                'BILLING_PROPERTIES'=> 'Properti penagihan',
                                'BING_GEOCODER_KEY'=> 'Kunci Bing Geocoder (dapatkan di sini=> https=>//www.bingmapsportal.com)',
                                'BING_MAPS_KEY'=> 'Kunci Bing Maps (dapatkan di sini=> https=>//www.bingmapsportal.com)',
                                'BLUE_ID'=> 'Blue ID',
                                'BLUE_ID_SENSOR_IS_ALREADY_AVAILABLE'=> 'Blue ID sensor is already available.',
                                'BOTTOM'=> 'Bawah',
                                'BOTTOM_PANEL_WITH_ICONS'=> 'Panel bawah dengan ikon',
                                'BOTTOM_TEXT_HTML_COMPATIBLE'=> 'Teks bawah (kompatibel dengan HTML)',
                                'BRACELET_OFF'=> 'Gelang lepas',
                                'BRACELET_ON'=> 'Gelang aktif',
                                'BRANDING'=> 'Branding',
                                'BRANDING_AND_UI'=> 'Branding dan UI',
                                'BUYER'=> 'Pembeli',
                                'CALCULATION'=> 'Perhitungan',
                                'CALIBRATION'=> 'Kalibrasi',
                                'CAME'=> 'Datang',
                                'CAMERA'=> 'Kamera',
                                'CANCEL'=> 'Batal',
                                'CANT_SEND_EMAIL'=> 'Tidak dapat mengirim email.',
                                'CELSIUS'=> 'Celsius',
                                'CENTER'=> 'Center',
                                'CHANGES_SAVED_SUCCESSFULLY'=> 'Perubahan berhasil disimpan.',
                                'CHANGE_PASSWORD'=> 'Ubah sandi',
                                'CHAT'=> 'Obrolan',
                                'CIRCLE'=> 'Lingkaran',
                                'CITY'=> 'Kota',
                                'CLEAR'=> 'Hapus',
                                'CLEAR_DETECTED_SENSOR_CACHE'=> 'Hapus cache sensor yang terdeteksi',
                                'CLEAR_GEOCODER_CACHE'=> 'Kosongkan cache geocoder',
                                'CLEAR_HISTORY'=> 'Hapus riwayat',
                                'CLEAR_OBJECTS_HISTORY'=> 'Hapus riwayat objek',
                                'CODE'=> 'Kode',
                                'COLLAPSED'=> 'Diciutkan',
                                'COLOR'=> 'Warna',
                                'COLORS'=> 'Warna',
                                'COLOR_BLACK'=> 'Hitam',
                                'COLOR_BLUE'=> 'Biru',
                                'COLOR_GREEN'=> 'Hijau',
                                'COLOR_GREY'=> 'Abu-abu',
                                'COLOR_ORANGE'=> 'Oranye',
                                'COLOR_PURPLE'=> 'Ungu',
                                'COLOR_RED'=> 'Merah',
                                'COLOR_YELLOW'=> 'Kuning',
                                'COMMAND'=> 'Perintah',
                                'COMMANDS'=> 'Perintah',
                                'COMMANDS_STATUS'=> 'Status perintah',
                                'COMMAND_CANT_BE_EMPTY'=> 'Perintah tidak boleh kosong.',
                                'COMMAND_HEX_NOT_VALID'=> 'Format Perintah HEX tidak sah.',
                                'COMMAND_INTERVAL'=> 'Interval perintah',
                                'COMMAND_PROPERTIES'=> 'Properti perintah',
                                'COMMAND_SENT_FOR_EXECUTION'=> 'Perintah berhasil dikirim untuk eksekusi.',
                                'COMMENT'=> 'Komentar',
                                'COMMENT_ABOUT_USER'=> 'Komentar tentang pengguna ...',
                                'COMPANY'=> 'Company',
                                'COMPLETED'=> 'Selesai',
                                'CONNECTION_ATTEMPTS'=> 'Percobaan koneksi',
                                'CONNECTION_NO'=> 'Sambungan=> Tidak',
                                'CONNECTION_NO_GPS_NO'=> 'Koneksi=> Tidak, GPS=> Tidak',
                                'CONNECTION_STATUS'=> 'Status koneksi',
                                'CONNECTION_YES'=> 'Koneksi=> Ya',
                                'CONNECTION_YES_GPS_NO'=> 'Koneksi=> Ya, GPS=> Tidak',
                                'CONNECTION_YES_GPS_YES'=> 'Koneksi=> Ya, GPS=> Ya',
                                'CONNECT_TO'=> 'Hubungkan ke %s',
                                'CONTACT_ADMINISTRATOR'=> 'Hubungi administrator.',
                                'CONTACT_ADMIN_IF_YOU_WANT_TO_DO_ANY_CHANGES'=> 'Hubungi administrator jika Anda ingin melakukan perubahan apa pun dengan objek Anda.',
                                'CONTACT_INFO'=> 'Informasi kontak',
                                'CONTACT_PAGE_URL'=> 'URL halaman kontak',
                                'CONTINUED_USE_OF_PUSH_NOTIFICATIONS_DECREASE_BATTERY_LIFE'=> 'Penggunaan notifikasi push secara terus-menerus dapat mengurangi masa pakai baterai. Jika Anda menginginkan masa pakai baterai yang lebih baik, setel interval tidak kurang dari 5 menit. ',
                                'CONTROL'=> 'Kontrol',
                                'CONTROL_PANEL'=> 'Panel kendali',
                                'COORDINATES'=> 'Koordinat',
                                'COPY'=> 'Salin',
                                'COST'=> 'Biaya',
                                'COST_PER_GALLON'=> 'Biaya per galon',
                                'COST_PER_LITER'=> 'Biaya per liter',
                                'COUNT'=> 'Hitungan',
                                'COUNTER'=> 'Penghitung',
                                'COUNTERS'=> 'Penghitung',
                                'COUNTRY_STATE'=> 'Kabupaten / Negara Bagian',
                                'CREATE'=> 'Buat',
                                'CREATED'=> 'Dibuat',
                                'CREATE_ACCOUNT'=> 'Buat akun',
                                'CREATE_NOW'=> 'Buat sekarang',
                                'CURRENCY'=> 'Mata Uang',
                                'CURRENT_ENGINE_HOURS'=> 'Jam mesin saat ini',
                                'CURRENT_OBJECT_COUNTERS'=> 'Penghitung objek saat ini',
                                'CURRENT_ODOMETER'=> 'Odometer saat ini',
                                'CURRENT_POSITION'=> 'Posisi saat ini',
                                'CURRENT_POSITION_OFFLINE'=> 'Posisi saat ini (offline)',
                                'CURRENT_VALUE'=> 'Nilai saat ini',
                                'CUSTOM'=> 'Kustom',
                                'CUSTOM_FIELDS'=> 'Kolom kustom',
                                'CUSTOM_FIELDS_FOUND'=> '%s bidang khusus ditemukan.',
                                'CUSTOM_FIELD_PROPERTIES'=> 'Properti bidang kustom',
                                'CUSTOM_GATEWAY'=> 'Gerbang khusus',
                                'CUSTOM_GATEWAY_URL'=> 'URL gateway khusus',
                                'CUSTOM_MAP'=> 'Peta kustom',
                                'CUSTOM_MAPS'=> 'Peta kustom',
                                'CUSTOM_MAP_PROPERTIES'=> 'Properti peta tersesuai',
                                'DAILY'=> 'Harian',
                                'DASHBOARD'=> 'Dashboard',
                                'DATA'=> 'Data',
                                'DATA_ITEMS'=> 'Item data',
                                'DATA_LIST'=> 'Daftar Data',
                                'DATA_POINTS'=> 'Titik data',
                                'DATE'=> 'Tanggal',
                                'DATE_CANT_BE_EMPTY'=> 'Tanggal tidak boleh kosong.',
                                'DAY'=> 'Hari',
                                'DAYLIGHT_SAVING_TIME'=> 'Waktu musim panas (DST)',
                                'DAYS'=> 'Hari',
                                'DAYS_EXPIRED'=> 'Hari kedaluwarsa',
                                'DAYS_INTERVAL'=> 'Interval hari',
                                'DAYS_LEFT'=> 'Hari tersisa',
                                'DAY_FRIDAY'=> 'Jumat',
                                'DAY_FRIDAY_S'=> 'F',
                                'DAY_MONDAY'=> 'Senin',
                                'DAY_MONDAY_S'=> 'M',
                                'DAY_SATURDAY'=> 'Sabtu',
                                'DAY_SATURDAY_S'=> 'S',
                                'DAY_SUNDAY'=> 'Minggu',
                                'DAY_SUNDAY_S'=> 'S',
                                'DAY_THURSDAY'=> 'Kamis',
                                'DAY_THURSDAY_S'=> 'T',
                                'DAY_TIME'=> 'Waktu siang',
                                'DAY_TUESDAY'=> 'Selasa',
                                'DAY_TUESDAY_S'=> 'T',
                                'DAY_WEDNESDAY'=> 'Rabu',
                                'DAY_WEDNESDAY_S'=> 'W',
                                'DEACTIVATE'=> 'Nonaktifkan',
                                'DEACTIVATION_POSITION'=> 'Posisi penonaktifan',
                                'DEACTIVATION_TIME'=> 'Waktu penonaktifan',
                                'DEFAULT'=> 'Default',
                                'DEFAULTS'=> 'Default',
                                'DELETE'=> 'Delete',
                                'DELETED'=> 'Dihapus',
                                'DELETE_AFTER_EXPIRATION'=> 'Hapus setelah kedaluwarsa',
                                'DELETE_ALL'=> 'Hapus semua',
                                'DELETE_ALL_EVENTS'=> 'Hapus semua acara',
                                'DELETE_ALL_MARKERS'=> 'Hapus semua penanda',
                                'DELETE_ALL_ROUTES'=> 'Hapus semua rute',
                                'DELETE_ALL_SELECTED_OBJECT_MESSAGES'=> 'Hapus semua pesan objek terpilih',
                                'DELETE_ALL_ZONES'=> 'Hapus semua zona',
                                'DELETE_OBJECTS'=> 'Hapus objek',
                                'DELETE_SELECTED'=> 'Hapus yang dipilih',
                                'DELIVERED'=> 'terkirim',
                                'DEPARTED'=> 'Berangkat',
                                'DEPENDING_ON_ROUTES'=> 'Tergantung pada rute',
                                'DEPENDING_ON_ZONES'=> 'Tergantung pada zona',
                                'DESCRIPTION'=> 'Deskripsi',
                                'DESKTOP_VERSION'=> 'Versi desktop',
                                'DESTINATION'=> 'Tujuan',
                                'DETAILED'=> 'Detil',
                                'DETAILS'=> 'Detail',
                                'DETECTED_SENSOR_CACHE_CLEARED'=> 'Cache sensor yang terdeteksi dihapus.',
                                'DETECT_STOPS_USING'=> 'Deteksi berhenti menggunakan',
                                'DEVIATION'=> 'Deviasi',
                                'DEVIATION_CANT_BE_LESS_THAN_0'=> 'Deviasi tidak boleh kurang dari 0.',
                                'DIAGNOSTIC_TROUBLE_CODES'=> 'DTC (Kode Masalah Diagnostik)',
                                'DIALOG_BACKGROUND_COLOR'=> 'Warna latar belakang dialog',
                                'DIALOG_OPACITY'=> 'Opasitas dialog',
                                'DIALOG_TITLEBAR_COLOR'=> 'Warna bilah judul dialog',
                                'DICTIONARY'=> 'Kamus',
                                'DIGITAL_INPUT'=> 'Masukan digital',
                                'DIGITAL_OUTPUT'=> 'Keluaran digital',
                                'DISABLED'=> 'Nonaktif',
                                'DISASSEMBLE'=> 'Disassemble',
                                'DISMOUNT'=> 'Turunkan',
                                'DISTANCE'=> 'Distance',
                                'DOOR'=> 'Pintu',
                                'DRAW_ROUTE_ON_MAP_BEFORE_SAVING'=> 'Gambar rute di peta sebelum menyimpan.',
                                'DRAW_ZONE_ON_MAP_BEFORE_SAVING'=> 'Gambar zona di peta sebelum menyimpan.',
                                'DRIVER'=> 'Driver',
                                'DRIVERS'=> 'Driver',
                                'DRIVERS_FOUND'=> '%s driver ditemukan.',
                                'DRIVER_ASSIGN'=> 'Tugas pengemudi',
                                'DRIVER_ASSIGN_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor penetapan driver sudah tersedia.',
                                'DRIVER_BEHAVIOR_RAG'=> 'Perilaku pengemudi (RAG)',
                                'DRIVER_BEHAVIOR_RAG_BY_DRIVER'=> 'Perilaku pengemudi (RAG oleh pengemudi)',
                                'DRIVER_BEHAVIOR_RAG_BY_OBJECT'=> 'Perilaku pengemudi (RAG menurut objek)',
                                'DRIVER_CHANGE'=> 'Perubahan driver',
                                'DRIVER_INFO'=> 'Informasi pengemudi',
                                'DRIVES_AND_STOPS'=> 'Drive dan berhenti',
                                'DRIVES_AND_STOPS_WITH_LOGIC_SENSORS'=> 'Menggerakkan dan berhenti dengan sensor logika',
                                'DRIVES_AND_STOPS_WITH_SENSORS'=> 'Menggerakkan dan berhenti dengan sensor',
                                'DUPLICATE'=> 'Duplikat',
                                'DUPLICATE_OBJECT'=> 'Objek duplikat',
                                'DURATION'=> 'Durasi',
                                'DURATION_FROM_LAST_EVENT'=> 'Durasi dari acara terakhir dalam menit',
                                'EDIT'=> 'Edit',
                                'EDITOR'=> 'Editor',
                                'EDIT_OBJECT'=> 'Edit objek',
                                'EDIT_OBJECTS'=> 'Edit objek',
                                'EDIT_PLAN'=> 'Edit rencana',
                                'EDIT_USER'=> 'Edit pengguna',
                                'EMAIL'=> 'Email',
                                'EMAILS_DAILY'=> 'Jumlah email (harian)',
                                'EMAIL_ADDRESS'=> 'Alamat email',
                                'EMAIL_SETTINGS'=> 'Setting Email',
                                'EMAIL_TEMPLATE'=> 'Template email',
                                'ENABLED'=> 'Diaktifkan',
                                'ENABLE_BILLING'=> 'Aktifkan penagihan',
                                'ENABLE_DISABLE_ARROWS'=> 'Aktifkan / nonaktifkan panah',
                                'ENABLE_DISABLE_CAMERA'=> 'Aktifkan / nonaktifkan kamera',
                                'ENABLE_DISABLE_CLUSTERS'=> 'Aktifkan / nonaktifkan kluster',
                                'ENABLE_DISABLE_DATA_POINTS'=> 'Aktifkan / nonaktifkan titik data',
                                'ENABLE_DISABLE_EVENTS'=> 'Aktifkan / nonaktifkan acara',
                                'ENABLE_DISABLE_KML'=> 'Aktifkan / nonaktifkan KML',
                                'ENABLE_DISABLE_LIVE_TRAFFIC'=> 'Aktifkan / nonaktifkan lalu lintas langsung',
                                'ENABLE_DISABLE_MARKERS'=> 'Aktifkan / nonaktifkan penanda',
                                'ENABLE_DISABLE_OBJECTS'=> 'Aktifkan / nonaktifkan objek',
                                'ENABLE_DISABLE_OBJECT_LABELS'=> 'Aktifkan / nonaktifkan label objek',
                                'ENABLE_DISABLE_ROUTE'=> 'Aktifkan / nonaktifkan rute',
                                'ENABLE_DISABLE_ROUTES'=> 'Aktifkan / nonaktifkan rute',
                                'ENABLE_DISABLE_SNAP'=> 'Aktifkan / nonaktifkan jepret',
                                'ENABLE_DISABLE_STOPS'=> 'Aktifkan / nonaktifkan berhenti',
                                'ENABLE_DISABLE_STREET_VIEW'=> 'Aktifkan / nonaktifkan Street View',
                                'ENABLE_DISABLE_ZONES'=> 'Aktifkan / nonaktifkan zona',
                                'ENABLE_SMS_GATEWAY'=> 'Aktifkan SMS Gateway',
                                'ENABLE_VIRTUAL_ACC_PARAMETER'=> 'Aktifkan parameter ACC virtual tergantung pada voltase (parameter \'accvirt\')',
                                'END'=> 'End',
                                'END_TIME'=> 'Waktu berakhir',
                                'ENGINE_HOURS'=> 'Jam mesin',
                                'ENGINE_HOURS_EXPIRED'=> 'Jam mesin telah habis',
                                'ENGINE_HOURS_INTERVAL'=> 'Interval jam mesin',
                                'ENGINE_HOURS_LEFT'=> 'Jam mesin tersisa',
                                'ENGINE_HOURS_REACHES'=> 'Jam mesin mencapai',
                                'ENGINE_HOURS_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor jam mesin sudah tersedia.',
                                'ENGINE_IDLE'=> 'Mesin menganggur',
                                'ENGINE_IDLE_ARROW_COLOR'=> 'Warna panah diam mesin',
                                'ENGINE_IDLE_COLOR'=> 'Warna mesin diam',
                                'ENGINE_OFF'=> 'Mesin mati',
                                'ENGINE_ON'=> 'Mesin hidup',
                                'ENGINE_RESUME'=> 'Mesin dilanjutkan',
                                'ENGINE_STOP'=> 'Mesin berhenti',
                                'ENGINE_WORK'=> 'Pekerjaan mesin',
                                'ENTER_ACCOUNT_USERNAME_OR_EMAIL'=> 'Masukkan nama pengguna akun atau email ...',
                                'ENTER_CODE'=> 'Masukkan kode',
                                'ENTER_EMAIL_HERE'=> 'Masukkan email di sini ...',
                                'ENTER_IMEI_HERE'=> 'Masukkan IMEI di sini ...',
                                'ENTER_NEW_PASSWORD'=> 'Masukkan kata sandi baru',
                                'ENTER_OBJECT_NAME_OR_IMEI'=> 'Masukkan nama objek atau IMEI ...',
                                'ENTER_USERNAME_AND_PASSWORD_TO_LOGIN'=> 'Masukkan nama pengguna dan sandi untuk login.',
                                'ERROR'=> 'Kesalahan',
                                'EVENT'=> 'Acara',
                                'EVENTS'=> 'Acara',
                                'EVENTS_FOUND'=> '%s peristiwa ditemukan.',
                                'EVENT_DATA_LIST'=> 'Daftar data acara',
                                'EVENT_POSITION'=> 'Posisi acara',
                                'EVENT_PROPERTIES'=> 'Properti acara',
                                'EXACT_TIME'=> 'Waktu yang tepat',
                                'EXAMPLE_SHORT'=> 'ex.',
                                'EXECUTE_NOW'=> 'Jalankan sekarang',
                                'EXPENSE'=> 'Expense',
                                'EXPENSES'=> 'Beban',
                                'EXPENSE_PROPERTIES'=> 'Properti biaya',
                                'EXPIRED'=> 'Kedaluwarsa',
                                'EXPIRES_ON'=> 'Kedaluwarsa pada',
                                'EXPIRE_ACCOUNT'=> 'Kedaluwarsa akun',
                                'EXPIRE_ACCOUNT_DAYS_AFTER_REGISTRATION'=> 'Kedaluwarsa akun (hari setelah pendaftaran akun)',
                                'EXPIRE_OBJECT'=> 'Kedaluwarsa objek',
                                'EXPIRE_ON'=> 'Kedaluwarsa pada',
                                'EXPIRING_OBJECTS'=> 'Objek kedaluwarsa',
                                'EXPORT'=> 'Export',
                                'EXPORT_CSV'=> 'Ekspor ke CSV',
                                'EXPORT_GPX'=> 'Ekspor ke GPX',
                                'EXPORT_GSR'=> 'Ekspor ke GSR',
                                'EXPORT_KML'=> 'Ekspor ke KML',
                                'EX_ANNUAL_FEE'=> 'mis. Biaya tahunan',
                                'EX_MY_GPS_SERVER'=> 'mis. Server GPS Saya ',
                                'FAHRENHEIT'=> 'Fahrenheit',
                                'FAILED'=> 'Gagal',
                                'FAVICON'=> 'Favicon',
                                'FAVICON_SIZE_FORMAT'=> 'Favicon, ukuran hingga 256 x 256 px, PNG atau ICO',
                                'FILE_TYPE_MUST_BE_JPEG'=> 'Jenis file harus JPEG.',
                                'FILE_TYPE_MUST_BE_KML'=> 'Jenis file harus KML.',
                                'FILE_TYPE_MUST_BE_PNG'=> 'Jenis file harus PNG.',
                                'FILE_TYPE_MUST_BE_PNG_OR_ICO'=> 'Jenis file harus PNG atau ICO.',
                                'FILE_TYPE_MUST_BE_PNG_OR_JPG'=> 'Jenis file harus PNG atau JPG.',
                                'FILE_TYPE_MUST_BE_PNG_OR_SVG'=> 'Jenis file harus PNG atau SVG.',
                                'FILLED'=> 'Diisi',
                                'FILTER'=> 'Filter',
                                'FINISHED'=> 'Selesai',
                                'FIT_OBJECTS'=> 'Sesuaikan objek',
                                'FIT_OBJECTS_ON_MAP'=> 'Paskan objek pada peta',
                                'FOLLOW'=> 'Ikuti',
                                'FOLLOW_NEW_WINDOW'=> 'Ikuti (jendela baru)',
                                'FOLLOW_UNFOLLOW_ALL'=> 'Ikuti / batalkan semua',
                                'FONTS'=> 'Huruf',
                                'FONT_COLOR'=> 'Warna font',
                                'FORMAT'=> 'Format',
                                'FORMULA'=> 'Rumus',
                                'FORMULA_IS_NOT'=> 'Formula tidak valid.',
                                'FORWARD_THIS_OBJECT_LOCATION_DATA_TO_ANOTHER_OBJECT'=> 'Forward this object location data to another object from this account (should be used only for Iridium Satellite solutions)',
                                'FROM'=> 'Dari',
                                'FUEL_CONSUMPTION'=> 'Konsumsi bahan bakar',
                                'FUEL_CONSUMPTION_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor konsumsi bahan bakar sudah tersedia.',
                                'FUEL_COST'=> 'Biaya bahan bakar',
                                'FUEL_FILLINGS'=> 'Isi bahan bakar',
                                'FUEL_LEVEL'=> 'Tingkat bahan bakar',
                                'FUEL_LEVEL_GRAPH'=> 'Grafik tingkat bahan bakar',
                                'FUEL_LEVEL_SUM_UP'=> 'Jumlah level bahan bakar',
                                'FUEL_LEVEL_SUM_UP_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor jumlah level bahan bakar telah tersedia.',
                                'FUEL_THEFTS'=> 'Pencurian bahan bakar',
                                'GALLON'=> 'Galon',
                                'GATEWAY'=> 'Pintu Gerbang',
                                'GENERAL'=> 'Umum',
                                'GENERAL_INFO'=> 'Informasi umum',
                                'GENERAL_INFO_MERGED'=> 'Informasi umum (digabungkan)',
                                'GENERATE'=> 'Hasilkan',
                                'GENERATED'=> 'Dihasilkan',
                                'GEOCODER'=> 'Geocoder',
                                'GEOCODER_CACHE_CLEARED'=> 'Cache geocoder dihapus.',
                                'GEOCODER_LICENSE_KEYS'=> 'Kunci lisensi Geocoder',
                                'GEOCODER_SERVICE'=> 'Layanan Geocoder',
                                'GOOGLE_GEOCODER_KEY'=> 'Kunci Google Geocoder (dapatkan di sini=> https=>//developers.google.com)',
                                'GOOGLE_MAPS_KEY'=> 'Google Maps key (dapatkan di sini=> https=>//developers.google.com)',
                                'GPRS'=> 'GPRS',
                                'GPS_ANTENNA_CUT'=> 'Antena GPS terputus',
                                'GPS_DEVICE'=> 'Perangkat GPS',
                                'GPS_LEVEL'=> 'Tingkat GPS',
                                'GPS_NO'=> 'GPS=> Tidak',
                                'GPS_SERVER_NAME'=> 'Nama server GPS',
                                'GPS_YES'=> 'GPS=> Ya',
                                'GRAPH'=> 'Grafik',
                                'GRAPHICAL_REPORTS'=> 'Laporan grafis',
                                'GRID_PAGE_TEXT'=> 'Halaman {0} dari {1}',
                                'GRID_VIEW_TEXT'=> 'Tampilan {0} - {1} dari {2}',
                                'GROUP'=> 'Grup',
                                'GROUPS'=> 'Grup',
                                'GROUPS_FOUND'=> '%s grup ditemukan.',
                                'GSM_LEVEL'=> 'Tingkat GSM',
                                'HARDWARE_KEY'=> 'Kunci Perangkat Keras',
                                'HARSH_ACCELERATION'=> 'Akselerasi yang keras',
                                'HARSH_ACCELERATION_COUNT'=> 'Jumlah akselerasi yang keras',
                                'HARSH_ACCELERATION_SCORE'=> 'Skor akselerasi yang keras',
                                'HARSH_BRAKING'=> 'Pengereman yang keras',
                                'HARSH_BRAKING_COUNT'=> 'Hitungan pengereman yang keras',
                                'HARSH_BRAKING_SCORE'=> 'Skor pengereman yang keras',
                                'HARSH_CORNERING'=> 'Menikung tajam',
                                'HARSH_CORNERING_COUNT'=> 'Jumlah saat menikung yang sulit',
                                'HARSH_CORNERING_SCORE'=> 'Skor menikung tajam',
                                'HEADING_FONT_COLOR'=> 'Warna font judul',
                                'HECTARES'=> 'Hektar',
                                'HELLO'=> 'Halo',
                                'HELP'=> 'Bantuan',
                                'HELP_PAGE_URL'=> 'URL tombol halaman bantuan',
                                'HIDE'=> 'Sembunyikan',
                                'HIDE_UNUSED_PROTOCOLS'=> 'Sembunyikan protokol yang tidak digunakan',
                                'HIGH'=> 'High',
                                'HIGHEST_SCORE'=> 'Skor tertinggi',
                                'HIGHEST_VALUE'=> 'Nilai tertinggi',
                                'HISTORY'=> 'History',
                                'HISTORY_ROUTE_COLOR'=> 'Warna rute riwayat',
                                'HISTORY_ROUTE_DATA_LIST'=> 'Daftar data rute riwayat',
                                'HISTORY_ROUTE_HIGHLIGHT_COLOR'=> 'Warna sorotan rute sejarah',
                                'HOLD_CTRL_TO_SELECT_MULTIPLE_ITEMS'=> 'Tahan \'Ctrl\' untuk memilih beberapa item',
                                'HORIZONTAL_DIALOG_POSITION'=> 'Posisi dialog horizontal',
                                'HTTP_FULL_ADDRESS_HERE'=> 'http=> // full_address_here',
                                'ICON'=> 'Ikon',
                                'ICON_SIZE_SHOULD_BE_32_32'=> 'Ukuran ikon harus 32 x 32 px.',
                                'IDLE'=> 'Diam',
                                'ID_NUMBER'=> 'Nomor ID',
                                'IF_SENSOR_0'=> 'Jika sensor \'0\' (teks)',
                                'IF_SENSOR_1'=> 'Jika sensor \'1\' (teks)',
                                'IGNITION'=> 'Pengapian',
                                'IGNITION_ACC'=> 'Pengapian (ACC)',
                                'IGNITION_GRAPH'=> 'Grafik pengapian',
                                'IGNITION_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor pengapian sudah tersedia.',
                                'IGNORE_EMPTY_REPORTS'=> 'Abaikan laporan kosong',
                                'IGNORE_FUEL_CONSUMPTION_DURING_STOPS'=> 'Ignore fuel consumption during stops',
                                'IGNORE_IF_IGNITION_IS_OFF'=> 'Abaikan jika kunci kontak dimatikan',
                                'IMAGES'=> 'Images',
                                'IMAGE_GALLERY'=> 'Galeri gambar',
                                'IMAGE_SIZE_SHOULD_NOT_BE_BIGGER_THAN_640_480'=> 'Ukuran gambar tidak boleh lebih besar dari 640 x 480 px.',
                                'IMAGE_UPLOADED_SUCCESSFULLY'=> 'Gambar berhasil diunggah.',
                                'IMAGE_UPLOAD_FAILED'=> 'Pengunggahan gambar gagal.',
                                'IMAGE_WIGTH_OR_HEIGHT_DOES_NOT_MEET_REQUIREMENTS'=> 'Lebar atau tinggi gambar tidak memenuhi persyaratan.',
                                'IMEI'=> 'IMEI',
                                'IMEI_IS_NOT_VALID'=> 'IMEI tidak sah.',
                                'IMPORT'=> 'Impor',
                                'IMPORT_EXPORT'=> 'Impor / Ekspor',
                                'IMPORT_EXPORT_TOOLS'=> 'Impor dan ekspor alat',
                                'IMPORT_FILE_IS_TOO_BIG'=> 'File impor terlalu besar.',
                                'INACTIVE_OBJECTS'=> 'Objek tidak aktif',
                                'INCORRECT_PASSWORD'=> 'Sandi salah.',
                                'INFO'=> 'Info',
                                'INFORMATION'=> 'Informasi',
                                'INTERVAL_VALUE_SHOULD_BE_GREATER_THAN_LEFT_VALUE'=> 'Nilai interval harus lebih besar dari nilai kiri.',
                                'INVALID_DST_INTERVAL'=> 'Interval waktu musim panas (DST) tidak valid.',
                                'INVALID_FILE_FORMAT'=> 'Format file tidak valid.',
                                'IN_PROGRESS'=> 'Dalam proses',
                                'IN_SELECTED_ROUTES'=> 'Dalam rute yang dipilih',
                                'IN_SELECTED_ZONES'=> 'Di zona yang dipilih',
                                'IP'=> 'IP',
                                'ITEMS'=> 'Item',
                                'KEEP_HISTORY_PERIOD'=> 'Simpan periode sejarah (hari)',
                                'KILOMETER'=> 'Kilometer',
                                'KML'=> 'KML',
                                'KML_ALLOWS_TO_IMPORT_AND_VISUALIZE_ADDITIONAL_DATA'=> 'KML memungkinkan untuk mengimpor dan memvisualisasikan data tambahan pada peta.',
                                'KML_FILE'=> 'File KML',
                                'KML_PROPERTIES'=> 'Properti KML',
                                'KML_SIZE_LIMIT_IS_REACHED'=> 'Batas ukuran KML tercapai.',
                                'LANDSCAPE'=> 'Pemandangan',
                                'LANGUAGE'=> 'Bahasa',
                                'LANGUAGES'=> 'Bahasa',
                                'LANGUAGE_PROPERTIES'=> 'Properti bahasa',
                                'LAST_CONNECTION'=> 'Koneksi terakhir',
                                'LAST_HOUR'=> 'Satu jam terakhir',
                                'LAST_LOGIN_DAYS_AGO'=> 'Login terakhir (hari yang lalu)',
                                'LAST_MONTH'=> 'Bulan lalu',
                                'LAST_SERVICE'=> 'Layanan terakhir',
                                'LAST_WEEK'=> 'Minggu lalu',
                                'LATITUDE'=> 'Lintang',
                                'LATITUDE_IS_OUT_OF_RANGE'=> 'Garis lintang di luar jangkauan. Rentang yang valid adalah dari -90 hingga 90. ',
                                'LAYER'=> 'Lapisan',
                                'LAYERS'=> 'Lapisan',
                                'LEFT'=> 'Kiri',
                                'LEFT_PANEL'=> 'Panel kiri',
                                'LENGTH'=> 'Panjang',
                                'LIMITED'=> 'Terbatas',
                                'LITER'=> 'Liter',
                                'LIVE_TRAFFIC'=> 'Lalu lintas langsung',
                                'LIVE_TRAFFIC_FOR_THIS_MAP_IS_NOT_AVAILABLE'=> 'Lalu lintas langsung untuk peta ini tidak tersedia.',
                                'LOADING'=> 'Memuat ...',
                                'LOAD_GSR'=> 'Muat GSR',
                                'LOCATION'=> 'Lokasi',
                                'LOGBOOK'=> 'Buku Catatan',
                                'LOGIC'=> 'Logika',
                                'LOGIC_SENSORS'=> 'Sensor logika',
                                'LOGIN'=> 'Masuk',
                                'LOGIN_AS_USER'=> 'Masuk sebagai pengguna',
                                'LOGIN_BACKGROUND'=> 'Latar belakang login',
                                'LOGIN_BACKGROUND_SIZE_FORMAT'=> 'Latar belakang info masuk, ukuran 1920 x 1080 px, JPEG',
                                'LOGIN_DATA_WILL_BE_SENT_TO_EMAIL'=> 'Data login akan dikirim ke alamat email yang diberikan.',
                                'LOGIN_DETAILS'=> 'Detil login',
                                'LOGIN_DIALOG_URL'=> 'URL dialog Login',
                                'LOGIN_TIME'=> 'Waktu masuk',
                                'LOGO'=> 'Logo',
                                'LOGOUT'=> 'Keluar',
                                'LOGO_POSITION'=> 'Posisi logo',
                                'LOGO_SIZE_FORMAT'=> 'Logo, ukuran 250 x 56 px, PNG atau SVG',
                                'LOGO_SMALL_SIZE_FORMAT'=> 'Logo kecil, ukuran 32 x 32 px, PNG atau SVG',
                                'LOGS'=> 'Log',
                                'LOG_VIEWER'=> 'Penampil log',
                                'LONGITUDE'=> 'Garis Bujur',
                                'LONGITUDE_IS_OUT_OF_RANGE'=> 'Garis bujur di luar jangkauan. Rentang yang valid adalah dari -180 hingga 180. ',
                                'LOW'=> 'Rendah',
                                'LOWEST_HISTORY_PERIOD_IS_30_DAYS'=> 'Periode sejarah terendah adalah 30 hari. Pengaturan tidak disimpan. ',
                                'LOWEST_SCORE'=> 'Nilai terendah',
                                'LOWEST_VALUE'=> 'Nilai terendah',
                                'LOW_BATTERY'=> 'Baterai lemah',
                                'LOW_DC'=> 'DC Rendah',
                                'MAIN'=> 'Utama',
                                'MAINTENANCE'=> 'Pemeliharaan',
                                'MANAGER'=> 'Manajer',
                                'MANAGER_PRIVILEGES'=> 'Hak istimewa manajer',
                                'MANAGE_SERVER'=> 'Kelola server',
                                'MAN_DOWN'=> 'Man down',
                                'MAP'=> 'Peta',
                                'MAPBOX_GEOCODER_KEY'=> 'Kunci Geocoder Kotak Peta (dapatkan di sini=> https=>//www.mapbox.com)',
                                'MAPBOX_MAPS_KEY'=> 'Kunci Peta Kotak Peta (dapatkan di sini=> https=>//mapbox.com)',
                                'MAPS'=> 'Peta',
                                'MAP_ICON_SIZE'=> 'Ukuran ikon peta',
                                'MAP_LAYER_ZOOM_POSITION_AFTER_LOGIN'=> 'Map layer, zoom dan posisi setelah pengguna login',
                                'MAP_LICENSE_KEYS'=> 'Petakan kunci lisensi',
                                'MAP_REPORTS'=> 'Laporan peta',
                                'MAP_ROUTING'=> 'Perutean peta',
                                'MAP_STARTUP_POSITION'=> 'Petakan posisi awal',
                                'MARKERS'=> 'Penanda',
                                'MARKERS_INSTEAD_OF_ADDRESSES'=> 'Markers instead of addresses',
                                'MARKERS_ROUTES_ZONES_FOUND'=> '%s penanda, %s rute, %s zona ditemukan.',
                                'MARKER_IN'=> 'Marker in',
                                'MARKER_IN_OUT'=> 'Marker in/out',
                                'MARKER_IN_OUT_WITH_GEN_INFORMATION'=> 'Marker in/out with gen. information',
                                'MARKER_LIMIT_IS_REACHED'=> 'Batas penanda tercapai.',
                                'MARKER_NAME'=> 'Marker name',
                                'MARKER_OUT'=> 'Marker out',
                                'MARKER_POSITION'=> 'Marker position',
                                'MARKER_PROPERTIES'=> 'Properti penanda',
                                'MARKER_VISIBLE'=> 'Penanda terlihat',
                                'MAX_API_DAILY'=> 'Maks. jumlah panggilan API (harian) ',
                                'MAX_EMAILS_DAILY'=> 'Maks. jumlah email (harian) ',
                                'MAX_HDOP_VALUE'=> 'Maks. nilai hdop (menghilangkan drifting, default 3) ',
                                'MAX_MARKERS'=> 'Maks. jumlah penanda ',
                                'MAX_ROUTES'=> 'Maks. jumlah rute ',
                                'MAX_SMS_DAILY'=> 'Maks. nomor SMS (harian) ',
                                'MAX_WEBHOOK_DAILY'=> 'Maks. jumlah Webhook (harian) ',
                                'MAX_ZONES'=> 'Maks. jumlah zona ',
                                'MEASUREMENT'=> 'Pengukuran',
                                'MEASUREMENT_AND_COST'=> 'Pengukuran dan biaya',
                                'MEASURE_AREA'=> 'Ukur luas',
                                'MEASURE_ROUTE_LENGTH_USING'=> 'Ukur panjang rute menggunakan',
                                'MEDIA_REPORTS'=> 'Laporan media',
                                'MENU'=> 'Menu',
                                'MESSAGE'=> 'Pesan',
                                'MESSAGES'=> 'Messages',
                                'MESSAGE_TO_EMAIL'=> 'Pesan ke email, untuk beberapa email pisahkan dengan koma',
                                'MILE'=> 'Mil',
                                'MILEAGE'=> 'Jarak Tempuh',
                                'MILEAGE_DAILY'=> 'Jarak tempuh (harian)',
                                'MIN_DIFF_BETWEEN_POINTS'=> 'Min. perbedaan antara titik trek (menghilangkan drifting, default 0,0005) ',
                                'MIN_FF'=> 'Min. perbedaan bahan bakar untuk mendeteksi pengisian bahan bakar (default 10) ',
                                'MIN_FT'=> 'Min. perbedaan bahan bakar untuk mendeteksi pencurian bahan bakar (default 10) ',
                                'MIN_FUEL_SPEED'=> 'Min. kecepatan deteksi perbedaan bahan bakar dalam km / jam (default 10) ',
                                'MIN_GPSLEV_VALUE'=> 'Min. nilai gpslev (menghilangkan drifting, default 5) ',
                                'MIN_IDLE_SPEED'=> 'Min. kecepatan mesin idle dalam km / jam (mempengaruhi status mesin idle, default 3) ',
                                'MIN_MOVING_SPEED'=> 'Min. kecepatan bergerak dalam km / jam (mempengaruhi berhenti dan akurasi lintasan, default 6) ',
                                'MOBILE_APPLICATION'=> 'Aplikasi seluler',
                                'MOBILE_VERSION'=> 'Versi seluler',
                                'MODEL'=> 'Model',
                                'MODIFIED'=> 'Dimodifikasi',
                                'MONTH'=> 'Bulan',
                                'MONTHLY'=> 'Bulanan',
                                'MONTHS'=> 'Bulan',
                                'MONTH_APRIL'=> 'April',
                                'MONTH_APRIL_S'=> 'Apr',
                                'MONTH_AUGUST'=> 'Agustus',
                                'MONTH_AUGUST_S'=> 'Agustus',
                                'MONTH_DECEMBER'=> 'Desember',
                                'MONTH_DECEMBER_S'=> 'Des',
                                'MONTH_FEBRUARY'=> 'Februari',
                                'MONTH_FEBRUARY_S'=> 'Feb',
                                'MONTH_JANUARY'=> 'Januari',
                                'MONTH_JANUARY_S'=> 'Jan',
                                'MONTH_JULY'=> 'Juli',
                                'MONTH_JULY_S'=> 'Jul',
                                'MONTH_JUNE'=> 'Juni',
                                'MONTH_JUNE_S'=> 'Jun',
                                'MONTH_MARCH'=> 'Maret',
                                'MONTH_MARCH_S'=> 'Mar',
                                'MONTH_MAY'=> 'Mei',
                                'MONTH_MAY_S'=> 'Mei',
                                'MONTH_NOVEMBER'=> 'November',
                                'MONTH_NOVEMBER_S'=> 'Nov',
                                'MONTH_OCTOBER'=> 'Oktober',
                                'MONTH_OCTOBER_S'=> 'Okt',
                                'MONTH_SEPTEMBER'=> 'September',
                                'MONTH_SEPTEMBER_S'=> 'Sep',
                                'MORE_THAN_DAYS'=> 'Lebih dari (hari)',
                                'MOVE_DURATION'=> 'Durasi perpindahan',
                                'MOVING'=> 'Pindah',
                                'MOVING_ARROW_COLOR'=> 'Warna panah bergerak',
                                'MOVING_COLOR'=> 'Memindahkan warna',
                                'MY_ACCOUNT'=> 'Akun saya',
                                'NA'=> 'n / a',
                                'NAME'=> 'Nama',
                                'NAME_CANT_BE_EMPTY'=> 'Nama tidak boleh kosong.',
                                'NAME_SURNAME'=> 'Nama, nama belakang',
                                'NAME_VISIBLE'=> 'Nama terlihat',
                                'NAUTICAL_MILE'=> 'Mil laut',
                                'NEAREST_MARKER'=> 'Penanda terdekat',
                                'NEAREST_ZONE'=> 'Zona terdekat',
                                'NET_PROTOCOL'=> 'Net. protokol',
                                'NEW'=> 'New',
                                'NEWLY_ADDED_OBJECTS_CAN_BE_USED_FOR'=> 'Objek yang baru ditambahkan dapat digunakan selama %s hari gratis.',
                                'NEW_CHAT_MESSAGE_SOUND_ALERT'=> 'Peringatan suara pesan obrolan baru',
                                'NEW_EVENT'=> 'Acara baru',
                                'NEW_EVENT_WAS_RECEIVED'=> 'Acara baru telah diterima.',
                                'NEW_LOGIN_DATA_WILL_BE_SENT_TO_EMAIL'=> 'Data login baru akan dikirim ke alamat email yang diberikan.',
                                'NEW_MARKER'=> 'Penanda baru',
                                'NEW_PASSWORD'=> 'Kata sandi baru',
                                'NEW_ROUTE'=> 'Rute baru',
                                'NEW_TASK'=> 'Tugas baru',
                                'NEW_USER_REGISTRATION_ON_THIS_SERVER_IS_CLOSED'=> 'Pendaftaran pengguna baru di server ini ditutup. Pilih yang lain dari daftar di bawah ini. ',
                                'NEW_ZONE'=> 'Zona baru',
                                'NIGHT_ENDS'=> 'Malam berakhir',
                                'NIGHT_STARTS'=> 'Malam dimulai',
                                'NO'=> 'No',
                                'NONE'=> 'Tidak ada',
                                'NORMAL'=> 'Normal',
                                'NOTHING_HAS_BEEN_FOUND_ON_YOUR_REQUEST'=> 'Tidak ada yang ditemukan atas permintaan Anda.',
                                'NOTHING_HAS_BEEN_FOUND_TO_IMPORT'=> 'Tidak ada yang ditemukan untuk diimpor.',
                                'NOTHING_SELECTED'=> 'Tidak ada yang dipilih',
                                'NOTIFICATIONS'=> 'Notifications',
                                'NO_BILLING_PLANS_FOUND'=> 'Tidak ada paket penagihan ditemukan.',
                                'NO_CONNECTION_ARROW_COLOR'=> 'Tidak ada warna panah koneksi',
                                'NO_CONNECTION_COLOR'=> 'Tidak ada warna koneksi',
                                'NO_DATA'=> 'Tidak ada data',
                                'NO_DATA_HAS_BEEN_COLLECTED_YET'=> 'Belum ada data yang dikumpulkan.',
                                'NO_DATA_HAS_BEEN_RECEIVED_YET'=> 'Belum ada data yang diterima dari perangkat GPS.',
                                'NO_DRIVER'=> 'Tidak ada driver',
                                'NO_EVENT_SELECTED'=> 'Tidak ada kejadian yang dipilih.',
                                'NO_HISTORY_LOADED'=> 'Tidak ada riwayat yang dimuat.',
                                'NO_ITEMS'=> 'Tidak ada item',
                                'NO_ITEMS_SELECTED'=> 'Tidak ada item dipilih.',
                                'NO_MANAGER'=> 'Tidak ada manajer',
                                'NO_MATCHES_FOUND'=> 'Tidak ada yang cocok',
                                'NO_MESSAGES'=> 'Tidak ada pesan',
                                'NO_OBJECTS'=> 'Tidak ada objek',
                                'NO_OBJECT_SELECTED'=> 'Tidak ada objek yang dipilih.',
                                'NO_RECORDS_TO_VIEW'=> 'Tidak ada record untuk dilihat',
                                'NO_REPLY_EMAIL_ADDRESS'=> 'Tidak ada alamat email balasan',
                                'NO_SOUND'=> 'Tidak ada suara',
                                'NO_TRAILER'=> 'Tidak ada cuplikan',
                                'NUMBER'=> 'Nomor',
                                'NUMBER_OF_OBJECTS'=> 'Jumlah objek',
                                'OBJECT'=> 'Object',
                                'OBJECTS'=> 'Objek',
                                'OBJECTS_ACTIVATED_SUCCESSFULLY'=> 'Objek berhasil diaktifkan.',
                                'OBJECTS_FOUND'=> '%s objek ditemukan.',
                                'OBJECTS_TILL'=> 'objek hingga',
                                'OBJECT_ACTIVATION_FAILED'=> 'Aktivasi objek gagal.',
                                'OBJECT_ARROW_COLOR'=> 'Warna panah objek',
                                'OBJECT_CONNECTION_TIMEOUT_RESETS_CONNECTION_AND_GPS_STATUS'=> 'Batas waktu koneksi objek, reset koneksi dan status GPS',
                                'OBJECT_CONTROL'=> 'Kontrol objek',
                                'OBJECT_CONTROL_DEFAULT_TEMPLATES'=> 'Object control default templates',
                                'OBJECT_DATA_LIST'=> 'Daftar data objek',
                                'OBJECT_DATE_LIMIT'=> 'Batas tanggal objek',
                                'OBJECT_DATE_LIMIT_DAYS_AFTER_REGISTRATION'=> 'Batas tanggal objek (hari setelah pendaftaran akun)',
                                'OBJECT_DETAILS_POPUP_ON_CLUSTER_MOUSE_HOVER'=> 'Munculan detail objek saat arahkan mouse ke cluster',
                                'OBJECT_DRIVER_LIST'=> 'Daftar driver objek',
                                'OBJECT_DRIVER_PROPERTIES'=> 'Properti driver objek',
                                'OBJECT_EXPIRATION_DATE_IS_TOO_LATE'=> 'Tanggal kedaluwarsa objek sudah terlambat.',
                                'OBJECT_EXPIRATION_DATE_MUST_BE_SET'=> 'Tanggal kedaluwarsa objek harus disetel.',
                                'OBJECT_GROUP_LIST'=> 'Daftar grup objek',
                                'OBJECT_GROUP_PROPERTIES'=> 'Properti grup objek',
                                'OBJECT_INFO'=> 'Informasi objek',
                                'OBJECT_LIMIT'=> 'Batas objek',
                                'OBJECT_LIMIT_IS_REACHED'=> 'Batas objek tercapai.',
                                'OBJECT_LIST'=> 'Daftar objek',
                                'OBJECT_LIST_COLOR'=> 'Warna daftar objek',
                                'OBJECT_NAME'=> 'Nama objek',
                                'OBJECT_PASSENGER_LIST'=> 'Daftar penumpang objek',
                                'OBJECT_PASSENGER_PROPERTIES'=> 'Properti objek penumpang',
                                'OBJECT_SIM_CARD_NUMBER_IS_NOT_SET'=> 'Nomor kartu SIM objek tidak diset.',
                                'OBJECT_TRAILER_LIST'=> 'Daftar cuplikan objek',
                                'OBJECT_TRAILER_PROPERTIES'=> 'Properti trailer objek',
                                'OBJECT_TRIAL_LIMIT_DAYS'=> 'Batas percobaan objek (hari)',
                                'ODOMETER'=> 'Odometer',
                                'ODOMETER_A'=> 'Odometer A',
                                'ODOMETER_B'=> 'Odometer B',
                                'ODOMETER_EXPIRED'=> 'Odometer kedaluwarsa',
                                'ODOMETER_INTERVAL'=> 'Interval odometer',
                                'ODOMETER_LEFT'=> 'Odometer tersisa',
                                'ODOMETER_REACHES'=> 'Odometer mencapai',
                                'ODOMETER_SENSOR'=> 'Sensor odometer',
                                'ODOMETER_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor odometer sudah tersedia.',
                                'ODOMETER_TOP_10'=> '10 Teratas Odometer',
                                'OFF'=> 'Mati',
                                'OFFLINE'=> 'Offline',
                                'OK'=> 'OK',
                                'OLD_PASSWORD'=> 'Kata sandi lama',
                                'ON'=> 'On',
                                'ONCE'=> 'Once',
                                'ONE_TIME'=> 'Satu kali',
                                'ONLINE'=> 'Online',
                                'OPEN'=> 'Buka',
                                'OPEN_AFTER_LOGIN'=> 'Buka setelah login',
                                'OR'=> 'or',
                                'OSMR_SERVICE_URL'=> 'URL layanan OSMR',
                                'OTHER'=> 'Lainnya',
                                'OUTPUT_OFF'=> 'Keluaran mati',
                                'OUTPUT_ON'=> 'Keluaran aktif',
                                'OUT_OF_SELECTED_ROUTES'=> 'Dari rute yang dipilih',
                                'OUT_OF_SELECTED_ZONES'=> 'Di luar zona yang dipilih',
                                'OVERSPEED'=> 'Kecepatan berlebihan',
                                'OVERSPEEDS'=> 'Kecepatan berlebih',
                                'OVERSPEED_COUNT'=> 'Jumlah kecepatan berlebih',
                                'OVERSPEED_COUNT_MERGED'=> 'Jumlah kecepatan berlebih (digabungkan)',
                                'OVERSPEED_DURATION'=> 'Durasi kecepatan berlebih',
                                'OVERSPEED_POSITION'=> 'Posisi kecepatan berlebih',
                                'OVERSPEED_SCORE'=> 'Skor kecepatan berlebih',
                                'PAGE'=> 'Halaman',
                                'PAGE_AFTER_ADMIN_OR_MANAGER_LOGIN'=> 'Halaman setelah Administrator atau Manajer masuk',
                                'PAGE_GENERATOR_TAG'=> 'Tag pembuat halaman',
                                'PAN_LEFT'=> 'Pan kiri',
                                'PAN_RIGHT'=> 'Pan right',
                                'PARAMETER'=> 'Parameter',
                                'PARAMETERS'=> 'Parameter',
                                'PARAMETERS_AND_SENSORS'=> 'Parameter dan sensor',
                                'PASSENGER'=> 'Penumpang',
                                'PASSENGERS'=> 'Penumpang',
                                'PASSENGERS_FOUND'=> '%s penumpang ditemukan.',
                                'PASSENGER_ASSIGN'=> 'Penugasan penumpang',
                                'PASSENGER_ASSIGN_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor penetapan penumpang sudah tersedia.',
                                'PASSENGER_INFO'=> 'Informasi penumpang',
                                'PASSWORD'=> 'Sandi',
                                'PASSWORD_CANT_BE_EMPTY'=> 'Kata sandi tidak boleh kosong.',
                                'PASSWORD_LENGHT_AT_LEAST'=> 'Panjang sandi minimal 6 karakter.',
                                'PASSWORD_SPACE_CHARACTERS'=> 'Kata sandi tidak boleh mengandung karakter spasi.',
                                'PAUSE'=> 'Pause',
                                'PAYPAL_ACCOUNT'=> 'Akun PayPal',
                                'PAYPAL_CLIENT_ID'=> 'PayPal Client ID',
                                'PAYPAL_CUSTOM'=> 'PayPal khusus',
                                'PAYPAL_GATEWAY'=> 'Gerbang PayPal',
                                'PAYPAL_IPN_URL'=> 'URL IPN PayPal',
                                'PAYPAL_V2_GATEWAY'=> 'PayPal v2 gateway',
                                'PER'=> 'per',
                                'PERCENTAGE'=> 'Persentase',
                                'PERIOD'=> 'Periode',
                                'PHONE'=> 'Phone',
                                'PHONE_CANT_BE_EMPTY'=> 'Telepon tidak boleh kosong.',
                                'PHONE_NUMBER_1'=> 'Nomor telepon 1',
                                'PHONE_NUMBER_2'=> 'Nomor telepon 2',
                                'PHONE_NUMBER_WITH_CODE'=> 'Nomor telepon dengan kode',
                                'PHOTO_REQUEST'=> 'Permintaan foto',
                                'PICKPOINT_GEOCODER_KEY'=> 'Kunci Geocoder PickPoint (dapatkan di sini=> https=>//pickpoint.io)',
                                'PLACES'=> 'Tempat',
                                'PLACES_GROUP_PROPERTIES'=> 'Properti grup tempat',
                                'PLACE_MARKER_ON_MAP_BEFORE_SAVING'=> 'Tempatkan penanda pada peta sebelum menyimpan.',
                                'PLAN'=> 'Rencana',
                                'PLAN_VERIFICATION_FAILED'=> 'Verifikasi rencana gagal.',
                                'PLATE'=> 'Piring',
                                'PLATE_NUMBER'=> 'Nomor pelat',
                                'PLAY'=> 'Play',
                                'PLEASE_CHECK_SERVER_EMAIL_SMTP_SETTINGS'=> 'Silakan periksa pengaturan SMTP email server.',
                                'PLEASE_CHECK_YOUR_EMAIL'=> 'Silakan periksa email Anda.',
                                'PLEASE_LOGIN_INTO_ACCOUNT_FOR_MORE_DETAILS'=> 'Silakan masuk ke akun untuk lebih jelasnya.',
                                'PLEASE_PURCHASE_ACCESS_TO'=> 'Jika Anda ingin terus menggunakan layanan kami, silakan beli akses ke',
                                'PLEASE_SELECT_KML_FILE'=> 'Silakan pilih file KML.',
                                'PLEASE_SET_SMTP_SERVER_SETTINGS_IN_MANAGE_SERVER_SECTION'=> 'Please set SMTP server settings in Manage server section, otherwise new user registration and event notifications will not work. Would you like to open it now?',
                                'PLEASE_WAIT'=> 'Mohon tunggu ...',
                                'POLYGON'=> 'Poligon',
                                'POPUP'=> 'Munculan',
                                'PORT'=> 'Pelabuhan',
                                'PORTRAIT'=> 'Portrait',
                                'POSITION'=> 'Posisi',
                                'POSITION_A'=> 'Posisi A',
                                'POSITION_B'=> 'Posisi B',
                                'POSITION_INTERVAL'=> 'Interval posisi',
                                'POST_CODE'=> 'Kode pos',
                                'POWER_CUT'=> 'Listrik mati',
                                'PRICE'=> 'Harga',
                                'PRINT_MAP'=> 'Cetak peta',
                                'PRIORITY'=> 'Prioritas',
                                'PRIVILEGES'=> 'Hak Istimewa',
                                'PROTOCOL'=> 'Protokol',
                                'PROTOCOLS'=> 'Protokol',
                                'PROXIMITY'=> 'Proximity',
                                'PURCHASE'=> 'Beli',
                                'PURCHASE_PLAN'=> 'Beli paket',
                                'PUSH_NOTIFICATION'=> 'Pemberitahuan push',
                                'PUSH_NOTIFICATIONS'=> 'Pemberitahuan push',
                                'PUSH_NOTIFICATIONS_INTERVAL'=> 'Interval pemberitahuan push',
                                'QUANTITY'=> 'Kuantitas',
                                'RADIUS'=> 'Radius',
                                'RAG'=> 'RAG',
                                'RATES'=> 'Rates',
                                'RECOVER'=> 'Pulihkan',
                                'RECOVERY_LINK_EXPIRED'=> 'Tautan pemulihan kedaluwarsa.',
                                'RECOVERY_LINK_SENT'=> 'Tautan pemulihan dikirim.',
                                'RECOVER_FROM_IMEI'=> 'Pulihkan dari IMEI',
                                'RECOVER_PASSWORD'=> 'Pulihkan kata sandi',
                                'RECOVER_PLAN_FROM_OBJECT_BACK_TO_BILLING'=> 'Pulihkan rencana dari objek kembali ke penagihan setelah dihapus dari akun pengguna',
                                'RECURRING'=> 'Berulang',
                                'REGISTER'=> 'Daftar',
                                'REGISTRATION_SUCCESSFUL'=> 'Pendaftaran berhasil.',
                                'REG_TIME'=> 'Reg. waktu',
                                'RELATIVE'=> 'Relative',
                                'RELOAD'=> 'Muat ulang',
                                'REMEMBER_LAST'=> 'Ingat yang terakhir',
                                'REMEMBER_ME'=> 'Ingat saya',
                                'REMIND_USER_ABOUT_EXPIRING_ACCOUNT'=> 'Ingatkan pengguna tentang kedaluwarsa akun (hari sebelumnya)',
                                'REMIND_USER_ABOUT_EXPIRING_OBJECTS'=> 'Ingatkan pengguna tentang kedaluwarsa objek (hari sebelumnya)',
                                'REPEATED_PASSWORD_IS_INCORRECT'=> 'Sandi yang berulang salah.',
                                'REPEAT_NEW_PASSWORD'=> 'Ulangi sandi baru',
                                'REPORT'=> 'Laporkan',
                                'REPORTS'=> 'Laporan',
                                'REPORT_PROPERTIES'=> 'Laporkan properti',
                                'RESET'=> 'Setel Ulang',
                                'RESET_SERVER_API_KEY'=> 'Setel Ulang Kunci API Server',
                                'RESTRICT_SERVER_API_ACCESS_BY_IP'=> 'Batasi akses API server dengan IP, untuk beberapa yang dipisahkan dengan koma',
                                'RESULT'=> 'Hasil',
                                'RFID_AND_IBUTTON_LOGBOOK'=> 'Buku catatan RFID dan iButton',
                                'RFID_IBUTTON_BLUE_ID'=> 'RFID, iButton, Blue ID',
                                'ROUTE'=> 'Rute',
                                'ROUTES'=> 'Rute',
                                'ROUTES_WITH_STOPS'=> 'Rute dengan perhentian',
                                'ROUTE_BETWEEN_POINTS'=> 'Rute antar titik',
                                'ROUTE_CANT_HAVE_MORE_THAN_NUM_POINTS'=> 'Rute tidak boleh memiliki lebih dari 200 titik.',
                                'ROUTE_DATA_WITH_SENSORS'=> 'Route data with sensors',
                                'ROUTE_END'=> 'Rute berakhir',
                                'ROUTE_IN'=> 'Rute masuk',
                                'ROUTE_LENGTH'=> 'Panjang rute',
                                'ROUTE_LIMIT_IS_REACHED'=> 'Batas rute tercapai.',
                                'ROUTE_OUT'=> 'Rute keluar',
                                'ROUTE_PROPERTIES'=> 'Properti rute',
                                'ROUTE_START'=> 'Rute dimulai',
                                'ROUTE_TO_POINT'=> 'Rute ke titik',
                                'ROUTE_VISIBLE'=> 'Rute terlihat',
                                'RULER'=> 'Penguasa',
                                'SAME_SOURCE_ITEM_AVAILABLE'=> 'Item sumber yang sama telah tersedia.',
                                'SAVE'=> 'Save',
                                'SAVE_AS_ROUTE'=> 'Simpan sebagai rute',
                                'SCHEDULE'=> 'Jadwal',
                                'SCHEDULED'=> 'Dijadwalkan',
                                'SCHEDULE_PROPERTIES'=> 'Jadwalkan properti',
                                'SCHEDULE_REPORTS'=> 'Jadwalkan laporan',
                                'SEARCH'=> 'Cari',
                                'SECURITY_CODE_IS_INCORRECT'=> 'Kode keamanan salah.',
                                'SEEN'=> 'terlihat',
                                'SELECTED'=> 'Dipilih',
                                'SELECTED_USER_ACCOUNTS'=> 'Akun pengguna yang dipilih',
                                'SELECT_ALL'=> 'Pilih semua',
                                'SELECT_ICON'=> 'Pilih ikon',
                                'SEND'=> 'Kirim',
                                'SENDING_FINISHED'=> 'Pengiriman selesai.',
                                'SENDING_PLEASE_WAIT'=> 'Mengirim, harap tunggu ...',
                                'SEND_COMMAND'=> 'Kirim perintah',
                                'SEND_CREDENTIALS'=> 'Kirim kredensial',
                                'SEND_DB_BACKUP_TO_EMAIL_AT_SET_UTC_TIME'=> 'Kirim cadangan DB ke e-mail pada waktu UTC (tanpa data riwayat)',
                                'SEND_EMAIL'=> 'Kirim e-mail',
                                'SEND_TO'=> 'Kirim ke',
                                'SEND_URL'=> 'Kirim URL',
                                'SEND_VIA_EMAIL'=> 'Kirim lewat e-mail',
                                'SEND_VIA_SMS'=> 'Kirim lewat SMS',
                                'SEND_WEBHOOK'=> 'Kirim webhook',
                                'SENSOR'=> 'Sensor',
                                'SENSORS'=> 'Sensors',
                                'SENSORS_FOUND'=> '%s sensor ditemukan.',
                                'SENSOR_GRAPH'=> 'Grafik sensor',
                                'SENSOR_PARAMETERS_ARE_NOT_DETECTED_FOR_THIS_GPS_DEVICE'=> 'Parameter sensor belum terdeteksi untuk perangkat GPS ini.',
                                'SENSOR_PROPERTIES'=> 'Properti sensor',
                                'SENSOR_RESULT_PREVIEW'=> 'Pratinjau hasil sensor',
                                'SERVER'=> 'Server',
                                'SERVER_API_KEY'=> 'Kunci API server',
                                'SERVER_CLEANUP'=> 'Pembersihan server',
                                'SERVER_CLEANUP_DB_JUNK'=> 'Hapus catatan sampah database',
                                'SERVER_CLEANUP_OBJECTS_NOT_ACTIVATED'=> 'Hapus objek yang tidak diaktifkan',
                                'SERVER_CLEANUP_OBJECTS_NOT_USED'=> 'Hapus objek yang tidak digunakan dalam akun pengguna manapun',
                                'SERVER_CLEANUP_USERS'=> 'Hapus akun pengguna yang tidak mempunyai objek aktif',
                                'SERVER_IP'=> 'IP Server',
                                'SERVER_PORTS'=> 'PORTS Server',
                                'SERVER_SMS_GATEWAY'=> 'Gateway SMS Server',
                                'SERVICE'=> 'Layanan',
                                'SERVICES_FOUND'=> '%s layanan ditemukan.',
                                'SERVICE_PROPERTIES'=> 'Properti layanan',
                                'SESSION_HAS_EXPIRED'=> 'Sesi telah kedaluwarsa. Harap masuk lagi. ',
                                'SET'=> 'Set',
                                'SETTINGS'=> 'Pengaturan',
                                'SETTINGS_NOT_SAVED'=> 'Pengaturan tidak disimpan.',
                                'SETUP'=> 'Pengaturan',
                                'SET_EXPIRATION'=> 'Atur kedaluwarsa',
                                'SET_SELECTED'=> 'Set dipilih',
                                'SET_TO_ALL'=> 'Setel ke semua',
                                'SHARED_POSITION_SESSION_HAS_EXPIRED'=> 'Sesi posisi bersama telah kedaluwarsa.',
                                'SHARE_POSITION'=> 'Bagikan posisi',
                                'SHARE_POSITION_PROPERTIES'=> 'Bagikan properti posisi',
                                'SHOCK'=> 'Shock',
                                'SHOP_PAGE_URL'=> 'URL halaman toko',
                                'SHORT'=> 'Pendek',
                                'SHOW'=> 'Show',
                                'SHOWN_ICON_ON_MAP'=> 'Ikon yang ditampilkan di peta',
                                'SHOW_ABOUT_BUTTON'=> 'Tampilkan tentang tombol',
                                'SHOW_ADDRESSES'=> 'Tampilkan alamat',
                                'SHOW_COORDINATES'=> 'Tampilkan koordinat',
                                'SHOW_EVENT'=> 'Tampilkan acara',
                                'SHOW_HELP_PAGE_BUTTON'=> 'Tampilkan tombol halaman bantuan',
                                'SHOW_HIDE_ALL'=> 'Tampilkan / sembunyikan semua',
                                'SHOW_HIDE_PASSWORD'=> 'Tampilkan / sembunyikan sandi',
                                'SHOW_HIDE_PASSWORD_BUTTON'=> 'Tampilkan / sembunyikan tombol sandi',
                                'SHOW_HISTORY'=> 'Tampilkan sejarah',
                                'SHOW_LOGO'=> 'Tampilkan logo',
                                'SHOW_POINT'=> 'Tampilkan titik',
                                'SHOW_SIM_CARD_NUMBER'=> 'Show SIM card number',
                                'SHOW_TIME'=> 'Tampilkan waktu',
                                'SIDE_LEFT'=> 'Kiri',
                                'SIDE_RIGHT'=> 'Benar',
                                'SIGNAL_JAMMING'=> 'Sinyal macet',
                                'SIGNATURE'=> 'Tanda tangan',
                                'SIM_CARD_NUMBER'=> 'Nomor kartu SIM',
                                'SIZE_MB'=> 'Ukuran (MB)',
                                'SMS'=> 'SMS',
                                'SMS_DAILY'=> 'Jumlah SMS (harian)',
                                'SMS_GATEWAY'=> 'Gerbang SMS',
                                'SMS_GATEWAY_APP_URL'=> 'URL aplikasi SMS Gateway',
                                'SMS_GATEWAY_EXAMPLE'=> 'Contoh URL Gateway SMS=> http=>//SMS_GATEWAY/sendsms.php?username=USER&password=PASSWORD&number=%NUMBER%&message=%MESSAGE%',
                                'SMS_GATEWAY_EXPLANATION'=> 'SMS Gateway, yang dapat mengirim pesan melalui HTTP GET harus digunakan.',
                                'SMS_GATEWAY_IDENTIFIER'=> 'Pengenal SMS Gateway',
                                'SMS_GATEWAY_MOBILE_APPLICATION_EXPLANATION'=> 'Aplikasi seluler harus digunakan yang memungkinkan untuk menggunakan perangkat seluler sebagai SMS Gateway. Di bawah pengenal SMS Gateway harus dimasukkan dalam pengaturan aplikasi seluler. ',
                                'SMS_GATEWAY_NUMBER_FILTER'=> 'Filter nomor, untuk beberapa nomor pisahkan dengan koma',
                                'SMS_GATEWAY_TYPE'=> 'Jenis SMS Gateway',
                                'SMS_GATEWAY_URL'=> 'URL Gateway SMS',
                                'SMS_TEMPLATE'=> 'Templat SMS',
                                'SMS_TO_MOBILE_PHONE'=> 'SMS ke ponsel, untuk beberapa nomor ponsel pisahkan dengan koma',
                                'SMTP_AUTH'=> 'Otentikasi SMTP',
                                'SMTP_PASSWORD'=> 'Kata sandi SMTP',
                                'SMTP_SECURITY'=> 'Keamanan SMTP',
                                'SMTP_SERVER_HOST'=> 'Host server SMTP',
                                'SMTP_SERVER_PORT'=> 'Port server SMTP',
                                'SMTP_SERVER_SETTINGS_NOT_SET'=> 'SMTP server settings not set',
                                'SMTP_USERNAME'=> 'Nama pengguna SMTP',
                                'SNAP'=> 'Jepret',
                                'SOME_OBJECTS_WILL_EXPIRE_SOON'=> 'Beberapa aktivasi objek Anda akan segera berakhir.',
                                'SOME_OF_YOUR_OBJECTS_ACTIVATION_WILL_EXPIRE_SOON'=> 'Beberapa aktivasi objek Anda akan segera berakhir. Pergi ke pengaturan untuk lebih jelasnya. ',
                                'SOS'=> 'SOS',
                                'SOS_EVENT_ARROW_COLOR'=> 'Warna panah acara SOS',
                                'SOS_EVENT_COLOR'=> 'Warna acara SOS',
                                'SOUND_ALERT'=> 'Tanda suara',
                                'SOURCE'=> 'Sumber',
                                'SPEED'=> 'Kecepatan',
                                'SPEED_GRAPH'=> 'Grafik kecepatan',
                                'SPEED_LIMIT'=> 'Batas kecepatan',
                                'SPEED_LIMIT_CANT_BE_EMPTY'=> 'Batas kecepatan tidak boleh kosong.',
                                'SQ_FT'=> 'Kaki persegi',
                                'SQ_KM'=> 'Kilometer persegi',
                                'SQ_M'=> 'Meter persegi',
                                'SQ_MI'=> 'Mil persegi',
                                'START'=> 'Mulai',
                                'STARTUP_TAB'=> 'Tab Startup',
                                'START_TIME'=> 'Waktu mulai',
                                'STATUS'=> 'Status',
                                'STOLEN'=> 'Dicuri',
                                'STOP'=> 'Berhenti',
                                'STOPPED'=> 'Berhenti',
                                'STOPPED_ARROW_COLOR'=> 'Warna panah berhenti',
                                'STOPPED_COLOR'=> 'Menghentikan warna',
                                'STOPS'=> 'Berhenti',
                                'STOP_COUNT'=> 'Hentikan hitungan',
                                'STOP_DURATION'=> 'Durasi berhenti',
                                'STOP_POSITION'=> 'Posisi berhenti',
                                'STREET_VIEW'=> 'Tampilan Jalan',
                                'STREET_VIEW_NEW_WINDOW'=> 'Street View (jendela baru)',
                                'STRING'=> 'String',
                                'SUBJECT'=> 'Subjek',
                                'SUB_ACC'=> 'Sub acc.',
                                'SUB_ACCOUNT'=> 'Sub akun',
                                'SUB_ACCOUNTS'=> 'Sub akun',
                                'SUB_ACCOUNTS_CAN_SPLIT_THIS_ACCOUNT_INTO_MULTIPLE_SMALLER_ACCOUNTS'=> 'Sub akun dapat membagi akun ini menjadi beberapa akun yang lebih kecil dengan hak istimewa terbatas.',
                                'SUB_ACCOUNT_PROPERTIES'=> 'Properti sub-akun',
                                'SUMMER_RATE_L100KM'=> 'Tarif musim panas (kilometer per liter)',
                                'SUMMER_RATE_MPG'=> 'Tarif musim panas (mil per galon)',
                                'SUPER_ADMINISTRATOR'=> 'Administrator Super',
                                'SUPPLIER'=> 'Pemasok',
                                'SYSTEM'=> 'Sistem',
                                'SYSTEM_MESSAGE'=> 'Pesan sistem',
                                'SYSTEM_OBJECT_LIMIT_IS_REACHED'=> 'Batas objek sistem tercapai.',
                                'TACHOGRAPH'=> 'Takograf',
                                'TAIL'=> 'Ekor',
                                'TAIL_COLOR'=> 'Warna ekor',
                                'TAIL_POINTS_QUANTITY'=> 'Kuantitas poin ekor',
                                'TASK'=> 'Tugas',
                                'TASKS'=> 'Tugas',
                                'TASK_PROPERTIES'=> 'Properti tugas',
                                'TEMPERATURE'=> 'Suhu',
                                'TEMPERATURE_GRAPH'=> 'Grafik suhu',
                                'TEMPLATE'=> 'Templat',
                                'TEMPLATES'=> 'Templat',
                                'TEMPLATES_FOUND'=> '%s templat ditemukan.',
                                'TEMPLATE_ACCOUNT_RECOVER'=> 'Pulihkan detail akun',
                                'TEMPLATE_ACCOUNT_RECOVER_URL'=> 'Pulihkan URL konfirmasi akun',
                                'TEMPLATE_ACCOUNT_REGISTRATION'=> 'Pendaftaran akun',
                                'TEMPLATE_ACCOUNT_REGISTRATION_AU'=> 'Pendaftaran akun (akses sub-akun melalui URL)',
                                'TEMPLATE_DATABASE_BACKUP'=> 'Cadangan database',
                                'TEMPLATE_EVENT_EMAIL'=> 'Pemberitahuan acara melalui email (standar pengguna)',
                                'TEMPLATE_EVENT_SMS'=> 'Pemberitahuan acara melalui SMS (default pengguna)',
                                'TEMPLATE_EXPIRING_ACCOUNT'=> 'Akun kedaluwarsa',
                                'TEMPLATE_EXPIRING_OBJECTS'=> 'Objek dalam akun kedaluwarsa',
                                'TEMPLATE_PROPERTIES'=> 'Properti templat',
                                'TEMPLATE_SCHEDULE_REPORTS'=> 'Jadwalkan laporan',
                                'TEMPLATE_SHARE_POSITION_SU_EMAIL'=> 'Bagikan posisi melalui email (akses melalui URL)',
                                'TEMPLATE_SHARE_POSITION_SU_SMS'=> 'Bagikan posisi lewat SMS (akses lewat URL)',
                                'TEST'=> 'Test',
                                'TEXT'=> 'Teks',
                                'TEXT_REPORTS'=> 'Laporan teks',
                                'THEME'=> 'Tema',
                                'THEMES'=> 'Tema',
                                'THEME_PROPERTIES'=> 'Properti tema',
                                'THERE_ARE_INACTIVE_OBJECTS_IN_YOUR_ACCOUNT'=> 'Ada objek tidak aktif di akun Anda. Pergi ke pengaturan untuk lebih jelasnya. ',
                                'THERE_ARE_NO_VARIABLES_FOR_THIS_TEMPLATE'=> 'Tidak ada variabel untuk templat ini.',
                                'THERE_ARE_STILL_ACTIVE_OBJECTS'=> 'Masih ada objek aktif, periode aktivitasnya akan diperpanjang.',
                                'THERE_IS_NOTHING_TO_DELETE'=> 'Tidak ada yang perlu dihapus.',
                                'THERE_IS_NO_OBJECT_WITH_SUCH_IMEI'=> 'Tidak ada objek dengan IMEI seperti itu.',
                                'THERE_IS_NO_SUCH_OBJECT_IN_YOUR_ACCOUNT'=> 'Tidak ada objek seperti itu di akun Anda.',
                                'THIS_ACCOUNT_HAS_NO_PRIVILEGES_TO_DO_THAT'=> 'Akun ini tidak memiliki hak untuk melakukan itu.',
                                'THIS_ACCOUNT_IS_LOCKED'=> 'Akun ini dikunci.',
                                'THIS_EMAIL_ALREADY_EXISTS'=> 'Email ini sudah ada.',
                                'THIS_EMAIL_IS_NOT_REGISTERED'=> 'Alamat email ini tidak terdaftar.',
                                'THIS_EMAIL_IS_NOT_VALID'=> 'Email ini tidak sah.',
                                'THIS_IMEI_ALREADY_EXISTS'=> 'IMEI ini sudah ada.',
                                'THIS_MONTH'=> 'Bulan ini',
                                'THIS_URL_IS_NO_LONGER_VALID'=> 'URL ini tidak lagi valid.',
                                'THIS_USERNAME_ALREADY_EXISTS'=> 'Nama pengguna ini sudah ada.',
                                'THIS_USER_HAS_ADMIN_PRIVILEGES'=> 'Pengguna ini memiliki hak Administrator. Apakah Anda yakin ingin mengubahnya? ',
                                'THIS_USER_HAS_MANAGER_PRIVILEGES'=> 'Pengguna ini memiliki hak Manajer. Apakah Anda yakin ingin mengubahnya? ',
                                'THIS_USER_HAS_SUPER_ADMIN_PRIVILEGES'=> 'Pengguna ini memiliki hak istimewa Administrator Super. Apakah Anda yakin ingin mengubahnya? ',
                                'THIS_WEEK'=> 'Minggu ini',
                                'TIME'=> 'Waktu',
                                'TIMEZONE'=> 'Zona waktu',
                                'TIME_A'=> 'Waktu A',
                                'TIME_ADJ_EXPLANATION'=> 'Offset zona waktu - secara default harus disetel ke (UTC 0=>00), sesuaikan hanya jika tidak memungkinkan untuk menyetel zona waktu (UTC 0=>00) di sisi perangkat GPS',
                                'TIME_ADJ_WARNING'=> 'Mengubah offset zona waktu akan mempengaruhi data riwayat objek dan menghapus data posisi terakhir hingga data baru diterima, apakah Anda yakin?',
                                'TIME_B'=> 'Waktu B',
                                'TIME_FROM'=> 'Waktu dari',
                                'TIME_PERIOD'=> 'Jangka waktu',
                                'TIME_PERIOD_MIN'=> 'Jangka waktu (menit)',
                                'TIME_POSITION'=> 'Waktu (posisi)',
                                'TIME_SERVER'=> 'Waktu (server)',
                                'TIME_TO'=> 'Waktu untuk',
                                'TO'=> 'To',
                                'TODAY'=> 'Hari ini',
                                'TOOLS'=> 'Tools',
                                'TOO_MANY'=> 'terlalu banyak',
                                'TOO_MANY_FAILED_LOGIN_ATTEMPTS'=> 'Terlalu banyak upaya login yang gagal. Coba lagi nanti.',
                                'TOO_MANY_LOGIN_RECOVERY_ATTEMPTS'=> 'Too many login recovery attempts. Try again after 5 minutes.',
                                'TOO_MANY_OBJECTS_SELECTED'=> 'Terlalu banyak objek dipilih.',
                                'TOP'=> 'Atas',
                                'TOP_PANEL_BORDER_COLOR'=> 'Warna batas panel atas',
                                'TOP_PANEL_COLOR'=> 'Warna panel atas',
                                'TOP_PANEL_COUNTERS_FONT_COLOR'=> 'Panel atas menghitung warna font',
                                'TOP_PANEL_FONT_COLOR'=> 'Warna font panel atas',
                                'TOP_PANEL_SELECTION_COLOR'=> 'Warna pemilihan panel atas',
                                'TOP_SPEED'=> 'Kecepatan tertinggi',
                                'TOTAL'=> 'Total',
                                'TOTAL_FILLED'=> 'Total terisi',
                                'TOTAL_FUEL_CONSUMPTION'=> 'Konsumsi bahan bakar total',
                                'TOTAL_FUEL_COST'=> 'Total biaya bahan bakar',
                                'TOTAL_ITEMS_DELETED'=> 'Total item dihapus=>',
                                'TOTAL_OVERSPEED_COUNT'=> 'Jumlah total kecepatan berlebih',
                                'TOTAL_ROUTE_LENGTH'=> 'Total panjang rute',
                                'TOTAL_SMS_IN_QUEUE_TO_SEND'=> 'Total SMS dalam antrian untuk dikirim',
                                'TOTAL_STOLEN'=> 'Total dicuri',
                                'TOW'=> 'Derek',
                                'TRACKING_START'=> 'Pelacakan dimulai',
                                'TRACKING_STOP'=> 'Pelacakan berhenti',
                                'TRAILER'=> 'Trailer',
                                'TRAILERS'=> 'Trailer',
                                'TRAILERS_FOUND'=> '%s cuplikan ditemukan.',
                                'TRAILER_ASSIGN'=> 'Penempatan Trailer',
                                'TRAILER_ASSIGN_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor penetapan trailer sudah tersedia.',
                                'TRAILER_CHANGE'=> 'Perubahan cuplikan',
                                'TRAILER_INFO'=> 'Informasi Trailer',
                                'TRANSPORT_MODEL'=> 'Model transportasi',
                                'TRAVEL_SHEET'=> 'Lembar perjalanan',
                                'TRAVEL_SHEET_DAY_NIGHT'=> 'Lembar perjalanan (siang / malam)',
                                'TRIAL'=> 'Percobaan',
                                'TRIGGER_EVENT'=> 'Peristiwa pemicu',
                                'TWO_OBJECTS_SELECTED'=> 'Two objects must be selected.',
                                'TYPE'=> 'Jenis',
                                'TYPE_A_MESSAGE'=> 'Ketik pesan ...',
                                'UNABLE_TO_SEND_SMS_MESSAGE'=> 'Tidak dapat mengirim pesan SMS.',
                                'UNASSIGN_OBJECT_DRIVER_AFTER_IGNITION_IF_OFF'=> 'Batalkan penetapan driver objek setelah kunci kontak dimatikan',
                                'UNDERSPEED'=> 'Kecepatan kurang',
                                'UNDERSPEEDS'=> 'Kecepatan terlalu rendah',
                                'UNDERSPEED_COUNT'=> 'Hitungan kecepatan di bawah',
                                'UNDERSPEED_COUNT_MERGED'=> 'Hitungan kecepatan kurang (digabungkan)',
                                'UNDERSPEED_POSITION'=> 'Posisi underspeed',
                                'UNGROUPED'=> 'Tidak dikelompokkan',
                                'UNITS_OF_MEASUREMENT'=> 'Satuan ukur',
                                'UNIT_ACRE'=> 'ac',
                                'UNIT_D'=> 'd',
                                'UNIT_FT'=> 'kaki',
                                'UNIT_GALLONS'=> 'galon',
                                'UNIT_H'=> 'h',
                                'UNIT_HECTARES'=> 'ha',
                                'UNIT_KM'=> 'km',
                                'UNIT_KN'=> 'kn',
                                'UNIT_KPH'=> 'kpj',
                                'UNIT_LITERS'=> 'liter',
                                'UNIT_M'=> 'm',
                                'UNIT_MI'=> 'mi',
                                'UNIT_MIN'=> 'min',
                                'UNIT_MPH'=> 'mph',
                                'UNIT_NM'=> 'nm',
                                'UNIT_OF_CAPACITY'=> 'Satuan kapasitas',
                                'UNIT_OF_DISTANCE'=> 'Satuan jarak',
                                'UNIT_OF_TEMPERATURE'=> 'Satuan suhu',
                                'UNIT_S'=> 's',
                                'UNIT_SQ_FT'=> 'kaki²',
                                'UNIT_SQ_KM'=> 'km²',
                                'UNIT_SQ_M'=> 'm²',
                                'UNIT_SQ_MI'=> 'mi²',
                                'UNLIMITED'=> 'Tak Terbatas',
                                'UNUSED_OBJECTS'=> 'Objek yang tidak digunakan',
                                'UNUSED_OBJECT_LIST'=> 'Daftar objek yang tidak digunakan',
                                'UPDATE_LAST_SERVICE'=> 'Perbarui layanan terakhir',
                                'UPLOAD'=> 'Unggah',
                                'URL'=> 'URL',
                                'URL_ADDRESSES'=> 'Alamat URL',
                                'URL_CANT_BE_EMPTY'=> 'URL tidak boleh kosong.',
                                'URL_DESKTOP'=> 'desktop URL',
                                'URL_MOBILE'=> 'URL seluler',
                                'USAGE'=> 'Penggunaan',
                                'USER'=> 'Pengguna',
                                'USERNAME'=> 'Nama Pengguna',
                                'USERNAME_CANT_BE_EMPTY'=> 'Nama pengguna tidak boleh kosong.',
                                'USERNAME_OR_PASSWORD_INCORRECT'=> 'Nama pengguna atau kata sandi salah.',
                                'USERNAME_PASSWORD_SENT'=> 'Nama pengguna dan kata sandi dikirim.',
                                'USERNAME_SPACE_CHARACTERS'=> 'Nama pengguna tidak boleh mengandung karakter spasi.',
                                'USERS'=> 'Pengguna',
                                'USERS_FOUND'=> '%s pengguna ditemukan.',
                                'USER_ACCOUNT'=> 'Akun pengguna',
                                'USER_API'=> 'API Pengguna',
                                'USER_INTERFACE'=> 'Antarmuka pengguna',
                                'USER_LIST'=> 'Daftar pengguna',
                                'USER_REGISTRATION_VIA_LOGIN_DIALOG'=> 'Pendaftaran pengguna melalui dialog login',
                                'USE_GEOCODER_CACHE'=> 'Gunakan cache geocoder, ini akan mengurangi panggilan API ke server geocoder dan membuat beberapa tanggapan alamat lebih cepat',
                                'USE_PLAN'=> 'Gunakan rencana',
                                'USE_SMTP_SERVER'=> 'Gunakan server SMTP',
                                'VALID'=> 'Valid',
                                'VALUE'=> 'Nilai',
                                'VALUE_IS_ALREADY_AVAILABLE'=> 'Nilai sudah tersedia.',
                                'VARIABLES'=> 'Variabel',
                                'VAR_BILLING_CURRENCY'=> '%CURRENCY% - Mata Uang',
                                'VAR_BILLING_PLAN_ID'=> '%PLAN_ID% - ID paket penagihan',
                                'VAR_BILLING_PLAN_NAME'=> '%PLAN_NAME% - Nama paket penagihan',
                                'VAR_BILLING_PLAN_PRICE'=> '%PLAN_PRICE% - Harga paket penagihan',
                                'VAR_BILLING_USER_EMAIL'=> '%USER_EMAIL% - Email pengguna, digunakan untuk identifikasi akun berbayar',
                                'VAR_NO_VARIABLES_AVAILABLE'=> 'Tidak ada variabel yang tersedia',
                                'VAR_SMS_GATEWAY_MESSAGE'=> '%MESSAGE% - teks dari pesan SMS',
                                'VAR_SMS_GATEWAY_NUMBER'=> '%NUMBER% - nomor telepon, dimana SMS akan dikirim',
                                'VAR_TEMPLATE_ADDRESS'=> '%ADDRESS% - Alamat posisi',
                                'VAR_TEMPLATE_ALT'=> '%ALT% - Ketinggian',
                                'VAR_TEMPLATE_ANGLE'=> '%ANGLE% - Sudut bergerak',
                                'VAR_TEMPLATE_DRIVER'=> '%DRIVER% - Nama pengemudi',
                                'VAR_TEMPLATE_DT_POS'=> '%DT_POS% - Tanggal dan waktu posisi',
                                'VAR_TEMPLATE_DT_SER'=> '%DT_SER% - Tanggal dan waktu server',
                                'VAR_TEMPLATE_EMAIL'=> '%EMAIL% - Email',
                                'VAR_TEMPLATE_ENG_HOURS'=> '%ENG_HOURS% - Jam mesin',
                                'VAR_TEMPLATE_EVENT'=> '%EVENT% - Nama acara',
                                'VAR_TEMPLATE_G_MAP'=> '%G_MAP% - URL ke Google Maps dengan posisi',
                                'VAR_TEMPLATE_IMEI'=> '%IMEI% - Objek IMEI',
                                'VAR_TEMPLATE_LAT'=> '%LAT% - Lintang posisi',
                                'VAR_TEMPLATE_LNG'=> '%LNG% - Garis bujur posisi',
                                'VAR_TEMPLATE_NAME'=> '%NAME% - Nama objek',
                                'VAR_TEMPLATE_ODOMETER'=> '%ODOMETER% - Odometer',
                                'VAR_TEMPLATE_PASSWORD'=> '%PASSWORD% - Sandi',
                                'VAR_TEMPLATE_PL_NUM'=> '%PL_NUM% - Nomor pelat',
                                'VAR_TEMPLATE_ROUTE'=> '%ROUTE% - Nama rute',
                                'VAR_TEMPLATE_SERVER_NAME'=> '%SERVER_NAME% - nama server GPS',
                                'VAR_TEMPLATE_SIM_NUMBER'=> '%SIM_NUMBER% - nomor kartu SIM',
                                'VAR_TEMPLATE_SPEED'=> '%SPEED% - Kecepatan',
                                'VAR_TEMPLATE_TRAILER'=> '%TRAILER% - Nama cuplikan',
                                'VAR_TEMPLATE_TR_MODEL'=> '%TR_MODEL% - Model transportasi',
                                'VAR_TEMPLATE_URL_AU'=> '%URL_AU% - Akses melalui URL',
                                'VAR_TEMPLATE_URL_AU_MOBILE'=> '%URL_AU_MOBILE% - Akses melalui URL seluler',
                                'VAR_TEMPLATE_URL_LOGIN'=> '%URL_LOGIN% - URL untuk masuk',
                                'VAR_TEMPLATE_URL_RECOVER'=> '%URL_RECOVER% - URL untuk memulihkan akun',
                                'VAR_TEMPLATE_URL_SHOP'=> '%URL_SHOP% - URL untuk berbelanja',
                                'VAR_TEMPLATE_URL_SU'=> '%URL_SU% - Akses melalui URL',
                                'VAR_TEMPLATE_URL_SU_MOBILE'=> '%URL_SU_MOBILE% - Akses melalui URL seluler',
                                'VAR_TEMPLATE_USERNAME'=> '%USERNAME% - Nama Pengguna',
                                'VAR_TEMPLATE_USER_EMAIL'=> '%USER_EMAIL% - Email akun pengguna',
                                'VAR_TEMPLATE_VIN'=> '%VIN% - VIN',
                                'VAR_TEMPLATE_ZONE'=> '%ZONE% - Nama zona',
                                'VERTICAL_DIALOG_POSITION'=> 'Posisi dialog vertikal',
                                'VIEWER'=> 'Penampil',
                                'VIN'=> 'VIN',
                                'VIRTUAL_ACC_PARAMETER_PROPERTIES'=> 'Properti parameter ACC virtual',
                                'VIRT_ACC_EQ_0_IF_PARAMETER'=> 'Kebajikan. ACC sama dengan \'0\' jika parameter ',
                                'VIRT_ACC_EQ_1_IF_PARAMETER'=> 'Kebajikan. ACC sama dengan \'1\' jika parameter ',
                                'WARNING_CHANGING_THIS_VALUE_WILL_AFFECT_EXISTING_DATA'=> 'Peringatan=> Mengubah nilai ini akan mempengaruhi data yang ada.',
                                'WARNING_DISPLAY_ADDRESS_ENABLE'=> 'Peringatan=> Mengaktifkan fitur tampilan alamat akan menaikkan permintaan geocoder dan Anda mungkin kehabisan kuota layanan geocoder. Harap pertimbangkan terlebih dahulu sebelum mengaktifkan fitur ini. ',
                                'WEBHOOK'=> 'Webhook',
                                'WEBHOOK_DAILY'=> 'Jumlah Webhook (harian)',
                                'WEBHOOK_URL'=> 'URL Webhook',
                                'WEEKLY'=> 'Mingguan',
                                'WEEK_DAYS'=> 'Hari kerja',
                                'WHOLE_PERIOD'=> 'Titik keseluruhan',
                                'WIDGETS'=> 'Gawit',
                                'WINTER_FROM'=> 'Musim dingin dari',
                                'WINTER_RATE_L100KM'=> 'Tarif musim dingin (kilometer per liter)',
                                'WINTER_RATE_MPG'=> 'Tarif musim dingin (mil per galon)',
                                'WINTER_TO'=> 'Musim dingin ke',
                                'YANDEX_MAPS_KEY'=> 'Kunci Yandex Maps (dapatkan di sini=> https=>//tech.yandex.com/maps)',
                                'YEAR'=> 'Tahun',
                                'YEARS'=> 'Tahun',
                                'YES'=> 'Ya',
                                'YESTERDAY'=> 'Kemarin',
                                'YOU_CAN_ADD'=> 'Anda dapat menambahkan',
                                'YOU_CAN_ADD_UNLIMITED_NUMBER_OF_OBJECTS'=> 'Anda dapat menambahkan objek dalam jumlah tak terbatas.',
                                'YOU_CAN_ADD_UNLIMITED_NUMBER_OF_OBJECTS_TILL'=> 'Anda dapat menambahkan objek dalam jumlah tak terbatas hingga',
                                'ZONES'=> 'Zones',
                                'ZONES_INSTEAD_OF_ADDRESSES'=> 'Zona sebagai ganti alamat',
                                'ZONE_CANT_HAVE_MORE_THAN_NUM_VERTICES'=> 'Zona tidak boleh memiliki lebih dari 80 simpul.',
                                'ZONE_IN'=> 'Zona dalam',
                                'ZONE_IN_OUT'=> 'Zona masuk / keluar',
                                'ZONE_IN_OUT_WITH_GEN_INFORMATION'=> 'Zona masuk / keluar dengan gen. informasi',
                                'ZONE_LIMIT_IS_REACHED'=> 'Batas zona tercapai.',
                                'ZONE_NAME'=> 'Nama zona',
                                'ZONE_OUT'=> 'Zona keluar',
                                'ZONE_POSITION'=> 'Posisi zona',
                                'ZONE_PROPERTIES'=> 'Properti zona',
                                'ZONE_VISIBLE'=> 'Zona terlihat',
                                'ZOOM'=> 'Pembesaran',
                                'ZOOM_IN'=> 'Perbesar',
                                'ZOOM_OUT'=> 'Perkecil',
                                'UNIT_SPEED'=> 'kpj',
                                'UNIT_DISTANCE'=> 'km',
                                'UNIT_HEIGHT'=> 'm',
                                'UNIT_CAPACITY'=> 'liter',
                                'UNIT_TEMPERATURE'=> 'C'
                            ]);
                        case 'english':
                            return response()->json([
                                "ABOUT"=>"About",
                                "ABSOLUTE"=>"Absolute",
                                "ACCENT_COLOR"=>"Accent color",
                                "ACCESS_TO_GPS_SERVER_ACCOUNT"=>"Access to GPS server",
                                "ACCESS_VIA_URL"=>"Access via URL",
                                "ACCOUNT"=>"Account",
                                "ACCOUNT_PRIVILEGES"=>"Account privileges",
                                "ACCURACY"=>"Accuracy",
                                "ACRES"=>"Acres",
                                "ACTION"=>"Action",
                                "ACTIVATE"=>"Activate",
                                "ACTIVATION_POSITION"=>"Activation position",
                                "ACTIVATION_TIME"=>"Activation time",
                                "ACTIVE"=>"Active",
                                "ACTIVE_PERIOD"=>"Active period",
                                "ADD"=>"Add",
                                "ADDITIONAL_INFO"=>"Additional information",
                                "ADDITIONAL_PLANS_CAN_BE_PURCHASED_VIA_BILLING_SYSTEM"=>"Additional plans can be purchased via billing system.",
                                "ADDRESS"=>"Address",
                                "ADDRESS_CANT_BE_EMPTY"=>"Address can't be empty.",
                                "ADDRESS_DISPLAY"=>"Address display",
                                "ADDRESS_SEARCH"=>"Address search",
                                "ADD_MARKER"=>"Add marker",
                                "ADD_OBJECT"=>"Add object",
                                "ADD_OBJECTS"=>"Add objects",
                                "ADD_PLAN"=>"Add plan",
                                "ADD_ROUTE"=>"Add route",
                                "ADD_USER"=>"Add user",
                                "ADD_ZONE"=>"Add zone",
                                "ADMINISTRATOR"=>"Administrator",
                                "ADVANCED"=>"Advanced",
                                "AFTER"=>"After",
                                "ALARM_ARM"=>"Alarm arm",
                                "ALARM_DISARM"=>"Alarm disarm",
                                "ALL"=>"All",
                                "ALL_AVAILABLE_FIELDS_SHOULD_BE_FILLED_OUT"=>"All available fields should be filled out.",
                                "ALL_OBJECTS"=>"All objects",
                                "ALL_PROTOCOLS"=>"All protocols",
                                "ALL_RIGHTS_RESERVED"=>"All rights reserved.",
                                "ALL_SELECTED"=>"All selected",
                                "ALL_USER_ACCOUNTS"=>"All user accounts",
                                "ALTITUDE"=>"Altitude",
                                "ALTITUDE_GRAPH"=>"Altitude graph",
                                "ANGLE"=>"Angle",
                                "API"=>"API",
                                "API_DAILY"=>"Number of API calls (daily)",
                                "API_KEY"=>"API key",
                                "APPEARANCE"=>"Appearance",
                                "APPLY_CURRENT_PLAN_TO_BELOW_SELECTED_OBJECTS"=>"Apply current plan to below selected objects.",
                                "ARCGIS_MAPS_KEY"=>"ArcGIS Maps key (get it here: https:\/\/www.arcgis.com)",
                                "ARE_YOU_SURE_YOU_WANT_TO_ACTIVATE_SELECTED_ITEMS"=>"Are you sure you want to activate selected items?",
                                "ARE_YOU_SURE_YOU_WANT_TO_ACTIVATE_SELECTED_OBJECTS"=>"Are you sure you want to activate selected objects?",
                                "ARE_YOU_SURE_YOU_WANT_TO_CHANGE_OBJECT_IMEI"=>"Are you sure you want to change object IMEI?",
                                "ARE_YOU_SURE_YOU_WANT_TO_CHANGE_USER_PASSWORD"=>"Are you sure that you want to change user password?",
                                "ARE_YOU_SURE_YOU_WANT_TO_CLEAR_DETECTED_SENSOR_CACHE"=>"Are you sure you want to clear detected sensor cache?",
                                "ARE_YOU_SURE_YOU_WANT_TO_CLEAR_GEOCODER_CACHE"=>"Are you sure you want to clear geocoder cache?",
                                "ARE_YOU_SURE_YOU_WANT_TO_CLEAR_HISTORY_EVENTS"=>"Are you sure you want to clear object history and events?",
                                "ARE_YOU_SURE_YOU_WANT_TO_CLEAR_SELECTED_ITEMS_HISTORY_EVENTS"=>"Are you sure you want to clear selected items history and events?",
                                "ARE_YOU_SURE_YOU_WANT_TO_CLEAR_SMS_QUEUE"=>"Are you sure you want to clear SMS queue?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DEACTIVATE_SELECTED_ITEMS"=>"Are you sure you want to deactivate selected items?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE"=>"Are you sure you want to delete?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_BILLING_PLANS"=>"Are you sure you want to delete all billing plans?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_CUSTOM_ICONS"=>"Are you sure you want to delete all custom icons?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_CUSTOM_MAPS"=>"Are you sure you want to delete all custom maps?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_DRIVERS"=>"Are you sure you want to delete all drivers?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_DTC_RECORDS"=>"Are you sure you want to delete all DTC records?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_EVENTS"=>"Are you sure you want to delete all events?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_GROUPS"=>"Are you sure you want to delete all groups?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_IMAGES"=>"Are you sure you want to delete all images?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_LOGBOOK_RECORDS"=>"Are you sure you want to delete all logbook records?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_LOGS"=>"Are you sure you want to delete all logs?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_MARKERS"=>"Are you sure you want to delete all markers?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_OBJECT_CONTROL_TEMPLATES"=>"Are you sure you want to delete all object control templates?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_PASSENGERS"=>"Are you sure you want to delete all passengers?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_ROUTES"=>"Are you sure you want to delete all routes?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_SELECTED_OBJECT_MESSAGES"=>"Are you sure you want to delete all selected object messages?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_TASKS"=>"Are you sure you want to delete all tasks?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_THEMES"=>"Are you sure you want to delete all themes?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_TRAILERS"=>"Are you sure you want to delete all trailers?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_ZONES"=>"Are you sure you want to delete all zones?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_ITEMS"=>"Are you sure you want to delete selected items?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_ICON"=>"Are you sure you want to delete this icon?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_IMAGE"=>"Are you sure you want to delete this image?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_OBJECT_FROM_SYSTEM"=>"Are you sure you want to delete this object (completely delete from all users and system)?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_OBJECT_FROM_USER_ACCOUNT"=>"Are you sure you want to delete this object (delete only from user account)?",
                                "ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_UNUSED_OBJECT"=>"Are you sure you want to delete this unused object?",
                                "ARE_YOU_SURE_YOU_WANT_TO_IMPORT"=>"Are you sure you want to import?",
                                "ARE_YOU_SURE_YOU_WANT_TO_OVERWRITE_SELECTED_COMMAND"=>"Are you sure you want to overwrite selected command?",
                                "ARE_YOU_SURE_YOU_WANT_TO_RESET_SERVER_API_KEY"=>"Are you sure you want to reset Server API key?",
                                "ARE_YOU_SURE_YOU_WANT_TO_SEND_COMMAND_SELECTED_OBJECTS"=>"Are you sure you want to send command to selected objects?",
                                "ARE_YOU_SURE_YOU_WANT_TO_SEND_TEST_MESSAGE_TO_YOUR_EMAIL"=>"Are you sure you want to send test message to your e-mail?",
                                "ARE_YOU_SURE_YOU_WANT_TO_SEND_THIS_MESSAGE"=>"Are you sure you want to send this message?",
                                "ARE_YOU_SURE_YOU_WANT_TO_SET_EXPIRATION_FOR_SELECTED_ITEMS"=>"Are you sure you want to set expiration for selected items?",
                                "ARRIVED"=>"Arrived",
                                "ARROW"=>"Arrow",
                                "ARROWS"=>"Arrows",
                                "AT_LEAST_ONE_CONDITION"=>"At least one condition should be added.",
                                "AT_LEAST_ONE_MAP_SHOULD_BE_ENABLED"=>"At least one map should be enabled.",
                                "AT_LEAST_ONE_MARKER_SELECTED"=>"At least one marker must be selected.",
                                "AT_LEAST_ONE_OBJECT_SELECTED"=>"At least one object must be selected.",
                                "AT_LEAST_ONE_ROUTE_SELECTED"=>"At least one route must be selected.",
                                "AT_LEAST_ONE_SENSOR_SELECTED"=>"At least one sensor must be selected.",
                                "AT_LEAST_ONE_ZONE_SELECTED"=>"At least one zone must be selected.",
                                "AT_LEAST_TWO_CALIBRATION_POINTS"=>"At least two calibration check points should be added.",
                                "AT_OUR_SHOP"=>"at our shop:",
                                "AUTO_ASSIGN"=>"Auto assign",
                                "AUTO_EXECUTE"=>"Auto execute",
                                "AUTO_HIDE"=>"Auto hide",
                                "AVAILABLE_MAPS"=>"Available maps",
                                "AVAILABLE_MARKERS"=>"Available markers",
                                "AVAILABLE_OBJECTS"=>"Available objects",
                                "AVAILABLE_ZONES"=>"Available zones",
                                "AVG_FUEL_CONSUMPTION"=>"Avg. fuel consumption",
                                "AVG_FUEL_CONSUMPTION_100_KM"=>"Avg. fuel cons. (100 km)",
                                "AVG_FUEL_CONSUMPTION_MPG"=>"Avg. fuel cons. (MPG)",
                                "AVG_SPEED"=>"Average speed",
                                "BACK"=>"Back",
                                "BACKGROUND_COLOR"=>"Background color",
                                "BACKUP"=>"Backup",
                                "BATTERY"=>"Battery",
                                "BEFORE"=>"Before",
                                "BEFORE_2_DAYS"=>"Before 2 days",
                                "BEFORE_3_DAYS"=>"Before 3 days",
                                "BILLING"=>"Billing",
                                "BILLING_ALLOWS_TO_PURCHASE_ADDITIONAL_PLANS"=>"Billing allows to purchase additional plans and extend object activity periods. Purchased plans will appear in below list after payment is confirmed, sometimes it may take a while.",
                                "BILLING_PLAN"=>"Billing plan",
                                "BILLING_PLANS"=>"Billing plans",
                                "BILLING_PLAN_LIST"=>"Billing plan list",
                                "BILLING_PROPERTIES"=>"Billing properties",
                                "BING_GEOCODER_KEY"=>"Bing Geocoder key (get it here: https:\/\/www.bingmapsportal.com)",
                                "BING_MAPS_KEY"=>"Bing Maps key (get it here: https:\/\/www.bingmapsportal.com)",
                                "BLUE_ID"=>"Blue ID",
                                "BLUE_ID_SENSOR_IS_ALREADY_AVAILABLE"=>"Blue ID sensor is already available.",
                                "BOTTOM"=>"Bottom",
                                "BOTTOM_PANEL_WITH_ICONS"=>"Bottom panel with icons",
                                "BOTTOM_TEXT_HTML_COMPATIBLE"=>"Bottom text",
                                "BRACELET_OFF"=>"Bracelet off",
                                "BRACELET_ON"=>"Bracelet on",
                                "BRANDING"=>"Branding",
                                "BRANDING_AND_UI"=>"Branding and UI",
                                "BUYER"=>"Buyer",
                                "CALCULATION"=>"Calculation",
                                "CALIBRATION"=>"Calibration",
                                "CAME"=>"Came",
                                "CAMERA"=>"Camera",
                                "CANCEL"=>"Cancel",
                                "CANT_SEND_EMAIL"=>"Can't send e-mail.",
                                "CELSIUS"=>"Celsius",
                                "CENTER"=>"Center",
                                "CHANGES_SAVED_SUCCESSFULLY"=>"Changes saved successfully.",
                                "CHANGE_PASSWORD"=>"Change password",
                                "CHAT"=>"Chat",
                                "CIRCLE"=>"Circle",
                                "CITY"=>"City",
                                "CLEAR"=>"Clear",
                                "CLEAR_DETECTED_SENSOR_CACHE"=>"Clear detected sensor cache",
                                "CLEAR_GEOCODER_CACHE"=>"Clear geocoder cache",
                                "CLEAR_HISTORY"=>"Clear history",
                                "CLEAR_OBJECTS_HISTORY"=>"Clear objects history",
                                "CODE"=>"Code",
                                "COLLAPSED"=>"Collapsed",
                                "COLOR"=>"Color",
                                "COLORS"=>"Colors",
                                "COLOR_BLACK"=>"Black",
                                "COLOR_BLUE"=>"Blue",
                                "COLOR_GREEN"=>"Green",
                                "COLOR_GREY"=>"Grey",
                                "COLOR_ORANGE"=>"Orange",
                                "COLOR_PURPLE"=>"Purple",
                                "COLOR_RED"=>"Red",
                                "COLOR_YELLOW"=>"Yellow",
                                "COMMAND"=>"Command",
                                "COMMANDS"=>"Commands",
                                "COMMANDS_STATUS"=>"Commands status",
                                "COMMAND_CANT_BE_EMPTY"=>"Command can't be empty.",
                                "COMMAND_HEX_NOT_VALID"=>"Command HEX format is not valid.",
                                "COMMAND_INTERVAL"=>"Command interval",
                                "COMMAND_PROPERTIES"=>"Command properties",
                                "COMMAND_SENT_FOR_EXECUTION"=>"Command sent for execution successfully.",
                                "COMMENT"=>"Comment",
                                "COMMENT_ABOUT_USER"=>"Comment about user...",
                                "COMPANY"=>"Company",
                                "COMPLETED"=>"Completed",
                                "CONNECTION_ATTEMPTS"=>"Connection attempts",
                                "CONNECTION_NO"=>"Connection: No",
                                "CONNECTION_NO_GPS_NO"=>"Connection: No, GPS: No",
                                "CONNECTION_STATUS"=>"Connection status",
                                "CONNECTION_YES"=>"Connection: Yes",
                                "CONNECTION_YES_GPS_NO"=>"Connection: Yes, GPS: No",
                                "CONNECTION_YES_GPS_YES"=>"Connection: Yes, GPS: Yes",
                                "CONNECT_TO"=>"Connect to %s",
                                "CONTACT_ADMINISTRATOR"=>"Contact administrator.",
                                "CONTACT_ADMIN_IF_YOU_WANT_TO_DO_ANY_CHANGES"=>"Contact administrator if you want to do any changes with your objects.",
                                "CONTACT_INFO"=>"Contact information",
                                "CONTACT_PAGE_URL"=>"Contact page URL",
                                "CONTINUED_USE_OF_PUSH_NOTIFICATIONS_DECREASE_BATTERY_LIFE"=>"Continued use of push notifications can decrease battery life. If you want better battery life, set interval not lower than 5 minutes.",
                                "CONTROL"=>"Control",
                                "CONTROL_PANEL"=>"Control panel",
                                "COORDINATES"=>"Coordinates",
                                "COPY"=>"Copy",
                                "COST"=>"Cost",
                                "COST_PER_GALLON"=>"Cost per gallon",
                                "COST_PER_LITER"=>"Cost per liter",
                                "COUNT"=>"Count",
                                "COUNTER"=>"Counter",
                                "COUNTERS"=>"Counters",
                                "COUNTRY_STATE"=>"County\/State",
                                "CREATE"=>"Create",
                                "CREATED"=>"Created",
                                "CREATE_ACCOUNT"=>"Create account",
                                "CREATE_NOW"=>"Create now",
                                "CURRENCY"=>"Currency",
                                "CURRENT_ENGINE_HOURS"=>"Current engine hours",
                                "CURRENT_OBJECT_COUNTERS"=>"Current object counters",
                                "CURRENT_ODOMETER"=>"Current odometer",
                                "CURRENT_POSITION"=>"Current position",
                                "CURRENT_POSITION_OFFLINE"=>"Current position (offline)",
                                "CURRENT_VALUE"=>"Current value",
                                "CUSTOM"=>"Custom",
                                "CUSTOM_FIELDS"=>"Custom fields",
                                "CUSTOM_FIELDS_FOUND"=>"%s custom fields found.",
                                "CUSTOM_FIELD_PROPERTIES"=>"Custom field properties",
                                "CUSTOM_GATEWAY"=>"Custom gateway",
                                "CUSTOM_GATEWAY_URL"=>"Custom gateway URL",
                                "CUSTOM_MAP"=>"Custom map",
                                "CUSTOM_MAPS"=>"Custom maps",
                                "CUSTOM_MAP_PROPERTIES"=>"Custom map properties",
                                "DAILY"=>"Daily",
                                "DASHBOARD"=>"Dashboard",
                                "DATA"=>"Data",
                                "DATA_ITEMS"=>"Data items",
                                "DATA_LIST"=>"Data list",
                                "DATA_POINTS"=>"Data points",
                                "DATE"=>"Date",
                                "DATE_CANT_BE_EMPTY"=>"Date can't be empty.",
                                "DAY"=>"Day",
                                "DAYLIGHT_SAVING_TIME"=>"Daylight saving time (DST)",
                                "DAYS"=>"Days",
                                "DAYS_EXPIRED"=>"Days expired",
                                "DAYS_INTERVAL"=>"Days interval",
                                "DAYS_LEFT"=>"Days left",
                                "DAY_FRIDAY"=>"Friday",
                                "DAY_FRIDAY_S"=>"F",
                                "DAY_MONDAY"=>"Monday",
                                "DAY_MONDAY_S"=>"M",
                                "DAY_SATURDAY"=>"Saturday",
                                "DAY_SATURDAY_S"=>"S",
                                "DAY_SUNDAY"=>"Sunday",
                                "DAY_SUNDAY_S"=>"S",
                                "DAY_THURSDAY"=>"Thursday",
                                "DAY_THURSDAY_S"=>"T",
                                "DAY_TIME"=>"Day time",
                                "DAY_TUESDAY"=>"Tuesday",
                                "DAY_TUESDAY_S"=>"T",
                                "DAY_WEDNESDAY"=>"Wednesday",
                                "DAY_WEDNESDAY_S"=>"W",
                                "DEACTIVATE"=>"Deactivate",
                                "DEACTIVATION_POSITION"=>"Deactivation position",
                                "DEACTIVATION_TIME"=>"Deactivation time",
                                "DEFAULT"=>"Default",
                                "DEFAULTS"=>"Defaults",
                                "DELETE"=>"Delete",
                                "DELETED"=>"Deleted",
                                "DELETE_AFTER_EXPIRATION"=>"Delete after expiration",
                                "DELETE_ALL"=>"Delete all",
                                "DELETE_ALL_EVENTS"=>"Delete all events",
                                "DELETE_ALL_MARKERS"=>"Delete all markers",
                                "DELETE_ALL_ROUTES"=>"Delete all routes",
                                "DELETE_ALL_SELECTED_OBJECT_MESSAGES"=>"Delete all selected object messages",
                                "DELETE_ALL_ZONES"=>"Delete all zones",
                                "DELETE_OBJECTS"=>"Delete objects",
                                "DELETE_SELECTED"=>"Delete selected",
                                "DELIVERED"=>"delivered",
                                "DEPARTED"=>"Departed",
                                "DEPENDING_ON_ROUTES"=>"Depending on routes",
                                "DEPENDING_ON_ZONES"=>"Depending on zones",
                                "DESCRIPTION"=>"Description",
                                "DESKTOP_VERSION"=>"Desktop version",
                                "DESTINATION"=>"Destination",
                                "DETAILED"=>"Detailed",
                                "DETAILS"=>"Details",
                                "DETECTED_SENSOR_CACHE_CLEARED"=>"Detected sensor cache cleared.",
                                "DETECT_STOPS_USING"=>"Detect stops using",
                                "DEVIATION"=>"Deviation",
                                "DEVIATION_CANT_BE_LESS_THAN_0"=>"Deviation can't be less than 0.",
                                "DIAGNOSTIC_TROUBLE_CODES"=>"DTC (Diagnostic Trouble Codes)",
                                "DIALOG_BACKGROUND_COLOR"=>"Dialog background color",
                                "DIALOG_OPACITY"=>"Dialog opacity",
                                "DIALOG_TITLEBAR_COLOR"=>"Dialog titlebar color",
                                "DICTIONARY"=>"Dictionary",
                                "DIGITAL_INPUT"=>"Digital input",
                                "DIGITAL_OUTPUT"=>"Digital output",
                                "DISABLED"=>"Disabled",
                                "DISASSEMBLE"=>"Disassemble",
                                "DISMOUNT"=>"Dismount",
                                "DISTANCE"=>"Distance",
                                "DOOR"=>"Door",
                                "DRAW_ROUTE_ON_MAP_BEFORE_SAVING"=>"Draw route on map before saving.",
                                "DRAW_ZONE_ON_MAP_BEFORE_SAVING"=>"Draw zone on map before saving.",
                                "DRIVER"=>"Driver",
                                "DRIVERS"=>"Drivers",
                                "DRIVERS_FOUND"=>"%s drivers found.",
                                "DRIVER_ASSIGN"=>"Driver assign",
                                "DRIVER_ASSIGN_SENSOR_IS_ALREADY_AVAILABLE"=>"Driver assign sensor is already available.",
                                "DRIVER_BEHAVIOR_RAG"=>"Driver behavior (RAG)",
                                "DRIVER_BEHAVIOR_RAG_BY_DRIVER"=>"Driver behavior (RAG by driver)",
                                "DRIVER_BEHAVIOR_RAG_BY_OBJECT"=>"Driver behavior (RAG by object)",
                                "DRIVER_CHANGE"=>"Driver change",
                                "DRIVER_INFO"=>"Driver information",
                                "DRIVES_AND_STOPS"=>"Drives and stops",
                                "DRIVES_AND_STOPS_WITH_LOGIC_SENSORS"=>"Drives and stops with logic sensors",
                                "DRIVES_AND_STOPS_WITH_SENSORS"=>"Drives and stops with sensors",
                                "DUPLICATE"=>"Duplicate",
                                "DUPLICATE_OBJECT"=>"Duplicate object",
                                "DURATION"=>"Duration",
                                "DURATION_FROM_LAST_EVENT"=>"Duration from last event in minutes",
                                "EDIT"=>"Edit",
                                "EDITOR"=>"Editor",
                                "EDIT_OBJECT"=>"Edit object",
                                "EDIT_OBJECTS"=>"Edit objects",
                                "EDIT_PLAN"=>"Edit plan",
                                "EDIT_USER"=>"Edit user",
                                "EMAIL"=>"E-mail",
                                "EMAILS_DAILY"=>"Number of e-mails (daily)",
                                "EMAIL_ADDRESS"=>"E-mail address",
                                "EMAIL_SETTINGS"=>"E-mail settings",
                                "EMAIL_TEMPLATE"=>"E-mail template",
                                "ENABLED"=>"Enabled",
                                "ENABLE_BILLING"=>"Enable billing",
                                "ENABLE_DISABLE_ARROWS"=>"Enable\/disable arrows",
                                "ENABLE_DISABLE_CAMERA"=>"Enable\/disable camera",
                                "ENABLE_DISABLE_CLUSTERS"=>"Enable\/disable clusters",
                                "ENABLE_DISABLE_DATA_POINTS"=>"Enable\/disable data points",
                                "ENABLE_DISABLE_EVENTS"=>"Enable\/disable events",
                                "ENABLE_DISABLE_KML"=>"Enable\/disable KML",
                                "ENABLE_DISABLE_LIVE_TRAFFIC"=>"Enable\/disable live traffic",
                                "ENABLE_DISABLE_MARKERS"=>"Enable\/disable markers",
                                "ENABLE_DISABLE_OBJECTS"=>"Enable\/disable objects",
                                "ENABLE_DISABLE_OBJECT_LABELS"=>"Enable\/disable object labels",
                                "ENABLE_DISABLE_ROUTE"=>"Enable\/disable route",
                                "ENABLE_DISABLE_ROUTES"=>"Enable\/disable routes",
                                "ENABLE_DISABLE_SNAP"=>"Enable\/disable snap",
                                "ENABLE_DISABLE_STOPS"=>"Enable\/disable stops",
                                "ENABLE_DISABLE_STREET_VIEW"=>"Enable\/disable Street View",
                                "ENABLE_DISABLE_ZONES"=>"Enable\/disable zones",
                                "ENABLE_SMS_GATEWAY"=>"Enable SMS Gateway",
                                "ENABLE_VIRTUAL_ACC_PARAMETER"=>"Enable virtual ACC parameter depending on voltage (parameter \"accvirt\")",
                                "END"=>"End",
                                "END_TIME"=>"End time",
                                "ENGINE_HOURS"=>"Engine hours",
                                "ENGINE_HOURS_EXPIRED"=>"Engine hours expired",
                                "ENGINE_HOURS_INTERVAL"=>"Engine hours interval",
                                "ENGINE_HOURS_LEFT"=>"Engine hours left",
                                "ENGINE_HOURS_REACHES"=>"Engine hours reaches",
                                "ENGINE_HOURS_SENSOR_IS_ALREADY_AVAILABLE"=>"Engine hours sensor is already available.",
                                "ENGINE_IDLE"=>"Engine idle",
                                "ENGINE_IDLE_ARROW_COLOR"=>"Engine idle arrow color",
                                "ENGINE_IDLE_COLOR"=>"Engine idle color",
                                "ENGINE_OFF"=>"Engine off",
                                "ENGINE_ON"=>"Engine on",
                                "ENGINE_RESUME"=>"Engine resume",
                                "ENGINE_STOP"=>"Engine stop",
                                "ENGINE_WORK"=>"Engine work",
                                "ENTER_ACCOUNT_USERNAME_OR_EMAIL"=>"Enter account username or e-mail...",
                                "ENTER_CODE"=>"Enter code",
                                "ENTER_EMAIL_HERE"=>"Enter e-mail here...",
                                "ENTER_IMEI_HERE"=>"Enter IMEI here...",
                                "ENTER_NEW_PASSWORD"=>"Enter new password",
                                "ENTER_OBJECT_NAME_OR_IMEI"=>"Enter object name or IMEI...",
                                "ENTER_USERNAME_AND_PASSWORD_TO_LOGIN"=>"Enter username and password to login.",
                                "ERROR"=>"Error",
                                "EVENT"=>"Event",
                                "EVENTS"=>"Events",
                                "EVENTS_FOUND"=>"%s events found.",
                                "EVENT_DATA_LIST"=>"Event data list",
                                "EVENT_POSITION"=>"Event position",
                                "EVENT_PROPERTIES"=>"Event properties",
                                "EXACT_TIME"=>"Exact time",
                                "EXAMPLE_SHORT"=>"ex.",
                                "EXECUTE_NOW"=>"Execute now",
                                "EXPENSE"=>"Expense",
                                "EXPENSES"=>"Expenses",
                                "EXPENSE_PROPERTIES"=>"Expense properties",
                                "EXPIRED"=>"Expired",
                                "EXPIRES_ON"=>"Expires on",
                                "EXPIRE_ACCOUNT"=>"Expire account",
                                "EXPIRE_ACCOUNT_DAYS_AFTER_REGISTRATION"=>"Expire account (days after account registration)",
                                "EXPIRE_OBJECT"=>"Expire object",
                                "EXPIRE_ON"=>"Expire on",
                                "EXPIRING_OBJECTS"=>"Expiring objects",
                                "EXPORT"=>"Export",
                                "EXPORT_CSV"=>"Export to CSV",
                                "EXPORT_GPX"=>"Export to GPX",
                                "EXPORT_GSR"=>"Export to GSR",
                                "EXPORT_KML"=>"Export to KML",
                                "EX_ANNUAL_FEE"=>"ex. Annual fee",
                                "EX_MY_GPS_SERVER"=>"ex. My GPS Server",
                                "FAHRENHEIT"=>"Fahrenheit",
                                "FAILED"=>"Failed",
                                "FAVICON"=>"Favicon",
                                "FAVICON_SIZE_FORMAT"=>"Favicon, size up to 256 x 256 px, PNG or ICO",
                                "FILE_TYPE_MUST_BE_JPEG"=>"File type must be JPEG.",
                                "FILE_TYPE_MUST_BE_KML"=>"File type must be KML.",
                                "FILE_TYPE_MUST_BE_PNG"=>"File type must be PNG.",
                                "FILE_TYPE_MUST_BE_PNG_OR_ICO"=>"File type must be PNG or ICO.",
                                "FILE_TYPE_MUST_BE_PNG_OR_JPG"=>"File type must be PNG or JPG.",
                                "FILE_TYPE_MUST_BE_PNG_OR_SVG"=>"File type must be PNG or SVG.",
                                "FILLED"=>"Filled",
                                "FILTER"=>"Filter",
                                "FINISHED"=>"Finished",
                                "FIT_OBJECTS"=>"Fit objects",
                                "FIT_OBJECTS_ON_MAP"=>"Fit objects on map",
                                "FOLLOW"=>"Follow",
                                "FOLLOW_NEW_WINDOW"=>"Follow (new window)",
                                "FOLLOW_UNFOLLOW_ALL"=>"Follow\/unfollow all",
                                "FONTS"=>"Fonts",
                                "FONT_COLOR"=>"Font color",
                                "FORMAT"=>"Format",
                                "FORMULA"=>"Formula",
                                "FORMULA_IS_NOT"=>"Formula is not valid.",
                                "FORWARD_THIS_OBJECT_LOCATION_DATA_TO_ANOTHER_OBJECT"=>"Forward this object location data to another object from this account (should be used only for Iridium Satellite solutions)",
                                "FROM"=>"From",
                                "FUEL_CONSUMPTION"=>"Fuel consumption",
                                "FUEL_CONSUMPTION_SENSOR_IS_ALREADY_AVAILABLE"=>"Fuel consumption sensor is already available.",
                                "FUEL_COST"=>"Fuel cost",
                                "FUEL_FILLINGS"=>"Fuel fillings",
                                "FUEL_LEVEL"=>"Fuel level",
                                "FUEL_LEVEL_GRAPH"=>"Fuel level graph",
                                "FUEL_LEVEL_SUM_UP"=>"Fuel level sum up",
                                "FUEL_LEVEL_SUM_UP_SENSOR_IS_ALREADY_AVAILABLE"=>"Fuel level sum up sensor is already available.",
                                "FUEL_THEFTS"=>"Fuel thefts",
                                "GALLON"=>"Gallon",
                                "GATEWAY"=>"Gateway",
                                "GENERAL"=>"General",
                                "GENERAL_INFO"=>"General information",
                                "GENERAL_INFO_MERGED"=>"General information (merged)",
                                "GENERATE"=>"Generate",
                                "GENERATED"=>"Generated",
                                "GEOCODER"=>"Geocoder",
                                "GEOCODER_CACHE_CLEARED"=>"Geocoder cache cleared.",
                                "GEOCODER_LICENSE_KEYS"=>"Geocoder license keys",
                                "GEOCODER_SERVICE"=>"Geocoder service",
                                "GOOGLE_GEOCODER_KEY"=>"Google Geocoder key (get it here: https:\/\/developers.google.com)",
                                "GOOGLE_MAPS_KEY"=>"Google Maps key (get it here: https:\/\/developers.google.com)",
                                "GPRS"=>"GPRS",
                                "GPS_ANTENNA_CUT"=>"GPS antenna cut",
                                "GPS_DEVICE"=>"GPS device",
                                "GPS_LEVEL"=>"GPS level",
                                "GPS_NO"=>"GPS: No",
                                "GPS_SERVER_NAME"=>"GPS server name",
                                "GPS_YES"=>"GPS: Yes",
                                "GRAPH"=>"Graph",
                                "GRAPHICAL_REPORTS"=>"Graphical reports",
                                "GRID_PAGE_TEXT"=>"Page {0} of {1}",
                                "GRID_VIEW_TEXT"=>"View {0} - {1} of {2}",
                                "GROUP"=>"Group",
                                "GROUPS"=>"Groups",
                                "GROUPS_FOUND"=>"%s groups found.",
                                "GSM_LEVEL"=>"GSM level",
                                "HARDWARE_KEY"=>"Hardware Key",
                                "HARSH_ACCELERATION"=>"Harsh acceleration",
                                "HARSH_ACCELERATION_COUNT"=>"Harsh acceleration count",
                                "HARSH_ACCELERATION_SCORE"=>"Harsh acceleration score",
                                "HARSH_BRAKING"=>"Harsh braking",
                                "HARSH_BRAKING_COUNT"=>"Harsh braking count",
                                "HARSH_BRAKING_SCORE"=>"Harsh braking score",
                                "HARSH_CORNERING"=>"Harsh cornering",
                                "HARSH_CORNERING_COUNT"=>"Harsh cornering count",
                                "HARSH_CORNERING_SCORE"=>"Harsh cornering score",
                                "HEADING_FONT_COLOR"=>"Heading font color",
                                "HECTARES"=>"Hectares",
                                "HELLO"=>"Hello",
                                "HELP"=>"Help",
                                "HELP_PAGE_URL"=>"Help page button URL",
                                "HIDE"=>"Hide",
                                "HIDE_UNUSED_PROTOCOLS"=>"Hide unused protocols",
                                "HIGH"=>"High",
                                "HIGHEST_SCORE"=>"Highest score",
                                "HIGHEST_VALUE"=>"Highest value",
                                "HISTORY"=>"History",
                                "HISTORY_ROUTE_COLOR"=>"History route color",
                                "HISTORY_ROUTE_DATA_LIST"=>"History route data list",
                                "HISTORY_ROUTE_HIGHLIGHT_COLOR"=>"History route highlight color",
                                "HOLD_CTRL_TO_SELECT_MULTIPLE_ITEMS"=>"Hold \"Ctrl\" to select multiple items",
                                "HORIZONTAL_DIALOG_POSITION"=>"Horizontal dialog position",
                                "HTTP_FULL_ADDRESS_HERE"=>"http:\/\/full_address_here",
                                "ICON"=>"Icon",
                                "ICON_SIZE_SHOULD_BE_32_32"=>"Icon size should be 32 x 32 px.",
                                "IDLE"=>"Idle",
                                "ID_NUMBER"=>"ID number",
                                "IF_SENSOR_0"=>"If sensor \"0\" (text)",
                                "IF_SENSOR_1"=>"If sensor \"1\" (text)",
                                "IGNITION"=>"Ignition",
                                "IGNITION_ACC"=>"Ignition (ACC)",
                                "IGNITION_GRAPH"=>"Ignition graph",
                                "IGNITION_SENSOR_IS_ALREADY_AVAILABLE"=>"Ignition sensor is already available.",
                                "IGNORE_EMPTY_REPORTS"=>"Ignore empty reports",
                                "IGNORE_FUEL_CONSUMPTION_DURING_STOPS"=>"Ignore fuel consumption during stops",
                                "IGNORE_IF_IGNITION_IS_OFF"=>"Ignore if ignition is off",
                                "IMAGES"=>"Images",
                                "IMAGE_GALLERY"=>"Image gallery",
                                "IMAGE_SIZE_SHOULD_NOT_BE_BIGGER_THAN_640_480"=>"Image size should not be bigger than 640 x 480 px.",
                                "IMAGE_UPLOADED_SUCCESSFULLY"=>"Image uploaded successfully.",
                                "IMAGE_UPLOAD_FAILED"=>"Image upload failed.",
                                "IMAGE_WIGTH_OR_HEIGHT_DOES_NOT_MEET_REQUIREMENTS"=>"Image width or height does not meet requirements.",
                                "IMEI"=>"IMEI",
                                "IMEI_IS_NOT_VALID"=>"IMEI is not valid.",
                                "IMPORT"=>"Import",
                                "IMPORT_EXPORT"=>"Import\/Export",
                                "IMPORT_EXPORT_TOOLS"=>"Import and export tools",
                                "IMPORT_FILE_IS_TOO_BIG"=>"Import file is too big.",
                                "INACTIVE_OBJECTS"=>"Inactive objects",
                                "INCORRECT_PASSWORD"=>"Incorrect password.",
                                "INFO"=>"Info",
                                "INFORMATION"=>"Information",
                                "INTERVAL_VALUE_SHOULD_BE_GREATER_THAN_LEFT_VALUE"=>"Interval value should be greater than left value.",
                                "INVALID_DST_INTERVAL"=>"Invalid daylight saving time (DST) interval.",
                                "INVALID_FILE_FORMAT"=>"Invalid file format.",
                                "IN_PROGRESS"=>"In progress",
                                "IN_SELECTED_ROUTES"=>"In selected routes",
                                "IN_SELECTED_ZONES"=>"In selected zones",
                                "IP"=>"IP",
                                "ITEMS"=>"Items",
                                "KEEP_HISTORY_PERIOD"=>"Keep history period (days)",
                                "KILOMETER"=>"Kilometer",
                                "KML"=>"KML",
                                "KML_ALLOWS_TO_IMPORT_AND_VISUALIZE_ADDITIONAL_DATA"=>"KML allows to import and visualize additional data on the map.",
                                "KML_FILE"=>"KML file",
                                "KML_PROPERTIES"=>"KML properties",
                                "KML_SIZE_LIMIT_IS_REACHED"=>"KML size limit is reached.",
                                "LANDSCAPE"=>"Landscape",
                                "LANGUAGE"=>"Language",
                                "LANGUAGES"=>"Languages",
                                "LANGUAGE_PROPERTIES"=>"Language properties",
                                "LAST_CONNECTION"=>"Last connection",
                                "LAST_HOUR"=>"Last hour",
                                "LAST_LOGIN_DAYS_AGO"=>"Last login (days ago)",
                                "LAST_MONTH"=>"Last month",
                                "LAST_SERVICE"=>"Last service",
                                "LAST_WEEK"=>"Last week",
                                "LATITUDE"=>"Latitude",
                                "LATITUDE_IS_OUT_OF_RANGE"=>"Latitude is out of range. Valid range is from -90 to 90.",
                                "LAYER"=>"Layer",
                                "LAYERS"=>"Layers",
                                "LEFT"=>"Left",
                                "LEFT_PANEL"=>"Left panel",
                                "LENGTH"=>"Length",
                                "LIMITED"=>"Limited",
                                "LITER"=>"Liter",
                                "LIVE_TRAFFIC"=>"Live traffic",
                                "LIVE_TRAFFIC_FOR_THIS_MAP_IS_NOT_AVAILABLE"=>"Live traffic for this map is not available.",
                                "LOADING"=>"Loading...",
                                "LOAD_GSR"=>"Load GSR",
                                "LOCATION"=>"Location",
                                "LOGBOOK"=>"Logbook",
                                "LOGIC"=>"Logic",
                                "LOGIC_SENSORS"=>"Logic sensors",
                                "LOGIN"=>"Login",
                                "LOGIN_AS_USER"=>"Login as user",
                                "LOGIN_BACKGROUND"=>"Login background",
                                "LOGIN_BACKGROUND_SIZE_FORMAT"=>"Login background, size 1920 x 1080 px, JPEG",
                                "LOGIN_DATA_WILL_BE_SENT_TO_EMAIL"=>"Login data will be sent to given e-mail address.",
                                "LOGIN_DETAILS"=>"Login details",
                                "LOGIN_DIALOG_URL"=>"Login dialog URL",
                                "LOGIN_TIME"=>"Login time",
                                "LOGO"=>"Logo",
                                "LOGOUT"=>"Log out",
                                "LOGO_POSITION"=>"Logo position",
                                "LOGO_SIZE_FORMAT"=>"Logo, size 250 x 56 px, PNG or SVG",
                                "LOGO_SMALL_SIZE_FORMAT"=>"Small logo, size 32 x 32 px, PNG or SVG",
                                "LOGS"=>"Logs",
                                "LOG_VIEWER"=>"Log viewer",
                                "LONGITUDE"=>"Longitude",
                                "LONGITUDE_IS_OUT_OF_RANGE"=>"Longitude is out of range. Valid range is from -180 to 180.",
                                "LOW"=>"Low",
                                "LOWEST_HISTORY_PERIOD_IS_30_DAYS"=>"Lowest history period is 30 days. Settings were not saved.",
                                "LOWEST_SCORE"=>"Lowest score",
                                "LOWEST_VALUE"=>"Lowest value",
                                "LOW_BATTERY"=>"Low battery",
                                "LOW_DC"=>"Low DC",
                                "MAIN"=>"Main",
                                "MAINTENANCE"=>"Maintenance",
                                "MANAGER"=>"Manager",
                                "MANAGER_PRIVILEGES"=>"Manager privileges",
                                "MANAGE_SERVER"=>"Manage server",
                                "MAN_DOWN"=>"Man down",
                                "MAP"=>"Map",
                                "MAPBOX_GEOCODER_KEY"=>"Mapbox Geocoder key (get it here: https:\/\/www.mapbox.com)",
                                "MAPBOX_MAPS_KEY"=>"Mapbox Maps key (get it here: https:\/\/www.mapbox.com)",
                                "MAPS"=>"Maps",
                                "MAP_ICON_SIZE"=>"Map icon size",
                                "MAP_LAYER_ZOOM_POSITION_AFTER_LOGIN"=>"Map layer, zoom and position after user login",
                                "MAP_LICENSE_KEYS"=>"Map license keys",
                                "MAP_REPORTS"=>"Map reports",
                                "MAP_ROUTING"=>"Map routing",
                                "MAP_STARTUP_POSITION"=>"Map startup position",
                                "MARKERS"=>"Markers",
                                "MARKERS_INSTEAD_OF_ADDRESSES"=>"Markers instead of addresses",
                                "MARKERS_ROUTES_ZONES_FOUND"=>"%s markers, %s routes, %s zones found.",
                                "MARKER_IN"=>"Marker in",
                                "MARKER_IN_OUT"=>"Marker in\/out",
                                "MARKER_IN_OUT_WITH_GEN_INFORMATION"=>"Marker in\/out with gen. information",
                                "MARKER_LIMIT_IS_REACHED"=>"Marker limit is reached.",
                                "MARKER_NAME"=>"Marker name",
                                "MARKER_OUT"=>"Marker out",
                                "MARKER_POSITION"=>"Marker position",
                                "MARKER_PROPERTIES"=>"Marker properties",
                                "MARKER_VISIBLE"=>"Marker visible",
                                "MAX_API_DAILY"=>"Max. number of API calls (daily)",
                                "MAX_EMAILS_DAILY"=>"Max. number of e-mails (daily)",
                                "MAX_HDOP_VALUE"=>"Max. hdop value (eliminates drifting, default 3)",
                                "MAX_MARKERS"=>"Max. number of markers",
                                "MAX_ROUTES"=>"Max. number of routes",
                                "MAX_SMS_DAILY"=>"Max. number of SMS (daily)",
                                "MAX_WEBHOOK_DAILY"=>"Max. number of Webhook (daily)",
                                "MAX_ZONES"=>"Max. number of zones",
                                "MEASUREMENT"=>"Measurement",
                                "MEASUREMENT_AND_COST"=>"Measurement and cost",
                                "MEASURE_AREA"=>"Measure area",
                                "MEASURE_ROUTE_LENGTH_USING"=>"Measure route length using",
                                "MEDIA_REPORTS"=>"Media reports",
                                "MENU"=>"Menu",
                                "MESSAGE"=>"Message",
                                "MESSAGES"=>"Messages",
                                "MESSAGE_TO_EMAIL"=>"Message to e-mail, for multiple e-mails separate them by comma",
                                "MILE"=>"Mile",
                                "MILEAGE"=>"Mileage",
                                "MILEAGE_DAILY"=>"Mileage (daily)",
                                "MIN_DIFF_BETWEEN_POINTS"=>"Min. difference between track points (eliminates drifting, default 0.0005)",
                                "MIN_FF"=>"Min. fuel difference to detect fuel fillings (default 10)",
                                "MIN_FT"=>"Min. fuel difference to detect fuel thefts (default 10)",
                                "MIN_FUEL_SPEED"=>"Min. fuel difference detection when speed in kph is not above (default 10)",
                                "MIN_GPSLEV_VALUE"=>"Min. gpslev value (eliminates drifting, default 5)",
                                "MIN_IDLE_SPEED"=>"Min. engine idle speed in kph (affects engine idle status, default 3)",
                                "MIN_MOVING_SPEED"=>"Min. moving speed in kph (affects stops and track accuracy, default 6)",
                                "MOBILE_APPLICATION"=>"Mobile application",
                                "MOBILE_VERSION"=>"Mobile version",
                                "MODEL"=>"Model",
                                "MODIFIED"=>"Modified",
                                "MONTH"=>"Month",
                                "MONTHLY"=>"Monthly",
                                "MONTHS"=>"Months",
                                "MONTH_APRIL"=>"April",
                                "MONTH_APRIL_S"=>"Apr",
                                "MONTH_AUGUST"=>"August",
                                "MONTH_AUGUST_S"=>"Aug",
                                "MONTH_DECEMBER"=>"December",
                                "MONTH_DECEMBER_S"=>"Dec",
                                "MONTH_FEBRUARY"=>"February",
                                "MONTH_FEBRUARY_S"=>"Feb",
                                "MONTH_JANUARY"=>"January",
                                "MONTH_JANUARY_S"=>"Jan",
                                "MONTH_JULY"=>"July",
                                "MONTH_JULY_S"=>"Jul",
                                "MONTH_JUNE"=>"June",
                                "MONTH_JUNE_S"=>"Jun",
                                "MONTH_MARCH"=>"March",
                                "MONTH_MARCH_S"=>"Mar",
                                "MONTH_MAY"=>"May",
                                "MONTH_MAY_S"=>"May",
                                "MONTH_NOVEMBER"=>"November",
                                "MONTH_NOVEMBER_S"=>"Nov",
                                "MONTH_OCTOBER"=>"October",
                                "MONTH_OCTOBER_S"=>"Oct",
                                "MONTH_SEPTEMBER"=>"September",
                                "MONTH_SEPTEMBER_S"=>"Sep",
                                "MORE_THAN_DAYS"=>"More than (days)",
                                "MOVE_DURATION"=>"Move duration",
                                "MOVING"=>"Moving",
                                "MOVING_ARROW_COLOR"=>"Moving arrow color",
                                "MOVING_COLOR"=>"Moving color",
                                "MY_ACCOUNT"=>"My account",
                                "NA"=>"n\/a",
                                "NAME"=>"Name",
                                "NAME_CANT_BE_EMPTY"=>"Name can't be empty.",
                                "NAME_SURNAME"=>"Name, surname",
                                "NAME_VISIBLE"=>"Name visible",
                                "NAUTICAL_MILE"=>"Nautical mile",
                                "NEAREST_MARKER"=>"Nearest marker",
                                "NEAREST_ZONE"=>"Nearest zone",
                                "NET_PROTOCOL"=>"Net. protocol",
                                "NEW"=>"New",
                                "NEWLY_ADDED_OBJECTS_CAN_BE_USED_FOR"=>"Newly added objects can be used for %s days free.",
                                "NEW_CHAT_MESSAGE_SOUND_ALERT"=>"New chat message sound alert",
                                "NEW_EVENT"=>"New event",
                                "NEW_EVENT_WAS_RECEIVED"=>"New event was received.",
                                "NEW_LOGIN_DATA_WILL_BE_SENT_TO_EMAIL"=>"New login data will be sent to given e-mail address.",
                                "NEW_MARKER"=>"New marker",
                                "NEW_PASSWORD"=>"New password",
                                "NEW_ROUTE"=>"New route",
                                "NEW_TASK"=>"New task",
                                "NEW_USER_REGISTRATION_ON_THIS_SERVER_IS_CLOSED"=>"New user registration on this server is closed. Choose another one from list below.",
                                "NEW_ZONE"=>"New zone",
                                "NIGHT_ENDS"=>"Night ends",
                                "NIGHT_STARTS"=>"Night starts",
                                "NO"=>"No",
                                "NONE"=>"None",
                                "NORMAL"=>"Normal",
                                "NOTHING_HAS_BEEN_FOUND_ON_YOUR_REQUEST"=>"Nothing has been found on your request.",
                                "NOTHING_HAS_BEEN_FOUND_TO_IMPORT"=>"Nothing has been found to import.",
                                "NOTHING_SELECTED"=>"Nothing selected",
                                "NOTIFICATIONS"=>"Notifications",
                                "NO_BILLING_PLANS_FOUND"=>"No billing plans found.",
                                "NO_CONNECTION_ARROW_COLOR"=>"No connection arrow color",
                                "NO_CONNECTION_COLOR"=>"No connection color",
                                "NO_DATA"=>"No data",
                                "NO_DATA_HAS_BEEN_COLLECTED_YET"=>"No data has been collected yet.",
                                "NO_DATA_HAS_BEEN_RECEIVED_YET"=>"No data has been received from GPS device yet.",
                                "NO_DRIVER"=>"No driver",
                                "NO_EVENT_SELECTED"=>"No event selected.",
                                "NO_HISTORY_LOADED"=>"No history loaded.",
                                "NO_ITEMS"=>"No items",
                                "NO_ITEMS_SELECTED"=>"No items selected.",
                                "NO_MANAGER"=>"No manager",
                                "NO_MATCHES_FOUND"=>"No matches found",
                                "NO_MESSAGES"=>"No messages",
                                "NO_OBJECTS"=>"No objects",
                                "NO_OBJECT_SELECTED"=>"No object selected.",
                                "NO_RECORDS_TO_VIEW"=>"No records to view",
                                "NO_REPLY_EMAIL_ADDRESS"=>"No reply e-mail address",
                                "NO_SOUND"=>"No sound",
                                "NO_TRAILER"=>"No trailer",
                                "NUMBER"=>"Number",
                                "NUMBER_OF_OBJECTS"=>"Number of objects",
                                "OBJECT"=>"Object",
                                "OBJECTS"=>"Objects",
                                "OBJECTS_ACTIVATED_SUCCESSFULLY"=>"Objects activated successfully.",
                                "OBJECTS_FOUND"=>"%s objects found.",
                                "OBJECTS_TILL"=>"object(s) till",
                                "OBJECT_ACTIVATION_FAILED"=>"Object activation failed.",
                                "OBJECT_ARROW_COLOR"=>"Object arrow color",
                                "OBJECT_CONNECTION_TIMEOUT_RESETS_CONNECTION_AND_GPS_STATUS"=>"Object connection timeout, resets connection and GPS status",
                                "OBJECT_CONTROL"=>"Object control",
                                "OBJECT_CONTROL_DEFAULT_TEMPLATES"=>"Object control default templates",
                                "OBJECT_DATA_LIST"=>"Object data list",
                                "OBJECT_DATE_LIMIT"=>"Object date limit",
                                "OBJECT_DATE_LIMIT_DAYS_AFTER_REGISTRATION"=>"Object date limit (days after account registration)",
                                "OBJECT_DETAILS_POPUP_ON_CLUSTER_MOUSE_HOVER"=>"Object details popup on cluster mouse hover",
                                "OBJECT_DRIVER_LIST"=>"Object driver list",
                                "OBJECT_DRIVER_PROPERTIES"=>"Object driver properties",
                                "OBJECT_EXPIRATION_DATE_IS_TOO_LATE"=>"Object expiration date is too late.",
                                "OBJECT_EXPIRATION_DATE_MUST_BE_SET"=>"Object expiration date must be set.",
                                "OBJECT_GROUP_LIST"=>"Object group list",
                                "OBJECT_GROUP_PROPERTIES"=>"Object group properties",
                                "OBJECT_INFO"=>"Object information",
                                "OBJECT_LIMIT"=>"Object limit",
                                "OBJECT_LIMIT_IS_REACHED"=>"Object limit is reached.",
                                "OBJECT_LIST"=>"Object list",
                                "OBJECT_LIST_COLOR"=>"Object list color",
                                "OBJECT_NAME"=>"Object name",
                                "OBJECT_PASSENGER_LIST"=>"Object passenger list",
                                "OBJECT_PASSENGER_PROPERTIES"=>"Object passenger properties",
                                "OBJECT_SIM_CARD_NUMBER_IS_NOT_SET"=>"Object SIM card number is not set.",
                                "OBJECT_TRAILER_LIST"=>"Object trailer list",
                                "OBJECT_TRAILER_PROPERTIES"=>"Object trailer properties",
                                "OBJECT_TRIAL_LIMIT_DAYS"=>"Object trial limit (days)",
                                "ODOMETER"=>"Odometer",
                                "ODOMETER_A"=>"Odometer A",
                                "ODOMETER_B"=>"Odometer B",
                                "ODOMETER_EXPIRED"=>"Odometer expired",
                                "ODOMETER_INTERVAL"=>"Odometer interval",
                                "ODOMETER_LEFT"=>"Odometer left",
                                "ODOMETER_REACHES"=>"Odometer reaches",
                                "ODOMETER_SENSOR"=>"Odometer sensor",
                                "ODOMETER_SENSOR_IS_ALREADY_AVAILABLE"=>"Odometer sensor is already available.",
                                "ODOMETER_TOP_10"=>"Odometer Top 10",
                                "OFF"=>"Off",
                                "OFFLINE"=>"Offline",
                                "OK"=>"OK",
                                "OLD_PASSWORD"=>"Old password",
                                "ON"=>"On",
                                "ONCE"=>"Once",
                                "ONE_TIME"=>"One time",
                                "ONLINE"=>"Online",
                                "OPEN"=>"Open",
                                "OPEN_AFTER_LOGIN"=>"Open after login",
                                "OR"=>"or",
                                "OSMR_SERVICE_URL"=>"OSMR service URL",
                                "OTHER"=>"Other",
                                "OUTPUT_OFF"=>"Output off",
                                "OUTPUT_ON"=>"Output on",
                                "OUT_OF_SELECTED_ROUTES"=>"Out of selected routes",
                                "OUT_OF_SELECTED_ZONES"=>"Out of selected zones",
                                "OVERSPEED"=>"Overspeed",
                                "OVERSPEEDS"=>"Overspeeds",
                                "OVERSPEED_COUNT"=>"Overspeed count",
                                "OVERSPEED_COUNT_MERGED"=>"Overspeed count (merged)",
                                "OVERSPEED_DURATION"=>"Overspeed duration",
                                "OVERSPEED_POSITION"=>"Overspeed position",
                                "OVERSPEED_SCORE"=>"Overspeed score",
                                "PAGE"=>"Page",
                                "PAGE_AFTER_ADMIN_OR_MANAGER_LOGIN"=>"Page after Administrator or Manager login",
                                "PAGE_GENERATOR_TAG"=>"Page generator tag",
                                "PAN_LEFT"=>"Pan left",
                                "PAN_RIGHT"=>"Pan right",
                                "PARAMETER"=>"Parameter",
                                "PARAMETERS"=>"Parameters",
                                "PARAMETERS_AND_SENSORS"=>"Parameters and sensors",
                                "PASSENGER"=>"Passenger",
                                "PASSENGERS"=>"Passengers",
                                "PASSENGERS_FOUND"=>"%s passengers found.",
                                "PASSENGER_ASSIGN"=>"Passenger assign",
                                "PASSENGER_ASSIGN_SENSOR_IS_ALREADY_AVAILABLE"=>"Passenger assign sensor is already available.",
                                "PASSENGER_INFO"=>"Passenger information",
                                "PASSWORD"=>"Password",
                                "PASSWORD_CANT_BE_EMPTY"=>"Password can't be empty.",
                                "PASSWORD_LENGHT_AT_LEAST"=>"Password length should be at least 6 characters.",
                                "PASSWORD_SPACE_CHARACTERS"=>"Password should not contain space characters.",
                                "PAUSE"=>"Pause",
                                "PAYPAL_ACCOUNT"=>"PayPal account",
                                "PAYPAL_CLIENT_ID"=>"PayPal Client ID",
                                "PAYPAL_CUSTOM"=>"PayPal custom",
                                "PAYPAL_GATEWAY"=>"PayPal gateway",
                                "PAYPAL_IPN_URL"=>"PayPal IPN URL",
                                "PAYPAL_V2_GATEWAY"=>"PayPal v2 gateway",
                                "PER"=>"per",
                                "PERCENTAGE"=>"Percentage",
                                "PERIOD"=>"Period",
                                "PHONE"=>"Phone",
                                "PHONE_CANT_BE_EMPTY"=>"Phone can't be empty.",
                                "PHONE_NUMBER_1"=>"Phone number 1",
                                "PHONE_NUMBER_2"=>"Phone number 2",
                                "PHONE_NUMBER_WITH_CODE"=>"Phone number with code",
                                "PHOTO_REQUEST"=>"Photo request",
                                "PICKPOINT_GEOCODER_KEY"=>"PickPoint Geocoder key (get it here: https:\/\/www.pickpoint.io)",
                                "PLACES"=>"Places",
                                "PLACES_GROUP_PROPERTIES"=>"Places group properties",
                                "PLACE_MARKER_ON_MAP_BEFORE_SAVING"=>"Place marker on map before saving.",
                                "PLAN"=>"Plan",
                                "PLAN_VERIFICATION_FAILED"=>"Plan verification failed.",
                                "PLATE"=>"Plate",
                                "PLATE_NUMBER"=>"Plate number",
                                "PLAY"=>"Play",
                                "PLEASE_CHECK_SERVER_EMAIL_SMTP_SETTINGS"=>"Please check server e-mail SMTP settings.",
                                "PLEASE_CHECK_YOUR_EMAIL"=>"Please check your e-mail.",
                                "PLEASE_LOGIN_INTO_ACCOUNT_FOR_MORE_DETAILS"=>"Please login into account for more details.",
                                "PLEASE_PURCHASE_ACCESS_TO"=>"If you would like to continue using our service, please purchase access to",
                                "PLEASE_SELECT_KML_FILE"=>"Please select KML file.",
                                "PLEASE_SET_SMTP_SERVER_SETTINGS_IN_MANAGE_SERVER_SECTION"=>"Please set SMTP server settings in Manage server section, otherwise new user registration and event notifications will not work. Would you like to open it now?",
                                "PLEASE_WAIT"=>"Please wait...",
                                "POLYGON"=>"Polygon",
                                "POPUP"=>"Popup",
                                "PORT"=>"Port",
                                "PORTRAIT"=>"Portrait",
                                "POSITION"=>"Position",
                                "POSITION_A"=>"Position A",
                                "POSITION_B"=>"Position B",
                                "POSITION_INTERVAL"=>"Position interval",
                                "POST_CODE"=>"Post code",
                                "POWER_CUT"=>"Power cut",
                                "PRICE"=>"Price",
                                "PRINT_MAP"=>"Print map",
                                "PRIORITY"=>"Priority",
                                "PRIVILEGES"=>"Privileges",
                                "PROTOCOL"=>"Protocol",
                                "PROTOCOLS"=>"Protocols",
                                "PROXIMITY"=>"Proximity",
                                "PURCHASE"=>"Purchase",
                                "PURCHASE_PLAN"=>"Purchase plan",
                                "PUSH_NOTIFICATION"=>"Push notification",
                                "PUSH_NOTIFICATIONS"=>"Push notifications",
                                "PUSH_NOTIFICATIONS_INTERVAL"=>"Push notifications interval",
                                "QUANTITY"=>"Quantity",
                                "RADIUS"=>"Radius",
                                "RAG"=>"RAG",
                                "RATES"=>"Rates",
                                "RECOVER"=>"Recover",
                                "RECOVERY_LINK_EXPIRED"=>"Recovery link expired.",
                                "RECOVERY_LINK_SENT"=>"Recovery link sent.",
                                "RECOVER_FROM_IMEI"=>"Recover from IMEI",
                                "RECOVER_PASSWORD"=>"Recover password",
                                "RECOVER_PLAN_FROM_OBJECT_BACK_TO_BILLING"=>"Recover plan from object back to billing after it is deleted from user account",
                                "RECURRING"=>"Recurring",
                                "REGISTER"=>"Register",
                                "REGISTRATION_SUCCESSFUL"=>"Registration successful.",
                                "REG_TIME"=>"Reg. time",
                                "RELATIVE"=>"Relative",
                                "RELOAD"=>"Reload",
                                "REMEMBER_LAST"=>"Remember last",
                                "REMEMBER_ME"=>"Remember me",
                                "REMIND_USER_ABOUT_EXPIRING_ACCOUNT"=>"Remind user about expiring account (days before)",
                                "REMIND_USER_ABOUT_EXPIRING_OBJECTS"=>"Remind user about expiring objects (days before)",
                                "REPEATED_PASSWORD_IS_INCORRECT"=>"Repeated password is incorrect.",
                                "REPEAT_NEW_PASSWORD"=>"Repeat new password",
                                "REPORT"=>"Report",
                                "REPORTS"=>"Reports",
                                "REPORT_PROPERTIES"=>"Report properties",
                                "RESET"=>"Reset",
                                "RESET_SERVER_API_KEY"=>"Reset Server API key",
                                "RESTRICT_SERVER_API_ACCESS_BY_IP"=>"Restrict server API access by IP, for multiple separate by comma",
                                "RESULT"=>"Result",
                                "RFID_AND_IBUTTON_LOGBOOK"=>"RFID and iButton logbook",
                                "RFID_IBUTTON_BLUE_ID"=>"RFID, iButton, Blue ID",
                                "ROUTE"=>"Route",
                                "ROUTES"=>"Routes",
                                "ROUTES_WITH_STOPS"=>"Routes with stops",
                                "ROUTE_BETWEEN_POINTS"=>"Route between points",
                                "ROUTE_CANT_HAVE_MORE_THAN_NUM_POINTS"=>"Route can't have more than 200 points.",
                                "ROUTE_DATA_WITH_SENSORS"=>"Route data with sensors",
                                "ROUTE_END"=>"Route end",
                                "ROUTE_IN"=>"Route in",
                                "ROUTE_LENGTH"=>"Route length",
                                "ROUTE_LIMIT_IS_REACHED"=>"Route limit is reached.",
                                "ROUTE_OUT"=>"Route out",
                                "ROUTE_PROPERTIES"=>"Route properties",
                                "ROUTE_START"=>"Route start",
                                "ROUTE_TO_POINT"=>"Route to point",
                                "ROUTE_VISIBLE"=>"Route visible",
                                "RULER"=>"Ruler",
                                "SAME_SOURCE_ITEM_AVAILABLE"=>"Same source item is already available.",
                                "SAVE"=>"Save",
                                "SAVE_AS_ROUTE"=>"Save as route",
                                "SCHEDULE"=>"Schedule",
                                "SCHEDULED"=>"Scheduled",
                                "SCHEDULE_PROPERTIES"=>"Schedule properties",
                                "SCHEDULE_REPORTS"=>"Schedule reports",
                                "SEARCH"=>"Search",
                                "SECURITY_CODE_IS_INCORRECT"=>"Security code is incorrect.",
                                "SEEN"=>"seen",
                                "SELECTED"=>"Selected",
                                "SELECTED_USER_ACCOUNTS"=>"Selected user accounts",
                                "SELECT_ALL"=>"Select all",
                                "SELECT_ICON"=>"Select icon",
                                "SEND"=>"Send",
                                "SENDING_FINISHED"=>"Sending finished.",
                                "SENDING_PLEASE_WAIT"=>"Sending, please wait...",
                                "SEND_COMMAND"=>"Send command",
                                "SEND_CREDENTIALS"=>"Send credentials",
                                "SEND_DB_BACKUP_TO_EMAIL_AT_SET_UTC_TIME"=>"Send DB backup to e-mail at set UTC time (without history data)",
                                "SEND_EMAIL"=>"Send e-mail",
                                "SEND_TO"=>"Send to",
                                "SEND_URL"=>"Send URL",
                                "SEND_VIA_EMAIL"=>"Send via e-mail",
                                "SEND_VIA_SMS"=>"Send via SMS",
                                "SEND_WEBHOOK"=>"Send webhook",
                                "SENSOR"=>"Sensor",
                                "SENSORS"=>"Sensors",
                                "SENSORS_FOUND"=>"%s sensors found.",
                                "SENSOR_GRAPH"=>"Sensor graph",
                                "SENSOR_PARAMETERS_ARE_NOT_DETECTED_FOR_THIS_GPS_DEVICE"=>"Sensor parameters are not detected for this GPS device yet.",
                                "SENSOR_PROPERTIES"=>"Sensor properties",
                                "SENSOR_RESULT_PREVIEW"=>"Sensor result preview",
                                "SERVER"=>"Server",
                                "SERVER_API_KEY"=>"Server API key",
                                "SERVER_CLEANUP"=>"Server cleanup",
                                "SERVER_CLEANUP_DB_JUNK"=>"Delete database junk records",
                                "SERVER_CLEANUP_OBJECTS_NOT_ACTIVATED"=>"Delete objects which are not activated",
                                "SERVER_CLEANUP_OBJECTS_NOT_USED"=>"Delete objects which are not used in any user account",
                                "SERVER_CLEANUP_USERS"=>"Delete user accounts which do not have any active objects",
                                "SERVER_IP"=>"Server IP",
                                "SERVER_PORTS"=>"Server PORTS",
                                "SERVER_SMS_GATEWAY"=>"Server SMS Gateway",
                                "SERVICE"=>"Service",
                                "SERVICES_FOUND"=>"%s services found.",
                                "SERVICE_PROPERTIES"=>"Service properties",
                                "SESSION_HAS_EXPIRED"=>"Session has expired. Please login again.",
                                "SET"=>"Set",
                                "SETTINGS"=>"Settings",
                                "SETTINGS_NOT_SAVED"=>"Settings not saved.",
                                "SETUP"=>"Setup",
                                "SET_EXPIRATION"=>"Set expiration",
                                "SET_SELECTED"=>"Set selected",
                                "SET_TO_ALL"=>"Set to all",
                                "SHARED_POSITION_SESSION_HAS_EXPIRED"=>"Shared position session has expired.",
                                "SHARE_POSITION"=>"Share position",
                                "SHARE_POSITION_PROPERTIES"=>"Share position properties",
                                "SHOCK"=>"Shock",
                                "SHOP_PAGE_URL"=>"Shop page URL",
                                "SHORT"=>"Short",
                                "SHOW"=>"Show",
                                "SHOWN_ICON_ON_MAP"=>"Shown icon on map",
                                "SHOW_ABOUT_BUTTON"=>"Show about button",
                                "SHOW_ADDRESSES"=>"Show addresses",
                                "SHOW_COORDINATES"=>"Show coordinates",
                                "SHOW_EVENT"=>"Show event",
                                "SHOW_HELP_PAGE_BUTTON"=>"Show help page button",
                                "SHOW_HIDE_ALL"=>"Show\/hide all",
                                "SHOW_HIDE_PASSWORD"=>"Show\/hide password",
                                "SHOW_HIDE_PASSWORD_BUTTON"=>"Show\/hide password button",
                                "SHOW_HISTORY"=>"Show history",
                                "SHOW_LOGO"=>"Show logo",
                                "SHOW_POINT"=>"Show point",
                                "SHOW_SIM_CARD_NUMBER"=>"Show SIM card number",
                                "SHOW_TIME"=>"Show time",
                                "SIDE_LEFT"=>"Left",
                                "SIDE_RIGHT"=>"Right",
                                "SIGNAL_JAMMING"=>"Signal jamming",
                                "SIGNATURE"=>"Signature",
                                "SIM_CARD_NUMBER"=>"SIM card number",
                                "SIZE_MB"=>"Size (MB)",
                                "SMS"=>"SMS",
                                "SMS_DAILY"=>"Number of SMS (daily)",
                                "SMS_GATEWAY"=>"SMS Gateway",
                                "SMS_GATEWAY_APP_URL"=>"SMS Gateway application URL",
                                "SMS_GATEWAY_EXAMPLE"=>"SMS Gateway URL example: http:\/\/SMS_GATEWAY\/sendsms.php?username=USER&password=PASSWORD&number=%NUMBER%&message=%MESSAGE%",
                                "SMS_GATEWAY_EXPLANATION"=>"SMS Gateway, which can send messages via HTTP GET should be used.",
                                "SMS_GATEWAY_IDENTIFIER"=>"SMS Gateway identifier",
                                "SMS_GATEWAY_MOBILE_APPLICATION_EXPLANATION"=>"Mobile application should be used which allows to use mobile device as SMS Gateway. Below SMS Gateway identifier should be entered in mobile application settings.",
                                "SMS_GATEWAY_NUMBER_FILTER"=>"Number filter, for multiple numbers separate them by comma",
                                "SMS_GATEWAY_TYPE"=>"SMS Gateway type",
                                "SMS_GATEWAY_URL"=>"SMS Gateway URL",
                                "SMS_TEMPLATE"=>"SMS template",
                                "SMS_TO_MOBILE_PHONE"=>"SMS to mobile phone, for multiple phone numbers separate them by comma",
                                "SMTP_AUTH"=>"SMTP authentication",
                                "SMTP_PASSWORD"=>"SMTP password",
                                "SMTP_SECURITY"=>"SMTP security",
                                "SMTP_SERVER_HOST"=>"SMTP server host",
                                "SMTP_SERVER_PORT"=>"SMTP server port",
                                "SMTP_SERVER_SETTINGS_NOT_SET"=>"SMTP server settings not set",
                                "SMTP_USERNAME"=>"SMTP username",
                                "SNAP"=>"Snap",
                                "SOME_OBJECTS_WILL_EXPIRE_SOON"=>"Some of your objects activation will expire soon.",
                                "SOME_OF_YOUR_OBJECTS_ACTIVATION_WILL_EXPIRE_SOON"=>"Some of your objects activation will expire soon. Go to settings for more details.",
                                "SOS"=>"SOS",
                                "SOS_EVENT_ARROW_COLOR"=>"SOS event arrow color",
                                "SOS_EVENT_COLOR"=>"SOS event color",
                                "SOUND_ALERT"=>"Sound alert",
                                "SOURCE"=>"Source",
                                "SPEED"=>"Speed",
                                "SPEED_GRAPH"=>"Speed graph",
                                "SPEED_LIMIT"=>"Speed limit",
                                "SPEED_LIMIT_CANT_BE_EMPTY"=>"Speed limit can't be empty.",
                                "SQ_FT"=>"Square foot",
                                "SQ_KM"=>"Square kilometers",
                                "SQ_M"=>"Square meters",
                                "SQ_MI"=>"Square miles",
                                "START"=>"Start",
                                "STARTUP_TAB"=>"Startup tab",
                                "START_TIME"=>"Start time",
                                "STATUS"=>"Status",
                                "STOLEN"=>"Stolen",
                                "STOP"=>"Stop",
                                "STOPPED"=>"Stopped",
                                "STOPPED_ARROW_COLOR"=>"Stopped arrow color",
                                "STOPPED_COLOR"=>"Stopped color",
                                "STOPS"=>"Stops",
                                "STOP_COUNT"=>"Stop count",
                                "STOP_DURATION"=>"Stop duration",
                                "STOP_POSITION"=>"Stop position",
                                "STREET_VIEW"=>"Street View",
                                "STREET_VIEW_NEW_WINDOW"=>"Street View (new window)",
                                "STRING"=>"String",
                                "SUBJECT"=>"Subject",
                                "SUB_ACC"=>"Sub acc.",
                                "SUB_ACCOUNT"=>"Sub account",
                                "SUB_ACCOUNTS"=>"Sub accounts",
                                "SUB_ACCOUNTS_CAN_SPLIT_THIS_ACCOUNT_INTO_MULTIPLE_SMALLER_ACCOUNTS"=>"Sub accounts can split this account into multiple smaller accounts with limited privileges.",
                                "SUB_ACCOUNT_PROPERTIES"=>"Sub account properties",
                                "SUMMER_RATE_L100KM"=>"Summer rate (kilometers per liter)",
                                "SUMMER_RATE_MPG"=>"Summer rate (miles per gallon)",
                                "SUPER_ADMINISTRATOR"=>"Super Administrator",
                                "SUPPLIER"=>"Supplier",
                                "SYSTEM"=>"System",
                                "SYSTEM_MESSAGE"=>"System message",
                                "SYSTEM_OBJECT_LIMIT_IS_REACHED"=>"System object limit is reached.",
                                "TACHOGRAPH"=>"Tachograph",
                                "TAIL"=>"Tail",
                                "TAIL_COLOR"=>"Tail color",
                                "TAIL_POINTS_QUANTITY"=>"Tail points quantity",
                                "TASK"=>"Task",
                                "TASKS"=>"Tasks",
                                "TASK_PROPERTIES"=>"Task properties",
                                "TEMPERATURE"=>"Temperature",
                                "TEMPERATURE_GRAPH"=>"Temperature graph",
                                "TEMPLATE"=>"Template",
                                "TEMPLATES"=>"Templates",
                                "TEMPLATES_FOUND"=>"%s templates found.",
                                "TEMPLATE_ACCOUNT_RECOVER"=>"Recover account details",
                                "TEMPLATE_ACCOUNT_RECOVER_URL"=>"Recover account confirmation URL",
                                "TEMPLATE_ACCOUNT_REGISTRATION"=>"Account registration",
                                "TEMPLATE_ACCOUNT_REGISTRATION_AU"=>"Account registration (sub account access via URL)",
                                "TEMPLATE_DATABASE_BACKUP"=>"Database backup",
                                "TEMPLATE_EVENT_EMAIL"=>"Event notification via e-mail (user default)",
                                "TEMPLATE_EVENT_SMS"=>"Event notification via SMS (user default)",
                                "TEMPLATE_EXPIRING_ACCOUNT"=>"Expiring account",
                                "TEMPLATE_EXPIRING_OBJECTS"=>"Expiring objects in account",
                                "TEMPLATE_PROPERTIES"=>"Template properties",
                                "TEMPLATE_SCHEDULE_REPORTS"=>"Schedule reports",
                                "TEMPLATE_SHARE_POSITION_SU_EMAIL"=>"Share position via e-mail (access via URL)",
                                "TEMPLATE_SHARE_POSITION_SU_SMS"=>"Share position via SMS (access via URL)",
                                "TEST"=>"Test",
                                "TEXT"=>"Text",
                                "TEXT_REPORTS"=>"Text reports",
                                "THEME"=>"Theme",
                                "THEMES"=>"Themes",
                                "THEME_PROPERTIES"=>"Theme properties",
                                "THERE_ARE_INACTIVE_OBJECTS_IN_YOUR_ACCOUNT"=>"There are inactive objects in your account. Go to settings for more details.",
                                "THERE_ARE_NO_VARIABLES_FOR_THIS_TEMPLATE"=>"There are no variables for this template.",
                                "THERE_ARE_STILL_ACTIVE_OBJECTS"=>"There are still active objects, their activity periods will be extended.",
                                "THERE_IS_NOTHING_TO_DELETE"=>"There is nothing to delete.",
                                "THERE_IS_NO_OBJECT_WITH_SUCH_IMEI"=>"There is no object with such IMEI.",
                                "THERE_IS_NO_SUCH_OBJECT_IN_YOUR_ACCOUNT"=>"There is no such object in your account.",
                                "THIS_ACCOUNT_HAS_NO_PRIVILEGES_TO_DO_THAT"=>"This account has no privileges to do that.",
                                "THIS_ACCOUNT_IS_LOCKED"=>"This account is locked.",
                                "THIS_EMAIL_ALREADY_EXISTS"=>"This e-mail already exists.",
                                "THIS_EMAIL_IS_NOT_REGISTERED"=>"This e-mail address is not registered.",
                                "THIS_EMAIL_IS_NOT_VALID"=>"This e-mail is not valid.",
                                "THIS_IMEI_ALREADY_EXISTS"=>"This IMEI already exists.",
                                "THIS_MONTH"=>"This month",
                                "THIS_URL_IS_NO_LONGER_VALID"=>"This URL is no longer valid.",
                                "THIS_USERNAME_ALREADY_EXISTS"=>"This username already exists.",
                                "THIS_USER_HAS_ADMIN_PRIVILEGES"=>"This user has Administrator privileges. Are you sure you want to change them?",
                                "THIS_USER_HAS_MANAGER_PRIVILEGES"=>"This user has Manager privileges. Are you sure you want to change them?",
                                "THIS_USER_HAS_SUPER_ADMIN_PRIVILEGES"=>"This user has Super Administrator privileges. Are you sure you want to change them?",
                                "THIS_WEEK"=>"This week",
                                "TIME"=>"Time",
                                "TIMEZONE"=>"Time zone",
                                "TIME_A"=>"Time A",
                                "TIME_ADJ_EXPLANATION"=>"Time zone offset - by default it should be set to (UTC 0:00), adjust only in case it is not possible to set (UTC 0:00) time zone on GPS device side",
                                "TIME_ADJ_WARNING"=>"Changing time zone offset will affect object history data and clear last position data until new data is received, are you sure?",
                                "TIME_B"=>"Time B",
                                "TIME_FROM"=>"Time from",
                                "TIME_PERIOD"=>"Time period",
                                "TIME_PERIOD_MIN"=>"Time period (min)",
                                "TIME_POSITION"=>"Time (position)",
                                "TIME_SERVER"=>"Time (server)",
                                "TIME_TO"=>"Time to",
                                "TO"=>"To",
                                "TODAY"=>"Today",
                                "TOOLS"=>"Tools",
                                "TOO_MANY"=>"too many",
                                "TOO_MANY_FAILED_LOGIN_ATTEMPTS"=>"Too many failed login attempts. Try again after 30 minutes.",
                                "TOO_MANY_LOGIN_RECOVERY_ATTEMPTS"=>"Too many login recovery attempts. Try again after 5 minutes.",
                                "TOO_MANY_OBJECTS_SELECTED"=>"Too many objects selected.",
                                "TOP"=>"Top",
                                "TOP_PANEL_BORDER_COLOR"=>"Top panel border color",
                                "TOP_PANEL_COLOR"=>"Top panel color",
                                "TOP_PANEL_COUNTERS_FONT_COLOR"=>"Top panel counters font color",
                                "TOP_PANEL_FONT_COLOR"=>"Top panel font color",
                                "TOP_PANEL_SELECTION_COLOR"=>"Top panel selection color",
                                "TOP_SPEED"=>"Top speed",
                                "TOTAL"=>"Total",
                                "TOTAL_FILLED"=>"Total filled",
                                "TOTAL_FUEL_CONSUMPTION"=>"Total fuel consumption",
                                "TOTAL_FUEL_COST"=>"Total fuel cost",
                                "TOTAL_ITEMS_DELETED"=>"Total items deleted:",
                                "TOTAL_OVERSPEED_COUNT"=>"Total overspeed count",
                                "TOTAL_ROUTE_LENGTH"=>"Total route length",
                                "TOTAL_SMS_IN_QUEUE_TO_SEND"=>"Total SMS in queue to send",
                                "TOTAL_STOLEN"=>"Total stolen",
                                "TOW"=>"Tow",
                                "TRACKING_START"=>"Tracking start",
                                "TRACKING_STOP"=>"Tracking stop",
                                "TRAILER"=>"Trailer",
                                "TRAILERS"=>"Trailers",
                                "TRAILERS_FOUND"=>"%s trailers found.",
                                "TRAILER_ASSIGN"=>"Trailer assign ",
                                "TRAILER_ASSIGN_SENSOR_IS_ALREADY_AVAILABLE"=>"Trailer assign sensor is already available.",
                                "TRAILER_CHANGE"=>"Trailer change",
                                "TRAILER_INFO"=>"Trailer information",
                                "TRANSPORT_MODEL"=>"Transport model",
                                "TRAVEL_SHEET"=>"Travel sheet",
                                "TRAVEL_SHEET_DAY_NIGHT"=>"Travel sheet (day\/night)",
                                "TRIAL"=>"Trial",
                                "TRIGGER_EVENT"=>"Trigger event",
                                "TWO_OBJECTS_SELECTED"=>"Two objects must be selected.",
                                "TYPE"=>"Type",
                                "TYPE_A_MESSAGE"=>"Type a message...",
                                "UNABLE_TO_SEND_SMS_MESSAGE"=>"Unable to send SMS message.",
                                "UNASSIGN_OBJECT_DRIVER_AFTER_IGNITION_IF_OFF"=>"Unassign object driver after ignition is off",
                                "UNDERSPEED"=>"Underspeed",
                                "UNDERSPEEDS"=>"Underspeeds",
                                "UNDERSPEED_COUNT"=>"Underspeed count",
                                "UNDERSPEED_COUNT_MERGED"=>"Underspeed count (merged)",
                                "UNDERSPEED_POSITION"=>"Underspeed position",
                                "UNGROUPED"=>"Ungrouped",
                                "UNITS_OF_MEASUREMENT"=>"Units of measurement",
                                "UNIT_ACRE"=>"ac",
                                "UNIT_D"=>"d",
                                "UNIT_FT"=>"ft",
                                "UNIT_GALLONS"=>"gallons",
                                "UNIT_H"=>"h",
                                "UNIT_HECTARES"=>"ha",
                                "UNIT_KM"=>"km",
                                "UNIT_KN"=>"kn",
                                "UNIT_KPH"=>"kph",
                                "UNIT_LITERS"=>"liters",
                                "UNIT_M"=>"m",
                                "UNIT_MI"=>"mi",
                                "UNIT_MIN"=>"min",
                                "UNIT_MPH"=>"mph",
                                "UNIT_NM"=>"nm",
                                "UNIT_OF_CAPACITY"=>"Unit of capacity",
                                "UNIT_OF_DISTANCE"=>"Unit of distance",
                                "UNIT_OF_TEMPERATURE"=>"Unit of temperature",
                                "UNIT_S"=>"s",
                                "UNIT_SQ_FT"=>"ft\u00b2",
                                "UNIT_SQ_KM"=>"km\u00b2",
                                "UNIT_SQ_M"=>"m\u00b2",
                                "UNIT_SQ_MI"=>"mi\u00b2",
                                "UNLIMITED"=>"Unlimited",
                                "UNUSED_OBJECTS"=>"Unused objects",
                                "UNUSED_OBJECT_LIST"=>"Unused object list",
                                "UPDATE_LAST_SERVICE"=>"Update last service",
                                "UPLOAD"=>"Upload",
                                "URL"=>"URL",
                                "URL_ADDRESSES"=>"URL addresses",
                                "URL_CANT_BE_EMPTY"=>"URL can't be empty.",
                                "URL_DESKTOP"=>"URL desktop",
                                "URL_MOBILE"=>"URL mobile",
                                "USAGE"=>"Usage",
                                "USER"=>"User",
                                "USERNAME"=>"Username",
                                "USERNAME_CANT_BE_EMPTY"=>"Username can't be empty.",
                                "USERNAME_OR_PASSWORD_INCORRECT"=>"Username or password is incorrect.",
                                "USERNAME_PASSWORD_SENT"=>"Username and password sent.",
                                "USERNAME_SPACE_CHARACTERS"=>"Username should not contain space characters.",
                                "USERS"=>"Users",
                                "USERS_FOUND"=>"%s users found.",
                                "USER_ACCOUNT"=>"User account",
                                "USER_API"=>"User API",
                                "USER_INTERFACE"=>"User interface",
                                "USER_LIST"=>"User list",
                                "USER_REGISTRATION_VIA_LOGIN_DIALOG"=>"User registration via login dialog",
                                "USE_GEOCODER_CACHE"=>"Use geocoder cache, this will reduce API calls to geocoder servers and make some address responses faster",
                                "USE_PLAN"=>"Use plan",
                                "USE_SMTP_SERVER"=>"Use SMTP server",
                                "VALID"=>"Valid",
                                "VALUE"=>"Value",
                                "VALUE_IS_ALREADY_AVAILABLE"=>"Value is already available.",
                                "VARIABLES"=>"Variables",
                                "VAR_BILLING_CURRENCY"=>"%CURRENCY% - Currency",
                                "VAR_BILLING_PLAN_ID"=>"%PLAN_ID% - Billing plan ID",
                                "VAR_BILLING_PLAN_NAME"=>"%PLAN_NAME% - Billing plan name",
                                "VAR_BILLING_PLAN_PRICE"=>"%PLAN_PRICE% - Billing plan price",
                                "VAR_BILLING_USER_EMAIL"=>"%USER_EMAIL% - User e-mail, used for paid account identification",
                                "VAR_NO_VARIABLES_AVAILABLE"=>"No variables available",
                                "VAR_SMS_GATEWAY_MESSAGE"=>"%MESSAGE% - text of SMS message",
                                "VAR_SMS_GATEWAY_NUMBER"=>"%NUMBER% - phone number, where SMS will be sent",
                                "VAR_TEMPLATE_ADDRESS"=>"%ADDRESS% - Position address",
                                "VAR_TEMPLATE_ALT"=>"%ALT% - Altitude",
                                "VAR_TEMPLATE_ANGLE"=>"%ANGLE% - Moving angle",
                                "VAR_TEMPLATE_DRIVER"=>"%DRIVER% - Driver name",
                                "VAR_TEMPLATE_DT_POS"=>"%DT_POS% - Position date and time",
                                "VAR_TEMPLATE_DT_SER"=>"%DT_SER% - Server date and time",
                                "VAR_TEMPLATE_EMAIL"=>"%EMAIL% - E-mail",
                                "VAR_TEMPLATE_ENG_HOURS"=>"%ENG_HOURS% - Engine hours",
                                "VAR_TEMPLATE_EVENT"=>"%EVENT% - Event name",
                                "VAR_TEMPLATE_G_MAP"=>"%G_MAP% - URL to Google Maps with position",
                                "VAR_TEMPLATE_IMEI"=>"%IMEI% - Object IMEI",
                                "VAR_TEMPLATE_LAT"=>"%LAT% - Position latitude",
                                "VAR_TEMPLATE_LNG"=>"%LNG% - Position longitude",
                                "VAR_TEMPLATE_NAME"=>"%NAME% - Object name",
                                "VAR_TEMPLATE_ODOMETER"=>"%ODOMETER% - Odometer",
                                "VAR_TEMPLATE_PASSWORD"=>"%PASSWORD% - Password",
                                "VAR_TEMPLATE_PL_NUM"=>"%PL_NUM% - Plate number",
                                "VAR_TEMPLATE_ROUTE"=>"%ROUTE% - Route name",
                                "VAR_TEMPLATE_SERVER_NAME"=>"%SERVER_NAME% - GPS server name",
                                "VAR_TEMPLATE_SIM_NUMBER"=>"%SIM_NUMBER% - SIM card number",
                                "VAR_TEMPLATE_SPEED"=>"%SPEED% - Speed",
                                "VAR_TEMPLATE_TRAILER"=>"%TRAILER% - Trailer name",
                                "VAR_TEMPLATE_TR_MODEL"=>"%TR_MODEL% - Transport model",
                                "VAR_TEMPLATE_URL_AU"=>"%URL_AU% - Access via URL",
                                "VAR_TEMPLATE_URL_AU_MOBILE"=>"%URL_AU_MOBILE% - Access via URL mobile",
                                "VAR_TEMPLATE_URL_LOGIN"=>"%URL_LOGIN% - URL to login",
                                "VAR_TEMPLATE_URL_RECOVER"=>"%URL_RECOVER% - URL to recover account",
                                "VAR_TEMPLATE_URL_SHOP"=>"%URL_SHOP% - URL to shop",
                                "VAR_TEMPLATE_URL_SU"=>"%URL_SU% - Access via URL",
                                "VAR_TEMPLATE_URL_SU_MOBILE"=>"%URL_SU_MOBILE% - Access via URL mobile",
                                "VAR_TEMPLATE_USERNAME"=>"%USERNAME% - Username",
                                "VAR_TEMPLATE_USER_EMAIL"=>"%USER_EMAIL% - User account e-mail",
                                "VAR_TEMPLATE_VIN"=>"%VIN% - VIN",
                                "VAR_TEMPLATE_ZONE"=>"%ZONE% - Zone name",
                                "VERTICAL_DIALOG_POSITION"=>"Vertical dialog position",
                                "VIEWER"=>"Viewer",
                                "VIN"=>"VIN",
                                "VIRTUAL_ACC_PARAMETER_PROPERTIES"=>"Virtual ACC parameter properties",
                                "VIRT_ACC_EQ_0_IF_PARAMETER"=>"Virt. ACC equals \"0\" if parameter",
                                "VIRT_ACC_EQ_1_IF_PARAMETER"=>"Virt. ACC equals \"1\" if parameter",
                                "WARNING_CHANGING_THIS_VALUE_WILL_AFFECT_EXISTING_DATA"=>"Warning: Changing this value will affect existing data.",
                                "WARNING_DISPLAY_ADDRESS_ENABLE"=>"Warning:  Enabling address display features will raise geocoder requests and you may run out of geocoder service quota. Please consider first before enabling this feature.",
                                "WEBHOOK"=>"Webhook",
                                "WEBHOOK_DAILY"=>"Number of Webhook (daily)",
                                "WEBHOOK_URL"=>"Webhook URL",
                                "WEEKLY"=>"Weekly",
                                "WEEK_DAYS"=>"Week days",
                                "WHOLE_PERIOD"=>"Whole period",
                                "WIDGETS"=>"Widgets",
                                "WINTER_FROM"=>"Winter from",
                                "WINTER_RATE_L100KM"=>"Winter rate (kilometers per liter)",
                                "WINTER_RATE_MPG"=>"Winter rate (miles per gallon)",
                                "WINTER_TO"=>"Winter to",
                                "YANDEX_MAPS_KEY"=>"Yandex Maps key (get it here: https:\/\/tech.yandex.com\/maps)",
                                "YEAR"=>"Year",
                                "YEARS"=>"Years",
                                "YES"=>"Yes",
                                "YESTERDAY"=>"Yesterday",
                                "YOU_CAN_ADD"=>"You can add",
                                "YOU_CAN_ADD_UNLIMITED_NUMBER_OF_OBJECTS"=>"You can add unlimited number of objects.",
                                "YOU_CAN_ADD_UNLIMITED_NUMBER_OF_OBJECTS_TILL"=>"You can add unlimited number of objects till",
                                "ZONES"=>"Zones",
                                "ZONES_INSTEAD_OF_ADDRESSES"=>"Zones instead of addresses",
                                "ZONE_CANT_HAVE_MORE_THAN_NUM_VERTICES"=>"Zone can't have more than 80 vertices.",
                                "ZONE_IN"=>"Zone in",
                                "ZONE_IN_OUT"=>"Zone in\/out",
                                "ZONE_IN_OUT_WITH_GEN_INFORMATION"=>"Zone in\/out with gen. information",
                                "ZONE_LIMIT_IS_REACHED"=>"Zone limit is reached.",
                                "ZONE_NAME"=>"Zone name",
                                "ZONE_OUT"=>"Zone out",
                                "ZONE_POSITION"=>"Zone position",
                                "ZONE_PROPERTIES"=>"Zone properties",
                                "ZONE_VISIBLE"=>"Zone visible",
                                "ZOOM"=>"Zoom",
                                "ZOOM_IN"=>"Zoom in",
                                "ZOOM_OUT"=>"Zoom out",
                                "UNIT_SPEED"=>"kph",
                                "UNIT_DISTANCE"=>"km",
                                "UNIT_HEIGHT"=>"m",
                                "UNIT_CAPACITY"=>"liters",
                                "UNIT_TEMPERATURE"=>"C"
                            ]);
                    }
                }

            default:
                return response()->json([
                    'ABOUT'=> 'Tentang',
                    'ABSOLUTE'=> 'Mutlak',
                    'ACCENT_COLOR'=> 'Warna aksen',
                    'ACCESS_TO_GPS_SERVER_ACCOUNT'=> 'Akses ke server GPS',
                    'ACCESS_VIA_URL'=> 'Akses melalui URL',
                    'ACCOUNT'=> 'Akun',
                    'ACCOUNT_PRIVILEGES'=> 'Hak istimewa akun',
                    'ACCURACY'=> 'Akurasi',
                    'ACRES'=> 'Acres',
                    'ACTION'=> 'Aksi',
                    'ACTIVATE'=> 'Aktifkan',
                    'ACTIVATION_POSITION'=> 'Posisi aktivasi',
                    'ACTIVATION_TIME'=> 'Waktu aktivasi',
                    'ACTIVE'=> 'Aktif',
                    'ACTIVE_PERIOD'=> 'Periode aktif',
                    'ADD'=> 'Add',
                    'ADDITIONAL_INFO'=> 'Informasi tambahan',
                    'ADDITIONAL_PLANS_CAN_BE_PURCHASED_VIA_BILLING_SYSTEM'=> 'Paket tambahan dapat dibeli melalui sistem penagihan.',
                    'ADDRESS'=> 'Alamat',
                    'ADDRESS_CANT_BE_EMPTY'=> 'Alamat tidak boleh kosong.',
                    'ADDRESS_DISPLAY'=> 'Tampilan alamat',
                    'ADDRESS_SEARCH'=> 'Pencarian alamat',
                    'ADD_MARKER'=> 'Tambahkan penanda',
                    'ADD_OBJECT'=> 'Tambah objek',
                    'ADD_OBJECTS'=> 'Tambah objek',
                    'ADD_PLAN'=> 'Tambahkan rencana',
                    'ADD_ROUTE'=> 'Tambah rute',
                    'ADD_USER'=> 'Tambah pengguna',
                    'ADD_ZONE'=> 'Tambah zona',
                    'ADMINISTRATOR'=> 'Administrator',
                    'ADVANCED'=> 'Lanjutan',
                    'AFTER'=> 'Setelah',
                    'ALARM_ARM'=> 'Lengan Alarm',
                    'ALARM_DISARM'=> 'Alarm menonaktifkan',
                    'ALL'=> 'Semua',
                    'ALL_AVAILABLE_FIELDS_SHOULD_BE_FILLED_OUT'=> 'Semua field yang tersedia harus diisi.',
                    'ALL_OBJECTS'=> 'Semua objek',
                    'ALL_PROTOCOLS'=> 'Semua protokol',
                    'ALL_RIGHTS_RESERVED'=> 'Semua hak dilindungi undang-undang.',
                    'ALL_SELECTED'=> 'Semua dipilih',
                    'ALL_USER_ACCOUNTS'=> 'Semua akun pengguna',
                    'ALTITUDE'=> 'Ketinggian',
                    'ALTITUDE_GRAPH'=> 'Grafik ketinggian',
                    'ANGLE'=> 'Sudut',
                    'API'=> 'API',
                    'API_DAILY'=> 'Jumlah panggilan API (harian)',
                    'API_KEY'=> 'kunci API',
                    'APPEARANCE'=> 'Penampilan',
                    'APPLY_CURRENT_PLAN_TO_BELOW_SELECTED_OBJECTS'=> 'Terapkan rencana saat ini ke objek yang dipilih di bawah.',
                    'ARCGIS_MAPS_KEY'=> 'ArcGIS Maps key (get it here=> https=>//www.arcgis.com)',
                    'ARE_YOU_SURE_YOU_WANT_TO_ACTIVATE_SELECTED_ITEMS'=> 'Anda yakin ingin mengaktifkan item terpilih?',
                    'ARE_YOU_SURE_YOU_WANT_TO_ACTIVATE_SELECTED_OBJECTS'=> 'Anda yakin ingin mengaktifkan objek terpilih?',
                    'ARE_YOU_SURE_YOU_WANT_TO_CHANGE_OBJECT_IMEI'=> 'Anda yakin ingin mengubah objek IMEI?',
                    'ARE_YOU_SURE_YOU_WANT_TO_CHANGE_USER_PASSWORD'=> 'Anda yakin ingin mengubah kata sandi pengguna?',
                    'ARE_YOU_SURE_YOU_WANT_TO_CLEAR_DETECTED_SENSOR_CACHE'=> 'Anda yakin ingin menghapus cache sensor yang terdeteksi?',
                    'ARE_YOU_SURE_YOU_WANT_TO_CLEAR_GEOCODER_CACHE'=> 'Anda yakin ingin menghapus cache geocoder?',
                    'ARE_YOU_SURE_YOU_WANT_TO_CLEAR_HISTORY_EVENTS'=> 'Anda yakin ingin menghapus riwayat objek dan kejadian?',
                    'ARE_YOU_SURE_YOU_WANT_TO_CLEAR_SELECTED_ITEMS_HISTORY_EVENTS'=> 'Anda yakin ingin menghapus riwayat dan kejadian item terpilih?',
                    'ARE_YOU_SURE_YOU_WANT_TO_CLEAR_SMS_QUEUE'=> 'Anda yakin ingin menghapus antrian SMS?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DEACTIVATE_SELECTED_ITEMS'=> 'Anda yakin ingin menonaktifkan item terpilih?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE'=> 'Anda yakin ingin menghapus?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_BILLING_PLANS'=> 'Anda yakin ingin menghapus semua paket penagihan?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_CUSTOM_ICONS'=> 'Anda yakin ingin menghapus semua ikon kustom?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_CUSTOM_MAPS'=> 'Anda yakin ingin menghapus semua peta khusus?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_DRIVERS'=> 'Anda yakin ingin menghapus semua driver?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_DTC_RECORDS'=> 'Anda yakin ingin menghapus semua record DTC?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_EVENTS'=> 'Anda yakin ingin menghapus semua acara?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_GROUPS'=> 'Anda yakin ingin menghapus semua grup?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_IMAGES'=> 'Anda yakin ingin menghapus semua gambar?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_LOGBOOK_RECORDS'=> 'Apakah Anda yakin ingin menghapus semua catatan buku catatan?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_LOGS'=> 'Anda yakin ingin menghapus semua catatan?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_MARKERS'=> 'Anda yakin ingin menghapus semua penanda?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_OBJECT_CONTROL_TEMPLATES'=> 'Apakah Anda yakin ingin menghapus semua templat kendali objek?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_PASSENGERS'=> 'Anda yakin ingin menghapus semua penumpang?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_ROUTES'=> 'Anda yakin ingin menghapus semua rute?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_SELECTED_OBJECT_MESSAGES'=> 'Anda yakin ingin menghapus semua pesan objek terpilih?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_TASKS'=> 'Anda yakin ingin menghapus semua tugas?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_THEMES'=> 'Anda yakin ingin menghapus semua tema?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_TRAILERS'=> 'Anda yakin ingin menghapus semua trailer?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_ALL_ZONES'=> 'Anda yakin ingin menghapus semua zona?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_ITEMS'=> 'Anda yakin ingin menghapus item terpilih?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_ICON'=> 'Anda yakin ingin menghapus ikon ini?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_IMAGE'=> 'Anda yakin ingin menghapus gambar ini?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_OBJECT_FROM_SYSTEM'=> 'Apakah Anda yakin ingin menghapus objek ini (hapus seluruhnya dari semua pengguna dan sistem)?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_OBJECT_FROM_USER_ACCOUNT'=> 'Anda yakin ingin menghapus objek ini (hapus hanya dari akun pengguna)?',
                    'ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_UNUSED_OBJECT'=> 'Anda yakin ingin menghapus objek yang tidak digunakan ini?',
                    'ARE_YOU_SURE_YOU_WANT_TO_IMPORT'=> 'Anda yakin ingin mengimpor?',
                    'ARE_YOU_SURE_YOU_WANT_TO_OVERWRITE_SELECTED_COMMAND'=> 'Anda yakin ingin menimpa perintah yang dipilih?',
                    'ARE_YOU_SURE_YOU_WANT_TO_RESET_SERVER_API_KEY'=> 'Anda yakin ingin mengatur ulang kunci API Server?',
                    'ARE_YOU_SURE_YOU_WANT_TO_SEND_COMMAND_SELECTED_OBJECTS'=> 'Anda yakin ingin mengirim perintah ke objek yang dipilih?',
                    'ARE_YOU_SURE_YOU_WANT_TO_SEND_TEST_MESSAGE_TO_YOUR_EMAIL'=> 'Anda yakin ingin mengirim pesan percobaan ke email Anda?',
                    'ARE_YOU_SURE_YOU_WANT_TO_SEND_THIS_MESSAGE'=> 'Anda yakin ingin mengirim pesan ini?',
                    'ARE_YOU_SURE_YOU_WANT_TO_SET_EXPIRATION_FOR_SELECTED_ITEMS'=> 'Anda yakin ingin menyetel kedaluwarsa untuk item yang dipilih?',
                    'ARRIVED'=> 'Tiba',
                    'ARROW'=> 'Panah',
                    'ARROWS'=> 'Panah',
                    'AT_LEAST_ONE_CONDITION'=> 'Setidaknya satu kondisi harus ditambahkan.',
                    'AT_LEAST_ONE_MAP_SHOULD_BE_ENABLED'=> 'Setidaknya satu peta harus diaktifkan.',
                    'AT_LEAST_ONE_MARKER_SELECTED'=> 'At least one marker must be selected.',
                    'AT_LEAST_ONE_OBJECT_SELECTED'=> 'Setidaknya satu objek harus dipilih.',
                    'AT_LEAST_ONE_ROUTE_SELECTED'=> 'Setidaknya satu rute harus dipilih.',
                    'AT_LEAST_ONE_SENSOR_SELECTED'=> 'Setidaknya satu sensor harus dipilih.',
                    'AT_LEAST_ONE_ZONE_SELECTED'=> 'Setidaknya satu zona harus dipilih.',
                    'AT_LEAST_TWO_CALIBRATION_POINTS'=> 'Setidaknya dua titik pemeriksaan kalibrasi harus ditambahkan.',
                    'AT_OUR_SHOP'=> 'di toko kami=>',
                    'AUTO_ASSIGN'=> 'Tetapkan otomatis',
                    'AUTO_EXECUTE'=> 'Eksekusi otomatis',
                    'AUTO_HIDE'=> 'Sembunyikan otomatis',
                    'AVAILABLE_MAPS'=> 'Peta yang tersedia',
                    'AVAILABLE_MARKERS'=> 'Penanda yang tersedia',
                    'AVAILABLE_OBJECTS'=> 'Objek yang tersedia',
                    'AVAILABLE_ZONES'=> 'Zona yang tersedia',
                    'AVG_FUEL_CONSUMPTION'=> 'Rata-rata. konsumsi bahan bakar',
                    'AVG_FUEL_CONSUMPTION_100_KM'=> 'Rata-rata. kontra bahan bakar. (100 km) ',
                    'AVG_FUEL_CONSUMPTION_MPG'=> 'Rata-rata. kontra bahan bakar. (MPG) ',
                    'AVG_SPEED'=> 'Kecepatan rata-rata',
                    'BACK'=> 'Kembali',
                    'BACKGROUND_COLOR'=> 'Warna latar belakang',
                    'BACKUP'=> 'Cadangan',
                    'BATTERY'=> 'Baterai',
                    'BEFORE'=> 'Sebelum',
                    'BEFORE_2_DAYS'=> 'Sebelum 2 hari',
                    'BEFORE_3_DAYS'=> 'Sebelum 3 hari',
                    'BILLING'=> 'Penagihan',
                    'BILLING_ALLOWS_TO_PURCHASE_ADDITIONAL_PLANS'=> 'Penagihan memungkinkan untuk membeli rencana tambahan dan memperpanjang periode aktivitas objek. Paket yang dibeli akan muncul dalam daftar di bawah ini setelah pembayaran dikonfirmasi, kadang-kadang mungkin perlu waktu. ',
                    'BILLING_PLAN'=> 'Paket penagihan',
                    'BILLING_PLANS'=> 'Paket penagihan',
                    'BILLING_PLAN_LIST'=> 'Daftar rencana penagihan',
                    'BILLING_PROPERTIES'=> 'Properti penagihan',
                    'BING_GEOCODER_KEY'=> 'Kunci Bing Geocoder (dapatkan di sini=> https=>//www.bingmapsportal.com)',
                    'BING_MAPS_KEY'=> 'Kunci Bing Maps (dapatkan di sini=> https=>//www.bingmapsportal.com)',
                    'BLUE_ID'=> 'Blue ID',
                    'BLUE_ID_SENSOR_IS_ALREADY_AVAILABLE'=> 'Blue ID sensor is already available.',
                    'BOTTOM'=> 'Bawah',
                    'BOTTOM_PANEL_WITH_ICONS'=> 'Panel bawah dengan ikon',
                    'BOTTOM_TEXT_HTML_COMPATIBLE'=> 'Teks bawah (kompatibel dengan HTML)',
                    'BRACELET_OFF'=> 'Gelang lepas',
                    'BRACELET_ON'=> 'Gelang aktif',
                    'BRANDING'=> 'Branding',
                    'BRANDING_AND_UI'=> 'Branding dan UI',
                    'BUYER'=> 'Pembeli',
                    'CALCULATION'=> 'Perhitungan',
                    'CALIBRATION'=> 'Kalibrasi',
                    'CAME'=> 'Datang',
                    'CAMERA'=> 'Kamera',
                    'CANCEL'=> 'Batal',
                    'CANT_SEND_EMAIL'=> 'Tidak dapat mengirim email.',
                    'CELSIUS'=> 'Celsius',
                    'CENTER'=> 'Center',
                    'CHANGES_SAVED_SUCCESSFULLY'=> 'Perubahan berhasil disimpan.',
                    'CHANGE_PASSWORD'=> 'Ubah sandi',
                    'CHAT'=> 'Obrolan',
                    'CIRCLE'=> 'Lingkaran',
                    'CITY'=> 'Kota',
                    'CLEAR'=> 'Hapus',
                    'CLEAR_DETECTED_SENSOR_CACHE'=> 'Hapus cache sensor yang terdeteksi',
                    'CLEAR_GEOCODER_CACHE'=> 'Kosongkan cache geocoder',
                    'CLEAR_HISTORY'=> 'Hapus riwayat',
                    'CLEAR_OBJECTS_HISTORY'=> 'Hapus riwayat objek',
                    'CODE'=> 'Kode',
                    'COLLAPSED'=> 'Diciutkan',
                    'COLOR'=> 'Warna',
                    'COLORS'=> 'Warna',
                    'COLOR_BLACK'=> 'Hitam',
                    'COLOR_BLUE'=> 'Biru',
                    'COLOR_GREEN'=> 'Hijau',
                    'COLOR_GREY'=> 'Abu-abu',
                    'COLOR_ORANGE'=> 'Oranye',
                    'COLOR_PURPLE'=> 'Ungu',
                    'COLOR_RED'=> 'Merah',
                    'COLOR_YELLOW'=> 'Kuning',
                    'COMMAND'=> 'Perintah',
                    'COMMANDS'=> 'Perintah',
                    'COMMANDS_STATUS'=> 'Status perintah',
                    'COMMAND_CANT_BE_EMPTY'=> 'Perintah tidak boleh kosong.',
                    'COMMAND_HEX_NOT_VALID'=> 'Format Perintah HEX tidak sah.',
                    'COMMAND_INTERVAL'=> 'Interval perintah',
                    'COMMAND_PROPERTIES'=> 'Properti perintah',
                    'COMMAND_SENT_FOR_EXECUTION'=> 'Perintah berhasil dikirim untuk eksekusi.',
                    'COMMENT'=> 'Komentar',
                    'COMMENT_ABOUT_USER'=> 'Komentar tentang pengguna ...',
                    'COMPANY'=> 'Company',
                    'COMPLETED'=> 'Selesai',
                    'CONNECTION_ATTEMPTS'=> 'Percobaan koneksi',
                    'CONNECTION_NO'=> 'Sambungan=> Tidak',
                    'CONNECTION_NO_GPS_NO'=> 'Koneksi=> Tidak, GPS=> Tidak',
                    'CONNECTION_STATUS'=> 'Status koneksi',
                    'CONNECTION_YES'=> 'Koneksi=> Ya',
                    'CONNECTION_YES_GPS_NO'=> 'Koneksi=> Ya, GPS=> Tidak',
                    'CONNECTION_YES_GPS_YES'=> 'Koneksi=> Ya, GPS=> Ya',
                    'CONNECT_TO'=> 'Hubungkan ke %s',
                    'CONTACT_ADMINISTRATOR'=> 'Hubungi administrator.',
                    'CONTACT_ADMIN_IF_YOU_WANT_TO_DO_ANY_CHANGES'=> 'Hubungi administrator jika Anda ingin melakukan perubahan apa pun dengan objek Anda.',
                    'CONTACT_INFO'=> 'Informasi kontak',
                    'CONTACT_PAGE_URL'=> 'URL halaman kontak',
                    'CONTINUED_USE_OF_PUSH_NOTIFICATIONS_DECREASE_BATTERY_LIFE'=> 'Penggunaan notifikasi push secara terus-menerus dapat mengurangi masa pakai baterai. Jika Anda menginginkan masa pakai baterai yang lebih baik, setel interval tidak kurang dari 5 menit. ',
                    'CONTROL'=> 'Kontrol',
                    'CONTROL_PANEL'=> 'Panel kendali',
                    'COORDINATES'=> 'Koordinat',
                    'COPY'=> 'Salin',
                    'COST'=> 'Biaya',
                    'COST_PER_GALLON'=> 'Biaya per galon',
                    'COST_PER_LITER'=> 'Biaya per liter',
                    'COUNT'=> 'Hitungan',
                    'COUNTER'=> 'Penghitung',
                    'COUNTERS'=> 'Penghitung',
                    'COUNTRY_STATE'=> 'Kabupaten / Negara Bagian',
                    'CREATE'=> 'Buat',
                    'CREATED'=> 'Dibuat',
                    'CREATE_ACCOUNT'=> 'Buat akun',
                    'CREATE_NOW'=> 'Buat sekarang',
                    'CURRENCY'=> 'Mata Uang',
                    'CURRENT_ENGINE_HOURS'=> 'Jam mesin saat ini',
                    'CURRENT_OBJECT_COUNTERS'=> 'Penghitung objek saat ini',
                    'CURRENT_ODOMETER'=> 'Odometer saat ini',
                    'CURRENT_POSITION'=> 'Posisi saat ini',
                    'CURRENT_POSITION_OFFLINE'=> 'Posisi saat ini (offline)',
                    'CURRENT_VALUE'=> 'Nilai saat ini',
                    'CUSTOM'=> 'Kustom',
                    'CUSTOM_FIELDS'=> 'Kolom kustom',
                    'CUSTOM_FIELDS_FOUND'=> '%s bidang khusus ditemukan.',
                    'CUSTOM_FIELD_PROPERTIES'=> 'Properti bidang kustom',
                    'CUSTOM_GATEWAY'=> 'Gerbang khusus',
                    'CUSTOM_GATEWAY_URL'=> 'URL gateway khusus',
                    'CUSTOM_MAP'=> 'Peta kustom',
                    'CUSTOM_MAPS'=> 'Peta kustom',
                    'CUSTOM_MAP_PROPERTIES'=> 'Properti peta tersesuai',
                    'DAILY'=> 'Harian',
                    'DASHBOARD'=> 'Dashboard',
                    'DATA'=> 'Data',
                    'DATA_ITEMS'=> 'Item data',
                    'DATA_LIST'=> 'Daftar Data',
                    'DATA_POINTS'=> 'Titik data',
                    'DATE'=> 'Tanggal',
                    'DATE_CANT_BE_EMPTY'=> 'Tanggal tidak boleh kosong.',
                    'DAY'=> 'Hari',
                    'DAYLIGHT_SAVING_TIME'=> 'Waktu musim panas (DST)',
                    'DAYS'=> 'Hari',
                    'DAYS_EXPIRED'=> 'Hari kedaluwarsa',
                    'DAYS_INTERVAL'=> 'Interval hari',
                    'DAYS_LEFT'=> 'Hari tersisa',
                    'DAY_FRIDAY'=> 'Jumat',
                    'DAY_FRIDAY_S'=> 'F',
                    'DAY_MONDAY'=> 'Senin',
                    'DAY_MONDAY_S'=> 'M',
                    'DAY_SATURDAY'=> 'Sabtu',
                    'DAY_SATURDAY_S'=> 'S',
                    'DAY_SUNDAY'=> 'Minggu',
                    'DAY_SUNDAY_S'=> 'S',
                    'DAY_THURSDAY'=> 'Kamis',
                    'DAY_THURSDAY_S'=> 'T',
                    'DAY_TIME'=> 'Waktu siang',
                    'DAY_TUESDAY'=> 'Selasa',
                    'DAY_TUESDAY_S'=> 'T',
                    'DAY_WEDNESDAY'=> 'Rabu',
                    'DAY_WEDNESDAY_S'=> 'W',
                    'DEACTIVATE'=> 'Nonaktifkan',
                    'DEACTIVATION_POSITION'=> 'Posisi penonaktifan',
                    'DEACTIVATION_TIME'=> 'Waktu penonaktifan',
                    'DEFAULT'=> 'Default',
                    'DEFAULTS'=> 'Default',
                    'DELETE'=> 'Delete',
                    'DELETED'=> 'Dihapus',
                    'DELETE_AFTER_EXPIRATION'=> 'Hapus setelah kedaluwarsa',
                    'DELETE_ALL'=> 'Hapus semua',
                    'DELETE_ALL_EVENTS'=> 'Hapus semua acara',
                    'DELETE_ALL_MARKERS'=> 'Hapus semua penanda',
                    'DELETE_ALL_ROUTES'=> 'Hapus semua rute',
                    'DELETE_ALL_SELECTED_OBJECT_MESSAGES'=> 'Hapus semua pesan objek terpilih',
                    'DELETE_ALL_ZONES'=> 'Hapus semua zona',
                    'DELETE_OBJECTS'=> 'Hapus objek',
                    'DELETE_SELECTED'=> 'Hapus yang dipilih',
                    'DELIVERED'=> 'terkirim',
                    'DEPARTED'=> 'Berangkat',
                    'DEPENDING_ON_ROUTES'=> 'Tergantung pada rute',
                    'DEPENDING_ON_ZONES'=> 'Tergantung pada zona',
                    'DESCRIPTION'=> 'Deskripsi',
                    'DESKTOP_VERSION'=> 'Versi desktop',
                    'DESTINATION'=> 'Tujuan',
                    'DETAILED'=> 'Detil',
                    'DETAILS'=> 'Detail',
                    'DETECTED_SENSOR_CACHE_CLEARED'=> 'Cache sensor yang terdeteksi dihapus.',
                    'DETECT_STOPS_USING'=> 'Deteksi berhenti menggunakan',
                    'DEVIATION'=> 'Deviasi',
                    'DEVIATION_CANT_BE_LESS_THAN_0'=> 'Deviasi tidak boleh kurang dari 0.',
                    'DIAGNOSTIC_TROUBLE_CODES'=> 'DTC (Kode Masalah Diagnostik)',
                    'DIALOG_BACKGROUND_COLOR'=> 'Warna latar belakang dialog',
                    'DIALOG_OPACITY'=> 'Opasitas dialog',
                    'DIALOG_TITLEBAR_COLOR'=> 'Warna bilah judul dialog',
                    'DICTIONARY'=> 'Kamus',
                    'DIGITAL_INPUT'=> 'Masukan digital',
                    'DIGITAL_OUTPUT'=> 'Keluaran digital',
                    'DISABLED'=> 'Nonaktif',
                    'DISASSEMBLE'=> 'Disassemble',
                    'DISMOUNT'=> 'Turunkan',
                    'DISTANCE'=> 'Distance',
                    'DOOR'=> 'Pintu',
                    'DRAW_ROUTE_ON_MAP_BEFORE_SAVING'=> 'Gambar rute di peta sebelum menyimpan.',
                    'DRAW_ZONE_ON_MAP_BEFORE_SAVING'=> 'Gambar zona di peta sebelum menyimpan.',
                    'DRIVER'=> 'Driver',
                    'DRIVERS'=> 'Driver',
                    'DRIVERS_FOUND'=> '%s driver ditemukan.',
                    'DRIVER_ASSIGN'=> 'Tugas pengemudi',
                    'DRIVER_ASSIGN_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor penetapan driver sudah tersedia.',
                    'DRIVER_BEHAVIOR_RAG'=> 'Perilaku pengemudi (RAG)',
                    'DRIVER_BEHAVIOR_RAG_BY_DRIVER'=> 'Perilaku pengemudi (RAG oleh pengemudi)',
                    'DRIVER_BEHAVIOR_RAG_BY_OBJECT'=> 'Perilaku pengemudi (RAG menurut objek)',
                    'DRIVER_CHANGE'=> 'Perubahan driver',
                    'DRIVER_INFO'=> 'Informasi pengemudi',
                    'DRIVES_AND_STOPS'=> 'Drive dan berhenti',
                    'DRIVES_AND_STOPS_WITH_LOGIC_SENSORS'=> 'Menggerakkan dan berhenti dengan sensor logika',
                    'DRIVES_AND_STOPS_WITH_SENSORS'=> 'Menggerakkan dan berhenti dengan sensor',
                    'DUPLICATE'=> 'Duplikat',
                    'DUPLICATE_OBJECT'=> 'Objek duplikat',
                    'DURATION'=> 'Durasi',
                    'DURATION_FROM_LAST_EVENT'=> 'Durasi dari acara terakhir dalam menit',
                    'EDIT'=> 'Edit',
                    'EDITOR'=> 'Editor',
                    'EDIT_OBJECT'=> 'Edit objek',
                    'EDIT_OBJECTS'=> 'Edit objek',
                    'EDIT_PLAN'=> 'Edit rencana',
                    'EDIT_USER'=> 'Edit pengguna',
                    'EMAIL'=> 'Email',
                    'EMAILS_DAILY'=> 'Jumlah email (harian)',
                    'EMAIL_ADDRESS'=> 'Alamat email',
                    'EMAIL_SETTINGS'=> 'Setting Email',
                    'EMAIL_TEMPLATE'=> 'Template email',
                    'ENABLED'=> 'Diaktifkan',
                    'ENABLE_BILLING'=> 'Aktifkan penagihan',
                    'ENABLE_DISABLE_ARROWS'=> 'Aktifkan / nonaktifkan panah',
                    'ENABLE_DISABLE_CAMERA'=> 'Aktifkan / nonaktifkan kamera',
                    'ENABLE_DISABLE_CLUSTERS'=> 'Aktifkan / nonaktifkan kluster',
                    'ENABLE_DISABLE_DATA_POINTS'=> 'Aktifkan / nonaktifkan titik data',
                    'ENABLE_DISABLE_EVENTS'=> 'Aktifkan / nonaktifkan acara',
                    'ENABLE_DISABLE_KML'=> 'Aktifkan / nonaktifkan KML',
                    'ENABLE_DISABLE_LIVE_TRAFFIC'=> 'Aktifkan / nonaktifkan lalu lintas langsung',
                    'ENABLE_DISABLE_MARKERS'=> 'Aktifkan / nonaktifkan penanda',
                    'ENABLE_DISABLE_OBJECTS'=> 'Aktifkan / nonaktifkan objek',
                    'ENABLE_DISABLE_OBJECT_LABELS'=> 'Aktifkan / nonaktifkan label objek',
                    'ENABLE_DISABLE_ROUTE'=> 'Aktifkan / nonaktifkan rute',
                    'ENABLE_DISABLE_ROUTES'=> 'Aktifkan / nonaktifkan rute',
                    'ENABLE_DISABLE_SNAP'=> 'Aktifkan / nonaktifkan jepret',
                    'ENABLE_DISABLE_STOPS'=> 'Aktifkan / nonaktifkan berhenti',
                    'ENABLE_DISABLE_STREET_VIEW'=> 'Aktifkan / nonaktifkan Street View',
                    'ENABLE_DISABLE_ZONES'=> 'Aktifkan / nonaktifkan zona',
                    'ENABLE_SMS_GATEWAY'=> 'Aktifkan SMS Gateway',
                    'ENABLE_VIRTUAL_ACC_PARAMETER'=> 'Aktifkan parameter ACC virtual tergantung pada voltase (parameter \'accvirt\')',
                    'END'=> 'End',
                    'END_TIME'=> 'Waktu berakhir',
                    'ENGINE_HOURS'=> 'Jam mesin',
                    'ENGINE_HOURS_EXPIRED'=> 'Jam mesin telah habis',
                    'ENGINE_HOURS_INTERVAL'=> 'Interval jam mesin',
                    'ENGINE_HOURS_LEFT'=> 'Jam mesin tersisa',
                    'ENGINE_HOURS_REACHES'=> 'Jam mesin mencapai',
                    'ENGINE_HOURS_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor jam mesin sudah tersedia.',
                    'ENGINE_IDLE'=> 'Mesin menganggur',
                    'ENGINE_IDLE_ARROW_COLOR'=> 'Warna panah diam mesin',
                    'ENGINE_IDLE_COLOR'=> 'Warna mesin diam',
                    'ENGINE_OFF'=> 'Mesin mati',
                    'ENGINE_ON'=> 'Mesin hidup',
                    'ENGINE_RESUME'=> 'Mesin dilanjutkan',
                    'ENGINE_STOP'=> 'Mesin berhenti',
                    'ENGINE_WORK'=> 'Pekerjaan mesin',
                    'ENTER_ACCOUNT_USERNAME_OR_EMAIL'=> 'Masukkan nama pengguna akun atau email ...',
                    'ENTER_CODE'=> 'Masukkan kode',
                    'ENTER_EMAIL_HERE'=> 'Masukkan email di sini ...',
                    'ENTER_IMEI_HERE'=> 'Masukkan IMEI di sini ...',
                    'ENTER_NEW_PASSWORD'=> 'Masukkan kata sandi baru',
                    'ENTER_OBJECT_NAME_OR_IMEI'=> 'Masukkan nama objek atau IMEI ...',
                    'ENTER_USERNAME_AND_PASSWORD_TO_LOGIN'=> 'Masukkan nama pengguna dan sandi untuk login.',
                    'ERROR'=> 'Kesalahan',
                    'EVENT'=> 'Acara',
                    'EVENTS'=> 'Acara',
                    'EVENTS_FOUND'=> '%s peristiwa ditemukan.',
                    'EVENT_DATA_LIST'=> 'Daftar data acara',
                    'EVENT_POSITION'=> 'Posisi acara',
                    'EVENT_PROPERTIES'=> 'Properti acara',
                    'EXACT_TIME'=> 'Waktu yang tepat',
                    'EXAMPLE_SHORT'=> 'ex.',
                    'EXECUTE_NOW'=> 'Jalankan sekarang',
                    'EXPENSE'=> 'Expense',
                    'EXPENSES'=> 'Beban',
                    'EXPENSE_PROPERTIES'=> 'Properti biaya',
                    'EXPIRED'=> 'Kedaluwarsa',
                    'EXPIRES_ON'=> 'Kedaluwarsa pada',
                    'EXPIRE_ACCOUNT'=> 'Kedaluwarsa akun',
                    'EXPIRE_ACCOUNT_DAYS_AFTER_REGISTRATION'=> 'Kedaluwarsa akun (hari setelah pendaftaran akun)',
                    'EXPIRE_OBJECT'=> 'Kedaluwarsa objek',
                    'EXPIRE_ON'=> 'Kedaluwarsa pada',
                    'EXPIRING_OBJECTS'=> 'Objek kedaluwarsa',
                    'EXPORT'=> 'Export',
                    'EXPORT_CSV'=> 'Ekspor ke CSV',
                    'EXPORT_GPX'=> 'Ekspor ke GPX',
                    'EXPORT_GSR'=> 'Ekspor ke GSR',
                    'EXPORT_KML'=> 'Ekspor ke KML',
                    'EX_ANNUAL_FEE'=> 'mis. Biaya tahunan',
                    'EX_MY_GPS_SERVER'=> 'mis. Server GPS Saya ',
                    'FAHRENHEIT'=> 'Fahrenheit',
                    'FAILED'=> 'Gagal',
                    'FAVICON'=> 'Favicon',
                    'FAVICON_SIZE_FORMAT'=> 'Favicon, ukuran hingga 256 x 256 px, PNG atau ICO',
                    'FILE_TYPE_MUST_BE_JPEG'=> 'Jenis file harus JPEG.',
                    'FILE_TYPE_MUST_BE_KML'=> 'Jenis file harus KML.',
                    'FILE_TYPE_MUST_BE_PNG'=> 'Jenis file harus PNG.',
                    'FILE_TYPE_MUST_BE_PNG_OR_ICO'=> 'Jenis file harus PNG atau ICO.',
                    'FILE_TYPE_MUST_BE_PNG_OR_JPG'=> 'Jenis file harus PNG atau JPG.',
                    'FILE_TYPE_MUST_BE_PNG_OR_SVG'=> 'Jenis file harus PNG atau SVG.',
                    'FILLED'=> 'Diisi',
                    'FILTER'=> 'Filter',
                    'FINISHED'=> 'Selesai',
                    'FIT_OBJECTS'=> 'Sesuaikan objek',
                    'FIT_OBJECTS_ON_MAP'=> 'Paskan objek pada peta',
                    'FOLLOW'=> 'Ikuti',
                    'FOLLOW_NEW_WINDOW'=> 'Ikuti (jendela baru)',
                    'FOLLOW_UNFOLLOW_ALL'=> 'Ikuti / batalkan semua',
                    'FONTS'=> 'Huruf',
                    'FONT_COLOR'=> 'Warna font',
                    'FORMAT'=> 'Format',
                    'FORMULA'=> 'Rumus',
                    'FORMULA_IS_NOT'=> 'Formula tidak valid.',
                    'FORWARD_THIS_OBJECT_LOCATION_DATA_TO_ANOTHER_OBJECT'=> 'Forward this object location data to another object from this account (should be used only for Iridium Satellite solutions)',
                    'FROM'=> 'Dari',
                    'FUEL_CONSUMPTION'=> 'Konsumsi bahan bakar',
                    'FUEL_CONSUMPTION_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor konsumsi bahan bakar sudah tersedia.',
                    'FUEL_COST'=> 'Biaya bahan bakar',
                    'FUEL_FILLINGS'=> 'Isi bahan bakar',
                    'FUEL_LEVEL'=> 'Tingkat bahan bakar',
                    'FUEL_LEVEL_GRAPH'=> 'Grafik tingkat bahan bakar',
                    'FUEL_LEVEL_SUM_UP'=> 'Jumlah level bahan bakar',
                    'FUEL_LEVEL_SUM_UP_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor jumlah level bahan bakar telah tersedia.',
                    'FUEL_THEFTS'=> 'Pencurian bahan bakar',
                    'GALLON'=> 'Galon',
                    'GATEWAY'=> 'Pintu Gerbang',
                    'GENERAL'=> 'Umum',
                    'GENERAL_INFO'=> 'Informasi umum',
                    'GENERAL_INFO_MERGED'=> 'Informasi umum (digabungkan)',
                    'GENERATE'=> 'Hasilkan',
                    'GENERATED'=> 'Dihasilkan',
                    'GEOCODER'=> 'Geocoder',
                    'GEOCODER_CACHE_CLEARED'=> 'Cache geocoder dihapus.',
                    'GEOCODER_LICENSE_KEYS'=> 'Kunci lisensi Geocoder',
                    'GEOCODER_SERVICE'=> 'Layanan Geocoder',
                    'GOOGLE_GEOCODER_KEY'=> 'Kunci Google Geocoder (dapatkan di sini=> https=>//developers.google.com)',
                    'GOOGLE_MAPS_KEY'=> 'Google Maps key (dapatkan di sini=> https=>//developers.google.com)',
                    'GPRS'=> 'GPRS',
                    'GPS_ANTENNA_CUT'=> 'Antena GPS terputus',
                    'GPS_DEVICE'=> 'Perangkat GPS',
                    'GPS_LEVEL'=> 'Tingkat GPS',
                    'GPS_NO'=> 'GPS=> Tidak',
                    'GPS_SERVER_NAME'=> 'Nama server GPS',
                    'GPS_YES'=> 'GPS=> Ya',
                    'GRAPH'=> 'Grafik',
                    'GRAPHICAL_REPORTS'=> 'Laporan grafis',
                    'GRID_PAGE_TEXT'=> 'Halaman {0} dari {1}',
                    'GRID_VIEW_TEXT'=> 'Tampilan {0} - {1} dari {2}',
                    'GROUP'=> 'Grup',
                    'GROUPS'=> 'Grup',
                    'GROUPS_FOUND'=> '%s grup ditemukan.',
                    'GSM_LEVEL'=> 'Tingkat GSM',
                    'HARDWARE_KEY'=> 'Kunci Perangkat Keras',
                    'HARSH_ACCELERATION'=> 'Akselerasi yang keras',
                    'HARSH_ACCELERATION_COUNT'=> 'Jumlah akselerasi yang keras',
                    'HARSH_ACCELERATION_SCORE'=> 'Skor akselerasi yang keras',
                    'HARSH_BRAKING'=> 'Pengereman yang keras',
                    'HARSH_BRAKING_COUNT'=> 'Hitungan pengereman yang keras',
                    'HARSH_BRAKING_SCORE'=> 'Skor pengereman yang keras',
                    'HARSH_CORNERING'=> 'Menikung tajam',
                    'HARSH_CORNERING_COUNT'=> 'Jumlah saat menikung yang sulit',
                    'HARSH_CORNERING_SCORE'=> 'Skor menikung tajam',
                    'HEADING_FONT_COLOR'=> 'Warna font judul',
                    'HECTARES'=> 'Hektar',
                    'HELLO'=> 'Halo',
                    'HELP'=> 'Bantuan',
                    'HELP_PAGE_URL'=> 'URL tombol halaman bantuan',
                    'HIDE'=> 'Sembunyikan',
                    'HIDE_UNUSED_PROTOCOLS'=> 'Sembunyikan protokol yang tidak digunakan',
                    'HIGH'=> 'High',
                    'HIGHEST_SCORE'=> 'Skor tertinggi',
                    'HIGHEST_VALUE'=> 'Nilai tertinggi',
                    'HISTORY'=> 'History',
                    'HISTORY_ROUTE_COLOR'=> 'Warna rute riwayat',
                    'HISTORY_ROUTE_DATA_LIST'=> 'Daftar data rute riwayat',
                    'HISTORY_ROUTE_HIGHLIGHT_COLOR'=> 'Warna sorotan rute sejarah',
                    'HOLD_CTRL_TO_SELECT_MULTIPLE_ITEMS'=> 'Tahan \'Ctrl\' untuk memilih beberapa item',
                    'HORIZONTAL_DIALOG_POSITION'=> 'Posisi dialog horizontal',
                    'HTTP_FULL_ADDRESS_HERE'=> 'http=> // full_address_here',
                    'ICON'=> 'Ikon',
                    'ICON_SIZE_SHOULD_BE_32_32'=> 'Ukuran ikon harus 32 x 32 px.',
                    'IDLE'=> 'Diam',
                    'ID_NUMBER'=> 'Nomor ID',
                    'IF_SENSOR_0'=> 'Jika sensor \'0\' (teks)',
                    'IF_SENSOR_1'=> 'Jika sensor \'1\' (teks)',
                    'IGNITION'=> 'Pengapian',
                    'IGNITION_ACC'=> 'Pengapian (ACC)',
                    'IGNITION_GRAPH'=> 'Grafik pengapian',
                    'IGNITION_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor pengapian sudah tersedia.',
                    'IGNORE_EMPTY_REPORTS'=> 'Abaikan laporan kosong',
                    'IGNORE_FUEL_CONSUMPTION_DURING_STOPS'=> 'Ignore fuel consumption during stops',
                    'IGNORE_IF_IGNITION_IS_OFF'=> 'Abaikan jika kunci kontak dimatikan',
                    'IMAGES'=> 'Images',
                    'IMAGE_GALLERY'=> 'Galeri gambar',
                    'IMAGE_SIZE_SHOULD_NOT_BE_BIGGER_THAN_640_480'=> 'Ukuran gambar tidak boleh lebih besar dari 640 x 480 px.',
                    'IMAGE_UPLOADED_SUCCESSFULLY'=> 'Gambar berhasil diunggah.',
                    'IMAGE_UPLOAD_FAILED'=> 'Pengunggahan gambar gagal.',
                    'IMAGE_WIGTH_OR_HEIGHT_DOES_NOT_MEET_REQUIREMENTS'=> 'Lebar atau tinggi gambar tidak memenuhi persyaratan.',
                    'IMEI'=> 'IMEI',
                    'IMEI_IS_NOT_VALID'=> 'IMEI tidak sah.',
                    'IMPORT'=> 'Impor',
                    'IMPORT_EXPORT'=> 'Impor / Ekspor',
                    'IMPORT_EXPORT_TOOLS'=> 'Impor dan ekspor alat',
                    'IMPORT_FILE_IS_TOO_BIG'=> 'File impor terlalu besar.',
                    'INACTIVE_OBJECTS'=> 'Objek tidak aktif',
                    'INCORRECT_PASSWORD'=> 'Sandi salah.',
                    'INFO'=> 'Info',
                    'INFORMATION'=> 'Informasi',
                    'INTERVAL_VALUE_SHOULD_BE_GREATER_THAN_LEFT_VALUE'=> 'Nilai interval harus lebih besar dari nilai kiri.',
                    'INVALID_DST_INTERVAL'=> 'Interval waktu musim panas (DST) tidak valid.',
                    'INVALID_FILE_FORMAT'=> 'Format file tidak valid.',
                    'IN_PROGRESS'=> 'Dalam proses',
                    'IN_SELECTED_ROUTES'=> 'Dalam rute yang dipilih',
                    'IN_SELECTED_ZONES'=> 'Di zona yang dipilih',
                    'IP'=> 'IP',
                    'ITEMS'=> 'Item',
                    'KEEP_HISTORY_PERIOD'=> 'Simpan periode sejarah (hari)',
                    'KILOMETER'=> 'Kilometer',
                    'KML'=> 'KML',
                    'KML_ALLOWS_TO_IMPORT_AND_VISUALIZE_ADDITIONAL_DATA'=> 'KML memungkinkan untuk mengimpor dan memvisualisasikan data tambahan pada peta.',
                    'KML_FILE'=> 'File KML',
                    'KML_PROPERTIES'=> 'Properti KML',
                    'KML_SIZE_LIMIT_IS_REACHED'=> 'Batas ukuran KML tercapai.',
                    'LANDSCAPE'=> 'Pemandangan',
                    'LANGUAGE'=> 'Bahasa',
                    'LANGUAGES'=> 'Bahasa',
                    'LANGUAGE_PROPERTIES'=> 'Properti bahasa',
                    'LAST_CONNECTION'=> 'Koneksi terakhir',
                    'LAST_HOUR'=> 'Satu jam terakhir',
                    'LAST_LOGIN_DAYS_AGO'=> 'Login terakhir (hari yang lalu)',
                    'LAST_MONTH'=> 'Bulan lalu',
                    'LAST_SERVICE'=> 'Layanan terakhir',
                    'LAST_WEEK'=> 'Minggu lalu',
                    'LATITUDE'=> 'Lintang',
                    'LATITUDE_IS_OUT_OF_RANGE'=> 'Garis lintang di luar jangkauan. Rentang yang valid adalah dari -90 hingga 90. ',
                    'LAYER'=> 'Lapisan',
                    'LAYERS'=> 'Lapisan',
                    'LEFT'=> 'Kiri',
                    'LEFT_PANEL'=> 'Panel kiri',
                    'LENGTH'=> 'Panjang',
                    'LIMITED'=> 'Terbatas',
                    'LITER'=> 'Liter',
                    'LIVE_TRAFFIC'=> 'Lalu lintas langsung',
                    'LIVE_TRAFFIC_FOR_THIS_MAP_IS_NOT_AVAILABLE'=> 'Lalu lintas langsung untuk peta ini tidak tersedia.',
                    'LOADING'=> 'Memuat ...',
                    'LOAD_GSR'=> 'Muat GSR',
                    'LOCATION'=> 'Lokasi',
                    'LOGBOOK'=> 'Buku Catatan',
                    'LOGIC'=> 'Logika',
                    'LOGIC_SENSORS'=> 'Sensor logika',
                    'LOGIN'=> 'Masuk',
                    'LOGIN_AS_USER'=> 'Masuk sebagai pengguna',
                    'LOGIN_BACKGROUND'=> 'Latar belakang login',
                    'LOGIN_BACKGROUND_SIZE_FORMAT'=> 'Latar belakang info masuk, ukuran 1920 x 1080 px, JPEG',
                    'LOGIN_DATA_WILL_BE_SENT_TO_EMAIL'=> 'Data login akan dikirim ke alamat email yang diberikan.',
                    'LOGIN_DETAILS'=> 'Detil login',
                    'LOGIN_DIALOG_URL'=> 'URL dialog Login',
                    'LOGIN_TIME'=> 'Waktu masuk',
                    'LOGO'=> 'Logo',
                    'LOGOUT'=> 'Keluar',
                    'LOGO_POSITION'=> 'Posisi logo',
                    'LOGO_SIZE_FORMAT'=> 'Logo, ukuran 250 x 56 px, PNG atau SVG',
                    'LOGO_SMALL_SIZE_FORMAT'=> 'Logo kecil, ukuran 32 x 32 px, PNG atau SVG',
                    'LOGS'=> 'Log',
                    'LOG_VIEWER'=> 'Penampil log',
                    'LONGITUDE'=> 'Garis Bujur',
                    'LONGITUDE_IS_OUT_OF_RANGE'=> 'Garis bujur di luar jangkauan. Rentang yang valid adalah dari -180 hingga 180. ',
                    'LOW'=> 'Rendah',
                    'LOWEST_HISTORY_PERIOD_IS_30_DAYS'=> 'Periode sejarah terendah adalah 30 hari. Pengaturan tidak disimpan. ',
                    'LOWEST_SCORE'=> 'Nilai terendah',
                    'LOWEST_VALUE'=> 'Nilai terendah',
                    'LOW_BATTERY'=> 'Baterai lemah',
                    'LOW_DC'=> 'DC Rendah',
                    'MAIN'=> 'Utama',
                    'MAINTENANCE'=> 'Pemeliharaan',
                    'MANAGER'=> 'Manajer',
                    'MANAGER_PRIVILEGES'=> 'Hak istimewa manajer',
                    'MANAGE_SERVER'=> 'Kelola server',
                    'MAN_DOWN'=> 'Man down',
                    'MAP'=> 'Peta',
                    'MAPBOX_GEOCODER_KEY'=> 'Kunci Geocoder Kotak Peta (dapatkan di sini=> https=>//www.mapbox.com)',
                    'MAPBOX_MAPS_KEY'=> 'Kunci Peta Kotak Peta (dapatkan di sini=> https=>//mapbox.com)',
                    'MAPS'=> 'Peta',
                    'MAP_ICON_SIZE'=> 'Ukuran ikon peta',
                    'MAP_LAYER_ZOOM_POSITION_AFTER_LOGIN'=> 'Map layer, zoom dan posisi setelah pengguna login',
                    'MAP_LICENSE_KEYS'=> 'Petakan kunci lisensi',
                    'MAP_REPORTS'=> 'Laporan peta',
                    'MAP_ROUTING'=> 'Perutean peta',
                    'MAP_STARTUP_POSITION'=> 'Petakan posisi awal',
                    'MARKERS'=> 'Penanda',
                    'MARKERS_INSTEAD_OF_ADDRESSES'=> 'Markers instead of addresses',
                    'MARKERS_ROUTES_ZONES_FOUND'=> '%s penanda, %s rute, %s zona ditemukan.',
                    'MARKER_IN'=> 'Marker in',
                    'MARKER_IN_OUT'=> 'Marker in/out',
                    'MARKER_IN_OUT_WITH_GEN_INFORMATION'=> 'Marker in/out with gen. information',
                    'MARKER_LIMIT_IS_REACHED'=> 'Batas penanda tercapai.',
                    'MARKER_NAME'=> 'Marker name',
                    'MARKER_OUT'=> 'Marker out',
                    'MARKER_POSITION'=> 'Marker position',
                    'MARKER_PROPERTIES'=> 'Properti penanda',
                    'MARKER_VISIBLE'=> 'Penanda terlihat',
                    'MAX_API_DAILY'=> 'Maks. jumlah panggilan API (harian) ',
                    'MAX_EMAILS_DAILY'=> 'Maks. jumlah email (harian) ',
                    'MAX_HDOP_VALUE'=> 'Maks. nilai hdop (menghilangkan drifting, default 3) ',
                    'MAX_MARKERS'=> 'Maks. jumlah penanda ',
                    'MAX_ROUTES'=> 'Maks. jumlah rute ',
                    'MAX_SMS_DAILY'=> 'Maks. nomor SMS (harian) ',
                    'MAX_WEBHOOK_DAILY'=> 'Maks. jumlah Webhook (harian) ',
                    'MAX_ZONES'=> 'Maks. jumlah zona ',
                    'MEASUREMENT'=> 'Pengukuran',
                    'MEASUREMENT_AND_COST'=> 'Pengukuran dan biaya',
                    'MEASURE_AREA'=> 'Ukur luas',
                    'MEASURE_ROUTE_LENGTH_USING'=> 'Ukur panjang rute menggunakan',
                    'MEDIA_REPORTS'=> 'Laporan media',
                    'MENU'=> 'Menu',
                    'MESSAGE'=> 'Pesan',
                    'MESSAGES'=> 'Messages',
                    'MESSAGE_TO_EMAIL'=> 'Pesan ke email, untuk beberapa email pisahkan dengan koma',
                    'MILE'=> 'Mil',
                    'MILEAGE'=> 'Jarak Tempuh',
                    'MILEAGE_DAILY'=> 'Jarak tempuh (harian)',
                    'MIN_DIFF_BETWEEN_POINTS'=> 'Min. perbedaan antara titik trek (menghilangkan drifting, default 0,0005) ',
                    'MIN_FF'=> 'Min. perbedaan bahan bakar untuk mendeteksi pengisian bahan bakar (default 10) ',
                    'MIN_FT'=> 'Min. perbedaan bahan bakar untuk mendeteksi pencurian bahan bakar (default 10) ',
                    'MIN_FUEL_SPEED'=> 'Min. kecepatan deteksi perbedaan bahan bakar dalam km / jam (default 10) ',
                    'MIN_GPSLEV_VALUE'=> 'Min. nilai gpslev (menghilangkan drifting, default 5) ',
                    'MIN_IDLE_SPEED'=> 'Min. kecepatan mesin idle dalam km / jam (mempengaruhi status mesin idle, default 3) ',
                    'MIN_MOVING_SPEED'=> 'Min. kecepatan bergerak dalam km / jam (mempengaruhi berhenti dan akurasi lintasan, default 6) ',
                    'MOBILE_APPLICATION'=> 'Aplikasi seluler',
                    'MOBILE_VERSION'=> 'Versi seluler',
                    'MODEL'=> 'Model',
                    'MODIFIED'=> 'Dimodifikasi',
                    'MONTH'=> 'Bulan',
                    'MONTHLY'=> 'Bulanan',
                    'MONTHS'=> 'Bulan',
                    'MONTH_APRIL'=> 'April',
                    'MONTH_APRIL_S'=> 'Apr',
                    'MONTH_AUGUST'=> 'Agustus',
                    'MONTH_AUGUST_S'=> 'Agustus',
                    'MONTH_DECEMBER'=> 'Desember',
                    'MONTH_DECEMBER_S'=> 'Des',
                    'MONTH_FEBRUARY'=> 'Februari',
                    'MONTH_FEBRUARY_S'=> 'Feb',
                    'MONTH_JANUARY'=> 'Januari',
                    'MONTH_JANUARY_S'=> 'Jan',
                    'MONTH_JULY'=> 'Juli',
                    'MONTH_JULY_S'=> 'Jul',
                    'MONTH_JUNE'=> 'Juni',
                    'MONTH_JUNE_S'=> 'Jun',
                    'MONTH_MARCH'=> 'Maret',
                    'MONTH_MARCH_S'=> 'Mar',
                    'MONTH_MAY'=> 'Mei',
                    'MONTH_MAY_S'=> 'Mei',
                    'MONTH_NOVEMBER'=> 'November',
                    'MONTH_NOVEMBER_S'=> 'Nov',
                    'MONTH_OCTOBER'=> 'Oktober',
                    'MONTH_OCTOBER_S'=> 'Okt',
                    'MONTH_SEPTEMBER'=> 'September',
                    'MONTH_SEPTEMBER_S'=> 'Sep',
                    'MORE_THAN_DAYS'=> 'Lebih dari (hari)',
                    'MOVE_DURATION'=> 'Durasi perpindahan',
                    'MOVING'=> 'Pindah',
                    'MOVING_ARROW_COLOR'=> 'Warna panah bergerak',
                    'MOVING_COLOR'=> 'Memindahkan warna',
                    'MY_ACCOUNT'=> 'Akun saya',
                    'NA'=> 'n / a',
                    'NAME'=> 'Nama',
                    'NAME_CANT_BE_EMPTY'=> 'Nama tidak boleh kosong.',
                    'NAME_SURNAME'=> 'Nama, nama belakang',
                    'NAME_VISIBLE'=> 'Nama terlihat',
                    'NAUTICAL_MILE'=> 'Mil laut',
                    'NEAREST_MARKER'=> 'Penanda terdekat',
                    'NEAREST_ZONE'=> 'Zona terdekat',
                    'NET_PROTOCOL'=> 'Net. protokol',
                    'NEW'=> 'New',
                    'NEWLY_ADDED_OBJECTS_CAN_BE_USED_FOR'=> 'Objek yang baru ditambahkan dapat digunakan selama %s hari gratis.',
                    'NEW_CHAT_MESSAGE_SOUND_ALERT'=> 'Peringatan suara pesan obrolan baru',
                    'NEW_EVENT'=> 'Acara baru',
                    'NEW_EVENT_WAS_RECEIVED'=> 'Acara baru telah diterima.',
                    'NEW_LOGIN_DATA_WILL_BE_SENT_TO_EMAIL'=> 'Data login baru akan dikirim ke alamat email yang diberikan.',
                    'NEW_MARKER'=> 'Penanda baru',
                    'NEW_PASSWORD'=> 'Kata sandi baru',
                    'NEW_ROUTE'=> 'Rute baru',
                    'NEW_TASK'=> 'Tugas baru',
                    'NEW_USER_REGISTRATION_ON_THIS_SERVER_IS_CLOSED'=> 'Pendaftaran pengguna baru di server ini ditutup. Pilih yang lain dari daftar di bawah ini. ',
                    'NEW_ZONE'=> 'Zona baru',
                    'NIGHT_ENDS'=> 'Malam berakhir',
                    'NIGHT_STARTS'=> 'Malam dimulai',
                    'NO'=> 'No',
                    'NONE'=> 'Tidak ada',
                    'NORMAL'=> 'Normal',
                    'NOTHING_HAS_BEEN_FOUND_ON_YOUR_REQUEST'=> 'Tidak ada yang ditemukan atas permintaan Anda.',
                    'NOTHING_HAS_BEEN_FOUND_TO_IMPORT'=> 'Tidak ada yang ditemukan untuk diimpor.',
                    'NOTHING_SELECTED'=> 'Tidak ada yang dipilih',
                    'NOTIFICATIONS'=> 'Notifications',
                    'NO_BILLING_PLANS_FOUND'=> 'Tidak ada paket penagihan ditemukan.',
                    'NO_CONNECTION_ARROW_COLOR'=> 'Tidak ada warna panah koneksi',
                    'NO_CONNECTION_COLOR'=> 'Tidak ada warna koneksi',
                    'NO_DATA'=> 'Tidak ada data',
                    'NO_DATA_HAS_BEEN_COLLECTED_YET'=> 'Belum ada data yang dikumpulkan.',
                    'NO_DATA_HAS_BEEN_RECEIVED_YET'=> 'Belum ada data yang diterima dari perangkat GPS.',
                    'NO_DRIVER'=> 'Tidak ada driver',
                    'NO_EVENT_SELECTED'=> 'Tidak ada kejadian yang dipilih.',
                    'NO_HISTORY_LOADED'=> 'Tidak ada riwayat yang dimuat.',
                    'NO_ITEMS'=> 'Tidak ada item',
                    'NO_ITEMS_SELECTED'=> 'Tidak ada item dipilih.',
                    'NO_MANAGER'=> 'Tidak ada manajer',
                    'NO_MATCHES_FOUND'=> 'Tidak ada yang cocok',
                    'NO_MESSAGES'=> 'Tidak ada pesan',
                    'NO_OBJECTS'=> 'Tidak ada objek',
                    'NO_OBJECT_SELECTED'=> 'Tidak ada objek yang dipilih.',
                    'NO_RECORDS_TO_VIEW'=> 'Tidak ada record untuk dilihat',
                    'NO_REPLY_EMAIL_ADDRESS'=> 'Tidak ada alamat email balasan',
                    'NO_SOUND'=> 'Tidak ada suara',
                    'NO_TRAILER'=> 'Tidak ada cuplikan',
                    'NUMBER'=> 'Nomor',
                    'NUMBER_OF_OBJECTS'=> 'Jumlah objek',
                    'OBJECT'=> 'Object',
                    'OBJECTS'=> 'Objek',
                    'OBJECTS_ACTIVATED_SUCCESSFULLY'=> 'Objek berhasil diaktifkan.',
                    'OBJECTS_FOUND'=> '%s objek ditemukan.',
                    'OBJECTS_TILL'=> 'objek hingga',
                    'OBJECT_ACTIVATION_FAILED'=> 'Aktivasi objek gagal.',
                    'OBJECT_ARROW_COLOR'=> 'Warna panah objek',
                    'OBJECT_CONNECTION_TIMEOUT_RESETS_CONNECTION_AND_GPS_STATUS'=> 'Batas waktu koneksi objek, reset koneksi dan status GPS',
                    'OBJECT_CONTROL'=> 'Kontrol objek',
                    'OBJECT_CONTROL_DEFAULT_TEMPLATES'=> 'Object control default templates',
                    'OBJECT_DATA_LIST'=> 'Daftar data objek',
                    'OBJECT_DATE_LIMIT'=> 'Batas tanggal objek',
                    'OBJECT_DATE_LIMIT_DAYS_AFTER_REGISTRATION'=> 'Batas tanggal objek (hari setelah pendaftaran akun)',
                    'OBJECT_DETAILS_POPUP_ON_CLUSTER_MOUSE_HOVER'=> 'Munculan detail objek saat arahkan mouse ke cluster',
                    'OBJECT_DRIVER_LIST'=> 'Daftar driver objek',
                    'OBJECT_DRIVER_PROPERTIES'=> 'Properti driver objek',
                    'OBJECT_EXPIRATION_DATE_IS_TOO_LATE'=> 'Tanggal kedaluwarsa objek sudah terlambat.',
                    'OBJECT_EXPIRATION_DATE_MUST_BE_SET'=> 'Tanggal kedaluwarsa objek harus disetel.',
                    'OBJECT_GROUP_LIST'=> 'Daftar grup objek',
                    'OBJECT_GROUP_PROPERTIES'=> 'Properti grup objek',
                    'OBJECT_INFO'=> 'Informasi objek',
                    'OBJECT_LIMIT'=> 'Batas objek',
                    'OBJECT_LIMIT_IS_REACHED'=> 'Batas objek tercapai.',
                    'OBJECT_LIST'=> 'Daftar objek',
                    'OBJECT_LIST_COLOR'=> 'Warna daftar objek',
                    'OBJECT_NAME'=> 'Nama objek',
                    'OBJECT_PASSENGER_LIST'=> 'Daftar penumpang objek',
                    'OBJECT_PASSENGER_PROPERTIES'=> 'Properti objek penumpang',
                    'OBJECT_SIM_CARD_NUMBER_IS_NOT_SET'=> 'Nomor kartu SIM objek tidak diset.',
                    'OBJECT_TRAILER_LIST'=> 'Daftar cuplikan objek',
                    'OBJECT_TRAILER_PROPERTIES'=> 'Properti trailer objek',
                    'OBJECT_TRIAL_LIMIT_DAYS'=> 'Batas percobaan objek (hari)',
                    'ODOMETER'=> 'Odometer',
                    'ODOMETER_A'=> 'Odometer A',
                    'ODOMETER_B'=> 'Odometer B',
                    'ODOMETER_EXPIRED'=> 'Odometer kedaluwarsa',
                    'ODOMETER_INTERVAL'=> 'Interval odometer',
                    'ODOMETER_LEFT'=> 'Odometer tersisa',
                    'ODOMETER_REACHES'=> 'Odometer mencapai',
                    'ODOMETER_SENSOR'=> 'Sensor odometer',
                    'ODOMETER_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor odometer sudah tersedia.',
                    'ODOMETER_TOP_10'=> '10 Teratas Odometer',
                    'OFF'=> 'Mati',
                    'OFFLINE'=> 'Offline',
                    'OK'=> 'OK',
                    'OLD_PASSWORD'=> 'Kata sandi lama',
                    'ON'=> 'On',
                    'ONCE'=> 'Once',
                    'ONE_TIME'=> 'Satu kali',
                    'ONLINE'=> 'Online',
                    'OPEN'=> 'Buka',
                    'OPEN_AFTER_LOGIN'=> 'Buka setelah login',
                    'OR'=> 'or',
                    'OSMR_SERVICE_URL'=> 'URL layanan OSMR',
                    'OTHER'=> 'Lainnya',
                    'OUTPUT_OFF'=> 'Keluaran mati',
                    'OUTPUT_ON'=> 'Keluaran aktif',
                    'OUT_OF_SELECTED_ROUTES'=> 'Dari rute yang dipilih',
                    'OUT_OF_SELECTED_ZONES'=> 'Di luar zona yang dipilih',
                    'OVERSPEED'=> 'Kecepatan berlebihan',
                    'OVERSPEEDS'=> 'Kecepatan berlebih',
                    'OVERSPEED_COUNT'=> 'Jumlah kecepatan berlebih',
                    'OVERSPEED_COUNT_MERGED'=> 'Jumlah kecepatan berlebih (digabungkan)',
                    'OVERSPEED_DURATION'=> 'Durasi kecepatan berlebih',
                    'OVERSPEED_POSITION'=> 'Posisi kecepatan berlebih',
                    'OVERSPEED_SCORE'=> 'Skor kecepatan berlebih',
                    'PAGE'=> 'Halaman',
                    'PAGE_AFTER_ADMIN_OR_MANAGER_LOGIN'=> 'Halaman setelah Administrator atau Manajer masuk',
                    'PAGE_GENERATOR_TAG'=> 'Tag pembuat halaman',
                    'PAN_LEFT'=> 'Pan kiri',
                    'PAN_RIGHT'=> 'Pan right',
                    'PARAMETER'=> 'Parameter',
                    'PARAMETERS'=> 'Parameter',
                    'PARAMETERS_AND_SENSORS'=> 'Parameter dan sensor',
                    'PASSENGER'=> 'Penumpang',
                    'PASSENGERS'=> 'Penumpang',
                    'PASSENGERS_FOUND'=> '%s penumpang ditemukan.',
                    'PASSENGER_ASSIGN'=> 'Penugasan penumpang',
                    'PASSENGER_ASSIGN_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor penetapan penumpang sudah tersedia.',
                    'PASSENGER_INFO'=> 'Informasi penumpang',
                    'PASSWORD'=> 'Sandi',
                    'PASSWORD_CANT_BE_EMPTY'=> 'Kata sandi tidak boleh kosong.',
                    'PASSWORD_LENGHT_AT_LEAST'=> 'Panjang sandi minimal 6 karakter.',
                    'PASSWORD_SPACE_CHARACTERS'=> 'Kata sandi tidak boleh mengandung karakter spasi.',
                    'PAUSE'=> 'Pause',
                    'PAYPAL_ACCOUNT'=> 'Akun PayPal',
                    'PAYPAL_CLIENT_ID'=> 'PayPal Client ID',
                    'PAYPAL_CUSTOM'=> 'PayPal khusus',
                    'PAYPAL_GATEWAY'=> 'Gerbang PayPal',
                    'PAYPAL_IPN_URL'=> 'URL IPN PayPal',
                    'PAYPAL_V2_GATEWAY'=> 'PayPal v2 gateway',
                    'PER'=> 'per',
                    'PERCENTAGE'=> 'Persentase',
                    'PERIOD'=> 'Periode',
                    'PHONE'=> 'Phone',
                    'PHONE_CANT_BE_EMPTY'=> 'Telepon tidak boleh kosong.',
                    'PHONE_NUMBER_1'=> 'Nomor telepon 1',
                    'PHONE_NUMBER_2'=> 'Nomor telepon 2',
                    'PHONE_NUMBER_WITH_CODE'=> 'Nomor telepon dengan kode',
                    'PHOTO_REQUEST'=> 'Permintaan foto',
                    'PICKPOINT_GEOCODER_KEY'=> 'Kunci Geocoder PickPoint (dapatkan di sini=> https=>//pickpoint.io)',
                    'PLACES'=> 'Tempat',
                    'PLACES_GROUP_PROPERTIES'=> 'Properti grup tempat',
                    'PLACE_MARKER_ON_MAP_BEFORE_SAVING'=> 'Tempatkan penanda pada peta sebelum menyimpan.',
                    'PLAN'=> 'Rencana',
                    'PLAN_VERIFICATION_FAILED'=> 'Verifikasi rencana gagal.',
                    'PLATE'=> 'Piring',
                    'PLATE_NUMBER'=> 'Nomor pelat',
                    'PLAY'=> 'Play',
                    'PLEASE_CHECK_SERVER_EMAIL_SMTP_SETTINGS'=> 'Silakan periksa pengaturan SMTP email server.',
                    'PLEASE_CHECK_YOUR_EMAIL'=> 'Silakan periksa email Anda.',
                    'PLEASE_LOGIN_INTO_ACCOUNT_FOR_MORE_DETAILS'=> 'Silakan masuk ke akun untuk lebih jelasnya.',
                    'PLEASE_PURCHASE_ACCESS_TO'=> 'Jika Anda ingin terus menggunakan layanan kami, silakan beli akses ke',
                    'PLEASE_SELECT_KML_FILE'=> 'Silakan pilih file KML.',
                    'PLEASE_SET_SMTP_SERVER_SETTINGS_IN_MANAGE_SERVER_SECTION'=> 'Please set SMTP server settings in Manage server section, otherwise new user registration and event notifications will not work. Would you like to open it now?',
                    'PLEASE_WAIT'=> 'Mohon tunggu ...',
                    'POLYGON'=> 'Poligon',
                    'POPUP'=> 'Munculan',
                    'PORT'=> 'Pelabuhan',
                    'PORTRAIT'=> 'Portrait',
                    'POSITION'=> 'Posisi',
                    'POSITION_A'=> 'Posisi A',
                    'POSITION_B'=> 'Posisi B',
                    'POSITION_INTERVAL'=> 'Interval posisi',
                    'POST_CODE'=> 'Kode pos',
                    'POWER_CUT'=> 'Listrik mati',
                    'PRICE'=> 'Harga',
                    'PRINT_MAP'=> 'Cetak peta',
                    'PRIORITY'=> 'Prioritas',
                    'PRIVILEGES'=> 'Hak Istimewa',
                    'PROTOCOL'=> 'Protokol',
                    'PROTOCOLS'=> 'Protokol',
                    'PROXIMITY'=> 'Proximity',
                    'PURCHASE'=> 'Beli',
                    'PURCHASE_PLAN'=> 'Beli paket',
                    'PUSH_NOTIFICATION'=> 'Pemberitahuan push',
                    'PUSH_NOTIFICATIONS'=> 'Pemberitahuan push',
                    'PUSH_NOTIFICATIONS_INTERVAL'=> 'Interval pemberitahuan push',
                    'QUANTITY'=> 'Kuantitas',
                    'RADIUS'=> 'Radius',
                    'RAG'=> 'RAG',
                    'RATES'=> 'Rates',
                    'RECOVER'=> 'Pulihkan',
                    'RECOVERY_LINK_EXPIRED'=> 'Tautan pemulihan kedaluwarsa.',
                    'RECOVERY_LINK_SENT'=> 'Tautan pemulihan dikirim.',
                    'RECOVER_FROM_IMEI'=> 'Pulihkan dari IMEI',
                    'RECOVER_PASSWORD'=> 'Pulihkan kata sandi',
                    'RECOVER_PLAN_FROM_OBJECT_BACK_TO_BILLING'=> 'Pulihkan rencana dari objek kembali ke penagihan setelah dihapus dari akun pengguna',
                    'RECURRING'=> 'Berulang',
                    'REGISTER'=> 'Daftar',
                    'REGISTRATION_SUCCESSFUL'=> 'Pendaftaran berhasil.',
                    'REG_TIME'=> 'Reg. waktu',
                    'RELATIVE'=> 'Relative',
                    'RELOAD'=> 'Muat ulang',
                    'REMEMBER_LAST'=> 'Ingat yang terakhir',
                    'REMEMBER_ME'=> 'Ingat saya',
                    'REMIND_USER_ABOUT_EXPIRING_ACCOUNT'=> 'Ingatkan pengguna tentang kedaluwarsa akun (hari sebelumnya)',
                    'REMIND_USER_ABOUT_EXPIRING_OBJECTS'=> 'Ingatkan pengguna tentang kedaluwarsa objek (hari sebelumnya)',
                    'REPEATED_PASSWORD_IS_INCORRECT'=> 'Sandi yang berulang salah.',
                    'REPEAT_NEW_PASSWORD'=> 'Ulangi sandi baru',
                    'REPORT'=> 'Laporkan',
                    'REPORTS'=> 'Laporan',
                    'REPORT_PROPERTIES'=> 'Laporkan properti',
                    'RESET'=> 'Setel Ulang',
                    'RESET_SERVER_API_KEY'=> 'Setel Ulang Kunci API Server',
                    'RESTRICT_SERVER_API_ACCESS_BY_IP'=> 'Batasi akses API server dengan IP, untuk beberapa yang dipisahkan dengan koma',
                    'RESULT'=> 'Hasil',
                    'RFID_AND_IBUTTON_LOGBOOK'=> 'Buku catatan RFID dan iButton',
                    'RFID_IBUTTON_BLUE_ID'=> 'RFID, iButton, Blue ID',
                    'ROUTE'=> 'Rute',
                    'ROUTES'=> 'Rute',
                    'ROUTES_WITH_STOPS'=> 'Rute dengan perhentian',
                    'ROUTE_BETWEEN_POINTS'=> 'Rute antar titik',
                    'ROUTE_CANT_HAVE_MORE_THAN_NUM_POINTS'=> 'Rute tidak boleh memiliki lebih dari 200 titik.',
                    'ROUTE_DATA_WITH_SENSORS'=> 'Route data with sensors',
                    'ROUTE_END'=> 'Rute berakhir',
                    'ROUTE_IN'=> 'Rute masuk',
                    'ROUTE_LENGTH'=> 'Panjang rute',
                    'ROUTE_LIMIT_IS_REACHED'=> 'Batas rute tercapai.',
                    'ROUTE_OUT'=> 'Rute keluar',
                    'ROUTE_PROPERTIES'=> 'Properti rute',
                    'ROUTE_START'=> 'Rute dimulai',
                    'ROUTE_TO_POINT'=> 'Rute ke titik',
                    'ROUTE_VISIBLE'=> 'Rute terlihat',
                    'RULER'=> 'Penguasa',
                    'SAME_SOURCE_ITEM_AVAILABLE'=> 'Item sumber yang sama telah tersedia.',
                    'SAVE'=> 'Save',
                    'SAVE_AS_ROUTE'=> 'Simpan sebagai rute',
                    'SCHEDULE'=> 'Jadwal',
                    'SCHEDULED'=> 'Dijadwalkan',
                    'SCHEDULE_PROPERTIES'=> 'Jadwalkan properti',
                    'SCHEDULE_REPORTS'=> 'Jadwalkan laporan',
                    'SEARCH'=> 'Cari',
                    'SECURITY_CODE_IS_INCORRECT'=> 'Kode keamanan salah.',
                    'SEEN'=> 'terlihat',
                    'SELECTED'=> 'Dipilih',
                    'SELECTED_USER_ACCOUNTS'=> 'Akun pengguna yang dipilih',
                    'SELECT_ALL'=> 'Pilih semua',
                    'SELECT_ICON'=> 'Pilih ikon',
                    'SEND'=> 'Kirim',
                    'SENDING_FINISHED'=> 'Pengiriman selesai.',
                    'SENDING_PLEASE_WAIT'=> 'Mengirim, harap tunggu ...',
                    'SEND_COMMAND'=> 'Kirim perintah',
                    'SEND_CREDENTIALS'=> 'Kirim kredensial',
                    'SEND_DB_BACKUP_TO_EMAIL_AT_SET_UTC_TIME'=> 'Kirim cadangan DB ke e-mail pada waktu UTC (tanpa data riwayat)',
                    'SEND_EMAIL'=> 'Kirim e-mail',
                    'SEND_TO'=> 'Kirim ke',
                    'SEND_URL'=> 'Kirim URL',
                    'SEND_VIA_EMAIL'=> 'Kirim lewat e-mail',
                    'SEND_VIA_SMS'=> 'Kirim lewat SMS',
                    'SEND_WEBHOOK'=> 'Kirim webhook',
                    'SENSOR'=> 'Sensor',
                    'SENSORS'=> 'Sensors',
                    'SENSORS_FOUND'=> '%s sensor ditemukan.',
                    'SENSOR_GRAPH'=> 'Grafik sensor',
                    'SENSOR_PARAMETERS_ARE_NOT_DETECTED_FOR_THIS_GPS_DEVICE'=> 'Parameter sensor belum terdeteksi untuk perangkat GPS ini.',
                    'SENSOR_PROPERTIES'=> 'Properti sensor',
                    'SENSOR_RESULT_PREVIEW'=> 'Pratinjau hasil sensor',
                    'SERVER'=> 'Server',
                    'SERVER_API_KEY'=> 'Kunci API server',
                    'SERVER_CLEANUP'=> 'Pembersihan server',
                    'SERVER_CLEANUP_DB_JUNK'=> 'Hapus catatan sampah database',
                    'SERVER_CLEANUP_OBJECTS_NOT_ACTIVATED'=> 'Hapus objek yang tidak diaktifkan',
                    'SERVER_CLEANUP_OBJECTS_NOT_USED'=> 'Hapus objek yang tidak digunakan dalam akun pengguna manapun',
                    'SERVER_CLEANUP_USERS'=> 'Hapus akun pengguna yang tidak mempunyai objek aktif',
                    'SERVER_IP'=> 'IP Server',
                    'SERVER_PORTS'=> 'PORTS Server',
                    'SERVER_SMS_GATEWAY'=> 'Gateway SMS Server',
                    'SERVICE'=> 'Layanan',
                    'SERVICES_FOUND'=> '%s layanan ditemukan.',
                    'SERVICE_PROPERTIES'=> 'Properti layanan',
                    'SESSION_HAS_EXPIRED'=> 'Sesi telah kedaluwarsa. Harap masuk lagi. ',
                    'SET'=> 'Set',
                    'SETTINGS'=> 'Pengaturan',
                    'SETTINGS_NOT_SAVED'=> 'Pengaturan tidak disimpan.',
                    'SETUP'=> 'Pengaturan',
                    'SET_EXPIRATION'=> 'Atur kedaluwarsa',
                    'SET_SELECTED'=> 'Set dipilih',
                    'SET_TO_ALL'=> 'Setel ke semua',
                    'SHARED_POSITION_SESSION_HAS_EXPIRED'=> 'Sesi posisi bersama telah kedaluwarsa.',
                    'SHARE_POSITION'=> 'Bagikan posisi',
                    'SHARE_POSITION_PROPERTIES'=> 'Bagikan properti posisi',
                    'SHOCK'=> 'Shock',
                    'SHOP_PAGE_URL'=> 'URL halaman toko',
                    'SHORT'=> 'Pendek',
                    'SHOW'=> 'Show',
                    'SHOWN_ICON_ON_MAP'=> 'Ikon yang ditampilkan di peta',
                    'SHOW_ABOUT_BUTTON'=> 'Tampilkan tentang tombol',
                    'SHOW_ADDRESSES'=> 'Tampilkan alamat',
                    'SHOW_COORDINATES'=> 'Tampilkan koordinat',
                    'SHOW_EVENT'=> 'Tampilkan acara',
                    'SHOW_HELP_PAGE_BUTTON'=> 'Tampilkan tombol halaman bantuan',
                    'SHOW_HIDE_ALL'=> 'Tampilkan / sembunyikan semua',
                    'SHOW_HIDE_PASSWORD'=> 'Tampilkan / sembunyikan sandi',
                    'SHOW_HIDE_PASSWORD_BUTTON'=> 'Tampilkan / sembunyikan tombol sandi',
                    'SHOW_HISTORY'=> 'Tampilkan sejarah',
                    'SHOW_LOGO'=> 'Tampilkan logo',
                    'SHOW_POINT'=> 'Tampilkan titik',
                    'SHOW_SIM_CARD_NUMBER'=> 'Show SIM card number',
                    'SHOW_TIME'=> 'Tampilkan waktu',
                    'SIDE_LEFT'=> 'Kiri',
                    'SIDE_RIGHT'=> 'Benar',
                    'SIGNAL_JAMMING'=> 'Sinyal macet',
                    'SIGNATURE'=> 'Tanda tangan',
                    'SIM_CARD_NUMBER'=> 'Nomor kartu SIM',
                    'SIZE_MB'=> 'Ukuran (MB)',
                    'SMS'=> 'SMS',
                    'SMS_DAILY'=> 'Jumlah SMS (harian)',
                    'SMS_GATEWAY'=> 'Gerbang SMS',
                    'SMS_GATEWAY_APP_URL'=> 'URL aplikasi SMS Gateway',
                    'SMS_GATEWAY_EXAMPLE'=> 'Contoh URL Gateway SMS=> http=>//SMS_GATEWAY/sendsms.php?username=USER&password=PASSWORD&number=%NUMBER%&message=%MESSAGE%',
                    'SMS_GATEWAY_EXPLANATION'=> 'SMS Gateway, yang dapat mengirim pesan melalui HTTP GET harus digunakan.',
                    'SMS_GATEWAY_IDENTIFIER'=> 'Pengenal SMS Gateway',
                    'SMS_GATEWAY_MOBILE_APPLICATION_EXPLANATION'=> 'Aplikasi seluler harus digunakan yang memungkinkan untuk menggunakan perangkat seluler sebagai SMS Gateway. Di bawah pengenal SMS Gateway harus dimasukkan dalam pengaturan aplikasi seluler. ',
                    'SMS_GATEWAY_NUMBER_FILTER'=> 'Filter nomor, untuk beberapa nomor pisahkan dengan koma',
                    'SMS_GATEWAY_TYPE'=> 'Jenis SMS Gateway',
                    'SMS_GATEWAY_URL'=> 'URL Gateway SMS',
                    'SMS_TEMPLATE'=> 'Templat SMS',
                    'SMS_TO_MOBILE_PHONE'=> 'SMS ke ponsel, untuk beberapa nomor ponsel pisahkan dengan koma',
                    'SMTP_AUTH'=> 'Otentikasi SMTP',
                    'SMTP_PASSWORD'=> 'Kata sandi SMTP',
                    'SMTP_SECURITY'=> 'Keamanan SMTP',
                    'SMTP_SERVER_HOST'=> 'Host server SMTP',
                    'SMTP_SERVER_PORT'=> 'Port server SMTP',
                    'SMTP_SERVER_SETTINGS_NOT_SET'=> 'SMTP server settings not set',
                    'SMTP_USERNAME'=> 'Nama pengguna SMTP',
                    'SNAP'=> 'Jepret',
                    'SOME_OBJECTS_WILL_EXPIRE_SOON'=> 'Beberapa aktivasi objek Anda akan segera berakhir.',
                    'SOME_OF_YOUR_OBJECTS_ACTIVATION_WILL_EXPIRE_SOON'=> 'Beberapa aktivasi objek Anda akan segera berakhir. Pergi ke pengaturan untuk lebih jelasnya. ',
                    'SOS'=> 'SOS',
                    'SOS_EVENT_ARROW_COLOR'=> 'Warna panah acara SOS',
                    'SOS_EVENT_COLOR'=> 'Warna acara SOS',
                    'SOUND_ALERT'=> 'Tanda suara',
                    'SOURCE'=> 'Sumber',
                    'SPEED'=> 'Kecepatan',
                    'SPEED_GRAPH'=> 'Grafik kecepatan',
                    'SPEED_LIMIT'=> 'Batas kecepatan',
                    'SPEED_LIMIT_CANT_BE_EMPTY'=> 'Batas kecepatan tidak boleh kosong.',
                    'SQ_FT'=> 'Kaki persegi',
                    'SQ_KM'=> 'Kilometer persegi',
                    'SQ_M'=> 'Meter persegi',
                    'SQ_MI'=> 'Mil persegi',
                    'START'=> 'Mulai',
                    'STARTUP_TAB'=> 'Tab Startup',
                    'START_TIME'=> 'Waktu mulai',
                    'STATUS'=> 'Status',
                    'STOLEN'=> 'Dicuri',
                    'STOP'=> 'Berhenti',
                    'STOPPED'=> 'Berhenti',
                    'STOPPED_ARROW_COLOR'=> 'Warna panah berhenti',
                    'STOPPED_COLOR'=> 'Menghentikan warna',
                    'STOPS'=> 'Berhenti',
                    'STOP_COUNT'=> 'Hentikan hitungan',
                    'STOP_DURATION'=> 'Durasi berhenti',
                    'STOP_POSITION'=> 'Posisi berhenti',
                    'STREET_VIEW'=> 'Tampilan Jalan',
                    'STREET_VIEW_NEW_WINDOW'=> 'Street View (jendela baru)',
                    'STRING'=> 'String',
                    'SUBJECT'=> 'Subjek',
                    'SUB_ACC'=> 'Sub acc.',
                    'SUB_ACCOUNT'=> 'Sub akun',
                    'SUB_ACCOUNTS'=> 'Sub akun',
                    'SUB_ACCOUNTS_CAN_SPLIT_THIS_ACCOUNT_INTO_MULTIPLE_SMALLER_ACCOUNTS'=> 'Sub akun dapat membagi akun ini menjadi beberapa akun yang lebih kecil dengan hak istimewa terbatas.',
                    'SUB_ACCOUNT_PROPERTIES'=> 'Properti sub-akun',
                    'SUMMER_RATE_L100KM'=> 'Tarif musim panas (kilometer per liter)',
                    'SUMMER_RATE_MPG'=> 'Tarif musim panas (mil per galon)',
                    'SUPER_ADMINISTRATOR'=> 'Administrator Super',
                    'SUPPLIER'=> 'Pemasok',
                    'SYSTEM'=> 'Sistem',
                    'SYSTEM_MESSAGE'=> 'Pesan sistem',
                    'SYSTEM_OBJECT_LIMIT_IS_REACHED'=> 'Batas objek sistem tercapai.',
                    'TACHOGRAPH'=> 'Takograf',
                    'TAIL'=> 'Ekor',
                    'TAIL_COLOR'=> 'Warna ekor',
                    'TAIL_POINTS_QUANTITY'=> 'Kuantitas poin ekor',
                    'TASK'=> 'Tugas',
                    'TASKS'=> 'Tugas',
                    'TASK_PROPERTIES'=> 'Properti tugas',
                    'TEMPERATURE'=> 'Suhu',
                    'TEMPERATURE_GRAPH'=> 'Grafik suhu',
                    'TEMPLATE'=> 'Templat',
                    'TEMPLATES'=> 'Templat',
                    'TEMPLATES_FOUND'=> '%s templat ditemukan.',
                    'TEMPLATE_ACCOUNT_RECOVER'=> 'Pulihkan detail akun',
                    'TEMPLATE_ACCOUNT_RECOVER_URL'=> 'Pulihkan URL konfirmasi akun',
                    'TEMPLATE_ACCOUNT_REGISTRATION'=> 'Pendaftaran akun',
                    'TEMPLATE_ACCOUNT_REGISTRATION_AU'=> 'Pendaftaran akun (akses sub-akun melalui URL)',
                    'TEMPLATE_DATABASE_BACKUP'=> 'Cadangan database',
                    'TEMPLATE_EVENT_EMAIL'=> 'Pemberitahuan acara melalui email (standar pengguna)',
                    'TEMPLATE_EVENT_SMS'=> 'Pemberitahuan acara melalui SMS (default pengguna)',
                    'TEMPLATE_EXPIRING_ACCOUNT'=> 'Akun kedaluwarsa',
                    'TEMPLATE_EXPIRING_OBJECTS'=> 'Objek dalam akun kedaluwarsa',
                    'TEMPLATE_PROPERTIES'=> 'Properti templat',
                    'TEMPLATE_SCHEDULE_REPORTS'=> 'Jadwalkan laporan',
                    'TEMPLATE_SHARE_POSITION_SU_EMAIL'=> 'Bagikan posisi melalui email (akses melalui URL)',
                    'TEMPLATE_SHARE_POSITION_SU_SMS'=> 'Bagikan posisi lewat SMS (akses lewat URL)',
                    'TEST'=> 'Test',
                    'TEXT'=> 'Teks',
                    'TEXT_REPORTS'=> 'Laporan teks',
                    'THEME'=> 'Tema',
                    'THEMES'=> 'Tema',
                    'THEME_PROPERTIES'=> 'Properti tema',
                    'THERE_ARE_INACTIVE_OBJECTS_IN_YOUR_ACCOUNT'=> 'Ada objek tidak aktif di akun Anda. Pergi ke pengaturan untuk lebih jelasnya. ',
                    'THERE_ARE_NO_VARIABLES_FOR_THIS_TEMPLATE'=> 'Tidak ada variabel untuk templat ini.',
                    'THERE_ARE_STILL_ACTIVE_OBJECTS'=> 'Masih ada objek aktif, periode aktivitasnya akan diperpanjang.',
                    'THERE_IS_NOTHING_TO_DELETE'=> 'Tidak ada yang perlu dihapus.',
                    'THERE_IS_NO_OBJECT_WITH_SUCH_IMEI'=> 'Tidak ada objek dengan IMEI seperti itu.',
                    'THERE_IS_NO_SUCH_OBJECT_IN_YOUR_ACCOUNT'=> 'Tidak ada objek seperti itu di akun Anda.',
                    'THIS_ACCOUNT_HAS_NO_PRIVILEGES_TO_DO_THAT'=> 'Akun ini tidak memiliki hak untuk melakukan itu.',
                    'THIS_ACCOUNT_IS_LOCKED'=> 'Akun ini dikunci.',
                    'THIS_EMAIL_ALREADY_EXISTS'=> 'Email ini sudah ada.',
                    'THIS_EMAIL_IS_NOT_REGISTERED'=> 'Alamat email ini tidak terdaftar.',
                    'THIS_EMAIL_IS_NOT_VALID'=> 'Email ini tidak sah.',
                    'THIS_IMEI_ALREADY_EXISTS'=> 'IMEI ini sudah ada.',
                    'THIS_MONTH'=> 'Bulan ini',
                    'THIS_URL_IS_NO_LONGER_VALID'=> 'URL ini tidak lagi valid.',
                    'THIS_USERNAME_ALREADY_EXISTS'=> 'Nama pengguna ini sudah ada.',
                    'THIS_USER_HAS_ADMIN_PRIVILEGES'=> 'Pengguna ini memiliki hak Administrator. Apakah Anda yakin ingin mengubahnya? ',
                    'THIS_USER_HAS_MANAGER_PRIVILEGES'=> 'Pengguna ini memiliki hak Manajer. Apakah Anda yakin ingin mengubahnya? ',
                    'THIS_USER_HAS_SUPER_ADMIN_PRIVILEGES'=> 'Pengguna ini memiliki hak istimewa Administrator Super. Apakah Anda yakin ingin mengubahnya? ',
                    'THIS_WEEK'=> 'Minggu ini',
                    'TIME'=> 'Waktu',
                    'TIMEZONE'=> 'Zona waktu',
                    'TIME_A'=> 'Waktu A',
                    'TIME_ADJ_EXPLANATION'=> 'Offset zona waktu - secara default harus disetel ke (UTC 0=>00), sesuaikan hanya jika tidak memungkinkan untuk menyetel zona waktu (UTC 0=>00) di sisi perangkat GPS',
                    'TIME_ADJ_WARNING'=> 'Mengubah offset zona waktu akan mempengaruhi data riwayat objek dan menghapus data posisi terakhir hingga data baru diterima, apakah Anda yakin?',
                    'TIME_B'=> 'Waktu B',
                    'TIME_FROM'=> 'Waktu dari',
                    'TIME_PERIOD'=> 'Jangka waktu',
                    'TIME_PERIOD_MIN'=> 'Jangka waktu (menit)',
                    'TIME_POSITION'=> 'Waktu (posisi)',
                    'TIME_SERVER'=> 'Waktu (server)',
                    'TIME_TO'=> 'Waktu untuk',
                    'TO'=> 'To',
                    'TODAY'=> 'Hari ini',
                    'TOOLS'=> 'Tools',
                    'TOO_MANY'=> 'terlalu banyak',
                    'TOO_MANY_FAILED_LOGIN_ATTEMPTS'=> 'Terlalu banyak upaya login yang gagal. Coba lagi nanti.',
                    'TOO_MANY_LOGIN_RECOVERY_ATTEMPTS'=> 'Too many login recovery attempts. Try again after 5 minutes.',
                    'TOO_MANY_OBJECTS_SELECTED'=> 'Terlalu banyak objek dipilih.',
                    'TOP'=> 'Atas',
                    'TOP_PANEL_BORDER_COLOR'=> 'Warna batas panel atas',
                    'TOP_PANEL_COLOR'=> 'Warna panel atas',
                    'TOP_PANEL_COUNTERS_FONT_COLOR'=> 'Panel atas menghitung warna font',
                    'TOP_PANEL_FONT_COLOR'=> 'Warna font panel atas',
                    'TOP_PANEL_SELECTION_COLOR'=> 'Warna pemilihan panel atas',
                    'TOP_SPEED'=> 'Kecepatan tertinggi',
                    'TOTAL'=> 'Total',
                    'TOTAL_FILLED'=> 'Total terisi',
                    'TOTAL_FUEL_CONSUMPTION'=> 'Konsumsi bahan bakar total',
                    'TOTAL_FUEL_COST'=> 'Total biaya bahan bakar',
                    'TOTAL_ITEMS_DELETED'=> 'Total item dihapus=>',
                    'TOTAL_OVERSPEED_COUNT'=> 'Jumlah total kecepatan berlebih',
                    'TOTAL_ROUTE_LENGTH'=> 'Total panjang rute',
                    'TOTAL_SMS_IN_QUEUE_TO_SEND'=> 'Total SMS dalam antrian untuk dikirim',
                    'TOTAL_STOLEN'=> 'Total dicuri',
                    'TOW'=> 'Derek',
                    'TRACKING_START'=> 'Pelacakan dimulai',
                    'TRACKING_STOP'=> 'Pelacakan berhenti',
                    'TRAILER'=> 'Trailer',
                    'TRAILERS'=> 'Trailer',
                    'TRAILERS_FOUND'=> '%s cuplikan ditemukan.',
                    'TRAILER_ASSIGN'=> 'Penempatan Trailer',
                    'TRAILER_ASSIGN_SENSOR_IS_ALREADY_AVAILABLE'=> 'Sensor penetapan trailer sudah tersedia.',
                    'TRAILER_CHANGE'=> 'Perubahan cuplikan',
                    'TRAILER_INFO'=> 'Informasi Trailer',
                    'TRANSPORT_MODEL'=> 'Model transportasi',
                    'TRAVEL_SHEET'=> 'Lembar perjalanan',
                    'TRAVEL_SHEET_DAY_NIGHT'=> 'Lembar perjalanan (siang / malam)',
                    'TRIAL'=> 'Percobaan',
                    'TRIGGER_EVENT'=> 'Peristiwa pemicu',
                    'TWO_OBJECTS_SELECTED'=> 'Two objects must be selected.',
                    'TYPE'=> 'Jenis',
                    'TYPE_A_MESSAGE'=> 'Ketik pesan ...',
                    'UNABLE_TO_SEND_SMS_MESSAGE'=> 'Tidak dapat mengirim pesan SMS.',
                    'UNASSIGN_OBJECT_DRIVER_AFTER_IGNITION_IF_OFF'=> 'Batalkan penetapan driver objek setelah kunci kontak dimatikan',
                    'UNDERSPEED'=> 'Kecepatan kurang',
                    'UNDERSPEEDS'=> 'Kecepatan terlalu rendah',
                    'UNDERSPEED_COUNT'=> 'Hitungan kecepatan di bawah',
                    'UNDERSPEED_COUNT_MERGED'=> 'Hitungan kecepatan kurang (digabungkan)',
                    'UNDERSPEED_POSITION'=> 'Posisi underspeed',
                    'UNGROUPED'=> 'Tidak dikelompokkan',
                    'UNITS_OF_MEASUREMENT'=> 'Satuan ukur',
                    'UNIT_ACRE'=> 'ac',
                    'UNIT_D'=> 'd',
                    'UNIT_FT'=> 'kaki',
                    'UNIT_GALLONS'=> 'galon',
                    'UNIT_H'=> 'h',
                    'UNIT_HECTARES'=> 'ha',
                    'UNIT_KM'=> 'km',
                    'UNIT_KN'=> 'kn',
                    'UNIT_KPH'=> 'kpj',
                    'UNIT_LITERS'=> 'liter',
                    'UNIT_M'=> 'm',
                    'UNIT_MI'=> 'mi',
                    'UNIT_MIN'=> 'min',
                    'UNIT_MPH'=> 'mph',
                    'UNIT_NM'=> 'nm',
                    'UNIT_OF_CAPACITY'=> 'Satuan kapasitas',
                    'UNIT_OF_DISTANCE'=> 'Satuan jarak',
                    'UNIT_OF_TEMPERATURE'=> 'Satuan suhu',
                    'UNIT_S'=> 's',
                    'UNIT_SQ_FT'=> 'kaki²',
                    'UNIT_SQ_KM'=> 'km²',
                    'UNIT_SQ_M'=> 'm²',
                    'UNIT_SQ_MI'=> 'mi²',
                    'UNLIMITED'=> 'Tak Terbatas',
                    'UNUSED_OBJECTS'=> 'Objek yang tidak digunakan',
                    'UNUSED_OBJECT_LIST'=> 'Daftar objek yang tidak digunakan',
                    'UPDATE_LAST_SERVICE'=> 'Perbarui layanan terakhir',
                    'UPLOAD'=> 'Unggah',
                    'URL'=> 'URL',
                    'URL_ADDRESSES'=> 'Alamat URL',
                    'URL_CANT_BE_EMPTY'=> 'URL tidak boleh kosong.',
                    'URL_DESKTOP'=> 'desktop URL',
                    'URL_MOBILE'=> 'URL seluler',
                    'USAGE'=> 'Penggunaan',
                    'USER'=> 'Pengguna',
                    'USERNAME'=> 'Nama Pengguna',
                    'USERNAME_CANT_BE_EMPTY'=> 'Nama pengguna tidak boleh kosong.',
                    'USERNAME_OR_PASSWORD_INCORRECT'=> 'Nama pengguna atau kata sandi salah.',
                    'USERNAME_PASSWORD_SENT'=> 'Nama pengguna dan kata sandi dikirim.',
                    'USERNAME_SPACE_CHARACTERS'=> 'Nama pengguna tidak boleh mengandung karakter spasi.',
                    'USERS'=> 'Pengguna',
                    'USERS_FOUND'=> '%s pengguna ditemukan.',
                    'USER_ACCOUNT'=> 'Akun pengguna',
                    'USER_API'=> 'API Pengguna',
                    'USER_INTERFACE'=> 'Antarmuka pengguna',
                    'USER_LIST'=> 'Daftar pengguna',
                    'USER_REGISTRATION_VIA_LOGIN_DIALOG'=> 'Pendaftaran pengguna melalui dialog login',
                    'USE_GEOCODER_CACHE'=> 'Gunakan cache geocoder, ini akan mengurangi panggilan API ke server geocoder dan membuat beberapa tanggapan alamat lebih cepat',
                    'USE_PLAN'=> 'Gunakan rencana',
                    'USE_SMTP_SERVER'=> 'Gunakan server SMTP',
                    'VALID'=> 'Valid',
                    'VALUE'=> 'Nilai',
                    'VALUE_IS_ALREADY_AVAILABLE'=> 'Nilai sudah tersedia.',
                    'VARIABLES'=> 'Variabel',
                    'VAR_BILLING_CURRENCY'=> '%CURRENCY% - Mata Uang',
                    'VAR_BILLING_PLAN_ID'=> '%PLAN_ID% - ID paket penagihan',
                    'VAR_BILLING_PLAN_NAME'=> '%PLAN_NAME% - Nama paket penagihan',
                    'VAR_BILLING_PLAN_PRICE'=> '%PLAN_PRICE% - Harga paket penagihan',
                    'VAR_BILLING_USER_EMAIL'=> '%USER_EMAIL% - Email pengguna, digunakan untuk identifikasi akun berbayar',
                    'VAR_NO_VARIABLES_AVAILABLE'=> 'Tidak ada variabel yang tersedia',
                    'VAR_SMS_GATEWAY_MESSAGE'=> '%MESSAGE% - teks dari pesan SMS',
                    'VAR_SMS_GATEWAY_NUMBER'=> '%NUMBER% - nomor telepon, dimana SMS akan dikirim',
                    'VAR_TEMPLATE_ADDRESS'=> '%ADDRESS% - Alamat posisi',
                    'VAR_TEMPLATE_ALT'=> '%ALT% - Ketinggian',
                    'VAR_TEMPLATE_ANGLE'=> '%ANGLE% - Sudut bergerak',
                    'VAR_TEMPLATE_DRIVER'=> '%DRIVER% - Nama pengemudi',
                    'VAR_TEMPLATE_DT_POS'=> '%DT_POS% - Tanggal dan waktu posisi',
                    'VAR_TEMPLATE_DT_SER'=> '%DT_SER% - Tanggal dan waktu server',
                    'VAR_TEMPLATE_EMAIL'=> '%EMAIL% - Email',
                    'VAR_TEMPLATE_ENG_HOURS'=> '%ENG_HOURS% - Jam mesin',
                    'VAR_TEMPLATE_EVENT'=> '%EVENT% - Nama acara',
                    'VAR_TEMPLATE_G_MAP'=> '%G_MAP% - URL ke Google Maps dengan posisi',
                    'VAR_TEMPLATE_IMEI'=> '%IMEI% - Objek IMEI',
                    'VAR_TEMPLATE_LAT'=> '%LAT% - Lintang posisi',
                    'VAR_TEMPLATE_LNG'=> '%LNG% - Garis bujur posisi',
                    'VAR_TEMPLATE_NAME'=> '%NAME% - Nama objek',
                    'VAR_TEMPLATE_ODOMETER'=> '%ODOMETER% - Odometer',
                    'VAR_TEMPLATE_PASSWORD'=> '%PASSWORD% - Sandi',
                    'VAR_TEMPLATE_PL_NUM'=> '%PL_NUM% - Nomor pelat',
                    'VAR_TEMPLATE_ROUTE'=> '%ROUTE% - Nama rute',
                    'VAR_TEMPLATE_SERVER_NAME'=> '%SERVER_NAME% - nama server GPS',
                    'VAR_TEMPLATE_SIM_NUMBER'=> '%SIM_NUMBER% - nomor kartu SIM',
                    'VAR_TEMPLATE_SPEED'=> '%SPEED% - Kecepatan',
                    'VAR_TEMPLATE_TRAILER'=> '%TRAILER% - Nama cuplikan',
                    'VAR_TEMPLATE_TR_MODEL'=> '%TR_MODEL% - Model transportasi',
                    'VAR_TEMPLATE_URL_AU'=> '%URL_AU% - Akses melalui URL',
                    'VAR_TEMPLATE_URL_AU_MOBILE'=> '%URL_AU_MOBILE% - Akses melalui URL seluler',
                    'VAR_TEMPLATE_URL_LOGIN'=> '%URL_LOGIN% - URL untuk masuk',
                    'VAR_TEMPLATE_URL_RECOVER'=> '%URL_RECOVER% - URL untuk memulihkan akun',
                    'VAR_TEMPLATE_URL_SHOP'=> '%URL_SHOP% - URL untuk berbelanja',
                    'VAR_TEMPLATE_URL_SU'=> '%URL_SU% - Akses melalui URL',
                    'VAR_TEMPLATE_URL_SU_MOBILE'=> '%URL_SU_MOBILE% - Akses melalui URL seluler',
                    'VAR_TEMPLATE_USERNAME'=> '%USERNAME% - Nama Pengguna',
                    'VAR_TEMPLATE_USER_EMAIL'=> '%USER_EMAIL% - Email akun pengguna',
                    'VAR_TEMPLATE_VIN'=> '%VIN% - VIN',
                    'VAR_TEMPLATE_ZONE'=> '%ZONE% - Nama zona',
                    'VERTICAL_DIALOG_POSITION'=> 'Posisi dialog vertikal',
                    'VIEWER'=> 'Penampil',
                    'VIN'=> 'VIN',
                    'VIRTUAL_ACC_PARAMETER_PROPERTIES'=> 'Properti parameter ACC virtual',
                    'VIRT_ACC_EQ_0_IF_PARAMETER'=> 'Kebajikan. ACC sama dengan \'0\' jika parameter ',
                    'VIRT_ACC_EQ_1_IF_PARAMETER'=> 'Kebajikan. ACC sama dengan \'1\' jika parameter ',
                    'WARNING_CHANGING_THIS_VALUE_WILL_AFFECT_EXISTING_DATA'=> 'Peringatan=> Mengubah nilai ini akan mempengaruhi data yang ada.',
                    'WARNING_DISPLAY_ADDRESS_ENABLE'=> 'Peringatan=> Mengaktifkan fitur tampilan alamat akan menaikkan permintaan geocoder dan Anda mungkin kehabisan kuota layanan geocoder. Harap pertimbangkan terlebih dahulu sebelum mengaktifkan fitur ini. ',
                    'WEBHOOK'=> 'Webhook',
                    'WEBHOOK_DAILY'=> 'Jumlah Webhook (harian)',
                    'WEBHOOK_URL'=> 'URL Webhook',
                    'WEEKLY'=> 'Mingguan',
                    'WEEK_DAYS'=> 'Hari kerja',
                    'WHOLE_PERIOD'=> 'Titik keseluruhan',
                    'WIDGETS'=> 'Gawit',
                    'WINTER_FROM'=> 'Musim dingin dari',
                    'WINTER_RATE_L100KM'=> 'Tarif musim dingin (kilometer per liter)',
                    'WINTER_RATE_MPG'=> 'Tarif musim dingin (mil per galon)',
                    'WINTER_TO'=> 'Musim dingin ke',
                    'YANDEX_MAPS_KEY'=> 'Kunci Yandex Maps (dapatkan di sini=> https=>//tech.yandex.com/maps)',
                    'YEAR'=> 'Tahun',
                    'YEARS'=> 'Tahun',
                    'YES'=> 'Ya',
                    'YESTERDAY'=> 'Kemarin',
                    'YOU_CAN_ADD'=> 'Anda dapat menambahkan',
                    'YOU_CAN_ADD_UNLIMITED_NUMBER_OF_OBJECTS'=> 'Anda dapat menambahkan objek dalam jumlah tak terbatas.',
                    'YOU_CAN_ADD_UNLIMITED_NUMBER_OF_OBJECTS_TILL'=> 'Anda dapat menambahkan objek dalam jumlah tak terbatas hingga',
                    'ZONES'=> 'Zones',
                    'ZONES_INSTEAD_OF_ADDRESSES'=> 'Zona sebagai ganti alamat',
                    'ZONE_CANT_HAVE_MORE_THAN_NUM_VERTICES'=> 'Zona tidak boleh memiliki lebih dari 80 simpul.',
                    'ZONE_IN'=> 'Zona dalam',
                    'ZONE_IN_OUT'=> 'Zona masuk / keluar',
                    'ZONE_IN_OUT_WITH_GEN_INFORMATION'=> 'Zona masuk / keluar dengan gen. informasi',
                    'ZONE_LIMIT_IS_REACHED'=> 'Batas zona tercapai.',
                    'ZONE_NAME'=> 'Nama zona',
                    'ZONE_OUT'=> 'Zona keluar',
                    'ZONE_POSITION'=> 'Posisi zona',
                    'ZONE_PROPERTIES'=> 'Properti zona',
                    'ZONE_VISIBLE'=> 'Zona terlihat',
                    'ZOOM'=> 'Pembesaran',
                    'ZOOM_IN'=> 'Perbesar',
                    'ZOOM_OUT'=> 'Perkecil',
                    'UNIT_SPEED'=> 'kpj',
                    'UNIT_DISTANCE'=> 'km',
                    'UNIT_HEIGHT'=> 'm',
                    'UNIT_CAPACITY'=> 'liter',
                    'UNIT_TEMPERATURE'=> 'C'
                ]);
        }
    }
    
    public function fn_settings(Request $request)
    {   
        switch ($request->cmd) {
            case 'save_user_language':
                $data = gs_user::where('id', $request->user_id)->first();
                    if ($data) {
                        $data->language = $request->language;
                        $data->save();
                        return "OK";
                    }
            case 'load_server_data':
                return response()->json([
                    'server_api_key'=> '',
                    'server_api_ip'=> '',
                    'url_login'=> 'https=>//jontracking.com',
                    'url_help'=> 'https=>//wa.me/message/NAJBHDAXPOBQD1',
                    'url_contact'=> 'https=>//wa.me/message/NAJBHDAXPOBQD1',
                    'url_shop'=> '',
                    'url_sms_gateway_app'=> 'https=>//websms.co.id/api/smsgateway?token=5711f42fc8714f68b6aea4d5ccf363ee&to=%NUMBER%&msg=%MESSAGE%',
                    'connection_timeout'=> '5',
                    'history_period'=> '90',
                    'db_backup_time'=> '00=>00',
                    'db_backup_email'=> 'jonnusantara@gmail.com',
                    'name'=> 'JON Tracking',
                    'generator'=> 'JON Tracking Software',
                    'about'=> 'true',
                    'help_page'=> 'true',
                    'logo'=> 'logo.png',
                    'logo_small'=> 'logo_small.png',
                    'map_osm'=> 'true',
                    'map_bing'=> 'false',
                    'map_google'=> 'true',
                    'map_google_street_view'=> 'true',
                    'map_google_traffic'=> 'true',
                    'map_mapbox'=> 'false',
                    'map_arcgis'=> 'false',
                    'map_yandex'=> 'false',
                    'geocoder_service'=> 'nominatim',
                    'geocoder_cache'=> 'true',
                    'map_bing_key'=> '',
                    'map_google_key'=> 'AIzaSyCqFagr-wKLCNqe0ePlZhu57kgVf92qshU',
                    'map_mapbox_key'=> '',
                    'map_arcgis_key'=> '',
                    'map_yandex_key'=> '',
                    'geocoder_bing_key'=> '',
                    'geocoder_google_key'=> '',
                    'geocoder_mapbox_key'=> '',
                    'geocoder_pickpoint_key'=> '',
                    'routing_osmr_service_url'=> 'https=>//router.project-osrm.org/route/v1',
                    'map_layer'=> 'osm',
                    'map_zoom'=> '3',
                    'map_lat'=> '-6',
                    'map_lng'=> '106.827088',
                    'address_display_object_data_list'=> 'true',
                    'address_display_event_data_list'=> 'true',
                    'address_display_history_route_data_list'=> 'true',
                    'page_after_login'=> 'account',
                    'show_hide_password'=> 'true',
                    'allow_registration'=> 'true',
                    'account_expire'=> 'true',
                    'account_expire_period'=> '2',
                    'user_map_osm'=> 'true',
                    'user_map_bing'=> 'true',
                    'user_map_google'=> 'true',
                    'user_map_google_street_view'=> 'true',
                    'user_map_google_traffic'=> 'true',
                    'user_map_mapbox'=> 'false',
                    'user_map_arcgis'=> 'false',
                    'user_map_yandex'=> 'false',
                    'language'=> 'indonesian',
                    'unit_of_distance'=> 'km',
                    'unit_of_capacity'=> 'l',
                    'unit_of_temperature'=> 'c',
                    'currency'=> 'IDR',
                    'timezone'=> '+ 7 hour',
                    'dst'=> 'false',
                    'dst_start'=> '',
                    'dst_end'=> '',
                    'obj_add'=> 'trial',
                    'obj_limit'=> 'true',
                    'obj_limit_num'=> '1',
                    'obj_days'=> 'true',
                    'obj_days_num'=> '365',
                    'obj_days_trial'=> '2',
                    'obj_edit'=> 'true',
                    'obj_delete'=> 'false',
                    'obj_history_clear'=> 'true',
                    'kml'=> 'true',
                    'dashboard'=> 'true',
                    'history'=> 'true',
                    'reports'=> 'true',
                    'tachograph'=> 'true',
                    'tasks'=> 'true',
                    'rilogbook'=> 'true',
                    'dtc'=> 'true',
                    'maintenance'=> 'true',
                    'expenses'=> 'true',
                    'object_control'=> 'true',
                    'image_gallery'=> 'true',
                    'chat'=> 'true',
                    'subaccounts'=> 'true',
                    'sms_gateway_server'=> 'true',
                    'api'=> 'true',
                    'notify_obj_expire'=> 'true',
                    'notify_obj_expire_period'=> '2',
                    'notify_account_expire'=> 'true',
                    'notify_account_expire_period'=> '2',
                    'sim_number'=> 'true',
                    'reports_schedule'=> 'true',
                    'object_control_default_templates'=> 'true',
                    'places_markers'=> '0',
                    'places_routes'=> '0',
                    'places_zones'=> '0',
                    'usage_email_daily'=> '0',
                    'usage_sms_daily'=> '10000',
                    'usage_webhook_daily'=> '0',
                    'usage_api_daily'=> '0',
                    'billing'=> 'true',
                    'billing_gateway'=> 'custom',
                    'billing_currency'=> 'IDR',
                    'billing_recover_plan'=> 'true',
                    'billing_paypalv2_account'=> '',
                    'billing_paypalv2_client_id'=> '',
                    'billing_paypalv2_custom'=> '',
                    'billing_paypalv2_ipn_url'=> 'https=>//jontracking.com//api/billing/paypal.php',
                    'billing_paypal_account'=> '',
                    'billing_paypal_custom'=> '',
                    'billing_paypal_ipn_url'=> 'https=>//jontracking.com//api/billing/paypal.php',
                    'billing_custom_url'=> 'https=>//wa.me/6281111111531',
                    'email'=> 'support@jontracking.com',
                    'email_no_reply'=> '',
                    'email_signature'=> '--\njontracking.com',
                    'email_smtp'=> 'true',
                    'email_smtp_host'=> 'mail.jontracking.com',
                    'email_smtp_port'=> '465',
                    'email_smtp_auth'=> 'true',
                    'email_smtp_secure'=> 'ssl',
                    'email_smtp_username'=> 'support@jontracking.com',
                    'email_smtp_password'=> '@Jonusa230!',
                    'sms_gateway'=> 'true',
                    'sms_gateway_type'=> 'http',
                    'sms_gateway_number_filter'=> '',
                    'sms_gateway_url'=> 'http=>//pengirimwa.my.id/send-wa?hp=%NUMBER%&msg=%MESSAGE%&key=2aa2210894b1b5283c07c326a32c6835',
                    'sms_gateway_identifier'=> '11812562299887806881',
                    'server_cleanup_users_ae'=> 'false',
                    'server_cleanup_objects_not_activated_ae'=> 'false',
                    'server_cleanup_objects_not_used_ae'=> 'false',
                    'server_cleanup_db_junk_ae'=> 'true',
                    'server_cleanup_users_days'=> '30',
                    'server_cleanup_objects_not_activated_days'=> '90'
                ]);


            default:
                return "false";
        }
    }

    public function fn_connect(Request $request)
    {
        switch ($request->cmd) {
            case 'session_check':
                $token = $request->token;
                if (!$token) {
                    return "false";
                }
                $tokenParts = explode('|', $token);
                if (count($tokenParts) !== 2) {
                    return response()->json(['status' => 'false', 'message' => 'Invalid token format']);
                }
                $tokenPlain = $tokenParts[1];
                $hashedToken = hash('sha256', $tokenPlain);
                $tokenData = DB::table('personal_access_tokens')->where('token', $hashedToken)->first();
                if ($tokenData) {
                    return "true";
                } else {
                    return "false";
                }

            case 'logout':
                $token = $request->token;
                if (!$token) {
                    return "false";
                }
                $tokenParts = explode('|', $token);
                if (count($tokenParts) !== 2) {
                    return response()->json(['status' => 'false', 'message' => 'Invalid token format']);
                }
                $tokenPlain = $tokenParts[1];
                $hashedToken = hash('sha256', $tokenPlain);
                DB::table('personal_access_tokens')->where('token', $hashedToken)->delete();
                return 'OK';

            case 'recover_url':
                $user = gs_user::where('email', $request->email)->first();
                if (!$user) {
                    return "ERROR_EMAIL_NOT_FOUND";
                }
    
                $newPassword = Str::random(6);
                $user->password = md5($newPassword);

                $ke = $user->email;
                $subjek = "Recovery Password";
                $pesan = "Hello,\n\nYour password has been reset. "."\n\nAccess Login to Server: ".env('APP_URL')."\n\nUsername: ".$request->email."\nNew password is: " . $newPassword."\n\n\n--\njontracking.com";
                try {
                    Mail::raw($pesan, function ($message) use ($ke, $subjek) {
                        $message->to($ke)->subject($subjek);
                    });
                    $user->save();
                    return "OK";
                } catch (TransportException $e) {
                    return "ERROR_NOT_SENT";
                }
            case 'register':
                $managerId = $request->manager_id ? $request->manager_id : 0;
                $exists = gs_user::where('email', $request->email)->exists();
                if ($exists) {
                    return "ERROR_EMAIL_EXISTS";
                }
                $password = Str::random(6);
                $ke = $request->email;
                $subjek = "Registration at ".env('APP_NAME');
                $pesan = "Hello,\nThank you for registering at ".env('APP_NAME').".\n\nAccess to GPS server: ".env('APP_URL')."\nUsername: ".$request->email."\nPassword: ".$password."\n\n\n--\njontracking.com";
                try {
                    Mail::raw($pesan, function ($message) use ($ke, $subjek) {
                        $message->to($ke)->subject($subjek);
                    });
                    
                } catch (TransportException $e) {
                    return "ERROR_NOT_SENT";
                }
                $date = Carbon::now(); // Atau Anda bisa mendapatkan tanggal dari mana pun yang Anda butuhkan
                $account_expire_dt = $date->format('Y-m-d'); // Format tanggal ke "tahun-bulan-tanggal"
                $dt_login = $date->format('Y-m-d H:i:s');
                $obj_days_dt = Carbon::now()->addYear()->format('Y-m-d');
                $user = new gs_user();
                $user->email = $request->email;
                $user->active = "true";
                $user->account_expire = "true";
                $user->account_expire_dt = $account_expire_dt;
                $user->privileges = json_encode(["type"=>"user","map_osm"=>true,"map_bing"=>true,"map_google"=>true,"map_google_street_view"=>true,"map_google_traffic"=>true,"map_mapbox"=>false,"map_arcgis"=>false,"map_yandex"=>false,"kml"=>true,"dashboard"=>true,"history"=>true,"reports"=>true,"tachograph"=>true,"tasks"=>true,"rilogbook"=>true,"dtc"=>true,"maintenance"=>true,"expenses"=>true,"object_control"=>true,"image_gallery"=>true,"chat"=>true,"subaccounts"=>true]);
                $user->manager_id = $managerId;
                $user->manager_billing = "";
                $user->username = $request->email;
                $user->password = md5($password);
                $user->sess_hash = "";
                $user->api = "true";
                $user->api_key = Str::upper(Str::random(32));
                $user->dt_reg = $dt_login;
                $user->dt_login = $dt_login;
                $user->ip = "";
                $user->notify_account_expire = "true";
                $user->notify_object_expire = "false";
                $user->info = json_encode(["name"=>"","company"=>"","address"=>"","post_code"=>"","city"=>"","country"=>"","phone1"=>"","phone2"=>"","email"=>""]);
                $user->comment = "";
                $user->obj_add = "trial";
                $user->obj_limit = "true";
                $user->obj_limit_num = "1";
                $user->obj_days = "true";
                $user->obj_days_dt = $obj_days_dt;
                $user->obj_edit = "true";
                $user->obj_delete = "false";
                $user->obj_history_clear = "true";
                $user->currency = "IDR";
                $user->timezone = "+ 7 hour";
                $user->dst = "false";
                $user->dst_start = "";
                $user->dst_end = "";
                $user->startup_tab = "";
                $user->language = "indonesian";
                $user->units= "km,l,c";
                $user->dashboard = "";
                $user->map_sp = "last";
                $user->map_is = "1";
                $user->map_rc = "";
                $user->map_rhc = "";
                $user->map_ocp = "";
                $user->groups_collapsed = "";
                $user->od = "";
                $user->ohc = "";
                $user->datalist = "";
                $user->datalist_items = "";
                $user->push_notify_identifier = "";
                $user->push_notify_desktop = "";
                $user->push_notify_mobile = "";
                $user->push_notify_mobile_interval = "0";
                $user->chat_notify = "";
                $user->sms_gateway_server = "true";
                $user->sms_gateway = "";
                $user->sms_gateway_type = "";
                $user->sms_gateway_url = "";
                $user->sms_gateway_identifier = "";
                $user->places_markers = "";
                $user->places_routes = "";
                $user->places_zones = "";
                $user->usage_email_daily = "";
                $user->usage_sms_daily = "";
                $user->usage_webhook_daily = "";
                $user->usage_api_daily = "";
                $user->usage_email_daily_cnt = "0";
                $user->usage_sms_daily_cnt = "0";
                $user->usage_webhook_daily_cnt = "0";
                $user->usage_api_daily_cnt = "0";
                $user->dt_usage_d = $account_expire_dt;
                $user->save();
                return "OK";

            default:
                return "false";
        }
    }
   
}
