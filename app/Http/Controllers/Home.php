<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function home()
    {
        $users = User::all();

        // dd($users);

        return view('home', compact('users'));
    }
}
