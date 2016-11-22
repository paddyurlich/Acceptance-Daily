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