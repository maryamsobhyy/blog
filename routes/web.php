<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\commentcontroller;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Models\products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\Rolecontroller;
use App\Http\Controllers\Usercontroller;

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
//LOGIN page
Route::get('/',[AdminController::class,'show'])->name('loginpage');
//Print blog
Route::get('/print/{id}',[BlogController::class,'print'])->name('printblog');
//User register in dashboard
Route::get('/createuser', [Usercontroller::class,'create'])->name('user.create');
Route::post('/storeuser', [Usercontroller::class,'store'])->name('user.store');
//Export blog
Route::get('/export', [BlogController::class,'export'])->name('export');
//CRUD operation in blogs
Route::get('/blogs',[BlogController::class,'index'])->name('allblogs');
Route::get('/createblog',[ BlogController::class,'create'])->name('blogs_create');
Route::post('/storeblog',[ BlogController::class,'store'])->name('blogs_store');
Route::post('/deleteblog',[ BlogController::class,'delete'])->name('blog.delete');
Route::get('/showblog/{id}',[ BlogController::class,'show'])->name('blog.show');
Route::get('/edit/{id}',[ BlogController::class,'edit'])->name('edit');
Route::post('/update/{id}',[ BlogController::class,'update'])->name('update');
//comment
Route::post('/comment.store',[ commentcontroller::class,'store'])->name('comment.store');
//like and dislike
Route::post('/like',[ BlogController::class,'like'])->name('like');
Route::post('/dislike',[ BlogController::class,'dislike'])->name('dislike');










require __DIR__.'/auth.php';
