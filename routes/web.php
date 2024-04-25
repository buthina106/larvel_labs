<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
Route::get('/home', function () {
    return view('home');
});
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/create',[PostController::class, 'create']);
// Route::post('/posts', [PostController::class, 'store']);
// Route::get('/posts/{id}',[PostController::class,'show']);
// Route::get('/posts/{id}/edit',[PostController::class,'edit']);
// Route::put('/posts/{id}',[PostController::class,'update']);
// Route::delete('/posts/{id}',[PostController::class,'destroy']);
route ::resource("posts",PostController::class)->middleware("auth");
// Route::get('/comments', [CommentController::class, 'store'])->name('comments.store');
// Auth::routs();
// Route::get('/posts/{id}', function ($id) {
//     $post=[
//         "id"=>$id,
//         "title"=>"post 1",
//         "body"=>"body 1",
//         "posted_by"=>"ahmed"
//     ];
//     return view("post",["post"=>$post]);
// });

// Route::get('/posts/{post}/edit', function ($postId) {
//     return view('edit-post');
// });


// Route::put('/posts/{post}/update', function ($postId) {
//     return view('update');
// });

// Route::delete('/posts/{post}/delete', function ($postId) {
//     return view('delete');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
