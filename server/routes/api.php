<?php

use Illuminate\Http\Request;
use \App\Models\User;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::prefix('order')->group(function(){
        Route::get('/')->uses('OrderController@index');
        Route::get('/{id}')->uses('OrderController@show')->where('id', '[0-9]+');
        Route::get('{id}/details')->uses('OrderController@details')->where('id', '[0-9]+');
    });
});

// Route::post('user', function (Request $request) {
//     User::create([
//         'name' => $request->get('name'),
//         'email' => $request->get('email'),
//         'password' => bcrypt($request->get('password'))
//     ]);
// });
