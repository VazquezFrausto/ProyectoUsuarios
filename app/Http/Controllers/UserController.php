<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        // dd($users);

        // 1. Enviar a la vista
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return back();
    }
}
