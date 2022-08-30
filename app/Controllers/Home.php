<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use App\Models\Hstar;
use App\Models\Happly;
use App\Models\Ustar;
use App\Models\Uapply;
use App\Models\Marquee;

class Home extends BaseController
{
    public function index()
    {
        return view('front/index');
    }

    public function star($page)
    {
        $model = new Marquee();
        $db = db_connect();
        $sql = 'SELECT * FROM posts WHERE star_or_apply = ?';
        $query = $db->query($sql,[1]);

        $data = [
            'posts' => $query->getResult(),
            'count' => $query->getNumRows(),
            'page' => $page,
            'marquee' => $model->find(1)
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

        //print_r($data);
        return view('front/star', $data);
    }

    public function news($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ? AND star_or_apply = ?';
        $db = db_connect();
        $query = $db->query($sql,['簡章訊息',1]);

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
        $sql = 'SELECT * FROM posts WHERE category = ?  AND star_or_apply = ?';
        $db = db_connect();
        $query = $db->query($sql,['招生事務',1]);

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
        $sql = 'SELECT * FROM posts WHERE category = ?  AND star_or_apply = ?';
        $db = db_connect();
        $query = $db->query($sql,['徵選資訊',1]);

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
        $sql = 'SELECT * FROM posts WHERE category = ?  AND star_or_apply = ?';
        $db = db_connect();
        $query = $db->query($sql,['會議簡報',1]);

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
        $sql = 'SELECT * FROM posts WHERE category = ?  AND star_or_apply = ?';
        $db = db_connect();
        $query = $db->query($sql,['其他事項',1]);

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

    public function highschool($page)
    {
        $hstar = new Hstar();

        $db = db_connect();
        $query = $db->query('SELECT * FROM hstar');

        $data = [ //抓取繁星,申請資料
            'hstar' => $hstar->FindAll(),
            'count' => $query->getNumRows(),
            'page' => $page
        ];

        //print_r($data);
        return view('front/hstar', $data);
    }

    public function university($page)
    {
        $hstar = new Ustar();

        $db = db_connect();
        $query = $db->query('SELECT * FROM ustar');

        $data = [ //抓取繁星,申請資料
            'ustar' => $hstar->FindAll(),
            'count' => $query->getNumRows(),
            'page' => $page
        ];

        //print_r($data);
        return view('front/ustar', $data);
    }

    public function apply($page)
    {
        $model = new Marquee();
        $db = db_connect();
        $sql = 'SELECT * FROM posts WHERE star_or_apply = ?';
        $query = $db->query($sql,[2]);

        $data = [
            'posts' => $query->getResult(),
            'count' => $query->getNumRows(),
            'page' => $page,
            'marquee' => $model->find(2)
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

        
        return view('front/apply', $data);
    }

    public function a_news($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ? AND star_or_apply = ?';
        $db = db_connect();
        $query = $db->query($sql,['簡章訊息',2]);

        $data = [
            'posts' => $query->getResult(),
            'count' =>$query->getNumRows(),
            'page' => $page
        ];

        $expired = 0;
        foreach ($data['posts'] as $item)
        {
            
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/apply', $data);

    }

    public function a_admission($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ?  AND star_or_apply = ?';
        $db = db_connect();
        $query = $db->query($sql,['招生事務',2]);

        $data = [
            'posts' => $query->getResult(),
            'count' =>$query->getNumRows(),
            'page' => $page
        ];

        $expired = 0;
        foreach ($data['posts'] as $item)
        {
           
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/apply', $data);

    }

    public function a_audition($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ?  AND star_or_apply = ?';
        $db = db_connect();
        $query = $db->query($sql,['徵選資訊',2]);

        $data = [
            'posts' => $query->getResult(),
            'count' =>$query->getNumRows(),
            'page' => $page
        ];

        $expired = 0;
        foreach ($data['posts'] as $item)
        {
            
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/apply', $data);

    }

    public function a_meeting($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ?  AND star_or_apply = ?';
        $db = db_connect();
        $query = $db->query($sql,['會議簡報',2]);

        $data = [
            'posts' => $query->getResult(),
            'count' =>$query->getNumRows(),
            'page' => $page
        ];

        $expired = 0;
        foreach ($data['posts'] as $item)
        {
            
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/apply', $data);

    }

    public function a_other($page)
    {
        $sql = 'SELECT * FROM posts WHERE category = ?  AND star_or_apply = ?';
        $db = db_connect();
        $query = $db->query($sql,['其他事項',2]);

        $data = [
            'posts' => $query->getResult(),
            'count' =>$query->getNumRows(),
            'page' => $page
        ];

        $expired = 0;
        foreach ($data['posts'] as $item)
        {
            
            if (date($item->endTime) < date('Y-m-d'))
            {
                $expired ++;
            } 
        }
        $data['count'] = $data['count'] - $expired;

        
        return view('front/apply', $data);

    }


    public function a_article($id)
    {
        $model = new Post();

        $data = [
            'posts' => $model->find($id) 
        ];

        return view('front/apply_article', $data);
    }

    public function highschool_a($page)
    {
        $happly = new Happly();

        $db = db_connect();
        $query = $db->query('SELECT * FROM happly');

        $data = [ //抓取申請資料
            'happly' => $happly->FindAll(),
            'count' => $query->getNumRows(),
            'page' => $page
        ];

        //print_r($data);
        return view('front/happly', $data);
    }

    public function university_a($page)
    {
        $uapply = new Uapply();

        $db = db_connect();
        $query = $db->query('SELECT * FROM uapply');

        $data = [ //抓取繁星,申請資料
            'ustar' => $uapply->FindAll(),
            'count' => $query->getNumRows(),
            'page' => $page
        ];

        //print_r($data);
        return view('front/uapply', $data);
    }
}
