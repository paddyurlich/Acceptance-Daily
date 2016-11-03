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

        if ($table != $thisTable) {
        continue;
        }

        $decPlaces = $fieldtype3G[$key]['dec'];
        $arrowType = $fieldtype3G[$key]['arrow'];
        $KPI = $fieldtype3G[$key]['alias'];
        $stats_u09f1 = (float)($stats_post_carrier_u09f1[0][$key]);
        $stats_u09f2 = (float)($stats_post_carrier_u09f2[0][$key]);
        $stats_u21f1 = (float)($stats_post_carrier_u21f1[0][$key]);
        $stats_u21f2 = (float)($stats_post_carrier_u21f2[0][$key]);
        $stats_u21f3 = (float)($stats_post_carrier_u21f3[0][$key]);
        
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
