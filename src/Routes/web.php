<?php

// src/Routes/web.php
Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('admin/chart-types', 'Vadiasov\ChartTypes\Controllers\ChartTypesController@index')->name('admin/chart-types');
    Route::get('admin/chart-types/create', 'Vadiasov\ChartTypes\Controllers\ChartTypesController@create')->name('admin/chart-types/create');
    Route::post('admin/chart-types/create', 'Vadiasov\ChartTypes\Controllers\ChartTypesController@store');
    Route::get('admin/chart-types/{id}/edit', 'Vadiasov\ChartTypes\Controllers\ChartTypesController@edit');
    Route::post('admin/chart-types/{id}/edit', 'Vadiasov\ChartTypes\Controllers\ChartTypesController@update');
    Route::get('admin/chart-types/{id}/delete', 'Vadiasov\ChartTypes\Controllers\ChartTypesController@destroy');
});
