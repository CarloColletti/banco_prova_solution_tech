<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function home()
    {
        // $users = User::all();
        $users = User::all()->except(Auth::id());

        //blocca le azioni di te stesso

        return view('home', compact('users'));
    }
}
