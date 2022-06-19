<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/portal/{any?}', function () {
    return view('backend.index');
})
->middleware('auth')
->name('dashboard')
->where('any', '[\/\w\.-]*');

Route::get('unauthorized/user',function(){
return abort(401,'Unauthorized User');
});

require __DIR__.'/auth.php';
