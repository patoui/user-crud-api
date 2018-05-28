<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a list of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users', User::get());
    }
}
