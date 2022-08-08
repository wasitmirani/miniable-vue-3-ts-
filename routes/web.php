<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\api\audit\AuditController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return  redirect('/login');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('audit-survey/{token}',[AuditController::class,'auditSurvey'])->name('audit-survey');
Route::post('audit-survery-auditor/{token}',[AuditController::class,'sendSurveyDates'])->name('audit-survery-auditor');
Route::get('/audit-survery-completed',function(){
    return view('survey.thank');
})->name('thank');

Route::get('/portal/{any?}', function () {
    return view('backend.index');
})->middleware('auth')->name('dashboard')->where('any', '[\/\w\.-]*');

Route::get('unauthorized/user',function(){
return abort(401,'Unauthorized User');
});

Route::get('/logout',[AuthenticatedSessionController::class,'destroy']);



require __DIR__.'/auth.php';
