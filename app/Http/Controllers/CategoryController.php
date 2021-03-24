<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function store()
    {
        $cek = request()->validate([
            'name' => 'required|unique:categories',
        ]);
        if (Category::create($cek)) {
                session()->flash("success", "Category ".$cek['name']." Was Created");
                return redirect('/product');
        } else {
                session()->flash("failed", "Category ".$cek['name']." Was Not Created");
                return redirect('/product');
        }
    }
}
