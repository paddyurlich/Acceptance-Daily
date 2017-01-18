
<?php
    // ===========================
    // create headings array
    // ===========================
    unset($headings);
    foreach($stats_cell as $key=>$value){
        foreach($value as $k=> $v){
        $headings[] = $k;
        
        }  
    }
    $headings = array_unique($headings);
    //var_dump($headings);
    //============================
?>

<table table id="cell_3G" class="display" cellspacing="0" width="100%">
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
        <?php 
            foreach($stats_cell as $key=>$value){
                echo "<tr>";
                foreach($value as $k=> $v){                    
                    echo "<td>".$v." "."</td>";
       
                }  
                echo "</tr>";
            }
        ?>
    </tbody>
  </table>


