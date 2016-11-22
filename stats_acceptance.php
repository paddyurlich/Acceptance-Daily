

</br>

<div class="row">
  <div class="col-md-12">
    <div class="alert alert-info acceptance-heading">
      <h4><strong>New Site Revenue</h4></strong>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6">
    <h3>3G Traffic</h3>
    <?php $thisTable = "traffic"; ?>
    <?php include 'table_newsite_3G.php' ?>        
  </div>

  <div class="col-md-6">
    <h3>4G Traffic</h3>
    <?php $thisTable = "traffic"; ?>
    <?php include 'table_newsite_4G.php' ?> 
  </div>
</div> <!-- end of row -->

  
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-info acceptance-heading">
      <h4><strong>Cluster Pre and Post Performance</h4></strong>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <h3>MAIN 3G KPI (%)</h3>
    <?php $thisTable = "main"; ?>
    <?php include 'table_cluster_3G.php' ?>        
  </div>

  <div class="col-md-6">
    <h3>MAIN 4G KPI (%)</h3>
    <?php $thisTable = "main"; ?>
    <?php include 'table_cluster_4G.php' ?> 
  </div>
</div> <!-- end of row -->


<div class="row">
  <div class="col-md-6">
    <h3>3G Traffic</h3>
    <?php $thisTable = "traffic"; ?>
    <?php include 'table_cluster_3G.php' ?>        
  </div>

  <div class="col-md-6">
    <h3>4G Traffic</h3>
    <?php $thisTable = "traffic"; ?>
    <?php include 'table_cluster_4G.php' ?> 
  </div>
</div> <!-- end of row -->


<div class="row">
  <div class="col-md-6">
    <h3> Congestion </h3> 
    <?php $thisTable = "congestion"; ?>
    <?php include 'table_cluster_3G.php' ?>        
  </div>

  <div class="col-md-6">
    <h3>4G Basic</h3>
    <?php $thisTable = "basic"; ?>
    <?php include 'table_cluster_4G.php' ?> 
  </div>
</div> <!-- end of row -->

<!-- ===============================
cell stats
=============================== -->

<div class="row">
  <div class="col-md-12">
    <div class="alert alert-info acceptance-heading">
      <h4><strong>Cell level stats</strong></h4>
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
cell stats
=============================== -->

<div class="row">
  <div class="col-md-12">
    <div class="alert alert-info acceptance-heading">
      <h4><strong>Sector Carrier Stats</strong></h4>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?php $thisTable = "traffic"; ?>
    <?php include 'table_sector_carrier_3G.php' ?>        
  </div>
</div>