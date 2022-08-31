<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>
<div class="container" style="padding-top:75px">
    <ul class="nav nav-pills justify-content-center">
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/PostController/starlist/1">繁星系統</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/PostController/applylist/1">申請系統</a>
        </li>
    </ul>
</div>
<div class="container" style="padding-top:20px; height:600px; width:1000px;">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">文章名稱</th>
            <th scope="col">文章開放時間</th>
            <th scope="col">文章結束時間</th>
            <th></th>
        </tr>
        </thead>
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
                    if ($pcount >= $pagestart && $pcount <= $pageend){
                        echo '
                        <tr>
                        <th scope"row">'.$rowcount.'</th>
                        <td><a href="/PostController/modify/'.$posts_item->id.'">'.$posts_item->title.'</a></td> 
                        <td>'.$posts_item->beginTime.'</td>
                        <td>'.$posts_item->endTime.'</td>
                        <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal'.$rowcount.'"  >刪除貼文</button></td>
                        <div class="modal" tabindex="-1" id="modal'.$rowcount.'"  aria-hidden="true" >
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">確認刪除</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>確定要刪除此系統嗎?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">再想想</button>
                                    <a href="/PostController/delete/'.$posts_item->id.'"><button type="button" class="btn btn-primary">刪除</button></a>
                                </div>
                                </div>
                            </div>
                        </div>
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
    </div>
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
                    <li class="page-item"><a class="page-link" href="/PostController/starlist/'.$pagecount.'">'.$pagecount.'</a></li>
                    ';
                    $pagecount ++;
                }
            ?>
        </ul>
    </nav>
    </div>
    

<?=$this->endSection()?>