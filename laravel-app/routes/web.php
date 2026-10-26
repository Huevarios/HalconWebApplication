<?php
use Illuminate\Support\Facades\Route;
Route::get('/','PublicController@index')->name('home');
Route::get('/login','AuthController@showLogin')->name('login');
Route::post('/login','AuthController@login')->name('login.submit');
Route::post('/logout','AuthController@logout')->middleware('auth')->name('logout');
Route::middleware('auth')->group(function()
{
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('users','UserController')->except(['show','destroy']);
    Route::get('/orders/archived','OrderController@archived')->name('orders.archived');
    Route::post('/orders/archived/{id}/restore','OrderController@restore')->name('orders.restore');
    Route::resource('orders','OrderController');
}
);
