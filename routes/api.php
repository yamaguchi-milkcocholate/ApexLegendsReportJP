<?php

use Illuminate\Http\Request;

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

/*
Route::group(['middleware' => 'api'], function() {
    Route::get('articles',  function() {
        $articles = Article::all()->take(5);
        return $articles;
    });
});
*/

Route::post('/v1/report', 'ReportController@Report');

Route::post('/v0/report', 'ReportController@Test');

Route::post('/v1/init', 'ReportController@Index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

