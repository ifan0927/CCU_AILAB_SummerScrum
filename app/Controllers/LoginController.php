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
                $password=$data_item['PASSWORD'];
                //echo"ID = ". $data_item['id'] . "<br/>\n";
                //echo"user_name = ". $username . "<br/>\n";
                //echo"password = ". $password . "<br/>\n";
                
             }
             if ($id!=""){
                if ($password==$_POST["pwd"]&&$username==$_POST["usr_name"]){
                   $_SESSION["login"]=$username;
                   echo "登入成功!!!!";
                   return view('posts/index');
                   //header('Location: index.php');    
                }else{
                  echo "Wrong Password";
                }
              }else{
               echo "User not exist, please register to continue!";
              }
           //echo "Operation done successfully\n";
             $model->close();
             
        /*
        $ret = $model->query($sql);
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
                $id=$row['ID'];
                $username=$row["USERNAME"];
                $password=$row['PASSWORD'];
                //echo "ID = ". $username . "<br/>\n";
                //echo "PASSWORD = ". $password ."<br/>\n";
    
             }
             */
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
        $model = new User();
        $data = [
            'NAME' => $this ->request->getVar('name'),
            'USERNAME' => $this ->request->getVar('username'),
            'MAIL' => $this ->request->getVar('email'),
            'PASSWORD' => $this ->request->getVar('pwd')

        ];
        $users = $model->save($data);
        echo "使用者創建成功";
        
    }
    
}
