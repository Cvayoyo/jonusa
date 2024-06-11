<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CpanelController;
use App\Http\Controllers\Api\ObjectController;
use App\Http\Controllers\Api\TrackingController;
use App\Models\gs_user;
use App\Models\gs_themes;
use App\Models\gs_object;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('login',[LoginController::class, 'loginUser']);
Route::post('fn_lng',[CpanelController::class, 'fn_lng']);
Route::post('fn_connect',[CpanelController::class, 'fn_connect']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('fn_settings',[CpanelController::class, 'fn_settings']);
    Route::match(['get', 'post'],'fn_cpanel',[CpanelController::class, 'fn_cpanel']);
    Route::match(['get', 'post'],'fn_cpanel.server',[CpanelController::class, 'fn_cpanel']);
    Route::match(['get', 'post'],'fn_cpanel.users',[CpanelController::class, 'fn_cpanel']);
    Route::match(['get', 'post'],'fn_cpanel.objects',[CpanelController::class, 'fn_cpanel']);
    Route::post('fn_cpanel.users.register',[CpanelController::class, 'fn_cpanel_users']);




    Route::post('tracking/fn_settings',[TrackingController::class, 'fn_settings']);
    Route::match(['get', 'post'], 'tracking/fn_settings.groups',[TrackingController::class, 'fn_settings']);
    Route::match(['get', 'post'], 'tracking/fn_settings.drivers',[TrackingController::class, 'fn_settings']);
    Route::match(['get', 'post'], 'tracking/fn_settings.objects',[TrackingController::class, 'fn_settings']);
    Route::match(['get', 'post'], 'tracking/fn_settings.events',[TrackingController::class, 'fn_settings']);
    Route::match(['get', 'post'], 'tracking/fn_settings.passengers',[TrackingController::class, 'fn_settings']);
    Route::match(['get', 'post'], 'tracking/fn_settings.trailers',[TrackingController::class, 'fn_settings']);
    Route::match(['get', 'post'], 'tracking/fn_settings.templates',[TrackingController::class, 'fn_settings']);
    Route::match(['get', 'post'], 'tracking/fn_settings.kml',[TrackingController::class, 'fn_settings']);
    Route::match(['get', 'post'], 'tracking/fn_settings.subaccounts',[TrackingController::class, 'fn_settings']);
    Route::match(['get', 'post'], 'tracking/fn_events',[TrackingController::class, 'fn_events']);
    Route::match(['get', 'post'], 'tracking/fn_places',[TrackingController::class, 'fn_places']);
    Route::match(['get', 'post'], 'tracking/fn_history',[TrackingController::class, 'fn_history']);
    Route::match(['get', 'post'], 'tracking/fn_share',[TrackingController::class, 'fn_share']);
    Route::match(['get', 'post'], 'tracking/fn_tasks',[TrackingController::class, 'fn_tasks']);
    Route::match(['get', 'post'], 'tracking/fn_reports',[TrackingController::class, 'fn_reports']);
    Route::match(['get', 'post'], 'tracking/fn_rilogbook',[TrackingController::class, 'fn_rilogbook']);
    Route::match(['get', 'post'], 'tracking/fn_dtc',[TrackingController::class, 'fn_dtc']);
    Route::match(['get', 'post'], 'tracking/fn_maintenance',[TrackingController::class, 'fn_maintenance']);
    Route::match(['get', 'post'], 'tracking/fn_expenses',[TrackingController::class, 'fn_expenses']);
    Route::match(['get', 'post'], 'tracking/fn_cmd',[TrackingController::class, 'fn_cmd']);
    Route::match(['get', 'post'], 'tracking/fn_img',[TrackingController::class, 'fn_img']);
    Route::match(['get', 'post'], 'tracking/fn_billing',[TrackingController::class, 'fn_billing']);
    Route::match(['get', 'post'], 'tracking/fn_objects',[TrackingController::class, 'fn_objects']);
});