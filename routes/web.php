<?php

        
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\checkAdmin;
use App\Http\Middleware\checkAdminMiddleware;
use App\Http\Middleware\TestMiddlewware;


    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
    });

    // Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');

   // Đăng nhập
    Route::get('athu/login', [LoginController::class, 'showFormLogin'])->name('login');
    Route::post('athu/login', [LoginController::class, 'login']);
    // Đăng xuất
    Route::post('athu/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Đăng ký
    Route::get('athu/register',   [RegisterController::class, 'showFormRegister'])->name('register');
    Route::post('athu/register',  [RegisterController::class, 'register'])->name('register');

    //middleware

    Route::get('admin', function(){
        return ' Đây là admin';
    })->middleware('isAdmin');


 
    

    
    
    
    