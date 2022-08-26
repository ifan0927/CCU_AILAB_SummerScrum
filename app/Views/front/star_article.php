<?=$this->extend("Layout/f_starlayout")?>

<?=$this->section("content")?>
<div class="container mt-3 pt-5" sytle="height=1200px;">
    <div class="card text-center" style="width:800px;">
        <div class="card-header">
            <h5><?php echo $posts['title']; ?><h5>
        </div>
        <div class="card-body">
            <p class="card-text"><?php echo $posts['content']; ?></p>
        </div>
        <?php
            if ($posts['link'] != NULL || $posts['file'] != NULL )
            echo '
                <div class="card-footer text-muted">
                    <a href="'.$posts['link'].'">連結網站</a><br>
                    <a href="'.ROOTPATH.'./public/post_file/apply/'.$posts['file'].'">下載附件</a>

                </div>
            ';
        ?>
    </div>

    
</div>
    
<?=$this->endSection()?>