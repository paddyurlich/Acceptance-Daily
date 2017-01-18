<?php
   
function returnStats4G_cell($selection, $startDate, $endDate){

    if (isset($selection, $startDate, $endDate)) {

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
        $selectedCells .= " Object = '".$selectedCell."' OR ";
      }
      $selectedCells = substr($selectedCells, 0, -3); //remove last "OR" from end of SQL string

      //=====================================================
      // GET FIELD NAMES FROM TABLE
      //=====================================================

      $sql = ("SHOW COLUMNS FROM Acceptance_Stats_4G_daily");

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

      $sql_string_first = "";             

        // RRC Setup Success Rate (%)
      $sql_string_first =  "ROUND((sum(`L.RRC.ConnReq.Succ`)/(sum(`L.RRC.ConnReq.Att`))*100),2)
                           AS 'RRC Accessability (%)',";

        // CSFB Response Success Rate (%)
      $sql_string_first .= "ROUND((sum(`L.CSFB.PrepSucc`)/(sum(`L.CSFB.PrepAtt`))*100),2)
                           AS 'CSFB Success Rate (%)',";

        // E-RAB Setup Success Rate (ALL) (%)
      $sql_string_first .= "ROUND((sum(`L.E-RAB.SuccEst`)/(sum(`L.E-RAB.AttEst`))*100),2)
                           AS 'E-RAB Accessability (%)',";

        // Inter-RAT Handover Out Success Rate (LTE to WCDMA)
      $sql_string_first .= "ROUND(((sum(`L.IRATHO.E2W.ExecSuccOut`))/((sum(`L.IRATHO.E2W.ExecAttOut`)))*100),2)
                           AS 'iRat Success Rate (LTE to WCDMA)',";

        // Retainability (%)
      $sql_string_first .= "ROUND(100 - (sum(`L.E-RAB.AbnormRel`)/(sum(`L.E-RAB.NormRel`) + sum(`L.E-RAB.AbnormRel`))*100),2)
                           AS 'Ratainability (%)',";

        // Total 4G Revenue
      $sql_string_first .= "ROUND(((((sum(`Cell Traffic Volume_DL(Gbits)`) + sum(`Cell Traffic Volume_UL(Gbits)`)) * 1024) / 8 ) * revenue_figures.data) ,2)
                            AS '4G Revenue ($)',";

        // total data volume
    $sql_string_first .=    "ROUND(((sum(`DL Traffic Volume`) + sum(`UL Traffic Volume`)) /8/1024/1024/1024),2)
                            AS '4G Data Volume (GB)',";

    $sql_string_first .=    "ROUND(AVG(`DL Average Throughput (Kbps)`),2)
                            AS 'DL Average Throughput (Kbps)'";                            



                            
        // UL PRB Utilisation
    //  $sql_string_first .=    "((SUM(`L.ChMeas.PRB.UL.Used.Avg`) / SUM(`L.ChMeas.PRB.UL.Avail`)) *100 )
    //                         AS 'UL PRB Utilisation (%)',";       

        // DL PRB Utilisation
    //  $sql_string_first .=    "((SUM(`L.ChMeas.PRB.DL.Used.Avg`) / SUM(`L.ChMeas.PRB.DL.Avail`)) *100 )
    //                         AS 'DL PRB Utilisation (%)'";   


      //======================================================
      // CREATE BODY OF SQL STRING - sum
      //======================================================

/*
      $sql_string_main = "";

      for ($x = 1; $x <= $size_of_KPI_array ; $x++) {
       $sql_string_main .= "sum(`".$KPI_field_array[$x]['Field']."`) AS `".$KPI_field_array[$x]['Field']."_sum`,";

        //create KPI name array with just the required KPI is form 18 to 35
        //$KPI_name_array[] = $KPI_field_array[$x]['Field'];

      }

      //======================================================
      // CREATE BODY OF SQL STRING - average
      //======================================================


      for ($x = 1; $x <= $size_of_KPI_array ; $x++) {
        $sql_string_main .= "avg(`".$KPI_field_array[$x]['Field']."`) AS `".$KPI_field_array[$x]['Field']."_avg`,";

        //create KPI name array with just the required KPI is form 18 to 35
        $KPI_name_array[] = $KPI_field_array[$x]['Field'];

      }
*/

      //======================================================
      // BUILD ENTIRE SQL STRING
      //======================================================
      
      $sql_string_select = "SELECT `Object` as 'Cellname', ";

      //$sql_string_main = substr($sql_string_main,0,-1);
      $sql_string_main = "";
    
      $sql_string_end = " FROM ".$dbname.".Acceptance_Stats_4G_daily, ".$dbname.".revenue_figures WHERE (Acceptance_Stats_4G_daily.Date BETWEEN '".$startDate."' AND '".$endDate."') AND (".$selectedCells.") GROUP BY Cellname" ; 

        $SQL_string =  $sql_string_select.$sql_string_first.$sql_string_main.$sql_string_end;
        
        //   echo "</br></br></br>";
        //   echo $SQL_string;

        //======================================================
        // GET RESULT OF QUERY AND PUT INTO ARRAY 
        //======================================================

        $result = $connect->query($SQL_string);

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {                
                $result_array[$row['Cellname']] = $row;
            }
        } else {
            echo "0 results";
        }

        // CLOSE CONNECTION AND RETURN RESULT

        $connect->close();

        return($result_array);
        }
    else return null;

  }

    //  $selection[] = "060-RCTN-L18-1-1";
    //  $startDate = "2016-10-12";
    //  $endDate = "2016-10-12";

    //  returnStats4G_cell($selection, $startDate, $endDate);
?>
