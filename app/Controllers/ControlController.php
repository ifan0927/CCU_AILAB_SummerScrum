<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SysStar;

class ControlController extends BaseController
{
    public function index()
    {
        return view('control/backindex');
    }

    public function addsys()
    {
        return view('control/addsys');
    }

    public function Test()
    {
        return view('Layout/backend_layout');
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

        echo $YN;

        return redirect()->to('ControlController/index');
    }

    public function apply() //申請頁面
    {
        return view('control/apply');
    } 
}
