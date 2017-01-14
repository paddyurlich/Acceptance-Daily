<?php include 'config.php' ?>
<?php include 'functions.php' ?>
<?php include 'main_function.php' ?> <!-- returnStats3G -->
<?php include 'main_function_4G.php' ?>
<?php include 'main_function_4G_sector.php' ?> <!-- returnStats4G_sector -->

<?php include 'getCellList.php' ?>
<?php include 'getCellList4G.php' ?>
<?php include 'getDateList.php' ?>
<?php include 'getFieldType3G.php' ?>
<?php include 'getFieldType4G.php' ?>
<?php include 'main_function_carrier.php' ?> <!-- returnStats3G_carrier -->
<?php include 'main_function_sector.php' ?> <!-- returnStats3G_sector -->
<?php include 'main_function_cluster_daily_bh.php' ?> <!-- returnStats3G_cluster_daily_bh -->
<?php include 'main_function_carrier_daily_bh.php' ?> <!-- returnStats3G_carrier_daily_bh --> 
<?php include 'main_function_sector_daily_bh.php' ?> <!-- returnStats3G_sector_daily_bh --> 
<?php include 'main_function_3G_sector_carrier.php' ?> <!-- returnStats3G_sector_carrier --> 
<?php include 'main_function_3G_cell.php' ?> <!-- returnStats3G_cell --> 
<?php include 'main_function_4G_cell.php' ?> <!-- returnStats4G_cell --> 
<?php include 'modal_help.php' ?>
<?php include 'selectedCellsGAP.php' ?>



<?php

  //=============================
  // get values for drops downs (cells and dates)
  //=============================
  
  
  $dateList = getDateList();
  $cellList = getCellList();
  $cellList4G = getCellList4G();
  $fieldtype3G = getFieldType3G();
  $fieldtype4G = getFieldType4G();

  set_time_limit(360);

  //=============================
  // set selected start and end dates
  //=============================

$tableComplete = true;

