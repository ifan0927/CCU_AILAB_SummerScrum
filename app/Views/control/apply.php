<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>

<div class="container" style="margin-top:50px;"><!--主要容器-->
    <div class="row" ><!--row裡面包兩個 -->
        <div class="container" style="margin-top:50px;"  align="center">
            <a href="/ControlController/star"><button type="button" class="btn btn-primary btn-lg" align="center">繁星</button></a>
            <a href="/ControlController/apply"><button type="button" class="btn btn-primary btn-lg" align="center">申請</button></a>
        </div>
    </div>
    </div>

<?=$this->endSection()?>