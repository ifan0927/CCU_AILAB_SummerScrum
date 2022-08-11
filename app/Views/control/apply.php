<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>

<div class="container" align="center" style="margin-top:100px;"><!--主要容器-->
<form name="addsys_apply" action="/ControlController/apply_store"  enctype="multipart/form-data" method="post" id="form">
  
  <div class="mb-3" align="center"> 
    *文章種類
    <select class="form-select" style="width:600px"  aria-label="Default select example" name='syscatagory_apply' required><!--種類選單-->
      <option selected value="1">大學申請</option>
      <option value="2">高中申請</option>
    </select>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--系統名稱-->
    <label  class="form-label" >*系統名稱</label>
    <input type="text" class="form-control" name="systitle_apply" required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--超連結-->
    <label  class="form-label">*系統超連結</label>
    <input type="text" class="form-control" name="sysurl_apply" required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--描述-->
    <label  class="form-label">系統名稱描述</label>
    <textarea class="form-control" name="syscontent_apply" rows="3" style="resize: none;"></textarea>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--開始時間-->
    <label class="form-label">*開始時間</label>
    <input type="date" class="form-control" name="sysstart_apply" id="start" value="<?php echo date('Y-m-d'); ?>" required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--結束時間-->
    <label class="form-label">*結束時間</label>
    <input type="date" class="form-control" name="sysend_apply" id="end" required>
  </div>
  
  <div class="mb-3 form-check"><!--備註-->
    <label class="form-check-label" for="exampleCheck1">*為必須輸入內容</label>
  </div>
  <div align="center">
    <button type="button" value="submit" onclick="checkdate();" class="btn btn-primary" align="center">Submit</button>
  </div>
</form>
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
