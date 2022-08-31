<?=$this->extend("Layout/backend_layout")?>
<?=$this->section("content")?>
<div class="container" style="padding-top:75px;"><!--主要容器-->
   <table class="table">
         <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">暱稱</th>
            <th scope="col">帳號</th>
            <th scope="col">E-mail</th>
            <th scope="col">權限</th>
            <th></th>
         </tr>
         </thead>
         <tbody>
            <?php
               $lvstr=array("無","貼文系統管理員","作業資訊系統管理員","admin");
               if(!empty($user)){
                  $rowcount = 1;
                  foreach($user as $user_item){
                     
                        echo '
                           <tr>
                           <th scope"row">'.$rowcount.'</th>
                           <td>'.$user_item['NAME'].'</td>
                           <td>'.$user_item['USERNAME'].'</td>
                           <td>'.$user_item['MAIL'].'</td>
                           <td>'.$lvstr[$user_item['Level']].'</td>
                           ';
                           if($user_item['Level'] < 3){
                              echo
                              '
                              <td><a class="btn btn-primary" href="/LoginController/editacc/'.$user_item['id'].'" role="button">修改</a><a class="btn btn-danger ms-1" data-bs-toggle="modal" data-bs-target="#modal'.$rowcount.'"  role="button" >刪除</a></td>
                              <div class="modal" tabindex="-1" id="modal'.$rowcount.'"  aria-hidden="true" >
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                          <h5 class="modal-title">確認刪除</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                          <p>確定要刪除此帳號嗎?</p>
                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">再想想</button>
                                          <a href="/LoginController/userdelete/'.$user_item['id'].'"><button type="button" class="btn btn-primary">刪除</button></a>
                                    </div>
                                    </div>
                                 </div>
                              </div>
                              <tr> 
                              ';
                           }
                        $rowcount ++;
                     
                                         
                  }
               }
            ?>
         </tbody>
      </table>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">確定送出</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            是否確定刪除此使用者
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
            <a class="btn btn-primary" href="/LoginController/userdelete/<?php if(!empty($user_item)){echo''.$user_item['id'].'';} ?>" role="button">確認</a>
            
        </div>
        </div>
    </div>
    </div>
</div>

<?=$this->endSection()?>





