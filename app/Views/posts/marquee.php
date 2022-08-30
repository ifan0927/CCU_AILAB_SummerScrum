<?=$this->extend("Layout/backend_layout")?>

<?=$this->section("content")?>
<div style="margin-top:100px">
<div class="container" style="margin-top:50px; width:500px" id="div1">
  <div class="card border-dark mb-3" style="max-width: 30rem;">
    <div class="card-header">繁星跑馬燈修改</div>
    <div class="card-body text-dark">
    <form role="form" method="post" action="/PostController/marquee_1">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">輸入跑馬燈:</label>
        <input type="texareat" class="form-control" id="marquee" name="marquee" >
      </div>
      <button type="submit" class="btn btn-primary">測試/送出</button>
    </form>
    </div>
    <div class="card-footer text-muted">現行跑馬燈內容</div>
    <marquee class="pt-1 bg-info" direction="right" height="30" scrollamount="5" behavior="alternate"><?php echo $marquee_1['marquee']; ?></marquee>
  </div>
</div>

<div class="container" style="margin-top:50px; width:500px" id="div2">
  <div class="card border-dark mb-3" style="max-width: 30rem;">
    <div class="card-header">申請跑馬燈修改</div>
    <div class="card-body text-dark">
    <form role="form" method="post" action="/PostController/marquee_2">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">輸入跑馬燈:</label>
        <input type="texareat" class="form-control" id="marquee" name="marquee" >
      </div>
      <button type="submit" class="btn btn-primary">測試/送出</button>
    </form>
    </div>
    <div class="card-footer text-muted">現行跑馬燈內容</div>
    <marquee class="pt-1 bg-primary" direction="right" height="30" scrollamount="5" behavior="alternate"><?php echo $marquee_2['marquee']; ?></marquee>
  </div>
  </div>
</div>

<?=$this->endSection()?>

