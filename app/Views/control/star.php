<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>

<div class="container" align="center" style="margin-top:100px;"><!--主要容器-->
<form name="addsys_star" action="/ControlController/star_store"  enctype="multipart/form-data" method="post" id="form">
  
  <div class="mb-3" align="center"> 
    *文章種類
    <select class="form-select" style="width:600px"  aria-label="Default select example" name='syscatagory_star' required><!--種類選單-->
      <option selected value="1">大學繁星</option>
      <option value="2">高中繁星</option>
    </select>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--系統名稱-->
    <label  class="form-label" >*系統名稱</label>
    <input type="text" class="form-control" name="systitle_star" required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--超連結-->
    <label  class="form-label">*系統超連結</label>
    <input type="text" class="form-control" name="sysurl_star" required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--描述-->
    <label  class="form-label">系統名稱描述</label>
    <textarea class="form-control" name="syscontent_star" rows="3" style="resize: none;"></textarea>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--開始時間-->
    <label class="form-label">*開始時間</label>
    <input type="date" class="form-control" name="sysstart_star" id="start" value="<?php echo date('Y-m-d'); ?>" required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--結束時間-->
    <label class="form-label">*結束時間</label>
    <input type="date" class="form-control" name="sysend_star" id="end" required>
  </div>
  
  <div class="mb-3 form-check"><!--備註-->
    <label class="form-check-label" for="exampleCheck1">*為必須輸入內容</label>
  </div>
  <div align="center">
    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" align="center">Submit</button>
  </div>
</form>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">確定送出</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            送出前請檢查內容是否錯誤
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
            <button type="button" class="btn btn-primary" onclick="checkdate();">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</div>

<script>

    function checkdate(){
      
      var start =new Date(document.getElementById("start").value);
      var end =new Date(document.getElementById("end").value);
      if (start >= end){
        alert("開始時間不得晚於或等於結束時間");
        return false;
      }
      else{
        document.getElementById("form").submit(); 
      }
    
    }
</script>



<?=$this->endSection()?>


