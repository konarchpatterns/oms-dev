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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/curr_mnth_piedata', ['uses'=>'OrderController@curr_mnth_piedata']);
Route::post('ddddregister', 'Api\CwordpressController@register');
Route::post('userunassignapi', 'Api\CwordpressController@unassignapi');
Route::post('userassignapi', 'Api\CwordpressController@assignapi');
Route::post('clientdata', 'Api\CwordpressController@clientdata');
Route::post('clientlastdisposition', 'Api\CwordpressController@clientlastdisposition');
Route::post('orderdetailapi', 'Api\CwordpressController@orderdetailapi');
Route::post('clickassignuser', 'Api\CwordpressController@clickassignuserapi');
Route::post('clicknewcompany', 'Api\CwordpressController@clicknewcompanyapi');
Route::post('assignclicknewcompany', 'Api\CwordpressController@assignclicknewcompanyapi');
Route::post('unassignclicknewcompany', 'Api\CwordpressController@unassignclicknewcompanyapi');



/**
 *  api route for inactive orders
 */
Route::post('clientdata', 'Api\CwordpressController@clientApi');
Route::get('query','Api\CwordpressController@query');
