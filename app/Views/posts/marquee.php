<h2>跑馬燈修改</h2>
<form action="/PostController/marquee_test" enctype="mutipart/form-data" method="POST">
    <textarea name="marquee" id="" cols="30" rows="10"></textarea>
    <button type="submit">測試/送出</button>
    <marquee direction="left" height="30" width="500" scrollamount="10" behavior="alternate"></marquee>
</form>
<h3>test</h3>
<?php
echo $posts['marquee'];

?>
