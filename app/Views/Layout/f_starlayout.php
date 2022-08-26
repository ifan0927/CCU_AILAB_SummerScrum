<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>甄選會網站</title>
</head>
<body>
<div class="container-fleuid ps-0 pe-0">
  <div class="bg-dark p-4"  align="center">
    <h5 class="text-black h4" ><img src="/front/index/logo.png"></h5>
    <span class="text-white" >111 繁星推薦 大學之位為你預留</span>
  </div>
</div>  
<ul class="nav bg-dark justify-content-center">
  <li class="nav-item">
    <a class="nav-link text-white" aria-current="page" href="#">校系分則查詢</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#">網路購買簡章</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#">聽障生免英聽檢定</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#">錄取(篩選)結果查詢</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#">網路聲明放棄</a>
  </li>
</ul>
<div class="container-fleuid  ps-0 pe-0">
  <div class="row" style="height:645px;" >
    <div class="col-2 bg-secondary ps-3 pt-5" align="center">
        <ul class="nav flex-column">
            <li class="nav-item dropend">
                <a class="nav-link text-white " data-bs-toggle="dropdown" aria-current="page" href="#">訊息公告</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/Home/news/1">簡章訊息事項</a></li>
                  <li><a class="dropdown-item" href="/Home/admission/1">招生試務</a></li>
                  <li><a class="dropdown-item" href="/Home/audition/1">甄選資訊</a></li>
                  <li><a class="dropdown-item" href="/Home/meeting/1">會議簡報</a></li>
                  <li><a class="dropdown-item" href="/Home/other/1">其他事項</a></li>
                </ul>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-white"  href="#">法令規章</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">重要時程</a>
            </li>
            <li class="nav-item dropend">
                <a class="nav-link text-white" data-bs-toggle="dropdown" href="#">簡章發售</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">發售辦法</a></li>
                  <li><a class="dropdown-item" href="#">網路購買簡章</a></li>
                </ul>
            </li>
            <li class="nav-item dropend">
                <a class="nav-link text-white" data-bs-toggle="dropdown" href="#">簡章公告</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">簡章總則</a></li>
                  <li><a class="dropdown-item" href="#">簡章附錄</a></li>
                  <li><a class="dropdown-item" href="#">校系分則查詢</a></li>
                  <li><a class="dropdown-item" href="#">其他事項</a></li>
                  <li><a class="dropdown-item" href="#">簡章修正事項</a></li>
                  <li><a class="dropdown-item" href="#">111參採科目簡表</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">統計資料</a>
            </li>
            <li class="nav-item dropend">
                <a class="nav-link text-white" data-bs-toggle="dropdown" href="#">下載專區</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">資料表件下載</a></li>
                  <li><a class="dropdown-item" href="#">其他事項下載</a></li>
                </ul>
            </li>
            <li class="nav-item dropend">
                <a class="nav-link text-white" data-bs-toggle="dropdown" href="#">相關網站</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">招生單位</a></li>
                  <li><a class="dropdown-item" href="#">考試單位</a></li>
                  <li><a class="dropdown-item" href="#">其他網站</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">歷年資料</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-white"  href="#">高中作業資訊系統</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">大學作業資訊系統</a>
            </li>
        </ul>
    </div>
    <div class="col-10">
      <?= $this->renderSection("content"); ?>
    </div>
  </div>
</div>
<div class="container-fleuid ps-0 pe-0">
  <div class="bg-dark p-4"  align="center">
    <u class="text-white " >服務時間：平日(周一至周五)：上午8:00~12:00；下午13:00~17:00。例假日及國定假日暫停服務。</u><br>
    <span class="text-white " >621301嘉義縣民雄鄉大學路一段168號 (05)2721799</span><br>
    <span class="text-white " >Copyright by CAC. All rights reserved.</span>
  </div>
</div>
</body>
</html>