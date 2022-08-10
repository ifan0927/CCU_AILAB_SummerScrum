<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class LoginController extends BaseController
{
    public function index()
    {   
        return view('login/index');
    }
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
                //echo"ID = ". $data_item['id'] . "<br/>\n";
                //echo"user_name = ". $username . "<br/>\n";
                //echo"password = ". $password . "<br/>\n";
                if ($id!=""){
                    if ($password==$_POST["pwd"]&&$username==$_POST["usr_name"]){
                        $user_info=[
                            $_SESSION["user"]=$username,
                            $_SESSION["level"]=$name,
                            $_SESSION["email"]=$email
                        ];
                       //echo "登入成功!!!!";
                       return view('login/user_control',$user_info);
                       
                       
                           
                    }
                    else{
                        //return view('login/login_page');
                    }
                  }else{
                   echo "User not exist, please register to continue!";
                  }
                  
            }
             
             
           //echo "Operation done successfully\n";
             $model->close();
             
        
        }
    }
    public function registration()
    {
        
        return view('login/registration');
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
            'PASSWORD' => $this ->request->getVar('pwd')

        ];
        $users = $model->save($data);
        return view('login/user_control');
        
        
    }
    public function user_control()
    {
        session_start();
        return view('login/user_control');
    }
    public function useradmin()
    {
        session_start();
        return view('login/useradmin');
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
        return view('login/index');
    }
    
}
