<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ControlController extends BaseController
{
    public function index()
    {
        return view('control/backindex');
    }

    public function addsys()
    {
        return view('control/addsys');
    }

    public function Test()
    {
        return view('Layout/backend_layout');
    }
}
