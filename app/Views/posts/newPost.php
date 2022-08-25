<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>

<div class="container" align="center" style="margin-top:100px;"><!--主要容器-->
    <form id="form" action="/PostController/store" enctype="mutipart/form-data" method="POST">
        <div class="mb-3" style="width:600px" align="center">
            <select class="form-select" aria-label="Default select example" id="star_or_apply" name="star_or_apply" required>
                <option selected>選擇貼文系統</option>
                <option  name="star_or_apply" value="1">繁星系統</option>
                <option  name="star_or_apply" value="2">個申系統</option>
            </select>
        </div>
        <div class="mb-3" style="width:600px" align="center">
            <select class="form-select" aria-label="Default select example" name="category" required>
                <option selected>選擇文章總類</option>
                <option value="簡章訊息事項">簡章訊息事項</option>
                <option value="招生事務">招生事務</option>
                <option value="徵選資訊">徵選資訊</option>
                <option value="會議簡報">會議簡報</option>
                <option value="其他事項">其他事項</option>
            </select>
        </div>
        <div class="mb-3" style="width:600px" align="center">
            <label  class="form-label" >*標題</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3" style="width:600px" align="center">
            <div>
            <label  class="form-label" >*內容</label>
            <textarea id="content"  name="content" required></textarea>
            </div>
        </div>
        <div class="mb-3" style="width:600px" align="center">
            <label  class="form-label">新增連結</label>
            <input type="url" class="form-control" name="link" >
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
    
    ClassicEditor
    .create( document.querySelector( '#content' ) )
    .catch( error => {
        console.error( error );
    } );

    function checkdate(){
        var start =new Date(document.getElementById("beginTime").value);
        var end =new Date(document.getElementById("endTime").value);
        if (start >= end){
        alert("開始日期不可以晚於結束日期");
        dialog.style.display="none";
        return false;
        }
        else{
        document.getElementById("form").submit(); 
        }
        
    }
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
    var $modalElement = this.$element;
    $(document).on('focusin.modal', function (e) {
        var $parent = $(e.target.parentNode);
        if ($modalElement[0] !== e.target && !$modalElement.has(e.target).length
            // add whatever conditions you need here:
            &&
            !$parent.hasClass('cke_dialog_ui_input_select') && !$parent.hasClass('cke_dialog_ui_input_text')) {
            $modalElement.focus()
        }
    })
};
    CKEDITOR.replace('content');
</script>


<?=$this->endSection()?>