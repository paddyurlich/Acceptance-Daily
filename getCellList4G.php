<?php 

function getCellList4G(){

    $table = "Acceptance_Stats_4G_daily";

    global $dbname; 
    global $servername;
    global $username;
    global $password;
    global $connect;

    $connect = mysqli_connect($servername, $username,$password,$dbname);   

    //==========================================
    //get list of cells from Acceptance Stats table
    //==========================================

    $table = "Acceptance_Stats_4G_daily";
    $sql = "SELECT Object from `".$dbname."`.`".$table."`"." GROUP BY Object ORDER BY $table.Object ASC";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $result_array[] = $row;
        }
    } else {
        echo "WARNING: error with getCellList function";
    }


     foreach($result_array as $k => $v) {
         $cellList_array[] =  $result_array[$k]['Object'];
     }

      $cellList_array = array_unique($cellList_array);

      $connect->close();

      return $cellList_array;
}



?>