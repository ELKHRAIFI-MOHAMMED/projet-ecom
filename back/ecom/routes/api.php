<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('produit',ProduitController::class);
Route::resource('client',ClientController::class);
Route::resource('category',CategoryController::class);
Route::resource('commande',CommandeController::class);
Route::put('commande/status/{idc}',[CommandeController::class,'up_dtae_status']);
Route::post('produitt/{id}',[ProduitController::class,'up_dtae_image']);
Route::get('category/produit/{idc}',[CategoryController::class,'produit_category']);

/////login
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/test', [LoginController::class, 'test'])->name('test');

Route::group([
    'middleware'=>'api',
    'prefix'=>'auth'
],function($router){
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});
