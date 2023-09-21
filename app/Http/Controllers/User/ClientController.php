<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryShop()
    {
        return view('user_template.shop');
    }
    public function ProductDetail()
    {
        return view('user_template.detail');
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
