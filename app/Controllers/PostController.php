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

        //return view('posts/article_list');
        return redirect()->to('Postcontroller/article_list');
        //print_r($data);
    }
    public function article_list()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        return view('posts/article_list',$data);
    }
    public function onlystar()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];

        //print_r($data);
        return view('posts/onlystar',$data);
    }
    public function onlyapply()
    {
        $model = new Post();

        $data = [
            'posts' => $model->findAll()
        ];
        return view('posts/onlyapply',$data);
    }
    public function marquee()
    {
        $data = [
            'posts' => "測試用的"
        ];
        return view('posts/marquee',$data);
    }

}
