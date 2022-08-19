<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();



Route::group(['middleware'=>'auth:web'],function()  // have user and password
{
    Route::view('/cat','front_pages.catPage');

    Route::view('/products','front_pages.productPage');
    
    Route::get('/users','UserController@index')->name('userIndex');
    
    Route::get('/user/{id}','UserController@getUserMessage');
    
    Route::post('/AddUserMessage','UserController@store')->name('AddUserMessage');
    
    Route::view('/messages','front_pages.messages');
    
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    
});


Route::group(['middleware'=>'guest:web'],function()  // have no email or password
{
    Route::get('/', function () {
        return view('auth.login');
    });
    
    
});