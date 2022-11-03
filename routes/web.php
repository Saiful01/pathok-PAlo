<?php

use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventGuestController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Artisan;
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


Route::any('/abracadabra', [AdminAuth::class, 'login']);
/*Route::any('/admin/login', [AdminAuth::class, 'login']);*/
Route::any('/forget-password', [AdminAuth::class, 'forgetPassword']);
Route::any('/reset-password/{id}', [AdminAuth::class, 'resetPassword']);

Route::group(['middleware' => 'admin'], function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('/posts', PostController::class);
    Route::resource('/videos', VideoController::class);
    Route::resource('/galleries', ImageController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/users', UserController::class);

    Route::resource('/pages', PageController::class);

    Route::resource('/event-guests', EventGuestController::class);
    Route::get('/event-guest/ticket/{qr_code}', [EventGuestController::class, 'ticket']);


    Route::post('/event-guest/import', [EventGuestController::class, 'import']);
    //Route::get('/mail-sent/{id}', [EventGuestController::class, 'mailSent']);

    Route::get('/profile', [AdminController::class, 'profile']);
    Route::post('/profile-update', [AdminController::class, 'profileUpdate']);
    Route::get('/log-out', [AdminController::class, 'logOut']);

});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {


});

/*Route::any('/', [AdminAuth::class, 'login']);*/
Route::get('/login', [Controller::class, 'home']);
Route::get('/', [Controller::class, 'home']);
Route::get('/get-ticket', [Controller::class, 'getTicket']);
Route::any('/get-ticket/save', [Controller::class, 'ticketSave']);
Route::any('/success/{qr_code}', [Controller::class, 'success']);
Route::any('/profile/{qr_code}', [Controller::class, 'profile']);

Route::any('/download', [Controller::class, 'download']);
Route::any('/ticket-download', [Controller::class, 'ticketDownload']);

/*Route::get('/profile/{id}', [Controller::class, 'profileDetails']);
Route::get('/profile/{id}/{name}', [Controller::class, 'profileDetailsName']);*/


Route::post('/profile/update', [Controller::class, 'profileUpdate']);
Route::get('/confirm/{id}', [Controller::class, 'confirm']);


Route::get('/post-details/{id}', [Controller::class, 'postDetails']);


Route::get('/mail', [Controller::class, 'mail']);
Route::get('/import', [ExcelController::class, 'import']);
Route::post('/import/save', [ExcelController::class, 'importSave']);
Route::any('/export', [ExcelController::class, 'export']);


Route::any('/html-to-image', [ExcelController::class, 'htmlToImage']);

Route::get('/clear', function () {


    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

});

/*Route::any('/ticket', [ExcelController::class, 'ticket']);*/
Route::any('/test', [Controller::class, 'test']);
Route::any('/qr-generate/{qr_code}', [Controller::class, 'qrCodeGenerate']);


Route::any('/save-capture', [Controller::class, 'saveCapture']);
Route::any('/send-ticket', [Controller::class, 'sendTicket']);

Route::get('/migrate', function () {

    //return "Not allowed!";
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    Artisan::call('config:clear');

    return "Migrate!";

});
//ciongstion

//puztirynfrflpxnq
