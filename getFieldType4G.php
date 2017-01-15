<?php 

function getFieldType4G(){




    $table = "Acceptance_Stats_4G_field_type";

    global $dbname; 
    global $servername;
    global $username;
    global $password;
    global $connect;

    $connect = mysqli_connect($servername, $username,$password,$dbname); 

    //==========================================
    //get list of cells from Acceptance Stats table
    //==========================================

    
    $table = "Acceptance_Stats_4G_field_type";
    $sql = "SELECT * from `".$dbname."`.`".$table."`";
    //echo $sql;

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $result_array[$row['field_name']] = $row;
        }
    } else {
        echo "WARNING: error with getFieldType4G function";
    }


     // foreach($result_array as $k => $v) {
     //     $field_type_3G_array[] =  $result_array[$k]['CELLNAME'];
     // }



      $connect->close();

      return $result_array;
      //var_dump($result_array);
}

//getFieldType_3G();

?>

