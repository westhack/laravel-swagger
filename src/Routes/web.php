<?php

Route::get('/swagger', '\Westhack\LaravelSwagger\Controllers\SwaggerController@index');

Route::get('/api/swagger', '\Westhack\LaravelSwagger\Controllers\SwaggerApiController@index');

