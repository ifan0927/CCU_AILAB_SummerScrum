<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>

<div class="container" style="padding-top:75px;">
<div class="accordion" id="accordionExample">

  <div class="accordion-item"> <!-- 大學繁星-->
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        大學繁星
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <h3>點擊標題進入修改頁面</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">系統名稱</th>
              <th scope="col">系統開放時間</th>
              <th scope="col">系統結束時間</th>
              <th></th>
            </tr>
          </thead>
            <tbody>
              <?php
                if(!empty($ustar)){
                    $rowcount = 1;
                    $pcount = 1;
                    if ($page != 1){
                        $pagestart = ($page -1) *10 +1;
                        $pageend = $page * 10;
                        }
                    else{
                        $pagestart = 1;
                        $pageend = 10; 
                    }
                    foreach($ustar as $posts_item){
                        if ($rowcount == 11){
                            break;
                        }
                        if ($pcount >= $pagestart && $pcount <= $pageend){
                            echo '
                            <tr>
                            <th scope"row">'.$rowcount.'</th>
                            <td><a href="/ControlController/modify/1/'.$posts_item['id'].'">'.$posts_item['title'].'</a></td>
                            <td>'.$posts_item['start'].'</td>
                            <td>'.$posts_item['end'].'</td>
                            <td><a class="btn btn-primary" href="/ControlController/delete/1/'.$posts_item['id'].'" role="button">刪除貼文</a></td>
                            <tr>
                        ';
                        $rowcount ++;
                        }
                        $pcount ++;
                        
                    }
                }
              ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                    $p = intval(($ustar_c / 10) + 1);
                    $pagecount = 1;
                    for ($i = 0 ; $i < $p ; $i++){
                        echo'
                        <li class="page-item"><a class="page-link" href="/ControlController/test/'.$pagecount.'">'.$pagecount.'</a></li>
                        ';
                        $pagecount ++;
                    }
                ?>
            </ul>
        </nav>
      </div>
    </div>
    </div> <!-- 大學繁星end -->

    <div class="accordion-item"> <!-- 高中繁星-->
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        高中繁星
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <h3>點擊標題進入修改頁面</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">系統名稱</th>
              <th scope="col">系統開放時間</th>
              <th scope="col">系統結束時間</th>
              <th></th>
            </tr>
          </thead>
            <tbody>
              <?php
                if(!empty($hstar)){
                    $rowcount = 1;
                    foreach($hstar as $posts_item){
                          echo '
                              <tr>
                              <th scope"row">'.$rowcount.'</th>
                              <td><a href="/ControlController/modify/2/'.$posts_item['id'].'">'.$posts_item['title'].'</a></td>
                              <td>'.$posts_item['start'].'</td>
                              <td>'.$posts_item['end'].'</td>
                              <td><a class="btn btn-primary" href="/ControlController/delete/2/'.$posts_item['id'].'" role="button">刪除貼文</a></td>
                              <tr>
                          ';
                          $rowcount ++;
                    }
                }
              ?>
            </tbody>
        </table>
      </div>
    </div>
    </div> <!-- 高中繁星end -->

    <div class="accordion-item"> <!-- 大學申請-->
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        大學申請
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <h3>點擊標題進入修改頁面</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">系統名稱</th>
              <th scope="col">系統開放時間</th>
              <th scope="col">系統結束時間</th>
              <th></th>
            </tr>
          </thead>
            <tbody>
              <?php
                if(!empty($uapply)){
                    $rowcount = 1;
                    foreach($uapply as $posts_item){
                        echo '
                            <tr>
                            <th scope"row">'.$rowcount.'</th>
                            <td><a href="/ControlController/modify/3/'.$posts_item['id'].'">'.$posts_item['title'].'</a></td>
                            <td>'.$posts_item['start'].'</td>
                            <td>'.$posts_item['end'].'</td>
                            <td><a class="btn btn-primary" href="/ControlController/delete/3/'.$posts_item['id'].'" role="button">刪除貼文</a></td>
                            <tr>
                        ';
                        $rowcount ++;                       
                    }
                }
              ?>
            </tbody>
        </table>
      </div>
    </div>
    </div> <!-- 大學申請end -->

    <div class="accordion-item"> <!-- 高中申請-->
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
        高中申請
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse " aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <h3>點擊標題進入修改頁面</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">系統名稱</th>
              <th scope="col">系統開放時間</th>
              <th scope="col">系統結束時間</th>
              <th></th>
            </tr>
          </thead>
            <tbody>
              <?php
                if(!empty($happly)){
                    $rowcount = 1;
                    foreach($happly as $posts_item){
                        echo '
                            <tr>
                            <th scope"row">'.$rowcount.'</th>
                            <td><a href="/ControlController/modify/4/'.$posts_item['id'].'">'.$posts_item['title'].'</a></td>
                            <td>'.$posts_item['start'].'</td>
                            <td>'.$posts_item['end'].'</td>
                            <td><a class="btn btn-primary" href="/ControlController/delete/4/'.$posts_item['id'].'" role="button">刪除貼文</a></td>
                            <tr>
                        ';
                        $rowcount ++;
                    }
                }
              ?>
            </tbody>
        </table>
      </div>
    </div>
    </div> <!-- 大學申請end -->

  
  
</div>
</div>

<?=$this->endSection()?>