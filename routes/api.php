<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('products', function (){
    $products = \App\Models\Product::where('quantity', '>', 0)->get();
    return response()->json($products);
});

Route::get('clients', function (){
    $clients = \App\Models\Client::all();

    return response()->json($clients);
});

Route::get('payment-methods', function (){
    $paymentMethods = \App\Models\PaymentMethod::all();

    return response()->json($paymentMethods);
});

Route::get('providers', function (){
    $providers = \App\Models\Provider::all();

    return response()->json($providers);
});

Route::post('/sales/store', [\App\Http\Controllers\SaleController::class, 'store'])->name('sales.store');

Route::post('/expenses/store', [\App\Http\Controllers\ExpenseController::class, 'store'])->name('expenses.store');
