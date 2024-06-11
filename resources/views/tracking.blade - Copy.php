

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="noindex">
		<meta name="googlebot" content="noindex">
        <title>JON Tracking </title>
	
		<link rel="shortcut icon" href="https://jontracking.com//favicon.png" type="image/x-icon">		
		<link type="text/css" href="theme/tracking/jquery-ui.css?v=4000" rel="Stylesheet" />
        <link type="text/css" href="theme/tracking/jquery.qtip.css?v=4000" rel="Stylesheet" />
        <link type="text/css" href="theme/tracking/ui.jqgrid.css?v=4000" rel="Stylesheet" />
        <link type="text/css" href="theme/tracking/jquery.pnotify.default.css?v=4000" rel="Stylesheet" />
		<link type="text/css" href="theme/tracking/jquery.multiple.css?v=4000" rel="Stylesheet" />
		
		<link type="text/css" href="theme/tracking/style.css?v=4000" rel="Stylesheet" />
		<link type="text/css" href="theme/tracking/style.custom.php?v=4000" rel="Stylesheet" />
		
		<link type="text/css" href="theme/tracking/leaflet/leaflet.css?v=4000" rel="Stylesheet" />
		<link type="text/css" href="theme/tracking/leaflet/markercluster.css?v=4000" rel="Stylesheet" />
		<link type="text/css" href="theme/tracking/leaflet/leaflet-routing-machine.css?v=4000" rel="Stylesheet" />
	
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyCqFagr-wKLCNqe0ePlZhu57kgVf92qshU"></script>
				
		<script type="text/javascript" src="js/tracking/leaflet/leaflet.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/es6-promise.min.js?v=4000"></script>
		<script>ES6Promise.polyfill();</script>
		
		<script type="text/javascript" src="js/tracking/md5.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/csv2json.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/xml2json.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/sprintf.min.js?v=4000"></script>
		
		<script type="text/javascript" src="js/tracking/leaflet/tile/google.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/leaflet/tile/bing.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/leaflet/tile/yandex.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/leaflet/leaflet.editable.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/leaflet/leaflet.markercluster.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/leaflet/leaflet.polylinedecorator.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/leaflet/leaflet.routingmachine.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/leaflet/marker.rotate.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/leaflet/path.drag.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/leaflet/l.kml.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/leaflet/leaflet.browser.print.min.js?v=4000"></script>
		
				
		<script type="text/javascript" src="js/tracking/jquery-2.1.4.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery-migrate-1.2.1.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery-ui.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.qtip.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.jqGrid.locale.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.jqGrid.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.pnotify.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.generatefile.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.blockUI.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.multiple.js?v=4000"></script>
		
		<script type="text/javascript" src="js/tracking/jquery.flot.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.flot.crosshair.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.flot.navigate.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.flot.selection.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.flot.time.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.flot.resize.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.flot.pie.min.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/jquery.flot.categories.min.js?v=4000"></script>
		
		<script type="text/javascript" src="js/tracking/jscolor.js?v=4000"></script>
		
		<script type="text/javascript" src="js/tracking/moment.min.js?v=4000"></script>	
		
		<script type="text/javascript" src="js/tracking/push.min.js?v=4000"></script>
		
		<script type="text/javascript" src="js/tracking/gs.config.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/gs.common.js?v=4000"></script>
		<script type="text/javascript" src="js/tracking/gs.connect.js?v=4000"></script>
        
                	<script type="text/javascript" src="js/tracking/gs.main.js?v=4000"></script>
            </head>
    
    <body onload="load()" onUnload="unload()">
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
					<a href="https://jontracking.com">Session has expired. Please login again.</a>				</div>
			</div>
		</div>
	</div>
	
	<div id="content" style="visibility: hidden;">
		<div id="map"></div>

<div class="map-layer-control">
	<div class="row4">
		<select id="map_layer" class="select" style="min-width: 100px;" onChange="switchMapLayer($(this).val());"></select>
	</div>
</div>

<div id="history_view_control" class="history-view-control">
	<a href="#" onclick="historyRouteRouteToggle();" title="Enable/disable route">
		<span class="icon-route-route" id="history_view_control_route"></span>
	</a>
	<a href="#" onclick="historyRouteSnapToggle();" title="Enable/disable snap">
		<span class="icon-route-snap disabled" id="history_view_control_snap"></span>
	</a>
	<a href="#" onclick="historyRouteArrowsToggle();" title="Enable/disable arrows">
		<span class="icon-route-arrow disabled" id="history_view_control_arrows"></span>
	</a>
	<a href="#" onclick="historyRouteDataPointsToggle();" title="Enable/disable data points">
		<span class="icon-route-data-point disabled" id="history_view_control_data_points"></span>
	</a>
	<a href="#" onclick="historyRouteStopsToggle();" title="Enable/disable stops">
		<span class="icon-route-stop" id="history_view_control_stops"></span>
	</a>
	<a href="#" onclick="historyRouteEventsToggle();" title="Enable/disable events">
		<span class="icon-route-event" id="history_view_control_events"></span>
	</a>
	<a href="#" onclick="historyHideRoute();" title="Hide">
		<span class="icon-close"></span>
	</a>
</div>

<div id="camera_control" class="camera-control">
	Camera</div>

<div id="street_view_control" class="street-view-control">
	Street View</div>

<div id="top_panel">
	<div class="tp-menu left-menu">
				<div class="about-btn">
			<a href="#" onclick="$('#dialog_about').dialog('open');" title="About">
				<img src="https://jontracking.com/img/logo_small.png" border="0"/>
			</a>
		</div>
						<div class="help-btn">
			<a href="https://wa.me/message/NAJBHDAXPOBQD1" target="_blank" title="Help">
				<img src="theme/tracking/images/info.svg" border="0"/>
			</a>
		</div>
				<div class="settings-btn">
			<a href="#" onclick="settingsOpen();" title="Settings">
				<img src="theme/tracking/images/settings.svg" border="0"/>
			</a>
		</div>
				<div class="dashboard-btn">
			<a href="#" onclick="dashboardOpen();" title="Dashboard">
				<img src="theme/tracking/images/dashboard.svg" border="0"/>
			</a>
		</div>
				<div class="point-btn">
			<a href="#" onclick="$('#dialog_show_point').dialog('open');" title="Show point">
				<img src="theme/tracking/images/marker.svg" border="0"/>
			</a>
		</div>
		<div class="search-btn">
			<a href="#" onclick="$('#dialog_address_search').dialog('open');" title="Address search">
				<img src="theme/tracking/images/search.svg" border="0"/>
			</a>
		</div>
				<div class="report-btn">
			<a href="#" onclick="reportsOpen();" title="Reports">
				<img src="theme/tracking/images/report.svg" border="0"/>
			</a>
		</div>
								<div class="tasks-btn">
			<a href="#" onclick="tasksOpen();" title="Tasks">
				<img src="theme/tracking/images/tasks.svg" border="0"/>
			</a>
		</div>
						<div class="rilogbook-btn">
			<a href="#" onclick="rilogbookOpen();" title="RFID and iButton logbook">
				<img src="theme/tracking/images/logbook.svg" border="0"/>
			</a>
		</div>
						<div class="dtc-btn">
			<a href="#" onclick="dtcOpen();" title="DTC (Diagnostic Trouble Codes)">
				<img src="theme/tracking/images/dtc.svg" border="0"/>
			</a>
		</div>
						<div class="maintenance-btn">
			<a href="#" onclick="maintenanceOpen();" title="Maintenance">
				<img src="theme/tracking/images/maintenance.svg" border="0"/>
			</a>
		</div>
						<div class="expenses-btn">
			<a href="#" onclick="expensesOpen();" title="Expenses">
				<img src="theme/tracking/images/expenses.svg" border="0"/>
			</a>
		</div>
						<div class="cmd-btn">
			<a href="#" onclick="cmdOpen();" title="Object control">
				<img src="theme/tracking/images/cmd.svg" border="0"/>
			</a>
		</div>
						<div class="gallery-btn">
			<a href="#" onclick="imgOpen();" title="Image gallery">
				<img src="theme/tracking/images/gallery.svg" border="0"/>
			</a>
		</div>
						<div class="chat-btn">
			<a href="#" onclick="chatOpen();" title="Chat">
				<img class="float-left" src="theme/tracking/images/chat.svg" border="0"/>
				<span id="chat_msg_count">0</span>
			</a>
		</div>
			</div>
    
	<div class="tp-menu right-menu">				
		<div class="select-language cp">
			<select id="system_language" onChange="switchLanguageTracking();" class="select">
			<option value="english">English</option><option value="indonesian">Indonesian</option>			</select>
		</div>
				<div class="cpanel-btn">
			<a href="control-panel" title="Control panel">
				<img src="theme/tracking/images/cogs-white.svg" border="0"/>
			</a>
		</div>
						<div class="billing-btn">
			<a href="#" onclick="billingOpen();" title="Billing">
				<img class="float-left" src="theme/tracking/images/cart-white.svg" border="0"/>
				<span id="billing_plan_count">0</span>
			</a>
		</div>
				<div class="user-btn">
			{{-- <a href="#" onclick="settingsOpenUser();" title="My account">
				<img src="theme/tracking/images/user.svg" border="0"/>
				<span>jonusamonitor</span>
			</a> --}}
		</div>
		<div class="mobile-btn">
			<a href="mobile/tracking.php" title="Mobile version">
				<img src="theme/tracking/images/mobile.svg" border="0"/>
			</a>
		</div>
		<div class="logout-btn">
			<a href="#" onclick="connectLogout();" title="Log out">
				<img src="theme/tracking/images/logout.svg" border="0"/>
			</a>
		</div>
	</div>
</div>

<div id="side_panel">
	<ul>           
		<li><a href="#side_panel_objects" onclick="datalistBottomSwitch('object');">Objects</a></li>
		<li><a href="#side_panel_events" onclick="datalistBottomSwitch('event');">Events</a></li>
		<li><a href="#side_panel_places" id="side_panel_places_tab">Places</a></li>
		<li><a href="#side_panel_history" onclick="datalistBottomSwitch('route');">History</a></li>
	</ul>
	      
	<div id="side_panel_objects">
		<div id="side_panel_objects_object_list">
			<table id="side_panel_objects_object_list_grid"></table>
		</div>
		<div id="side_panel_objects_dragbar">
		</div>
		<div id="side_panel_objects_object_data_list">
			<table id="side_panel_objects_object_data_list_grid"></table>
		</div>
	</div>
	
	<div id="side_panel_events">
		<div id="side_panel_events_event_list">
		       <table id="side_panel_events_event_list_grid"></table>
		       <div id="side_panel_events_event_list_grid_pager"></div>
	       </div>
	       <div id="side_panel_events_dragbar">
	       </div>
	       <div id="side_panel_events_event_data_list">
		       <table id="side_panel_events_event_datalist_grid"></table>
	       </div>
	</div>
    
	<div id="side_panel_places">
		<ul>
			<li><a href="#side_panel_places_markers" id="side_panel_places_markers_tab"><span>Markers </span><span id="side_panel_places_markers_num"></span></a></li>
			<li><a href="#side_panel_places_routes" id="side_panel_places_routes_tab"><span>Routes </span><span id="side_panel_places_routes_num"></span></a></li>
			<li><a href="#side_panel_places_zones" id="side_panel_places_zones_tab"><span>Zones </span><span id="side_panel_places_zones_num"></span></a></li>
		</ul>
		
		<div id="side_panel_places_markers">
			<div id="side_panel_places_marker_list">
				<table id="side_panel_places_marker_list_grid"></table>
				<div id="side_panel_places_marker_list_grid_pager"></div>
			</div>
		</div>
		
		<div id="side_panel_places_routes">
			<div id="side_panel_places_route_list">
				<table id="side_panel_places_route_list_grid"></table>
				<div id="side_panel_places_route_list_grid_pager"></div>
			</div>
		</div>
		
		<div id="side_panel_places_zones">
			<div id="side_panel_places_zone_list">
				<table id="side_panel_places_zone_list_grid"></table>
				<div id="side_panel_places_zone_list_grid_pager"></div>
			</div>
		</div>
	</div>
    
	<div id="side_panel_history">
		<div id="side_panel_history_parameters">
			<div class="row2">
			    <div class="width35">Object</div>
			    <div class="width65"><select id="side_panel_history_object_list" class="select-search width100"></select></div>
			</div>
			<div class="row2">
				<div class="width35">Filter</div>
				<div class="width65">
				    <select id="side_panel_history_filter" class="select width100" onchange="switchDateFilter('history');">
					<option value="0" selected></option>
					<option value="1">Last hour</option>
					<option value="2">Today</option>
					<option value="3">Yesterday</option>
					<option value="4">Before 2 days</option>
					<option value="5">Before 3 days</option>
					<option value="6">This week</option>
					<option value="7">Last week</option>
					<option value="8">This month</option>
					<option value="9">Last month</option>
				    </select>
				</div>
			</div>
			<div class="row2">
				<div class="width35">Time from</div>
				<div class="width31">
					<input readonly class="inputbox-calendar inputbox width100" id="side_panel_history_date_from" type="text" value=""/>
				</div>
				<div class="width2"></div>
				<div class="width15">
					<select id="side_panel_history_hour_from" class="select width100">
					<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>					</select>
				</div>
				<div class="width2"></div>
				<div class="width15">
					<select id="side_panel_history_minute_from" class="select width100">
					<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>					</select>
				</div>
			</div>
			<div class="row2">
				<div class="width35">Time to</div>
				<div class="width31">
					<input readonly class="inputbox-calendar inputbox width100" id="side_panel_history_date_to" type="text" value=""/>
				</div>
				<div class="width2"></div>
				<div class="width15">
					<select id="side_panel_history_hour_to" class="select width100">
					<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>					</select>
				</div>
				<div class="width2"></div>
				<div class="width15">
					<select id="side_panel_history_minute_to" class="select width100">
					<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>					</select>
				</div>
			</div>
			
			<div class="row3">
				<div class="width35">Stops</div>
				<div class="width31">
					<select id="side_panel_history_stop_duration" class="select width100">
						<option value="1">> 1 min</option>
						<option value="2">> 2 min</option>
						<option value="5">> 5 min</option>
						<option value="10">> 10 min</option>
						<option value="20">> 20 min</option>
						<option value="30">> 30 min</option>
						<option value="60">> 1 h</option>
						<option value="120">> 2 h</option>
						<option value="300">> 5 h</option>
					</select>
				</div>
			</div>
	    
			<div class="row3">
				<input style="width: 100px; margin-right: 3px;" class="button" type="button" value="Show" onclick="historyLoadRoute();"/>
				<input style="width: 100px; margin-right: 3px;" class="button" type="button" value="Hide" onclick="historyHideRoute();"/>
				<input style="width: 134px;" id="side_panel_history_import_export_action_menu_button" class="button" type="button" value="Import/Export"/>
			</div>
		</div>
	
		<div id="side_panel_history_route">
			<table id="side_panel_history_route_detail_list_grid"></table>
		</div>
		
		<div id="side_panel_history_dragbar">
		</div>
		
		<div id="side_panel_history_route_data_list">
			<table id="side_panel_history_route_datalist_grid"></table>
		</div>
	</div>
</div>

<div id="bottom_panel">
	<div class="controls">
		<a href="#" onclick="hideBottomPanel();" title="Hide">
			<span class="icon-close"></span>
		</a>	
	</div>
	
	<div id="bottom_panel_tabs" style="height: 100%;">
		<ul>
			<li id="bottom_panel_datalist_tab"><a href="#bottom_panel_datalist">Data</a></li>
			<li><a href="#bottom_panel_graph">Graph</a></li>
			<li><a href="#bottom_panel_msg">Messages</a></li>
		</ul>
		
		<div id="bottom_panel_datalist" class="datalist">
			<div id="bottom_panel_datalist_object_data_list" class="datalist-item-list">
				<div class="data-item-text">No object selected.</div>
			</div>
			<div id="bottom_panel_datalist_event_data_list" class="datalist-item-list" style="display: none;">
				<div class="data-item-text">No event selected.</div>
			</div>
			<div id="bottom_panel_datalist_route_data_list" class="datalist-item-list" style="display: none;">
				<div class="data-item-text">No history loaded.</div>
			</div>
		</div>
		
		<div id="bottom_panel_graph">			
			<div class="graph-controls">
				<div class="graph-controls-left">
					<select id="bottom_panel_graph_data_source" class="select" style="width:120px;" onchange="historyRouteChangeGraphSource();"></select>					
					<a href="#" onclick="historyRoutePlay();">
						<div class="panel-button" title="Play">
							<img src="theme/tracking/images/play.svg" width="12px" border="0"/>
						</div>
					</a>				    
					<a href="#" onclick="historyRoutePause();">
						<div class="panel-button" title="Pause">
							<img src="theme/tracking/images/pause.svg" width="12px" border="0"/>
						</div>
					</a>				    
					<a href="#" onclick="historyRouteStop();">
						<div class="panel-button" title="Stop">
							<img src="theme/tracking/images/stop.svg" width="12px" border="0"/>
						</div>
					</a>					
					<select id="bottom_panel_graph_play_speed" class="select" style="width:50px;">
						<option value=1>x1</option>
						<option value=2>x2</option>
						<option value=3>x3</option>
						<option value=4>x4</option>
						<option value=5>x5</option>
						<option value=6>x6</option>
					</select>
				</div>
				<div class="graph-controls-right">
					<div id="bottom_panel_graph_label" class="graph-label"></div>
					
					<a href="#" onclick="graphPanLeft();">
						<div class="panel-button" title="Pan left">
							<img src="theme/tracking/images/arrow-left.svg" width="12px" border="0"/>
						</div>
					</a>
					
					<a href="#" onclick="graphPanRight();">
						<div class="panel-button" title="Pan right">
							<img src="theme/tracking/images/arrow-right.svg" width="12px" border="0"/>
						</div>
					</a>
					  
					<a href="#" onclick="graphZoomIn();">
						<div class="panel-button" title="Zoom in">
							<img src="theme/tracking/images/plus.svg" width="12px" border="0"/>
						</div>
					</a>
					
					<a href="#" onclick="graphZoomOut();">
						<div class="panel-button" title="Zoom out">
							<img src="theme/tracking/images/minus.svg" width="12px" border="0"/>
						</div>
					</a>
				</div>
			</div>
			
			<div id="bottom_panel_graph_plot"></div>
		</div>
		
		<div id="bottom_panel_msg">
			<table id="bottom_panel_msg_list_grid"></table>
			<div id="bottom_panel_msg_list_grid_pager"></div>
		</div>
	</div>
</div>

<a href="#" onclick="showHideLeftPanel();">
	<div id="side_panel_dragbar">    
	</div>
</a>

<a href="#" onclick="showBottomPanel();">
	<div id="bottom_panel_dragbar">    
	</div>
</a>		<ul id="map_action_menu" class="menu">
        <li><a class="icon-street first-item" href="#" tag="street_view_new">Street View (new window)</a></li>
        <li><a class="icon-marker" href="#" tag="show_point">Show point</a></li>
        <li><a class="icon-follow" href="#" tag="route_to_point">Route to point</a></li>
        <li><a class="icon-follow" href="#" tag="route_between_points">Route between points</a></li>
                <li><a class="icon-tasks" href="#" tag="add_task">New task</a></li>
                <li><a class="icon-markers" href="#" tag="add_marker">New marker</a></li>
        <li><a class="icon-routes" href="#" tag="add_route">New route</a></li>
        <li><a class="icon-zones" href="#" tag="add_zone">New zone</a></li>
