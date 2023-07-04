
<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::group([
    // "middleware" => ['auth'],
    "as" => 'posts.',

    'namespace' => "\App\Http\Controllers"
], function () {

    Route::get('/posts', 'PostController@index')->name('index');
    Route::get("/posts/{post}", 'PostController@show')->name('show')->where('post', '[0-9]+');
    Route::post("/posts", [PostController::class, 'store'])->name('store');
    Route::patch("/posts/{post}", [PostController::class, 'update'])->name('update')->whereNumber('post');
    Route::delete("/posts", [PostController::class, 'destroy'])->name('destroy');
});

// Route::middleware('auth')->name('posts.')->namespace('\App\Http\Controllers')->group(function () {
//     Route::get('/posts', 'postController@index')->name('index');
//     Route::get("/posts{post}", [postController::class, 'show'])->name('show');
//     Route::post("/posts", [postController::class, 'store'])->name('store');
//     Route::patch("/post/{post}", [postController::class, 'update'])->name('update');
//     Route::delete("/posts", [postController::class, 'destroy'])->name('destroy');
// });

?>
