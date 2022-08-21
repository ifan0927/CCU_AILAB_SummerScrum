<?=$this->extend("Layout/backend_layout")?>

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
?>
<?=$this->endSection()?>