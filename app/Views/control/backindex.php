<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>

<div class="container" style="margin-top:100px">
    <h3 align="center">前台預覽</h3>
    <iframe src="http://localhost:8080/" width="100%" height="800" style="border:1px solid black;"></iframe>
</div>

<?=$this->endSection()?>