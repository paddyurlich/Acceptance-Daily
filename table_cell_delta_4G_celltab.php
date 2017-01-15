<table table id="cell_3G" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>   
            <th>Cell Name</th>
            <th>Total Revenue Delta ($)</th>
        </tr>
    </thead>

    <?php

    ?>

    <tbody>
        <?php
            foreach ($stats_4G_cell_cluster_pre as $key=>$value ){  
                $cell = $key;
                $total_revenue_pre =  $stats_4G_cell_cluster_pre[$key]['4G Revenue ($)'];
                $total_revenue_post =  $stats_4G_cell_cluster_post[$key]['4G Revenue ($)'];
                $total_revenue_delta = $total_revenue_post - $total_revenue_pre;
     
                echo "<tr>";       
                    echo "<th>".$cell."</th>";  
                    echo "<td>".$total_revenue_delta."</td>";                
                echo "</tr>";                
            }
        ?>
    </tbody>
  </table>


