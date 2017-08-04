<?php

// Pages
Route::get('/', "PagesController@index");
Route::get('/faq', "PagesController@faq");

// Tickets
Route::get("/tickets/create", "TicketsController@create");
Route::get("/tickets", "TicketsController@index");
Route::post("/tickets", "TicketsController@store");
Route::get("/tickets/search", "TicketsController@search");
Route::get("/tickets/{id}", "TicketsController@details");

// Comments
Route::post("/tickets/{id}/comments", "CommentsController@store");

// User
Route::get("/staff", "UsersController@staff");
Route::post("/staff", "UsersController@signin");
Route::get("/logout", "UsersController@logout");

