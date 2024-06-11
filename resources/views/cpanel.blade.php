


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>JON Tracking </title>
		
		<link rel="shortcut icon" href="https://jontracking.com//favicon.png" type="image/x-icon">		
		<link type="text/css" href="theme/jquery-ui.css?v=4000" rel="Stylesheet" />
		<link type="text/css" href="theme/ui.jqgrid.css?v=4000" rel="Stylesheet" />
		<link type="text/css" href="theme/jquery.multiple.css?v=4000" rel="Stylesheet" />
		<link type="text/css" href="theme/jquery.tokenize.css?v=4000" rel="Stylesheet" />
		
		<link type="text/css" href="theme/style.css?v=4000" rel="Stylesheet" />
		<link type="text/css" href="theme/style.custom.php?v=4000" rel="Stylesheet" />
	
		<script type="text/javascript" src="js/md5.js?v=4000"></script>
		<script type="text/javascript" src="js/csv2json.min.js?v=4000"></script>
		<script type="text/javascript" src="js/sprintf.min.js?v=4000"></script>
		
		<script type="text/javascript" src="js/jscolor.js?v=4000"></script>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js?v=4000"></script>
		<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js?v=4000"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js?v=4000"></script>
		<script type="text/javascript" src="js/jquery.jqGrid.locale.js?v=4000"></script>
		<script type="text/javascript" src="js/jquery.jqGrid.min.js?v=4000"></script>
		<script type="text/javascript" src="js/jquery.multiple.js?v=4000"></script>
		<script type="text/javascript" src="js/jquery.tokenize.js?v=4000"></script>
		
		<script type="text/javascript" src="js/moment.min.js?v=4000"></script>
		
		<script type="text/javascript" src="js/gs.config.js?v=4000"></script>
		<script type="text/javascript" src="js/gs.common.js?v=4000"></script>
		<script type="text/javascript" src="js/gs.connect.js?v=4000"></script>
		<script type="text/javascript" src="js/gs.cpanel.js?v=4000"></script>
		<script type="text/javascript" src="js/gs.cpanel.gui.js?v=4000"></script>
		<script type="text/javascript" src="js/gs.cpanel.users.js?v=4000"></script>
		<script type="text/javascript" src="js/gs.cpanel.objects.js?v=4000"></script>		
		<script type="text/javascript" src="js/gs.cpanel.billing.js?v=4000"></script>
		<script type="text/javascript" src="js/gs.cpanel.server.js?v=4000"></script>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				const urlParams = new URLSearchParams(window.location.search);
				const token = urlParams.get('token');
				if (token) {
					localStorage.setItem('token', token);
					// Hapus token dari URL untuk keamanan
					window.history.replaceState({}, document.title, window.location.pathname);
				}else{
					const storedToken = localStorage.getItem('token');
					if (!storedToken) {
						window.location.href = "/";
					}

				}
			});
		</script>
			</head>
    
	<body id="cpanel" onload="load()" >
		<input id="load_file" type="file" style="display: none;" onchange=""/>
		
		<div id="loading_panel">
			<div class="table">
				<div class="table-cell center-middle">
					<div id="loading_panel_text">
						<div class="row">
							<img class="logo" src="https://jontracking.com//img/logo.png" />
						</div>
						<div class="row">
							<div class="loader">
								<span></span><span></span><span></span><span></span><span></span><span></span><span></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="loading_data_panel" style="display: none;">
			<div class="table">
				<div class="table-cell center-middle">
					<div class="loader">
						<span></span><span></span><span></span><span></span><span></span><span></span><span></span>
					</div>
				</div>
			</div>
		</div>
			
		<div id="blocking_panel">
			<div class="table">
				<div class="table-cell center-middle">
					<div id="blocking_panel_text">
						<div class="row">
							<img class="logo" src="https://jontracking.com//img/logo.png" />
						</div>
						<a href="http://127.0.0.1:8000">Session has expired. Please login again.</a>					</div>
				</div>
			</div>
		</div>
	
		<div id="content" style="visibility: hidden;">
			<div id="dialog_notify" title="">
				<div class="row">
					<div class="row2">
						<div class="width100 center-middle">
							<span id="dialog_notify_text"></span>
						</div>
					</div>
				</div>
				<center>
					<input class="button" type="button" onclick="$('#dialog_notify').dialog('close');" value="OK" />
				</center>
			</div>
			
			<div id="dialog_confirm" title="">
				<div class="row">
					<div class="row2">
						<div class="width100 center-middle">
							<span id="dialog_confirm_text"></span>
						</div>
					</div>
				</div>
				<center>
					<input class="button" type="button" onclick="confirmResponse(true);" value="Yes" />&nbsp;
					<input class="button" type="button" onclick="confirmResponse(false);" value="No" />
				</center>
			</div>
			
			<div id="dialog_set_expiration" title="Set expiration">
				<div class="row">
					<div class="row2">
						<div class="width40">
							Expire on						</div>
						<div class="width10"><input id="dialog_set_expiration_expire" class="checkbox" type="checkbox" onChange="setExpirationCheck();"/></div>
						<div class="width50">
							<input class="inputbox-calendar inputbox width100" id="dialog_set_expiration_expire_dt"/>
						</div>
					</div>
				</div>
				<center>
					<input class="button icon-save icon" type="button" onclick="setExpirationSelected('save');" value="Save" />&nbsp;
					<input class="button icon-close icon" type="button" onclick="setExpirationSelected('cancel');" value="Cancel" />
				</center>
			</div>
			
				<div id="top_panel">
		<div class="tp-menu left-menu">
			<div class="map-btn">
				<a title="Map" href="tracking.php">
					<img src="theme/images/globe.svg" />
				</a>
			</div>
					
						<div class="select-view">
				<select id="cpanel_manager_list" class="select width100" onchange="switchCPManager(this.value);"/></select>
			</div>
						<div class="user-list-btn">
				<a title="User list" class="active" id="top_panel_button_user_list" href="#" onClick="switchCPTab('user_list');">
					<img src="theme/images/user.svg" />
					<span id="user_list_stats"></span>
				</a>
			</div>
			<div class="object-list-btn">
				<a title="Object list" id="top_panel_button_object_list" href="#" onClick="switchCPTab('object_list');">
					<img src="theme/images/marker.svg" />
					<span id="object_list_stats"></span>
				</a>
			</div>
						<div class="unused-object-list-btn">
				<a title="Unused object list" id="top_panel_button_unused_object_list" href="#" onClick="switchCPTab('unused_object_list');">
				<img src="theme/images/marker-crossed.svg" />
				<span id="unused_object_list_stats"></span>
				</a>
			</div>
												<div class="manage-server-btn">
				<a title="Manage server" id="top_panel_button_manage_server" href="#" onClick="switchCPTab('manage_server');">
					<img src="theme/images/settings.svg" />
				</a>
			</div>
					</div>

		<div class="tp-menu right-menu">
			<div class="select-language"><select id="system_language" class="select" onChange="switchLanguageCPanel();"><option value="english">English</option><option value="indonesian">Indonesian</option></select></div>
						<div class="user-btn">
				{{-- <a  href="#" onclick="userEdit('1');" title="My account">
					<img src="theme/images/user.svg" border="0"/>
					<span>admin</span>
				</a> --}}
			</div>
			<div class="logout-btn">
				<a title="Log out" href="#" onclick="connectLogout();">
					<img src="theme/images/logout.svg" />
				</a>
			</div>
		</div>
	</div>

	<div id="cpanel_user_list">
		<div class="float-left cpanel-title">
			<div class="version"></div>
			<h1 class="title">Control panel <span> - User list</span></h1>
		</div>
		<table id="cpanel_user_list_grid"></table>
		<div id="cpanel_user_list_grid_pager"></div>
	</div>

	<div id="cpanel_object_list" style="display:none;">
		<div class="float-left cpanel-title">
			<div class="version"></div>
			<h1 class="title">Control panel <span> - Object list</span></h1>
		</div>
		<table id="cpanel_object_list_grid"></table>
		<div id="cpanel_object_list_grid_pager"></div>
	</div>

		<div id="cpanel_unused_object_list" style="display:none;">
		<div class="float-left cpanel-title">
			<div class="version"></div>
			<h1 class="title">Control panel <span> - Unused object list</span></h1>
		</div>
		<table id="cpanel_unused_object_list_grid"></table>
		<div id="cpanel_unused_object_list_grid_pager"></div>
	</div>
	
				<ul id="dialog_subaccounts_subaccount_list_grid_action_menu" class="menu">
        <li><a class="icon-tick first-item" href="#" onclick="userSubaccountsActivateSelected();">Activate</a></li>
        <li><a class="icon-close" href="#" onclick="userSubaccountsDeactivateSelected();">Deactivate</a></li>
        <li><a class="icon-remove3" href="#" onclick="userSubaccountsDeleteSelected();">Delete</a></li>
</ul>

<ul id="cpanel_user_list_grid_action_menu" class="menu">
        <li><a class="icon-tick first-item" href="#" onclick="userActivateSelected();">Activate</a></li>
        <li><a class="icon-close" href="#" onclick="userDeactivateSelected();">Deactivate</a></li>
        <li><a class="icon-time" href="#" onclick="setExpirationSelected('open_users');">Set expiration</a></li>
        
                <li><a class="icon-import" href="#" onclick="userImport();">Import</a></li>
                
        <li><a class="icon-remove3" href="#" onclick="userDeleteSelected();">Delete</a></li>
</ul>

<ul id="cpanel_object_list_grid_action_menu" class="menu">
        <li><a class="icon-tick first-item" href="#" onclick="objectActivateSelected();">Activate</a></li>
        <li><a class="icon-close" href="#" onclick="objectDeactivateSelected();">Deactivate</a></li>
        <li><a class="icon-time" href="#" onclick="setExpirationSelected('open_objects');">Set expiration</a></li>
        <li><a class="icon-erase" href="#" onclick="objectClearHistorySelected();">Clear history</a></li>
        
                <li><a class="icon-import" href="#" onclick="objectImport();">Import</a></li>
                
        <li><a class="icon-remove3" href="#" onclick="objectDeleteSelected();">Delete</a></li>
</ul>

<ul id="cpanel_unused_object_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="unusedObjectDeleteSelected();">Delete</a></li>
</ul>


<ul id="dialog_user_edit_subaccount_list_grid_action_menu" class="menu">
        <li><a class="icon-tick first-item" href="#" onclick="userSubaccountActivateSelected();">Activate</a></li>
        <li><a class="icon-close" href="#" onclick="userSubaccountDeactivateSelected();">Deactivate</a></li>
        <li><a class="icon-remove3" href="#" onclick="userSubaccountDeleteSelected();">Delete</a></li>
</ul>

<ul id="dialog_user_edit_object_list_grid_action_menu" class="menu">
        <li><a class="icon-tick first-item" href="#" onclick="userObjectActivateSelected();">Activate</a></li>
        <li><a class="icon-close" href="#" onclick="userObjectDeactivateSelected();">Deactivate</a></li>
        <li><a class="icon-time" href="#" onclick="setExpirationSelected('open_user_objects');">Set expiration</a></li>
        <li><a class="icon-erase" href="#" onclick="userObjectClearHistorySelected();">Clear history</a></li>
        <li><a class="icon-remove3" href="#" onclick="userObjectDeleteSelected();">Delete</a></li>
