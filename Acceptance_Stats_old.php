

<?php include 'functions.php' ?>
<?php include 'main_function.php' ?>
<?php include 'main_function_4G.php' ?>
<?php include 'getCellList.php' ?>
<?php include 'getCellList4G.php' ?>
<?php include 'getDateList.php' ?>
<?php include 'getFieldType3G.php' ?>
<?php include 'getFieldType4G.php' ?>
<?php include 'main_function_carrier.php' ?> <!-- returnStats3G_carrier -->
<?php include 'main_function_sector.php' ?> <!-- returnStats3G_sector -->
<?php include 'main_function_cluster_daily_bh.php' ?> <!-- returnStats3G_daily_bh -->
<?php include 'main_function_carrier _daily_bh.php' ?> 

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


  $stats_3G_post_newSite =  returnStats3G("post", $selectedCells_3G_newSite, $startDate, $endDate);
  $stats_3G_pre_cluster =  returnStats3G("pre", $selectedCells_3G_cluster, $startDate, $endDate);
  $stats_3G_post_cluster_and_newSite =  returnStats3G("post", $selectedCells_3G_newSite_and_cluster, $startDate_post, $endDate_post);


  $stats_3G_bh_post_newSite = returnStats3G_daily_bh("post", $selectedCells_3G_newSite, $startDate, $endDate);
  $stats_3G_bh_pre_cluster =  returnStats3G_daily_bh("pre", $selectedCells_3G_cluster, $startDate, $endDate);
  $stats_3G_bh_post_cluster_and_newSite =  returnStats3G_daily_bh("post", $selectedCells_3G_newSite_and_cluster, $startDate_post, $endDate_post);


  // carrier daily
  $stats_pre_carrier_u09f1 =  returnStats3G_carrier("U09-1", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  $stats_pre_carrier_u09f2 =  returnStats3G_carrier("U09-2", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  $stats_pre_carrier_u21f1 =  returnStats3G_carrier("U21-1", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  $stats_pre_carrier_u21f2 =  returnStats3G_carrier("U21-2", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  $stats_pre_carrier_u21f3 =  returnStats3G_carrier("U21-3", $selectedCells_3G_newSite, $startDate_post, $endDate_post);

  // carrier busy hour
  $stats_carrier_bh_u09f1 =  returnStats3G_carrier_daily_bh("U09-1", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  $stats_carrier_bh_u09f2 =  returnStats3G_carrier_daily_bh("U09-2", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  $stats_carrier_bh_u21f1 =  returnStats3G_carrier_daily_bh("U21-1", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  $stats_carrier_bh_u21f2 =  returnStats3G_carrier_daily_bh("U21-2", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  $stats_carrier_bh_u21f3 =  returnStats3G_carrier_daily_bh("U21-3", $selectedCells_3G_newSite, $startDate_post, $endDate_post);

  // secotr daily
  $stats_pre_sector_S1 =  returnStats3G_sector("1","pre", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  $stats_pre_sector_S2 =  returnStats3G_sector("2","pre", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  $stats_pre_sector_S3 =  returnStats3G_sector("3","pre", $selectedCells_3G_newSite, $startDate_post, $endDate_post);
  

  // ======================
  // 4G calc
  // ======================

  
  // notes: 
  //=================
  //pre stats = cluster
  //post stats = cluster and new_site

  $selectedCells_4G_newSite = isset($_GET['cell4Gpre']) ? $_GET['cell4Gpre'] : null ;

  $selectedCells_4G_cluster = isset($_GET['cell4Gpost']) ? $_GET['cell4Gpost'] : null ;

  //$selectedCells_4G_newSite_and_cluster = array_merge($selectedCells_4G_newSite, $selectedCells_4G_cluster);
  
  if(isset($selectedCells_4G_cluster)){
    $selectedCells_4G_newSite_and_cluster = array_merge($selectedCells_4G_newSite, $selectedCells_4G_cluster);
  } else {
    $selectedCells_4G_newSite_and_cluster = $selectedCells_4G_newSite;
  }


  //$stats_4G_pre =  returnStats4G("pre", $selectedCells_4G_pre, $startDate, $endDate);
  //$stats_4G_post =  returnStats4G("post", $selectedCells_4G_post, $startDate_post, $endDate_post);

  $stats_4G_post_newSite =  returnStats4G("post", $selectedCells_4G_newSite, $startDate, $endDate);
  $stats_4G_pre_cluster =  returnStats4G("pre", $selectedCells_4G_cluster, $startDate, $endDate);
  $stats_4G_post_cluster_and_newSite =  returnStats4G("post", $selectedCells_4G_newSite_and_cluster, $startDate_post, $endDate_post);





  // ======================
  // helper vars
  // ======================

  $formComplete = (is_null($selectedCells_3G_newSite)  || is_null($startDate) || is_null($endDate)) ? false : true ;


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
  <link rel="stylesheet" href="docsupport/style.css">
  <link rel="stylesheet" href="docsupport/prism.css">
  <link rel="stylesheet" href="chosen.css">



  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css" media="all">
    .chosen-rtl .chosen-drop { left: -9000px; }
    .container {
      width: 90%;
      /*color: grey;*/
    }
    
    .nav-tabs li a {
      color: #777;
    }
  </style>

</head>

<body>


    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Acceptance Stats</a>
        </div>
      </div>
    </nav>

    <br><br><br><br>

    <?php include 'stats_newsite.php' ?>

<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Date and cell selection</h3>
  </div>

  <div class="panel-body">
    
    <form action:"index.php" method: "get">
    
    
    <!-- ========== -->
    <!-- first well -->
    <!-- ========== -->

    <div class="well">
      <div class="row">

        <div class="col-md-3">  
          <h2>Pre Dates</h2>
          <hr>  
            <em>Start time/date:</em>
            <select name="startDate" data-placeholder="Choose a start date..." class="chosen-select" style="width:200px;" tabindex="4">
            <option value=""></option>       
                <?php foreach($dateList as $k => $v) { ?>
                  <option value="<?php echo $dateList[$k] ?>" <?php echo isset($startDate) && $dateList[$k] == $startDate ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>  </option>                    
                <?php } ?> 
            </select>

            <br/><br/>

            <em>End time/date: </em>
            <select name="endDate" data-placeholder="Choose an end date..." data-toggle="tooltip" title="Hooray!" class="chosen-select" style="width:200px;" tabindex="4">
              <option value=""></option>       
                <?php foreach($dateList as $k => $v) { ?>
                  <option value="<?php echo $dateList[$k]?>" <?php echo isset($endDate) && $dateList[$k] == $endDate ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>                      
                <?php } ?> 
            </select>
        </div>

        <div class="col-md-3">  
          <h2>Post Dates</h2>
          <hr>
            <em>Start time/date:</em>
            <select name="startDate_post" data-placeholder="Choose a start date..." class="chosen-select" style="width:200px;" tabindex="4">
            <option value=""></option>       
                <?php foreach($dateList as $k => $v) { ?>
                  <option value="<?php echo $dateList[$k] ?>" <?php echo isset($startDate_post) && $dateList[$k] == $startDate_post ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>                      
                <?php } ?> 
            </select>

            <br/><br/>

            <em>End time/date: </em>
            <select name="endDate_post" data-placeholder="Choose an end date..." class="chosen-select" style="width:200px;" tabindex="4">
              <option value=""></option>       
                <?php foreach($dateList as $k => $v) { ?>
                  <option value="<?php echo $dateList[$k] ?>" <?php echo isset($endDate_post) && $dateList[$k] == $endDate_post ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>                      
                <?php } ?> 
            </select>
        </div>

      </div> <!--end first row --> 
      </div> <!-- end first well -->

      <!-- ========== -->
      <!-- second well -->
      <!-- ========== -->
      
      <div class="well">
      <div class="row">

      
        <div class="col-md-4" data-toggle="tooltip" title="Hold CNTRL to select multiple cells">
          <h2>3G Cells (new site)</h2>
             <hr>
             <select name="cell[]" data-placeholder="Choose a cell..." class="chosen-select" multiple style="width:300px;" tabindex="4">
                <option value=""></option>       
                    <?php foreach($cellList as $k => $v) { ?>
                        <option value=<?php echo $cellList[$k];?>
                          
                          <?php
                            if (isset($selectedCells_3G_newSite)) {
                              foreach ($selectedCells_3G_newSite as $key => $selectedCell) {
                                echo isset($selectedCells_3G_newSite) && $cellList[$k] == $selectedCell ? ' selected' : '';
                              }
                            }
                          ?>

                          

                          > <!--end of option tag -->

                          <?php echo $cellList[$k]; ?>  

                    <?php } ?> 
              </select>
        </div>

        <div class="col-md-4" data-toggle="tooltip" title="Hold CNTRL to select multiple cells">
          <h2>3G Cells (cluster)</h2>
          <hr>
             <select name="cellCluster2[]" data-placeholder="Choose a cell..." class="chosen-select" multiple style="width:300px;" tabindex="4">
                <option value=""></option>       
                    <?php foreach($cellList as $k => $v) { ?>
                        <option value=<?php echo $cellList[$k] ?>
                          
                          <?php
                            if (isset($selectedCells_3G_cluster)) {
                              foreach ($selectedCells_3G_cluster as $key => $selectedCell) {
                                echo isset($selectedCells_3G_cluster) && $cellList[$k] == $selectedCell ? ' selected' : '';
                              }
                            }
                          ?>

                          > <!--end of option tag -->

                          <?php echo $cellList[$k]; ?>

                    <?php } ?> 
              </select>
        </div>

       

      </div> <!--end second row --> 
      </div> <!-- end second well -->

      <!-- ========== -->
      <!-- third well -->
      <!-- ========== -->
      <div class="well">
      <div class="row">
          
      <div class="col-md-4" data-toggle="tooltip" title="Hold CNTRL to select multiple cells">
          <h2>4G Cells (new site)</h2>
             <hr>
             <select name="cell4Gpre[]" data-placeholder="Choose a cell..." class="chosen-select" multiple style="width:300px;" tabindex="4">
                <option value=""></option>       
                    <?php foreach($cellList4G as $k => $v) { ?>
                        <option value=<?php echo $cellList4G[$k];?>
                          
                          <?php
                            if (isset($selectedCells_4G_newSite)) {
                              foreach ($selectedCells_4G_newSite as $key => $selectedCell) {
                                echo isset($selectedCells_4G_newSite) && $cellList4G[$k] == $selectedCell ? ' selected' : '';
                              }
                            }
                          ?>

                          > <!--end of option tag -->

                          <?php echo $cellList4G[$k]; ?>  

                    <?php } ?> 
              </select>
        </div>

        <div class="col-md-4" data-toggle="tooltip" title="Hold CNTRL to select multiple cells">
          <h2>4G Cells (cluster)</h2>
             <hr>
             <select name="cell4Gpost[]" data-placeholder="Choose a cell..." class="chosen-select" multiple style="width:300px;" tabindex="4">
                <option value=""></option>       
                    <?php foreach($cellList4G as $k => $v) { ?>
                        <option value=<?php echo $cellList4G[$k];?>
                          
                          <?php
                            if (isset($selectedCells_4G_cluster)) {
                              foreach ($selectedCells_4G_cluster as $key => $selectedCell) {
                                echo isset($selectedCells_4G_cluster) && $cellList4G[$k] == $selectedCell ? ' selected' : '';
                              }
                            }
                          ?>

                          > <!--end of option tag -->

                          <?php echo $cellList4G[$k]; ?>  

                    <?php } ?> 
              </select>
        </div>
        


    </div> <!--end third row --> 
    </div> <!-- end third well -->


    <!-- ========== -->
    <!-- fourth well -->
    <!-- ========== -->
      <div class="well">
      <div class="row">
          
        <div class="col-md-3">
          <h2>New site (post dates) </h2>
             <hr>
              <?php var_dump($selectedCells_3G_newSite) ?>
              <?php var_dump($selectedCells_4G_newSite) ?>            
        </div>

        <div class="col-md-3">
          <h2>Cluster cells (pre dates)</h2>
             <hr>
              <?php var_dump($selectedCells_3G_cluster) ?>
              <?php var_dump($selectedCells_4G_cluster) ?>
        </div>

        <div class="col-md-3">
          <h2>Cluster and new site (post dates) </h2>
             <hr>
              <?php var_dump($selectedCells_3G_newSite_and_cluster) ?>
              <?php var_dump($selectedCells_4G_newSite_and_cluster) ?>            
        </div>

        


    </div> <!--end fourth row --> 
    </div> <!-- end fourth well -->





    <div class="row">
      <div class="col-md-12">
        <hr>
        <input type="submit" value="Show" class="btn btn-primary">
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



<h3 class="text-center">Performance Stats</h3> 


<!--  ================================================================= --> 

<div class="well">

  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#newsite">New Site</a></li>
    <li><a data-toggle="pill" href="#cluster">Cluster</a></li>
    <li><a data-toggle="pill" href="#carrier">Carrier</a></li>
    <li><a data-toggle="pill" href="#sector">Sector</a></li>
  </ul>
  
<div class="tab-content">

<!-- =============================================================================== --> 
<!-- NEW SITE STATS --> 
<!-- =============================================================================== --> 

<div id="newsite" class="tab-pane fade in active">
    
    </br>
    
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger">
          <strong>Note: </strong> Stats based purely on new site performance (post dates).</br>
        </div>
      </div>
    </div>


  
<div class="row">

      <div class="col-md-6">
        <h3>MAIN 3G KPI (%)</h3>
        <?php $thisTable = "main"; ?>

        <table class="table table-hover table-inverse table-sm table-condensed" >
          <thead>
            <tr>     
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php 
                foreach ($fieldtype3G as $key => $value) {

                  $table = $fieldtype3G[$key]['table'];

                  if ($table != $thisTable) {
                    continue;
                  }

                  $decPlaces = $fieldtype3G[$key]['dec'];
                  $arrowType = $fieldtype3G[$key]['arrow'];
                  $KPI = $fieldtype3G[$key]['alias'];

                  $newSiteStats = (float)($stats_3G_post_newSite['post'][0][$key]);
                        
                  echo "<tr>";
                    echo "<th>".$KPI."</th>";
                    echo "<td>".number_format($newSiteStats,$decPlaces)."</th>";         
                  echo "</tr>";
                }
            ?>
          </tbody>
        </table>
    </div>


  <div class="col-md-6">
    <h3>MAIN 4G KPI (%)</h3>
    <?php $thisTable = "main"; ?>

        <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
       
        <?php 
            foreach ($fieldtype4G as $key => $value) {

              $table = $fieldtype4G[$key]['table'];

              if ($table != $thisTable) {
                continue;
              }

              $decPlaces = $fieldtype4G[$key]['dec'];         
              $KPI = $fieldtype4G[$key]['alias'];
              $newSiteStats =  (float)($stats_4G_post_newSite ['post'][$key]);
                  

              echo "<tr>";
                echo "<th>".$KPI."</th>";
                echo "<td>".number_format($newSiteStats,$decPlaces)."</th>";            
              echo "</tr>";
            }
        ?>

      </tbody>
    </table>
  </div>
</div> <!-- end first row -->


<div class="row">
  <div class="col-md-6">
    <h3>3G Traffic</h3>
    <?php $thisTable = "traffic"; ?>

    <table class="table table-hover table-inverse table-sm table-condensed" >
        <thead>
          <tr>     
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>

        <?php 
            foreach ($fieldtype3G as $key => $value) {

              $table = $fieldtype3G[$key]['table'];

              if ($table != $thisTable) {
                continue;
              }

              $decPlaces = $fieldtype3G[$key]['dec'];
              $arrowType = $fieldtype3G[$key]['arrow'];
              $KPI = $fieldtype3G[$key]['alias'];

              $newSiteStats = (float)($stats_3G_post_newSite['post'][0][$key]);
                     
              echo "<tr>";
                echo "<th>".$KPI."</th>";
                echo "<td>".number_format($newSiteStats,$decPlaces)."</th>";         
              echo "</tr>";
            }
        ?>

      </tbody>
    </table>
  </div>


  <div class="col-md-6">
    <h3>4G Traffic</h3>
    <?php $thisTable = "traffic"; ?>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
       
        <?php 
            foreach ($fieldtype4G as $key => $value) {

              $table = $fieldtype4G[$key]['table'];

              if ($table != $thisTable) {
                continue;
              }

              $decPlaces = $fieldtype4G[$key]['dec'];         
              $KPI = $fieldtype4G[$key]['alias'];
              $newSiteStats =  (float)($stats_4G_post_newSite ['post'][$key]);
                          
              echo "<tr>";
                echo "<th>".$KPI."</th>";
                echo "<td>".number_format($newSiteStats,$decPlaces)."</th>";            
              echo "</tr>";
            }
        ?>

      </tbody>
    </table>
  </div>
</div> <!-- end row --> 


<div class="row">
<div class="col-md-6">
    <h3> Congestion </h3>
    <?php $thisTable = "congestion" ?>

    <table class="table table-hover table-inverse table-sm table-condensed" >
        <thead>
          <tr>     
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>

        <?php 
            foreach ($fieldtype3G as $key => $value) {

              $table = $fieldtype3G[$key]['table'];

              if ($table != $thisTable) {
                continue;
              }

              $decPlaces = $fieldtype3G[$key]['dec'];
              $arrowType = $fieldtype3G[$key]['arrow'];
              $KPI = $fieldtype3G[$key]['alias'];

              $newSiteStats = (float)($stats_3G_post_newSite['post'][0][$key]);
                     
              echo "<tr>";
                echo "<th>".$KPI."</th>";
                echo "<td>".number_format($newSiteStats,$decPlaces)."</th>";         
              echo "</tr>";
            }
        ?>

      </tbody>
    </table>
</div>


<div class="col-md-6">
    <h3> 4G Basic </h3>
    <?php $thisTable = "basic"; ?>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
       
        <?php 
            foreach ($fieldtype4G as $key => $value) {

              $table = $fieldtype4G[$key]['table'];

              if ($table != $thisTable) {
                continue;
              }

              $decPlaces = $fieldtype4G[$key]['dec'];         
              $KPI = $fieldtype4G[$key]['alias'];
              $newSiteStats =  (float)($stats_4G_post_newSite ['post'][$key]);
                          
              echo "<tr>";
                echo "<th>".$KPI."</th>";
                echo "<td>".number_format($newSiteStats,$decPlaces)."</th>";            
              echo "</tr>";
            }
        ?>

      </tbody>
    </table>
  </div>

</div> <!-- end of third row -->



<div class="row">
<div class="col-md-6">
    <h3> Resources / Power (Busy Hour) </h3>
    <?php $thisTable = "Resource"; ?>

    <table class="table table-hover table-inverse table-sm table-condensed" >
        <thead>
          <tr>     
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>

        <?php 

            foreach ($fieldtype3G as $key => $value) {

              $table = $fieldtype3G[$key]['table'];

              if ($table != $thisTable) {
                continue;
              }

              $decPlaces = $fieldtype3G[$key]['dec'];
              $arrowType = $fieldtype3G[$key]['arrow'];
              $KPI = $fieldtype3G[$key]['alias'];

              $newSiteStats = (float)($stats_3G_bh_post_newSite['post'][0][$key]);



              echo "<tr>";
                echo "<th>".$KPI."</th>";
                echo "<td>".number_format($newSiteStats,$decPlaces)."</th>";         
              echo "</tr>";
            }
        ?>

      </tbody>
    </table>
</div>

<div class="col-md-6">
    <h3> Resources (4G) </h3>
    <?php $thisTable = "resources"; ?>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
       
        <?php 
            foreach ($fieldtype4G as $key => $value) {

              $table = $fieldtype4G[$key]['table'];

              if ($table != $thisTable) {
                continue;
              }

              $decPlaces = $fieldtype4G[$key]['dec'];         
              $KPI = $fieldtype4G[$key]['alias'];
              $newSiteStats =  (float)($stats_4G_post_newSite ['post'][$key]);
                          
              echo "<tr>";
                echo "<th>".$KPI."</th>";
                echo "<td>".number_format($newSiteStats,$decPlaces)."</th>";            
              echo "</tr>";
            }
        ?>

      </tbody>
    </table>
  </div>
</div>  <!-- end row -->

<div class="row">
<div class="col-md-6">
    <h3> RTWP </h3>
    <?php $thisTable = "rtwp"; ?>

    <table class="table table-hover table-inverse table-sm table-condensed" >
             <thead>
          <tr>     
          <th></th>
          <th></th>
          </tr>
        </thead>

        <tbody>

        <?php 
            foreach ($fieldtype3G as $key => $value) {

              $table = $fieldtype3G[$key]['table'];

              if ($table != $thisTable) {
                continue;
              }

              $decPlaces = $fieldtype3G[$key]['dec'];
              $arrowType = $fieldtype3G[$key]['arrow'];
              $KPI = $fieldtype3G[$key]['alias'];

              $newSiteStats = (float)($stats_3G_post_newSite['post'][0][$key]);
                     
              echo "<tr>";
                echo "<th>".$KPI."</th>";
                echo "<td>".number_format($newSiteStats,$decPlaces)."</th>";         
              echo "</tr>";
            }
        ?>

      </tbody>
    </table>  
</div>

<div class="col-md-6">
    <h3> Interference (4G) </h3>
    <?php $thisTable = "interference"; ?>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
       
        <?php 
            foreach ($fieldtype4G as $key => $value) {

              $table = $fieldtype4G[$key]['table'];

              if ($table != $thisTable) {
                continue;
              }

              $decPlaces = $fieldtype4G[$key]['dec'];         
              $KPI = $fieldtype4G[$key]['alias'];
              $newSiteStats =  (float)($stats_4G_post_newSite ['post'][$key]);
                          
              echo "<tr>";
                echo "<th>".$KPI."</th>";
                echo "<td>".number_format($newSiteStats,$decPlaces)."</th>";            
              echo "</tr>";
            }
        ?>

      </tbody>
    </table>
</div>
</div>  <!-- end row -->
</div> <!--end of tab --> 

<!-- =============================================================================== --> 
<!-- CLUSTER STATS --> 
<!-- =============================================================================== --> 

<div id="cluster" class="tab-pane fade">
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

        <table class="table table-hover table-inverse table-sm table-condensed" >
        <thead>
          <tr>
          <th></th>
          <th>Pre</th>
          <th>Post</th>
          <th>Delta</th>
          <th></th>
          </tr>
        </thead>

        <tbody>

        <?php 
            foreach ($fieldtype3G as $key => $value) {

              $table = $fieldtype3G[$key]['table'];

              if ($table != "main") {
                continue;
              }

              $decPlaces = $fieldtype3G[$key]['dec'];
              $arrowType = $fieldtype3G[$key]['arrow'];
              $KPI = $fieldtype3G[$key]['alias'];
              $pre = (float)($stats_3G_pre_cluster['pre'][0][$key]);
              $post = (float)($stats_3G_post_cluster_and_newSite['post'][0][$key]);
              $delta = (float)($post - $pre); 

              // SET ARROW DIRECTION = NORMAL
              
                if ($arrowType == "normal") {
                  
                  if ($delta > 0){
                    $arrow = "up";
                    $arrow_color = "green"; 
                  };

                  if ($delta < 0){
                    $arrow = "down";
                    $arrow_color = "red"; 
                  };

                  if ($delta == 0){
                    $arrow = "right";
                    $arrow_color = "blue"; 
                  };
                }

                // SET ARROW DIRECTION = INVSERE
                if ($arrowType == "inverse") {
                  if ($delta > 0){
                    $arrow = "up";
                    $arrow_color = "red"; 
                  };

                  if ($delta < 0){
                    $arrow = "down";
                    $arrow_color = "green"; 
                  };

                  if ($delta == 0){
                    $arrow = "right";
                    $arrow_color = "blue"; 
                  };
                }

                $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
          
                echo "<tr>";
                  echo "<th>".$KPI."</th>";
                  echo "<td>".number_format($pre,$decPlaces)."</th>";        
                  echo "<td>".number_format($post,$decPlaces)."</th>"; 
                  echo "<td>".number_format($delta,$decPlaces)."</th>"; 
                  echo "<td>".$glyph."</th>";        
                echo "</tr>";
            }
      ?>

      </tbody>
    </table>
  </div>


  <div class="col-md-6">
    <h3>MAIN 4G KPI (%)</h3>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th>Pre</th>
          <th>Post</th>
          <th>Delta</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

      <?php 
          foreach ($fieldtype4G as $key => $value) {

            $table = $fieldtype4G[$key]['table'];

            if ($table != "main") {
              continue;
            }

            $decPlaces = $fieldtype4G[$key]['dec'];
            $arrowType = $fieldtype4G[$key]['arrow'];
            $KPI = $fieldtype4G[$key]['alias'];
            $pre =  (float)($stats_4G_pre['pre'][$key]);
            $post =  (float)($stats_4G_post['post'][$key]);
            $delta = (float)($post - $pre); 

            // SET ARROW DIRECTION = NORMAL
            
            if ($arrowType == "normal") {
              
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "green"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "red"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            // SET ARROW DIRECTION = INVSERE
            if ($arrowType == "inverse") {
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "red"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "green"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
        
            echo "<tr>";
              echo "<th>".$KPI."</th>";
              echo "<td>".number_format($pre,$decPlaces)."</th>";        
              echo "<td>".number_format($post,$decPlaces)."</th>"; 
              echo "<td>".number_format($delta,$decPlaces)."</th>"; 
              echo "<td>".$glyph."</th>";        
            echo "</tr>";
          }
      ?>

      </tbody>
    </table>
  </div>
</div> <!-- end first row -->


<div class="row">
  <div class="col-md-6">
    <h3>3G Traffic</h3>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th>Pre</th>
          <th>Post</th>
          <th>Delta</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

      <?php 
          foreach ($fieldtype3G as $key => $value) {

            $table = $fieldtype3G[$key]['table'];

            if ($table != "traffic") {
              continue;
            }

            $decPlaces = $fieldtype3G[$key]['dec'];
            $arrowType = $fieldtype3G[$key]['arrow'];
            $KPI = $fieldtype3G[$key]['alias'];
            $pre = (float)($stats_3G_pre_cluster['pre'][0][$key]);
            $post =  (float)($stats_3G_post_cluster_and_newSite['post'][0][$key]);
            $delta = (float)($post - $pre);       
            
            // SET ARROW DIRECTION = NORMAL
            
            if ($arrowType == "normal") {
              
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "green"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "red"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            // SET ARROW DIRECTION = INVSERE
            if ($arrowType == "inverse") {
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "red"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "green"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
        
            echo "<tr>";
              echo "<th>".$KPI."</th>";
              echo "<td>".number_format($pre,$decPlaces)."</th>";        
              echo "<td>".number_format($post,$decPlaces)."</th>"; 
              echo "<td>".number_format($delta,$decPlaces)."</th>"; 
              echo "<td>".$glyph."</th>";        
            echo "</tr>";
          }
      ?>

      </tbody>
    </table>
  </div>


  <div class="col-md-6">
    <h3>4G Traffic</h3>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th>Pre</th>
          <th>Post</th>
          <th>Delta</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

      <?php 
          foreach ($fieldtype4G as $key => $value) {

            $table = $fieldtype4G[$key]['table'];

            if ($table != "traffic") {
              continue;
            }

            $decPlaces = $fieldtype4G[$key]['dec'];
            $arrowType = $fieldtype4G[$key]['arrow'];
            $KPI = $fieldtype4G[$key]['alias'];
            $pre =  (float)($stats_4G_pre['pre'][$key]);
            $post =  (float)($stats_4G_post['post'][$key]);
            $delta = (float)($post - $pre); 

            // SET ARROW DIRECTION = NORMAL
            
            if ($arrowType == "normal") {
              
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "green"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "red"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            // SET ARROW DIRECTION = INVSERE
            if ($arrowType == "inverse") {
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "red"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "green"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
        
            echo "<tr>";
              echo "<th>".$KPI."</th>";
              echo "<td>".number_format($pre,$decPlaces)."</th>";        
              echo "<td>".number_format($post,$decPlaces)."</th>"; 
              echo "<td>".number_format($delta,$decPlaces)."</th>"; 
              echo "<td>".$glyph."</th>";        
            echo "</tr>";
          }
      ?>

      </tbody>
    </table>
  </div>
</div>


<div class="row">
<div class="col-md-6">
    <h3> Congestion </h3>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th>Pre</th>
          <th>Post</th>
          <th>Delta</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

      <?php 
          foreach ($fieldtype3G as $key => $value) {

            $table = $fieldtype3G[$key]['table'];

            if ($table != "congestion") {
              continue;
            }

            $decPlaces = $fieldtype3G[$key]['dec'];
            $arrowType = $fieldtype3G[$key]['arrow'];
            $KPI = $fieldtype3G[$key]['alias'];
            $pre = (float)($stats_3G_pre_cluster['pre'][0][$key]);
            $post =  (float)($stats_3G_post_cluster_and_newSite['post'][0][$key]);
            $delta = (float)($post - $pre);   

            // SET ARROW DIRECTION = NORMAL
            
            if ($arrowType == "normal") {
              
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "green"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "red"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            // SET ARROW DIRECTION = INVSERE
            if ($arrowType == "inverse") {
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "red"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "green"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
        
            echo "<tr>";
              echo "<th>".$KPI."</th>";
              echo "<td>".number_format($pre,$decPlaces)."</th>";        
              echo "<td>".number_format($post,$decPlaces)."</th>"; 
              echo "<td>".number_format($delta,$decPlaces)."</th>"; 
              echo "<td>".$glyph."</th>";        
            echo "</tr>";
          }
      ?>

      </tbody>
    </table>
  </div>

<div class="col-md-6">
    <h3> 4G Basic </h3>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th>Pre</th>
          <th>Post</th>
          <th>Delta</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

      <?php 
          foreach ($fieldtype4G as $key => $value) {

            $table = $fieldtype4G[$key]['table'];

            if ($table != "basic") {
              continue;
            }

            $decPlaces = $fieldtype4G[$key]['dec'];
            $arrowType = $fieldtype4G[$key]['arrow'];
            $KPI = $fieldtype4G[$key]['alias'];
            $pre =  (float)($stats_4G_pre['pre'][$key]);
            $post =  (float)($stats_4G_post['post'][$key]);
            $delta = (float)($post - $pre); 

            // SET ARROW DIRECTION = NORMAL
            
            if ($arrowType == "normal") {
              
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "green"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "red"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            // SET ARROW DIRECTION = INVSERE
            if ($arrowType == "inverse") {
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "red"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "green"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
        
            echo "<tr>";
              echo "<th>".$KPI."</th>";
              echo "<td>".number_format($pre,$decPlaces)."</th>";        
              echo "<td>".number_format($post,$decPlaces)."</th>"; 
              echo "<td>".number_format($delta,$decPlaces)."</th>"; 
              echo "<td>".$glyph."</th>";        
            echo "</tr>";
          }
      ?>

      </tbody>
    </table>
  </div>

</div> <!-- end of third row -->



<div class="row">

<div class="col-md-6">
    <h3> Resources (Busy Hour) </h3>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th>Pre</th>
          <th>Post</th>
          <th>Delta</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

      <?php 
          foreach ($fieldtype3G as $key => $value) {

            $table = $fieldtype3G[$key]['table'];

            if ($table != "Resource") {
              continue;
            }

            $decPlaces = $fieldtype3G[$key]['dec'];
            $arrowType = $fieldtype3G[$key]['arrow'];
            $KPI = $fieldtype3G[$key]['alias'];            
            $pre = (float)$stats_3G_bh_pre_cluster['pre'][0][$key];
            //var_dump($stats_pre_3G_daily_bh);
            $post = (float)$stats_3G_bh_post_cluster_and_newSite['post'][0][$key];
            $delta = (float)$post - $pre;

            // SET ARROW DIRECTION = NORMAL
            
            if ($arrowType == "normal") {
              
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "green"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "red"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            // SET ARROW DIRECTION = INVSERE
            if ($arrowType == "inverse") {
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "red"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "green"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
        
            echo "<tr>";
              echo "<th>".$KPI."</th>";
              echo "<td>".number_format($pre,$decPlaces)."</th>";        
              echo "<td>".number_format($post,$decPlaces)."</th>"; 
              echo "<td>".number_format($delta,$decPlaces)."</th>"; 
              echo "<td>".$glyph."</th>";        
            echo "</tr>";
          }
      ?>

      </tbody>
    </table>
  </div>

<div class="col-md-6">
    <h3> Resources (4G) </h3>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th>Pre</th>
          <th>Post</th>
          <th>Delta</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

      <?php 
          foreach ($fieldtype4G as $key => $value) {

            $table = $fieldtype4G[$key]['table'];

            if ($table != "resources") {
              continue;
            }

            $decPlaces = $fieldtype4G[$key]['dec'];
            $arrowType = $fieldtype4G[$key]['arrow'];
            $KPI = $fieldtype4G[$key]['alias'];
            $pre =  (float)($stats_4G_pre['pre'][$key]);
            $post =  (float)($stats_4G_post['post'][$key]);
            $delta = (float)($post - $pre); 

            // SET ARROW DIRECTION = NORMAL
            
            if ($arrowType == "normal") {
              
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "green"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "red"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            // SET ARROW DIRECTION = INVSERE
            if ($arrowType == "inverse") {
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "red"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "green"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
        
            echo "<tr>";
              echo "<th>".$KPI."</th>";
              echo "<td>".number_format($pre,$decPlaces)."</th>";        
              echo "<td>".number_format($post,$decPlaces)."</th>"; 
              echo "<td>".number_format($delta,$decPlaces)."</th>"; 
              echo "<td>".$glyph."</th>";        
            echo "</tr>";
          }
      ?>

      </tbody>
    </table>
  </div>


</div>  <!-- end row -->

<div class="row">

<div class="col-md-6">
    <h3> RTWP </h3>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th>Pre</th>
          <th>Post</th>
          <th>Delta</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

      <?php 
          foreach ($fieldtype3G as $key => $value) {

            $table = $fieldtype3G[$key]['table'];

            if ($table != "rtwp") {
              continue;
            }

            $decPlaces = $fieldtype3G[$key]['dec'];
            $arrowType = $fieldtype3G[$key]['arrow'];
            $KPI = $fieldtype3G[$key]['alias'];            
            $pre = (float)$stats_3G_pre_cluster['pre'][0][$key];
            //var_dump($stats_pre_3G_daily_bh);
            $post = (float)$stats_3G_post_cluster_and_newSite['post'][0][$key];
            $delta = (float)$post - $pre;

            // SET ARROW DIRECTION = NORMAL
            
            if ($arrowType == "normal") {
              
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "green"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "red"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            // SET ARROW DIRECTION = INVSERE
            if ($arrowType == "inverse") {
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "red"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "green"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
        
            echo "<tr>";
              echo "<th>".$KPI."</th>";
              echo "<td>".number_format($pre,$decPlaces)."</th>";        
              echo "<td>".number_format($post,$decPlaces)."</th>"; 
              echo "<td>".number_format($delta,$decPlaces)."</th>"; 
              echo "<td>".$glyph."</th>";        
            echo "</tr>";
          }
      ?>

      </tbody>
    </table>
  </div>

<div class="col-md-6">
    <h3> Interference (4G) </h3>

    <table class="table table-hover table-inverse table-sm table-condensed" >
      <thead>
        <tr>
          <th></th>
          <th>Pre</th>
          <th>Post</th>
          <th>Delta</th>
          <th></th>
        </tr>
      </thead>

      <tbody>

      <?php 
          foreach ($fieldtype4G as $key => $value) {

            $table = $fieldtype4G[$key]['table'];

            if ($table != "interference") {
              continue;
            }

            $decPlaces = $fieldtype4G[$key]['dec'];
            $arrowType = $fieldtype4G[$key]['arrow'];
            $KPI = $fieldtype4G[$key]['alias'];
            $pre =  (float)($stats_4G_pre['pre'][$key]);
            $post =  (float)($stats_4G_post['post'][$key]);
            $delta = (float)($post - $pre); 

            // SET ARROW DIRECTION = NORMAL
            
            if ($arrowType == "normal") {
              
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "green"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "red"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            // SET ARROW DIRECTION = INVSERE
            if ($arrowType == "inverse") {
              if ($delta > 0){
                $arrow = "up";
                $arrow_color = "red"; 
              };

              if ($delta < 0){
                $arrow = "down";
                $arrow_color = "green"; 
              };

              if ($delta == 0){
                $arrow = "right";
                $arrow_color = "blue"; 
              };
            }

            $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
        
            echo "<tr>";
              echo "<th>".$KPI."</th>";
              echo "<td>".number_format($pre,$decPlaces)."</th>";        
              echo "<td>".number_format($post,$decPlaces)."</th>"; 
              echo "<td>".number_format($delta,$decPlaces)."</th>"; 
              echo "<td>".$glyph."</th>";        
            echo "</tr>";
          }
      ?>

      </tbody>
    </table>
  </div>


</div>  <!-- end row -->
</div>


<!-- =============================================================================== --> 
<!-- CARRIER STATS --> 
<!-- =============================================================================== --> 

    <div id="carrier" class="tab-pane fade">
      <br>

      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-danger">
            <strong>Note:</strong> carrier stats are based on "new site" input fields and "post" dates.
          </div>
        </div>
      </div>

       <div class="row">
        <div class="col-md-6">
     
        <h3> Main KPI </h3>
 
          <table class="table table-hover table-inverse table-sm table-condensed" >
            <thead>
              <tr>
                <th></th>
                <th>U09-1</th>
                <th>U09-2</th>
                <th>U21-1</th>
                <th>U21-2</th>
                <th>U21-3</th>
              </tr>
            </thead>

            <tbody>

            <?php 
                foreach ($fieldtype3G as $key => $value) {

                  $table = $fieldtype3G[$key]['table'];

                  if ($table != "main") {
                    continue;
                  }

                  $decPlaces = $fieldtype3G[$key]['dec'];
                  $arrowType = $fieldtype3G[$key]['arrow'];
                  $KPI = $fieldtype3G[$key]['alias'];
                  $stats_u09f1 = (float)($stats_pre_carrier_u09f1[0][$key]);
                  $stats_u09f2 = (float)($stats_pre_carrier_u09f2[0][$key]);
                  $stats_u21f1 = (float)($stats_pre_carrier_u21f1[0][$key]);
                  $stats_u21f2 = (float)($stats_pre_carrier_u21f2[0][$key]);
                  $stats_u21f3 = (float)($stats_pre_carrier_u21f3[0][$key]);
                  
                  // SET ARROW DIRECTION = NORMAL
                  
                  if ($arrowType == "normal") {
                    
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "green"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "red"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  // SET ARROW DIRECTION = INVSERE
                  if ($arrowType == "inverse") {
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "red"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "green"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
              
                  echo "<tr>";
                    echo "<th>".$KPI."</th>";
                    echo "<td>".number_format($stats_u09f1,$decPlaces)."</th>";        
                    echo "<td>".number_format($stats_u09f2,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f1,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f2,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f3,$decPlaces)."</th>";                            
                  echo "</tr>";
                }
            ?>

            </tbody>
          </table>
        </div>
      </div> <!-- end of row -->



      <div class="row">
        <div class="col-md-6">
          <h3> Traffic </h3>

          <table class="table table-hover table-inverse table-sm table-condensed" >
            <thead>
              <tr>
                <th></th>
                <th>U09-1</th>
                <th>U09-2</th>
                <th>U21-1</th>
                <th>U21-2</th>
                <th>U21-3</th>
              </tr>
            </thead>

            <tbody>

            <?php 
                foreach ($fieldtype3G as $key => $value) {

                  $table = $fieldtype3G[$key]['table'];

                  if ($table != "traffic") {
                    continue;
                  }

                  $decPlaces = $fieldtype3G[$key]['dec'];
                  $arrowType = $fieldtype3G[$key]['arrow'];
                  $KPI = $fieldtype3G[$key]['alias'];
                  $stats_u09f1 = (float)($stats_pre_carrier_u09f1[0][$key]);
                  $stats_u09f2 = (float)($stats_pre_carrier_u09f2[0][$key]);
                  $stats_u21f1 = (float)($stats_pre_carrier_u21f1[0][$key]);
                  $stats_u21f2 = (float)($stats_pre_carrier_u21f2[0][$key]);
                  $stats_u21f3 = (float)($stats_pre_carrier_u21f3[0][$key]);
                  
                  // SET ARROW DIRECTION = NORMAL
                  
                  if ($arrowType == "normal") {
                    
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "green"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "red"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  // SET ARROW DIRECTION = INVSERE
                  if ($arrowType == "inverse") {
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "red"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "green"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
              
                  echo "<tr>";
                    echo "<th>".$KPI."</th>";
                    echo "<td>".number_format($stats_u09f1,$decPlaces)."</th>";        
                    echo "<td>".number_format($stats_u09f2,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f1,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f2,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f3,$decPlaces)."</th>";                            
                  echo "</tr>";
                }
            ?>

            </tbody>
          </table>
        </div>
      </div> <!-- end of row -->

  <div class="row">
        <div class="col-md-6">
     
        <h3> Congestion </h3>
 
          <table class="table table-hover table-inverse table-sm table-condensed" >
            <thead>
              <tr>
                <th></th>
                <th>U09-1</th>
                <th>U09-2</th>
                <th>U21-1</th>
                <th>U21-2</th>
                <th>U21-3</th>
              </tr>
            </thead>

            <tbody>

            <?php 
                foreach ($fieldtype3G as $key => $value) {

                  $table = $fieldtype3G[$key]['table'];

                  if ($table != "congestion") {
                    continue;
                  }

                  $decPlaces = $fieldtype3G[$key]['dec'];
                  $arrowType = $fieldtype3G[$key]['arrow'];
                  $KPI = $fieldtype3G[$key]['alias'];
                  $stats_u09f1 = (float)($stats_pre_carrier_u09f1[0][$key]);
                  $stats_u09f2 = (float)($stats_pre_carrier_u09f2[0][$key]);
                  $stats_u21f1 = (float)($stats_pre_carrier_u21f1[0][$key]);
                  $stats_u21f2 = (float)($stats_pre_carrier_u21f2[0][$key]);
                  $stats_u21f3 = (float)($stats_pre_carrier_u21f3[0][$key]);
                  
                  // SET ARROW DIRECTION = NORMAL
                  
                  if ($arrowType == "normal") {
                    
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "green"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "red"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  // SET ARROW DIRECTION = INVSERE
                  if ($arrowType == "inverse") {
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "red"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "green"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
              
                  echo "<tr>";
                    echo "<th>".$KPI."</th>";
                    echo "<td>".number_format($stats_u09f1,$decPlaces)."</th>";        
                    echo "<td>".number_format($stats_u09f2,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f1,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f2,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f3,$decPlaces)."</th>";                            
                  echo "</tr>";
                }
            ?>

            </tbody>
          </table>
        </div>
      </div> <!-- end of row -->


  <div class="row">
        <div class="col-md-6">
     
        <h3> Resources (Busy Hour) </h3>
 
          <table class="table table-hover table-inverse table-sm table-condensed" >
            <thead>
              <tr>
                <th></th>
                <th>U09-1</th>
                <th>U09-2</th>
                <th>U21-1</th>
                <th>U21-2</th>
                <th>U21-3</th>
              </tr>
            </thead>

            <tbody>

            <?php 
                foreach ($fieldtype3G as $key => $value) {

                  $table = $fieldtype3G[$key]['table'];

                  if ($table != "Resource") {
                    continue;
                  }

                  $decPlaces = $fieldtype3G[$key]['dec'];
                  $arrowType = $fieldtype3G[$key]['arrow'];
                  $KPI = $fieldtype3G[$key]['alias'];
                  $stats_u09f1 = (float)($stats_carrier_bh_u09f1[0][$key]);

                  //var_dump($stats_carrier_bh_u09f1);
                  $stats_u09f2 = (float)($stats_carrier_bh_u09f2[0][$key]);
                  $stats_u21f1 = (float)($stats_carrier_bh_u21f1[0][$key]);
                  $stats_u21f2 = (float)($stats_carrier_bh_u21f2[0][$key]);
                  $stats_u21f3 = (float)($stats_carrier_bh_u21f3[0][$key]);
                  
                  // SET ARROW DIRECTION = NORMAL
                  
                  if ($arrowType == "normal") {
                    
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "green"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "red"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  // SET ARROW DIRECTION = INVSERE
                  if ($arrowType == "inverse") {
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "red"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "green"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
              
                  echo "<tr>";
                    echo "<th>".$KPI."</th>";
                    echo "<td>".number_format($stats_u09f1,$decPlaces)."</th>";        
                    echo "<td>".number_format($stats_u09f2,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f1,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f2,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_u21f3,$decPlaces)."</th>";                            
                  echo "</tr>";
                }
            ?>

            </tbody>
          </table>
        </div>
      </div> <!-- end of row -->

    </div>

<!-- =============================================================================== --> 
<!-- SECTOR STATS --> 
<!-- =============================================================================== --> 


    <div id="sector" class="tab-pane fade">
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-danger">
            <strong>Note:</strong> sector stats are based on "new site"  input fields and "post" dates.
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
     
        <h3> Main KPI </h3>
 
          <table class="table table-hover table-inverse table-sm table-condensed" >
            <thead>
              <tr>
                <th></th>
                <th>S1</th>
                <th>S2</th>
                <th>S3</th>
  
              </tr>
            </thead>

            <tbody>

            <?php 
                foreach ($fieldtype3G as $key => $value) {

                  $table = $fieldtype3G[$key]['table'];

                  if ($table != "main") {
                    continue;
                  }

                  $decPlaces = $fieldtype3G[$key]['dec'];
                  $arrowType = $fieldtype3G[$key]['arrow'];
                  $KPI = $fieldtype3G[$key]['alias'];
                  $stats_S1 = (float)($stats_pre_sector_S1['pre'][0][$key]);
                  $stats_S2 = (float)($stats_pre_sector_S2['pre'][0][$key]);
                  $stats_S3 = (float)($stats_pre_sector_S3['pre'][0][$key]);

                  
                  // SET ARROW DIRECTION = NORMAL
                  
                  if ($arrowType == "normal") {
                    
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "green"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "red"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  // SET ARROW DIRECTION = INVSERE
                  if ($arrowType == "inverse") {
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "red"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "green"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
              
                  echo "<tr>";
                    echo "<th>".$KPI."</th>";
                    echo "<td>".number_format($stats_S1,$decPlaces)."</th>";        
                    echo "<td>".number_format($stats_S2,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_S3,$decPlaces)."</th>"; 
                          
                  echo "</tr>";
                }
            ?>

            </tbody>
          </table>
        </div>
      </div> <!-- end of row -->



      <div class="row">
        <div class="col-md-6">
          <h3> Traffic </h3>

          <table class="table table-hover table-inverse table-sm table-condensed" >
            <thead>
              <tr>
                <th></th>
                <th>S1</th>
                <th>S2</th>
                <th>S3</th>
              </tr>
            </thead>

            <tbody>

            <?php 
                foreach ($fieldtype3G as $key => $value) {

                  $table = $fieldtype3G[$key]['table'];

                  if ($table != "traffic") {
                    continue;
                  }

                  $decPlaces = $fieldtype3G[$key]['dec'];
                  $arrowType = $fieldtype3G[$key]['arrow'];
                  $KPI = $fieldtype3G[$key]['alias'];
                  $stats_S1 = (float)($stats_pre_sector_S1['pre'][0][$key]);
                  $stats_S2 = (float)($stats_pre_sector_S2['pre'][0][$key]);
                  $stats_S3 = (float)($stats_pre_sector_S3['pre'][0][$key]);


                  
                  // SET ARROW DIRECTION = NORMAL
                  
                  if ($arrowType == "normal") {
                    
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "green"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "red"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  // SET ARROW DIRECTION = INVSERE
                  if ($arrowType == "inverse") {
                    if ($delta > 0){
                      $arrow = "up";
                      $arrow_color = "red"; 
                    };

                    if ($delta < 0){
                      $arrow = "down";
                      $arrow_color = "green"; 
                    };

                    if ($delta == 0){
                      $arrow = "right";
                      $arrow_color = "blue"; 
                    };
                  }

                  $glyph = " <span class='glyphicon glyphicon-arrow-".$arrow."' style='color:".$arrow_color."'></span>";
              
                  echo "<tr>";
                    echo "<th>".$KPI."</th>";
                    echo "<td>".number_format($stats_S1,$decPlaces)."</th>";        
                    echo "<td>".number_format($stats_S2,$decPlaces)."</th>"; 
                    echo "<td>".number_format($stats_S3,$decPlaces)."</th>"; 
                           
                  echo "</tr>";
                }
            ?>

            </tbody>
          </table>
        </div>
      </div> <!-- end of row -->
    </div>
  </div>
</div>

<!-- ===================================================================== --> 

 
</div> <!-- end of container -->

</body>


<footer>

<script src="chosen.jquery.js" type="text/javascript"></script>

<script type="text/javascript">
  var config = {
    '.chosen-select'           : {},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
  }
  for (var selector in config) {
    $(selector).chosen(config[selector]);
  }

</script>

<script type="text/javascript">
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>


  </footer>

</html>