if ($tableComplete == TRUE) {
      $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null ;
      $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null ;

      $startDate_post = isset($_GET['startDate_post']) ? $_GET['startDate_post'] : null ;
      $endDate_post = isset($_GET['endDate_post']) ? $_GET['endDate_post'] : null ;

      // ======================
      // 3G calc
      // ======================

      $selectedCells_3G_newSite = isset($_GET['cell']) ? $_GET['cell'] : null ;

      $selectedCells_3G_cluster = isset($_GET['cellCluster2']) ? $_GET['cellCluster2'] : null ;
      

      //$selectedCells_3G_newSite_and_cluster = array_merge($selectedCells_3G_newSite, $selectedCells_3G_cluster);
      
      if(isset($selectedCells_3G_cluster)){
        $selectedCells_3G_newSite_and_cluster = array_merge($selectedCells_3G_newSite, $selectedCells_3G_cluster);
      } else {
        $selectedCells_3G_newSite_and_cluster = $selectedCells_3G_newSite;
      }

      // notes: 
      //=================
      //pre stats = cluster
      //post stats = cluster and new_site


      $stats_3G_post_newSite =  returnStats3G("post", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_3G_pre_cluster =  returnStats3G("pre", $selectedCells_3G_cluster, $startDate, $endDate);
      $stats_3G_post_cluster_and_newSite =  returnStats3G("post", $selectedCells_3G_newSite_and_cluster, $startDate_post, $endDate_post);


      $stats_3G_bh_post_newSite = returnStats3G_cluster_daily_bh("post", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_3G_bh_pre_cluster =  returnStats3G_cluster_daily_bh("pre", $selectedCells_3G_cluster, $startDate, $endDate);
      $stats_3G_bh_post_cluster_and_newSite =  returnStats3G_cluster_daily_bh("post", $selectedCells_3G_newSite_and_cluster, $startDate_post, $endDate_post);


      // carrier daily
      $stats_post_carrier_u09f1 =  returnStats3G_carrier("U09-1", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_carrier_u09f2 =  returnStats3G_carrier("U09-2", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_carrier_u21f1 =  returnStats3G_carrier("U21-1", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_carrier_u21f2 =  returnStats3G_carrier("U21-2", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_carrier_u21f3 =  returnStats3G_carrier("U21-3", $selectedCells_3G_newSite, $startDate_post, $endDate_post);

      // carrier busy hour
      $stats_post_carrier_bh_u09f1 =  returnStats3G_carrier_daily_bh("U09-1", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_carrier_bh_u09f2 =  returnStats3G_carrier_daily_bh("U09-2", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_carrier_bh_u21f1 =  returnStats3G_carrier_daily_bh("U21-1", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_carrier_bh_u21f2 =  returnStats3G_carrier_daily_bh("U21-2", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_carrier_bh_u21f3 =  returnStats3G_carrier_daily_bh("U21-3", $selectedCells_3G_newSite, $startDate_post, $endDate_post);


      // sector daily
      $stats_post_sector_S1 =  returnStats3G_sector("1","post", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_sector_S2 =  returnStats3G_sector("2","post", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_sector_S3 =  returnStats3G_sector("3","post", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
    
      // sector daily - busy hour
      $stats_post_sector_bh_S1 =  returnStats3G_sector_daily_bh("1","post", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_sector_bh_S2 =  returnStats3G_sector_daily_bh("2","post", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_post_sector_bh_S3 =  returnStats3G_sector_daily_bh("3","post", $selectedCells_3G_newSite, $startDate_post, $endDate_post);

      // acceptance stats - used in datatabls 
      $stats_sector_carrier = returnStats3G_sector_carrier($selectedCells_3G_newSite, $startDate_post, $endDate_post);
      $stats_cell = returnStats3G_cell($selectedCells_3G_newSite, $startDate_post, $endDate_post);
      
      // ======================
      // 4G calc
      // ======================

      
      // notes: 
      //=================
      //pre stats = cluster
      //post stats = cluster and new_site

      $selectedCells_4G_newSite = isset($_GET['cell4Gpre']) ? $_GET['cell4Gpre'] : null ;

      $selectedCells_4G_cluster = isset($_GET['cell4Gpost']) ? $_GET['cell4Gpost'] : null ;
      
      if(isset($selectedCells_4G_cluster)){
        $selectedCells_4G_newSite_and_cluster = array_merge($selectedCells_4G_newSite, $selectedCells_4G_cluster);
      } else {
        $selectedCells_4G_newSite_and_cluster = $selectedCells_4G_newSite;
      }


      $stats_4G_post_newSite =  returnStats4G("post", $selectedCells_4G_newSite, $startDate_post, $endDate_post);
      $stats_4G_pre_cluster =  returnStats4G("pre", $selectedCells_4G_cluster, $startDate, $endDate);
      $stats_4G_post_cluster_and_newSite =  returnStats4G("post", $selectedCells_4G_newSite_and_cluster, $startDate_post, $endDate_post);

      $stats_4G_post_sector_S1 =  returnStats4G_sector("1","post", $selectedCells_4G_newSite, $startDate_post, $endDate_post);
      $stats_4G_post_sector_S2 =  returnStats4G_sector("2","post", $selectedCells_4G_newSite, $startDate_post, $endDate_post);
      $stats_4G_post_sector_S3 =  returnStats4G_sector("3","post", $selectedCells_4G_newSite, $startDate_post, $endDate_post);
      
      //4G cells levels stats - used in datatables
      $stats_4G_cell = returnStats4G_cell($selectedCells_4G_newSite, $startDate_post, $endDate_post);
}


  // ======================
  // helper vars
  // ======================

  //$formComplete = (is_null($selectedCells_3G_newSite)  || is_null($startDate) || is_null($endDate)) ? false : true ;

  // var_dump($startDate);
  // var_dump($startDate);
  // var_dump($stats_pre);

  // var_dump($selectedCells_post);
  // var_dump($startDate_post);
  // var_dump($endDate_post);
  // var_dump($stats_post);

  // var_dump($selectedCells_3G_newSite);
  // var_dump($selectedCells_3G_cluster);
  // var_dump($selectedCells_3G_newSite_and_cluster);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Acceptance Stats</title>
  <!-- chosen -->
  <!--<link rel="stylesheet" href="docsupport/style.css">-->
  <!--<link rel="stylesheet" href="docsupport/prism.css">-->
  <link rel="stylesheet" href="chosen.css">

  <!-- main styles --> 
  <link rel="stylesheet" href="styles.css">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

  <!-- jQuery library -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>





  <!-- Latest compiled bootstrap JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Data Tables css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

  <!-- datatables --> 
  <!--<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.12.3.js"></script>-->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    

  <!-- <script src="./datatables/datatables.css"></script> -->
  <!-- <link rel="stylesheet" type="text/css" href="./datatables/datatables.js"> -->

  <!-- custom JS -->
  <script src="index.js"></script>

  <style type="text/css" media="all">
    .chosen-rtl .chosen-drop { left: -9000px; }
    .container {
      width: 98%;
      /*color: grey;*/
    }
    
    .nav-tabs li a {
      color: #777;
    }
    .center {
      text-align: center;
    }
  </style>

</head>

<body>


<!-- Fixed navbar --> 
    <!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><strong>Acceptance Stats | </strong> Performance Analysis </a>
    </div>
    <ul class="nav navbar-nav">
    <!--  <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li> -->
    </ul>
    <button class="btn btn-primary navbar-btn pull-right" data-toggle="modal" data-target="#myModal">Help</button>
  </div>
</nav>

</br></br>

<div class="container">
<h1 class="center">Date and Cell selection</h1>
<div class="panel panel-default">

  <div class="panel-body">
    
    <form action:"index.php" method: "get">
    
    
    <!-- ========== -->
    <!-- well -->
    <!-- ========== -->

      <div class="row">

          <div class="col-md-2">
            <?php include 'input_predates.php' ?>
          </div> 
          <div class="col-md-2">
            <?php include 'input_postdates.php' ?>
          </div> 
          <div class="col-md-2">
            <?php include 'input_3G_cells_cluster.php' ?>
          </div> 
          <div class="col-md-2">
            <?php include 'input_3G_cells_newsite.php' ?>
          </div> 
          <div class="col-md-2">
            <?php include 'input_4G_cells_cluster.php' ?>
          </div> 
          <div class="col-md-2">
            <?php include 'input_4G_cells_newsite.php' ?>
          </div> 

      </div> <!--end first row --> 


    <!-- ========== -->
    <!-- div to display GAP cells -->
    <!-- ========== -->

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          GAP Cells <en>(Click to hide)</em>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div id="cells_3G_ClusterDisplay" class="panel-body">

      </div>
    </div>
  </div>



    <!-- ========== -->
    <!-- row well - button -->
    <!-- ========== -->
    <div class="row">
      <div class="col-md-12">
        <hr>
        <input type="submit" value="Calculate Stats" class="btn btn-primary btn-lg">
      </div>
    </div> <!--end of third row --> 

</form> <!-- end of form --> 

</div>

</div>

<!-- ===============================================================================================
====================================================================================================
          OUTPUT STATS TABLES
====================================================================================================
=============================================================================================== -->

<h1 class="center">Performance Stats</h1>

<!--  ================================================================= --> 

<div class="well">

  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#acceptance">Acceptance</a></li>
    <li><a data-toggle="pill" href="#newsite">New Site</a></li>
    <li><a data-toggle="pill" href="#cluster">Cluster</a></li>
    <li><a data-toggle="pill" href="#carrier">Carrier</a></li>
    <li><a data-toggle="pill" href="#sector">Sector</a></li>
    <li><a data-toggle="pill" href="#cell">Cell</a></li>
    

  </ul>
  
      <div class="tab-content">

          <!-- =============================================================================== --> 
          <!-- ACCEPTANCE STATS --> 
          <!-- =============================================================================== -->
          <div id="acceptance" class="tab-pane fade in active">
          <?php include 'stats_acceptance.php' ?>
          </div> <!--end of tab --> 

          <!-- =============================================================================== --> 
          <!-- NEW SITE STATS --> 
          <!-- =============================================================================== -->
          <div id="newsite" class="tab-pane fade">
          <?php include 'stats_newsite.php' ?>
          </div> <!--end of tab --> 

          <!-- =============================================================================== --> 
          <!-- CLUSTER STATS --> 
          <!-- =============================================================================== --> 
          <div id="cluster" class="tab-pane fade">
          <?php include 'stats_cluster.php' ?>
          </div> <!--end of tab --> 

          <!-- =============================================================================== --> 
          <!-- CARRIER STATS --> 
          <!-- =============================================================================== --> 
          <div id="carrier" class="tab-pane fade">
          <?php include 'stats_carrier.php' ?>
          </div> <!--end of tab --> 

          <!-- =============================================================================== --> 
          <!-- SECTOR STATS --> 
          <!-- =============================================================================== --> 
          <div id="sector" class="tab-pane fade">
          <?php include 'stats_sector.php' ?>
          </div> <!--end of tab -->
  
            <!-- =============================================================================== --> 
          <!-- CELL STATS --> 
          <!-- =============================================================================== --> 
          <div id="cell" class="tab-pane fade">
          <?php include 'stats_cell.php' ?>
          </div> <!--end of tab -->
      </div>
</div>

<!-- ===================================================================== --> 

 
</div> <!-- end of container -->

</body>

  <footer>

      <!-- chose drop down --> 
      <script src="chosen.jquery.js" type="text/javascript"></script>

  </footer>
</html>
