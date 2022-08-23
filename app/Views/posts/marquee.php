
<h2>跑馬燈修改</h2>
<form action="/PostController/marquee_test" enctype="mutipart/form-data" method="POST">
    <textarea name="marquee" id="" cols="70" rows="5"></textarea>
    <button type="submit">測試/送出</button>
    <marquee direction="left" height="30" width="500" scrollamount="10" behavior="alternate"></marquee>
</form>

<!--<h3>歷史紀錄</h3>
<?php
if(!empty($posts)){
    foreach($posts as $posts_item){
        echo '
        ['.$posts_item['id'].']    '.$posts_item['marquee'].'  <br>
        ';
        }
}
?>-->
<!--顯示最新的跑馬燈 重整送出之後變成最新的
顯示現有的跑馬燈 資料庫只放一個 