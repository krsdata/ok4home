<?php

Route::group(['middleware' => 'web', 'prefix' => 'kandy', 'namespace' => 'Modules\Kandy\Http\Controllers'], function()
{
    Route::get('/', 'KandyController@index');
});
