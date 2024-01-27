<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function showAddCategory(){
        return view("addCategory");

    }
    public function addCategory(Request $request){
        $incomingFields = $request->validate([
            "categoryTitle"=>['required','min:2'],
        ]);
        $incomingFields["categoryTitle"] = strip_tags($incomingFields["categoryTitle"]);
        Category::create($incomingFields);
       return  redirect("/category");

    }
    public function deleteCategory(Category $category){
        $category->delete();
        return redirect("/category");

    }
}
