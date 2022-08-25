<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/article_modify.css">
</head>
<body>
    <h1>貼文修改</h1>
    <form action="/PostController/store_modify/<?php if(!empty($posts)){echo''.$posts['id'].'';} ?>"  enctype="multipart/form-data" method="POST" id="form">
        <div>*系統選擇:
            <div required>
                <input type="radio" id="star_or_apply" name="star_or_apply" value="1" <?php if($posts['star_or_apply'] == 1){echo'checked="true"';} ?> >繁星系統</lable>
                <input type="radio" id="star_or_apply" name="star_or_apply" value="2" <?php if($posts['star_or_apply'] == 2){echo'checked="true"';} ?>>個申系統</lable><br>
            </div>
            *文章種類:
            <select name="category" required>
            <option <?php if($posts['category'] === "簡章訊息事項"){echo'selected="selected"';} ?> value="簡章訊息事項">簡章訊息事項</option>
            <option <?php if($posts['category'] === "招生事務"){echo'selected="selected"';} ?> value="招生事務">招生事務</option>
            <option <?php if($posts['category'] == "徵選資訊"){echo'selected="selected"';} ?> value="徵選資訊">徵選資訊</option>
            <option <?php if($posts['category'] == "會議簡報"){echo'selected="selected"';} ?> value="會議簡報">會議簡報</option>
            <option <?php if($posts['category'] == "其他事項"){echo'selected="selected"';} ?> value="其他事項">其他事項</option>
            </select><br>
                    *標題:<input name="title" style="width: 300px;" required value='<?php if(!empty($posts)){echo''.$posts['title'].'';} ?>'><br>
                    *內容:<textarea id="content" name="content" ><?php if(!empty($posts)){echo''.$posts['content'].'';} ?></textarea><br>
                    選擇檔案:<input name="file" type="file"><?php if(!empty($posts)){echo''.$posts['file'].'';} ?><br>
                    新增連結:<input name="link" type="url" style="width: 300px;" value='<?php if(!empty($posts)){echo''.$posts['link'].'';} ?>'><br>
                    *上架時間:<input name="beginTime" id="beginTime" type="date" required value='<?php if(!empty($posts)){echo''.$posts['beginTime'].'';} ?>'><br>
                    *下架時間:<input name="endTime" id="endTime"type="date" required value='<?php if(!empty($posts)){echo''.$posts['endTime'].'';} ?>'><br>
                </div>
                <!--<button type="submit" class="btn btn-info">確定送出</button>-->
            
            <button type="button" onclick="showDialog();">送出修改</button>
            <div id="dialog" class="dialog">
                確定送出?<br>
                <button type="button" onclick="closeDialog();" class="close">再考慮一下</button>
                <button type="button" value="submit" class="btn btn-info" onclick="checkdate();">送出修改</button>
            </div>
            <a href="/PostController/article_list"><button type="button" class="btn btn-info">返回</button></a>
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