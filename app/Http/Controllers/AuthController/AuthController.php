<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
}
