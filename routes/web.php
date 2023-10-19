<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;

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

Route::get('/',[HomeController::class,'index']);
// Route::view('/','welcome');
Route::resource('article',ArticleController::class);
// Route::get('/login',[HomeController::class,'login'])->name('login');
// Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::controller(AuthController::class)->group(function(){
    Route::get('register','register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
//Điều hướng đến Category Controller
Route::controller(CategoryController::class)->prefix('category')->group(function(){
    Route::get('','index')->name('category');
    Route::get('create','create')->name('category.create');
    Route::get('show/{ma_tloai}','show')->name('category.show');
    Route::get('edit/{ma_tloai}','edit')->name('category.edit');
    Route::put('edit/{ma_tloai}','update')->name('category.update');
    Route::post('store','store')->name('category.store');
    Route::delete('destroy/{ma_tloai}','destroy')->name('category.destroy');
});

//Điều hướng đến Author Controller 

Route::controller(AuthorController::class)->prefix('author')->group(function(){
    Route::get('','index')->name('author');
    Route::get('create','create')->name('author.create');
    Route::post('store','store')->name('author.store');
    Route::get('show/{ma_tgia}','show')->name('author.show');
    Route::get('edit/{ma_tgia}','edit')->name('author.edit');
    Route::put('edit/{ma_tgia}','update')->name('author.update');
    Route::get('show/{ma_tgia}','show')->name('author.show');
    Route::delete('destroy/{ma_tgia}','destroy')->name('author.destroy');
});

//Điều hướng đến Article Controller
Route::controller(ArticleController::class)->prefix('article')->group(function(){
    Route::get('','index')->name('article');
    Route::get('create','create')->name('article.create');
    Route::post('store','store')->name('article.store');
    Route::get('show/{ma_bviet}','show')->name('article.show');
    Route::get('edit/{ma_bviet}','edit')->name('article.edit');
    Route::put('edit/{ma_bviet}','update')->name('article.update');
    Route::get('show/{ma_bviet}','show')->name('article.show');
    Route::delete('destroy/{ma_bviet}','destroy')->name('article.destroy');
});
Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');

Route::middleware('auth')->group(function(){
    Route::get('dashboard',function(){
        return view('dashboard');
    })->name('dashboard');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
