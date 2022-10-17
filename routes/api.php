<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\api\role\RoleController;
use App\Http\Controllers\backend\api\user\UserController;
use App\Http\Controllers\backend\layout\LayoutController;
use App\Http\Controllers\backend\api\audit\AuditController;
use App\Http\Controllers\backend\api\auditor\AuditorController;
use App\Http\Controllers\backend\api\dashboard\DashboardController;
use App\Http\Controllers\backend\api\permission\PermissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Starting Config Api Routes
Route::prefix('config')->group(function () {
    Route::get('/sidebar-menu',[LayoutController::class,'getSideBarMenu']);
});
// Ending Config Api Routes

Route::prefix('backend')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('auditor', AuditorController::class);
    Route::get('/audit/details/{id}',[AuditController::class,'getAuditDetails']);
    Route::post('update-audit-remark/{id}',[AuditController::class,'updateAuditRemark']);
    Route::get('audit-approve/{id}',[AuditController::class,'updateAuditApproval']);
    Route::get('audit-reject/{id}',[AuditController::class,'updateAuditReject']);
    Route::get('audit-resendmail/{id}',[AuditController::class,'resendMail']);
    Route::resource('audit', AuditController::class);
    Route::get('/dashboard',[DashboardController::class,'getDashboard']);

});

Route::get('/dashboard',[DashboardController::class,'getDashboard']);


