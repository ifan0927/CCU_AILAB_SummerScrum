<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        -->
        <link rel="stylesheet" href="/css/article_list.css">
        <script src="ckeditor/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>
    </head>
    <body>
        <h2>全部文章列表</h2>
        <a href="/PostController/onlystar"><button type="button" class="btn btn-info">只顯示繁星系統</button></a>
        <a href="/PostController/onlyapply"><button type="button" class="btn btn-info">只顯示個申系統</button></a><br>
        <?php
        if(!empty($posts)){
            foreach($posts as $posts_item){
                if($posts_item['star_or_apply'] == 1 ){
                    $name = "繁星";
                    echo '
                        <a href="/PostController/article_modify/'.$posts_item['id'].'">修改</a>'.$name.'  ['.$posts_item['category'].']'.$posts_item['title'].'<br>
                    ';
                }
                else{
                    $name ="個申";
                    echo '
                        <a href="/PostController/article_modify/'.$posts_item['id'].'">修改</a>'.$name.'  ['.$posts_item['category'].']'.$posts_item['title'].'<br>
                    ';
                }
            }
        }
        ?>
    </body>