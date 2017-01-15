<?php
    
function returnStats3G_carrier_daily_bh($carrier, $selection, $startDate, $endDate){

  if (isset($carrier, $selection, $startDate, $endDate)) {

      set_time_limit(360);

      //=============================
      // database connection
      //=============================  

      global $dbname; 
      global $servername;
      global $username;
      global $password;
      global $connect;

      $connect = mysqli_connect($servername, $username,$password,$dbname);
      //======================================================
      // BUILD SELECTED CELLS STRING
      //======================================================

      $selectedCells = "";

      foreach ($selection as $selectedCell) {
        $selectedCells .= " CELLNAME = '".$selectedCell."' OR ";
      }
      $selectedCells = substr($selectedCells, 0, -3); //remove last "OR" from end of SQL string

      //=====================================================
      // GET FIELD NAMES FROM TABLE
      //=====================================================

      $sql = ("SHOW COLUMNS FROM Acceptance_Stats_3G_daily_bh");

      $result = $connect->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              $KPI_field_array[] = $row;
          }
      } else {
          echo "0 results";
      }

      $size_of_KPI_array =  count($KPI_field_array) - 1;

      //======================================================
      // CREATE SQL QUERRY STRING - FOR CALULATED KPIS
      //======================================================
             
      $sql_string_first =   "AVG((( pow(10, (`ranPU`.`Acceptance_Stats_3G_daily_bh`.`TCP Mean(dBm)` / 10))
                            / 1000)
                            / if((`ranPU`.`Acceptance_Stats_3G_daily_bh`.`TCP Max(dBm)` > 43), 40, 20))
                            * 100)
                            AS `TCP Util(%)`,";

      $sql_string_first .=  "AVG((( pow(10, (`ranPU`.`Acceptance_Stats_3G_daily_bh`.`Non-HS TCP Mean(dBm)` / 10))
                            / 1000)
                            / if((`ranPU`.`Acceptance_Stats_3G_daily_bh`.`Non-HS TCP Max(dBm)` > 43), 40, 20))
                            * 100)
                            AS `Non-HS TCP Util(%)`,";
          
         
                            #RTWP UTIL (%) - based on RTWP min
                            # 100 - ((min(W)/mean(W) * 100)
      $sql_string_first .=  "AVG((100 - 
                            (( pow(10, (`ranPU`.`Acceptance_Stats_3G_daily_bh`.`RTWP Min(dBm)` / 10))
                            / 1000)         
                            /         
                            ( pow(10, (`ranPU`.`Acceptance_Stats_3G_daily_bh`.`RTWP Mean(dBm)` / 10))
                            / 1000))*100))   
                            AS `UL Load (%)`,";
                            
                            #RTWP UTIL (%) - based on fixed -107dBm
                            # 100 - ((min(W)/mean(W) * 100)
      $sql_string_first .=  "AVG((100 - 
                            (( pow(10,(-107/10))/ 1000)         
                            /         
                            ( pow(10, (`ranPU`.`Acceptance_Stats_3G_daily_bh`.`RTWP Mean(dBm)`/10))/1000))
                            *100))   
                            AS `UL Load (fixed floor) (%)`";

      //======================================================
      // CREATE BODY OF SQL STRING - sum
      //======================================================

    //   $sql_string_main = "";

    //   for ($x = 18; $x <= $size_of_KPI_array ; $x++) {
    //    $sql_string_main .= "sum(`".$KPI_field_array[$x]['Field']."`) AS `".$KPI_field_array[$x]['Field']."_sum`,";


     // }

      //======================================================
      // CREATE BODY OF SQL STRING - average
      //======================================================


    //   for ($x = 18; $x <= $size_of_KPI_array ; $x++) {
    //     $sql_string_main .= "avg(`".$KPI_field_array[$x]['Field']."`) AS `".$KPI_field_array[$x]['Field']."_avg`,";

    //     //create KPI name array with just the required KPI is form 18 to 35
    //     $KPI_name_array[] = $KPI_field_array[$x]['Field'];

    //   }

      //======================================================
      // BUILD ENTIRE SQL STRING
      //======================================================
      
      
      $sql_string_main = "";


      $sql_string_select = "SELECT ";

      $sql_string_main = substr($sql_string_main,0,-1);
    
      $sql_string_end = " FROM ".$dbname.".Acceptance_Stats_3G_daily_bh, ".$dbname.".revenue_figures WHERE (Acceptance_Stats_3G_daily_bh.Date BETWEEN '".$startDate."' AND '".$endDate."') AND mid(Acceptance_Stats_3G_daily_bh.CELLNAME,10,5)='".$carrier."' AND (".$selectedCells.")"; 

      $SQL_string =  $sql_string_select.$sql_string_first.$sql_string_main.$sql_string_end;

      //echo "<br><br><br>".$SQL_string;
      //======================================================
      // GET RESULT OF QUERY AND PUT INTO ARRAY 
      //======================================================

      $result = $connect->query($SQL_string);


      if ($result->num_rows > 0) {
      // output data of each row
          while($row = $result->fetch_assoc()) {
              $result_array[] = $row;
          }
      } else {
          echo "0 results";
      }

      // CLOSE CONNECTION AND RETURN RESULT

      $connect->close();

      return $result_array;
     }
 } 
 return null;



?>

