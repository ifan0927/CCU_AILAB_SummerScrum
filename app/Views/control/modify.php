<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>
<div class="container" align="center" style="margin-top:100px;"><!--主要容器-->
<form name="addsys_star" action="/ControlController/storemodify/<?php echo''.$catagory.''; ?>/<?php echo''.$posts['id'].''; ?>"  enctype="multipart/form-data" method="post" id="form">
  
  <div class="mb-3" align="center"> 
    *文章種類
    <select class="form-select" style="width:600px"  aria-label="Default select example" name='catagory'<?php if($posts['file'] != NULL){echo 'disabled';} ?>><!--種類選單-->
      <option <?php if($catagory == 1){echo'selected="selected"';}  ?> value="1">大學繁星</option>
      <option <?php if($catagory == 2){echo'selected="selected"';} ?> value="2">高中繁星</option>
      <option <?php if($catagory == 3){echo'selected="selected"';} ?> value="3">大學申請</option>
      <option <?php if($catagory == 4){echo'selected="selected"';} ?> value="4">高中申請</option>
    </select>
  </div>
  <div class="mb-3" style="width:600px; margin-top:5px" id="cblock"><!--禁用文章種類-->
    <div class="alert alert-info" role="alert">
    此系統已上傳檔案，若要更改文章種類請刪除此系統後新增新的資訊系統
    </div>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--系統名稱-->
    <label  class="form-label" >*系統名稱</label>
    <input type="text" class="form-control" name="title" id="title" value='<?php echo''.$posts['title'].''; ?>' required>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="radios" id="radio1" value="radio1" <?php if($posts['url'] == ""){echo 'disabled';}  if($posts['file'] == NULL){echo 'checked';} ?>>
    <label class="form-check-label" for="inlineRadio1" >附加超連結</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="radios" id="radio2" value="radio2" <?php if($posts['url'] == ""){echo 'checked';}  if($posts['file'] == NULL){echo 'disabled';} ?>>
    <label class="form-check-label" for="inlineRadio2">附加檔案</label>
  </div>
  <div class="mb-3" style="width:600px; margin-top:5px" id="ublock"><!--超連結-->
    <label  class="form-label">*系統超連結</label>
    <input type="text" class="form-control" name="url" id="url" value='<?php echo''.$posts['url'].''; ?>'>
  </div>
  <div class="mb-3" style="width:600px; margin-top:5px" id="fblock"><!--上傳檔案-->
    <div class="alert alert-info" role="alert">
    此系統已上傳檔案，若要更新檔案請刪除此系統後新增新的資訊系統
    </div>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--描述-->
    <label  class="form-label">系統名稱描述</label>
    <textarea class="form-control" name="content" id="content" rows="3"  style="resize: none;"><?php echo''.$posts['content'].''; ?></textarea>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--開始時間-->
    <label class="form-label">*開始時間</label>
    <input type="date" class="form-control" name="start" id="start" value='<?php echo''.$posts['start'].''; ?>' required>
  </div>
  <div class="mb-3" style="width:600px" align="center"><!--結束時間-->
    <label class="form-label">*結束時間</label>
    <input type="date" class="form-control" name="end" id="end" value='<?php echo''.$posts['end'].''; ?>' required>
  </div>
  
  <div class="mb-3 form-check"><!--備註-->
    <label class="form-check-label" for="exampleCheck1">*為必須輸入內容</label>
  </div>
  <div align="center">
  <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"  class="btn btn-primary" align="center">送出修改</button>
  </div>
</form>
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
      var radios =  document.getElementsByName("radios");
      
      if (radios[0].checked){
        if((!url)) {
          alert( "附加超連結未填入!" );
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
    var cblock =  document.getElementById("cblock");
    fblock.style.display = 'none';
    ublock.style.display = 'none';
    cblock.style.display = 'none';

    if (radios[0].checked){
      ublock.style.display = 'block';
    }
    if (radios[1].checked){
      fblock.style.display = 'block';
      cblock.style.display = 'block';
    }

    
</script>


<?=$this->endSection()?>