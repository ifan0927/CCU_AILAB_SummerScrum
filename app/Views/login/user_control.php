<?php

$lvstr=array("無","教師","貼文管理者","系統管理員");

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
    <td class="headNow"><a href="usercenter.php" class="btn btn-default">個人資料</a></td>
<?php
  if($_SESSION['level']>=3){
?>
    <td><a href="/LoginController/useradmin" class="btn btn-default">使用者管理</a></td>
    <td><a href="/LoginController/registration" class="btn btn-default">新增使用者</a></td>
<?php
  }else{echo "<td></td><td></td>";}
?>
  </tr>
 </table><br /><br />
 <table class="userInfo">
  <tr>
    
  <tr>
    <td class="colTitle">帳號</td>
    <td class="colLeft"><?php echo $_SESSION['user']; ?></td>
  </tr>
  <tr>
    <td class="colTitle">密碼</td>
    <td class="colLeft">*******</td>
  </tr>
  <tr>
    <td class="colTitle">E-mail:</td>
    <td class="colLeft"><?php echo $_SESSION['email']; ?></td>
  </tr>
  <tr>
    <td class="colTitle">權限</td>
    <td class="colLeft"><?php echo $lvstr[$_SESSION['level']]; ?></td>
  </tr>
 </table>
</body>
</html>