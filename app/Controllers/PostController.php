<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

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
    public function store()
    {
        $model = new Post();

        $data = [
            'star_or_apply' => $this->request->getVar('star_or_apply'),
            'category' => $this->request->getVar('category'),
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
            'file' => $this->request->getVar('file'),
            'link' => $this->request->getVar('link'),
            'beginTime' => $this->request->getVar('beginTime'),
            'endTime' => $this->request->getVar('endTime')
        ];

        $YN = $model->save($data);

        return redirect('PostController');
    }
}
