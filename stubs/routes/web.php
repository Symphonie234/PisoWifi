<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;

/*
|--------------------------------------------------------------------------
| Portal routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PortalController::class, 'landing'])->name('portal.landing');
Route::post('/insert-coin', [PortalController::class, 'insertCoin'])->name('portal.insert_coin');
Route::get('/voucher/{code}', [PortalController::class, 'showVoucher'])->name('portal.show_voucher');
Route::post('/redeem', [PortalController::class, 'redeem'])->name('portal.redeem');

// Simple API endpoint for hotspot devices to validate a voucher code
Route::post('/api/voucher/validate', [PortalController::class, 'apiValidate'])->name('api.voucher.validate');
