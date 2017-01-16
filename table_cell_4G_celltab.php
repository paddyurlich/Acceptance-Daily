<?php
// ===========================
// create headings array
// ===========================
    unset($headings);
    foreach($stats_4G_cell as $key=>$value){
        foreach($value as $k=> $v){
        $headings[] = $k; 
        }  
    }
    $headings = array_unique($headings);
?>

<table table id="cell_4G_celltab" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <?php 
                foreach ($headings as $heading){
                    echo "<th>".$heading."</th>";                
                }
            ?>
        </tr>
    </thead>

    <tbody>
        <?php foreach($stats_4G_cell as $key=>$value){
            echo "<tr>";
                foreach($value as $k=> $v){
                
                echo "<td>".$v." "."</td>";
                //$tableData[] = $v; 
                }  
            echo "</tr>";
        }

        ?>
    </tbody>
  </table>