</ul>

<ul id="dashboard_objects_action_menu" class="menu">
        <li><a class="icon-arrow-right first-item" href="#" onclick="dashboardInitObjectsSetResult('percentage');">Percentage</a></li>
        <li><a class="icon-arrow-right" href="#" onclick="dashboardInitObjectsSetResult('number');">Number</a></li>
</ul>

<ul id="dashboard_events_action_menu" class="menu">
        <li><a class="icon-arrow-right first-item" href="#" onclick="dashboardInitEventsSetPeriod('today');">Today</a></li>
        <li><a class="icon-arrow-right" href="#" onclick="dashboardInitEventsSetPeriod('this_week');">This week</a></li>
        <li><a class="icon-arrow-right" href="#" onclick="dashboardInitEventsSetPeriod('this_month');">This month</a></li>
</ul>

<ul id="dashboard_tasks_action_menu" class="menu">
        <li><a class="icon-arrow-right first-item" href="#" onclick="dashboardInitTasksSetPeriod('today');">Today</a></li>
        <li><a class="icon-arrow-right" href="#" onclick="dashboardInitTasksSetPeriod('this_week');">This week</a></li>
        <li><a class="icon-arrow-right" href="#" onclick="dashboardInitTasksSetPeriod('this_month');">This month</a></li>
</ul>

<ul id="side_panel_objects_action_menu" class="menu">
        <li>
                <a class="icon-time first-item" href="#">Show history</a>
                <ul class="child">
                        <li><a class="first-item" href="#" tag="shlh">Last hour</a></li>
                        <li><a href="#" tag="sht">Today</a></li>
                        <li><a href="#" tag="shy">Yesterday</a></li>
                        <li><a href="#" tag="shb2">Before 2 days</a></li>
                        <li><a href="#" tag="shb3">Before 3 days</a></li>
                        <li><a href="#" tag="shtw">This week</a></li>
                        <li><a href="#" tag="shlw">Last week</a></li>
                        <li><a href="#" tag="shtm">This month</a></li>
                        <li><a href="#" tag="shlm">Last month</a></li>
                </ul>
        </li>
        <li><a class="icon-follow" href="#" tag="follow">Follow</a></li>
        <li><a class="icon-follow" href="#" tag="follow_new">Follow (new window)</a></li>
        <li><a class="icon-street" href="#" tag="street_view_new">Street View (new window)</a></li>
        <li><a class="icon-share" href="#" tag="share_position">Share position</a></li>
        <li><a class="icon-create" href="#" tag="cmd">Send command</a></li>
        <li><a class="icon-edit" href="#" tag="edit">Edit</a></li>
</ul>

<ul id="report_action_menu" class="menu">
        <li><a class="icon-arrow-right first-item" href="#" tag="grlh">Last hour</a></li>
        <li><a class="icon-arrow-right" href="#" tag="grt">Today</a></li>
        <li><a class="icon-arrow-right" href="#" tag="gry">Yesterday</a></li>
        <li><a class="icon-arrow-right" href="#" tag="grb2">Before 2 days</a></li>
        <li><a class="icon-arrow-right" href="#" tag="grb3">Before 3 days</a></li>
        <li><a class="icon-arrow-right" href="#" tag="grtw">This week</a></li>
        <li><a class="icon-arrow-right" href="#" tag="grlw">Last week</a></li>
        <li><a class="icon-arrow-right" href="#" tag="grtm">This month</a></li>
        <li><a class="icon-arrow-right" href="#" tag="grlm">Last month</a></li>
</ul>

<ul id="side_panel_history_import_export_action_menu" class="menu">
        <li><a class="icon-save first-item" href="#" onclick="historySaveAsRoute();">Save as route</a></li>
        <li><a class="icon-import" href="#" onclick="historyLoadGSR();">Load GSR</a></li>
        <li><a class="icon-export" href="#" onclick="historyExportGSR();">Export to GSR</a></li>
        <li><a class="icon-export" href="#" onclick="historyExportKML();">Export to KML</a></li>
        <li><a class="icon-export" href="#" onclick="historyExportGPX();">Export to GPX</a></li>
        <li><a class="icon-export" href="#" onclick="historyExportCSV();">Export to CSV</a></li>
</ul>

<ul id="settings_main_object_list_grid_action_menu" class="menu">
        <li><a class="icon-erase first-item" href="#" onclick="settingsObjectClearHistorySelected();">Clear history</a></li>
        <li><a class="icon-remove3" href="#" onclick="settingsObjectDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_object_service_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="settingsObjectServiceImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="settingsObjectServiceExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="settingsObjectServiceDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_object_sensor_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="settingsObjectSensorImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="settingsObjectSensorExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="settingsObjectSensorDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_object_custom_fields_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="settingsObjectCustomFieldImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="settingsObjectCustomFieldExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="settingsObjectCustomFieldDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_main_object_group_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="settingsObjectGroupImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="settingsObjectGroupExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="settingsObjectGroupDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_main_object_driver_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="settingsObjectDriverImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="settingsObjectDriverExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="settingsObjectDriverDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_main_object_passenger_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="settingsObjectPassengerImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="settingsObjectPassengerExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="settingsObjectPassengerDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_main_object_trailer_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="settingsObjectTrailerImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="settingsObjectTrailerExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="settingsObjectTrailerDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_main_events_event_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="settingsEventImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="settingsEventExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="settingsEventDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_main_templates_template_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="settingsTemplateImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="settingsTemplateExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="settingsTemplateDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_main_kml_kml_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3" href="#" onclick="settingsKMLDeleteSelected();">Delete</a></li>
</ul>

<ul id="settings_main_subaccount_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="settingsSubaccountDeleteSelected();">Delete</a></li>
</ul>

<ul id="share_position_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="sharePositionDeleteSelected();">Delete</a></li>
</ul>

<ul id="places_group_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="placesGroupImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="placesGroupExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="placesGroupDeleteSelected();">Delete</a></li>
</ul>

<ul id="bottom_panel_msg_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="historyRouteMsgDeleteSelected();">Delete</a></li>
</ul>

<ul id="cmd_schedule_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="cmdScheduleDeleteSelected();">Delete</a></li>
</ul>

<ul id="cmd_template_list_grid_action_menu" class="menu">
        <li><a class="icon-import first-item" href="#" onclick="cmdTemplateImport();">Import</a></li>
        <li><a class="icon-export" href="#" onclick="cmdTemplateExport();">Export</a></li>
        <li><a class="icon-remove3" href="#" onclick="cmdTemplateDeleteSelected();">Delete</a></li>
</ul>

<ul id="cmd_gprs_status_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="cmdGPRSExecDeleteSelected();">Delete</a></li>
</ul>

<ul id="cmd_sms_status_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="cmdSMSExecDeleteSelected();">Delete</a></li>
</ul>

<ul id="reports_report_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="reportsDeleteSelected();">Delete</a></li>
</ul>

<ul id="reports_generated_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="reportsGeneratedDeleteSelected();">Delete</a></li>
</ul>

<ul id="rilogbook_logbook_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="rilogbookDeleteSelected();">Delete</a></li>
</ul>

<ul id="dtc_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="dtcDeleteSelected();">Delete</a></li>
</ul>

<ul id="maintenance_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="maintenanceServiceDeleteSelected();">Delete</a></li>
</ul>

<ul id="expenses_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="expensesDeleteSelected();">Delete</a></li>
</ul>

<ul id="task_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="tasksDeleteSelected();">Delete</a></li>
</ul>

<ul id="image_gallery_list_grid_action_menu" class="menu">
        <li><a class="icon-remove3 first-item" href="#" onclick="imgDeleteSelected();">Delete</a></li>
</ul>		

<div id="dialog_dashboard" title="Dashboard">
        <div class="row">
                <div class="block width25">
			<div class="container">
                                <div id="dialog_dashboard_objects" class="dashboard-container">
                                        <div class="table">
                                                <div class="table-cell center-middle">
                                                        <div class="loader">
                                                                <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="block width25">
			<div class="container ">
                                <div id="dialog_dashboard_events" class="dashboard-container">
                                        <div class="table">
                                                <div class="table-cell center-middle">
                                                        <div class="loader">
                                                                <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                                        <div class="block width25">
                                <div class="container ">
                                        <div id="dialog_dashboard_maintenance" class="dashboard-container">
                                                <div class="table">
                                                        <div class="table-cell center-middle">
                                                                <div class="loader">
                                                                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                                                <div class="block width25">
			<div class="container last">
                                <div id="dialog_dashboard_tasks" class="dashboard-container">
                                        <div class="table">
                                                <div class="table-cell center-middle">
                                                        <div class="loader">
                                                                <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                        </div>
        <div class="row">
                <div class="block width75">			
			<div class="container">
                                <div id="dialog_dashboard_odometer" class="dashboard-container">
                                        <div class="table">
                                                <div class="table-cell center-middle">
                                                        <div class="loader">
                                                                <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="block width25">			
			<div class="container last">
                                <div id="dialog_dashboard_mileage" class="dashboard-container">
                                        <div class="table">
                                                <div class="table-cell center-middle">
                                                        <div class="loader">
                                                                <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>		<div id="dialog_notify" title="">
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

<div id="dialog_about" title="About">
	<div class="row">
		<center><img class="logo" src="https://jontracking.com//img/logo.png" /></center>
	</div>
	<center>2010 - 2024 © JON Tracking. All rights reserved.</center>
</div>

<div id="dialog_show_point" title="Show point">
	<div class="row">
		<div class="row2">
			<div class="width30">Latitude</div>
			<div class="width70"><input id="dialog_show_point_lat" class="inputbox" type="text" value="" maxlength="15"></div>
		</div>
		<div class="row2">
			<div class="width30">Longitude</div>
			<div class="width70"><input id="dialog_show_point_lng" class="inputbox" type="text" maxlength="15"></div>
		</div>
	</div>
	
	<center>
	    <input class="button icon-show icon" type="button" onclick="utilsShowPoint();" value="Show" />
	    <input class="button icon-close icon" type="button" onclick="$('#dialog_show_point').dialog('close');" value="Cancel" />
	</center>
</div>

<div id="dialog_address_search" title="Address search">
	<div class="row">
		<div class="row2">
			<div class="width100">
				<input class="inputbox" type='text' id='dialog_address_search_addr' onkeydown="if (event.keyCode == 13) utilsSearchAddress();" maxlength="100"/>
			</div>
		</div>
	</div>
		
	<center>
	    <input class="button icon-search icon" type="button" onclick="utilsSearchAddress();" value="Search" />&nbsp;&nbsp;&nbsp;
	    <input class="button icon-close icon" type="button" onclick="$('#dialog_address_search').dialog('close');" value="Cancel" />
	</center>
</div>

<div id="dialog_billing" title="Billing">
	<div class="info">
		Billing allows to purchase additional plans and extend object activity periods. Purchased plans will appear in below list after payment is confirmed, sometimes it may take a while.	</div>
	
	<table id="billing_plan_list_grid"></table>
	<div id="billing_plan_list_grid_pager"></div>
</div>

<div id="dialog_billing_plan_purchase" title="Purchase plan">
	<div id="billing_plan_purchase_list"></div>
</div>

<div id="dialog_billing_plan_use" title="">
	<div class="controls-block width100">
		<div class="block width20">
			<div class="info2">
				Objects:&nbsp;<span id="dialog_billing_plan_use_objects"></span>
			</div>
		</div>
		<div class="block width20">
			<div class="info2">
				Period:&nbsp;<span id="dialog_billing_plan_use_period"></span>
			</div>
		</div>
		<div class="block width30">
			<div class="info2">
				Selected:&nbsp;<span id="dialog_billing_plan_use_selected"></span>
			</div>
		</div>
		<div class="block width30">
			<input class="button panel icon-check icon float-right" type="button" onclick="billingPlanUseActivate();" value="Activate" />
		</div>
	</div>
	
	<div class="info">
		Apply current plan to below selected objects.	</div>
	
	<table id="billing_plan_object_list_grid"></table>
	<div id="billing_plan_object_list_grid_pager"></div>
</div>		<div id="dialog_share_position" title="Share position">
	<table id="share_position_list_grid"></table>
	<div id="share_position_list_grid_pager"></div>
</div>

<div id="dialog_share_position_properties" title="Share position properties">
	<div class="row">
		<div class="title-block">Share position</div>
		<div class="block width50">
			<div class="container">
				<div class="row2">
					<div class="width40">Active</div>
					<div class="width60"><input id="dialog_share_position_active" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width40">Name</div>
					<div class="width60"><input id="dialog_share_position_name" class="inputbox" type="text" value="" maxlength="30"/></div>
				</div>				
				<div class="row2">
					<div class="width40">Object</div>
					<div class="width60"><select id="dialog_share_position_object_list" class="select-multiple-search width100" multiple="multiple"></select></div>
				</div>
				<div class="row2">
					<div class="width40">E-mail</div>
					<div class="width60"><input id="dialog_share_position_email" class="inputbox" type="text" value="" maxlength="50"/></div>
				</div>
				<div class="row2">
					<div class="width40">Phone</div>
					<div class="width60"><input id="dialog_share_position_phone" class="inputbox" type="text" value="" maxlength="50"/></div>
				</div>
			</div>
		</div>
		<div class="block width50">
			<div class="container last">
				<div class="row2">
					<div class="width40">Expire on</div>
					<div class="width10">
						<input id="dialog_share_position_expire" type="checkbox" class="checkbox" onchange="sharePositionCheck();"/>
					</div>
					<div class="width50">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_share_position_expire_dt"/>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Delete after expiration</div>
					<div class="width60">
						<input id="dialog_share_position_delete_expired" type="checkbox" class="checkbox"/>
					</div>
				</div>				
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="title-block">Access via URL</div>
		<div class="row2">
			<div class="width195">Send via e-mail</div>
			<div class="width805"><input id="dialog_share_position_send_email" type="checkbox" checked="checked"/></div>
		</div>
		<div class="row2">
			<div class="width195">Send via SMS</div>
			<div class="width805"><input id="dialog_share_position_send_sms" type="checkbox" checked="checked"/></div>
		</div>	
		<div class="row2">
			<div class="width195">URL desktop</div>
			<div class="width805">
				<input class="inputbox" id="dialog_share_position_su" readonly />
			</div>
		</div>
		<div class="row2">
			<div class="width195">URL mobile</div>
			<div class="width805">
				<input class="inputbox" id="dialog_share_position_su_mobile" readonly />
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="sharePositionProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="sharePositionProperties('cancel');" value="Cancel" />
	</center>
</div>	
		<div id="dialog_places_groups" title="Groups">
	<table id="places_group_list_grid"></table>
	<div id="places_group_list_grid_pager"></div>
</div>

<div id="dialog_places_group_properties" title="Places group properties">
	<div class="row">
		<div class="row2">
			<div class="width40">Name</div>
			<div class="width60"><input id="dialog_places_group_name" class="inputbox" type="text" value="" maxlength="25"></div>
		</div>
		<div class="row2">
			<div class="width40">Description</div>
			<div class="width60"><textarea id="dialog_places_group_desc" class="inputbox" style="height:50px;" maxlength="100"></textarea></div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="placesGroupProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="placesGroupProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_places_marker_properties" title="Marker properties">
	<div class="row">
		<div class="row2">
			<div class="width40">Name</div>
			<div class="width60"><input id="dialog_places_marker_name" class="inputbox" type="text" value="" maxlength="25"></div>
		</div>
		<div class="row2">
			<div class="width40">Description</div>
			<div class="width60"><textarea id="dialog_places_marker_desc" class="inputbox" style="height: 60px;" type='text' maxlength="200"></textarea></div>
		</div>
		<div class="row2">
			<div class="width40">Group</div>
			<div class="width60"><select id="dialog_places_marker_group" class="select-search width100"></select></div>
		</div>
		<div class="row2">
			<div class="width40">Marker visible</div>
			<div class="width60"><input id="dialog_places_marker_visible" type="checkbox" class="checkbox" checked="yes"/></div>
		</div>
		<div class="row2">
			<div class="width40">Radius (km)</div>
			<div class="width60"><input id="dialog_places_marker_radius" class="inputbox" onkeypress="return isNumberKey(event);" type="text" value="" maxlength="11"></div>
		</div>
		<div class="row2">			
			<div id="places_marker_icon_tabs">
				<ul>           
					<li><a href="#places_marker_icon_default_tab">Default</a></li>
					<li><a href="#places_marker_icon_custom_tab">Custom</a></li>
				</ul>              
				<div id="places_marker_icon_default_tab">
					<div class="row2">
						<div class="icon_selector width100" id="places_marker_icon_default_list">
						</div>
					</div>
				</div>
				<div id="places_marker_icon_custom_tab">
					<div class="row">
						<div class="row2">
							<div class="icon_selector width100" id="places_marker_icon_custom_list">
							</div>
						</div>
					</div>
					<center>
						<input class="button" type="button" value="Upload" onclick="placesMarkerUploadCustomIcon();" />&nbsp;
						<input class="button" type="button" value="Delete all" onclick="placesMarkerDeleteAllCustomIcon();" />
					</center>
				</div>
			</div>	
		</div>
	</div>
	<center>
		<input class="button icon-save icon" type="button" onclick="placesMarkerProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="placesMarkerProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_places_zone_properties" title="Zone properties">
	<div class="row">
		<div class="row2">
			<div class="width40">Name</div>
			<div class="width60"><input id="dialog_places_zone_name" class="inputbox width100" type="text" value="" maxlength="25"></div>
		</div>
<!--		<div class="row2">
			<div class="width40"></div>
			<div class="width60">
				<select id="dialog_places_zone_type" class="select width100" onchange="placesZoneSwitchType();">
					<option value="polygon"></option>
					<option value="circle"></option>					
				</select>
			</div>
		</div>-->
		<div class="row2">
			<div class="width40">Group</div>
			<div class="width60"><select id="dialog_places_zone_group" class="select-search width100"></select></div>
		</div>
		<div class="row2">
			<div class="width40">Color</div>
			<div class="width60"><input class="color inputbox" style="width:55px" type='text' id='dialog_places_zone_color'/></div>
		</div>
		<div class="row2">
			<div class="width40">Zone visible</div>
			<div class="width60"><input id="dialog_places_zone_visible" type="checkbox" class="checkbox" checked="yes"/></div>
		</div>
		<div class="row2">
			<div class="width40">Name visible</div>
			<div class="width60"><input id="dialog_places_zone_name_visible" type="checkbox" class="checkbox" checked="yes"/></div>
		</div>
		<div class="row2">
			<div class="width40">Measure area</div>
			<div class="width60">
				<select id="dialog_places_zone_area" class="select width100">
					<option value="0">Off</option>
					<option value="1">Acres</option>
					<option value="2">Hectares</option>
					<option value="3">Square meters</option>
					<option value="4">Square kilometers</option>
					<option value="5">Square foot</option>
					<option value="6">Square miles</option>					
				</select>
			</div>
		</div>
	</div>
	<center>
		<input class="button icon-save icon" type="button" onclick="placesZoneProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="placesZoneProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_places_route_properties" title="Route properties">
	<div class="row">
		<div class="row2">
			<div class="width40">Name</div>
			<div class="width60"><input id="dialog_places_route_name" class="inputbox width100" type="text" value="" maxlength="25"></div>
		</div>
		<div class="row2">
			<div class="width40">Group</div>
			<div class="width60"><select id="dialog_places_route_group" class="select-search width100"></select></div>
		</div>
		<div class="row2">
			<div class="width40">Color</div>
			<div class="width60"><input class="color inputbox" style="width:55px" type='text' id='dialog_places_route_color'/></div>
		</div>
		<div class="row2">
			<div class="width40">Route visible</div>
			<div class="width60"><input id="dialog_places_route_visible" type="checkbox" class="checkbox" checked="yes"/></div>
		</div>
		<div class="row2">
			<div class="width40">Name visible</div>
			<div class="width60"><input id="dialog_places_route_name_visible" type="checkbox" class="checkbox" checked="yes"/></div>
		</div>
		<div class="row2">
			<div class="width40">Deviation (km)</div>
			<div class="width60"><input id="dialog_places_route_deviation" class="inputbox width100" type="text" value="" maxlength="10"></div>
		</div>
	</div>
	<center>
		<input class="button icon-save icon" type="button" onclick="placesRouteProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="placesRouteProperties('cancel');" value="Cancel" />
	</center>
