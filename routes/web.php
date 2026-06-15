<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use resources\view\auth\login;

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
    return redirect("posts");
});


Auth::routes();

Route::get('/home', function () {
    //if(Auth::check()){
        return view('home');
    //}else{
    //    return view('auth\login');
    //}    
    })->name('home');


Route::resources([
    'posts' => PostController::class,
    'users' => UserController::class,
]);
Route::get('/posts/{post}' , [PostController::class , 'delete'])->name('posts.delete');