<?php

use CodeIgniter\Debug\Toolbar\Collectors\Views;



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
  <h2>登入後台頁面</h2>
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
