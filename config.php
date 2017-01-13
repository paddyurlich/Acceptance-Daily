<?php

$testvar = 5;

//connection();

//global $username, $servername, $password, $dbname;

    $work_environment = "local";
 
    if ($work_environment = "local") {
        $servername = "localhost:8889";
        $username = "root";
        $password = "root";
        $dbname = "AcceptanceStats";
    } else {
        $servername = "172.21.200.37";
        $username = "patrickurlich";
        $password = "forPUonly";
        $dbname = "ranPU";
    }   


    // Create connection
    //$connect = new mysqli($servername, $username, $password, $dbname);
    $connect = mysqli_connect($servername, $username,$password,$dbname); 
    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }  
    
    //var_dump($dbname);

    function connection(){

    }



?>