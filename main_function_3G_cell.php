<?php
    
// $pp = "post";
// $selection = array("060-TWRJ-U09-1-1","060-TWRJ-U09-1-2");
// $startDate = "2016-11-08";
// $endDate = "2016-11-09";

function returnStats3G_cell($selection, $startDate, $endDate){
      
  // if (isset($pp, $selection, $startDate, $endDate)) {

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
        $selectedCells .= " Acceptance_Stats_3G_daily.CELLNAME = '".$selectedCell."' OR ";
      }
      $selectedCells = substr($selectedCells, 0, -3); //remove last "OR" from end of SQL string

      //var_dump($selectedCells);

      //=====================================================
      // GET FIELD NAMES FROM TABLE
      //=====================================================

      $sql = ("SHOW COLUMNS FROM Acceptance_Stats_3G_daily");

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

             
        // UMTS CS Accessability
      $sql_string_first =  "ROUND((((sum(ranPU.Acceptance_Stats_3G_daily.PU_Voice_RRC_Succ)/sum(ranPU.Acceptance_Stats_3G_daily.PU_Voice_RRC_Att))*100) *
                           ((sum(Acceptance_Stats_3G_daily.PU_Voice_RAB_Succ)/sum(Acceptance_Stats_3G_daily.PU_Voice_RAB_Att))*100))/100,2)
                           AS 'UMTS Voice Acc (%)',";
        // UMTS CS Retainability
      $sql_string_first .=  "ROUND((100-((sum(Acceptance_Stats_3G_daily.PU_Voice_Ret_Num)/sum(Acceptance_Stats_3G_daily.PU_Voice_Ret_Den))*100)),2)
                           AS 'UMTS Voice Ret (%)',";

        //UMTS PS Accessability
      $sql_string_first .=  "ROUND((((sum(Acceptance_Stats_3G_daily.PU_PS_RRC_Succ)/sum(Acceptance_Stats_3G_daily.PU_PS_RRC_Att))*100) *
                           ((sum(Acceptance_Stats_3G_daily.PU_PS_RAB_Succ)/sum(Acceptance_Stats_3G_daily.PU_PS_RAB_Att))*100))/100,2)
                           AS 'UMTS Data Acc (%)',"; 

        // UMTS PS Retainability
      $sql_string_first .=  "ROUND((100-((sum(Acceptance_Stats_3G_daily.PU_PS_Ret_Num)/sum(Acceptance_Stats_3G_daily.PU_PS_Ret_Den))*100)),2)
                            AS 'UMTS Data Ret (%)', "; 

        // Total Revenue ($)
      $sql_string_first .= "ROUND((sum(Acceptance_Stats_3G_daily.VS_HSDPA_MeanChThroughput_TotalMBytes) + sum(Acceptance_Stats_3G_daily.VS_HSUPA_MeanChThroughput_TotalMBytes)) *
                            revenue_figures.data +
                            ((sum(Acceptance_Stats_3G_daily.VS_AMR_RB_Erlang_Sum)/2) * revenue_figures.voice),2)
                            AS 'Total Revenue ($)',";

        //CS RAB congestion (summed)
      // $sql_string_first .= "(sum(VS_RAB_FailEstabCS_Code_Cong) + 
      //                       sum(VS_RAB_FailEstabCS_DLCE_Cong) +
      //                       sum(VS_RAB_FailEstabCS_ULCE_Cong) +
      //                       sum(VS_RAB_FailEstabCS_ULPower_Cong) +
      //                       sum(VS_RAB_FailEstabCS_DLPower_Cong))                      
      //                       AS 'CS RAB Failures',";

        //PS RAB congestion (summed)
      // $sql_string_first .= "(sum(`ranPU`.`Acceptance_Stats_3G_daily`.VS_RAB_FailEstabPS_Code_Cong) +
      //                       sum(`ranPU`.`Acceptance_Stats_3G_daily`.VS_RAB_FailEstabPS_DLCE_Cong) +
      //                       sum(`ranPU`.`Acceptance_Stats_3G_daily`.VS_RAB_FailEstabPS_ULCE_Cong) +
      //                       sum(`ranPU`.`Acceptance_Stats_3G_daily`.VS_RAB_FailEstabPS_DLPower_Cong) +
      //                       sum(`ranPU`.`Acceptance_Stats_3G_daily`.VS_RAB_FailEstabPS_ULPower_Cong) +
      //                       sum(`ranPU`.`Acceptance_Stats_3G_daily`.VS_RAB_FailEstabPS_HSDPAUser_Cong) +
      //                       sum(`ranPU`.`Acceptance_Stats_3G_daily`.VS_RAB_FailEstabPS_HSUPAUser_Cong))
      //                       AS 'PS RAB Failures',";

        //total data volume mb
      $sql_string_first .= "ROUND(((sum(Acceptance_Stats_3G_daily.VS_HSDPA_MeanChThroughput_TotalMBytes) + sum(Acceptance_Stats_3G_daily.VS_HSUPA_MeanChThroughput_TotalMBytes))/1024),2)
                            AS 'Data Traffic (GB)',";

        //total voice volume volume mb
      $sql_string_first .= "ROUND(sum(Acceptance_Stats_3G_daily.VS_AMR_RB_Erlang_Sum),2)
                            AS 'Voice Traffic (Erl)',";

      $sql_string_first .= "ROUND(avg(Acceptance_Stats_3G_daily.VS_HSDPA_MeanChThroughput),2)
                            AS 'Mean HSDPA Throughput (Kbps)',";

      // $sql_string_first .=   "AVG((( pow(10, (Acceptance_Stats_3G_daily_bh.`TCP Mean(dBm)` / 10))
      //                       / 1000)
      //                       / if((Acceptance_Stats_3G_daily_bh.`TCP Max(dBm)` > 43), 40, 20))
      //                       * 100)
      //                       AS `TCP Util(%) - BH`";

        $sql_string_first .=   "ROUND(AVG(Acceptance_Stats_3G_daily_bh.`TCP Mean(dBm)`),2)
                              AS `TCP Util bh (%)`";





      //======================================================
      // BUILD ENTIRE SQL STRING
      //======================================================
      
      $sql_string_select = "SELECT MID(Acceptance_Stats_3G_daily.CELLNAME,16,1) AS 'SECTOR', Acceptance_Stats_3G_daily.CELLNAME, ";

      //$sql_string_main = substr($sql_string_main,0,-1);
      $sql_string_main = "";  

      //$sql_string_end = " FROM ".$dbname.".Acceptance_Stats_3G_daily, ".$dbname.".revenue_figures WHERE (Acceptance_Stats_3G_daily.Date BETWEEN '".$startDate."' AND '".$endDate."') AND (".$selectedCells.") GROUP BY CELLNAME"; 

      $sql_string_end = " FROM " .$dbname.".revenue_figures 
                          CROSS JOIN
                            ranPU.Acceptance_Stats_3G_daily_bh Acceptance_Stats_3G_daily_bh
                          INNER JOIN ranPU.Acceptance_Stats_3G_daily Acceptance_Stats_3G_daily
                            ON (Acceptance_Stats_3G_daily_bh.CELLNAME = Acceptance_Stats_3G_daily.CELLNAME)
                          WHERE (Acceptance_Stats_3G_daily.Date BETWEEN '".$startDate."' AND '".$endDate."') AND (".$selectedCells.") GROUP BY Acceptance_Stats_3G_daily.CELLNAME"; 
      
      $SQL_string =  $sql_string_select.$sql_string_first.$sql_string_main.$sql_string_end;

      // echo "<br><br><br><br>";
      // d($SQL_string);

      //======================================================
      // GET RESULT OF QUERY AND PUT INTO ARRAY 
      //======================================================

      $result = $connect->query($SQL_string);

      if ($result->num_rows > 0) {
      // output data of each row
          while($row = $result->fetch_assoc()) {
                //$result_array[$pp]['cellname'] = $row;
                $result_array[$row['CELLNAME']] = $row;
                
          }
      } else {
          echo "0 results";
      }

      // CLOSE CONNECTION AND RETURN RESULT
      $connect->close();

      // return json_encode($result_array);
      return ($result_array);

       

     }