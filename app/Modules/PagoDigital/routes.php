<?php

use Illuminate\Support\Facades\Route;
use App\Modules\PagoDigital\Controllers\PagoDigitalController;
use App\Modules\PagoDigital\Controllers\PaymentController;

Route::middleware(['web', 'auth'])->group(function () {

Route::prefix('pago-digital')->group(function () {
    Route::middleware(['verified_docs'])->group(function () {
        Route::get('/', [PagoDigitalController::class, 'index'])->name('pago.digital');
    });
});

Route::post('/pagos/webhook/{provider}', [PaymentController::class, 'webhook'])
    ->name('pagos.webhook');