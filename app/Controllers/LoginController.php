<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
class LoginController extends BaseController
{
    public function login_page()
    {   
        $model = new User();
        $data=[
            'users' =>$model->findAll()
        ];
        return view('login/login_page',$data);
    }
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            session_start();
            $model = new User();
            $data = $model->findAll();
            if(!$model){
                echo $model->lastErrorMsg();
             } else {
                //echo "Opened database successfully<br/>\n";
             }
             
            foreach($data as $data_item){
                $id=$data_item['id'];
                $username=$data_item['USERNAME'];
                $name=$data_item['NAME'];
                $password=$data_item['PASSWORD'];
                $email=$data_item['MAIL'];
                $level=$data_item['Level'];
                //echo"user = ". $data_item['USERNAME'] . "<br/>\n";
                //echo"pwd = ". $data_item['PASSWORD'] . "<br/>\n";
                //echo"password = ". $password . "<br/>\n";
                if ($id!=""){
                    if ($password==$_POST["pwd"]&&$username==$_POST["usr_name"]){
                        $user_info=[
                            $_SESSION["user"]=$username,
                            $_SESSION["level"]=$level,
                            $_SESSION["email"]=$email
                        ];
                       //echo "登入成功!!!!";
                       return redirect()->to('LoginController/user_control');                        

                    }
                  }
            }
            return view('errors/loginerror');

             
           //echo "Operation done successfully\n";
             $model->close();
             
        
        }
    }
    public function registration()
    { 
        session_start();
        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 3){
                return view('login/registration');
            }
            else
            {
                return view('errors/levelerror');
            }            
        }   
    }
    public function forgot_pw()
    {
        return view('login/forgot_pw');
    }
    public function store()
    {
        session_start();
        
        $model = new User();
        $data = [
            'NAME' => $this ->request->getVar('name'),
            'USERNAME' => $this ->request->getVar('username'),
            'MAIL' => $this ->request->getVar('email'),
            'PASSWORD' => $this ->request->getVar('pwd'),
            'Level' => $this ->request->getVar('level'),
        ];
        $users = $model->save($data);
        return view('login/user_control');
        
        
    }
    public function user_control()
    {
        session_start();

        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else{
            return view('login/user_control');
        }
    }
    public function useradmin()
    {
        session_start();
        
        $model = new User();

        $data = [
            'user' => $model->FindALL()
        ];
        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 3){
                return view('login/useradmin',$data);
            }
            else
            {
                return view('errors/levelerror');
            }            
        }  
    }
    public function logout()
    {
        session_start();
        $_SESSION['user']=NULL;
        $_SESSION['level']=NULL;
        $_SESSION['email']=NULL;
        unset($_SESSION['user']);
        unset($_SESSION['level']);
        unset($_SESSION['email']);
        return view('login/login_page');
    }
    public function editacc($post_id)
    {
        session_start();
        
        $model = new User();

        $data = [
            'user' => $model->find($post_id)
        ];
        if(!isset($_SESSION['user']))
        {
            return redirect()->to('LoginController/login_page');
        }
        else
        {
            if ($_SESSION['level'] == 3){
                return view('login/editacc',$data);
            }
            else
            {
                return view('errors/levelerror');
            }            
        }  
    }
    public function change_info($post_id)
    {
        session_start();
        $model = new User();
        $data = [
            'id' => $post_id,
            'NAME' => $this ->request->getVar('name'),
            'USERNAME' => $this ->request->getVar('username'),
            'MAIL' => $this ->request->getVar('email'),
            'PASSWORD' => $this ->request->getVar('pwd'),
            'Level' => $this ->request->getVar('level')

        ];
        $users = $model->save($data);
        return redirect()->to('LoginController/useradmin');
        
        
    }
    public function userdelete($post_id) //刪除使用者
    {  
        $model = new User();
        
        $YN = $model->delete($post_id);
        
        return redirect()->to('LoginController/useradmin');
    }

    public function captcha() 
    {  
        session_start();
        if(!isset($_SESSION)){ session_start(); } //檢查SESSION是否啟動
        $_SESSION['check_word'] = ''; //設置存放檢查碼的SESSION
        //設置定義為圖片
        header("Content-type: image/PNG");
        $nums=5; //生成驗證碼個數
        $width=$nums*10;  //圖片寬
        $high=20;  //圖片高  
        //去除了數字0和1 字母小寫O和L，為了避免辨識不清楚
        $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMOPQRSTUBWXYZ";
        $code = '';
        for ($i = 0; $i < $nums; $i++) {
        $code .= $str[mt_rand(0, strlen($str)-1)];
        }
        //等待驗證用的驗證碼
        $_SESSION['check_word'] = $code;
        //建立圖示，設置寬度及高度
        $image = imagecreate($width, $high);
        //$image=imagecreatefrompng("images/bg.png"); //或是自行準備底圖
        //設置圖像的顏色
        $black = imagecolorallocate($image, 0, 0, 0);  //黑色底色
        $white = imagecolorallocate($image, 255, 255, 255);  //白色文字
        //建立矩形底框(可省略)
        imagerectangle($image, 0, 0, $width-1, $high-1, $black);   
        //imagestring (圖像資源,指定字型(1，2，3，4 ，5)，x坐標點,y坐標點,寫入的字串,文字顏色) 
        imagestring($image, 5, 3, 3, $code, $white);
        imagepng($image);
        imagedestroy($image);  //少這行畫面會全黑
    }

    
}
