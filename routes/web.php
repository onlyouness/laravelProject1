<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::all();
    return view('dash',["products"=>$products]);
});

Route::get("/showAddProduct", [ProductController::class, "showAddProduct"]);
Route::post("/addProduct", [ProductController::class, "addProduct"]);
Route::delete("/delete-product/{product}",[ProductController::class , "deleteProduct"]);
Route::get("edit-product/{product}", [ProductController::class, 'showEditProduct']);
Route::put("EditProduct/{product}", [ProductController::class, 'SaveEdit']);

//Category Routes
Route::get("/category", [CategoryController::class,'showCategory']);
Route::get("/category/showAddCategory", [CategoryController::class, "showAddCategory"]);
Route::post("/category/add-category", [CategoryController::class, "addCategory"]);
Route::delete('/category/delete-category/{category}', [CategoryController::class, "deleteCategory"]);

//Home route
Route::get("/home", [ProductController::class,'showProducts']);