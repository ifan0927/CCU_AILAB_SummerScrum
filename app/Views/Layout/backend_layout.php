<!DOCTYPE html>
<html lang="en">
<head>

    <title>甄選會後台</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
  <!--header -->
  
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
        
        </button>
            <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
            
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <a class="navbar-brand mx-auto" href="#">甄選會後台</a>
            <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">貼文建立</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">貼文修改</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">跑馬燈設定</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">帳號管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">作業資訊系統新增</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">作業資訊系統瀏覽</a>
            </li>
            </ul>   
            </div>
        </div>
    </nav>

    <!-- 這邊下面是動態內容 -->
    <?= $this->renderSection("content"); ?>

</body>
</html>