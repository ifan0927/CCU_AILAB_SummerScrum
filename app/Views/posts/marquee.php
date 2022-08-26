<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>

<div class="container" style="margin-top:100px; width:500px">
  <div class="card border-dark mb-3" style="max-width: 30rem;">
    <div class="card-header">跑馬燈修改</div>
    <div class="card-body text-dark">
    <form role="form" method="post" action="/PostController/marquee_test">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">輸入跑馬燈:</label>
        <input type="texareat" class="form-control" id="marquee" name="marquee" >
      </div>
      <button type="submit" class="btn btn-primary">測試/送出</button>
    </form>
    </div>
    <div class="card-footer text-muted">現行跑馬燈內容</div>
    <marquee class="pt-1 bg-info" direction="right" height="30" scrollamount="5" behavior="alternate"><?php echo $marquee; ?></marquee>
  </div>
</div>


<?=$this->endSection()?>

