<?php

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

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

Route::get('/products', function () {
    return response()->json($products);// new ProductResource(Product::all());
});
