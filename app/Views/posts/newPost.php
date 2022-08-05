<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        -->
        <style>
            .dialog{
                position:fixed;top:100px;left:300px;width: 300px;
                border: 2px solid;
                background-color:gold;
                padding: 3px;
                display:none;
            }
            .dialog>.close{
                padding: 2px;
            }
        </style>
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
        </script>
    </head>
    <body>
        <h1>Hello, world!</h1>
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        -->
        <div>
            <form action="/PostController/store" enctype="mutipart/form-data" method="POST">
                <div>系統選擇:
                        <input type="radio" id="star_or_apply" name="star_or_apply" value="star"><label>繁星系統</lable>
                        <input type="radio" id="star_or_apply" name="star_or_apply" value="apply"><label>個申系統</lable><br>
                    文章種類***:
                    <select name="category">
                        <option value="1簡章訊息事項">簡章訊息事項</option>
                        <option value="招生事務">招生事務</option>
                        <option value="徵選資訊">徵選資訊</option>
                        <option value="會議簡報">會議簡報</option>
                        <option value="其他事項">其他事項</option>
                        </select><br>
                    標題:<input name="title"><br>
                    內容:<textarea name="content"></textarea><br>
                    選擇檔案:<input name="file" type="file"><br>
                    新增連結:<input name="link" type="url"><br>
                    上架時間:<input name="beginTime" type="date"><br>
                    下架時間:<input name="endTime" type="date"><br>
                </div>
            </form>
            <button onclick="showDialog();">發布</button>
            <div id="dialog" class="dialog">
                確定發布?<br>
                <button onclick="closeDialog();" class="close">再修改一下</button>
                <!--<button style="submit">確定送出</button>-->
                <button type="submit" class="btn btn-info">確定送出</button>
            </div>
            <a href="index.php"><button class="btn btn-info">返回</button></a>
        </div>
    </body>
</html>