<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>

<div class="container" align="center" style="margin-top:100px;"><!--主要容器-->
<form name="addsys_star" action="onclick()" enctype="multipart/form-data" method="post">
  
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
    <label for="exampleFormControlTextarea1" class="form-label">系統名稱描述</label>
    <textarea class="form-control" name="syscontent_star" rows="3" ></textarea>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--開始時間-->
    <label class="form-label">*開始時間</label>
    <input type="date" class="form-control" name="sysstart_star" id="start" required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--結束時間-->
    <label class="form-label">*結束時間</label>
    <input type="date" class="form-control" name="sysend_star" id="end "required>
  </div>
  
  <div class="mb-3 form-check"><!--備註-->
    <label class="form-check-label" for="exampleCheck1">*為必須輸入內容</label>
  </div>
  <div align="center">
    <button  class="btn btn-primary" align="center">Submit</button>
  </div>
</form>
</div>

<script>
    function onclick(){
    //var start = document.getElementById("start").value;
    //var end = document.getElementById("end").value;
      alert("test");
    }
</script>

<?=$this->endSection()?>