</ul>


<ul id="dialog_user_edit_usage_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="userUsageDeleteSelected();">Delete</a></li>
</ul>			<div id="dialog_send_email" title="Send e-mail">
        <div class="row">
                <div class="row2">
                        <div class="width20">Send to</div>
                        <div class="width80">
                                <select id="send_email_send_to" class="select width100" onchange="sendEmailSendToSwitch('test');">
                                        <option value="all">All user accounts</option>
                                        <option value="selected">Selected user accounts</option>
                                </select>
                        </div>
                </div>
                <div class="row2" id="send_email_username_row">
                        <div class="width20">Username</div>
                        <div class="width80"><select id="send_email_username" multiple="multiple" class="width100"></select></div>
                </div>
                <div class="row2">
                        <div class="width20">Subject</div>
                        <div class="width80"><input id="send_email_subject" class="inputbox" type="text" value="" maxlength="50"></div>
                </div>
                <div class="row3">
                        <div class="width20">Message</div>
                        <div class="width80"><textarea id="send_email_message" class="inputbox" style="height: 250px;" type='text'></textarea></div>
                </div>
                <div class="row3">
                        <div class="width20">Status</div>
                        <div class="width80"><div id="send_email_status" style="text-align:center;"></div></div>
                </div>
        </div>
        
        <center>
                <input class="button icon-time icon" type="button" onclick="sendEmail('test');" value="Test" />&nbsp;
                <input class="button icon-create icon" type="button" onclick="sendEmail('send');" value="Send" />&nbsp;
                <input class="button icon-close icon" type="button" onclick="sendEmail('cancel');" value="Cancel" />
        </center>
</div>

<div id="dialog_subaccounts" title="Sub accounts">
        <table id="dialog_subaccounts_subaccount_list_grid"></table>
        <div id="dialog_subaccounts_subaccount_list_grid_pager"></div>
</div>

<div id="dialog_user_add" title="Add user">
        <div class="row">
                <div class="row2">
                        <div class="width40">E-mail</div>
                        <div class="width60"><input id="dialog_user_add_email" class="inputbox" type="text" maxlength="50"></div>
                </div>
                <div class="row2">
                        <div class="width40">Send credentials</div>
                        <div class="width60"><input id="dialog_user_add_send" type="checkbox" class="checkbox" checked/></div>
                </div>
        </div>
        
        <center>
                <input class="button icon-new icon" type="button" onclick="userAdd('register');" value="Register" />&nbsp;
                <input class="button icon-close icon" type="button" onclick="userAdd('cancel');" value="Cancel" />
        </center>
</div>

<div id="dialog_user_edit" title="Edit user">
        <div id="dialog_user_edit_tabs">
                <ul>           
                        <li><a href="#dialog_user_edit_account">Account</a></li>
                        <li><a href="#dialog_user_edit_contact_info">Contact information</a></li>
                        <li><a href="#dialog_user_edit_subaccounts">Sub accounts</a></li>
                        <li><a href="#dialog_user_edit_objects">Objects</a></li>
                                                <li><a href="#dialog_user_edit_usage">Usage</a></li>
                </ul>
                
                <div id="dialog_user_edit_account">
                        <div class="controls">
                                <input class="button panel icon-save icon" type="button" onclick="userEdit('save');" value="Save">
                                <input class="button panel icon-key icon" type="button" onclick="userEditLogin();" value="Login as user">
                        </div>					
                        <div class="block width40">						
                                <div class="container">
                                        <div class="row">
                                                <div class="title-block">User</div>
                                                <div class="row2">
                                                        <div class="width40">Active</div>
                                                        <div class="width60"><input id="dialog_user_edit_account_active" class="checkbox" type="checkbox" /></div>
                                                </div>
                                                <div class="row2">
                                                        <div class="width40">Username</div>
                                                        <div class="width60"><input id="dialog_user_edit_account_username" class="inputbox" maxlength="50" /></div>
                                                </div>
                                                <div class="row2">
                                                        <div class="width40">E-mail</div>
                                                        <div class="width60"><input id="dialog_user_edit_account_email" class="inputbox" maxlength="50" /></div>
                                                </div>
                                                <div class="row2">
                                                        <div class="width40">Password</div>
                                                        <div class="width60"><input id="dialog_user_edit_account_password" class="inputbox" maxlength="20" placeholder="Enter new password"/></div>
                                                </div>
                                                <div class="row2">
                                                        <div class="width40">Privileges</div>
                                                        <div class="width60"><select id="dialog_user_edit_account_privileges" class="select width100" onChange="userEditCheck();"></select></div>
                                                </div>
                                                                                                <div class="row2">
                                                        <div class="width40">Manager</div>
                                                        <div class="width60"><select id="dialog_user_edit_account_manager_id" class="select width100" onChange="userEditCheck();"></select></div>
                                                </div>
                                                                                                <div class="row2">
                                                        <div class="width40">
                                                                Expire on                                                        </div>
                                                        <div class="width10">
                                                                <input id="dialog_user_edit_account_expire" type="checkbox" class="checkbox" onChange="userEditCheck();"/>
                                                        </div>
                                                        <div class="width50">
                                                                <input class="inputbox-calendar inputbox width100" id="dialog_user_edit_account_expire_dt"/>
                                                        </div>
                                                </div>
                                        </div>
                                                                                <div class="row">
                                                <div class="title-block">Manager privileges</div>
                                                <div class="row2">
                                                        <div class="width40">Billing</div>
                                                        <div class="width30">
                                                                <select id="dialog_user_edit_account_manager_billing" class="select width100">
                                                                        <option value="true">Yes</option>
                                                                        <option value="false">No</option>
                                                                </select>
                                                        </div>
                                                </div>
                                        </div>
                                                                        </div>
                        </div>
                        
                        <div class="block width60">
                                <div class="container last">
                                        <div class="row">
                                                <div class="title-block">Account privileges</div>
                                                <div style="height: 460px; overflow-y: scroll;">
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        OSM Map
                                                                </div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_map_osm" class="select width100"/>
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Bing Maps
                                                                </div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_map_bing" class="select width100"/>
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Google Maps
                                                                </div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_map_google" class="select width100"/>
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Google Maps Street View
                                                                </div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_map_google_street_view" class="select width100"/>
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Google Maps Traffic
                                                                </div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_map_google_traffic" class="select width100"/>
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Mapbox Maps
                                                                </div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_map_mapbox" class="select width100"/>
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        ArcGIS Maps
                                                                </div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_map_arcgis" class="select width100"/>
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Yandex Map
                                                                </div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_map_yandex" class="select width100"/>
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                                                                                <div class="row2">
                                                                <div class="width50">Add objects</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_obj_add" class="select width100" onChange="userEditCheck();">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                                <option value="trial">Trial</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Object limit</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_obj_limit" class="select width100" onChange="userEditCheck();">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                                <div class="width2"></div>
                                                                <div class="width20">   
                                                                        <input id="dialog_user_edit_account_obj_limit_num" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="4"/>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Object date limit</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_obj_days" class="select width100" onChange="userEditCheck();">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                                <div class="width2"></div>
                                                                <div class="width20">   
                                                                        <input class="inputbox-calendar inputbox width100" id="dialog_user_edit_account_obj_days_dt"/>
                                                                </div>
                                                        </div>
                                                                                                                <div class="row2">
                                                                <div class="width50">Edit objects</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_obj_edit" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                         <div class="row2">
                                                                <div class="width50">Delete objects</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_obj_delete" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Clear objects history</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_obj_history_clear" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Dashboard</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_dashboard" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">KML</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_kml" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">History</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_history" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Reports</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_reports" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2" style="display: none;">
                                                                <div class="width50">Tachograph</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_tachograph" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Tasks</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_tasks" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">RFID and iButton logbook</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_rilogbook" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">DTC (Diagnostic Trouble Codes)</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_dtc" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Maintenance</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_maintenance" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Expenses</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_expenses" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Object control</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_object_control" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Image gallery</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_image_gallery" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Chat</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_chat" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Sub accounts</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_subaccounts" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">Server SMS Gateway</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_account_sms_gateway_server" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">API</div>
                                                                <div class="width20">
                                                                        <select id="dialog_user_edit_api_active" class="select width100">
                                                                                <option value="true">Yes</option>
                                                                                <option value="false">No</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">API key</div>
                                                                <div class="width50">
                                                                        <input id="dialog_user_edit_api_key" class="inputbox width100" readOnly="true"/>
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Max. number of markers                                                                </div>
                                                                <div class="width20">
                                                                        <input id="dialog_user_edit_places_markers" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="5" />
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Max. number of routes                                                                </div>
                                                                <div class="width20">
                                                                        <input id="dialog_user_edit_places_routes" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="5" />
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Max. number of zones                                                                </div>
                                                                <div class="width20">
                                                                        <input id="dialog_user_edit_places_zones" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="5" />
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Max. number of e-mails (daily)                                                                </div>
                                                                <div class="width20">
                                                                        <input id="dialog_user_edit_usage_email_daily" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="8" />
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Max. number of SMS (daily)                                                                </div>
                                                                <div class="width20">
                                                                        <input id="dialog_user_edit_usage_sms_daily" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="8" />
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Max. number of Webhook (daily)                                                                </div>
                                                                <div class="width20">
                                                                        <input id="dialog_user_edit_usage_webhook_daily" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="8" />
                                                                </div>
                                                        </div>
                                                        <div class="row2">
                                                                <div class="width50">
                                                                        Max. number of API calls (daily)                                                                </div>
                                                                <div class="width20">
                                                                        <input id="dialog_user_edit_usage_api_daily" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="8" />
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                
                <div id="dialog_user_edit_contact_info">
                        <div class="block width100">	
                                <div class="container last">
                                        <div class="title-block">Contact information</div>
                                        <div class="row2">
                                                <div class="width40">Name, surname</div>
                                                <div class="width60"><input class="inputbox" id="dialog_user_edit_account_contact_surname"></div>
                                        </div>
                                        <div class="row2">
                                                <div class="width40">Company</div>
                                                <div class="width60"><input class="inputbox" id="dialog_user_edit_account_contact_company"></div>
                                        </div>
                                        <div class="row2">
                                                <div class="width40">Address</div>
                                                <div class="width60"><input class="inputbox" id="dialog_user_edit_account_contact_address"></div>
                                        </div>
                                        <div class="row2">
                                                <div class="width40">Post code</div>
                                                <div class="width60"><input class="inputbox" id="dialog_user_edit_account_contact_post_code"></div>
                                        </div>
                                        <div class="row2">
                                                <div class="width40">City</div>
                                                <div class="width60"><input class="inputbox" id="dialog_user_edit_account_contact_city"></div>
                                        </div>
                                        <div class="row2">
                                                <div class="width40">County/State</div>
                                                <div class="width60"><input class="inputbox" id="dialog_user_edit_account_contact_country"></div>
                                        </div>
                                        <div class="row2">
                                                <div class="width40">Phone number 1</div>
                                                <div class="width60"><input class="inputbox" id="dialog_user_edit_account_contact_phone1"></div>
                                        </div>
                                        <div class="row2">
                                                <div class="width40">Phone number 2</div>
                                                <div class="width60"><input class="inputbox" id="dialog_user_edit_account_contact_phone2"></div>
                                        </div>
                                        <div class="row2">
                                                <div class="width40">E-mail</div>
                                                <div class="width60"><input class="inputbox" id="dialog_user_edit_account_contact_email"></div>
                                        </div>
                                        <div class="row2">
                                                <div class="width40">Comment</div>
                                                <div class="width60">
                                                        <textarea id="dialog_user_edit_account_comment" class="inputbox" style="height:109px;" maxlength="500" placeholder="Comment about user..."></textarea>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                
                <div id="dialog_user_edit_subaccounts">
                        <div id="dialog_user_edit_subaccount_list">
                                <table id="dialog_user_edit_subaccount_list_grid"></table>
                                <div id="dialog_user_edit_subaccount_list_grid_pager"></div>
                        </div>
                </div>
                
                <div id="dialog_user_edit_objects">
                        <div id="dialog_user_edit_object_list">
                                <table id="dialog_user_edit_object_list_grid"></table>
                                <div id="dialog_user_edit_object_list_grid_pager"></div>
                        </div>
                </div>
                                <div id="dialog_user_edit_usage">
                        <div id="dialog_user_edit_usage_list">
                                <table id="dialog_user_edit_usage_list_grid"></table>
                                <div id="dialog_user_edit_usage_list_grid_pager"></div>
                        </div>
                </div>
        </div>
