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

// Route::post('/quote',[
//         'uses'       =>      'QuoteController@postQuote',
//         'as'         =>      'post-quote'
//     ]);
// Route::get('/quotes',[
//         'uses'       =>      'QuoteController@getQuotes',
//         'as'         =>      'get-quotes'
//     ]);
// Route::get('/quotes/{id}',[
//         'uses'       =>      'QuoteController@getQuote',
//         'as'         =>      'get-quote'
//     ]);
// Route::put('/quote/{id}',[
//         'uses'       =>      'QuoteController@putQuote',
//         'as'         =>      'update-quote'
//     ]);
// Route::delete('/quote/{id}',[
//         'uses'       =>      'QuoteController@deleteQuote',
//         'as'         =>      'delete-quote'
// ]);

Route::apiResource('/products','ProductController');

//Group route of reviews for each project
Route::group(['prefix'=>'product'], function(){
     Route::apiResource('{product}/reviews','ReviewController');
});

