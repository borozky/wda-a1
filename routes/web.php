<?php

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

Route::get('/', "PagesController@index");
Route::get('/faq', "PagesController@faq");

Route::get("/tickets/create", "TicketsController@create");
Route::get("/tickets", "TicketsController@index");
Route::post("/tickets", "TicketsController@store");
Route::get("/tickets/search", "TicketsController@search");
Route::get("/tickets/{id}", "TicketsController@details");
