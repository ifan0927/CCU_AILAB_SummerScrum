<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>

<div class="container" align="center" style="margin-top:100px;"><!--主要容器-->
<form name="form" action="/ControlController/store"  enctype="multipart/form-data" method="post" id="form">
  
  <div class="mb-3" align="center"> 
    *文章種類
    <select class="form-select" style="width:600px"  aria-label="Default select example" name='catagory' ><!--種類選單-->
      <option selected value="3">大學申請</option>
      <option value="4">高中申請</option>
    </select>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--系統名稱-->
    <label  class="form-label" >*系統名稱</label>
    <input type="text" class="form-control" name="title" id="title" value="">
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="radios" id="radio1" value="radio1" checked>
    <label class="form-check-label" for="inlineRadio1">附加超連結</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="radios" id="radio2" value="radio2">
    <label class="form-check-label" for="inlineRadio2">附加檔案</label>
  </div>
  <div class="mb-3" style="width:600px; margin-top:5px" id="ublock"><!--超連結-->
    <label  class="form-label">*系統超連結</label>
    <input type="text" class="form-control" name="url" id="url">
  </div>
  <div class="mb-3" style="width:600px; margin-top:5px" id="fblock"><!--上傳檔案-->
    <label for="formFile" class="form-label">*上傳檔案</label>
    <input class="form-control" type="file" name="file" id="file">
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--描述-->
    <label  class="form-label">系統名稱描述</label>
    <textarea class="form-control" name="content" rows="3" style="resize: none;" id="content" ></textarea>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--開始時間-->
    <label class="form-label">*開始時間</label>
    <input type="date" class="form-control" name="start" id="start" value="<?php echo date('Y-m-d'); ?>" >
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--結束時間-->
    <label class="form-label">*結束時間</label>
    <input type="date" class="form-control" name="end" id="end" >
  </div>
  
  <div class="mb-3 form-check"><!--備註-->
    <label class="form-check-label" for="exampleCheck1">*為必須輸入內容</label>
  </div>
  <div align="center">
    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"  class="btn btn-primary" align="center">Submit</button>
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
</div>

<script>

    function checkrequired(){
      
      var title = document.getElementById("title").value;
      var content = document.getElementById("content").value;  
      var url = document.getElementById("url").value;
      var file = document.getElementById("file").value; 
      var radios =  document.getElementsByName("radios");
      
      if (radios[0].checked){
        if((!url)) {
          alert( "附加超連結未填入!" );
          return false;
         }
      }
      else if (radios[1].checked){
        if((!file)) {
          alert( "檔案未上傳!" );
          return false;
         }
      }
      
      if((!title)) {
          alert( "系統名稱未填入!" );
          return false;
         }

    
      if((!content)) {
        alert( "系統名稱描述未填入!" );
        return false;
      }

      return true;
    }

    function checkdate(){
      
      var start =new Date(document.getElementById("start").value);
      var end =new Date(document.getElementById("end").value);
      var end1 = document.getElementById("end").value;
      
      if (start >= end || (!end1)){
        alert("開始時間不得晚於或等於結束時間");
        return false;
      }
      else{
        if(checkrequired() == true){
          document.getElementById("form").submit();
        }
      } 
    }

    

    var radios =  document.getElementsByName("radios");
    var ublock =  document.getElementById("ublock");
    var fblock =  document.getElementById("fblock");
    fblock.style.display = 'none';

    for(var i = 0; i < radios.length; i++) {
      radios[i].onclick = function() {
        var val = this.value;
        if(val == 'radio1'){ 
            ublock.style.display = 'block';   // show
            fblock.style.display = 'none';// hide
        }
        else if(val == 'radio2'){
            fblock.style.display = 'block';
            ublock.style.display = 'none';
        }    

      }
    }
</script>



<?=$this->endSection()?>
