<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class PostController extends BaseController
{
    public function newPost()
    {
        session_start();
        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 1 || $_SESSION['level'] == 3){
                return view('posts/newPost');
            }
            else
            {
                return view('errors/levelerror');
            }            
        }   
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
        return redirect()->to('ControlController/index');
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
    public function article_modify($post_id)
    {
        $model = new Post();

        $data = [
            'posts' => $model->find($post_id)
        ];

        return view('posts/article_modify',$data);
    }

}
