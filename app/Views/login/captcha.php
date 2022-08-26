<?php
session_start();
getCode(4,60,20);
function getCode($num,$w,$h) {
    $code = "";
    for ($i = 0; $i < $num; $i  ) {
        $code .= rand(0, 9);
    }
    //4位驗證碼也可以用rand(1000,9999)直接生成
    //將生成的驗證碼寫入session，備驗證時用
    $_SESSION["helloweba_num"] = $code;
    //建立圖片，定義顏色值
    header("Content-type: image/PNG");
    $im = imagecreate($w, $h);
    $black = imagecolorallocate($im, 0, 0, 0);
    $gray = imagecolorallocate($im, 200, 200, 200);
    $bgcolor = imagecolorallocate($im, 255, 255, 255);
    //填充背景
    imagefill($im, 0, 0, $gray);
    //畫邊框
    imagerectangle($im, 0, 0, $w-1, $h-1, $black);
    //隨機繪製兩條虛線，起干擾作用
    $style = array ($black,$black,$black,$black,$black,$gray,$gray,$gray,$gray,$gray);
    imagesetstyle($im, $style);
    $y1 = rand(0, $h);
    $y2 = rand(0, $h);
    $y3 = rand(0, $h);
    $y4 = rand(0, $h);
    imageline($im, 0, $y1, $w, $y3, IMG_COLOR_STYLED);
    imageline($im, 0, $y2, $w, $y4, IMG_COLOR_STYLED);
    //在畫布上隨機生成大量黑點，起干擾作用;
    for ($i = 0; $i < 80; $i  ) {
        imagesetpixel($im, rand(0, $w), rand(0, $h), $black);
    }
    //將數字隨機顯示在畫布上,字元的水平間距和位置都按一定波動範圍隨機生成
    $strx = rand(3, 8);
    for ($i = 0; $i < $num; $i  ) {
        $strpos = rand(1, 6);
        imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $black);
        $strx  = rand(8, 12);
    }
    imagepng($im);//輸出圖片
    imagedestroy($im);//釋放圖片所佔記憶體
}
?>