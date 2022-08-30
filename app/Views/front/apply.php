<?=$this->extend("Layout/f_applylayout")?>

<?=$this->section("content")?>
<div class="container mt-3 pt-5" sytle="height=1200px;">
<marquee class="pt-1 border border-dark" direction="right" height="30" scrollamount="5" behavior="alternate"><?php echo $marquee['marquee']; ?></marquee>
<table class="table ">
        <tbody>
            <?php
            if(!empty($posts)){
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
                foreach($posts as $posts_item){
                    if ($rowcount == 11){
                        break;
                    }
                    //超連結,刪除還沒改
                    if (($pcount >= $pagestart && $pcount <= $pageend) && date($posts_item->endTime) > date('Y-m-d')){
                        echo '
                        <tr>
                        <td  class="col-sm-1">'.$posts_item->beginTime.'</td>
                        <td  class="col-sm-1">'.$posts_item->category.'</td>
                        <td  class="col-sm-5"><a href="/Home/a_article/'.$posts_item->id.'">'.$posts_item->title.'</a></td> 
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
    <div class="pt-4">
    <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center">
            <?php
                if ( $count % 10 == 0){
                    $p = $count/10;
                }
                else{
                    $p = intval(($count / 10) + 1);
                }
                $pagecount = 1;
                for ($i = 0 ; $i < $p ; $i++){
                    echo'
                    <li class="page-item"><a class="page-link" href="/Home/apply/'.$pagecount.'">'.$pagecount.'</a></li>
                    ';
                    $pagecount ++;
                }
            ?>
        </ul>
    </nav>
    </div>
  </div>
    
<?=$this->endSection()?>