</div>		<div id="dialog_report_properties" title="Report properties">
	<div class="row">	
		<div class="title-block">Report</div>
		<div class="report-block block width50">
			<div class="container">
				<div class="row2">
					<div class="width40">Name</div>
					<div class="width60"><input id="dialog_report_name" class="inputbox" type="text" value="" maxlength="30"></div>
				</div>
				<div class="row2">
					<div class="width40">Type</div>
					<div class="width60">
						<select id="dialog_report_type" class="select width100" onchange="reportsSwitchType();reportsListDataItems();reportsListSensors();">
							<optgroup label="Text reports">
							<option value="general" selected>General information</option>
							<option value="general_merged">General information (merged)</option>
							<option value="object_info">Object information</option>
							<option value="current_position">Current position</option>
							<option value="current_position_off">Current position (offline)</option>							
							<option value="route_data_sensors">Route data with sensors</option>							
							<option value="drives_stops">Drives and stops</option>
							<option value="drives_stops_sensors">Drives and stops with sensors</option>
							<option value="drives_stops_logic">Drives and stops with logic sensors</option>
							<option value="travel_sheet">Travel sheet</option>
							<option value="travel_sheet_dn">Travel sheet (day/night)</option>
							<option value="mileage_daily">Mileage (daily)</option>
							<option value="overspeed">Overspeeds</option>
							<option value="overspeed_count">Overspeed count (merged)</option>
							<option value="underspeed">Underspeeds</option>
							<option value="underspeed_count">Underspeed count (merged)</option>
							<option value="marker_in_out">Marker in/out</option>
							<option value="marker_in_out_gen">Marker in/out with gen. information</option>
							<option value="zone_in_out">Zone in/out</option>
							<option value="zone_in_out_general">Zone in/out with gen. information</option>
							<option value="events">Events</option>
							<option value="service">Service</option>
							<option value="fuelfillings">Fuel fillings</option>
							<option value="fuelthefts">Fuel thefts</option>
							<option value="logic_sensors">Logic sensors</option>
							<option value="rag">Driver behavior (RAG by object)</option>
							<option value="rag_driver">Driver behavior (RAG by driver)</option>
							<option value="tasks">Tasks</option>
							<option value="rilogbook">RFID and iButton logbook</option>
							<option value="dtc">DTC (Diagnostic Trouble Codes)</option>
							<option value="expenses">Expenses</option>
							<optgroup label="Graphical reports">
							<option value="speed_graph">Speed</option>
							<option value="altitude_graph">Altitude</option>
							<option value="acc_graph">Ignition</option>
							<option value="fuellevel_graph">Fuel level</option>
							<option value="temperature_graph">Temperature</option>
							<option value="sensor_graph">Sensor</option>
							<optgroup label="Map reports">
							<option value="routes">Routes</option>
							<option value="routes_stops">Routes with stops</option>
							<optgroup label="Media reports">
							<option value="image_gallery">Image gallery</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Objects</div>
					<div class="width60"><select id="dialog_report_object_list" class="select-multiple-search width100" multiple="multiple" onchange="reportsSelectObject();"></select></div>
				</div>
				<div class="row2">
					<div class="width40">Markers</div>
					<div class="width60"><select id="dialog_report_marker_list" class="select-multiple-search width100" multiple="multiple" disabled></select></div>
				</div>
				<div class="row2">
					<div class="width40">Zones</div>
					<div class="width60"><select id="dialog_report_zone_list" class="select-multiple-search width100" multiple="multiple" disabled></select></div>
				</div>
				<div class="row2">
					<div class="width40">Sensors</div>
					<div class="width60"><select id="dialog_report_sensor_list" class="select-multiple-search width100" multiple="multiple" disabled></select></div>
				</div>
				<div class="row2">
					<div class="width40">Data items</div>
					<div class="width60"><select id="dialog_report_data_item_list" class="select-multiple width100" multiple="multiple"></select></div>
				</div>
				<div class="row2">
					<div class="width40">Format</div>
					<div class="width60">
						<select id="dialog_report_format" class="select width100"/>
							<option value="html">HTML</option>
							<option value="pdf">PDF</option>
							<option value="xls">XLS</option>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="report-block block width50">
			<div class="container last">				
				<div class="row2">
					<div class="width40">Ignore empty reports</div>
					<div class="width60"><input id="dialog_report_ignore_empty_reports" type="checkbox" class="checkbox"/></div>
				</div>
				<div class="row2">
					<div class="width40">Show coordinates</div>
					<div class="width60"><input id="dialog_report_show_coordinates" type="checkbox" class="checkbox" checked disabled/></div>
				</div>
				<div class="row2">
					<div class="width40">Show addresses</div>
					<div class="width60"><input id="dialog_report_show_addresses" type="checkbox" class="checkbox" disabled/></div>
				</div>
				<div class="row2">
					<div class="width40">Markers instead of addresses</div>
					<div class="width60"><input id="dialog_report_markers_addresses" type="checkbox" class="checkbox" disabled/></div>
				</div>
				<div class="row2">
					<div class="width40">Zones instead of addresses</div>
					<div class="width60"><input id="dialog_report_zones_addresses" type="checkbox" class="checkbox" disabled/></div>
				</div>
				<div class="row2">
					<div class="width40">Stops</div>
					<div class="width60">
						<select id="dialog_report_stop_duration" class="select width100"/>
							<option value="1">> 1 min</option>
							<option value="2">> 2 min</option>
							<option value="5">> 5 min</option>
							<option value="10">> 10 min</option>
							<option value="20">> 20 min</option>
							<option value="30">> 30 min</option>
							<option value="60">> 1 h</option>
							<option value="120">> 2 h</option>
							<option value="300">> 5 h</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Speed limit (kph)</div>
					<div class="width60"><input id="dialog_report_speed_limit" class="inputbox width100" onkeypress="return isNumberKey(event);" type="text" maxlength="3"/></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="dialog_report_other_dn" style="display: none;">	
		<div class="title-block">Travel sheet (day/night)</div>
		<div class="report-block block width50">
			<div class="container">
				<div class="row2">
					<div class="width40">Night starts</div>
					<div class="width13">
						<select id="dialog_report_other_dn_starts_hour" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width13">
						<select id="dialog_report_other_dn_starts_minute" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="report-block block width50">
			<div class="container last">
				<div class="row2">
					<div class="width40">Night ends</div>
					<div class="width13">
						<select id="dialog_report_other_dn_ends_hour" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width13">
						<select id="dialog_report_other_dn_ends_minute" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>						</select>
					</div>
				</div>
			</div>
		</div>
	</div>		
	<div class="row" id="dialog_report_other_rag" style="display: none;">	
		<div class="title-block">Driver behavior (RAG)</div>
		<div class="report-block block width50">
			<div class="container">
				<div class="row2">
					<div class="width40">Lowest score</div>
					<div class="width60"><input id="dialog_report_other_rag_low_score" class="inputbox width100" onkeypress="return isNumberKey(event);" type="text" maxlength="5"/></div>
				</div>
			</div>
		</div>
		<div class="report-block block width50">
			<div class="container last">
				<div class="row2">
					<div class="width40">Highest score</div>
					<div class="width60"><input id="dialog_report_other_rag_high_score" class="inputbox width100" onkeypress="return isNumberKey(event);" type="text" maxlength="5"/></div>
				</div>
			</div>
		</div>
	</div>
		
	<div class="row">
		<div class="schedule-block block width50">
			<div class="container">
				<div class="title-block">Schedule</div>
				<div class="row2">
					<div class="width40">Daily</div>
					<div class="width60"><input id="dialog_report_schedule_period_daily" type="checkbox" /></div>
				</div>
				<div class="row2">
					<div class="width40">Weekly</div>
					<div class="width60"><input id="dialog_report_schedule_period_weekly" type="checkbox" /></div>
				</div>
				<div class="row2">
					<div class="width40">Send via e-mail</div>
					<div class="width60"><input id="dialog_report_schedule_email_address" class="inputbox" type="text" value="" maxlength="500" placeholder="E-mail address" /></div>
				</div>
			</div>
		</div>
		<div class="time-period block width50">
			<div class="container last">
				<div class="title-block">Time period</div>
				<div class="row2">
					<div class="width40">Filter</div>
					<div class="width60">
						<select id="dialog_report_filter" class="select width100" onchange="switchDateFilter('report');">
							<option value="0" selected></option>
							<option value="1">Last hour</option>
							<option value="2">Today</option>
							<option value="3">Yesterday</option>
							<option value="4">Before 2 days</option>
							<option value="5">Before 3 days</option>
							<option value="6">This week</option>
							<option value="7">Last week</option>
							<option value="8">This month</option>
							<option value="9">Last month</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Time from</div>
					<div class="width30">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_report_date_from" type="text" value=""/>
					</div>
					<div class="width2"></div>
					<div class="width13">
						<select id="dialog_report_hour_from" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width13">
						<select id="dialog_report_minute_from" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Time to</div>
					<div class="width30">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_report_date_to" type="text" value=""/>
					</div>
					<div class="width2"></div>
					<div class="width13">
						<select id="dialog_report_hour_to" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width13">
						<select id="dialog_report_minute_to" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-action2 icon" type="button" onclick="reportProperties('generate');" value="Generate" />&nbsp;
		<input class="button icon-save icon" type="button" onclick="reportProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="reportProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_reports" title="Reports">
	<div id="reports_tabs">
		<ul>           
			<li><a href="#reports_reports">Reports</a></li>
			<li id="reports_generated_tab"><a href="#reports_generated">Generated</a></li>
		</ul>
		<div id="reports_reports">
			<table id="reports_report_list_grid"></table>
			<div id="reports_report_list_grid_pager"></div>
		</div>
		<div id="reports_generated">
			<table id="reports_generated_list_grid"></table>
			<div id="reports_generated_list_grid_pager"></div>
		</div>
	</div>
</div>
		<div id="dialog_tachograph" title="Tachograph">

</div>		<div id="dialog_task_properties" title="Task properties">
        <div class="row">	
		<div class="title-block">Task</div>
                <div class="report-block block width50">
                        <div class="container">
                                <div class="row2">
					<div class="width30">Name</div>
					<div class="width70"><input id="dialog_task_name" class="inputbox" type="text" value="" maxlength="30"></div>
				</div>
                                <div class="row2">
					<div class="width30">Object</div>
					<div class="width70"><select id="dialog_task_object_list" class="select-search width100"></select></div>
				</div>
                                <div class="row2">
                                        <div class="width30">Priority</div>
					<div class="width70">
						<select id="dialog_task_priority" class="select width100"/>
							<option value="low">Low</option>
							<option value="normal">Normal</option>
							<option value="high">High</option>
						</select>
					</div>
                                </div>
				<div class="row2">
                                        <div class="width30">Status</div>
					<div class="width70">
						<select id="dialog_task_status" class="select width100"/>
							<option value="0">New</option>
							<option value="1">In progress</option>
							<option value="2">Completed</option>
							<option value="3">Failed</option>
						</select>
					</div>
                                </div>
                        </div>
                </div>
                <div class="report-block block width50">
			<div class="container last">
				<div class="row2">
                                        <div class="width30">Description</div>
                                        <div class="width70"><textarea id="dialog_task_desc" class="inputbox" style="height:105px;" maxlength="500"></textarea></div>
                                </div>
                        </div>
                </div>
        </div>        
        <div class="row">	
                <div class="report-block block width50">
			<div class="container">
                                <div class="title-block">Start</div>
				<div class="row2">
					<div class="width30">Address</div>
                                        <div class="width60"><input id="dialog_task_start_address" class="inputbox width100" type="text"/></div>
					<div class="width1"></div>
					<div class="width9">
						<input style="min-width: 0;" class="width100 button icon-marker no-text icon" type="button" onclick="tasksPickAddress('start');" />
					</div>
                                </div>
				<div class="row2">
					<input id="dialog_task_start_lat" class="inputbox" style="display: none;"/>
					<input id="dialog_task_start_lng" class="inputbox" style="display: none;"/>
				</div>
                                <div class="row2">
					<div class="width30">From</div>
                                        <div class="width21">
                                                <input readonly class="inputbox-calendar inputbox width100" id="dialog_task_start_from_date" type="text" value=""/>
                                        </div>
                                        <div class="width1"></div>
                                        <div class="width15">
                                                <select id="dialog_task_start_from_time" class="select width100">
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
<option value="23:45">23:45</option>                                                </select>
                                        </div>
                                </div>
                                <div class="row2">
					<div class="width30">To</div>
                                        <div class="width21">
                                                <input readonly class="inputbox-calendar inputbox width100" id="dialog_task_start_to_date" type="text" value=""/>
                                        </div>
                                        <div class="width1"></div>
                                        <div class="width15">
                                                <select id="dialog_task_start_to_time" class="select width100">
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
<option value="23:45">23:45</option>                                                </select>
                                        </div>
                                </div>
                        </div>
                </div>
                
                <div class="report-block block width50">
			<div class="container last">
                                <div class="title-block">Destination</div>
				<div class="row2">
					<div class="width30">Address</div>
                                        <div class="width60"><input id="dialog_task_end_address" class="inputbox width100" type="text"/></div>
					<div class="width1"></div>
					<div class="width9">
						<input style="min-width: 0;" class="width100 button icon-marker no-text icon" type="button" onclick="tasksPickAddress('end');" />
					</div>
                                </div>
				<div class="row2">
					<input id="dialog_task_end_lat" class="inputbox" style="display: none;"/>
					<input id="dialog_task_end_lng" class="inputbox" style="display: none;"/>
				</div>
                                <div class="row2">
					<div class="width30">From</div>
                                        <div class="width21">
                                                <input readonly class="inputbox-calendar inputbox width100" id="dialog_task_end_from_date" type="text" value=""/>
                                        </div>
                                        <div class="width1"></div>
                                        <div class="width15">
                                                <select id="dialog_task_end_from_time" class="select width100">
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
<option value="23:45">23:45</option>                                                </select>
                                        </div>
                                </div>
                                <div class="row2">
					<div class="width30">To</div>
                                        <div class="width21">
                                                <input readonly class="inputbox-calendar inputbox width100" id="dialog_task_end_to_date" type="text" value=""/>
                                        </div>
                                        <div class="width1"></div>
                                        <div class="width15">
                                                <select id="dialog_task_end_to_time" class="select width100">
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
<option value="23:45">23:45</option>                                                </select>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        
        <center>
		<input class="button icon-save icon" type="button" onclick="taskProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="taskProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_tasks" title="Tasks">
	<div class="controls-block width100">
		<input style="width: 100px;" class="button panel float-right" type="button" value="Show" onclick="tasksShow();"/>
		<input style="width: 100px; margin-right: 3px;" class="button panel float-right" type="button" value="Export to CSV" onclick="tasksExportCSV();"/>
		<input style="width: 100px; margin-right: 3px;" class="button panel float-right" type="button" value="Delete all" onclick="tasksDeleteAll();"/>
	</div>
        
        <div class="row">
		<div class="block width33">
			<div class="container">
				<div class="row2">
					<div class="width30">Object</div>
					<div class="width70"><select id="dialog_tasks_object_list" class="select-search width100"></select></div>
				</div>
				<div class="row2">
					<div class="width30">Filter</div>
					<div class="width70">
						<select id="dialog_tasks_filter" class="select width100" onchange="switchDateFilter('tasks');">
							<option value="0" selected>Whole period</option>
							<option value="1">Last hour</option>
							<option value="2">Today</option>
							<option value="3">Yesterday</option>
							<option value="4">Before 2 days</option>
							<option value="5">Before 3 days</option>
							<option value="6">This week</option>
							<option value="7">Last week</option>
							<option value="8">This month</option>
							<option value="9">Last month</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="block width33">
			<div class="container">
				<div class="row2">
					<div class="width35">Time from</div>
					<div class="width31">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_tasks_date_from" type="text" value=""/>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_tasks_hour_from" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_tasks_minute_from" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Time to</div>
					<div class="width31">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_tasks_date_to" type="text" value=""/>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_tasks_hour_to" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_tasks_minute_to" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	
        <table id="tasks_list_grid"></table>
	<div id="tasks_list_grid_pager"></div>
</div>		<div id="dialog_rilogbook" title="RFID and iButton logbook">
	<div class="controls-block width100">
		<input style="width: 100px;" class="button panel float-right" type="button" value="Show" onclick="rilogbookShow();"/>
		<input style="width: 100px; margin-right: 3px;" class="button panel float-right" type="button" value="Export to CSV" onclick="rilogbookExportCSV();"/>
		<input style="width: 100px; margin-right: 3px;" class="button panel float-right" type="button" value="Delete all" onclick="rilogbookDeleteAll();"/>
	</div>
	
	<div class="row">
		<div class="block width33">
			<div class="container">
				<div class="row2">
					<div class="width30">Object</div>
					<div class="width70"><select id="dialog_rilogbook_object_list" class="select-search width100"></select></div>
				</div>
				<div class="row2">
					<div class="width30">Filter</div>
					<div class="width70">
						<select id="dialog_rilogbook_filter" class="select width100" onchange="switchDateFilter('rilogbook');">
							<option value="0" selected>Whole period</option>
							<option value="1">Last hour</option>
							<option value="2">Today</option>
							<option value="3">Yesterday</option>
							<option value="4">Before 2 days</option>
							<option value="5">Before 3 days</option>
							<option value="6">This week</option>
							<option value="7">Last week</option>
							<option value="8">This month</option>
							<option value="9">Last month</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="block width33">
			<div class="container">
				<div class="row2">
					<div class="width35">Time from</div>
					<div class="width31">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_rilogbook_date_from" type="text" value=""/>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_rilogbook_hour_from" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_rilogbook_minute_from" class="select width100" >
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Time to</div>
					<div class="width31">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_rilogbook_date_to" type="text" value=""/>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_rilogbook_hour_to" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_rilogbook_minute_to" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="block width33">
			<div class="container last">
				<div class="row2">
					<div class="width30">
						Drivers					</div>
					<div class="width20">
						<input id="dialog_rilogbook_drivers" type="checkbox" class="checkbox" checked/>
					</div>
					<div class="width30">
						Passengers					</div>
					<div class="width20">
						<input id="dialog_rilogbook_passengers" type="checkbox" class="checkbox" checked/>
					</div>
				</div>
				<div class="row2">
					<div class="width30">
						Trailers					</div>
					<div class="width20">
						<input id="dialog_rilogbook_trailers" type="checkbox" class="checkbox" checked/>
					</div>
				</div>
			</div>
		</div>
	</div>

	<table id="rilogbook_logbook_grid"></table>
	<div id="rilogbook_logbook_grid_pager"></div>
