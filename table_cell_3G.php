
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


    // ===========================
    // create cell name array
    // ===========================
    unset($table_cell);
    $table_cell = array_keys($stats_cell);
    //var_dump($table_cells);
    // ===========================


    // ===========================
    // table data
    // ===========================
    unset($tableData);
    foreach($stats_cell as $key=>$value){
        foreach($value as $k=> $v){
        //echo $v." ";
        $tableData[] = $v; 
        }  
    }
    // ===========================
?>

<!-- <table class="table table-hover table-inverse table-sm table-condensed" > -->
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
                    $tableData[] = $v; 
                }  
                echo "</tr>";
            }
        ?>
    </tbody>
  </table>


