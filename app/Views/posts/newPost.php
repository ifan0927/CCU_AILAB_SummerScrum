<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>

<div class="container" align="center" style="margin-top:100px;"><!--主要容器-->
    <form  action="/PostController/store"  enctype="multipart/form-data" method="post" id="form">
        <div class="mb-3" style="width:600px" align="center">
            <select class="form-select" aria-label="Default select example" id="star_or_apply" name="star_or_apply" required>
                <option  name="star_or_apply" value="1" selected>繁星系統</option>
                <option  name="star_or_apply" value="2">個申系統</option>
            </select>
        </div>
        <div class="mb-3" style="width:600px" align="center">
            <select class="form-select" aria-label="Default select example" name="category" required>
                <option value="簡章訊息" selected>簡章訊息事項</option>
                <option value="招生事務">招生事務</option>
                <option value="徵選資訊">徵選資訊</option>
                <option value="會議簡報">會議簡報</option>
                <option value="其他事項">其他事項</option>
            </select>
        </div>
        <div class="mb-3" style="width:600px" align="center">
            <label  class="form-label" >*標題</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="mb-3" style="width:600px" align="center">
            <div>
            <label  class="form-label" >*內容</label>
            <textarea name="content" id="content" required></textarea>
            </div>
        </div>
        <div class="mb-3" style="width:600px" align="center" id="ublock">
            <label  class="form-label">新增連結</label>
            <input type="url" class="form-control" name="link" id="url">
        </div>
        <div class="mb-3" style="width:600px; margin-top:5px" id="fblock"><!--上傳檔案-->
            <label for="formFile" class="form-label">上傳檔案</label>
            <input class="form-control" type="file" name="file" id="file">
        </div>
        <div class="mb-3" style="width:600px" align="center">
            <label class="form-label">*上架時間</label>
            <input type="date" class="form-control" name="beginTime" id="beginTime" value="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div class="mb-3" style="width:600px" align="center">
            <label class="form-label">*下架時間</label>
            <input type="date" class="form-control" name="endTime" id="endTime"  required>
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="exampleCheck1">*為必須輸入內容</label>
        </div>
        <div align="center">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"  class="btn btn-primary" align="center">發布</button>
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
    var dialog;
    window.onload=function(){
        dialog=document.getElementById("dialog");
    };
    function showDialog(){
        dialog.style.display="block";
    }
    function closeDialog(){
        dialog.style.display="none";
    }
    
    window.addEventListener("load", (e)=>{
    ClassicEditor.create( document.querySelector( '#content' ) )
    .then( Neditor => {
        editor = Neditor;
    } )
    .catch( error => {
        console.error( error );
    } );
    });

    function checkdate(){
        var start =new Date(document.getElementById("beginTime").value);
        var end =new Date(document.getElementById("endTime").value);
        if (start >= end){
        alert("開始日期不可以晚於結束日期");
        dialog.style.display="none";
        return false;
        }
        else{
            if(checkrequired() == true){
                document.getElementById("form").submit();
                
            }
        }
        
    }

    function checkrequired(){
      
      var title = document.getElementById("title").value;
      var content = editor.getData();
      var url = document.getElementById("url").value;
      var file = document.getElementById("file").value; 
      var radios =  document.getElementsByName("radios");
    
      
      if((!title)) {
          alert( "標題未填入!" );
          return false;
         }

    
      if((!content)) {
        alert( "內容未填入!" );
        return false;
      }

      return true;
    }

    



    
</script>


<?=$this->endSection()?>