</div>
		<div id="dialog_dtc" title="DTC (Diagnostic Trouble Codes)">
	<div class="controls-block width100">
		<input style="width: 100px;" class="button panel float-right" type="button" value="Show" onclick="dtcShow();"/>
		<input style="width: 100px; margin-right: 3px;" class="button panel float-right" type="button" value="Export to CSV" onclick="dtcExportCSV();"/>
		<input style="width: 100px; margin-right: 3px;" class="button panel float-right" type="button" value="Delete all" onclick="dtcDeleteAll();"/>
	</div>
        
        <div class="row">
		<div class="block width33">
			<div class="container">
				<div class="row2">
					<div class="width30">Object</div>
					<div class="width70"><select id="dialog_dtc_object_list" class="select-search width100"></select></div>
				</div>
				<div class="row2">
					<div class="width30">Filter</div>
					<div class="width70">
						<select id="dialog_dtc_filter" class="select width100" onchange="switchDateFilter('dtc');">
							<option value="0" selected>Whole period</option>
							<option value="1">Last hour</option>
							<option value="2">Today</option>
							<option value="3">Yesterday</option>
							<option value="4">Before 2 days</option>
							<option value="5">Before 3 days</option>
							<option value="6">This week</option>
							<option value="7">Last week</option>
							<option value="8">This month</option>
							<option value="9">Last month</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="block width33">
			<div class="container">
				<div class="row2">
					<div class="width35">Time from</div>
					<div class="width31">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_dtc_date_from" type="text" value=""/>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_dtc_hour_from" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_dtc_minute_from" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Time to</div>
					<div class="width31">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_dtc_date_to" type="text" value=""/>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_dtc_hour_to" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width15">
						<select id="dialog_dtc_minute_to" class="select width100">
						<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>						</select>
					</div>
				</div>
			</div>
		</div>
	</div>

	<table id="dtc_list_grid"></table>
	<div id="dtc_list_grid_pager"></div>
</div>		<div id="dialog_maintenance" title="Maintenance">
	<table id="maintenance_list_grid"></table>
	<div id="maintenance_list_grid_pager"></div>
</div>

<div id="dialog_maintenance_service_properties" title="Service properties">
	<div class="row">
		<div class="title-block">Service</div>
		<div class="block width50">
			<div class="container">
				<div class="row2">
					<div class="width50">Name</div>
					<div class="width50"><input id="dialog_maintenance_service_name" class="inputbox" type="text" value="" maxlength="30"></div>
				</div>				
				<div class="row2">
					<div class="width50">Data list</div>
					<div class="width10"><input id="dialog_maintenance_service_data_list" type="checkbox" class="checkbox" /></div>
				</div>
				<div class="row2">
					<div class="width50">Popup</div>
					<div class="width10"><input id="dialog_maintenance_service_popup" type="checkbox" class="checkbox" /></div>
				</div>
				<div class="row2">
					<div class="width50">Odometer interval (km)</div>
					<div class="width10"><input id="dialog_maintenance_service_odo" onchange="maintenanceServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_maintenance_service_odo_interval" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				
				<div class="row2">
					<div class="width50">Engine hours interval (h)</div>
					<div class="width10"><input id="dialog_maintenance_service_engh" onchange="maintenanceServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_maintenance_service_engh_interval" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				
				<div class="row2">
					<div class="width50">Days interval</div>
					<div class="width10"><input id="dialog_maintenance_service_days" onchange="maintenanceServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_maintenance_service_days_interval" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
			</div>
		</div>
		<div class="block width50">
			<div class="container last">
				<div class="row2">
					<div class="width50">Objects</div>
					<div class="width50"><select id="dialog_maintenance_service_object_list" class="select-multiple-search width100" multiple="multiple"></select></div>
				</div>
				<div class="row2 empty"></div>
				<div class="row2 empty"></div>
				<div class="row2">
					<div class="width50">Last service (km)</div>
					<div class="width50"><input id="dialog_maintenance_service_odo_last" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width50">Last service (h)</div>
					<div class="width50"><input id="dialog_maintenance_service_engh_last" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width50">Last service</div>
					<div class="width50"><input id="dialog_maintenance_service_days_last" readonly class="inputbox inputbox-calendar" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="title-block">Trigger event</div>
		<div class="block width50">
			<div class="container">
				<div class="row2">
					<div class="width50">Odometer left (km)</div>
					<div class="width10"><input id="dialog_maintenance_service_odo_left" onchange="maintenanceServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_maintenance_service_odo_left_num" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width50">Engine hours left (h)</div>
					<div class="width10"><input id="dialog_maintenance_service_engh_left" onchange="maintenanceServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_maintenance_service_engh_left_num" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width50">Days left</div>
					<div class="width10"><input id="dialog_maintenance_service_days_left" onchange="maintenanceServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_maintenance_service_days_left_num" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
			</div>
		</div>
		<div class="block width50">
			<div class="container last">
				<div class="row2">
					<div class="width50">Update last service</div>
					<div class="width50"><input id="dialog_maintenance_service_update_last" type="checkbox" class="checkbox"/></div>
				</div>
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="maintenanceServiceProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="maintenanceServiceProperties('cancel');" value="Cancel" />
	</center>
</div>		<div id="dialog_expenses" title="Expenses">
	<table id="expenses_list_grid"></table>
	<div id="expenses_list_grid_pager"></div>
</div>

<div id="dialog_expense_properties" title="Expense properties">
	<div class="row">
		<div class="title-block">Expense</div>
		<div class="block width50">
			<div class="container">
				<div class="row2">
					<div class="width40">Name</div>
					<div class="width60"><input id="dialog_expense_name" class="inputbox" type="text" value="" maxlength="30"></div>
				</div>				
				<div class="row2">
					<div class="width40">Date</div>
					<div class="width30"><input readonly class="inputbox-calendar inputbox width100" id="dialog_expense_date" type="text" value=""/></div>
				</div>
				<div class="row2">
					<div class="width40">Quantity</div>
					<div class="width30"><input id="dialog_expense_quantity" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="11"></div>
				</div>
				<div class="row2">
					<div class="width40">Cost</div>
					<div class="width30"><input id="dialog_expense_cost" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="11"></div>
					<div class="width2"></div>
					<div class="width28">IDR</div>
				</div>
				<div class="row2">
					<div class="width40">Supplier</div>
					<div class="width60"><input id="dialog_expense_supplier" class="inputbox" type="text" value="" maxlength="50"></div>
				</div>
				<div class="row2">
					<div class="width40">Buyer</div>
					<div class="width60"><input id="dialog_expense_buyer" class="inputbox" type="text" value="" maxlength="50"></div>
				</div>
			</div>
		</div>
		<div class="block width50">
			<div class="container last">
				<div class="row2">
					<div class="width40">Object</div>
					<div class="width60"><select id="dialog_expense_object_list" class="select-search width100" onchange="expensesObjectChange();"></select></div>
				</div>
				<div class="row2">
					<div class="width40">Odometer (km)</div>
					<div class="width60"><input id="dialog_expense_odo" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width40">Engine hours (h)</div>
					<div class="width60"><input id="dialog_expense_engh" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width40">Description</div>
					<div class="width60"><textarea id="dialog_expense_desc" class="inputbox" style="height:78px;" maxlength="500"></textarea></div>
				</div>
			</div>
		</div>
	</div>	
	
	<center>
		<input class="button icon-save icon" type="button" onclick="expensesProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="expensesProperties('cancel');" value="Cancel" />
	</center>
</div>		<div id="dialog_cmd" title="Object control">
	<div id="cmd_tabs">
		<ul>
			<li><a href="#cmd_gprs_tab">GPRS</a></li>
			<li><a href="#cmd_sms_tab">SMS</a></li>
			<li><a href="#cmd_schedule_tab">Schedule</a></li>
			<li><a href="#cmd_templates_tab">Templates</a></li>
		</ul>
		
		<div id="cmd_gprs_tab">
			<div class="row">
				<div class="block width100">
					<div class="container last">
						<div class="row2">
							<div class="width20">Object</div>
							<div class="width29"><select id="cmd_gprs_object_list" class="select-multiple-search width100" multiple="multiple" onchange="cmdGPRSTemplateList();"></select></div>
							<div class="width1"></div>
							<div class="width20">Template</div>
							<div class="width30"><select id="cmd_gprs_template_list" class="select width100" onchange="cmdGPRSTemplateSwitch();"></select></div>
						</div>
					</div>
				</div>
				<div class="block width100">
					<div class="container last">
						<div class="row2">
							<div class="width20">Command</div>
							<div class="width9">
								<select id="cmd_gprs_cmd_type" class="select width100"/>
									<option value="ascii">ASCII</option>
									<option value="hex">HEX</option>
								</select>
							</div>
							<div class="width1"></div>
							<div class="width55">
								<input id="cmd_gprs_cmd" class="inputbox" type="text" value="" maxlength="256">
							</div>
							<div class="width1"></div>
							<div class="width14">
								<input class="button width100" type="button" onclick="cmdGPRSSend();" value="Send" />
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<table id="cmd_gprs_status_list_grid"></table>
			<div id="cmd_gprs_status_list_grid_pager"></div>
		</div>
		
		<div id="cmd_sms_tab">
			<div class="row">
				<div class="block width100">
					<div class="container last">
						<div class="row2">
							<div class="width20">Object</div>
							<div class="width29"><select id="cmd_sms_object_list" class="select-multiple-search width100" multiple="multiple" onchange="cmdSMSTemplateList();""></select></div>
							<div class="width1"></div>
							<div class="width20">Template</div>
							<div class="width30"><select id="cmd_sms_template_list" class="select width100" onchange="cmdSMSTemplateSwitch();""></select></div>
						</div>
					</div>
				</div>
				<div class="block width100">
					<div class="container last">
						<div class="row2">
							<div class="width20">Command</div>						
							<div class="width65">
								<input id="cmd_sms_cmd" class="inputbox" type="text" value="" maxlength="256">
							</div>
							<div class="width1"></div>
							<div class="width14">
								<input class="button width100" type="button" onclick="cmdSMSSend();" value="Send" />
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<table id="cmd_sms_status_list_grid"></table>
			<div id="cmd_sms_status_list_grid_pager"></div>
		</div>
		
		<div id="cmd_schedule_tab">
			<table id="cmd_schedule_list_grid"></table>
			<div id="cmd_schedule_list_grid_pager"></div>
		</div>
		
		<div id="cmd_templates_tab">
			<table id="cmd_template_list_grid"></table>
			<div id="cmd_template_list_grid_pager"></div>
		</div>
	</div>
</div>

<div id="dialog_cmd_schedule_properties" title="Schedule properties">
	<div class="row">
		<div class="block width60">
			<div class="container">
				<div class="title-block">Schedule</div>
				<div class="row2">
					<div class="width35">Active</div>
					<div class="width65"><input id="dialog_cmd_schedule_active" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width35">Name</div>
					<div class="width65"><input id="dialog_cmd_schedule_name" class="inputbox" type="text" value="" maxlength="25"></div>
				</div>
				<div class="row2">
					<div class="width35">Protocol</div>
					<div class="width65">
						<select id="dialog_cmd_schedule_protocol" class="select-search width100" onchange="cmdScheduleProtocolSwitch();"></select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Objects</div>
					<div class="width65">
						<select id="dialog_cmd_schedule_object_list" class="select-multiple-search width100" multiple="multiple" onchange=""></select>
					</div>
				</div>				
				<div class="row2">
					<div class="width35">Template</div>
					<div class="width65">
						<select id="dialog_cmd_schedule_template_list" class="select width100" onchange="cmdScheduleTemplateSwitch();"></select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Gateway</div>
					<div class="width65">
						<select id="dialog_cmd_schedule_cmd_gateway" class="select width100"/>
							<option value="gprs">GPRS</option>
							<option value="sms">SMS</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Type</div>
					<div class="width65">
						<select id="dialog_cmd_schedule_cmd_type" class="select width100"/>
							<option value="ascii">ASCII</option>
							<option value="hex">HEX</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Command</div>
					<div class="width65">
						<input id="dialog_cmd_schedule_cmd_cmd" class="inputbox" type="text" value="" maxlength="256">
					</div>
				</div>
			</div>
		</div>
		<div class="block width40">
			<div class="container last">
				<div class="title-block">Time</div>
				<div class="row2">
					<div class="width35">Exact time</div>
					<div class="width10">
						<input id="dialog_cmd_schedule_exact_time" type="checkbox" class="checkbox" onchange="cmdScheduleExactTimeSwitch();"/>
					</div>
					<div class="width30">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_cmd_schedule_exact_time_date" type="text" value=""/>
					</div>
					<div class="width2"></div>
					<div class="width20">
						<select id="dialog_cmd_schedule_exact_time_time" class="select width100">
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
<option value="23:45">23:45</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Monday</div>
					<div class="width10">
						<input id="dialog_cmd_schedule_daily_mon" type="checkbox" class="checkbox"/>
					</div>
					<div class="width20">
						<select id="dialog_cmd_schedule_daily_mon_time" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Tuesday</div>
					<div class="width10">
						<input id="dialog_cmd_schedule_daily_tue" type="checkbox" class="checkbox"/>
					</div>
					<div class="width20">
						<select id="dialog_cmd_schedule_daily_tue_time" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Wednesday</div>
					<div class="width10">
						<input id="dialog_cmd_schedule_daily_wed" type="checkbox" class="checkbox"/>
					</div>
					<div class="width20">
						<select id="dialog_cmd_schedule_daily_wed_time" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Thursday</div>
					<div class="width10">
						<input id="dialog_cmd_schedule_daily_thu" type="checkbox" class="checkbox"/>
					</div>
					<div class="width20">
						<select id="dialog_cmd_schedule_daily_thu_time" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Friday</div>
					<div class="width10">
						<input id="dialog_cmd_schedule_daily_fri" type="checkbox" class="checkbox"/>
					</div>
					<div class="width20">
						<select id="dialog_cmd_schedule_daily_fri_time" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Saturday</div>
					<div class="width10">
						<input id="dialog_cmd_schedule_daily_sat" type="checkbox" class="checkbox"/>
					</div>
					<div class="width20">
						<select id="dialog_cmd_schedule_daily_sat_time" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width35">Sunday</div>
					<div class="width10">
						<input id="dialog_cmd_schedule_daily_sun" type="checkbox" class="checkbox"/>
					</div>
					<div class="width20">
						<select id="dialog_cmd_schedule_daily_sun_time" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="cmdScheduleProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="cmdScheduleProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_cmd_template_properties" title="Command properties">
	<div class="row">
		<div class="title-block">Template</div>
		<div class="row2">
			<div class="width35">Name</div>
			<div class="width65"><input id="dialog_cmd_template_name" class="inputbox" type="text" value="" maxlength="25"></div>
		</div>
		<div class="row2">
			<div class="width35">Hide unused protocols</div>
			<div class="width65">
				<input id="dialog_cmd_template_hide_unsed_protocols" type="checkbox" class="checkbox" onchange="cmdTemplateProtocolList();"/>
			</div>
		</div>
		<div class="row2">
			<div class="width35">
				Protocol			</div>
			<div class="width65">
				<select id="dialog_cmd_template_protocol" class="select-search width100"></select>
			</div>
		</div>
		<div class="row2">
			<div class="width35">Gateway</div>
			<div class="width65">
				<select id="dialog_cmd_template_gateway" class="select width100"/>
					<option value="gprs">GPRS</option>
					<option value="sms">SMS</option>
				</select>
			</div>
		</div>
		<div class="row2">
			<div class="width35">Type</div>
			<div class="width65">
				<select id="dialog_cmd_template_type" class="select width100"/>
					<option value="ascii">ASCII</option>
					<option value="hex">HEX</option>
				</select>
			</div>
		</div>
		<div class="row2">
			<div class="width35">Command</div>
			<div class="width65">
				<input id="dialog_cmd_template_cmd" class="inputbox" type="text" value="" maxlength="256">
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="block width100">
			<div class="container last">
				<div class="title-block">Variables</div>
				<div class="row2">
					<div class="row">%IMEI% - Object IMEI</div>
				</div>
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="cmdTemplateProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="cmdTemplateProperties('cancel');" value="Cancel" />
	</center>
</div>		<div id="dialog_image_gallery" title="Image gallery">
	<div class="block float-left img-controls">
		<div class="container">
			<div class="row2">
				<div class="width35">Object</div>
				<div class="width65"><select id="dialog_image_gallery_object_list" class="select-search width100"></select></div>
			</div>
			<div class="row2">
				<div class="width35">Filter</div>
				<div class="width65">
					<select id="dialog_image_gallery_filter" class="select width100" onchange="switchDateFilter('img');">
						<option value="0" selected>Whole period</option>
						<option value="1">Last hour</option>
						<option value="2">Today</option>
						<option value="3">Yesterday</option>
						<option value="4">Before 2 days</option>
						<option value="5">Before 3 days</option>
						<option value="6">This week</option>
						<option value="7">Last week</option>
						<option value="8">This month</option>
						<option value="9">Last month</option>
					</select>
				</div>
			</div>
			<div class="row2">
				<div class="width35">Time from</div>
				<div class="width31">
					<input readonly class="inputbox-calendar inputbox width100" id="dialog_image_gallery_date_from" type="text" value=""/>
				</div>
				<div class="width2"></div>
				<div class="width15">
					<select id="dialog_image_gallery_hour_from" class="select width100">
					<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>					</select>
				</div>
				<div class="width2"></div>
				<div class="width15">
					<select id="dialog_image_gallery_minute_from" class="select width100">
					<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>					</select>
				</div>
			</div>
			<div class="row3">
				<div class="width35">Time to</div>
				<div class="width31">
					<input readonly class="inputbox-calendar inputbox width100" id="dialog_image_gallery_date_to" type="text" value=""/>
				</div>
				<div class="width2"></div>
				<div class="width15">
					<select id="dialog_image_gallery_hour_to" class="select width100">
					<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>					</select>
				</div>
				<div class="width2"></div>
				<div class="width15">
					<select id="dialog_image_gallery_minute_to" class="select width100">
					<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>					</select>
				</div>
			</div>
			<div class="row3">
				<center>
					<input style="width: 100px; margin-right: 3px;" class="button" type="button" value="Delete all" onclick="imgDeleteAll();"/>
					<input style="width: 100px;" class="button" type="button" value="Show" onclick="imgFilter();"/>
				</center>
			</div>
			
			<table id="image_gallery_list_grid"></table>
			<div id="image_gallery_list_grid_pager"></div>
		</div>
	</div>
	<div class="block float-left img-content">
		<div class="container last">
			<div class="row3">
				<div id="image_gallery_img"></div>
			</div>
			<div id="image_gallery_img_data"></div>
		</div>
	</div>
</div>		<div id="dialog_chat" title="Chat">
	<div class="block float-left">
		<div class="container">
			<div class="row3">
				<div class="width70">					
					<input id="chat_object_list_search" class="inputbox-search" type="text" value="" placeholder="Search" maxlength="25">
				</div>
				<div class="float-right">
					<a href="#" onclick="chatReloadData();">
						<div class="panel-button"  title="Reload">
							<img src="theme/tracking/images/refresh-color.svg" width="16px" border="0"/>
						</div>
					</a>
					<a href="#" onclick="chatDeleteAllMsgs();">
						<div class="panel-button"  title="Delete all selected object messages">
							<img src="theme/tracking/images/remove2.svg" width="16px" border="0"/>
						</div>
					</a>
				</div>
			</div>
			<table id="chat_object_list_grid"></table>
		</div>
	</div>
	
	<div class="chat-msgs-block">
		<div id="chat_msgs_dt"></div>
		<div id="chat_msgs">
			<div id="chat_msgs_text"></div>
			<div class="chat-msg-status" id="chat_msg_status"></div>
		</div>
	</div>

	<div class="chat-msg-block" >
		<input id="chat_msg" class="inputbox" type="text" value="" maxlength="500" onkeydown="if (event.keyCode == 13) chatSend();" placeholder="Type a message..." disabled>
	</div>
