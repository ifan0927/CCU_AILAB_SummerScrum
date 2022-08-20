<?php
use App\Models\User;

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
   <td><a href="/LoginController/user_control" class="headStr">個人資料</a></td>
   <td class="headNow"><a href="/LoginController/useradmin" class="headStr">使用者管理</a></td>
   <td><a href="/LoginController/registration" class="headStr">新增使用者</a></td>
</tr>
</table><br /><br />
<?php
}else{
   echo "請重新登入!";
   exit();
}

?>
<table class="userlist" >
<?php
$model = new User();
$data = $model->findAll();
foreach($data as $data_item){
   $id=$data_item['id'];
   $username=$data_item['USERNAME'];
   $name=$data_item['NAME'];
   $email=$data_item['MAIL'];
   $editstr="&u_acc=".$id.
            "&u_name=".$username.
            "&u_mail=".$email.
            "&u_lv=".$name;
        
?>
<tr>
   <td rowspan="5" class="edit"><a href="/LoginController/editacc?<?php echo $editstr;?>">修改</a></td>                                             
   <td rowspan="5" class="edit"><a href="/LoginController/editacc?">刪除</a></td>         
<tr>
   <td class="title">帳號：<?php echo $id; ?></td>
</tr>
<tr>
   <td class="title">名稱：<?php echo $username; ?></td>
</tr>
<tr>
   <td class="title">E-mail :<?php echo $email; ?></td>
</tr>
<tr>
   <td class="title">身份：<?php echo $lvstr[$name]; ?></td>
</tr>
<?php
 };
?>
</table>
</body>
</html>