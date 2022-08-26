<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('front/index');
    }

    public function star()
    {
        return view('front/star');
    }

}
