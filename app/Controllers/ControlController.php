<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Hstar;
use App\Models\Happly;
use App\Models\Ustar;
use App\Models\Uapply;
use App\Models\User;

class ControlController extends BaseController
{
    
    public function backindex()
    {
        session_start();
        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else{
            return view('control/backindex');
        }   
    }

    public function index()
    {
        return view('front/index');
    }
    
    public function addsys() //資訊系統新增頁面
    {
        session_start();
        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 2 || $_SESSION['level'] == 3){
                return view('control/addsys');
            }
            else
            {
                return view('errors/levelerror');
            }            
        }   
    }

    public function star() //繁星頁面
    {
        session_start();
        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 2 || $_SESSION['level'] == 3){
                return view('control/star');
            }
            else
            {
                return view('errors/levelerror');
            }            
        }   

    }

    public function store() //儲存新作業資訊系統
    {
        $ustar = new Ustar();
        $hstar = new Hstar();
        $uapply = new Uapply();
        $happly = new Happly();

        $file = $this->request->getFile('file');
        $newName = $file->getName();
        
        
        $data = [
            'title' => $this->request->getVar('title'),
            'url' => $this->request->getVar('url'),
            'content' => $this->request->getVar('content'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end')
        ];


        //種類-> 1.大學繁星 2.高中繁星 3:大學申請 4.高中申請
        $catagory = $this->request->getVaR('catagory');

        switch ($catagory){
            case 1:
                if ($file->isValid()){
                    $file->move(ROOTPATH . 'public/sysupload/ustar', $newName);
                    $newName = $file->getName();
                    $path = array('file' =>   $newName);
                    $data = $data + $path;
                }
                $YN = $ustar->save($data);
                break;
            case 2:
                if ($file->isValid()){
                    $file->move(ROOTPATH . 'public/sysupload/hstar', $newName);
                    $newName = $file->getName();
                    $path = array('file' =>   $newName);
                    $data = $data + $path;
                }
                $YN = $hstar->save($data);
                break;
            case 3:
                if ($file->isValid()){
                    $file->move(ROOTPATH . 'public/sysupload/uapply', $newName);
                    $newName = $file->getName();
                    $path = array('file' =>   $newName);
                    $data = $data + $path;
                }
                $YN = $uapply->save($data);
                break;
            case 4:
                if ($file->isValid()){
                    $file->move(ROOTPATH . 'public/sysupload/happly', $newName);
                    $newName = $file->getName();
                    $path = array('file' =>  $newName);
                    $data = $data + $path;
                }            
                $YN = $happly->save($data);
                break;        
            };
        
        return redirect()->to('ControlController/addsys');
        
    }

    public function apply() //申請頁面
    {
        session_start();
        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 2 || $_SESSION['level'] == 3){
                return view('control/apply');
            }
            else
            {
                return view('errors/levelerror');
            }            
        }   
    } 

    public function modify($catagory = 0 , $id = 0) //顯示修改頁面
    {   
        session_start();
        $ustar = new Ustar();
        $hstar = new Hstar();
        $uapply = new Uapply();
        $happly = new Happly(); 
        switch ($catagory){
            case 1:
                $data = [
                    'catagory' => $catagory,
                    'posts' => $ustar->find($id)
                ];
                break;
            case 2:
                $data = [
                    'catagory' => $catagory,
                    'posts' => $hstar->find($id)
                ];
                break;
            case 3:
                $data = [
                    'catagory' => $catagory,
                    'posts' => $uapply->find($id)
                ];
                break;
            case 4:
                $data = [
                    'catagory' => $catagory,
                    'posts' => $happly->find($id)
                ];
                break;        
            };
        

        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 2 || $_SESSION['level'] == 3){
                return view('control/modify', $data);
            }
            else
            {
                return view('errors/levelerror');
            }            
        }
    }

    public function storemodify($o_catagory = 0 , $id = 0) //儲存修改內容 
    {  
        session_start();
        
        $ustar = new Ustar();
        $hstar = new Hstar();
        $uapply = new Uapply();
        $happly = new Happly(); 

        $catagory = $this->request->getVar('catagory');

        $data = [
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'url' => $this->request->getVar('url'),
            'content' => $this->request->getVar('content'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end')
        ];

        $o_data = [
            'title' => $this->request->getVar('title'),
            'url' => $this->request->getVar('url'),
            'content' => $this->request->getVar('content'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end')
        ];

        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 2 || $_SESSION['level'] == 3){
                switch ($o_catagory){
                    case 1:
                        switch($catagory){
                            case 1:
                                $YN = $ustar->save($data);
                                break;
                            case 2:
                                $YN = $hstar->save($o_data);
                                $DN = $ustar->delete($id);
                                break;
                            case 3:
                                $YN = $uapply->save($o_data);
                                $DN = $ustar->delete($id);
                                break;
                            case 4:
                                $YN = $happly->save($o_data);
                                $DN = $ustar->delete($id);
                                break; 
                        }
                        break;
                    case 2:
                        switch($catagory){
                            case 1:
                                $YN = $ustar->save($o_data);
                                $DN = $hstar->delete($id);
                                break;
                            case 2:
                                $YN = $hstar->save($data);                       
                                break;
                            case 3:
                                $YN = $uapply->save($o_data);
                                $DN = $hstar->delete($id);
                                break;
                            case 4:
                                $YN = $happly->save($o_data);
                                $DN = $hstar->delete($id);
                                break; 
                        }
                        break;
                    case 3:
                        switch($catagory){
                            case 1:
                                $YN = $ustar->save($o_data);
                                $DN = $uapply->delete($id);
                                break;
                            case 2:
                                $YN = $hstar->save($o_data);
                                $DN = $uapply->delete($id);                       
                                break;
                            case 3:
                                $YN = $uapply->save($data);
                                break;
                            case 4:
                                $YN = $happly->save($o_data);
                                $DN = $uapply->delete($id);
                                break; 
                        }
                        break;
                    case 4:
                        switch($catagory){
                            case 1:
                                $YN = $ustar->save($o_data);
                                $DN = $happly->delete($id);
                                break;
                            case 2:
                                $YN = $hstar->save($o_data);
                                $DN = $happly->delete($id);                       
                                break;
                            case 3:
                                $YN = $uapply->save($o_data);
                                $DN = $happly->delete($id);
                                break;
                            case 4:
                                $YN = $happly->save($data);
                                break; 
                        }
                        break;     
                    };
                
                
                return redirect()->to('ControlController/ustarbrowse/1');
            }
            else
            {
                return view('errors/levelerror');
            }            
        } 

        
    }


    public function delete($catagory = 0 , $id = 0) //刪除資訊系統
    {  
        session_start();
        $ustar = new Ustar();
        $hstar = new Hstar();
        $uapply = new Uapply();
        $happly = new Happly(); 

        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 2 || $_SESSION['level'] == 3){
                switch ($catagory){
                    case 1:
                        $data = $ustar->find($id);
                        if ($data['file'] != NULL){
                            $path = ROOTPATH.'./public/sysupload/ustar/'. $data['file'];
                            unlink($path);
                        }
                        $YN = $ustar->delete($id);
                        break;
                    case 2:
                        $data = $hstar->find($id);
                        if ($data['file'] != NULL){
                            $path = ROOTPATH.'./public/sysupload/hstar/'. $data['file'];
                            unlink($path);
                        }
                        $YN = $hstar->delete($id);
                        break;
                    case 3:
                        $data = $uapply->find($id);
                        if ($data['file'] != NULL){
                            $path = ROOTPATH.'./public/sysupload/uapply/'. $data['file'];
                            unlink($path);
                        }
                        $YN = $uapply->delete($id);
                        break;
                    case 4:
                        $data = $happly->find($id);
                        if ($data['file'] != NULL){
                            $path = ROOTPATH.'./public/sysupload/happly/'. $data['file'];
                            unlink($path);
                        }
                        $YN = $happly->delete($id);
                        break;        
                    };
                return redirect()->to('ControlController/ustarbrowse/1');
            }
            else
            {
                return view('errors/levelerror');
            }            
        }    
    }

    public function ustarbrowse($page) // 大學繁星資訊系統瀏覽頁面
    {
        session_start();
        $ustar = new Ustar();

        $db = db_connect();
        $query = $db->query('SELECT * FROM ustar');

        $data = [ //抓取繁星資料
            'ustar' => $ustar->FindAll(),
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
            return view('control/ustarbrowse', $data);
        }
    }

    public function hstarbrowse($page) // 高中繁星資訊系統瀏覽頁面
    {
        session_start();
        $hstar = new Hstar();


        $db = db_connect();
        $query = $db->query('SELECT * FROM hstar');

        $data = [ //抓取繁星,申請資料
            'hstar' => $hstar->FindAll(),
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
            return view('control/hstarbrowse', $data);
        }
    }

    public function uapplybrowse($page) // 大學申請資訊系統瀏覽頁面
    {
        session_start();
        $uapply = new Uapply();

        $db = db_connect();
        $query = $db->query('SELECT * FROM uapply');

        $data = [ //抓取繁星,申請資料
            'uapply' => $uapply->FindAll(),
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
            return view('control/uapplybrowse', $data);
        }
    }

    public function happlybrowse($page) // 高中申請資訊系統瀏覽頁面
    {
        session_start();
        $happly = new Happly();

        $db = db_connect();
        $query = $db->query('SELECT * FROM happly');

        $data = [ //抓取繁星,申請資料
            'happly' => $happly->FindAll(),
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
            return view('control/happlybrowse', $data);
        }
    }

    
}
