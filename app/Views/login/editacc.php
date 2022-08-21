
<?=$this->extend("Layout/backend_layout")?>
<?=$this->section("content")?>
<div class="container" align="center" style="margin-top:100px;">
  <form role="form" action="/LoginController/change_info/<?php if(!empty($user)){echo''.$user['id'].'';} ?>"  enctype="multipart/form-data" method="post">
    <div class="mb-3" style="width:600px" align="center">
      <h2>使用者資料管理</h2>
    </div>
    <div class="mb-3" style="width:600px" align="center">
      <label  class="form-label" >*Name</label>
      <input type="text" class="form-control" name="name" placeholder="輸入暱稱" value='<?php if(!empty($user)){echo''.$user['NAME'].'';} ?>' required>
    </div>
    <div class="mb-3" style="width:600px" align="center">
      <label  class="form-label" >*登入帳號</label>
      <input type="text" class="form-control" name="username" placeholder="輸入帳號" value='<?php if(!empty($user)){echo''.$user['USERNAME'].'';} ?>' required>
    </div>
    <div class="mb-3" style="width:600px" align="center">
      <label  class="form-label" >*E-mail</label>
      <input type="text" class="form-control" name="email" placeholder="輸入電子信箱" value='<?php if(!empty($user)){echo''.$user['MAIL'].'';} ?>' required>
    </div>
    <div class="mb-3" style="width:600px" align="center">
      <label  class="form-label" >*密碼</label>
      <input type="text" class="form-control" name="pwd" placeholder="輸入密碼" value='<?php if(!empty($user)){echo''.$user['PASSWORD'].'';} ?>' required>
    </div>
    <div class="mb-3" style="width:600px" align="center">
      <select class="form-select" name="level" aria-label=".form-select-lg example"  required>
        <option value = '<?php if(!empty($user)){echo''.$user['Level'].'';} ?>'><?php 
         $lvstr=array("無","貼文系統管理員","作業資訊系統管理員","admin");
         if(!empty($user)){echo''.$lvstr[$user['Level']].'';} ?></option>
        <option value="1">貼文系統管理員</option>
        <option value="2">作業資訊系統管理員系統</option>
        <option value="3">admin</option>
      </select>
    </div>
    <div class="mb-3 form-check"><!--備註-->
      <label class="form-check-label" for="exampleCheck1">*為必須輸入內容</label>
    </div>
    <div align="center">
      <button class="btn btn-outline-secondary" herf="login/useradmin"align="center">返回</button>
      <button class="btn btn-primary" align="center">Submit</button>
    </div>
  </form>
</div>


<?=$this->endSection()?>
