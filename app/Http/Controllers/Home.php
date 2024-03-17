<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function home()
    {
        $users = User::all();

        return view('home', compact('users'));
    }
}