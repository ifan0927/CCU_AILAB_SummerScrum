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
        <?php
            echo '點擊文章進入修改頁面<br>';
            if(!empty($s_posts)){
                
                foreach($s_posts as $posts_item){
                    if ($posts_item['syscatagory_star'] == 1){
                        echo '
                            <a href="/">'.$posts_item['systitle_star'].'</a><br>
                        ';
                    }
                }
            }
        ?>
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
        <?php
            echo '點擊文章進入修改頁面<br>';
            if(!empty($s_posts)){
                
                foreach($s_posts as $posts_item){
                    if ($posts_item['syscatagory_star'] == 2){
                        echo '
                            <a href="/">'.$posts_item['systitle_star'].'</a><br>
                        ';
                    }
                }
            }
        ?>
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
        <?php
            echo '點擊文章進入修改頁面<br>';
            if(!empty($a_posts)){
                
                foreach($a_posts as $posts_item){
                    if ($posts_item['syscatagory_apply'] == 1){
                        echo '
                            <a href="/">'.$posts_item['systitle_apply'].'</a><br>
                        ';
                    }
                }
            }
        ?>
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
        <?php
            echo '點擊文章進入修改頁面<br>';
            if(!empty($a_posts)){
                
                foreach($a_posts as $posts_item){
                    if ($posts_item['syscatagory_apply'] == 2){
                        echo '
                            <a href="/">'.$posts_item['systitle_apply'].'</a><br>
                        ';
                    }
                }
            }
        ?>
      </div>
    </div>
    </div> <!-- 大學申請end -->

  
  
</div>
</div>

<?=$this->endSection()?>