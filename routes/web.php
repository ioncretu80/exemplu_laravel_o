<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ErstController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\PostController;
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

//Route::get('/erst',"App\Http\Controllers\ErstController@Index" );
Route::get('/erst',[ErstController::class,'index'] );

//Route::group(['namespace'=>'App\Http\Controllers\Post'],function (){
Route::group(['namespace'=>'App\Http\Controllers\Post'],function (){
    Route::get('/posts','IndexController')->name('post.index');
    Route::get('/posts/create','CreateController')->name('post.create');
    Route::post('/posts','StoreController')->name('post.store');
    Route::get('/posts/{post}','ShowController')->name('post.show');
    Route::get('/posts/{post}/edit','EditController')->name('post.edit');
    Route::patch('/posts/{post}','UpdateController')->name('post.update');
    Route::delete('/posts/{post}','DeleteController')->name('post.delete');
});






Route::get('/posts/update',[PostController::class,'update'] );
Route::get('/posts/delete',[PostController::class,'delete'] );
Route::get('/posts/firstorcreate',[PostController::class,'firstOrCreate'] );


Route::get('/main',[MainController::class,'index'] )->name('main.index');;
Route::get('/contacts',[ContactController::class,'index'])->name('contact.index');;
Route::get('/about',[AboutController::class,'index'])->name('about.index');;
