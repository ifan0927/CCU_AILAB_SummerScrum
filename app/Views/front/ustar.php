<?=$this->extend("Layout/f_starlayout")?>

<?=$this->section("content")?>
<div class="container mt-3 pt-5" sytle="height=1200px;">
    <h3>大學作業資訊系統</h3>
<table class="table table-bordered ">
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
                        if (date($posts_item['end']) <  date('Y-m-d'))
                        {
                            echo '
                            <tr>
                            <td  class="col-sm-1" align="center">'.$posts_item['title'].' </td>
                            <td  class="col-sm-1" align="center">'.$posts_item['content'].' </td>
                            <tr>
                            ';
                        }
                        else
                        {
                            echo '
                            <tr>
                            <td  class="col-sm-1" align="center"><a href="'.$posts_item['url'].'"> '.$posts_item['title'].' </a></td>
                            <td  class="col-sm-1" align="center">'.$posts_item['content'].' </td>
                            <tr>
                            ';
                        }
                        
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
                    <li class="page-item"><a class="page-link" href="/Home/university/'.$pagecount.'">'.$pagecount.'</a></li>
                    ';
                    $pagecount ++;
                }
            ?>
        </ul>
    </nav>
    </div>
  </div>
    
<?=$this->endSection()?>