</div>		<div id="dialog_settings_kml_properties" title="KML properties">
	<div class="row">
		<div class="row2">
			<div class="width30">Active</div>
			<div class="width70"><input id="dialog_settings_kml_active" type="checkbox" checked="checked"/></div>
		</div>
		<div class="row2">
			<div class="width30">Name</div>
			<div class="width70"><input id="dialog_settings_kml_name" class="inputbox" type="text" value="" maxlength="50"></div>
		</div>
		<div class="row2">
			<div class="width30">Description</div>
			<div class="width70"><textarea id="dialog_settings_kml_desc" class="inputbox" style="height:50px;" maxlength="100"></textarea></div>
		</div>
		<div class="row2">
			<div class="width30">KML file</div>
			<div class="width45"><input id="dialog_settings_kml_file" class="inputbox" type="text" value="" maxlength="256" disabled></div>
			<div class="width1"></div>
			<div class="width24"><input id="dialog_settings_kml_upload" class="button float-right width100" type="button" value="Upload" onclick="settingsKMLUpload();"/></div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsKMLProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsKMLProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_template_properties" title="Template properties">
	<div class="row">
		<div class="block width60">
			<div class="container">
				<div class="title-block">Template</div>
				<div class="row2">
					<div class="width30">Name</div>
					<div class="width70"><input id="dialog_settings_template_name" class="inputbox" type="text" value="" maxlength="50"></div>
				</div>
				<div class="row2">
					<div class="width30">Description</div>
					<div class="width70"><textarea id="dialog_settings_template_desc" class="inputbox" style="height:50px;" maxlength="100"></textarea></div>
				</div>
				<div class="row2">
					<div class="width30">Subject</div>
					<div class="width70"><input id="dialog_settings_template_subject" class="inputbox" maxlength="100"></div>
				</div>
				<div class="row2">
					<div class="width30">Message</div>
					<div class="width70"><textarea id="dialog_settings_template_message" class="inputbox" style="height:200px;" maxlength="2000"></textarea></div>
				</div>
			</div>
		</div>
		<div class="block width40">
			<div class="container last">
				<div class="title-block">Variables</div>
				<div class="row2">
					<div style="height: 305px; overflow-y: scroll;">
						<div class="row">%NAME% - Object name</div>
						<div class="row">%IMEI% - Object IMEI</div>
						
						<div class="row">%EVENT% - Event name</div>
						<div class="row">%ROUTE% - Route name</div>
						<div class="row">%ZONE% - Zone name</div>
						
						<div class="row">%LAT% - Position latitude</div>
						<div class="row">%LNG% - Position longitude</div>
						<div class="row">%ADDRESS% - Position address</div>
						<div class="row">%SPEED% - Speed</div>
						<div class="row">%ALT% - Altitude</div>
						<div class="row">%ANGLE% - Moving angle</div>
						<div class="row">%DT_POS% - Position date and time</div>
						<div class="row">%DT_SER% - Server date and time</div>
						<div class="row">%G_MAP% - URL to Google Maps with position</div>
						
						<div class="row">%TR_MODEL% - Transport model</div>
						<div class="row">%VIN% - VIN</div>
						<div class="row">%PL_NUM% - Plate number</div>
						<div class="row">%SIM_NUMBER% - SIM card number</div>
						<div class="row">%DRIVER% - Driver name</div>
						<div class="row">%TRAILER% - Trailer name</div>
						
						<div class="row">%ODOMETER% - Odometer</div>						
						<div class="row">%ENG_HOURS% - Engine hours</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsTemplateProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsTemplateProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_subaccount_properties" title="Sub account properties">
	<div class="row">
		<div class="title-block">Sub account</div>
		<div class="block width50">			
			<div class="container">				
				<div class="row2">
					<div class="width40">Active</div>
					<div class="width60"><input id="dialog_settings_subaccount_active" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width40">Username</div>
					<div class="width60"><input id="dialog_settings_subaccount_username" class="inputbox" type="text" value="" maxlength="50"/></div>
				</div>
				<div class="row2">
					<div class="width40">E-mail</div>
					<div class="width60"><input id="dialog_settings_subaccount_email" class="inputbox" type="text" value="" maxlength="50"/></div>
				</div>
				<div class="row2">
					<div class="width40">Password</div>
					<div class="width60"><input id="dialog_settings_subaccount_password" class="inputbox" type="text" value="" maxlength="20"/></div>
				</div>
				<div class="row2">
					<div class="width40">Send credentials</div>
					<div class="width60"><input id="dialog_settings_subaccount_send" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width40">Expire on</div>
					<div class="width10">
						<input id="dialog_settings_subaccount_expire" type="checkbox" class="checkbox" onchange="settingsSubaccountCheck();"/>
					</div>
					<div class="width50">
						<input readonly class="inputbox-calendar inputbox width100" id="dialog_settings_subaccount_expire_dt"/>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Objects</div>
					<div class="width60"><select id="dialog_settings_subaccount_available_objects" class="select-multiple-search width100" multiple="multiple" /></select></div>
				</div>
				<div class="row2">
					<div class="width40">Markers</div>
					<div class="width60"><select id="dialog_settings_subaccount_available_markers" class="select-multiple-search width100" multiple="multiple" /></select></div>
				</div>
				<div class="row2">
					<div class="width40">Routes</div>
					<div class="width60"><select id="dialog_settings_subaccount_available_routes" class="select-multiple-search width100" multiple="multiple" /></select></div>
				</div>
				<div class="row2">
					<div class="width40">Zones</div>
					<div class="width60"><select id="dialog_settings_subaccount_available_zones" class="select-multiple-search width100" multiple="multiple" /></select></div>
				</div>
			</div>
		</div>
	
		<div class="block width50">
			<div class="container last">
				<div class="row2">
					<div class="width70">Dashboard</div>
					<div class="width30"><input id="dialog_settings_subaccount_dashboard" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width70">History</div>
					<div class="width30"><input id="dialog_settings_subaccount_history" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width70">Reports</div>
					<div class="width30"><input id="dialog_settings_subaccount_reports" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2" style="display: none;">
					<div class="width70">Tachograph</div>
					<div class="width30"><input id="dialog_settings_subaccount_tachograph" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width70">Tasks</div>
					<div class="width30"><input id="dialog_settings_subaccount_tasks" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width70">RFID and iButton logbook</div>
					<div class="width30"><input id="dialog_settings_subaccount_rilogbook" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width70">DTC (Diagnostic Trouble Codes)</div>
					<div class="width30"><input id="dialog_settings_subaccount_dtc" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width70">Maintenance</div>
					<div class="width30"><input id="dialog_settings_subaccount_maintenance" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width70">Expenses</div>
					<div class="width30"><input id="dialog_settings_subaccount_expenses" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width70">Object control</div>
					<div class="width30"><input id="dialog_settings_subaccount_object_control" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width70">Image gallery</div>
					<div class="width30"><input id="dialog_settings_subaccount_image_gallery" type="checkbox" checked="checked"/></div>
				</div>
				<div class="row2">
					<div class="width70">Chat</div>
					<div class="width30"><input id="dialog_settings_subaccount_chat" type="checkbox" checked="checked"/></div>
				</div>
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="title-block">Access via URL</div>
		<div class="row2">
			<div class="width195">Active</div>
			<div class="width805">
				<input id="dialog_settings_subaccount_au_active" type="checkbox" class="checkbox"/>
			</div>
		</div>
		<div class="row2">
			<div class="width195">URL desktop</div>
			<div class="width805">
				<input class="inputbox" id="dialog_settings_subaccount_au" readonly />
			</div>
		</div>
		<div class="row2">
			<div class="width195">URL mobile</div>
			<div class="width805">
				<input class="inputbox" id="dialog_settings_subaccount_au_mobile" readonly />
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsSubaccountProperties('save');" value="Save" />
		<input class="button icon-close icon" type="button" onclick="settingsSubaccountProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_event_properties" title="Event properties">
	<div id="settings_event">
		<ul>           
			<li><a href="#settings_event_main">Main</a></li>
			<li><a href="#settings_event_time">Time</a></li>
			<li><a href="#settings_event_notification">Notifications</a></li>
			<li><a href="#settings_event_webhook">Webhook</a></li>
			<li id="settings_event_object_control_tab"><a href="#settings_event_object_control">Object control</a></li>
		</ul>
		<div id="settings_event_main">
			<div class="row">				
				<div class="block width55">
					<div class="container">
						<div class="title-block">Event</div>
						<div class="row2">
							<div class="width40">Active</div>
							<div class="width60"><input id="dialog_settings_event_active" type="checkbox" checked="checked"/></div>
						</div>
						<div class="row2">
							<div class="width40">Name</div>
							<div class="width60"><input id="dialog_settings_event_name" class="inputbox" type="text" value="" maxlength="30"/></div>
						</div>
						<div class="row2">
							<div class="width40">Type</div>
							<div class="width60">
								<select id="dialog_settings_event_type" class="select width100" onchange="settingsEventSwitchType();"/>
									<option value="sos">SOS</option>
									<option value="bracon">Bracelet on</option>
									<option value="bracoff">Bracelet off</option>
									<option value="dismount">Dismount</option>
									<option value="disassem">Disassemble</option>
									<option value="door">Door</option>
									<option value="mandown">Man down</option>									
									<option value="shock">Shock</option>
									<option value="tow">Tow</option>
									<option value="pwrcut">Power cut</option>
									<option value="gpsantcut">GPS antenna cut</option>
									<option value="jamming">Signal jamming</option>
									<option value="lowdc">Low DC</option>
									<option value="lowbat">Low battery</option>
									<option value="connyes">Connection: Yes</option>
									<option value="connno">Connection: No</option>
									<option value="gpsyes">GPS: Yes</option>
									<option value="gpsno">GPS: No</option>
									<option value="stopped">Stopped</option>
									<option value="moving">Moving</option>
									<option value="engidle">Engine idle</option>
									<option value="overspeed">Overspeed</option>
									<option value="underspeed">Underspeed</option>
									<option value="haccel">Harsh acceleration</option>
									<option value="hbrake">Harsh braking</option>
									<option value="hcorn">Harsh cornering</option>									
									<option value="driverch">Driver change</option>
									<option value="trailerch">Trailer change</option>									
									<option value="param">Parameter</option>
									<option value="sensor">Sensor</option>
									<option value="service">Service</option>
									<option value="dtc">DTC (Diagnostic Trouble Codes)</option>
									<option value="proximity">Proximity</option>
									<option value="route_in">Route in</option>
									<option value="route_out">Route out</option>
									<option value="zone_in">Zone in</option>
									<option value="zone_out">Zone out</option>
								</select>
							</div>
						</div>
						<div class="row2">
							<div class="width40">
								Objects							</div>
							<div class="width60">
								<select id="dialog_settings_event_object_list" class="select-multiple-search width100" multiple="multiple" /></select>
							</div>
						</div>
						<div class="row2">
							<div class="width40">Depending on routes</div>
							<div class="width60">
								<select id="dialog_settings_event_route_trigger" class="select width100"/>
									<option value="off">Off</option>
									<option value="in">In selected routes</option>
									<option value="out">Out of selected routes</option>
								</select>
							</div>
						</div>
						<div class="row2">
							<div class="width40">
								Routes							</div>
							<div class="width60">
								<select id="dialog_settings_event_routes" class="select-multiple-search width100" multiple="multiple" /></select>
							</div>
						</div>
						<div class="row2">
							<div class="width40">Depending on zones</div>
							<div class="width60">
								<select id="dialog_settings_event_zone_trigger" class="select width100"/>
									<option value="off">Off</option>
									<option value="in">In selected zones</option>
									<option value="out">Out of selected zones</option>
								</select>
							</div>
						</div>
						<div class="row2">
							<div class="width40">
								Zones							</div>
							<div class="width60">
								<select id="dialog_settings_event_zones" class="select-multiple-search width100" multiple="multiple" /></select>
							</div>
						</div>
						<div class="row2">
							<div class="width40">Time period (min)</div>
							<div class="width60"><input class="inputbox width100" id="dialog_settings_event_time_period" onkeypress="return isNumberKey(event);" type="text" value="" maxlength="4" disabled/></div>
						</div>
						<div class="row2">
							<div class="width40">Speed limit (kph)</div>
							<div class="width60"><input class="inputbox width100" id="dialog_settings_event_speed_limit" onkeypress="return isNumberKey(event);" type="text" value="" maxlength="4" disabled/></div>
						</div>
						<div class="row2">
							<div class="width40">Distance (km)</div>
							<div class="width60"><input class="inputbox width100" id="dialog_settings_event_distance" onkeypress="return isNumberKey(event);" type="text" value="" maxlength="5" disabled/></div>
						</div>	
					</div>					
				</div>
				<div class="block width45">
					<div class="container last">
						<div class="title-block">Parameters and sensors</div>
						<div class="row2">
							<div class="width100">
								<div id="dialog_settings_event_param_sensor_condition_list">
									<table id="settings_event_param_sensor_condition_list_grid"></table>
								</div>
							</div>
						</div>
						<div class="row2">
							<div class="width40">
								<select id="dialog_settings_event_param_sensor_condition_src" class="select width100"/></select>
							</div>
							<div class="width2"></div>
							<div class="width16">
								<select id="dialog_settings_event_param_sensor_condition_cn" class="select width100"/>
									<option value=""></option>
									<option value="eq">=</option>
									<option value="gr">></option>									
									<option value="lw"><</option>
									<option value="grp">> %</option>
									<option value="lwp">< %</option>
								</select>
							</div>
							<div class="width2"></div>
							<div class="width28">
								<input class="inputbox width100" id="dialog_settings_event_param_sensor_condition_val" type="text" value=""/>
							</div>
							<div class="width2"></div>
							<div class="width10">
								<input id="dialog_settings_event_param_sensor_condition_add" style="min-width: 0;" class="width100 button icon-new no-text icon" type="button" value="" onclick="settingsEventConditionAdd();" disabled />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="settings_event_time">
			<div class="row">
				<div class="title-block">Time</div>
				<div class="row2">
					<div class="width50">Duration from last event in minutes</div>
					<div class="width5">
						<input id="dialog_settings_event_duration_from_last_event" type="checkbox" class="checkbox"/>
					</div>
					<div class="width10">
						<input id="dialog_settings_event_duration_from_last_event_minutes" class="inputbox" onkeypress="return isNumberKey(event);" type="text" value="" maxlength="5"/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">Week days</div>
					<div class="width50">
						<div style="text-align:center; margin-right: 5px;">M<br/><input id="dialog_settings_event_wd_mon" type="checkbox" checked="checked"/></div>
						<div style="text-align:center; margin-right: 5px;">T<br/><input id="dialog_settings_event_wd_tue" type="checkbox" checked="checked"/></div>
						<div style="text-align:center; margin-right: 5px;">W<br/><input id="dialog_settings_event_wd_wed" type="checkbox" checked="checked"/></div>
						<div style="text-align:center; margin-right: 5px;">T<br/><input id="dialog_settings_event_wd_thu" type="checkbox" checked="checked"/></div>
						<div style="text-align:center; margin-right: 5px;">F<br/><input id="dialog_settings_event_wd_fri" type="checkbox" checked="checked"/></div>
						<div style="text-align:center; margin-right: 5px;">S<br/><input id="dialog_settings_event_wd_sat" type="checkbox" checked="checked"/></div>
						<div style="text-align:center; margin-right: 5px;">S<br/><input id="dialog_settings_event_wd_sun" type="checkbox" checked="checked"/></div>
					</div>
				</div>
				<div class="row2">
					<div class="width50">Day time</div>
					<div class="width5">
						<input id="dialog_settings_event_dt" type="checkbox" class="checkbox" onclick="settingsEventSwitchDayTime();"/>
					</div>
				</div>
				<div class="row2">
					<div class="width50">Monday</div>
					<div class="width5">
						<input id="dialog_settings_event_dt_mon" type="checkbox" class="checkbox"/>
					</div>
					<div class="width10">
						<select id="dialog_settings_event_dt_mon_from" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width10">							
						<select id="dialog_settings_event_dt_mon_to" class="select width100">		
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
<option value="23:45">23:45</option>
<option value="24:00">24:00</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width50">Tuesday</div>
					<div class="width5">
						<input id="dialog_settings_event_dt_tue" type="checkbox" class="checkbox"/>
					</div>
					<div class="width10">
						<select id="dialog_settings_event_dt_tue_from" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width10">						
						<select id="dialog_settings_event_dt_tue_to" class="select width100">		
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
<option value="23:45">23:45</option>
<option value="24:00">24:00</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width50">Wednesday</div>
					<div class="width5">
						<input id="dialog_settings_event_dt_wed" type="checkbox" class="checkbox"/>
					</div>
					<div class="width10">
						<select id="dialog_settings_event_dt_wed_from" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width10">
						<select id="dialog_settings_event_dt_wed_to" class="select width100">		
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
<option value="23:45">23:45</option>
<option value="24:00">24:00</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width50">Thursday</div>
					<div class="width5">
						<input id="dialog_settings_event_dt_thu" type="checkbox" class="checkbox"/>
					</div>
					<div class="width10">
						<select id="dialog_settings_event_dt_thu_from" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width10">							
						<select id="dialog_settings_event_dt_thu_to" class="select width100">		
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
<option value="23:45">23:45</option>
<option value="24:00">24:00</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width50">Friday</div>
					<div class="width5">
						<input id="dialog_settings_event_dt_fri" type="checkbox" class="checkbox"/>
					</div>
					<div class="width10">
						<select id="dialog_settings_event_dt_fri_from" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width10">						
						<select id="dialog_settings_event_dt_fri_to" class="select width100">		
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
<option value="23:45">23:45</option>
<option value="24:00">24:00</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width50">Saturday</div>
					<div class="width5">
						<input id="dialog_settings_event_dt_sat" type="checkbox" class="checkbox"/>
					</div>
					<div class="width10">
						<select id="dialog_settings_event_dt_sat_from" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width10">
						<select id="dialog_settings_event_dt_sat_to" class="select width100">		
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
<option value="23:45">23:45</option>
<option value="24:00">24:00</option>						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width50">Sunday</div>
					<div class="width5">
						<input id="dialog_settings_event_dt_sun" type="checkbox" class="checkbox"/>
					</div>
					<div class="width10">
						<select id="dialog_settings_event_dt_sun_from" class="select width100">		
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
<option value="23:45">23:45</option>						</select>
					</div>
					<div class="width2"></div>
					<div class="width10">						
						<select id="dialog_settings_event_dt_sun_to" class="select width100">		
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
<option value="23:45">23:45</option>
<option value="24:00">24:00</option>						</select>
					</div>
				</div>
			</div>
		</div>
		<div id="settings_event_notification">
			<div class="row">
				<div class="title-block">Notifications</div>
				<div class="row2">
					<div class="width45">System message</div>
					<div class="width5"></div>
					<div class="width50">
						<input id="dialog_settings_event_notify_system" type="checkbox" class="checkbox"/>
					</div>
				</div>
				<div class="row2">
					<div class="width45">Auto hide</div>
					<div class="width5"></div>
					<div class="width50">
						<input id="dialog_settings_event_notify_system_hide" type="checkbox" class="checkbox"/>
					</div>
				</div>
				<div class="row2">
					<div class="width45">Push notification</div>
					<div class="width5"></div>
					<div class="width50">
						<input id="dialog_settings_event_notify_push" type="checkbox" class="checkbox"/>
					</div>
				</div>
				<div class="row2">
					<div class="width45">Sound alert</div>
					<div class="width5"></div>
					<div class="width5">
						<input id="dialog_settings_event_notify_system_sound" type="checkbox" class="checkbox"/>
					</div>
					<div class="width29">
						<select id="dialog_settings_event_notify_system_sound_file" class="select width100"/>
						<option value="alarm1.mp3">alarm1.mp3</option><option value="alarm2.mp3">alarm2.mp3</option><option value="alarm3.mp3">alarm3.mp3</option><option value="alarm4.mp3">alarm4.mp3</option><option value="alarm5.mp3">alarm5.mp3</option><option value="alarm6.mp3">alarm6.mp3</option><option value="alarm7.mp3">alarm7.mp3</option><option value="alarm8.mp3">alarm8.mp3</option><option value="beep1.mp3">beep1.mp3</option><option value="beep2.mp3">beep2.mp3</option><option value="beep3.mp3">beep3.mp3</option><option value="beep4.mp3">beep4.mp3</option><option value="beep5.mp3">beep5.mp3</option>						</select>
					</div>
					<div class="width1"></div>
					<div class="width15">
						<input class="button float-right width100" type="button" onclick="settingsEventPlaySound();" value="Play" />
					</div>
				</div>
				<div class="row2">
					<div class="width45">Message to e-mail, for multiple e-mails separate them by comma</div>
					<div class="width5"></div>
					<div class="width5">
						<input id="dialog_settings_event_notify_email" type="checkbox" class="checkbox"/>
					</div>
					<div class="width45">
						<input id="dialog_settings_event_notify_email_address" class="inputbox" type="text" value="" maxlength="500" placeholder="E-mail address"/>
					</div>
				</div>
				<div class="row2">
					<div class="width45">SMS to mobile phone, for multiple phone numbers separate them by comma</div>
					<div class="width5"></div>
					<div class="width5">
						<input id="dialog_settings_event_notify_sms" type="checkbox" class="checkbox"/>
					</div>
					<div class="width45">
						<input id="dialog_settings_event_notify_sms_number" class="inputbox" type="text" value="" maxlength="500" placeholder="Phone number with code"/>
					</div>
				</div>
				<div class="row2">
					<div class="width45">E-mail template</div>
					<div class="width5"></div>
					<div class="width5"></div>
					<div class="width45">
						<select id="dialog_settings_event_notify_email_template" class="select width100"/></select>
					</div>
				</div>
				<div class="row2">
					<div class="width45">SMS template</div>
					<div class="width5"></div>
					<div class="width5"></div>
					<div class="width45">
						<select id="dialog_settings_event_notify_sms_template" class="select width100"/></select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="title-block">Colors</div>
				<div class="row2">
					<div class="width45">Object arrow color</div>
					<div class="width5"></div>
					<div class="width5">
						<input id="dialog_settings_event_notify_arrow" type="checkbox" class="checkbox"/>
					</div>
					<div class="width20">
						<select id="dialog_settings_event_notify_arrow_color" class="select width100">
							<option value="arrow_black">Black</option>
