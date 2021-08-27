<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


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
Route::get('/dashboard', [AuthController::class, 'show_dashboard']);
Route::get('/admin', [AuthController::class, 'login_auth']);
Route::get('/login-auth', [AuthController::class, 'login_auth']);
Route::post('/login-auth-handle', [AuthController::class, 'login_auth_handle']);
Route::get('/admin-logout', [AuthController::class, 'logout_dashboard']);


Route::get('/add_service', [ServiceController::class, 'create']);

Route::get('/register-auth', [AuthController::class, 'register_auth']);
Route::post('/register-auth-handle', [AuthController::class, 'register_auth_handle']);

Route::post('/uploads-ckeditor', [UploadController::class, 'ckeditor_image']);
Route::get('/file-browser', [UploadController::class, 'ckeditor_browser']);
Route::get('/delete-image-ckeditor', [UploadController::class, 'ckeditor_delete']);

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });


Route::prefix('admin')->group(function () {
    Route::get('/change-quantity-view/{value}', [AuthController::class, 'change_quantity_view']);
    Route::prefix('service')->group(function () {
        Route::get('/index', [ServiceController::class, 'index']);
        Route::get('/create', [ServiceController::class, 'create']);
        Route::post('/store', [ServiceController::class, 'store']);
        Route::get('/edit/{id}', [ServiceController::class, 'edit']);
        Route::post('/update/{id}', [ServiceController::class, 'update']);
        Route::get('/destroy/{id}', [ServiceController::class, 'destroy']);
        Route::post('/arrange-service', [ServiceController::class, 'arrange_service']);
    });
    Route::prefix('price')->group(function () {
        Route::get('/show', [PriceController::class, 'show']);
        Route::post('/store', [PriceController::class, 'store']);
    });
    Route::prefix('post')->group(function () {
        Route::get('/index', [PostController::class, 'index']);
        Route::get('/create', [PostController::class, 'create']);
        Route::post('/store', [PostController::class, 'store']);
        Route::get('/edit/{id}', [PostController::class, 'edit']);
        Route::post('/update/{id}', [PostController::class, 'update']);
        Route::get('/destroy/{id}', [PostController::class, 'destroy']);
        Route::post('/arrange-post', [PostController::class, 'arrange_post']);
    });
    Route::prefix('contact')->group(function () {
        Route::get('/index', [ContactController::class, 'index']);
        Route::get('/show/{id}', [ContactController::class, 'show']);
        Route::get('/destroy/{id}', [ContactController::class, 'destroy']);
        Route::get('/status-pending/{id}', [ContactController::class, 'status_pending']);
        Route::get('/status-success/{id}', [ContactController::class, 'status_success']);
    });
    Route::prefix('library')->group(function () {
        Route::get('/index', [LibraryController::class, 'index']);
        Route::get('/create', [LibraryController::class, 'create']);
        Route::post('/store', [LibraryController::class, 'store']);
        Route::get('/edit/{id}', [LibraryController::class, 'edit']);
        Route::post('/update/{id}', [LibraryController::class, 'update']);
        Route::get('/destroy/{id}', [LibraryController::class, 'destroy']);
        Route::post('/arrange-library', [LibraryController::class, 'arrange_library']);
    });
    Route::get('/visitor', [VisitorController::class, 'index']);
});

// Route::get('/', [HomeController::class, 'index']);
Route::get('/price', [HomeController::class, 'price']);
Route::get('/service', [HomeController::class, 'service']);
Route::get('/service-detail/{slug}', [HomeController::class, 'service_detail']);
Route::get('/post', [HomeController::class, 'post']);
Route::get('/post-detail/{slug}', [HomeController::class, 'post_detail']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/send-contact', [HomeController::class, 'send_contact']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/library', [HomeController::class, 'library']);
Route::get('/library-detail/{slug}', [HomeController::class, 'library_detail']);


