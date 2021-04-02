<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    QueryAddressController,
    AddressController
};

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('valid-address', [AddressController::class, 'verify']);
Route::post('add-address', [AddressController::class, 'add']);
Route::get('get-addresses', [QueryAddressController::class, 'get']);