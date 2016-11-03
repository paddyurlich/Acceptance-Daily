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

            if ($table != $thisTable) {
              continue;
            }

            $decPlaces = $fieldtype4G[$key]['dec'];
            $arrowType = $fieldtype4G[$key]['arrow'];
            $KPI = $fieldtype4G[$key]['alias'];
            $pre = (float)($stats_4G_pre_cluster['pre'][$key]);
            $post = (float)($stats_4G_post_cluster_and_newSite['post'][$key]);
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