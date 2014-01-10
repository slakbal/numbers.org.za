<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function () {
    return View::make('hello');
});

Route::get("api/person/index", [
    "as"   => "api/person/index",
    "uses" => "Api\PersonController@indexAction"
]);

Route::get("api/person/show", [
    "as"   => "api/person/show",
    "uses" => "Api\PersonController@showAction"
]);

Route::get("api/person/add", [
    "as"   => "api/person/add",
    "uses" => "Api\PersonController@addAction"
]);

Route::get("api/person/edit", [
    "as"   => "api/person/edit",
    "uses" => "Api\PersonController@editAction"
]);

Route::get("api/person/delete", [
    "as"   => "api/person/delete",
    "uses" => "Api\PersonController@deleteAction"
]);

Route::get("api/person/restore", [
    "as"   => "api/person/restore",
    "uses" => "Api\PersonController@restoreAction"
]);

Route::get("api/person/relate", [
    "as"   => "api/person/relate",
    "uses" => "Api\PersonController@relateAction"
]);

Route::get("api/person/unrelate", [
    "as"   => "api/person/unrelate",
    "uses" => "Api\PersonController@unrelateAction"
]);