<?php

use Illuminate\Support\Facades\Route;
use Dasframe\DynamicSelect\Http\Controllers\DynamicSelectController;

Route::prefix('dasframe/dynamicselect')->name('dasframe.dynamicselect.')->group(function () {
    Route::post('/getFirstSelectItems', [DynamicSelectController::class, 'getFirstSelectItems'])->name('getFirstSelectItems');
});
