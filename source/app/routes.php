<?php

Route::any("/", [
    "as"   => "index/index",
    "uses" => "IndexController@indexAction"
]);

Route::any("person/search", [
    "as"   => "person/search",
    "uses" => "PersonController@searchAction"
]);

Route::any("api/person/index", [
    "as"   => "api/person/index",
    "uses" => "Api\PersonController@indexAction"
]);

Route::any("api/person/show", [
    "as"   => "api/person/show",
    "uses" => "Api\PersonController@showAction"
]);

Route::any("api/person/add", [
    "as"   => "api/person/add",
    "uses" => "Api\PersonController@addAction"
]);

Route::any("api/person/edit", [
    "as"   => "api/person/edit",
    "uses" => "Api\PersonController@editAction"
]);

Route::any("api/person/delete", [
    "as"   => "api/person/delete",
    "uses" => "Api\PersonController@deleteAction"
]);

Route::any("api/person/restore", [
    "as"   => "api/person/restore",
    "uses" => "Api\PersonController@restoreAction"
]);

Route::any("api/person/relate", [
    "as"   => "api/person/relate",
    "uses" => "Api\PersonController@relateAction"
]);

Route::any("api/person/unrelate", [
    "as"   => "api/person/unrelate",
    "uses" => "Api\PersonController@unrelateAction"
]);