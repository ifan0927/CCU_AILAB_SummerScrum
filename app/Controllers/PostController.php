<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use App\Models\Marquee;

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
            'link' => $this->request->getVar('link'),
            'beginTime' => $this->request->getVar('beginTime'),
            'endTime' => $this->request->getVar('endTime')
        ];

        $file = $this->request->getFile('file');
        $newName = $file->getName();

        switch($data['star_or_apply']){
            case 1:
                if ($file->isValid()){
                    $file->move(ROOTPATH . 'public/post_file/star', $newName);
                    $newName = $file->getName();
                    $path = array('file' =>   $newName);
                    $data = $data + $path;
                }
                $YN = $model->save($data);
                break;
            case 2:
                if ($file->isValid()){
                    $file->move(ROOTPATH . 'public/post_file/apply', $newName);
                    $newName = $file->getName();
                    $path = array('file' =>   $newName);
                    $data = $data + $path;
                }
                $YN = $model->save($data);
                break;
        };
        
        //return view('posts/article_list');
        return redirect()->to('ControlController/backindex');
        //print_r($data);
    }
    //顯示繁星系統文章列表
    public function starlist($page)
    {
        session_start();
        $model = new Post();

        $sql = 'SELECT * FROM posts WHERE star_or_apply = ? ';
        $db = db_connect();
        $query = $db->query($sql,[1]);

        $data = [
            'posts' => $query->getResult(),
            'count' => $query->getNumRows(),
            'page' => $page
        ];
    
        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            //print_r($data);
            return view('posts/starlist', $data);
        }
    }

    //顯示申請系統文章列表
    public function applylist($page)
    {
        session_start();
        $model = new Post();

        $sql = 'SELECT * FROM posts WHERE star_or_apply = ? ';
        $db = db_connect();
        $query = $db->query($sql,[2]);

        $data = [
            'posts' => $query->getResult(),
            'count' => $query->getNumRows(),
            'page' => $page
        ];
    
        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            //print_r($data);
            return view('posts/applylist', $data);
        }
    }

    public function modify($id)
    {
        session_start();
        $model = new Post();

        $data = [
            'posts' => $model->find($id)
        ];

        if ($data['posts']['file'] == NULL)
        {
            $filecheck = array('filecheck' => 0);
        }
        else
        {
            $filecheck = array('filecheck' => 1);
        }

        $data = $data + $filecheck;

        //print_r($data);
        return view('posts/modify',$data);

    }

    public function store_modify($id)
    {
        session_start();
        $model = new Post();

        $file = $this->request->getFile('file');
        $check =  $this->request->getVar('check');
        $newName = $file->getName();

        $data = [
            'id' => $id,
            'star_or_apply' => $this->request->getVar('star_or_apply'),
            'category' => $this->request->getVar('category'),
            'title' => $this->request->getVar('title'),
            'content' => $this->request->getVar('content'),
            'link' => $this->request->getVar('link'),
            'beginTime' => $this->request->getVar('beginTime'),
            'endTime' => $this->request->getVar('endTime'),
        ];

        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 1 || $_SESSION['level'] == 3)
            {
                if($check == True)
                {
                    $YN = $model->save($data);
                    return redirect()->to('PostController/starlist/1');
                }
                
                else
                {
                    switch($data['star_or_apply']){
                        case 1:
                            if ($file->isValid()){
                                $file->move(ROOTPATH . 'public/post_file/star', $newName);
                                $newName = $file->getName();
                                $path = array('file' =>   $newName);
                                $data = $data + $path;
                            }
                            $YN = $model->save($data);
                            
                            break;
                        case 2:
                            if ($file->isValid()){
                                $file->move(ROOTPATH . 'public/post_file/apply', $newName);
                                $newName = $file->getName();
                                $path = array('file' =>   $newName);
                                $data = $data + $path;
                            }
                            $YN = $model->save($data);
                            break;
                    };

                    return redirect()->to('PostController/starlist/1');
                }
                
            }
            else
            {
                return view('errors/levelerror');
            }

        }
        

        

    }

    public function delete($id)
    {
        session_start();
        $model = new Post();

        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 1 || $_SESSION['level'] == 3)
            {
                $data = $model->find($id);
                switch ($data['star_or_apply']){
                    case 1:
                        if ($data['file'] != NULL){
                            $path = ROOTPATH.'./public/post_file/star/'. $data['file'];
                            unlink($path);
                        }
                        $YN = $model->delete($id);
                        break;
                    case 2:
                        if ($data['file'] != NULL){
                            $path = ROOTPATH.'./public/post_file/apply/'. $data['file'];
                            unlink($path);
                        }
                        $YN = $model->delete($id);
                        break;
                }
                return redirect()->to('PostController/starlist/1');
            }
            else
            {
                return view('errors/levelerror');
            }
        }



        return redirect()->to('PostController/article_list');
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
        $model = new Marquee();
        $id = 1;
        $data =  $model->find($id);
 

       //print_r($data);
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
    public function storemodify($post_id)
    {
        $model = new Post();

        $data = [
            'id' => $post_id,
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
        //print_r($data);
        return redirect()->to('PostController/article_list');
    }
    public function marquee_test()
    {
        $model = new Marquee();
        $id = 1;

        $data = [
            'id' => $id,
            'marquee' => $this->request->getVar('marquee')
        ];

        //print_r($data);
        $YN = $model->save($data);

        return redirect()->to('PostController/marquee');
    }
    public function article_delete($post_id)
    {
        $model = new Post();

        $YN = $model->delete($post_id);

        return redirect()->to('PostController/article_list');
    }
}
