<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store()
    {
        if ($cek = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            Auth::attempt(request()->only('username', 'password', 'role'));
            return redirect('/');
        }   session()->flash("deleted", "Username / Password Salah");
            return redirect('/admin');
    }
}
