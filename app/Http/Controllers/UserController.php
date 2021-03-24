<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        //ddd($users);
        return view('admin', compact('users'), ['menu' => 'menu-open', 'itemAdmin' => 'active']);
    }
    public function store()
    {
        if ($cek = request()->validate(
            [
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            ]
        )) {
            $cek['role'] = 'admin';
            $cek['password'] =  bcrypt(request('password'));
            if (User::create($cek)) {
                    session()->flash("success", "User ".$cek['name']." Was Created");
                    return redirect('/admin');
            } else {
                    session()->flash("failed", "User ".$cek['name']." Was Not Created");
                    return redirect('/admin');
            }
        } else {
            session()->flash("failed", "User ".$cek['name']." Was Not Created");
                return redirect('/admin');
        }
    }
    public function update(User $user)
    {
        $request = request()->all();
        $UpdateUser = User::find($request['id']);
        $UpdateUser['name'] = $request['name'];
        $UpdateUser['username'] = $request['username'];
        $UpdateUser['email'] = $request['email'];
        if ($request['password'] != null) {
            $UpdateUser['password'] = bcrypt(request('password'));
        }
        $UpdateUser->save();
        session()->flash("success", "User ".$UpdateUser['name']." Was Updated");
        return redirect('/admin');
    }
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash("deleted", "User ".$user['name']." Was Deleted");
        return redirect('/admin');
    }
}