<option value="arrow_blue">Blue</option>
<option value="arrow_green">Green</option>
<option value="arrow_grey">Grey</option>
<option value="arrow_orange">Orange</option>
<option value="arrow_purple">Purple</option>
<option value="arrow_red">Red</option>
<option value="arrow_yellow">Yellow</option>

						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width45">Object list color</div>
					<div class="width5"></div>
					<div class="width5">
						<input id="dialog_settings_event_notify_ohc" type="checkbox" class="checkbox"/>
					</div>
					<div class="width45">
						<input class="color inputbox" style="width:55px" type='text' id='dialog_settings_event_notify_ohc_color'/>
					</div>
				</div>
			</div>
		</div>
		<div id="settings_event_webhook">
			<div class="row">
				<div class="title-block">Webhook</div>
				<div class="row2">
					<div class="width25">Send webhook</div>
					<div class="width75">
						<input id="dialog_settings_event_webhook_send" type="checkbox" class="checkbox"/>
					</div>
				</div>
				<div class="row2">
					<div class="width25">Webhook URL</div>
					<div class="width75">
						<textarea id="dialog_settings_event_webhook_url" style="height: 75px;" class="inputbox width100" maxlength="2048" placeholder="ex. http://full_address_here"/></textarea>
					</div>
				</div>
			</div>
		</div>
		<div id="settings_event_object_control">
			<div class="row">
				<div class="title-block">Object control</div>
				<div class="row2">
					<div class="width25">Send command</div>
					<div class="width75">
						<input id="dialog_settings_event_cmd_send" type="checkbox" class="checkbox"/>
					</div>
				</div>
				<div class="row2">
					<div class="width25">Template</div>
					<div class="width30">
						<select id="dialog_settings_event_cmd_template_list" class="select width100" onchange="settingsEventCmdTemplateSwitch();"/></select>
					</div>
				</div>
				<div class="row2">
					<div class="width25">Gateway</div>
					<div class="width30">
						<select id="dialog_settings_event_cmd_gateway" class="select width100"/>
							<option value="gprs">GPRS</option>
							<option value="sms">SMS</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width25">Type</div>
					<div class="width30">
						<select id="dialog_settings_event_cmd_type" class="select width100"/>
							<option value="ascii">ASCII</option>
							<option value="hex">HEX</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width25">Command</div>
					<div class="width75">
						<input id="dialog_settings_event_cmd_string" class="inputbox float-right" type="text" value="" maxlength="256">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsEventProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsEventProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_group_properties" title="Object group properties">
	<div class="row">
		<div class="row2">
			<div class="width40">Name</div>
			<div class="width60"><input id="dialog_settings_object_group_name" class="inputbox" type="text" value="" maxlength="25"></div>
		</div>
		<div class="row2">
			<div class="width40">Description</div>
			<div class="width60"><textarea id="dialog_settings_object_group_desc" class="inputbox" style="height:50px;" maxlength="100"></textarea></div>
		</div>
		<div class="row2">
			<div class="width40">Objects</div>
			<div class="width60"><select id="dialog_settings_object_group_objects" class="select-multiple-search width100" multiple="multiple"></select></div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectGroupProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectGroupProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_driver_properties" title="Object driver properties">
	<div class="row">
		<div class="report-block block width40">
			<div class="container">
				<div class="row2" style="height: 186px; vertical-align: middle; text-align: center; display: table;">
					<img id="dialog_settings_object_driver_photo" style="border:0px; width: 144px;" src="img/user-blank.svg" />
				</div>
				<center>
					<input class="button" type="button" value="Upload" onclick="settingsObjectDriverPhotoUpload();"/>&nbsp;
					<input class="button" type="button" value="Delete" onclick="settingsObjectDriverPhotoDelete();"/>
				</center>
			</div>
		</div>
		<div class="report-block block width60">
			<div class="container last">	
				<div class="row2">
					<div class="width40">Name</div>
					<div class="width60"><input id="dialog_settings_object_driver_name" class="inputbox" type="text" value="" maxlength="30"></div>
				</div>
				<div class="row2">
					<div class="width40">RFID, iButton, Blue ID</div>
					<div class="width60"><input id="dialog_settings_object_driver_assign_id" class="inputbox" type="text" value="" maxlength="50"></div>
				</div>
				<div class="row2">
					<div class="width40">ID number</div>
					<div class="width60"><input id="dialog_settings_object_driver_idn" class="inputbox" type="text" value="" maxlength="30"></div>
				</div>
				<div class="row2">
					<div class="width40">Address</div>
					<div class="width60"><input id="dialog_settings_object_driver_address" class="inputbox" type="text" value="" maxlength="100"></div>
				</div>
				<div class="row2">
					<div class="width40">Phone</div>
					<div class="width60"><input id="dialog_settings_object_driver_phone" class="inputbox" type="text" value="" maxlength="50"></div>
				</div>
				<div class="row2">
					<div class="width40">E-mail</div>
					<div class="width60"><input id="dialog_settings_object_driver_email" class="inputbox" type="text" value="" maxlength="50"></div>
				</div>
				<div class="row2">
					<div class="width40">Description</div>
					<div class="width60"><textarea id="dialog_settings_object_driver_desc" class="inputbox" style="height:51px;" maxlength="256"></textarea></div>
				</div>
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectDriverProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectDriverProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_passenger_properties" title="Object passenger properties">
	<div class="row">
		<div class="row2">
			<div class="width40">Name</div>
			<div class="width60"><input id="dialog_settings_object_passenger_name" class="inputbox" type="text" value="" maxlength="30"></div>
		</div>
		<div class="row2">
			<div class="width40">RFID, iButton, Blue ID</div>
			<div class="width60"><input id="dialog_settings_object_passenger_assign_id" class="inputbox" type="text" value="" maxlength="50"></div>
		</div>
		<div class="row2">
			<div class="width40">ID number</div>
			<div class="width60"><input id="dialog_settings_object_passenger_idn" class="inputbox" type="text" value="" maxlength="30"></div>
		</div>
		<div class="row2">
			<div class="width40">Address</div>
			<div class="width60"><input id="dialog_settings_object_passenger_address" class="inputbox" type="text" value="" maxlength="100"></div>
		</div>
		<div class="row2">
			<div class="width40">Phone</div>
			<div class="width60"><input id="dialog_settings_object_passenger_phone" class="inputbox" type="text" value="" maxlength="50"></div>
		</div>
		<div class="row2">
			<div class="width40">E-mail</div>
			<div class="width60"><input id="dialog_settings_object_passenger_email" class="inputbox" type="text" value="" maxlength="50"></div>
		</div>
		<div class="row2">
			<div class="width40">Description</div>
			<div class="width60"><textarea id="dialog_settings_object_passenger_desc" class="inputbox" style="height:50px;" maxlength="100"></textarea></div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectPassengerProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectPassengerProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_trailer_properties" title="Object trailer properties">
	<div class="row">
		<div class="row2">
			<div class="width40">Name</div>
			<div class="width60"><input id="dialog_settings_object_trailer_name" class="inputbox" type="text" value="" maxlength="25"></div>
		</div>
		<div class="row2">
			<div class="width40">RFID, iButton, Blue ID</div>
			<div class="width60"><input id="dialog_settings_object_trailer_assign_id" class="inputbox" type="text" value="" maxlength="50"></div>
		</div>
		<div class="row2">
			<div class="width40">Transport model</div>
			<div class="width60"><input id="dialog_settings_object_trailer_model" class="inputbox" type="text" value="" maxlength="30"></div>
		</div>
		<div class="row2">
			<div class="width40">VIN</div>
			<div class="width60"><input id="dialog_settings_object_trailer_vin" class="inputbox" type="text" value="" maxlength="20"></div>
		</div>
		<div class="row2">
			<div class="width40">Plate number</div>
			<div class="width60"><input id="dialog_settings_object_trailer_plate_number" class="inputbox" type="text" value="" maxlength="20"></div>
		</div>
		<div class="row2">
			<div class="width40">Description</div>
			<div class="width60"><textarea id="dialog_settings_object_trailer_desc" class="inputbox" style="height:50px;" maxlength="100"></textarea></div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectTrailerProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectTrailerProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_sensor_properties" title="Sensor properties">
	<div class="row">
		<div class="width33 block">
			<div class="container">
				<div class="row">
					<div class="title-block">Sensor</div>
					<div class="row2">
						<div class="width50">Name</div>
						<div class="width50"><input id="dialog_settings_object_sensor_name" class="inputbox" type="text" value="" maxlength="25"></div>
					</div>
					<div class="row2">
						<div class="width50">Type</div>
						<div class="width50">
							<select id="dialog_settings_object_sensor_type" class="select width100" onchange="settingsObjectSensorType();">
								<option value="batt">Battery</option>
								<option value="blueid">Blue ID</option>
								<option value="di">Digital input</option>
								<option value="do">Digital output</option>
								<option value="da">Driver assign</option>
								<option value="engh">Engine hours</option>
								<option value="fuel">Fuel level</option>
								<option value="fuelsumup">Fuel level sum up</option>
								<option value="fuelcons">Fuel consumption</option>
								<option value="gsm">GSM level</option>
								<option value="gps">GPS level</option>
								<option value="acc">Ignition (ACC)</option>
								<option value="odo">Odometer</option>
								<option value="pa">Passenger assign</option>
								<option value="temp">Temperature</option>
								<option value="ta">Trailer assign </option>
								<option value="cust">Custom</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width50">Parameter</div>
						<div class="width50"><select id="dialog_settings_object_sensor_param" class="select width100" onchange="settingsObjectSensorResultPreview();"></select></div>
					</div>
					<div class="row2">
						<div class="width50">Data list</div>
						<div class="width50"><input id="dialog_settings_object_sensor_data_list" type="checkbox" class="checkbox" /></div>
					</div>
					<div class="row2">
						<div class="width50">Popup</div>
						<div class="width50"><input id="dialog_settings_object_sensor_popup" type="checkbox" class="checkbox" /></div>
					</div>
				</div>
			</div>
		
			<div class="container">
				<div class="row">
					<div class="title-block">Result</div>					
					<div class="row2">
						<div class="width50">Type</div>
						<div class="width50"><select id="dialog_settings_object_sensor_result_type" class="select width100" onchange="settingsObjectSensorResultType();"></select></div>
					</div>
					<div class="row2">
						<div class="width50"><span>Units of measurement</span></div>
						<div class="width50"><input id="dialog_settings_object_sensor_units" class="inputbox" type="text" value="" maxlength="10"></div>
					</div>					
					<div class="row2">
						<div class="width50">If sensor "1" (text)</div>
						<div class="width50"><input id="dialog_settings_object_sensor_text_1" class="inputbox width100" type="text" value="" maxlength="15"></div>
					</div>
					<div class="row2">
						<div class="width50">If sensor "0" (text)</div>
						<div class="width50"><input id="dialog_settings_object_sensor_text_0" class="inputbox width100" type="text" value="" maxlength="15"></div>
					</div>
					<div class="row2">
						<div class="width50">Formula</div>
						<div class="width50">
							<input id="dialog_settings_object_sensor_formula" class="inputbox" type="text" value="" maxlength="50" placeholder="(X+1)/2*3"/>
						</div>
					</div>
					<div class="row2">
						<div class="width50">Lowest value</div>
						<div class="width50"><input id="dialog_settings_object_sensor_lv" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
					</div>
					
					<div class="row2">
						<div class="width50">Highest value</div>
						<div class="width50"><input id="dialog_settings_object_sensor_hv" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="10"></div>
					</div>
					<div class="row2">
						<div class="width50">Ignore if ignition is off</div>
						<div class="width50"><input id="dialog_settings_object_sensor_acc_ignore" type="checkbox" class="checkbox" /></div>
					</div>
				</div>
			</div>
		</div>
		<div class="width33 block">
			<div class="container">
				<div class="row">
					<div class="title-block">Calibration</div>
					<div class="row2">
						<div id="settings_object_sensor_calibration_list">
							<table id="settings_object_sensor_calibration_list_grid"></table>
						</div>
					</div>
					<div class="row2">
						<div class="width10">
							X
						</div>
						<div class="width35">
							<input id="settings_object_sensor_calibration_x" onkeypress="return isNumberKey(event);" class="inputbox width90" type="text" value="" maxlength="10" disabled>
						</div>
						<div class="width10">
							Y
						</div>
						<div class="width35">
							<input id="settings_object_sensor_calibration_y" onkeypress="return isNumberKey(event);" class="inputbox width90" type="text" value="" maxlength="10" disabled>
						</div>
						<div class="width10">
							<input id="settings_object_sensor_calibration_add" style="min-width: 0;" class="width100 button icon-new no-text icon" type="button" onclick="settingsObjectSensorCalibrationAdd();" disabled />
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div class="width33 block">
			<div class="container last">
				<div class="row">
					<div class="title-block">Dictionary</div>
					<div class="row2">
						<div id="settings_object_sensor_dictionary_list">
							<table id="settings_object_sensor_dictionary_list_grid"></table>
						</div>
					</div>
					<div class="row2">
						<div class="width25">
							<input id="settings_object_sensor_dictionary_value" class="inputbox width90" type="text" value="" maxlength="10" disabled>
						</div>
						<div class="width10">
							=
						</div>
						<div class="width55">
							<input id="settings_object_sensor_dictionary_text" class="inputbox width90" type="text" value="" maxlength="50" disabled>
						</div>
						<div class="width10">
							<input id="settings_object_sensor_dictionary_add" style="min-width: 0;" class="width100 button icon-new no-text icon" type="button" onclick="settingsObjectSensorDictionaryAdd();" disabled />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="width100 block">
			<div class="title-block">Sensor result preview</div>
			<div class="width45 block">
				<div class="container">
					<div class="row2">
						<div class="width50">Current value</div>
						<div class="width50">
							<input id="dialog_settings_object_sensor_cur_param_val" class="inputbox" type="text" value="" readonly/>
						</div>
					</div>
				</div>
			</div>
			<div class="width10 block">
				<div class="container">
					<div class="row2">
						<input style="min-width: 0;" class="width100 button icon-arrow-right no-text icon" type="button" onclick="settingsObjectSensorResultPreview();" />
					</div>
				</div>
			</div>
			<div class="width45 block">
				<div class="container last">
					<div class="row2">
						<div class="width50">Result</div>
						<div class="width50">
							<input id="dialog_settings_object_sensor_result_preview" class="inputbox" type="text" value="" readonly/>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
			
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectSensorProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectSensorProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_service_properties" title="Service properties">
	<div class="row">
		<div class="title-block">Service</div>
		<div class="block width50">
			<div class="container">
				<div class="row2">
					<div class="width50">Name</div>
					<div class="width50"><input id="dialog_settings_object_service_name" class="inputbox" type="text" value="" maxlength="30"></div>
				</div>
				<div class="row2">
					<div class="width50">Data list</div>
					<div class="width10"><input id="dialog_settings_object_service_data_list" type="checkbox" class="checkbox" /></div>
				</div>
				<div class="row2">
					<div class="width50">Popup</div>
					<div class="width10"><input id="dialog_settings_object_service_popup" type="checkbox" class="checkbox" /></div>
				</div>
				<div class="row2">
					<div class="width50">Odometer interval (km)</div>
					<div class="width10"><input id="dialog_settings_object_service_odo" onchange="settingsObjectServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_settings_object_service_odo_interval" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				
				<div class="row2">
					<div class="width50">Engine hours interval (h)</div>
					<div class="width10"><input id="dialog_settings_object_service_engh" onchange="settingsObjectServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_settings_object_service_engh_interval" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				
				<div class="row2">
					<div class="width50">Days interval</div>
					<div class="width10"><input id="dialog_settings_object_service_days" onchange="settingsObjectServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_settings_object_service_days_interval" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
			</div>
		</div>
		<div class="block width50">
			<div class="container last">
				<div class="row2 empty"></div>
				<div class="row2 empty"></div>
				<div class="row2 empty"></div>
				<div class="row2">
					<div class="width50">Last service (km)</div>
					<div class="width50"><input id="dialog_settings_object_service_odo_last" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width50">Last service (h)</div>
					<div class="width50"><input id="dialog_settings_object_service_engh_last" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width50">Last service</div>
					<div class="width50"><input id="dialog_settings_object_service_days_last" readonly class="inputbox inputbox-calendar" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="title-block">Trigger event</div>
		<div class="block width50">
			<div class="container">
				<div class="row2">
					<div class="width50">Odometer left (km)</div>
					<div class="width10"><input id="dialog_settings_object_service_odo_left" onchange="settingsObjectServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_settings_object_service_odo_left_num" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width50">Engine hours left (h)</div>
					<div class="width10"><input id="dialog_settings_object_service_engh_left" onchange="settingsObjectServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_settings_object_service_engh_left_num" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width50">Days left</div>
					<div class="width10"><input id="dialog_settings_object_service_days_left" onchange="settingsObjectServiceCheck();" type="checkbox" class="checkbox"/></div>
					<div class="width40"><input id="dialog_settings_object_service_days_left_num" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15"></div>
				</div>
			</div>
		</div>
		<div class="block width50">
			<div class="container last">
				<div class="row2">
					<div class="width50">Update last service</div>
					<div class="width50"><input id="dialog_settings_object_service_update_last" type="checkbox" class="checkbox"/></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="title-block">Current object counters</div>
		<div class="block width50">
			<div class="container">
				<div class="row2">
					<div class="width50">Current odometer (km)</div>
					<div class="width50"><input id="dialog_settings_object_service_odo_curr" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15" disabled></div>
				</div>
				<div class="row2">
					<div class="width50">Current engine hours (h)</div>
					<div class="width50"><input id="dialog_settings_object_service_engh_curr" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="15" disabled></div>
				</div>
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectServiceProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectServiceProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_custom_field_properties" title="Custom field properties">
	<div class="row">
		<div class="row2">
			<div class="width40">Name</div>
			<div class="width60"><input id="dialog_settings_object_custom_field_name" class="inputbox" type="text" maxlength="25"></div>
		</div>
		<div class="row2">
			<div class="width40">Value</div>
			<div class="width60"><input id="dialog_settings_object_custom_field_value" class="inputbox" type="text" maxlength="50"></div>
		</div>
		<div class="row2">
			<div class="width40">Data list</div>
			<div class="width60"><input id="dialog_settings_object_custom_field_data_list" type="checkbox" class="checkbox" /></div>
		</div>
		<div class="row2">
			<div class="width40">Popup</div>
			<div class="width60"><input id="dialog_settings_object_custom_field_popup" type="checkbox" class="checkbox" /></div>
		</div>
	</div>
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectCustomFieldProperties('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectCustomFieldProperties('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_edit_select_icon" title="Select icon">
	<div id="settings_object_edit_select_icon_tabs">
		<ul>           
			<li><a href="#settings_object_edit_select_icon_default_tab">Default</a></li>
			<li><a href="#settings_object_edit_select_icon_custom_tab">Custom</a></li>
		</ul>              
		<div id="settings_object_edit_select_icon_default_tab">
			<div class="row2">
				<div class="icon_selector width100" id="settings_object_edit_select_icon_default_list">
				</div>
			</div>
		</div>
		<div id="settings_object_edit_select_icon_custom_tab">
			<div class="row">
				<div class="row2">
					<div class="icon_selector width100" id="settings_object_edit_select_icon_custom_list">
					</div>
				</div>
			</div>
			<center>
				<input class="button" type="button" value="Upload" onclick="settingsObjectEditUploadCustomIcon();" />&nbsp;
				<input class="button" type="button" value="Delete all" onclick="settingsObjectEditDeleteAllCustomIcon();" />
			</center>
		</div>
	</div>
</div>

<div id="dialog_settings_object_edit_accvirt" title="Virtual ACC parameter properties">
	<div class="row">
		<div class="row2">
			<div class="width60">Parameter</div>
			<div class="width40"><select id="dialog_settings_object_edit_accvirt_param" class="select width100"></select></div>
		</div>
		<div class="row2">
			<div class="width60">Virt. ACC equals "1" if parameter</div>
			<div class="width10">
				<select id="dialog_settings_object_edit_accvirt_1_cn" class="select width100"/>
					<option value="eq">=</option>
					<option value="gr">></option>
					<option value="lw"><</option>
				</select>
			</div>
			<div class="width2"></div>
			<div class="width28"><input id="dialog_settings_object_edit_accvirt_1_val" class="inputbox width100" type="text" value="" maxlength="15"></div>
		</div>
		<div class="row2">
			<div class="width60">Virt. ACC equals "0" if parameter</div>
			<div class="width10">
				<select id="dialog_settings_object_edit_accvirt_0_cn" class="select width100"/>
					<option value="eq">=</option>
					<option value="gr">></option>
					<option value="lw"><</option>
				</select>
			</div>
			<div class="width2"></div>
			<div class="width28"><input id="dialog_settings_object_edit_accvirt_0_val" class="inputbox width100" type="text" value="" maxlength="15"></div>
		</div>
	</div>
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectEditAccvirt('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectEditAccvirt('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_edit" title="Edit object">
	<div id="settings_object">
		<ul>
			<li><a href="#settings_object_main">Main</a></li>
			<li><a href="#settings_object_icon">Icon</a></li>
			<li><a href="#settings_object_fuel">Fuel consumption</a></li>
			<li><a href="#settings_object_accuracy">Accuracy</a></li>
			<li><a href="#settings_object_sensors">Sensors</a></li>
			<li><a href="#settings_object_service">Service</a></li>
			<li><a href="#settings_object_custom_fields">Custom fields</a></li>
			<li><a href="#settings_object_info">Info</a></li>
		</ul>
		
		<div id="settings_object_main">
			<div class="row">
				<div class="title-block">Main</div>
				<div class="row2">
					<div class="width40">Name</div>
					<div class="width60"><input id="dialog_settings_object_edit_name" class="inputbox" type="text" value="" maxlength="25"></div>
				</div>
				<div class="row2">
					<div class="width40">IMEI</div>
					<div class="width60"><input id="dialog_settings_object_edit_imei" class="inputbox" type="text" maxlength="15" disabled></div>
				</div>
				<div class="row2">
					<div class="width40">Transport model</div>
					<div class="width60"><input id="dialog_settings_object_edit_model" class="inputbox" type="text" value="" maxlength="30"></div>
				</div>
				<div class="row2">
					<div class="width40">VIN</div>
					<div class="width60"><input id="dialog_settings_object_edit_vin" class="inputbox" type="text" maxlength="20"></div>
				</div>
				<div class="row2">
					<div class="width40">Plate number</div>
					<div class="width60"><input id="dialog_settings_object_edit_plate_number" class="inputbox" type="text" maxlength="15"></div>
				</div>
				<div class="row2">
					<div class="width40">Group</div>
					<div class="width60"><select id="dialog_settings_object_edit_group" class="select-search width100"></select></div>
				</div>
				<div class="row2">
					<div class="width40">Driver</div>
					<div class="width60"><select id="dialog_settings_object_edit_driver" class="select-search width100"></select></div>
				</div>
				<div class="row2">
					<div class="width40">Trailer</div>
					<div class="width60"><select id="dialog_settings_object_edit_trailer" class="select-search width100"></select></div>
				</div>
				<div class="row2">
					<div class="width40">GPS device</div>
					<div class="width60"><input id="dialog_settings_object_edit_device" class="inputbox" type="text" maxlength="30"></div>
				</div>
				<div class="row2" >
					<div class="width40">SIM card number</div>
					<div class="width60"><input id="dialog_settings_object_edit_sim_number" class="inputbox" type="text" value="" maxlength="30"></div>
				</div>				
			</div>
			<div class="row">
				<div class="title-block">Counters</div>
				<div class="row2">
					<div class="width40">Odometer (km)</div>
					<div class="width19">
						<select id="dialog_settings_object_edit_odometer_type" class="select width100">
							<option value="off">Off</option>
							<option value="gps">GPS</option>
							<option value="sen">Sensor</option>
						</select>
					</div>
					<div class="width1"></div>
					<div class="width40">
						<input id="dialog_settings_object_edit_odometer" onkeypress="return isNumberKey(event);" class="inputbox width100" type="text" value="" maxlength="15">
					</div>
				</div>
				<div class="row2">
					<div class="width40">Engine hours (h)</div>
					<div class="width19">
						<select id="dialog_settings_object_edit_engine_hours_type" class="select width100">
							<option value="off">Off</option>
							<option value="acc">ACC</option>
							<option value="sen">Sensor</option>
						</select>
					</div>
					<div class="width1"></div>
					<div class="width40">
						<input id="dialog_settings_object_edit_engine_hours" onkeypress="return isNumberKey(event);" class="inputbox width100" type="text" value="" maxlength="15">
					</div>
				</div>
			</div>
		</div>
		<div id="settings_object_icon">
			<div class="row">
				<div class="title-block">Icon</div>
				<div class="row2">
					<div class="width40">Shown icon on map</div>
					<div class="width60">
						<select id="dialog_settings_object_edit_map_icon" class="select width40">
							<option value="arrow">Arrow</option>
							<option value="icon">Icon</option>	
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40">No connection arrow color</div>
					<div class="width60">
						<select id="dialog_settings_object_edit_arrow_no_connection" class="select width40">
							<option value="arrow_black">Black</option>
<option value="arrow_blue">Blue</option>
<option value="arrow_green">Green</option>
<option value="arrow_grey">Grey</option>
<option value="arrow_orange">Orange</option>
<option value="arrow_purple">Purple</option>
<option value="arrow_red">Red</option>
<option value="arrow_yellow">Yellow</option>

						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Stopped arrow color</div>
					<div class="width60">
						<select id="dialog_settings_object_edit_arrow_stopped" class="select width40">
							<option value="arrow_black">Black</option>
<option value="arrow_blue">Blue</option>
<option value="arrow_green">Green</option>
<option value="arrow_grey">Grey</option>
<option value="arrow_orange">Orange</option>
<option value="arrow_purple">Purple</option>
<option value="arrow_red">Red</option>
<option value="arrow_yellow">Yellow</option>

						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Moving arrow color</div>
					<div class="width60">
						<select id="dialog_settings_object_edit_arrow_moving" class="select width40">
							<option value="arrow_black">Black</option>
<option value="arrow_blue">Blue</option>
<option value="arrow_green">Green</option>
<option value="arrow_grey">Grey</option>
<option value="arrow_orange">Orange</option>
<option value="arrow_purple">Purple</option>
<option value="arrow_red">Red</option>
<option value="arrow_yellow">Yellow</option>

						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Engine idle arrow color</div>
					<div class="width60">
						<select id="dialog_settings_object_edit_arrow_engine_idle" class="select width40">
							<option value="off">Off</option>
							<option value="arrow_black">Black</option>
<option value="arrow_blue">Blue</option>
<option value="arrow_green">Green</option>
<option value="arrow_grey">Grey</option>
<option value="arrow_orange">Orange</option>
<option value="arrow_purple">Purple</option>
<option value="arrow_red">Red</option>
<option value="arrow_yellow">Yellow</option>

						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Icon</div>
					<div class="width60">
						<a href="#" onclick="settingsObjectEditIcon();">
							<div class="icon_selector" id="dialog_settings_object_edit_icon" style="width:32px; height: 32px;"></div>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="title-block">Tail</div>
				<div class="row2">
					<div class="width40">Tail color</div>
					<div class="width60">
						<input class="color inputbox" style="width:55px" type='text' id='dialog_settings_object_edit_tail_color'/>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Tail points quantity</div>
					<div class="width60">
						<input class="inputbox width40" type='text' id='dialog_settings_object_edit_tail_points' maxlength="4"/>
					</div>
				</div>
			</div>
		</div>
		<div id="settings_object_fuel">
			<div class="row">
				<div class="title-block">Calculation</div>
				<div class="row2">
					<div class="width40">Source</div>
					<div class="width60">
						<select id="dialog_settings_object_edit_fcr_source" class="select width40">
							<option value="rates">Rates</option>
							<option value="fuel">Fuel level</option>
							<option value="fuelcons">Fuel consumption</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Measurement</div>
					<div class="width60">
						<select id="dialog_settings_object_edit_fcr_measurement" class="select width40" onchange="settingsObjectEditSwitchFCRMeasurement();">
							<option value="l100km">l/100km</option>
							<option value="mpg">MPG</option>
						</select>
					</div>
				</div>
				<div class="row2">
					<div class="width40" id="dialog_settings_object_edit_fcr_cost_label">Cost per liter</div>
					<div class="width60"><input id="dialog_settings_object_edit_fcr_cost" onkeypress="return isNumberKey(event);" class="inputbox width40" type="text" value="" maxlength="5"></div>
				</div>
			</div>
			<div class="row">
				<div class="title-block">Rates</div>
				<div class="row2">
					<div class="width40" id="dialog_settings_object_edit_fcr_summer_label">Summer rate (kilometers per liter)</div>
					<div class="width60"><input id="dialog_settings_object_edit_fcr_summer" onkeypress="return isNumberKey(event);" class="inputbox width40" type="text" value="" maxlength="5"></div>
				</div>
				<div class="row2">
					<div class="width40" id="dialog_settings_object_edit_fcr_winter_label">Winter rate (kilometers per liter)</div>
					<div class="width60"><input id="dialog_settings_object_edit_fcr_winter" onkeypress="return isNumberKey(event);" class="inputbox width40" type="text" value="" maxlength="5"></div>
				</div>
				<div class="row2">
					<div class="width40">Winter from</div>
					<div class="width60">
						<input readonly class="inputbox-calendar-mmdd inputbox width40" id="dialog_settings_object_edit_fcr_winter_start" type="text" value=""/>
					</div>
				</div>
				<div class="row2">
					<div class="width40">Winter to</div>
					<div class="width60">
						<input readonly class="inputbox-calendar-mmdd inputbox width40" id="dialog_settings_object_edit_fcr_winter_end" type="text" value=""/>
					</div>
				</div>
			</div>
		</div>
		<div id="settings_object_accuracy">
			<div class="scroll-y">
				<div class="row">
					<div class="title-block">Accuracy</div>
					<div class="row2">
						<div class="width65">Time zone offset - by default it should be set to (UTC 0:00), adjust only in case it is not possible to set (UTC 0:00) time zone on GPS device side</div>
						<div class="width5"></div>
						<div class="width30">
							<select id="settings_object_accuracy_time_adj" class="select width100" onchange="settingsObjectEditSwitchTimeAdj();"/>
								<option value="- 14 hour">(UTC -14:00)</option>
<option value="- 13 hour">(UTC -13:00)</option>
<option value="- 12 hour">(UTC -12:00)</option>
<option value="- 11 hour">(UTC -11:00)</option>
<option value="- 10 hour">(UTC -10:00)</option>
<option value="- 9 hour">(UTC -9:00)</option>
<option value="- 8 hour">(UTC -8:00)</option>
<option value="- 7 hour">(UTC -7:00)</option>
<option value="- 6 hour">(UTC -6:00)</option>
<option value="- 5 hour">(UTC -5:00)</option>
<option value="- 4 hour">(UTC -4:00)</option>
<option value="- 3 hour">(UTC -3:00)</option>
<option value="- 2 hour">(UTC -2:00)</option>
<option value="- 1 hour">(UTC -1:00)</option>
<option value="">(UTC 0:00)</option>
<option value="+ 1 hour">(UTC +1:00)</option>
<option value="+ 2 hour">(UTC +2:00)</option>
<option value="+ 3 hour">(UTC +3:00)</option>
<option value="+ 4 hour">(UTC +4:00)</option>
<option value="+ 5 hour">(UTC +5:00)</option>
<option value="+ 6 hour">(UTC +6:00)</option>
<option value="+ 7 hour">(UTC +7:00)</option>
<option value="+ 8 hour">(UTC +8:00)</option>
<option value="+ 9 hour">(UTC +9:00)</option>
<option value="+ 10 hour">(UTC +10:00)</option>
<option value="+ 11 hour">(UTC +11:00)</option>
<option value="+ 12 hour">(UTC +12:00)</option>
<option value="+ 13 hour">(UTC +13:00)</option>
<option value="+ 14 hour">(UTC +14:00)</option>							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width65">Detect stops using</div>
						<div class="width5"></div>
						<div class="width30">
							<select id="settings_object_accuracy_detect_stops" class="select width100"/>
								<option value="gps">GPS</option>
								<option value="acc">ACC</option>
								<option value="gpsacc">GPS + ACC</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width65">Measure route length using</div>
						<div class="width5"></div>
						<div class="width30">
							<select id="settings_object_accuracy_route_length" class="select width100"/>
								<option value="gps">GPS</option>
								<option value="odo">Odometer sensor</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Min. moving speed in kph (affects stops and track accuracy, default 6)</span></div>
						<div class="width5"></div>
						<div class="width30"><input id="settings_object_accuracy_moving_speed" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="3"/></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Min. engine idle speed in kph (affects engine idle status, default 3)</span></div>
						<div class="width5"></div>
						<div class="width30"><input id="settings_object_accuracy_idle_speed" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="3"/></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Min. difference between track points (eliminates drifting, default 0.0005)</span></div>
						<div class="width5"></div>
						<div class="width30"><input id="settings_object_accuracy_diff_points" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="11"/></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Min. gpslev value (eliminates drifting, default 5)</span></div>
						<div class="width5"></div>
						<div class="width5"><input id="settings_object_accuracy_use_gpslev" type="checkbox" class="checkbox"/></div>
						<div class="width25"><input id="settings_object_accuracy_gpslev" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="2"/></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Max. hdop value (eliminates drifting, default 3)</span></div>
						<div class="width5"></div>
						<div class="width5"><input id="settings_object_accuracy_use_hdop" type="checkbox" class="checkbox"/></div>
						<div class="width25"><input id="settings_object_accuracy_hdop" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="2"/></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Ignore fuel consumption during stops</span></div>
						<div class="width5"></div>
						<div class="width5"><input id="settings_object_accuracy_ign_fuel_cons_stops" type="checkbox" class="checkbox"/></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Min. fuel difference detection when speed in kph is not above (default 10)</span></div>
						<div class="width5"></div>
						<div class="width30"><input id="settings_object_accuracy_fuel_speed" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="3"/></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Min. fuel difference to detect fuel fillings (default 10)</span></div>
						<div class="width5"></div>
						<div class="width30"><input id="settings_object_accuracy_ff" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="3"/></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Min. fuel difference to detect fuel thefts (default 10)</span></div>
						<div class="width5"></div>
						<div class="width30"><input id="settings_object_accuracy_ft" onkeypress="return isNumberKey(event);" class="inputbox" type="text" value="" maxlength="3"/></div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Other</div>
					<div class="row2">
						<div class="width65"><span class="container">Unassign object driver after ignition is off</span></div>
						<div class="width5"></div>
						<div class="width5"><input id="settings_object_accuracy_unassign_driver" type="checkbox" class="checkbox"/></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Enable virtual ACC parameter depending on voltage (parameter "accvirt")</span></div>
						<div class="width5"></div>
						<div class="width5"><input id="settings_object_accuracy_accvirt" type="checkbox" class="checkbox"/></div>
						<div class="width25"><input style="width: 100%;" class="button" type="button" onclick="settingsObjectEditAccvirt('open');" value="Edit" /></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Forward this object location data to another object from this account (should be used only for Iridium Satellite solutions)</span></div>
						<div class="width5"></div>
						<div class="width5"><input id="settings_object_accuracy_forward_loc_data" type="checkbox" class="checkbox"/></div>
						<div class="width25"><select id="settings_object_accuracy_forward_loc_data_object_list" class="select-search width100"/></select></div>
					</div>
					<div class="row2">
						<div class="width65"><span class="container">Clear detected sensor cache</span></div>
						<div class="width5"></div>
						<div class="width5"></div>
						<div class="width25"><input style="width: 100%;" class="button" type="button" onclick="settingsObjectClearDetectedSensorCache();" value="Clear" /></div>
					</div>				
				</div>
			</div>			
		</div>
		
		<div id="settings_object_sensors">
			<div id="settings_object_sensors_list">
			<table id="settings_object_sensor_list_grid"></table>
			<div id="settings_object_sensor_list_grid_pager"></div>
			</div>
		</div>
		<div id="settings_object_service">
			<div id="settings_object_service_list">
			<table id="settings_object_service_list_grid"></table>
			<div id="settings_object_service_list_grid_pager"></div>
			</div>
		</div>
		<div id="settings_object_custom_fields">
			<div id="settings_object_custom_fields_list">
			<table id="settings_object_custom_fields_list_grid"></table>
			<div id="settings_object_custom_fields_list_grid_pager"></div>
			</div>
		</div>
		<div id="settings_object_info">
			<div id="settings_object_info_list">
			<table id="settings_object_info_list_grid"></table>
			<div id="settings_object_info_list_grid_pager"></div>
			</div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectEdit('save');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectEdit('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_duplicate" title="Duplicate object">
	<div class="row">
		<div class="row2">
			<div class="width30">Name</div>
			<div class="width70"><input id="dialog_settings_object_duplicate_name" class="inputbox" type="text" maxlength="25"></div>
		</div>
		<div class="row2">
			<div class="width30">IMEI</div>
			<div class="width70"><input id="dialog_settings_object_duplicate_imei" class="inputbox" type="text" maxlength="15"></div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectDuplicate('duplicate');" value="Duplicate" />&nbsp;&nbsp;&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectDuplicate('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings_object_add" title="Add object">
	<div class="row">
		<div class="row2">
			<div class="width30">Name</div>
			<div class="width70"><input id="dialog_settings_object_add_name" class="inputbox" type="text" maxlength="25"></div>
		</div>
		<div class="row2">
			<div class="width30">IMEI</div>
			<div class="width70"><input id="dialog_settings_object_add_imei" class="inputbox" type="text" maxlength="15"></div>
		</div>
	</div>
	
	<center>
		<input class="button icon-save icon" type="button" onclick="settingsObjectAdd('add');" value="Save" />&nbsp;
		<input class="button icon-close icon" type="button" onclick="settingsObjectAdd('cancel');" value="Cancel" />
	</center>
</div>

<div id="dialog_settings" title="Settings">
	<div id="settings_main">
		<ul>           
			<li id="settings_main_objects_tab"><a href="#settings_main_objects">Objects</a></li>
			<li id="settings_main_events_tab"><a href="#settings_main_events">Events</a></li>
			<li id="settings_main_templates_tab"><a href="#settings_main_templates">Templates</a></li>
			<li id="settings_main_kml_tab"><a href="#settings_main_kml">KML</a></li>
			<li id="settings_main_sms_tab"><a href="#settings_main_sms">SMS</a></li>			
			<li><a href="#settings_main_user_interface">User interface</a></li>
			<li><a href="#settings_main_my_account" id="settings_main_my_account_tab">My account</a></li>
			<li id="settings_main_subaccounts_tab"><a href="#settings_main_subaccounts">Sub accounts</a></li>
		</ul>              
		<div id="settings_main_objects">
			<div class="info">
				Contact administrator if you want to do any changes with your objects. Additional plans can be purchased via billing system.			</div>
			<div id="settings_main_objects_groups_drivers">
				<ul>           
					<li><a href="#settings_main_object_list">Objects</a></li>
					<li><a href="#settings_main_object_group_list">Groups</a></li>
					<li><a href="#settings_main_object_driver_list">Drivers</a></li>
					<li><a href="#settings_main_object_passenger_list">Passengers</a></li>
					<li><a href="#settings_main_object_trailer_list">Trailers</a></li>
				</ul>
				<div id="settings_main_object_list">
					<table id="settings_main_object_list_grid"></table>
					<div id="settings_main_object_list_grid_pager"></div>
				</div>
				<div id="settings_main_object_group_list">
					<table id="settings_main_object_group_list_grid"></table>
					<div id="settings_main_object_group_list_grid_pager"></div>
				</div>
				<div id="settings_main_object_driver_list">
					<table id="settings_main_object_driver_list_grid"></table>
					<div id="settings_main_object_driver_list_grid_pager"></div>
				</div>
				<div id="settings_main_object_passenger_list">
					<table id="settings_main_object_passenger_list_grid"></table>
					<div id="settings_main_object_passenger_list_grid_pager"></div>
				</div>
				<div id="settings_main_object_trailer_list">
					<table id="settings_main_object_trailer_list_grid"></table>
					<div id="settings_main_object_trailer_list_grid_pager"></div>
				</div>
			</div>
		</div>
		
		<div id="settings_main_events">
			<div id="settings_main_events_event_list">
				<table id="settings_main_events_event_list_grid"></table>
				<div id="settings_main_events_event_list_grid_pager"></div>
			</div>
		</div>
		
		<div id="settings_main_kml">
			<div class="info">
				KML allows to import and visualize additional data on the map.			</div>
			<div id="settings_main_kml_kml_list">
				<table id="settings_main_kml_kml_list_grid"></table>
				<div id="settings_main_kml_kml_list_grid_pager"></div>
			</div>
		</div>
		
		<div id="settings_main_templates">
			<div id="settings_main_templates_template_list">
				<table id="settings_main_templates_template_list_grid"></table>
				<div id="settings_main_templates_template_list_grid_pager"></div>
			</div>
		</div>
		
		<div id="settings_main_sms">
			<div class="controls">
				<input class="button panel icon-save icon float-right" type="button" onclick="settingsSave();" value="Save">
			</div>
			
			<div class="row">
				<div class="title-block">SMS Gateway</div>			
				<div class="row2">
					<div class="width30">Enable SMS Gateway</div>
					<div class="width25"><input id="settings_main_sms_gateway" type="checkbox" class="checkbox"/></div>
				</div>
				<div class="row2">
					<div class="width30">SMS Gateway type</div>
					<div class="width25">
						<select id="settings_main_sms_gateway_type" class="select width100" onchange="settingsSMSGatewaySwitchType();">
							<option value="app" selected>Mobile application</option>
							<option value="http">HTTP</option>
						</select>
					</div>
				</div>
			</div>
			
			<div id="settings_main_sms_app">
				<div class="row">
					<div class="title-block">Mobile application</div>
					<div class="row">Mobile application should be used which allows to use mobile device as SMS Gateway. Below SMS Gateway identifier should be entered in mobile application settings.</div>
					<div class="row2">
						<div class="width30">SMS Gateway identifier</div>
						<div class="width25">
							<input class="inputbox" id="settings_main_sms_gateway_identifier" readonly />
						</div>
					</div>
					<div class="row2">
						<div class="width30">Total SMS in queue to send</div>
						<div class="width10" id="settings_main_sms_gateway_total_in_queue">0</div>
						<div class="width1"></div>
						<div class="width14">
							<input class="button width100" type="button" onclick="settingsSMSGatewayClearQueue();" value="Clear" />
						</div>
					</div>
				</div>
			</div>
			
			<div id="settings_main_sms_http" style="display: none;">
				<div class="row">
					<div class="title-block">HTTP</div>
					<div class="row">SMS Gateway, which can send messages via HTTP GET should be used.</div>
					<div class="row">SMS Gateway URL example: http://SMS_GATEWAY/sendsms.php?username=USER&password=PASSWORD&number=%NUMBER%&message=%MESSAGE%</div>
					<div class="row2">
						<div class="width30">SMS Gateway URL</div>
						<div class="width70">
							<textarea id="settings_main_sms_gateway_url" style="height: 75px;" class="inputbox width100" maxlength="2048" placeholder="ex. http://full_address_here"/></textarea>
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
		
		<div id="settings_main_user_interface">
			<div class="controls">
				<input class="button panel icon-save icon" type="button" onclick="settingsSave();" value="Save">
			</div>
			
			<div class="scroll-y">
				<div class="row">
					<div class="title-block">Notifications</div>
					<div class="row2">
						<div class="width40">Push notifications</div>
						<div class="width4">
							<input id="settings_main_push_notify_desktop" type="checkbox" class="checkbox"/>
						</div>
					</div>
					<div class="row2">
						<div class="width40">New chat message sound alert</div>
						<div class="width25">
							<select id="settings_main_chat_notify_sound_file" class="select width100"/>
							<option value="0">No sound</option><option value="alarm1.mp3">alarm1.mp3</option><option value="alarm2.mp3">alarm2.mp3</option><option value="alarm3.mp3">alarm3.mp3</option><option value="alarm4.mp3">alarm4.mp3</option><option value="alarm5.mp3">alarm5.mp3</option><option value="alarm6.mp3">alarm6.mp3</option><option value="alarm7.mp3">alarm7.mp3</option><option value="alarm8.mp3">alarm8.mp3</option><option value="beep1.mp3">beep1.mp3</option><option value="beep2.mp3">beep2.mp3</option><option value="beep3.mp3">beep3.mp3</option><option value="beep4.mp3">beep4.mp3</option><option value="beep5.mp3">beep5.mp3</option>							</select>
						</div>
						<div class="width1"></div>
						<div class="width20">
							<input class="button" type="button" onclick="settingsChatPlaySound();" value="Play" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Dashboard</div>
					<div class="row2">
						<div class="width40">Open after login</div>
						<div class="width4">
							<input id="settings_main_dashboard_open_after_login" type="checkbox" class="checkbox"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Map</div>
					<div class="row2">
						<div class="width40">Map startup position</div>
						<div class="width25">
							<select id="settings_main_map_startup_possition" class="select width100">
								<option value="default">Default</option>
								<option value="last">Remember last</option>
								<option value="fit">Fit objects</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width40">Map icon size</div>
						<div class="width25">
							<select id="settings_main_map_icon_size" class="select width100">
								<option value="1">100%</option>
								<option value="1.25">125%</option>
								<option value="1.5">150%</option>
								<option value="1.75">175%</option>
								<option value="2">200%</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width40">History route color</div>
						<div class="width30"><input class="color inputbox" style="width:55px" type='text' id='settings_main_history_route_color'/></div>
					</div>
					<div class="row2">
						<div class="width40">History route highlight color</div>
						<div class="width30"><input class="color inputbox" style="width:55px" type='text' id='settings_main_history_route_highlight_color'/></div>
					</div>
					<div class="row2">
						<div class="width40">Object details popup on cluster mouse hover</div>
						<div class="width4">
							<input id="settings_main_map_object_cluster_popup" type="checkbox" class="checkbox"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Groups</div>
					<div class="row2">
						<div class="width40">Collapsed</div>
						<div class="width60">
							<div class="margin-right-3"><input id="settings_main_groups_collapsed_objects" type="checkbox" class="checkbox" /></div>
							<div class="margin-right-3">Objects</div>
							<div class="margin-right-3"><input id="settings_main_groups_collapsed_markers" type="checkbox" class="checkbox" /></div>
							<div class="margin-right-3">Markers</div>
							<div class="margin-right-3"><input id="settings_main_groups_collapsed_routes" type="checkbox" class="checkbox" /></div>
							<div class="margin-right-3">Routes</div>
							<div class="margin-right-3"><input id="settings_main_groups_collapsed_zones" type="checkbox" class="checkbox" /></div>
							<div class="margin-right-3">Zones</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Object list</div>
					<div class="row2">
						<div class="width40">Details</div>
						<div class="width25">
							<select id="settings_main_od" class="select width100">
								<option value="">Time (position)</option>
								<option value="server">Time (server)</option>
								<option value="status">Status</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width40">No connection color</div>
						<div class="width4">
							<input id="settings_main_ohc_no_connection" type="checkbox" class="checkbox"/>
						</div>
						<div class="width30"><input class="color inputbox" style="width:55px" type='text' id='settings_main_ohc_no_connection_color'/></div>
					</div>
					<div class="row2">
						<div class="width40">Stopped color</div>
						<div class="width4">
							<input id="settings_main_ohc_stopped" type="checkbox" class="checkbox"/>
						</div>
						<div class="width30"><input class="color inputbox" style="width:55px" type='text' id='settings_main_ohc_stopped_color'/></div>
					</div>
					<div class="row2">
						<div class="width40">Moving color</div>
						<div class="width4">
							<input id="settings_main_ohc_moving" type="checkbox" class="checkbox"/>
						</div>
						<div class="width30"><input class="color inputbox" style="width:55px" type='text' id='settings_main_ohc_moving_color'/></div>
					</div>
					<div class="row2">
						<div class="width40">Engine idle color</div>
						<div class="width4">
							<input id="settings_main_ohc_engine_idle" type="checkbox" class="checkbox"/>
						</div>
						<div class="width30"><input class="color inputbox" style="width:55px" type='text' id='settings_main_ohc_engine_idle_color'/></div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Data list</div>
					<div class="row2">
						<div class="width40">Position</div>
						<div class="width25">
							<select id="settings_main_datalist_position" class="select width100">
								<option value="left_panel">Left panel</option>
								<option value="bottom_panel">Bottom panel with icons</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width40">Items</div>
						<div class="width25">
							<select id="settings_main_datalist_items" class="select-multiple-search width100" multiple="multiple">
								<optgroup label="General">
								<option value="odometer">Odometer</option>
								<option value="engine_hours">Engine hours</option>			
								<option value="status">Status</option>
								<option value="model">Model</option>
								<option value="vin">VIN</option>
								<option value="plate_number">Plate</option>
								<option value="sim_number">SIM card number</option>
								<option value="driver">Driver</option>
								<option value="trailer">Trailer</option>
								<optgroup label="Location">
								<option value="time_position">Time (position)</option>
								<option value="time_server">Time (server)</option>
								<option value="address">Address</option>
								<option value="position">Position</option>
								<option value="speed">Speed</option>
								<option value="altitude">Altitude</option>
								<option value="angle">Angle</option>
								<option value="nearest_zone">Nearest zone</option>
								<option value="nearest_marker">Nearest marker</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Other</div>
					<div class="row2">
						<div class="width40">Language</div>
						<div class="width25">
							<select id="settings_main_language" class="select width100">
								<option value="english">English</option><option value="indonesian">Indonesian</option>							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width40">Unit of distance</div>
						<div class="width25">
							<select id="settings_main_distance_unit" class="select width100">
								<option value="km">Kilometer</option>
								<option value="mi">Mile</option>
								<option value="nm">Nautical mile</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width40">Unit of capacity</div>
						<div class="width25">
							<select id="settings_main_capacity_unit" class="select width100">
								<option value="l">Liter</option>
								<option value="g">Gallon</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width40">Unit of temperature</div>
						<div class="width25">
							<select id="settings_main_temperature_unit" class="select width100">
								<option value="c">Celsius</option>
								<option value="f">Fahrenheit</option>
							</select>
						</div>
					</div>
					<div class="row2">
						<div class="width40">Currency</div>
						<div class="width25">
							<input id="settings_main_currency" class="inputbox width100" type="text" value="" maxlength="3">
						</div>
					</div>
					<div class="row2">
						<div class="width40">Time zone</div>
						<div class="width25">
							<select id="settings_main_timezone" class="select width100">
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
						<div class="width40">Daylight saving time (DST)</div>
						<div class="width4">
							<input id="settings_main_dst" type="checkbox" class="checkbox" onchange="settingsCheck();"/>
						</div>
						<div class="width10">
							<input readonly class="inputbox-calendar-mmdd inputbox width100" id="settings_main_dst_start_mmdd" type="text" value=""/>
						</div>
						<div class="width1"></div>
						<div class="width10">
							<select id="settings_main_dst_start_hhmm" class="select width100">
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
						<div class="width10">
							<input readonly class="inputbox-calendar-mmdd inputbox width100" id="settings_main_dst_end_mmdd" type="text" value=""/>
						</div>
						<div class="width1"></div>
						<div class="width10">
							<select id="settings_main_dst_end_hhmm" class="select width100">
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
				</div>
			</div>
		</div>
	
		<div id="settings_main_my_account">		
			<div class="controls">
				<input class="button panel icon-save icon" type="button" onclick="settingsSave();" value="Save">
			</div>
			
			<div class="scroll-y">
				<div class="row">	
					<div class="title-block">Contact information</div>
					<div class="row2">
						<div class="width40">Name, surname</div>
						<div class="width40"><input class="inputbox" id="settings_main_name_surname"></div>
					</div>
					<div class="row2">
						<div class="width40">Company</div>
						<div class="width40"><input class="inputbox" id="settings_main_company"></div>
					</div>
					<div class="row2">
						<div class="width40">Address</div>
						<div class="width40"><input class="inputbox" id="settings_main_address"></div>
					</div>
					<div class="row2">
						<div class="width40">Post code</div>
						<div class="width40"><input class="inputbox" id="settings_main_post_code"></div>
					</div>
					<div class="row2">
						<div class="width40">City</div>
						<div class="width40"><input class="inputbox" id="settings_main_city"></div>
					</div>
					<div class="row2">
						<div class="width40">County/State</div>
						<div class="width40"><input class="inputbox" id="settings_main_country"></div>
					</div>
					<div class="row2">
						<div class="width40">Phone number 1</div>
						<div class="width40"><input class="inputbox" id="settings_main_phone1"></div>
					</div>
					<div class="row2">
						<div class="width40">Phone number 2</div>
						<div class="width40"><input class="inputbox" id="settings_main_phone2"></div>
					</div>
					<div class="row2">
						<div class="width40">E-mail</div>
						<div class="width40"><input class="inputbox" id="settings_main_email"></div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Change password</div>		
					<div class="row2">
						<div class="width40">Old password</div>
						<div class="width40"><input class="inputbox" type="password" id="settings_main_old_password" maxlength="20"></div>
					</div>
					<div class="row2">
						<div class="width40">New password</div>
						<div class="width40"><input class="inputbox" type="password" id="settings_main_new_password" maxlength="20"></div>
					</div>
					<div class="row2">
						<div class="width40">Repeat new password</div>
						<div class="width40"><input class="inputbox" type="password" id="settings_main_new_password_rep" maxlength="20"></div>
					</div>
				</div>
				<div class="row">
					<div class="title-block">Usage</div>
					<div class="row3">
						<div class="width40">Number of e-mails (daily)</div>
						<div class="width40" id="settings_main_usage_email_daily"></div>
					</div>
					<div class="row3">
						<div class="width40">Number of SMS (daily)</div>
						<div class="width40" id="settings_main_usage_sms_daily"></div>
					</div>
					<div class="row3">
						<div class="width40">Number of Webhook (daily)</div>
						<div class="width40" id="settings_main_usage_webhook_daily"></div>
					</div>
					<div class="row3">
						<div class="width40">Number of API calls (daily)</div>
						<div class="width40" id="settings_main_usage_api_daily"></div>
					</div>
				</div>
				
							</div>
			
		</div>
		
		<div id="settings_main_subaccounts">
			<div class="info">
				Sub accounts can split this account into multiple smaller accounts with limited privileges.			</div>
			<div id="settings_main_subaccount_list">
				<table id="settings_main_subaccount_list_grid"></table>
				<div id="settings_main_subaccount_list_grid_pager"></div>
			</div>
		</div>
	</div>
</div>	
	</div>        
    </body>
</html>