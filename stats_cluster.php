
</br>
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-danger">
      <strong>Pre: </strong> Existing cells within cluster (ie before new site is integrated).</br>
      <strong>Post: </strong> Cluster cells and new site ie Post ingeration performance.
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


<div class="row">
  <div class="col-md-6">
    <h3> Resources (Busy Hour) </h3> 
    <?php $thisTable = "Resource"; ?>
    <?php include 'table_cluster_3G_bh.php' ?>        
  </div>

  <div class="col-md-6">
    <h3> Resources (4G)</h3>
    <?php $thisTable = "resources"; ?>
    <?php include 'table_cluster_4G.php' ?> 
  </div>
</div> <!-- end of row -->


<div class="row">
  <div class="col-md-6">
    <h3> RTWP </h3> 
    <?php $thisTable = "rtwp"; ?>
    <?php include 'table_cluster_3G.php' ?>        
  </div>

  <div class="col-md-6">
    <h3> Interference</h3>
    <?php $thisTable = "interference"; ?>
    <?php include 'table_cluster_4G.php' ?> 
  </div>
</div> <!-- end of row -->



