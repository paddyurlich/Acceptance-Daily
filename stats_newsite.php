
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
