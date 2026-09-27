<?php

use App\Http\Controllers\FormValidationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Step 1 & 2: Validasi di Controller + Menampilkan Error
Route::get('/register-basic', [FormValidationController::class, 'createBasic']);
Route::post('/register-basic', [FormValidationController::class, 'storeBasic']);

// Step 3: Custom Validation Message
Route::get('/register-custom-message', [FormValidationController::class, 'createCustomMessage']);
Route::post('/register-custom-message', [FormValidationController::class, 'storeCustomMessage']);

// Step 4: Validasi Menggunakan Form Request
Route::get('/register-form-request', [FormValidationController::class, 'createFormRequest']);
Route::post('/register-form-request', [FormValidationController::class, 'storeFormRequest']);

// Step 5: Validasi Kustom (Custom Rule)
Route::get('/register-custom-rule', [FormValidationController::class, 'createCustomRule']);
Route::post('/register-custom-rule', [FormValidationController::class, 'storeCustomRule']);

Route::get('/register-combined', [FormValidationController::class, 'createCombined']);
Route::post('/register-combined', [FormValidationController::class, 'storeCombined']);
