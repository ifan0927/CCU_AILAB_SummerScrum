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
            </tr>
          </thead>
            <tbody>
              <?php
                if(!empty($s_posts)){
                    $rowcount = 1;
                    foreach($s_posts as $posts_item){
                        if ($posts_item['syscatagory_star'] == 1){
                            echo '
                                <tr>
                                <th scope"row">'.$rowcount.'</th>
                                <td><a href="/ControlController/sysmodify_star/'.$posts_item['id'].'">'.$posts_item['systitle_star'].'</a></td>
                                <td>'.$posts_item['sysstart_star'].'</td>
                                <td>'.$posts_item['sysend_star'].'</td>
                                <tr>
                            ';
                            $rowcount ++;
                        }
                    }
                }
              ?>
            </tbody>
        </table>
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
            </tr>
          </thead>
            <tbody>
              <?php
                if(!empty($s_posts)){
                    $rowcount = 1;
                    foreach($s_posts as $posts_item){
                        if ($posts_item['syscatagory_star'] == 2){
                            echo '
                                <tr>
                                <th scope"row">'.$rowcount.'</th>
                                <td><a href="/ControlController/sysmodify_star/'.$posts_item['id'].'">'.$posts_item['systitle_star'].'</a></td>
                                <td>'.$posts_item['sysstart_star'].'</td>
                                <td>'.$posts_item['sysend_star'].'</td>
                                <tr>
                            ';
                            $rowcount ++;
                        }
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
            </tr>
          </thead>
            <tbody>
              <?php
                if(!empty($s_posts)){
                    $rowcount = 1;
                    foreach($a_posts as $posts_item){
                        if ($posts_item['syscatagory_apply'] == 1){
                            echo '
                                <tr>
                                <th scope"row">'.$rowcount.'</th>
                                <td><a href="/ControlController/sysmodify_apply/'.$posts_item['id'].'">'.$posts_item['systitle_apply'].'</a></td>
                                <td>'.$posts_item['sysstart_apply'].'</td>
                                <td>'.$posts_item['sysend_apply'].'</td>
                                <tr>
                            ';
                            $rowcount ++;
                        }
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
            </tr>
          </thead>
            <tbody>
              <?php
                if(!empty($s_posts)){
                    $rowcount = 1;
                    foreach($a_posts as $posts_item){
                        if ($posts_item['syscatagory_apply'] == 2){
                            echo '
                                <tr>
                                <th scope"row">'.$rowcount.'</th>
                                <td><a href="/ControlController/sysmodify_apply/'.$posts_item['id'].'">'.$posts_item['systitle_apply'].'</a></td>
                                <td>'.$posts_item['sysstart_apply'].'</td>
                                <td>'.$posts_item['sysend_apply'].'</td>
                                <tr>
                            ';
                            $rowcount ++;
                        }
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