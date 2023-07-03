<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\User;
use PhpParser\Node\Scalar\MagicConst\Dir;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::resource("users", UserController::class);

Route::prefix("v1")->group(function () {
    require __DIR__ . '/api/v1/users.php';
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
