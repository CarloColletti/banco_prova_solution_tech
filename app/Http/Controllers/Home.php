<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function home()
    {
        $users = User::all();

        return view('home', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