</div>

<div id="dialog_user_object_add" title="Add object">
        <div class="row">
                <div class="row2">
                        <div class="width100">
                                <select id="dialog_user_object_add_objects" multiple="multiple" class="width100"></select>
                        </div>
                </div>
        </div>
        <center>
                <input class="button icon-new icon" type="button" onclick="userObjectAdd('add');" value="Add" />&nbsp;
                <input class="button icon-close icon" type="button" onclick="userObjectAdd('cancel');" value="Cancel" />
        </center>
</div>

<div id="dialog_user_billing_plan_add" title="Add plan">
        <div class="row">
                <div class="row2">
                        <div class="width35">Plan</div>
                        <div class="width65">
                                <select id="dialog_user_billing_plan_add_plan" class="select width100" onchange="userBillingPlanAdd('load');"></select>
                        </div>
                </div>
                <div class="row2">
                        <div class="width35">Name</div>
                        <div class="width65"><input id="dialog_user_billing_plan_add_name" class="inputbox" type="text" value="" maxlength="50"></div>
                </div>
                <div class="row2">
                        <div class="width35">Number of objects</div>
                        <div class="width30"><input id="dialog_user_billing_plan_add_objects" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
                </div>
                <div class="row2">
                        <div class="width35">Period</div>
                        <div class="width30"><input id="dialog_user_billing_plan_add_period" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
                        <div class="width5"></div>
                        <div class="width30">
                                <select id="dialog_user_billing_plan_add_period_type" class="select width100">
                                        <option value="days">Days</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                </select>
                        </div>
                </div>
                <div class="row2">
                        <div class="width35">Price</div>
                        <div class="width30"><input id="dialog_user_billing_plan_add_price" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
                </div>
        </div>
        <center>
                <input class="button icon-new icon" type="button" onclick="userBillingPlanAdd('add');" value="Add" />&nbsp;
                <input class="button icon-close icon" type="button" onclick="userBillingPlanAdd('cancel');" value="Cancel" />
        </center>
</div>

<div id="dialog_user_billing_plan_edit" title="Edit plan">
        <div class="row">
                <div class="row2">
                        <div class="width35">Name</div>
                        <div class="width65"><input id="dialog_user_billing_plan_edit_name" class="inputbox" type="text" value="" maxlength="50"></div>
                </div>
                <div class="row2">
                        <div class="width35">Number of objects</div>
                        <div class="width30"><input id="dialog_user_billing_plan_edit_objects" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
                </div>
                <div class="row2">
                        <div class="width35">Period</div>
                        <div class="width30"><input id="dialog_user_billing_plan_edit_period" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
                        <div class="width5"></div>
                        <div class="width30">
                                <select id="dialog_user_billing_plan_edit_period_type" class="select width100">
                                        <option value="days">Days</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                </select>
                        </div>
                </div>
                <div class="row2">
                        <div class="width35">Price</div>
                        <div class="width30"><input id="dialog_user_billing_plan_edit_price" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
                </div>
        </div>
        <center>
                <input class="button icon-save icon" type="button" onclick="userBillingPlanEdit('save');" value="Save" />&nbsp;
                <input class="button icon-close icon" type="button" onclick="userBillingPlanEdit('cancel');" value="Cancel" />
        </center>
</div>			<div id="dialog_object_add" title="Add object">		
        <div class="row">
                <div class="row2">
                        <div class="width40">Active</div>
                        <div class="width60"><input id="dialog_object_add_active" class="checkbox" type="checkbox" /></div>
                </div>
                <div class="row2">
                        <div class="width40">Name</div>
                        <div class="width60"><input id="dialog_object_add_name" class="inputbox" type="text" value="" maxlength="25"></div>
                </div>
                <div class="row2">
                        <div class="width40">IMEI</div>
                        <div class="width60"><input id="dialog_object_add_imei" class="inputbox" type="text" maxlength="15"></div>
                </div>
                <div class="row2">
                        <div class="width40">Transport model</div>
                        <div class="width60"><input id="dialog_object_add_model" class="inputbox" type="text" value="" maxlength="30"></div>
                </div>
                <div class="row2">
                        <div class="width40">VIN</div>
                        <div class="width60"><input id="dialog_object_add_vin" class="inputbox" type="text" maxlength="20"></div>
                </div>
                <div class="row2">
                        <div class="width40">Plate number</div>
                        <div class="width60"><input id="dialog_object_add_plate_number" class="inputbox" type="text" maxlength="15"></div>
                </div>
                <div class="row2">
                        <div class="width40">GPS device</div>
                        <div class="width60"><input id="dialog_object_add_device" class="inputbox" type="text" maxlength="30"></div>
                </div>
                <div class="row2">
                        <div class="width40">SIM card number</div>
                        <div class="width60"><input id="dialog_object_add_sim_number" class="inputbox" type="text" value="" maxlength="30"></div>
                </div>
                <div class="row2">
                        <div class="width40">Manager</div>
                        <div class="width60"><select id="dialog_object_add_manager_id" class="select width100"></select></div>
                </div>
                <div class="row2">
                        <div class="width40">Expire on</div>
                        <div class="width10"><input id="dialog_object_add_object_expire" class="checkbox" type="checkbox" onChange="objectAddCheck();"/></div>
                        <div class="width50"><input class="inputbox-calendar inputbox width100" id="dialog_object_add_object_expire_dt"/></div>
                </div>
                <div class="row2">
                        <div class="width100">
                                <select id="dialog_object_add_users" multiple="multiple" class="width100"></select>
                        </div>
                </div>	
        </div>
        
        <center>
                <input class="button icon-new icon" type="button" onclick="objectAdd('add');" value="Add" />&nbsp;
                <input class="button icon-close icon" type="button" onclick="objectAdd('cancel');" value="Cancel" />
        </center>
</div>

<div id="dialog_object_edit" title="Edit object">
        <div class="row">
                <div class="row2">
                        <div class="width40">Active</div>
                        <div class="width60"><input id="dialog_object_edit_active" class="checkbox" type="checkbox" /></div>
                </div>
                <div class="row2">
                        <div class="width40">Name</div>
                        <div class="width60"><input id="dialog_object_edit_name" class="inputbox" type="text" maxlength="25" /></div>
                </div>
                <div class="row2">
                        <div class="width40">IMEI</div>
                        <div class="width60"><input id="dialog_object_edit_imei" class="inputbox" type="text" maxlength="15" /></div>
                </div>
                <div class="row2">
                        <div class="width40">Transport model</div>
                        <div class="width60"><input id="dialog_object_edit_model" class="inputbox" type="text" value="" maxlength="30"></div>
                </div>
                <div class="row2">
                        <div class="width40">VIN</div>
                        <div class="width60"><input id="dialog_object_edit_vin" class="inputbox" type="text" maxlength="20"></div>
                </div>
                <div class="row2">
                        <div class="width40">Plate number</div>
                        <div class="width60"><input id="dialog_object_edit_plate_number" class="inputbox" type="text" maxlength="20"></div>
                </div>
                <div class="row2">
                        <div class="width40">GPS device</div>
                        <div class="width60"><input id="dialog_object_edit_device" class="inputbox" type="text" maxlength="30"></select></div>
                </div>
                <div class="row2">
                        <div class="width40">SIM card number</div>
                        <div class="width60"><input id="dialog_object_edit_sim_number" class="inputbox" type="text" value="" maxlength="30"></div>
                </div>
                <div class="row2">
                        <div class="width40">Manager</div>
                        <div class="width60"><select id="dialog_object_edit_manager_id" class="select width100"></select></div>
                </div>
                <div class="row2">
                        <div class="width40">Expire on</div>
                        <div class="width10"><input id="dialog_object_edit_object_expire" class="checkbox" type="checkbox" onChange="objectEditCheck();"/></div>
                        <div class="width50"><input class="inputbox-calendar inputbox width100" id="dialog_object_edit_object_expire_dt"/></div>
                </div>
                <div class="row2">
                        <div class="width100">
                                <select id="dialog_object_edit_users" multiple="multiple" class="width100"></select>
                        </div>
                </div>	
        </div>
        
        <center>
                <input class="button icon-save icon" type="button" onclick="objectEdit('save');" value="Save" />&nbsp;
                <input class="button icon-close icon" type="button" onclick="objectEdit('cancel');" value="Cancel" />
        </center>
