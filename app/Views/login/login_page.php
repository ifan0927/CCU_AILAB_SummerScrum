
<!DOCTYPE html>
<html lang="en">
<head>
  <title>甄選會後台</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    function refresh_code(){ 
        document.getElementById("imgcode").src="/LoginController/captcha"; 
    } 
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container" style="margin-top:100px; width:500px">
  <div class="card border-dark mb-3" style="max-width: 30rem;">
    <div class="card-header">登入後台頁面</div>
    <div class="card-body text-dark">
    <form role="form" method="post" action="/LoginController/login">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username:</label>
        <input type="text" class="form-control" id="usr_name" name="usr_name" placeholder="Enter Username">
        
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
      </div>
      <div class="captcha">    
        <p>驗證碼：<input type="text" name="checkword" size="10" maxlength="10"/> <img src="/LoginController/captcha" id="imgcode" onclick="refresh_code()"  title="看不清，點選換一張" align="absmiddle" /></p>
      </div>
      <div id="emailHelp" class="form-text">帳號相關請聯繫系統管理員</div>
      <button type="submit" class="btn btn-primary">登入</button>
    </form>
    </div>
  </div>
</div>


</body>
</html>
