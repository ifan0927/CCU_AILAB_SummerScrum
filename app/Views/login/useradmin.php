<?php

$lvstr=array("無","教師","貼文管理者","系統管理員");

if(isset($_SESSION['user']) && $_SESSION['level']>=3){
   
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>使用者管理</title>

</head>
<body>
<table>
<tr class="headbar">
   <td>歡迎<?php
            echo $_SESSION['user'];
          ?>(<a href="logout.php" class="logout">登出</a>)</td>
   <td><a href="usercenter.php" class="headStr">個人資料</a></td>
   <td class="headNow"><a href="useradmin.php" class="headStr">會員管理</a></td>
   <td><a href="/LoginController/registration" class="headStr">新增會員</a></td>
</tr>
</table><br /><br />
<?php
}else{
   echo "請重新登入!";
   exit();
}

   $sql="SELECT * FROM USERS";
   $ro=mysqli_query($link,$sql);
   $row=mysqli_fetch_assoc($ro);
   
?>
<table class="userlist" >
<?php

do{
$editstr="u_no=".$row['u_no'].
        "&u_acc=".$row['u_acc'].
        "&u_nick=".$row['u_nick'].
        "&u_lv=".$row['u_lv'].
        "&u_avatar=".$row['u_avatar'];
?>
<tr>
   <td rowspan="4" class="headpic">
     <img src="pic/<?php echo $row['u_avatar']; ?>" width="200px" /></td>
   <td class="title">編號：<?php echo $row['u_no']; ?></td>
   <td rowspan="4" class="edit"><a href="editacc.php?<?php
                                                       echo $editstr; 
                                                     ?>">修改</a></td>
<tr>
   <td class="title">帳號：<?php echo $row['u_acc']; ?></td>
</tr>
<tr>
   <td class="title">暱稱：<?php echo $row['u_nick']; ?></td>
</tr>
<tr>
   <td class="title">身份：<?php echo $lvstr[$row['u_lv']]; ?></td>
</tr>
<?php
 }while($row=mysqli_fetch_assoc($ro));
?>
</table>
</body>
</html>