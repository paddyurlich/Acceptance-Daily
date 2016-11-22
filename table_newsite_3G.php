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
