<br>
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-danger">
      <strong>Note:</strong> Cell level stats - performance of "new site" during the "post" time period.</br>
    </div>
  </div>
</div>
<!-- ===============================
3G cell stats
=============================== -->

<div class="row">
  <div class="col-md-12">
    <div class="alert alert-info">
      <h4 class="center"><strong>3G Cell level stats</strong></h4>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?php $thisTable = "traffic"; ?>
    <?php include 'table_cell_3G.php' ?>        
  </div>
</div>



<!-- ===============================
4G cell stats
=============================== -->

<div class="row">
  <div class="col-md-12">
    <div class="alert alert-info">
      <h4 class="center"><strong>4G Cell level stats</strong></h4>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?php $thisTable = "traffic"; ?>
    <?php include 'table_cell_4G_celltab.php' ?>        
  </div>
</div>