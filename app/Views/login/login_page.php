<?php

use CodeIgniter\Debug\Toolbar\Collectors\Views;
/*
session_start();
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  class MyDB extends SQLite3
  {
     function __construct()
     {
        $this->open('database.db');
     }
  }
  $db = new MyDB();
  if(!$db){
     echo $db->lastErrorMsg();
  } else {
     //echo "Opened database successfully\n";
  }
  //echo "<b> Select Data from USERS table :</b><hr/>";

  $sql =<<<EOF
    SELECT * from USERS;
  EOF;
  $ret = $db->query($sql);
  while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    $id=$row['ID'];
    $username=$row["USERNAME"];
    $password=$row['PASSWORD'];
    //echo "ID = ". $username . "<br/>\n";
    //echo "PASSWORD = ". $password ."<br/>\n";
    
  }

  if ($id!=""){
    if ($password==$_POST["pwd"]&&$username==$_POST["usr_name"]){
    $_SESSION["login"]=$username;
    echo "Login scucces!!!";    
    //header('Location:index.php');
    return view('login/index');
    
 }
 else{
  echo "Wrong Password!!!";
 }
 $db->close();
 }

}
/*
// Processing form data when form is submitted

     if ($_SERVER["REQUEST_METHOD"] == "POST"){
          class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('database.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql ='SELECT * from USERS where USERNAME="'.$_POST["usr_name"].'";';


   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      $id=$row['ID'];
      $username=$row["USERNAME"];
      $password=$row['PASSWORD'];
  }
    if ($id!=""){
        if ($password==$_POST["pwd"]){
           $_SESSION["login"]=$username;
           header('Location: index.php');    
        }else{
          
          echo "Wrong Password";
        }
      }else{
       echo "User not exist, please register to continue!";
      }
   //echo "Operation done successfully\n";
   $db->close();
     }
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
        function refresh_code(){ 
            document.getElementById("imgcode").src="captcha.php"; 
        } 
  </script>
</head>
<body>

<div class="container">
  <h2>登入系統</h2>
  <form role="form" method="post" action="/LoginController/login">
    <div class="form-group">
      <label for="usr_name">Username:</label>
      <input  name="usr_name" type="text" class="form-control" id="usr_name" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input name="pwd" type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <!--
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
      
    <form name="form1" method="post" action="./checkcode.php">
        <p>請輸入下圖字樣：</p><p><img id="imgcode" src="captcha.php" onclick="refresh_code()" /><br />
           點擊圖片可以更換驗證碼
        </p>
        <input type="text" name="checkword" size="10" maxlength="10" />
        <input type="submit" name="Submit" value="送出" />
    </form>
    -->
    <div>
      <label><a href="/LoginController/forgot_pw" class="btn btn-default">忘記密碼</a></label>
    </div>
      <button type="submit" class="btn btn-primary"> 登入 </button>
  </form>
</div>


</body>
</html>
