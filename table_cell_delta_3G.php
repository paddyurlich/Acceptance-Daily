<table table id="cell_3G_delta" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>   
            <th>Cell Name</th>
            <th>Total Revenue Delta ($)</th>
        </tr>
    </thead>


    <tbody>
        <?php
            foreach ($stats_3G_cell_cluster_pre as $key=>$value ){  
                $cell = $key;
                $total_revenue_pre =  $stats_3G_cell_cluster_pre[$key]['Total Revenue ($)'];
                $total_revenue_post =  $stats_3G_cell_cluster_post[$key]['Total Revenue ($)'];
                $total_revenue_delta = $total_revenue_post - $total_revenue_pre;
     
                echo "<tr>";       
                    echo "<th>".$cell."</th>";  
                    echo "<td>".$total_revenue_delta."</td>";                
                echo "</tr>";                
            }
        ?>
    </tbody>
  </table>


