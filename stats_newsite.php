
</br>
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-danger">
      <strong>Note:</strong> KPIs show performance of the "new site" between the "post" dates.</br>
    </div>
  </div>
</div>
  
<div class="row">

  <div class="col-md-6">
    <h3>MAIN 3G KPI (%)</h3>
    <?php $thisTable = "main"; ?>
    <?php include 'table_newsite_3G.php' ?>
  </div>


  <div class="col-md-6">
    <h3>MAIN 4G KPI (%)</h3>
    <?php $thisTable = "main"; ?>
    <?php include 'table_newsite_4G.php' ?>
  </div>
</div> <!-- end  row -->


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
</div> <!-- end row --> 


<div class="row">
<div class="col-md-6">
    <h3> 3G Congestion </h3>
    <?php $thisTable = "congestion" ?>
    <?php include 'table_newsite_3G.php' ?>
</div>


<div class="col-md-6">
    <h3> 4G Congestion</h3>
    <?php $thisTable = "congestion_4G_sum"; ?>
    <?php include 'table_newsite_4G.php' ?>
  </div>

</div> <!-- end row -->

<!--collapsable congestion details --> 
<button type="button" class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#congestion_3G_detailed">Show Detailed Congestion</button>
<div id="congestion_3G_detailed" class="collapse">
    <div class="row">
      <div class="col-md-6">
          <h3> 3G Congestion (Detailed) </h3>
          <?php $thisTable = "congestion_3G_detailed" ?>
          <?php include 'table_newsite_3G.php' ?>
      </div>


      <div class="col-md-6">
          <h3> 4G Congestion (Detailed) </h3>
          <?php $thisTable = "congestion_4G_detailed"; ?>
          <?php include 'table_newsite_4G.php' ?>
      </div>
    </div> <!-- end row -->
</div>
<!-- end of collapsable div --> 

<div class="row">
<div class="col-md-6">
    <h3> Resources / Power (Busy Hour) </h3>
    <?php $thisTable = "Resource"; ?>
    <?php include 'table_newsite_3G_bh.php' ?>
</div>

<div class="col-md-6">
    <h3> Resources (4G) </h3>
    <?php $thisTable = "resources"; ?>
    <?php include 'table_newsite_4G.php' ?>
  </div>
</div>  <!-- end row -->

<div class="row">
<div class="col-md-6">
    <h3> RTWP </h3>
    <?php $thisTable = "rtwp"; ?>
    <?php include 'table_newsite_3G.php' ?>
</div>

<div class="col-md-6">
    <h3> Interference (4G) </h3>
    <?php $thisTable = "interference"; ?>
    <?php include 'table_newsite_4G.php' ?>
</div>
</div>  <!-- end row -->
