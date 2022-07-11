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


Route::post('/loginmanual',[App\Http\Controllers\Auth\LoginController::class, 'manual'])->name('login.manual');
Route::get('/changedefaultpassword/{email}',[App\Http\Controllers\Auth\DefaultPasswordController::class, 'index'])->name('password.index');
Route::post('/changedefaultpassword/{email}',[App\Http\Controllers\Auth\DefaultPasswordController::class, 'changetoNewPassword'])->name('password.change');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/timeline', [App\Http\Controllers\TimelineController::class, 'index'])->name('timeline');
    Route::get('/events', [App\Http\Controllers\TimelineController::class, 'getAllEvent'])->name('getAllEvent');
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

        // Contact and FAQ
        Route::get('/contact',[App\Http\Controllers\user\FAQController::class, 'index'])->name('contact.index');

        // Send Email
        Route::get('/mail',[App\Http\Controllers\user\FeedbackController::class, 'index'])->name('mail.index');
        Route::post('/mail',[App\Http\Controllers\user\FeedbackController::class, 'send'])->name('mail.send');
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

        //FAQ
        Route::get('/faq',[App\Http\Controllers\admin\FAQController::class, 'index'])->name('faq.index');
        Route::get('/faq/add',[App\Http\Controllers\admin\FAQController::class, 'create'])->name('faq.create');
        Route::post('/faq/add',[App\Http\Controllers\admin\FAQController::class, 'store'])->name('faq.store');
        Route::get('/faq/{faq}/edit',[App\Http\Controllers\admin\FAQController::class, 'edit'])->name('faq.edit');
        Route::put('/faq/{faq}/edit',[App\Http\Controllers\admin\FAQController::class, 'update'])->name('faq.update');
        Route::delete('/faq/{faq}/delete',[App\Http\Controllers\admin\FAQController::class, 'destroy'])->name('faq.destroy');
        Route::get('/faq/{faq}/show',[App\Http\Controllers\admin\FAQController::class, 'show'])->name('faq.show');
    });
    // Comment per Sarf
    Route::resource('/comment', App\Http\Controllers\CommentController::class);
    Route::view('/message', view:'message.index')->name('message.index');
 });
