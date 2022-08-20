<?=$this->extend("Layout/backend_layout")?>

<<<<<<< HEAD
if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    $level=$_SESSION["level"];
    $email=$_SESSION['email'];
  }else{
    echo "請重新登入";
     //停止進行後面的程式動作
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>使用者中心</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
 <table>
  <tr class="headbar">
    <td>歡迎 <?php echo $user; ?><a href="/LoginController/logout" class="btn btn-default">登出</a></td>
    <td class="headNow"><a href="/LoginController/user_control" class="btn btn-default">個人資料</a></td>
<?php
  $lvstr=array("無","教師","貼文管理者","系統管理員");
  if($_SESSION['level']>=3){
=======
<?=$this->section("content")?>
<div class="container" style="margin-top:100px;">
  <ul class="list-group">
    <li class="list-group-item">帳號: <?php echo $_SESSION["user"]; ?></li>
    <li class="list-group-item">密碼: *******</li>
    <li class="list-group-item">E-mail: <?php echo $_SESSION["email"]; ?></li>
    <li class="list-group-item">權限: <?php 
    if($_SESSION['level'] == 3)
      {
        echo "admin";
      } 
    else if($_SESSION['level'] == 2)
      {
        echo "作業資訊系統管理員";
      } 
    else if($_SESSION['level'] == 1)
      {
        echo "貼文系統管理員";
      }
    ?></li>
  </ul>
</div>
<?php
if ($_SESSION['level'] == 3){
  echo'
  <div class="container" style="margin-top:1px;">
    <div class="row" ><!--row裡面包兩個 -->
        <div class="container" style="margin-top:50px;"  align="center">
            <a href="/LoginController/useradmin"><button type="button" class="btn btn-primary " align="center">使用者管理</button></a>
            <a href="/LoginController/registration"><button type="button" class="btn btn-primary " align="center">新增使用者</button></a>
        </div>
    </div>
  </div>
  ';
  }
>>>>>>> ca7124ca44b2b5188b21c95b1306f9bbd01bf3b5
?>
<?=$this->endSection()?>