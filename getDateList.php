<?php

function getDateList(){
    
    //==========================================
    //get date list from Acceptance stats table - and use for dropdown menus.
    //==========================================

    global $dbname; 
    global $servername;
    global $username;
    global $password;
    global $connect;

    $connect = mysqli_connect($servername, $username,$password,$dbname); 
    
    $table = "Acceptance_Stats_3G_daily";

    //$sql = "SELECT Date from `ranPU`.`".$table."`"." GROUP BY Date ORDER BY $table.Date ASC";
    $sql = 'SELECT Date from '.$dbname.".".$table." GROUP BY Date ORDER BY ".$table.".Date ASC";
    //echo $sql;

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $result_array[] = $row;

        }
    } else {
        echo "<br/>ERROR: problem with getDateList function !!";
    }

     foreach($result_array as $k => $v) {
          //$dateList_array[] =  substr($result_array[$k]['Date'],0,-9);
          $dateList_array[] = $result_array[$k]['Date'];
     }

      	$dateList_array = array_unique($dateList_array);

      $connect->close();

   		return $dateList_array;

}
getDateList()

?>
