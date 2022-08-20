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
        return view('control/backindex');
        
        
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
    public function editacc()
    {
        session_start();
        $model = new User();
        $sql = 'UPDATE USERS set MAIL = 29999 where ID=14';
        return view('login/editacc');
    }
    public function change_info()
    {
        session_start();
        $model = new User();
        $data = [
            'NAME' => $this ->request->getVar('u_lv'),
            'USERNAME' => $this ->request->getVar('u_name'),
            'MAIL' => $this ->request->getVar('u_acc'),
            'PASSWORD' => $this ->request->getVar('u_pw')

        ];
        $users = $model->save($data);
        return view('login/useradmin');
        
        
    }
    
}
