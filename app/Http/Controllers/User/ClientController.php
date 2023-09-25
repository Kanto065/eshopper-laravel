<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryShop($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('user_template.shop', compact('category', 'products'));
    }
    public function ProductDetail($id)
    {
        $product = Product::findOrFail($id);
        return view('user_template.detail', compact('product'));
    }
    public function AddToCart()
    {
        return view('user_template.cart');
    }
    public function Checkout()
    {
        return view('user_template.checkout');
    }
    public function UserProfile()
    {
        return view('user_template.userprofile');
    }
    public function Contact()
    {
        return view('user_template.contact');
    }
}
