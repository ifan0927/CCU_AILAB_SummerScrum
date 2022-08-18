<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        -->
        <link rel="stylesheet" href="/css/newPost.css">
        <script src="ckeditor/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    </head>
    <body>
        <h1>貼文建立!</h1>
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        -->
        <div>
            <form id="form" action="/PostController/store" enctype="mutipart/form-data" method="POST">
                <div>*系統選擇:
                        <div required>
                            <input type="radio" id="star_or_apply" name="star_or_apply" value="1"><label>繁星系統</lable>
                            <input type="radio" id="star_or_apply" name="star_or_apply" value="2"><label>個申系統</lable><br>
                        </div>
                        *文章種類:
                        <select name="category" required>
                        <option value="簡章訊息事項">簡章訊息事項</option>
                        <option value="招生事務">招生事務</option>
                        <option value="徵選資訊">徵選資訊</option>
                        <option value="會議簡報">會議簡報</option>
                        <option value="其他事項">其他事項</option>
                        </select><br>
                    *標題:<input name="title" style="width: 300px;" required><br>
                    *內容:<textarea id="content" name="content"></textarea>
                    選擇檔案:<input name="file" type="file"><br>
                    新增連結:<input name="link" type="url" style="width: 300px;"><br>
                    *上架時間:<input name="beginTime" id="beginTime" type="date" required><br>
                    *下架時間:<input name="endTime" id="endTime"type="date" required><br>
                </div>
                <!--<button type="submit" class="btn btn-info">確定送出</button>-->
            
            <button type="button" onclick="showDialog();">發布</button>
            <div id="dialog" class="dialog">
                確定發布?<br>
                <button type="button" onclick="closeDialog();" class="close">再修改一下</button>
                <button type="button" value="submit" class="btn btn-info" onclick="checkdate();">確定送出</button>
            </div>
            <a href="/PostController/index.php"><button type="button" class="btn btn-info">返回</button></a>
        </div>
        </form>
    </body>
</html>
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
</script>