
<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::group([
    // "middleware" => ['auth'],
    "as" => 'comments.',

    'namespace' => "\App\Http\Controllers"
], function () {

    Route::get('/comments', 'commentController@index')->name('index');
    Route::get("/comments/{comment}", 'commentController@show')->name('show')->where('comment', '[0-9]+');
    Route::post("/comments", [CommentController::class, 'store'])->name('store');
    Route::patch("/comments/{comment}", [CommentController::class, 'update'])->name('update')->whereNumber('comment');
    Route::delete("/comments/{comment}", [CommentController::class, 'destroy'])->name('destroy');
});

// Route::middleware('auth')->name('comments.')->namespace('\App\Http\Controllers')->group(function () {
//     Route::get('/comments', 'commentController@index')->name('index');
//     Route::get("/comments{comment}", [commentController::class, 'show'])->name('show');
//     Route::post("/comments", [commentController::class, 'store'])->name('store');
//     Route::patch("/comment/{comment}", [commentController::class, 'update'])->name('update');
//     Route::delete("/comments", [commentController::class, 'destroy'])->name('destroy');
// });

?>
