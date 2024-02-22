<?php

use App\Models\Product;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PharmacyController;


Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::resource('pharmacies', PharmacyController::class);
Route::resource('products', ProductController::class);
Route::redirect('/', '/products');

Route::get('/test', function () {
    $id = 50000;
    $pharmacies = DB::table('pharmacies as phar')
    ->join('pharmacy_product as pivot', 'phar.id', '=', 'pivot.pharmacy_id')
    ->select('phar.id', 'phar.name', 'pivot.price')
    ->where('pivot.product_id', '=', $id)
    ->orderBy('pivot.price', 'asc')
    ->limit(5)
    ->get();
    return $pharmacies;

});
