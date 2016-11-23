
<?php
// ===========================
// create headings array
// ===========================
unset($headings);
foreach($stats_sector_carrier as $key=>$value){
    foreach($value as $k=> $v){
        //echo $k."<br>";
        $headings[] = $k;       
      }   
}
$headings = array_unique($headings);
//============================


// ===========================
// create cell name array
// ===========================
$table_cells = array_keys($stats_sector_carrier);
// ===========================


// ===========================
// table data
// ===========================
foreach($stats_sector_carrier as $key=>$value){
    foreach($value as $k=> $v){
      //echo $v." ";
      $tableData[] = $v; 
    }  
}
// ===========================


?>



<!-- <table class="table table-hover table-inverse table-sm table-condensed" > -->
<table table id="sector_carrier" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <?php foreach ($headings as $heading){
                echo "<th>".$heading."</th>";
            }
            ?>
        </tr>
    </thead>

    <tbody>
        <?php foreach($stats_sector_carrier as $key=>$value){
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


