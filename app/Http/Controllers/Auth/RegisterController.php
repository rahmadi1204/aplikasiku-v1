<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function store()
    {

        if ($cek = request()->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ])) {
            $cek['role'] = 'admin';
            $cek['password'] =  bcrypt(request('password'));
            if (User::create($cek)) {
                session()->flash("created", "User  Was Created");
                Auth::attempt(request()->only('username', 'password', 'role'));
                return redirect('/');
            } else {
                session()->flash("failed", "User Was Not Created");
                return redirect('/register');
            }
        } else {
            return session()->flash("failed", "Registrasi Gagal");
        }
    }
}
