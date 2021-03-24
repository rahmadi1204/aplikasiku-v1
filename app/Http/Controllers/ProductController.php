<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('product', compact('products', 'categories'), ['menu' => 'menu-open', 'itemProduct' => 'active']);
    }
}
