<?php
function getRevenueFigures(){
	
    $table = "revenue_figures";

    global $dbname; 
    global $servername;
    global $username;
    global $password;
    global $connect;

    $connect = mysqli_connect($servername, $username,$password,$dbname);    

    //==========================================
    //get date list from Acceptance stats table - and use for dropdown menus.
    //==========================================

    
    $table = "revenue_figures";
    $sql = "SELECT * from `".$dbname."`.`".$table."`";
    $result = $connect->query($sql);

    //var_dump($result);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $result_array = $row;

        }
    } else {
        echo "ERROR: problem with getRevenueFigures function !!";
    }


    $connect->close();

   	//var_dump($result_array);

   	return $result_array;
   }

getRevenueFigures();

?>