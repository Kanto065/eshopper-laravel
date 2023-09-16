<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index()
    {
        $categories = Category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }

    public function AddCategory()
    {
        return view('admin.addcategory');
    }

    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))

        ]);

        return redirect()->route('allcategory')->with('message', 'Category Added Successfully!');
    }
}
