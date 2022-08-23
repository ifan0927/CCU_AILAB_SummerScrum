<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>
<div class="container" style="padding-top:75px">
    <ul class="nav nav-pills justify-content-center">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/ControlController/ustarbrowse/1">大學繁星</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/ControlController/hstarbrowse/1">高中繁星</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ControlController/uapplybrowse/1">大學申請</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ControlController/happlybrowse/1">高中申請</a>
        </li>
    </ul>
</div>
<div class="container" style="padding-top:20px;">
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
                $pcount = 1;
                if ($page != 1){
                    $pagestart = ($page -1) *10 +1;
                    $pageend = $page * 10;
                    }
                else{
                    $pagestart = 1;
                    $pageend = 10; 
                }
                foreach($hstar as $posts_item){
                    if ($rowcount == 11){
                        break;
                    }
                    if ($pcount >= $pagestart && $pcount <= $pageend){
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
                    $pcount ++;
                    
                }
            }
            ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
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
                    <li class="page-item"><a class="page-link" href="/ControlController/hstarbrowse/'.$pagecount.'">'.$pagecount.'</a></li>
                    ';
                    $pagecount ++;
                }
            ?>
        </ul>
    </nav>
</div>


<?=$this->endSection()?>