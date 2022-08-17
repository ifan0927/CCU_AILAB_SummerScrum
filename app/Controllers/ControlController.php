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



    public function test()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sys_star');
        $data = $builder->get();
        
        print_r($data);
        //return view('Layout/backend_layout');
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
        return redirect()->to('ControlController/addsys');
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


        $YN = $model->save($data);
        return redirect()->to('ControlController/addsys');
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

    public function sysmodify_star($post_id) //繁星系統修改頁面
    {  
        $model = new SysStar();

        $data = [
            'posts' => $model->find($post_id)
        ];
        
        //print_r($data);
        return view('control/star_modify', $data);

    }

    public function storemodify_star($post_id) //儲存繁星修改資料
    {  
        $model = new SysStar();

        $data = [
            'id' => $post_id,
            'syscatagory_star' => $this->request->getVar('syscatagory_star'),
            'systitle_star' => $this->request->getVar('systitle_star'),
            'sysurl_star' => $this->request->getVar('sysurl_star'),
            'syscontent_star' => $this->request->getVar('syscontent_star'),
            'sysstart_star' => $this->request->getVar('sysstart_star'),
            'sysend_star' => $this->request->getVar('sysend_star')
        ];

        $YN = $model->save($data);
        
        return redirect()->to('ControlController/addsys');
    }

    public function delete_star($post_id) //刪除繁星修改資料
    {  
        $model = new SysStar();
        
        $YN = $model->delete($post_id);
        
        return redirect()->to('ControlController/addsys');
    }

    public function sysmodify_apply($post_id) //申請系統修改頁面
    {  
        $model = new Sysapply();

        $data = [
            'posts' => $model->find($post_id)
        ];
        
        //print_r($data);
        return view('control/apply_modify', $data);

    }

    public function storemodify_apply($post_id) //儲存申請修改資料
    {  
        $model = new Sysapply();

        $data = [
            'id' => $post_id,
            'syscatagory_apply' => $this->request->getVar('syscatagory_apply'),
            'systitle_apply' => $this->request->getVar('systitle_apply'),
            'sysurl_apply' => $this->request->getVar('sysurl_apply'),
            'syscontent_apply' => $this->request->getVar('syscontent_apply'),
            'sysstart_apply' => $this->request->getVar('sysstart_apply'),
            'sysend_apply' => $this->request->getVar('sysend_apply')
        ];

        $YN = $model->save($data);
        
        return redirect()->to('ControlController/addsys');
    }

    public function delete_apply($post_id) //刪除儲存修改資料
    {  
        $model = new Sysapply();
        
        $YN = $model->delete($post_id);
        
        return redirect()->to('ControlController/addsys');
    }
    
}
