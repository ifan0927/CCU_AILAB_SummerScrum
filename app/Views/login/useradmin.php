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
            <th scope="col"></th>
         </tr>
         </thead>
         <tbody>
            <?php
               if(!empty($user)){
                  $rowcount = 1;
                  foreach($user as $user_item){
                        echo '
                           <tr>
                           <th scope"row">'.$rowcount.'</th>
                           <td>'.$user_item['NAME'].'</td>
                           <td>'.$user_item['USERNAME'].'</td>
                           <td>'.$user_item['MAIL'].'</td>
                           <td><a class="btn btn-primary" href="#" role="button">修改</a></td>
                           <tr>
                        ';
                        $rowcount ++;                 
                  }
               }
            ?>
         </tbody>
      </table>
</div>

<?=$this->endSection()?>