</div>						
			<div id="dialog_theme_properties" title="Theme properties">
	<div class="row">
		<div class="title-block">Theme</div>
		<div class="row2">
			<div class="width245">Name</div>
			<div class="width755"><input id="dialog_theme_name" class="inputbox" type="text" value="" maxlength="50"></div>
		</div>
		<div class="row2">
			<div class="width245">Active</div>
			<div class="width755"><input id="dialog_theme_active" type="checkbox"/></div>
		</div>
	</div>
	<div class="row">
		<div class="title-block">Login</div>
		<div class="block width50">
			<div class="container">
				<div class="row2">
					<div class="width50">
						Show logo					</div>
					<div class="width25">
						<select id="dialog_theme_login_dialog_logo" class="select width100" />
							<option value="yes">Yes</option>
							<option value="no">No</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Logo position					</div>
					<div class="width25">
						<select id="dialog_theme_login_dialog_logo_position" class="select width100" />
							<option value="left">Left</option>
							<option value="center">Center</option>
							<option value="right">Right</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Background color					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_login_bg_color'/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Dialog background color					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_login_dialog_bg_color'/>
					</div>
				</div>
			</div>
		</div>
		<div class="block width50">
			<div class="container last">
				<div class="row2">
					<div class="width50">
						Dialog opacity					</div>
					<div class="width25">
						<select id="dialog_theme_login_dialog_opacity" class="select width100" />
							<option value="100">100%</option>
							<option value="90">90%</option>
							<option value="80">80%</option>
							<option value="70">70%</option>
							<option value="60">60%</option>
							<option value="50">50%</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Horizontal dialog position					</div>
					<div class="width25">
						<select id="dialog_theme_login_dialog_h_position" class="select width100" />
							<option value="left">Left</option>
							<option value="center">Center</option>
							<option value="right">Right</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Vertical dialog position					</div>
					<div class="width25">
						<select id="dialog_theme_login_dialog_v_position" class="select width100" />
							<option value="top">Top</option>
							<option value="center">Center</option>
							<option value="bottom">Bottom</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row2">
			<div class="width245">
				Bottom text			</div>
			<div class="width755">
				<textarea class="inputbox" id='dialog_theme_login_dialog_bottom_text' style="height: 60px;"></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="title-block">User interface</div>
		<div class="block width50">
			<div class="container">
				<div class="row2">
					<div class="width50">
						Top panel color					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_top_panel_color'/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Top panel border color					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_top_panel_border_color'/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Top panel selection color					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_top_panel_selection_color'/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Dialog titlebar color					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_dialog_titlebar_color'/>
					</div>
				</div>
			</div>
		</div>
		<div class="block width50">
			<div class="container last">
				<div class="row2">
					<div class="width50">
						Accent color 1					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_accent_color_1'/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Accent color 2					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_accent_color_2'/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Accent color 3					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_accent_color_3'/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Accent color 4					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_accent_color_4'/>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="title-block">Fonts</div>
		<div class="block width50">
			<div class="container">
				<div class="row2">
					<div class="width50">
						Font color					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_font_color'/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Top panel font color					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_top_panel_font_color'/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Top panel counters font color					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_top_panel_counters_font_color'/>
					</div>
				</div>
			</div>
		</div>
		<div class="block width50">
			<div class="container last">
				<div class="row2">
					<div class="width50">
						Heading font color 1					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_heading_font_color_1'/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">
						Heading font color 2					</div>
					<div class="width25">
						<input class="color inputbox width100" type='text' id='dialog_theme_ui_heading_font_color_2'/>
					</div>
				</div>
			</div>
		</div>
	</div>

	<center>
		<input class="button icon-save icon" type="button" onclick="themeProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="themeProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_custom_map_properties" title="Custom map properties">
	<div class="row">
		<div class="title-block">Custom map</div>
		<div class="row2">
			<div class="width30">Name</div>
			<div class="width70"><input id="dialog_custom_map_name" class="inputbox" type="text" value="" maxlength="50"></div>
		</div>
		<div class="row2">
			<div class="width30">Active</div>
			<div class="width70"><input id="dialog_custom_map_active" type="checkbox" checked="checked"/></div>
		</div>
		<div class="row2">
			<div class="width30">Type</div>
			<div class="width15">
				<select id="dialog_custom_map_type" class="select width100">
					<option value="tms">TMS</option>
					<option value="wms">WMS</option>
				</select>
			</div>
		</div>
		<div class="row2">
			<div class="width30">URL</div>
			<div class="width70"><input id="dialog_custom_map_url" class="inputbox" type="text" value=""></div>
		</div>
		<div class="row2">
			<div class="width30">Layers</div>
			<div class="width70"><input id="dialog_custom_map_layers" class="inputbox" type="text" value=""></div>
		</div>
	</div>

	<center>
		<input class="button icon-save icon" type="button" onclick="customMapProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="customMapProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_language_properties" title="Language properties">
	<div class="row">
		<div class="title-block">Language</div>
		<div id="dialog_language_editor" style="height: 500px; overflow-y: scroll;"></div>
	</div>

	<center>
		<input class="button icon-save icon" type="button" onclick="languageProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="languageProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_billing_properties" title="Billing properties">
	<div class="row">
		<div class="title-block">Billing plan</div>
		<div class="row2">
			<div class="width35">Name</div>
			<div class="width65"><input id="dialog_billing_name" class="inputbox" type="text" value="" maxlength="50"></div>
		</div>
		<div class="row2">
			<div class="width35">Active</div>
			<div class="width65"><input id="dialog_billing_active" type="checkbox" checked="checked"/></div>
		</div>
		<div class="row2">
			<div class="width35">Number of objects</div>
			<div class="width30"><input id="dialog_billing_objects" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
		</div>
		<div class="row2">
			<div class="width35">Period</div>
			<div class="width30"><input id="dialog_billing_period" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
			<div class="width5"></div>
			<div class="width30">
				<select id="dialog_billing_period_type" class="select width100">
					<option value="days">Days</option>
					<option value="months">Months</option>
					<option value="years">Years</option>
				</select>
			</div>
		</div>
		<div class="row2">
			<div class="width35">Price</div>
			<div class="width30"><input id="dialog_billing_price" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
		</div>
	</div>

	<center>
		<input class="button icon-save icon" type="button" onclick="billingPlanProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="billingPlanProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_template_properties" title="Template properties">
	<div class="row">
		<div class="block width60">
			<div class="container">
				<div class="title-block">Template</div>
				<div class="row2">
					<div class="width30">Name</div>
					<div class="width70"><input id="dialog_template_name" class="inputbox" type="text" value="" maxlength="50" readonly></div>
				</div>
				<div class="row2">
					<div class="width30">Language					</div>
					<div class="width20">
						<select id="dialog_template_language" class="select width100" onChange="templateProperties('load');">
							<option value="english">English</option><option value="indonesian">Indonesian</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width30">Subject</div>
					<div class="width70"><input id="dialog_template_subject" class="inputbox" maxlength="100"></div>
				</div>
				<div class="row2">
					<div class="width30">Message</div>
					<div class="width70"><textarea id="dialog_template_message" class="inputbox" style="height:255px;" maxlength="2000"></textarea></div>
				</div>
			</div>
		</div>
		<div class="block width40">
			<div class="container last">
				<div class="title-block">Variables</div>
				<div class="row2">
					<div id="dialog_template_variables" style="height: 334px; width: 100%; overflow-y: scroll;"></div>
				</div>
			</div>
		</div>
	</div>

	<center>
		<input class="button icon-save icon" type="button" onclick="templateProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="templateProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="cpanel_manage_server" style="display:none;">
	<div class="float-left cpanel-title">
		<div class="version"></div>
		<h1 class="title">Control panel <span> - Manage server</span></h1>
	</div>
	<div id="manage_server_tabs" class="clearfix">
		<ul>
			<li class="cp-server"><a href="#manage_server_server">Server</a></li>
			<li class="cp-branding_ui"><a href="#manage_server_branding_ui">Branding and UI</a></li>
			<li class="cp-languages"><a href="#manage_server_languages">Languages</a></li>
			<li class="cp-maps"><a href="#manage_server_maps">Maps</a></li>
			<li class="cp-user"><a href="#manage_server_user">User</a></li>
			<li class="cp-billing"><a href="#manage_server_billing">Billing</a></li>
			<li class="cp-templates"><a href="#manage_server_templates">Templates</a></li>
			<li class="cp-email"><a href="#manage_server_email" id="manage_server_email_tab">E-mail</a></li>
			<li class="cp-sms"><a href="#manage_server_sms">SMS</a></li>
			<li class="cp-tools"><a href="#manage_server_tools">Tools</a></li>
			<li class="cp-logs"><a href="#manage_server_logs">Logs</a></li>
			<li class="save-btn"><input class="button panel ms-save icon-save icon" type="button" onclick="serverSave();" value="Save"></li>
		</ul>
		<div class="cpanel-tabs-content">
		<div id="manage_server_server">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">Information</div>
					<div class="row2">
						<div class="width50">
							Server IP						</div>
						<div class="width50">
							<input class="inputbox width100" readOnly="true" value="127.0.0.1"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">API</div>
					<div class="row2">
						<div class="width50">
							Server API key						</div>
						<div class="width50">
							<input id="cpanel_manage_server_api_key" class="inputbox width100" readOnly="true"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Reset Server API key						</div>
						<div class="width10">
							<input class="button width100" type="button" onclick="apiKeyReset();" value="Reset" />
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Restrict server API access by IP, for multiple separate by comma						</div>
						<div class="width50">
							<input id="cpanel_manage_server_api_ip" class="inputbox width100"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">URL addresses</div>
					<div class="row2">
						<div class="width50">
							Login dialog URL						</div>
						<div class="width50">
							<input id="cpanel_manage_server_url_login" class="inputbox width100" placeholder="http://full_address_here"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Help page button URL						</div>
						<div class="width50">
							<input id="cpanel_manage_server_url_help" class="inputbox width100" placeholder="http://full_address_here"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Contact page URL						</div>
						<div class="width50">
							<input id="cpanel_manage_server_url_contact" class="inputbox width100" placeholder="http://full_address_here"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Shop page URL						</div>
						<div class="width50">
							<input id="cpanel_manage_server_url_shop" class="inputbox width100" placeholder="http://full_address_here"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							SMS Gateway application URL						</div>
						<div class="width50">
							<input id="cpanel_manage_server_url_sms_gateway_app" class="inputbox width100" placeholder="http://full_address_here"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Objects</div>
					<div class="row2">
						<div class="width50">
							Object connection timeout, resets connection and GPS status						</div>
						<div class="width10">
							<select id="cpanel_manage_server_connection_timeout" class="select width100">
								<option value="1">1 min</option>
								<option value="2">2 min</option>
								<option value="3">3 min</option>
								<option value="4">4 min</option>
								<option value="5">5 min</option>
								<option value="10">10 min</option>
								<option value="20">20 min</option>
								<option value="30">30 min</option>
								<option value="40">40 min</option>
								<option value="50">50 min</option>
								<option value="60">1 h</option>
								<option value="120">2 h</option>
								<option value="180">3 h</option>
								<option value="240">4 h</option>
								<option value="300">5 h</option>
								<option value="1440">24 h</option>
								<option value="2880">48 h</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Keep history period (days)<br/>
							Warning: Changing this value will affect existing data.						</div>
						<div class="width10">
							<input id="cpanel_manage_server_history_period" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="4" placeholder="ex. 30" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Backup</div>
					<div class="row2">
						<div class="width50">Send DB backup to e-mail at set UTC time (without history data)</div>
						<div class="width10">
							<select id="cpanel_manage_server_backup_time" class="select width100" >
								<option value="00:00">00:00</option>
