<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login/index');
    }
    public function login()
    {
        return view('login/login');
    }
    public function registration()
    {
        return view('login/registration');
    }
    
}
