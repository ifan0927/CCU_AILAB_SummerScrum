<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
    public function index()
    {
        return view('posts/index');
    }
    public function newPost()
    {
        return view('posts/newPost');
    }
}
