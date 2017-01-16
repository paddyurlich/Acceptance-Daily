
<!--
NOTES:


3G cell level stats for cluster cells - used for delta stats
========================================================================
$stats_3G_cell_cluster_pre = returnStats3G_cell($selectedCells_3G_cluster, $startDate, $endDate);
$stats_3G_cell_cluster_post = returnStats3G_cell($selectedCells_3G_cluster, $startDate_post, $endDate_post);

3G cell level busy hour stats for cluster cells - used for delta stats
========================================================================
$stats_3G_cell_bh_cluster_pre = returnStats3G_cell_daily_bh($selectedCells_3G_cluster, $startDate, $endDate); 
$stats_3G_cell_bh_cluster_post = returnStats3G_cell_daily_bh($selectedCells_3G_cluster, $startDate_post, $endDate_post); 

main_function_3G_cell.php

main_function_3G_cell_bh.php



-->
<table table id="cell_3G_delta" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>   
            <th>Cell Name</th>
            <th>Total Revenue Delta ($)</th>
            <th>TCP Util Delta (%)</th>
        </tr>
    </thead>


    <tbody>
        <?php
            foreach ($stats_3G_cell_cluster_pre as $key=>$value ){  
                $cell = $key;

                $total_revenue_pre =  $stats_3G_cell_cluster_pre[$key]['Total Revenue ($)'];
                $total_revenue_post =  $stats_3G_cell_cluster_post[$key]['Total Revenue ($)'];
                $total_revenue_delta = $total_revenue_post - $total_revenue_pre;
                $total_revenue_delta = number_format($total_revenue_delta,2);

                $tcpUtil_pre =  $stats_3G_cell_bh_cluster_pre[$key]['TCP Util(%)'];
                $tcpUtil_post =  $stats_3G_cell_bh_cluster_post[$key]['TCP Util(%)'];
                $tcpUtil_delta = $tcpUtil_post - $tcpUtil_pre;
                $tcpUtil_delta = number_format($tcpUtil_delta,2);
    
                echo "<tr>";       
                    echo "<td>".$cell."</td>";  
                    echo "<td style=`color:red'>".$total_revenue_delta."</td>";   
                    echo "<td>".$tcpUtil_delta."</td>";           
                echo "</tr>";      
            }            
        ?>
    </tbody>
</table>



