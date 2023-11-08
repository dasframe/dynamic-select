<?php

use Illuminate\Support\Facades\Route;
use Tresdstudioweb\DynamicSelect\Http\Controllers\DynamicSelectController;

Route::prefix('tresdstudioweb/dynamicselect')->name('tresdstudioweb.dynamicselect.')->group(function () {
    Route::post('/getFirstSelectItems', [DynamicSelectController::class, 'getFirstSelectItems'])->name('getFirstSelectItems');
});
