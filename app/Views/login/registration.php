
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <div class="form-group">
    <label for="u_lv">LEVEL:</label>
      <select name="u_lv" class="form-select" aria-label="Default select example">
        <option value="1" <?php //echo ($u_lv==1)?"selected":"";; ?>>教師</option>
        <option value="2" <?php //echo ($u_lv==2)?"selected":"";; ?>>貼文管理員</option>
        <option value="3" <?php //echo ($u_lv==3)?"selected":"";; ?>>系統管理者</option>
      </select>
    </div>
    <div class="back">
      <a href="/LoginController/user_control" class="btn btn-default">返回</a>
    </div>
    <button type="submit"  class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>

