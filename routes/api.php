<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\User;
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

Route::get('articles', 'ArticleController@index');
Route::get('articles/{id}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::post('storeGoy', 'ArticleController@storeGoy');
Route::post('goy', 'ArticleController@updateManai');
Route::post('haigaadZasdagFunc', 'ArticleController@haigaadZasdagFunc');
Route::put('articles/{id}', 'ArticleController@update');
Route::delete('articles/{id}', 'ArticleController@delete');
Route::get('enquiry', 'EnquiryController@index');
Route::post('createEnquiry', 'EnquiryController@createEnquiry');

Route::get('getAllUser', 'MainController@getAllUser');
Route::post('loginUser', 'MainController@loginUser');
Route::post('addUser', 'MainController@addUser');
Route::get('getAllWorks', 'MainController@getAllWorks');
Route::post('workSearchIdUpdate', 'MainController@workSearchIdUpdate');
Route::post('addWorkNew', 'MainController@addWorkNew');

