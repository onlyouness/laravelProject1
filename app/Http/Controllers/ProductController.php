<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect("/");
    }
    public function showEditProduct(Product $product)
    {
        $categories = Category::all();
        return view('editProdut', ["product" => $product, 'categories' => $categories]);
        
    }
    
    public function SaveEdit(Product $product, Request $request)
    {
        $incomingFields = $request->validate([
            "titleEdited" => "required",
            "priceEdited" => "required",
            "imageEdited" => "required",
            "categoryIdEdited" => "required"
        ]);
        if ($request->hasFile('imageEdited')) {
            $destination_path = "public/images/products";
            $image = $request->file('imageEdited');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('imageEdited')->storeAs($destination_path, $image_name);
            $incomingFields["imageEdited"] = $image_name;
        }
        //Log this info, you will find them in Storage/logs/laravel.logs
        \Log::info("incoming:", $incomingFields);
        // $incomingFields["titleEdited"] = strip_tags($incomingFields["titleEdited"]);
        // $incomingFields["priceEdited"] = strip_tags($incomingFields["priceEdited"]);
        $product->update($incomingFields);
        return redirect("/")->with("success","product updated");
    }
    public function showProducts(){
        $products = Product::all();
        $categories = Category::all();
        return view("home", ["products"=> $products,"categories"=>$categories]);
    }
    public function addProduct(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'price' => "required",
            'categoryId' => "required",
            "image" => 'required'
        ]);
        if ($request->hasFile('image')) {
            $destination_path = "public/images/products";
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            $incomingFields["image"] = $image_name;
        }
        Product::create($incomingFields);
        return redirect('/');
        
    }
    public function showAddProduct()
    {
        $categories = Category::all();
        return view('addProduct', ["categories" => $categories]);
    }
}
