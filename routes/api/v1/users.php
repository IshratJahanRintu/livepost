
<?php

use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::group([
    // "middleware" => ['auth'],
    "as" => 'users.',

    'namespace' => "\App\Http\Controllers"
], function () {

    Route::get('/users', 'UserController@index')->name('index');
    Route::get("/users/{user}", 'UserController@show')->name('show')->where('user', '[0-9]+');
    Route::post("/users", [UserController::class, 'store'])->name('store');
    Route::patch("/users/{user}", [UserController::class, 'update'])->name('update')->whereNumber('user');
    Route::delete("/users", [UserController::class, 'destroy'])->name('destroy');
});

// Route::middleware('auth')->name('users.')->namespace('\App\Http\Controllers')->group(function () {
//     Route::get('/users', 'UserController@index')->name('index');
//     Route::get("/users{user}", [UserController::class, 'show'])->name('show');
//     Route::post("/users", [UserController::class, 'store'])->name('store');
//     Route::patch("/users/{user}", [UserController::class, 'update'])->name('update');
//     Route::delete("/users", [UserController::class, 'destroy'])->name('destroy');
// });

?>