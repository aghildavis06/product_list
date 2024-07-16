<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ProductController::class)->group(function(){
    Route::get('productpage','productpage')->name('productpage');
    Route::get('/upload-product','showUploadForm')->name('product.upload.form');
});
Route::post('/upload-product', [ProductController::class, 'uploadProduct'])->name('upload.product');

Route::get('/product/edit/{id}', [ProductController::class, 'showEditForm'])->name('product.edit');
Route::put('/product/update/{id}', [ProductController::class, 'updateProduct'])->name('product.update');
Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
Route::get('/product/search', [ProductController::class, 'searchProducts'])->name('product.search');

