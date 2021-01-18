<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


/*-------------------------------------------------------------------------
/ DataDBController  (table:user、user2) (多個資料庫crud相關api)
/--------------------------------------------------------------------------*/
Route::get('/data_db', 'DataDBController@index');
Route::put('/data_db/{name}', 'DataDBController@update');
Route::post('/data_db', 'DataDBController@store');
Route::delete('/data_db/{name}', 'DataDBController@destroy');



/*-------------------------------------------------------------------------
/ PrimitiveSQLController  (table:data) (原生sql語法操作相關api)
/--------------------------------------------------------------------------*/
Route::get('/data', 'PrimitiveSQLController@index');
Route::get('/data/{name}', 'PrimitiveSQLController@show');
Route::post('/data', 'PrimitiveSQLController@store');
Route::put('/data/{name}', 'PrimitiveSQLController@update');
Route::delete('/data/{name}', 'PrimitiveSQLController@destroy');



/*-------------------------------------------------------------------------
/ ComplexSQLController  (table:nms_reso_ip_switch_port) (複雜sql語法操作api)
/--------------------------------------------------------------------------*/
Route::get('/sql_data', 'ComplexSQLController@index');