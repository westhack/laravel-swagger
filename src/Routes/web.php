<?php

Route::get('/swagger', 'Swagger\SwaggerController@index');

Route::get('/api/swagger', 'Swagger\SwaggerApiController@index');

