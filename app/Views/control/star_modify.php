<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>
<div class="container" align="center" style="margin-top:100px;"><!--主要容器-->
<form name="addsys_star" action="/ControlController/storemodify_star/<?php if(!empty($posts)){echo''.$posts['id'].'';} ?>"  enctype="multipart/form-data" method="post" id="form">
  
  <div class="mb-3" align="center"> 
    *文章種類
    <select class="form-select" style="width:600px"  aria-label="Default select example" name='syscatagory_star' value='<?php if(!empty($posts)){echo''.$posts['syscatagory_star'].'';} ?>' required><!--種類選單-->
      <option <?php if($posts['syscatagory_star'] == 1){echo'selected="selected"';} ?> value="1">大學繁星</option>
      <option <?php if($posts['syscatagory_star'] == 2){echo'selected="selected"';} ?> value="2">高中繁星</option>
    </select>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--系統名稱-->
    <label  class="form-label" >*系統名稱</label>
    <input type="text" class="form-control" name="systitle_star" value='<?php if(!empty($posts)){echo''.$posts['systitle_star'].'';} ?>' required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--超連結-->
    <label  class="form-label">*系統超連結</label>
    <input type="text" class="form-control" name="sysurl_star" value='<?php if(!empty($posts)){echo''.$posts['sysurl_star'].'';} ?>' required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--描述-->
    <label  class="form-label">系統名稱描述</label>
    <textarea class="form-control" name="syscontent_star" rows="3"  style="resize: none;"><?php if(!empty($posts)){echo''.$posts['syscontent_star'].'';} ?></textarea>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--開始時間-->
    <label class="form-label">*開始時間</label>
    <input type="date" class="form-control" name="sysstart_star" id="start" value='<?php if(!empty($posts)){echo''.$posts['sysstart_star'].'';} ?>' required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--結束時間-->
    <label class="form-label">*結束時間</label>
    <input type="date" class="form-control" name="sysend_star" id="end" value='<?php if(!empty($posts)){echo''.$posts['sysend_star'].'';} ?>' required>
  </div>
  
  <div class="mb-3 form-check"><!--備註-->
    <label class="form-check-label" for="exampleCheck1">*為必須輸入內容</label>
  </div>
  <div align="center">
    <button type="button" value="submit" onclick="checkdate();" class="btn btn-primary" align="center">送出修改</button>
  </div>
</form>
<a href="/ControlController/delete_star/<?php if(!empty($posts)){echo''.$posts['id'].'';} ?>"><button  class="btn btn-primary" align="center" style="margin-top:5px">刪除此系統</button></a>
</div>

<script>

    function checkdate(){
      
      var start =new Date(document.getElementById("start").value);
      var end =new Date(document.getElementById("end").value);
      if (start >= end){
        alert("error");
        return false;
      }
      else{
        document.getElementById("form").submit(); 
      }
    
    }
</script>

<?=$this->endSection()?>