<?php
if(isset($_SESSION['user']) && $_SESSION['level']>=3){
?>
<DOCTYPE html>
<html>
<head>
<title>修改會員資料</title>
<link href="user.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
<table>
 <tr class="headbar">
   <td>歡迎<?php
            echo $_SESSION['user']; 
          ?>(<a href="logout.php" class="logout">登出</a>)
   </td>
   <td><a href="usercenter.php" class="headStr">個人資料</a></td>
   <td class="headNow"><a href="useradmin.php" class="headStr">會員管理</a></td>
   <td><a href="createacc.php" class="headStr">新增會員</a></td>
 </tr>
</table><br /><br />
<?php
}else{
  echo "非法登入!";
  exit();
 }
if(isset($_GET['u_acc'])){
  $u_acc=$_GET['u_acc'];
  $u_lv=$_GET['u_lv'];
  $u_mail=$_GET['u_mail'];
  $u_name=$_GET['u_name']; 
}else{
  $u_no="";
  $u_acc="";
  $u_lv="";
  $u_nick="";
  $u_avatar=""; 
}
if(isset($_POST['u_acc'])){
  $u_no=$_POST['u_no'];
  $u_acc=$_POST['u_acc'];
  $u_pw=md5($_POST['u_pw']);
  $u_lv=$_POST['u_lv'];
  $u_nick=$_POST['u_nick'];
  //$u_avatar=$_POST['u_avatar'];
  
} 
      
    
?>
<form action="/LoginController/change_info"  method="post"  enctype="multipart/form-data">
<table class="edituser">
  <tr>
    <td class="title">帳號</td>
    <td class="content">
       <input name="u_acc" type="text" value="<?php echo $u_mail;?>" />
    </td>
       <input name="u_no" type="hidden" value="<?php ?>" />
    </td>
  </tr>
  <tr>
    <td class="title">密碼</td>
    <td class="content">
      <input name="u_pw" type="password" value="*******" />
    </td>
  </tr>
  <tr>
    <td class="title">暱稱</td>
    <td class="content">
      <input name="u_name" type="text" value="<?php echo $u_name;?>" />
    </td>
  </tr>
  <tr>
    <td class="title">權限</td>
    <td class="content">
      <select name="u_lv">
        <option value="1" <?php echo ($u_lv==1)?"selected":"";; ?>>教師</option>
        <option value="2" <?php echo ($u_lv==2)?"selected":"";; ?>>貼文管理員</option>
        <option value="3" <?php echo ($u_lv==3)?"selected":"";; ?>>系統管理者</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:center;">
      <input name=""  type="submit" value="確認修改" />
    </td>
  </tr>
</table>
</form>
</body>
</html>