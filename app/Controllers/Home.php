<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use App\Models\Marquee;

class Home extends BaseController
{
    public function index()
    {
        return view('front/index');
    }

    public function star($page)
    {

        $db = db_connect();
        $query = $db->query('SELECT * FROM posts');

        $data = [
            'posts' => $query->getResult(),
            'count' => $query->getNumRows(),
            'page' => $page
        ];

        foreach ($data['posts'] as $item)
        {
            $expired = 0;
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/star', $data);
    }

    public function news($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ? ';
        $db = db_connect();
        $query = $db->query($sql,['簡章訊息']);

        $data = [
            'posts' => $query->getResult(),
            'count' =>$query->getNumRows(),
            'page' => $page
        ];

        foreach ($data['posts'] as $item)
        {
            $expired = 0;
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/star', $data);

    }

    public function admission($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ? ';
        $db = db_connect();
        $query = $db->query($sql,['招生事務']);

        $data = [
            'posts' => $query->getResult(),
            'count' =>$query->getNumRows(),
            'page' => $page
        ];

        foreach ($data['posts'] as $item)
        {
            $expired = 0;
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/star', $data);

    }

    public function audition($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ? ';
        $db = db_connect();
        $query = $db->query($sql,['徵選資訊']);

        $data = [
            'posts' => $query->getResult(),
            'count' =>$query->getNumRows(),
            'page' => $page
        ];

        foreach ($data['posts'] as $item)
        {
            $expired = 0;
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/star', $data);

    }

    public function meeting($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ? ';
        $db = db_connect();
        $query = $db->query($sql,['會議簡報']);

        $data = [
            'posts' => $query->getResult(),
            'count' =>$query->getNumRows(),
            'page' => $page
        ];

        foreach ($data['posts'] as $item)
        {
            $expired = 0;
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/star', $data);

    }

    public function other($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ? ';
        $db = db_connect();
        $query = $db->query($sql,['其他事項']);

        $data = [
            'posts' => $query->getResult(),
            'count' =>$query->getNumRows(),
            'page' => $page
        ];

        foreach ($data['posts'] as $item)
        {
            $expired = 0;
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/star', $data);

    }


    public function article($id)
    {
        $model = new Post();

        $data = [
            'posts' => $model->find($id) 
        ];

        return view('front/star_article', $data);
    }

    

}
