<<<<<<< HEAD
<?php
use App\Models\User;
=======
<?=$this->extend("Layout/backend_layout")?>
>>>>>>> ca7124ca44b2b5188b21c95b1306f9bbd01bf3b5

<?=$this->section("content")?>

<div class="container" style="padding-top:75px;"><!--主要容器-->
   <table class="table">
         <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">暱稱</th>
            <th scope="col">帳號</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
         </tr>
         </thead>
         <tbody>
            <?php
               if(!empty($user)){
                  $rowcount = 1;
                  foreach($user as $user_item){
                        echo '
                           <tr>
                           <th scope"row">'.$rowcount.'</th>
                           <td>'.$user_item['NAME'].'</td>
                           <td>'.$user_item['USERNAME'].'</td>
                           <td>'.$user_item['MAIL'].'</td>
                           <td><a class="btn btn-primary" href="#" role="button">修改</a></td>
                           <tr>
                        ';
                        $rowcount ++;                 
                  }
               }
            ?>
         </tbody>
      </table>
</div>

<?=$this->endSection()?>

<<<<<<< HEAD
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
=======


>>>>>>> ca7124ca44b2b5188b21c95b1306f9bbd01bf3b5
