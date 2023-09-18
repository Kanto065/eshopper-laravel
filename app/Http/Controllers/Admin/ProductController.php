<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index()
    {
        $products = Product::latest()->get();
        return view('admin.allproducts', compact('products'));
    }

    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.addproduct', compact('categories', 'subcategories'));
    }

    public function StoreProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_img' => 'required|image|mimes:jpeg,jpg,gif,svg,png|max:4096',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required'
        ]);

        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $image_name);

        $img_url = 'upload/' . $image_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');


        Product::insert([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_long_des' => $request->product_long_des,
            'product_category_id' => $category_id,
            'product_subcategory_id' => $subcategory_id,
            'product_img' => $img_url
        ]);

        Category::where('id', $category_id)->increment('product_count', 1);
        Subcategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('allproducts')->with('message', 'Product Added Successfully!');
    }

    public function EditProductImg($id)
    {
        $productinfo = Product::findOrFail($id);
        return view('admin.editproductimg', compact('productinfo'));
    }

    public function UpdateProductImg(Request $request)
    {
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,jpg,gif,svg,png|max:4096'
        ]);

        $id = $request->id;

        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $image_name);

        $img_url = 'upload/' . $image_name;

        Product::findOrFail($id)->update([
            'product_img' => $img_url,
        ]);

        return redirect()->route('allproducts')->with('message', 'Product Image Updated Successfully!');
    }

    public function EditProduct($id)
    {
        $productinfo = Product::findOrFail($id);

        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();

        return view('admin.editproduct', compact('productinfo', 'categories', 'subcategories'));
    }

    public function UpdateProduct(Request $request)
    {
        $productid = $request->id;

        $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required'
        ]);

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        //dd($request->quantity);

        Product::findOrFail($productid)->update([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $category_id,
            'product_subcategory_id' => $subcategory_id,
        ]);

        return redirect()->route('allproducts')->with('message', 'Product Information Updated Successfully!');
    }

    public function DeleteProduct($id)
    {
        $cat_id = Product::where('id', $id)->value('product_category_id');
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');

        Category::where('id', $cat_id)->decrement('product_count', 1);
        Subcategory::where('id', $subcat_id)->decrement('product_count', 1);

        Product::findOrFail($id)->delete();

        return redirect()->route('allproducts')->with('message', 'Product Deleted Successfully!');
    }
}
