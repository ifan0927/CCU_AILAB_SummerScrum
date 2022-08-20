<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>
<div class="container" align="center" style="margin-top:100px;">
  <form role="form" action="/LoginController/store"  enctype="multipart/form-data" method="post">
    <div class="mb-3" style="width:600px" align="center">
      <h2>新增使用者</h2>
    </div>
    <div class="mb-3" style="width:600px" align="center">
      <label  class="form-label" >*Name</label>
      <input type="text" class="form-control" name="name" placeholder="輸入暱稱" required>
    </div>
    <div class="mb-3" style="width:600px" align="center">
      <label  class="form-label" >*登入帳號</label>
      <input type="text" class="form-control" name="username" placeholder="輸入帳號" required>
    </div>
    <div class="mb-3" style="width:600px" align="center">
      <label  class="form-label" >*E-mail</label>
      <input type="text" class="form-control" name="email" placeholder="輸入電子信箱" required>
    </div>
    <div class="mb-3" style="width:600px" align="center">
      <label  class="form-label" >*密碼</label>
      <input type="text" class="form-control" name="pwd" placeholder="輸入密碼" required>
    </div>
    <div class="mb-3" style="width:600px" align="center">
      <select class="form-select" name="level" aria-label=".form-select-lg example" required>
        <option selected>設定使用者權限</option>
        <option value="1">貼文系統管理員</option>
        <option value="2">作業資訊系統管理員系統</option>
        <option value="3">admin</option>
      </select>
    </div>
    <div class="mb-3 form-check"><!--備註-->
      <label class="form-check-label" for="exampleCheck1">*為必須輸入內容</label>
    </div>
    <div align="center">
      <button class="btn btn-primary" align="center">Submit</button>
    </div>
  </form>
</div>

<?=$this->endSection()?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>新增使用者</h2>
  <form role="form" action="/LoginController/store" method="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter your Name">
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pwd" placeholder="Enter password">
    </div>
    <select class="form-select form-select-lg mb-3" name="level" aria-label=".form-select-lg example">
      <option selected>設定使用者權限</option>
      <option value="1">貼文系統管理員</option>
      <option value="2">作業資訊系統管理員系統</option>
      <option value="3">admin</option>
    </select>

    <div class="back">
      <a href="/LoginController/user_control" class="btn btn-default">返回</a>
    </div>
    <button type="submit"  class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>

