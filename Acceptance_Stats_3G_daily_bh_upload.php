
<?php
//#!/usr/bin/env php

      $servername = "172.21.200.37";
      $username = "patrickurlich";
      $password = "forPUonly";
      $dbname = "ranPU";
      $table = "Acceptance_Stats_3G_daily_bh_new";

      // Create connection
      $connect = mysqli_connect($servername, $username,$password,$dbname); 
      // Check connection
      if ($connect->connect_error) {
          die("Connection failed: " . $connect->connect_error);
      } 

      

$sql = "LOAD DATA INFILE 'Acceptance_Stats_3G_daily_bh_new.csv'
        INTO TABLE Acceptance_Stats_3G_daily_bh_new
        FIELDS TERMINATED BY ','
        OPTIONALLY ENCLOSED BY '\"' 
        LINES TERMINATED BY ',,,\\r\\n'
        IGNORE 8 LINES 
        (@Date,'RNC','Cell ID','Cell Name','NodeB Name','Integrity','Non-HS TCP Max(dBm)','Non-HS TCP Mean(dBm)','Non-HS TCP Min(dBm)','TCP Max(dBm)','TCP Mean(dBm)','TCP Min(dBm)','RTWP Max(dBm)','RTWP Mean(dBm)','RTWP Min(dBm)')
        SET Date = STR_TO_DATE(@Date, '%b-%d-%Y %h:%i:%s %p')";

$connect->query($sql);
$connect->close();

?>