<option value="00:15">00:15</option>
<option value="00:30">00:30</option>
<option value="00:45">00:45</option>
<option value="01:00">01:00</option>
<option value="01:15">01:15</option>
<option value="01:30">01:30</option>
<option value="01:45">01:45</option>
<option value="02:00">02:00</option>
<option value="02:15">02:15</option>
<option value="02:30">02:30</option>
<option value="02:45">02:45</option>
<option value="03:00">03:00</option>
<option value="03:15">03:15</option>
<option value="03:30">03:30</option>
<option value="03:45">03:45</option>
<option value="04:00">04:00</option>
<option value="04:15">04:15</option>
<option value="04:30">04:30</option>
<option value="04:45">04:45</option>
<option value="05:00">05:00</option>
<option value="05:15">05:15</option>
<option value="05:30">05:30</option>
<option value="05:45">05:45</option>
<option value="06:00">06:00</option>
<option value="06:15">06:15</option>
<option value="06:30">06:30</option>
<option value="06:45">06:45</option>
<option value="07:00">07:00</option>
<option value="07:15">07:15</option>
<option value="07:30">07:30</option>
<option value="07:45">07:45</option>
<option value="08:00">08:00</option>
<option value="08:15">08:15</option>
<option value="08:30">08:30</option>
<option value="08:45">08:45</option>
<option value="09:00">09:00</option>
<option value="09:15">09:15</option>
<option value="09:30">09:30</option>
<option value="09:45">09:45</option>
<option value="10:00">10:00</option>
<option value="10:15">10:15</option>
<option value="10:30">10:30</option>
<option value="10:45">10:45</option>
<option value="11:00">11:00</option>
<option value="11:15">11:15</option>
<option value="11:30">11:30</option>
<option value="11:45">11:45</option>
<option value="12:00">12:00</option>
<option value="12:15">12:15</option>
<option value="12:30">12:30</option>
<option value="12:45">12:45</option>
<option value="13:00">13:00</option>
<option value="13:15">13:15</option>
<option value="13:30">13:30</option>
<option value="13:45">13:45</option>
<option value="14:00">14:00</option>
<option value="14:15">14:15</option>
<option value="14:30">14:30</option>
<option value="14:45">14:45</option>
<option value="15:00">15:00</option>
<option value="15:15">15:15</option>
<option value="15:30">15:30</option>
<option value="15:45">15:45</option>
<option value="16:00">16:00</option>
<option value="16:15">16:15</option>
<option value="16:30">16:30</option>
<option value="16:45">16:45</option>
<option value="17:00">17:00</option>
<option value="17:15">17:15</option>
<option value="17:30">17:30</option>
<option value="17:45">17:45</option>
<option value="18:00">18:00</option>
<option value="18:15">18:15</option>
<option value="18:30">18:30</option>
<option value="18:45">18:45</option>
<option value="19:00">19:00</option>
<option value="19:15">19:15</option>
<option value="19:30">19:30</option>
<option value="19:45">19:45</option>
<option value="20:00">20:00</option>
<option value="20:15">20:15</option>
<option value="20:30">20:30</option>
<option value="20:45">20:45</option>
<option value="21:00">21:00</option>
<option value="21:15">21:15</option>
<option value="21:30">21:30</option>
<option value="21:45">21:45</option>
<option value="22:00">22:00</option>
<option value="22:15">22:15</option>
<option value="22:30">22:30</option>
<option value="22:45">22:45</option>
<option value="23:00">23:00</option>
<option value="23:15">23:15</option>
<option value="23:30">23:30</option>
<option value="23:45">23:45</option>							</select>
						</div>
						<div class="width1"></div>
						<div class="width39"><input id="cpanel_manage_server_backup_email" class="inputbox width100" maxlength="50" /></div>
					</div>
				</div>
			</div>
		</div>
		<div id="manage_server_branding_ui">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">Branding</div>
					<div class="row2">
						<div class="width50">
							GPS server name						</div>
						<div class="width50">
							<input id="cpanel_manage_server_name" class="inputbox width100" maxlength="50" placeholder="ex. My GPS Server" />
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Page generator tag						</div>
						<div class="width50">
							<input id="cpanel_manage_server_generator" class="inputbox width100" maxlength="50" placeholder="ex. My GPS Server" />
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Show about button						</div>
						<div class="width10">
							<select id="cpanel_manage_server_about" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Show help page button						</div>
						<div class="width10">
							<select id="cpanel_manage_server_help_page" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Images</div>
					<div class="row2">
						<div class="width235">
							<div class="ui-img-container">
								<img class="logo" id="cpanel_manage_server_logo" src="https://jontracking.com//img/logo.png" />
							</div>
						</div>
						<div class="width2"></div>
						<div class="width235">
							<div class="ui-img-container">
								<img class="logo_small" id="cpanel_manage_server_logo_small" src="https://jontracking.com//img/logo_small.png" />
							</div>
						</div>
						<div class="width2"></div>
						<div class="width235">
							<div class="ui-img-container">
								<img class="favicon" id="cpanel_manage_server_favicon" src="favicon.png" />							</div>
						</div>
						<div class="width2"></div>
						<div class="width235">
							<div class="ui-img-container">
								<img class="login-background" id="cpanel_manage_server_login_background" src="img/login-background.jpg" />							</div>
						</div>
					</div>
					<div class="row2 text">
						<div class="width235 center-middle">
							Logo, size 250 x 56 px, PNG or SVG						</div>
						<div class="width2"></div>
						<div class="width235 center-middle">
							Small logo, size 32 x 32 px, PNG or SVG						</div>
						<div class="width2"></div>
						<div class="width235 center-middle">
							Favicon, size up to 256 x 256 px, PNG or ICO						</div>
						<div class="width2"></div>
						<div class="width235 center-middle">
							Login background, size 1920 x 1080 px, JPEG						</div>
					</div>
					<div class="row2">
						<div class="width235 center-middle">
							<input class="button" type="button" value="Upload" onclick="uploadLogo();"/>
							<input id="cpanel_manage_server_logo_filename" class="inputbox" style="display: none;"/>
						</div>
						<div class="width2"></div>
						<div class="width235 center-middle">
							<input class="button" type="button" value="Upload" onclick="uploadLogoSmall();"/>
							<input id="cpanel_manage_server_logo_small_filename" class="inputbox" style="display: none;"/>
						</div>
						<div class="width2"></div>
						<div class="width235 center-middle">
							<input class="button" type="button" value="Upload" onclick="uploadFavicon();"/>&nbsp;
							<input class="button" type="button" value="Delete" onclick="deleteFavicon();"/>
						</div>
						<div class="width2"></div>
						<div class="width235 center-middle">
							<input class="button" type="button" value="Upload" onclick="uploadLoginBackground();"/>&nbsp;
							<input class="button" type="button" value="Delete" onclick="deleteLoginBackground();"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Themes</div>
					<div class="row2">
						<div class="width100">
							<div class="float-right">
								<a href="#" onclick="loadGridList('themes');">
									<div class="panel-button"  title="Reload">
										<img src="theme/images/refresh-color.svg" width="16px" border="0"/>
									</div>
								</a>
								<a href="#" onclick="themeProperties('add');">
									<div class="panel-button"  title="Add">
										<img src="theme/images/theme.svg" width="16px" border="0"/>
									</div>
								</a>
								<a href="#" onclick="themeDeleteAll();">
									<div class="panel-button"  title="Delete all">
										<img src="theme/images/remove2.svg" width="16px" border="0"/>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="width100">
						<table id="cpanel_manage_server_theme_list_grid"></table>
					</div>
				</div>
			</div>
		</div>
		<div id="manage_server_languages">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">Languages</div>
					<div class="width100">
						<table id="cpanel_manage_server_language_list_grid"></table>
					</div>
				</div>
			</div>
		</div>
		<div id="manage_server_maps">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">Available maps</div>
					<div class="row2">
						<div class="width50">
							OSM Map
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_map_osm" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Bing Maps
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_map_bing" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Google Maps
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_map_google" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Google Maps Street View
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_map_google_street_view" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Google Maps Traffic
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_map_google_traffic" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Mapbox Maps
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_map_mapbox" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							ArcGIS Maps
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_map_arcgis" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Yandex Map
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_map_yandex" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Geocoder</div>
					<div class="row2">
						<div class="width50">
							Geocoder service						</div>
						<div class="width10">
							<select id="cpanel_manage_server_geocoder_service" class="select width100" />
								<option value="bing">Bing</option>
								<option value="google">Google</option>
								<option value="mapbox">Mapbox</option>
								<option value="nominatim">Nominatim</option>
								<option value="pickpoint">PickPoint</option>
								<option value="custom">Custom</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Use geocoder cache, this will reduce API calls to geocoder servers and make some address responses faster						</div>
						<div class="width10">
							<select id="cpanel_manage_server_geocoder_cache" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Clear geocoder cache						</div>
						<div class="width10">
							<input class="button width100" type="button" onclick="geocoderClearCache();" value="Clear" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Map license keys</div>
					<div class="row2">
						<div class="width50">
							Bing Maps key (get it here: https://www.bingmapsportal.com)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_map_bing_key" class="inputbox"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Google Maps key (get it here: https://developers.google.com)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_map_google_key" class="inputbox"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Mapbox Maps key (get it here: https://www.mapbox.com)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_map_mapbox_key" class="inputbox"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							ArcGIS Maps key (get it here: https://www.arcgis.com)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_map_arcgis_key" class="inputbox"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Yandex Maps key (get it here: https://tech.yandex.com/maps)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_map_yandex_key" class="inputbox"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Geocoder license keys</div>
					<div class="row2">
						<div class="width50">
							Bing Geocoder key (get it here: https://www.bingmapsportal.com)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_geocoder_bing_key" class="inputbox"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Google Geocoder key (get it here: https://developers.google.com)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_geocoder_google_key" class="inputbox"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Mapbox Geocoder key (get it here: https://www.mapbox.com)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_geocoder_mapbox_key" class="inputbox"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							PickPoint Geocoder key (get it here: https://www.pickpoint.io)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_geocoder_pickpoint_key" class="inputbox"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Map routing</div>
					<div class="row2">
						<div class="width50">
							OSMR service URL						</div>
						<div class="width50">
							<input id="cpanel_manage_server_routing_osmr_service_url" class="inputbox"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Map layer, zoom and position after user login</div>
					<div class="row2">
						<div class="width50">
							Layer						</div>
						<div class="width10">
							<select id="cpanel_manage_server_map_layer" class="select width100" />
								<option value="osm">OSM Map</option>
								<option value="broad">Bing Road</option>
								<option value="baer">Bing Aerial</option>
								<option value="bhyb">Bing Hybrid</option>
								<option value="gmap">Google Streets</option>
								<option value="gsat">Google Satellite</option>
								<option value="ghyb">Google Hybrid</option>
								<option value="gter">Google Terrain</option>
								<option value="mbmap">Mapbox Streets</option>
								<option value="mbsat">Mapbox Satellite</option>
								<option value="agtop">ArcGIS Topographic</option>
								<option value="agstr">ArcGIS Streets</option>
								<option value="agimg">ArcGIS Imagery</option>
								<option value="yandex">Yandex</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Zoom						</div>
						<div class="width10">
							<select id="cpanel_manage_server_map_zoom" class="select width100" />
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Latitude						</div>
						<div class="width10">
							<input id="cpanel_manage_server_map_lat" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="10" placeholder="ex. 25.000000"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Longitude						</div>
						<div class="width10">
							<input id="cpanel_manage_server_map_lng" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="10" placeholder="ex. 0.000000"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Address display</div>
					<div class="row2 text">
						<div class="width100">
							Warning:  Enabling address display features will raise geocoder requests and you may run out of geocoder service quota. Please consider first before enabling this feature.						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Object data list						</div>
						<div class="width10">
							<select id="cpanel_manage_server_address_display_object_data_list" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Event data list						</div>
						<div class="width10">
							<select id="cpanel_manage_server_address_display_event_data_list" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							History route data list						</div>
						<div class="width10">
							<select id="cpanel_manage_server_address_display_history_route_data_list" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Custom maps</div>
					<div class="row2">
						<div class="width100">
							<div class="float-right">
								<a href="#" onclick="loadGridList('custom_maps');">
									<div class="panel-button"  title="Reload">
										<img src="theme/images/refresh-color.svg" width="16px" border="0"/>
									</div>
								</a>
								<a href="#" onclick="customMapProperties('add');">
									<div class="panel-button"  title="Add">
										<img src="theme/images/map.svg" width="16px" border="0"/>
									</div>
								</a>
								<a href="#" onclick="customMapDeleteAll();">
									<div class="panel-button"  title="Delete all">
										<img src="theme/images/remove2.svg" width="16px" border="0"/>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="width100">
						<table id="cpanel_manage_server_custom_map_list_grid"></table>
					</div>
				</div>
			</div>
		</div>
		<div id="manage_server_user">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">Login</div>
					<div class="row2">
						<div class="width50">
							Page after Administrator or Manager login						</div>
						<div class="width10">
							<select id="cpanel_manage_server_page_after_login" class="select width100" />
								<option value="account">Account</option>
								<option value="cpanel">Control panel</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Show/hide password button						</div>
						<div class="width10">
							<select id="cpanel_manage_server_show_hide_password" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Create account</div>
					<div class="row2">
						<div class="width50">
							User registration via login dialog						</div>
						<div class="width10">
							<select id="cpanel_manage_server_allow_registration" class="select width100" onChange="serverCheck();" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Expire account (days after account registration)						</div>
						<div class="width10">
							<select id="cpanel_manage_server_account_expire" class="select width100" onChange="serverCheck();">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
						<div class="width1"></div>
						<div class="width8">
							<input id="cpanel_manage_server_account_expire_period" class="inputbox width100" onkeypress="return isNumberKey(event);" maxlength="4" placeholder="ex. 1"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Defaults</div>
					<div class="row2">
						<div class="width50">
							OSM Map
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_user_map_osm" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Bing Maps
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_user_map_bing" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Google Maps
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_user_map_google" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Google Maps Street View
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_user_map_google_street_view" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Google Maps Traffic
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_user_map_google_traffic" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Mapbox Maps
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_user_map_mapbox" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							ArcGIS Maps
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_user_map_arcgis" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Yandex Map
						</div>
						<div class="width10">
							<select id="cpanel_manage_server_user_map_yandex" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Language						</div>
						<div class="width10">
							<select id="cpanel_manage_server_language" class="select width100">
								<option value="english">English</option><option value="indonesian">Indonesian</option>							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">Unit of distance</div>
						<div class="width10">
							<select id="cpanel_manage_server_distance_unit" class="select width100">
								<option value="km">Kilometer</option>
								<option value="mi">Mile</option>
								<option value="nm">Nautical mile</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">Unit of capacity</div>
						<div class="width10">
							<select id="cpanel_manage_server_capacity_unit" class="select width100">
								<option value="l">Liter</option>
								<option value="g">Gallon</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">Unit of temperature</div>
						<div class="width10">
							<select id="cpanel_manage_server_temperature_unit" class="select width100">
								<option value="c">Celsius</option>
								<option value="f">Fahrenheit</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">Currency</div>
						<div class="width10">
							<input id="cpanel_manage_server_currency" class="inputbox width100" type="text" value="" maxlength="3">
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Time zone						</div>
						<div class="width10">
							<select id="cpanel_manage_server_timezone" class="select width100">
								<option value="- 12 hour">(UTC -12:00)</option>
<option value="- 11 hour">(UTC -11:00)</option>
<option value="- 10 hour - 30 minutes">(UTC -10:30)</option>
<option value="- 10 hour">(UTC -10:00)</option>
<option value="- 9 hour">(UTC -9:00)</option>
<option value="- 8 hour">(UTC -8:00)</option>
<option value="- 7 hour">(UTC -7:00)</option>
<option value="- 6 hour">(UTC -6:00)</option>
<option value="- 5 hour">(UTC -5:00)</option>
<option value="- 4 hour - 30 minutes">(UTC -4:30)</option>
<option value="- 4 hour">(UTC -4:00)</option>
<option value="- 3 hour - 30 minutes">(UTC -3:30)</option>
<option value="- 3 hour">(UTC -3:00)</option>
<option value="- 2 hour">(UTC -2:00)</option>
<option value="- 1 hour">(UTC -1:00)</option>
<option value="+ 0 hour">(UTC 0:00)</option>
<option value="+ 1 hour">(UTC +1:00)</option>
<option value="+ 2 hour">(UTC +2:00)</option>
<option value="+ 3 hour">(UTC +3:00)</option>
<option value="+ 3 hour + 30 minutes">(UTC +3:30)</option>
<option value="+ 4 hour">(UTC +4:00)</option>
<option value="+ 4 hour + 30 minutes">(UTC +4:30)</option>
<option value="+ 4 hour + 45 minutes">(UTC +4:45)</option>
<option value="+ 5 hour">(UTC +5:00)</option>
<option value="+ 5 hour + 30 minutes">(UTC +5:30)</option>
<option value="+ 5 hour + 45 minutes">(UTC +5:45)</option>
<option value="+ 6 hour">(UTC +6:00)</option>
<option value="+ 6 hour + 30 minutes">(UTC +6:30)</option>
<option value="+ 7 hour">(UTC +7:00)</option>
<option value="+ 8 hour">(UTC +8:00)</option>
<option value="+ 9 hour">(UTC +9:00)</option>
<option value="+ 9 hour + 30 minutes">(UTC +9:30)</option>
<option value="+ 10 hour">(UTC +10:00)</option>
<option value="+ 10 hour + 30 minutes">(UTC +10:30)</option>
<option value="+ 11 hour">(UTC +11:00)</option>
<option value="+ 12 hour">(UTC +12:00)</option>
<option value="+ 12 hour + 45 minutes">(UTC +12:45)</option>
<option value="+ 13 hour">(UTC +13:00)</option>
<option value="+ 14 hour">(UTC +14:00)</option>							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">Daylight saving time (DST)</div>
						<div class="width2">
							<input id="cpanel_manage_server_dst" type="checkbox" class="checkbox" onchange="serverCheck();"/>
						</div>
						<div class="width8">
							<input class="inputbox-calendar-mmdd inputbox width100" id="cpanel_manage_server_dst_start_mmdd" type="text" value=""/>
						</div>
						<div class="width1"></div>
						<div class="width8">
							<select id="cpanel_manage_server_dst_start_hhmm" class="select width100">
								<option value="00:00">00:00</option>
<option value="00:15">00:15</option>
<option value="00:30">00:30</option>
<option value="00:45">00:45</option>
<option value="01:00">01:00</option>
<option value="01:15">01:15</option>
<option value="01:30">01:30</option>
<option value="01:45">01:45</option>
<option value="02:00">02:00</option>
<option value="02:15">02:15</option>
<option value="02:30">02:30</option>
<option value="02:45">02:45</option>
<option value="03:00">03:00</option>
<option value="03:15">03:15</option>
<option value="03:30">03:30</option>
<option value="03:45">03:45</option>
<option value="04:00">04:00</option>
<option value="04:15">04:15</option>
<option value="04:30">04:30</option>
<option value="04:45">04:45</option>
<option value="05:00">05:00</option>
<option value="05:15">05:15</option>
<option value="05:30">05:30</option>
<option value="05:45">05:45</option>
<option value="06:00">06:00</option>
<option value="06:15">06:15</option>
<option value="06:30">06:30</option>
<option value="06:45">06:45</option>
<option value="07:00">07:00</option>
<option value="07:15">07:15</option>
<option value="07:30">07:30</option>
<option value="07:45">07:45</option>
<option value="08:00">08:00</option>
<option value="08:15">08:15</option>
<option value="08:30">08:30</option>
<option value="08:45">08:45</option>
<option value="09:00">09:00</option>
<option value="09:15">09:15</option>
<option value="09:30">09:30</option>
<option value="09:45">09:45</option>
<option value="10:00">10:00</option>
<option value="10:15">10:15</option>
<option value="10:30">10:30</option>
<option value="10:45">10:45</option>
<option value="11:00">11:00</option>
<option value="11:15">11:15</option>
<option value="11:30">11:30</option>
<option value="11:45">11:45</option>
<option value="12:00">12:00</option>
<option value="12:15">12:15</option>
<option value="12:30">12:30</option>
<option value="12:45">12:45</option>
<option value="13:00">13:00</option>
<option value="13:15">13:15</option>
<option value="13:30">13:30</option>
<option value="13:45">13:45</option>
<option value="14:00">14:00</option>
<option value="14:15">14:15</option>
<option value="14:30">14:30</option>
<option value="14:45">14:45</option>
<option value="15:00">15:00</option>
<option value="15:15">15:15</option>
<option value="15:30">15:30</option>
<option value="15:45">15:45</option>
<option value="16:00">16:00</option>
<option value="16:15">16:15</option>
<option value="16:30">16:30</option>
<option value="16:45">16:45</option>
<option value="17:00">17:00</option>
<option value="17:15">17:15</option>
<option value="17:30">17:30</option>
<option value="17:45">17:45</option>
<option value="18:00">18:00</option>
<option value="18:15">18:15</option>
<option value="18:30">18:30</option>
<option value="18:45">18:45</option>
<option value="19:00">19:00</option>
<option value="19:15">19:15</option>
<option value="19:30">19:30</option>
<option value="19:45">19:45</option>
<option value="20:00">20:00</option>
<option value="20:15">20:15</option>
<option value="20:30">20:30</option>
<option value="20:45">20:45</option>
<option value="21:00">21:00</option>
<option value="21:15">21:15</option>
<option value="21:30">21:30</option>
<option value="21:45">21:45</option>
<option value="22:00">22:00</option>
<option value="22:15">22:15</option>
<option value="22:30">22:30</option>
<option value="22:45">22:45</option>
<option value="23:00">23:00</option>
<option value="23:15">23:15</option>
<option value="23:30">23:30</option>
<option value="23:45">23:45</option>							</select>
						</div>
						<div class="width2 center-middle">-</div>
						<div class="width8">
							<input class="inputbox-calendar-mmdd inputbox width100" id="cpanel_manage_server_dst_end_mmdd" type="text" value=""/>
						</div>
						<div class="width1"></div>
						<div class="width8">
							<select id="cpanel_manage_server_dst_end_hhmm" class="select width100">
								<option value="00:00">00:00</option>
<option value="00:15">00:15</option>
<option value="00:30">00:30</option>
<option value="00:45">00:45</option>
<option value="01:00">01:00</option>
<option value="01:15">01:15</option>
<option value="01:30">01:30</option>
<option value="01:45">01:45</option>
<option value="02:00">02:00</option>
<option value="02:15">02:15</option>
<option value="02:30">02:30</option>
<option value="02:45">02:45</option>
<option value="03:00">03:00</option>
<option value="03:15">03:15</option>
<option value="03:30">03:30</option>
<option value="03:45">03:45</option>
<option value="04:00">04:00</option>
<option value="04:15">04:15</option>
<option value="04:30">04:30</option>
<option value="04:45">04:45</option>
<option value="05:00">05:00</option>
<option value="05:15">05:15</option>
<option value="05:30">05:30</option>
<option value="05:45">05:45</option>
<option value="06:00">06:00</option>
<option value="06:15">06:15</option>
<option value="06:30">06:30</option>
<option value="06:45">06:45</option>
<option value="07:00">07:00</option>
<option value="07:15">07:15</option>
<option value="07:30">07:30</option>
<option value="07:45">07:45</option>
<option value="08:00">08:00</option>
<option value="08:15">08:15</option>
<option value="08:30">08:30</option>
<option value="08:45">08:45</option>
<option value="09:00">09:00</option>
<option value="09:15">09:15</option>
<option value="09:30">09:30</option>
<option value="09:45">09:45</option>
<option value="10:00">10:00</option>
<option value="10:15">10:15</option>
<option value="10:30">10:30</option>
<option value="10:45">10:45</option>
<option value="11:00">11:00</option>
<option value="11:15">11:15</option>
<option value="11:30">11:30</option>
<option value="11:45">11:45</option>
<option value="12:00">12:00</option>
<option value="12:15">12:15</option>
<option value="12:30">12:30</option>
<option value="12:45">12:45</option>
<option value="13:00">13:00</option>
<option value="13:15">13:15</option>
<option value="13:30">13:30</option>
<option value="13:45">13:45</option>
<option value="14:00">14:00</option>
<option value="14:15">14:15</option>
<option value="14:30">14:30</option>
<option value="14:45">14:45</option>
<option value="15:00">15:00</option>
<option value="15:15">15:15</option>
<option value="15:30">15:30</option>
<option value="15:45">15:45</option>
<option value="16:00">16:00</option>
<option value="16:15">16:15</option>
<option value="16:30">16:30</option>
<option value="16:45">16:45</option>
<option value="17:00">17:00</option>
<option value="17:15">17:15</option>
<option value="17:30">17:30</option>
<option value="17:45">17:45</option>
<option value="18:00">18:00</option>
<option value="18:15">18:15</option>
<option value="18:30">18:30</option>
<option value="18:45">18:45</option>
<option value="19:00">19:00</option>
<option value="19:15">19:15</option>
<option value="19:30">19:30</option>
<option value="19:45">19:45</option>
<option value="20:00">20:00</option>
<option value="20:15">20:15</option>
<option value="20:30">20:30</option>
<option value="20:45">20:45</option>
<option value="21:00">21:00</option>
<option value="21:15">21:15</option>
<option value="21:30">21:30</option>
<option value="21:45">21:45</option>
<option value="22:00">22:00</option>
<option value="22:15">22:15</option>
<option value="22:30">22:30</option>
<option value="22:45">22:45</option>
<option value="23:00">23:00</option>
<option value="23:15">23:15</option>
<option value="23:30">23:30</option>
<option value="23:45">23:45</option>							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Add objects						</div>
						<div class="width10">
							<select id="cpanel_manage_server_obj_add" class="select width100" onChange="serverCheck();">
								<option value="true">Yes</option>
								<option value="false">No</option>
								<option value="trial">Trial</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Object limit						</div>
						<div class="width10">
							<select id="cpanel_manage_server_obj_limit" class="select width100" onChange="serverCheck();">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
						<div class="width1"></div>
						<div class="width8">
							<input id="cpanel_manage_server_obj_limit_num" onkeypress="return isNumberKey(event);" class="inputbox width100" maxlength="4" placeholder="ex. 10"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Object date limit (days after account registration)						</div>
						<div class="width10">
							<select id="cpanel_manage_server_obj_days" class="select width100" onChange="serverCheck();">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
						<div class="width1"></div>
						<div class="width8">
							<input id="cpanel_manage_server_obj_days_num" onkeypress="return isNumberKey(event);" class="inputbox width100" maxlength="4" placeholder="ex. 30"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Object trial limit (days)						</div>
						<div class="width10">
							<input id="cpanel_manage_server_obj_days_trial" onkeypress="return isNumberKey(event);" class="inputbox width100" maxlength="4" placeholder="ex. 7"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Edit objects						</div>
						<div class="width10">
							<select id="cpanel_manage_server_obj_edit" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Delete objects						</div>
						<div class="width10">
							<select id="cpanel_manage_server_obj_delete" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Clear objects history						</div>
						<div class="width10">
							<select id="cpanel_manage_server_obj_history_clear" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							KML						</div>
						<div class="width10">
							<select id="cpanel_manage_server_kml" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Dashboard						</div>
						<div class="width10">
							<select id="cpanel_manage_server_dashboard" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							History						</div>
						<div class="width10">
							<select id="cpanel_manage_server_history" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Reports						</div>
						<div class="width10">
							<select id="cpanel_manage_server_reports" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2" style="display: none;">
						<div class="width50">
							Tachograph						</div>
						<div class="width10">
							<select id="cpanel_manage_server_tachograph" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Tasks						</div>
						<div class="width10">
							<select id="cpanel_manage_server_tasks" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							RFID and iButton logbook						</div>
						<div class="width10">
							<select id="cpanel_manage_server_rilogbook" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							DTC (Diagnostic Trouble Codes)						</div>
						<div class="width10">
							<select id="cpanel_manage_server_dtc" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Maintenance						</div>
						<div class="width10">
							<select id="cpanel_manage_server_maintenance" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Expenses						</div>
						<div class="width10">
							<select id="cpanel_manage_server_expenses" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Object control						</div>
						<div class="width10">
							<select id="cpanel_manage_server_object_control" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Image gallery						</div>
						<div class="width10">
							<select id="cpanel_manage_server_image_gallery" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Chat						</div>
						<div class="width10">
							<select id="cpanel_manage_server_chat" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Sub accounts						</div>
						<div class="width10">
							<select id="cpanel_manage_server_subaccounts" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Server SMS Gateway						</div>
						<div class="width10">
							<select id="cpanel_manage_server_sms_gateway_server" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							API						</div>
						<div class="width10">
							<select id="cpanel_manage_server_api" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Notifications</div>
					<div class="row2">
						<div class="width50">
							Remind user about expiring objects (days before)						</div>
						<div class="width10">
							<select id="cpanel_manage_server_notify_obj_expire" class="select width100" onChange="serverCheck();">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
						<div class="width1"></div>
						<div class="width8">
							<input id="cpanel_manage_server_notify_obj_expire_period" onkeypress="return isNumberKey(event);" class="inputbox width100" maxlength="4" placeholder="ex. 1"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Remind user about expiring account (days before)						</div>
						<div class="width10">
							<select id="cpanel_manage_server_notify_account_expire" class="select width100" onChange="serverCheck();">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
						<div class="width1"></div>
						<div class="width8">
							<input id="cpanel_manage_server_notify_account_expire_period" onkeypress="return isNumberKey(event);" class="inputbox width100" maxlength="4" placeholder="ex. 1"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Other</div>
					<div class="row2">
						<div class="width50">
							Show SIM card number						</div>
						<div class="width10">
							<select id="cpanel_manage_server_sim_number" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Schedule reports						</div>
						<div class="width10">
							<select id="cpanel_manage_server_reports_schedule" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Object control default templates						</div>
						<div class="width10">
							<select id="cpanel_manage_server_object_control_default_templates" class="select width100" />
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Max. number of markers						</div>
						<div class="width50">
							<input id="cpanel_manage_server_places_markers" onkeypress="return isNumberKey(event);" class="inputbox" style="width: 100px;" maxlength="5" />
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Max. number of routes						</div>
						<div class="width50">
							<input id="cpanel_manage_server_places_routes" onkeypress="return isNumberKey(event);" class="inputbox" style="width: 100px;" maxlength="5" />
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Max. number of zones						</div>
						<div class="width50">
							<input id="cpanel_manage_server_places_zones" onkeypress="return isNumberKey(event);" class="inputbox" style="width: 100px;" maxlength="5" />
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Max. number of e-mails (daily)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_usage_email_daily" onkeypress="return isNumberKey(event);" class="inputbox" style="width: 100px;" maxlength="8" />
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Max. number of SMS (daily)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_usage_sms_daily" onkeypress="return isNumberKey(event);" class="inputbox" style="width: 100px;" maxlength="8" />
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Max. number of Webhook (daily)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_usage_webhook_daily" onkeypress="return isNumberKey(event);" class="inputbox" style="width: 100px;" maxlength="8" />
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Max. number of API calls (daily)						</div>
						<div class="width50">
							<input id="cpanel_manage_server_usage_api_daily" onkeypress="return isNumberKey(event);" class="inputbox" style="width: 100px;" maxlength="8" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="manage_server_billing">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">Billing</div>
					<div class="row2">
						<div class="width50">
							Enable billing						</div>
						<div class="width10">
							<select id="cpanel_manage_server_billing" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Gateway						</div>
						<div class="width10">
							<select id="cpanel_manage_server_billing_gateway" class="select width100" onChange="serverCheck();">
								<option value="paypalv2">PayPal v2</option>
								<option value="paypal">PayPal</option>
								<option value="custom">Custom</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Currency						</div>
						<div class="width10">
							<input id="cpanel_manage_server_billing_currency" class="inputbox width100" maxlength="4" placeholder="ex. EUR"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Recover plan from object back to billing after it is deleted from user account						</div>
						<div class="width10">
							<select id="cpanel_manage_server_billing_recover_plan" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
				</div>
				<div id="cpanel_manage_server_billing_paypalv2">
					<div class="row">
						<div class="title-block">PayPal v2 gateway</div>
						<div class="row2">
							<div class="width50">
								PayPal account							</div>
							<div class="width50">
								<input id="cpanel_manage_server_billing_paypalv2_account" class="inputbox width70" maxlength="50" placeholder="ex. my@email.com"/>
							</div>
						</div>
						<div class="row2">
							<div class="width50">
								PayPal Client ID							</div>
							<div class="width50">
								<input id="cpanel_manage_server_billing_paypalv2_client_id" class="inputbox width70" />
							</div>
						</div>
						<div class="row2">
							<div class="width50">
								PayPal custom							</div>
							<div class="width50">
								<input id="cpanel_manage_server_billing_paypalv2_custom" class="inputbox width70" />
							</div>
						</div>
						<div class="row2">
							<div class="width50">
								PayPal IPN URL							</div>
							<div class="width50">
								<input id="cpanel_manage_server_billing_paypalv2_ipn_url" class="inputbox width70" readOnly="true"/>
							</div>
						</div>
					</div>
				</div>
				<div id="cpanel_manage_server_billing_paypal">
					<div class="row">
						<div class="title-block">PayPal gateway</div>
						<div class="row2">
							<div class="width50">
								PayPal account							</div>
							<div class="width50">
								<input id="cpanel_manage_server_billing_paypal_account" class="inputbox width70" maxlength="50" placeholder="ex. my@email.com"/>
							</div>
						</div>
						<div class="row2">
							<div class="width50">
								PayPal custom							</div>
							<div class="width50">
								<input id="cpanel_manage_server_billing_paypal_custom" class="inputbox width70" />
							</div>
						</div>
						<div class="row2">
							<div class="width50">
								PayPal IPN URL							</div>
							<div class="width50">
								<input id="cpanel_manage_server_billing_paypal_ipn_url" class="inputbox width70" readOnly="true"/>
							</div>
						</div>
					</div>
				</div>
				<div id="cpanel_manage_server_billing_custom" style="display: none;">
					<div class="row">
						<div class="title-block">Custom gateway</div>
						<div class="row2">
							<div class="width50">
								Custom gateway URL							</div>
							<div class="width50">
								<textarea id="cpanel_manage_server_billing_custom_url" style="height: 75px;" class="inputbox width100" maxlength="2048" placeholder="ex. http://full_address_here"/></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="title-block">Variables</div>
						<div class="row">%USER_EMAIL% - User e-mail, used for paid account identification</div>
						<div class="row">%PLAN_ID% - Billing plan ID</div>
						<div class="row">%PLAN_NAME% - Billing plan name</div>
						<div class="row">%PLAN_PRICE% - Billing plan price</div>
						<div class="row">%CURRENCY% - Currency</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Billing plans</div>
					<div class="row2">
						<div class="width100">
							<div class="float-right">
								<a href="#" onclick="loadGridList('billing');">
									<div class="panel-button"  title="Reload">
										<img src="theme/images/refresh-color.svg" width="16px" border="0"/>
									</div>
								</a>
								<a href="#" onclick="billingPlanProperties('add');">
									<div class="panel-button"  title="Add">
										<img src="theme/images/billing-add.svg" width="16px" border="0"/>
									</div>
								</a>
								<a href="#" onclick="billingPlanDeleteAll();">
									<div class="panel-button"  title="Delete all">
										<img src="theme/images/remove2.svg" width="16px" border="0"/>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="width100">
						<table id="cpanel_manage_server_billing_plan_list_grid"></table>
					</div>
				</div>
			</div>
		</div>
		<div id="manage_server_templates">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">Templates</div>
					<div class="width100">
						<table id="cpanel_manage_server_template_list_grid"></table>
					</div>
				</div>
			</div>
		</div>
		<div id="manage_server_email">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">E-mail settings</div>
					<div class="row2">
						<div class="width50">
							E-mail address						</div>
						<div class="width50">
							<input id="cpanel_manage_server_email" class="inputbox width70" maxlength="50" placeholder="ex. server@email.com"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							No reply e-mail address						</div>
						<div class="width50">
							<input id="cpanel_manage_server_email_no_reply" class="inputbox width70" maxlength="50" placeholder="ex. no_reply@email.com"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Signature						</div>
						<div class="width50">
							<textarea id="cpanel_manage_server_email_signature" class="inputbox width70" style="height: 50px;" type='text' maxlength="200"></textarea>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							Use SMTP server						</div>
						<div class="width10">
							<select id="cpanel_manage_server_email_smtp" class="select width100" onChange="serverCheck();">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							SMTP server host						</div>
						<div class="width50">
							<input id="cpanel_manage_server_email_smtp_host" class="inputbox width70" maxlength="50" placeholder="ex. smtp.gmail.com"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							SMTP server port						</div>
						<div class="width50">
							<input id="cpanel_manage_server_email_smtp_port" class="inputbox width70" maxlength="4" placeholder="ex. 465"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							SMTP authentication						</div>
						<div class="width10">
							<select id="cpanel_manage_server_email_smtp_auth" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							SMTP security						</div>
						<div class="width10">
							<select id="cpanel_manage_server_email_smtp_secure" class="select width100">
								<option value="">None</option>
								<option value="ssl">SSL</option>
								<option value="tls">TLS</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							SMTP username						</div>
						<div class="width50">
							<input id="cpanel_manage_server_email_smtp_username" class="inputbox width70" maxlength="50" />
						</div>
					</div>
					<div class="row2">
						<div class="width50">
							SMTP password						</div>
						<div class="width50">
							<input id="cpanel_manage_server_email_smtp_password" class="inputbox width70" maxlength="80" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="manage_server_sms">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">SMS Gateway</div>
					<div class="row2">
						<div class="width40">
							Enable SMS Gateway						</div>
						<div class="width21">
							<select id="cpanel_manage_server_sms_gateway" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width40">SMS Gateway type</div>
						<div class="width21">
							<select id="cpanel_manage_server_sms_gateway_type" class="select width100" onchange="serverCheck()">
								<option value="app" selected>Mobile application</option>
								<option value="http">HTTP</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width40">Number filter, for multiple numbers separate them by comma</div>
						<div class="width60">
							<input class="inputbox" id="cpanel_manage_server_sms_gateway_number_filter" placeholder="ex. +370, +7, +44, +..."/>
						</div>
					</div>
				</div>

				<div id="cpanel_manage_server_sms_app">
					<div class="row">
						<div class="title-block">Mobile application</div>
						<div class="row">Mobile application should be used which allows to use mobile device as SMS Gateway. Below SMS Gateway identifier should be entered in mobile application settings.</div>
						<div class="row2">
							<div class="width40">SMS Gateway identifier</div>
							<div class="width21">
								<input class="inputbox" id="cpanel_manage_server_sms_gateway_identifier" readonly />
							</div>
						</div>
						<div class="row2">
							<div class="width40">Total SMS in queue to send</div>
							<div class="width10" id="cpanel_manage_server_sms_gateway_total_in_queue">0</div>
							<div class="width1"></div>
							<div class="width10">
								<input class="button width100" type="button" onclick="SMSGatewayClearQueue();" value="Clear" />
							</div>
						</div>
					</div>
				</div>
				<div id="cpanel_manage_server_sms_http" style="display: none;">
					<div class="row">
						<div class="title-block">HTTP</div>
						<div class="row">SMS Gateway, which can send messages via HTTP GET should be used.</div>
						<div class="row">SMS Gateway URL example: http://SMS_GATEWAY/sendsms.php?username=USER&password=PASSWORD&number=%NUMBER%&message=%MESSAGE%</div>
						<div class="row2">
							<div class="width40">SMS Gateway URL</div>
							<div class="width60">
								<textarea id="cpanel_manage_server_sms_gateway_url" style="height: 75px;" class="inputbox width100" maxlength="2048" placeholder="ex. http://full_address_here"/></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="title-block">Variables</div>
						<div class="row">%NUMBER% - phone number, where SMS will be sent</div>
						<div class="row">%MESSAGE% - text of SMS message</div>
					</div>
				</div>
			</div>
		</div>

		<div id="manage_server_tools">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">Server cleanup</div>
					<div class="row2">
						<div class="width40">
							Delete user accounts which do not have any active objects						</div>
						<div class="width12">
							Last login (days ago)						</div>
						<div class="width1"></div>
						<div class="width10">
							<input id="cpanel_manage_server_tools_server_cleanup_users_days" onkeypress="return isNumberKey(event);" class="inputbox width100" maxlength="5" />
						</div>
						<div class="width1"></div>
						<div class="width12">
							Auto execute						</div>
						<div class="width1"></div>
						<div class="width10">
							<select id="cpanel_manage_server_tools_server_cleanup_users_ae" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
						<div class="width1"></div>
						<div class="width12">
							<input class="button icon-create icon width100" type="button" onclick="serverCleanup('users');" value="Execute now" />
						</div>
					</div>
					<div class="row2">
						<div class="width40">
							Delete objects which are not activated						</div>
						<div class="width12">
							More than (days)						</div>
						<div class="width1"></div>
						<div class="width10">
							<input id="cpanel_manage_server_tools_server_cleanup_objects_not_activated_days" onkeypress="return isNumberKey(event);" class="inputbox width100" maxlength="5" />
						</div>
						<div class="width1"></div>
						<div class="width12">
							Auto execute						</div>
						<div class="width1"></div>
						<div class="width10">
							<select id="cpanel_manage_server_tools_server_cleanup_objects_not_activated_ae" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
						<div class="width1"></div>
						<div class="width12">
							<input class="button icon-create icon width100" type="button" onclick="serverCleanup('objects_not_activated');" value="Execute now" />
						</div>
					</div>
					<div class="row2">
						<div class="width40">
							Delete objects which are not used in any user account						</div>
						<div class="width12">
						</div>
						<div class="width1"></div>
						<div class="width10">
						</div>
						<div class="width1"></div>
						<div class="width12">
							Auto execute						</div>
						<div class="width1"></div>
						<div class="width10">
							<select id="cpanel_manage_server_tools_server_cleanup_objects_not_used_ae" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
						<div class="width1"></div>
						<div class="width12">
							<input class="button icon-create icon width100" type="button" onclick="serverCleanup('objects_not_used');" value="Execute now" />
						</div>
					</div>
					<div class="row2">
						<div class="width40">
							Delete database junk records						</div>
						<div class="width12">
						</div>
						<div class="width1"></div>
						<div class="width10">
						</div>
						<div class="width1"></div>
						<div class="width12">
							Auto execute						</div>
						<div class="width1"></div>
						<div class="width10">
							<select id="cpanel_manage_server_tools_server_cleanup_db_junk_ae" class="select width100">
								<option value="true">Yes</option>
								<option value="false">No</option>
							</select>
						</div>
						<div class="width1"></div>
						<div class="width12">
							<input class="button icon-create icon width100" type="button" onclick="serverCleanup('db_junk');" value="Execute now" />
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="manage_server_logs">
			<div class="width-1000">
				<div class="row">
					<div class="title-block">Log viewer</div>
					<div class="row2">
						<div class="width100">
							<div class="float-right">
								<a href="#" onclick="loadGridList('logs');">
									<div class="panel-button"  title="Reload">
										<img src="theme/images/refresh-color.svg" width="16px" border="0"/>
									</div>
								</a>
								<a href="#" onclick="logDeleteAll();">
									<div class="panel-button"  title="Delete all">
										<img src="theme/images/remove2.svg" width="16px" border="0"/>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="width100">
						<table id="cpanel_manage_server_log_list_grid"></table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			
						
		</div>
	</body>
</html>