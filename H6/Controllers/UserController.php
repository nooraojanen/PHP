<?php

namespace App\Http\Controllers;

use App\User;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function list_all()
    {
        $users = User::All();
        return view('users')->with('users', $users);
    }

}