
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

        if ($table != $thisTable) {
          continue;
        }

        $decPlaces = $fieldtype3G[$key]['dec'];
        $arrowType = $fieldtype3G[$key]['arrow'];
        $KPI = $fieldtype3G[$key]['alias'];
        $stats_S1 = (float)($stats_post_sector_bh_S1['post'][0][$key]);
        $stats_S2 = (float)($stats_post_sector_bh_S2['post'][0][$key]);
        $stats_S3 = (float)($stats_post_sector_bh_S3['post'][0][$key]);

        
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
