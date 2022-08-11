<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SysStar;
use App\Models\Sysapply;

class ControlController extends BaseController
{
    public function index()
    {
        return view('control/backindex');
    }



    public function Test()
    {
        return view('Layout/backend_layout');
    }

    public function addsys() //資訊系統新增頁面
    {
        return view('control/addsys');
    }

    public function star() //繁星頁面
    {
        return view('control/star');
    }

    public function star_store() //繁星儲存資料
    {
        $model = new SysStar();

        $data = [
            'syscatagory_star' => $this->request->getVar('syscatagory_star'),
            'systitle_star' => $this->request->getVar('systitle_star'),
            'sysurl_star' => $this->request->getVar('sysurl_star'),
            'syscontent_star' => $this->request->getVar('syscontent_star'),
            'sysstart_star' => $this->request->getVar('sysstart_star'),
            'sysend_star' => $this->request->getVar('sysend_star')
        ];

        
        $YN = $model->save($data);
        return redirect()->to('ControlController/index');
    }

    public function apply() //申請頁面
    {
        return view('control/apply');
    } 
    public function apply_store() //申請儲存資料
    {
        $model = new Sysapply();

        $data = [
            'syscatagory_apply' => $this->request->getVar('syscatagory_apply'),
            'systitle_apply' => $this->request->getVar('systitle_apply'),
            'sysurl_apply' => $this->request->getVar('sysurl_apply'),
            'syscontent_apply' => $this->request->getVar('syscontent_apply'),
            'sysstart_apply' => $this->request->getVar('sysstart_apply'),
            'sysend_apply' => $this->request->getVar('sysend_apply')
        ];

        print_r($data);
        $YN = $model->save($data);
        return redirect()->to('ControlController/index');
    }

    public function sysbrowse() // 資訊系統瀏覽頁面
    {
        $model_star = new SysStar();
        $model_apply = new Sysapply();

        $data = [ //抓取繁星,申請資料
            's_posts' => $model_star->FindAll(),
            'a_posts' => $model_apply->FindAll()
        ];

        
        //print_r($apply);
        return view('control/sysbrowse', $data);
    }

    
}
