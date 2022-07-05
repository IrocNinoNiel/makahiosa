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
    return view('welcome');
});

Auth::routes();



Route::group(['middleware' => 'auth'], function() {


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/timeline', [App\Http\Controllers\HomeController::class, 'showTimeline'])->name('timeline');
    Route::get('/organization', [App\Http\Controllers\HomeController::class, 'showOrganization'])->name('organization');

    Route::get('/orglist', [App\Http\Controllers\HomeController::class, 'showOrgList'])->name('orglist');

    Route::group(['prefix' => 'user'], function() {
         // Sarf Routes
        Route::get('/sarflist', [App\Http\Controllers\user\SarfController::class, 'sarflist'])->name('sarflist');
        Route::get('/sarf', [App\Http\Controllers\user\SarfController::class, 'index'])->name('sarf');
        Route::post('/sarf', [App\Http\Controllers\user\SarfController::class, 'store'])->name('sarf.store');
        Route::get('/sarf/{sarf}',[App\Http\Controllers\user\SarfController::class, 'show'])->name('sarf.show');
        Route::get('/sarf/{sarf}/editbasic',[App\Http\Controllers\user\SarfController::class, 'editBasicInfo'])->name('sarf.editBasicInfo');
        Route::put('/sarf/{sarf}/editbasic',[App\Http\Controllers\user\SarfController::class, 'updateBasicInfo'])->name('sarf.updateBasicInfo');

        Route::get('/sarf/{sarf}/editfile',[App\Http\Controllers\user\SarfController::class, 'editFiles'])->name('sarf.editFiles');
        Route::post('/sarf/{sarf}/editfile',[App\Http\Controllers\user\SarfController::class, 'addNewFile'])->name('sarf.addNewFile');
        Route::delete('/sarf/{fileUserInput}/filedelete',[App\Http\Controllers\user\SarfController::class, 'fileDelete'])->name('sarf.fileDelete');

    });

    Route::group(['middleware' => 'CheckRole', 'prefix' => 'admin'], function() {
        Route::resource('/college', App\Http\Controllers\admin\CollegeController::class);
        // User
        Route::resource('/user', App\Http\Controllers\admin\UserController::class);
        Route::put('/user/{user}/editbasic',[App\Http\Controllers\admin\UserController::class, 'updateBasicInformation'])->name('user.updateBasicInformation');
        Route::put('/user/{user}/editemail',[App\Http\Controllers\admin\UserController::class, 'updateEmail'])->name('user.updateEmail');
        Route::put('/user/{user}/editpassword',[App\Http\Controllers\admin\UserController::class, 'updatePassword'])->name('user.updatePassword');
        Route::put('/user/{user}/editimage',[App\Http\Controllers\admin\UserController::class, 'updateImage'])->name('user.updateImage');

        // Sarf
        Route::get('/applist', [App\Http\Controllers\admin\SarfController::class, 'index'])->name('admin.applist');
        Route::get('/eventlist', [App\Http\Controllers\admin\SarfController::class, 'showEventList'])->name('eventlist');
        Route::get('/sarf/{sarf}',[App\Http\Controllers\admin\SarfController::class, 'show'])->name('sarfadmin.show');
        Route::put('/sarflist/{sarf}', [App\Http\Controllers\admin\SarfController::class, 'changeStatus'])->name('sarf.changeStatus');

    });

    Route::resource('/comment', App\Http\Controllers\CommentController::class);

 });
