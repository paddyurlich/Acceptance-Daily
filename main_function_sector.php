<?php
    
function returnStats3G_sector($sector, $pp, $selection, $startDate, $endDate){

      
  if (isset($sector, $pp, $selection, $startDate, $endDate)) {

      //include getRevenueFigures();
      //$data_cost =  $getRevenueFigures['data'];

      set_time_limit(360);

      //=============================
      // database connection
      //=============================  

      $servername = "172.21.200.37";
      $username = "patrickurlich";
      $password = "forPUonly";
      $dbname = "ranPU";
      $table = "Acceptance_Stats_3G_daily";

      // Create connection
      $connect = mysqli_connect($servername, $username,$password,$dbname); 
      // Check connection
      if ($connect->connect_error) {
          die("Connection failed: " . $connect->connect_error);
      } 

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
      $sql_string_first =  "(((sum(PU_Voice_RRC_Succ)/sum(PU_Voice_RRC_Att))*100) *
                           ((sum(PU_Voice_RAB_Succ)/sum(PU_Voice_RAB_Att))*100))/100
                           AS 'UMTS_CS_Acc (%)',";
        // UMTS CS Retainability
      $sql_string_first .=  "(100-((sum(PU_Voice_Ret_Num)/sum(PU_Voice_Ret_Den))*100))
                           AS 'UMTS_CS_Ret (%)',";

        //UMTS PS Accessability
      $sql_string_first .=  "(((sum(PU_PS_RRC_Succ)/sum(PU_PS_RRC_Att))*100) *
                           ((sum(PU_PS_RAB_Succ)/sum(PU_PS_RAB_Att))*100))/100
                           AS 'UMTS_PS_Acc (%)',"; 

        // UMTS PS Retainability
      $sql_string_first .=  "(100-((sum(PU_PS_Ret_Num)/sum(PU_PS_Ret_Den))*100))
                            AS 'UMTS_PS_Ret (%)', "; 

        // Total Revenue ($)
      $sql_string_first .= "(sum(VS_HSDPA_MeanChThroughput_TotalMBytes) + sum(VS_HSUPA_MeanChThroughput_TotalMBytes)) *
                            revenue_figures.data +
                            ((sum(VS_AMR_RB_Erlang_Sum)/2) * revenue_figures.voice)
                            AS 'Total Revenue ($)',";

        //RRC congestion (summed)
      $sql_string_first .= "(sum('VS.RRC.Rej.Code.Cong') +
                            sum(`VS.RRC.Rej.DLCE.Cong`) +
                            sum(`VS.RRC.Rej.DLPower.Cong`) +
                            sum(`VS.RRC.Rej.DLIUBBand.Cong`) +
                            sum(`VS.RRC.Rej.TNL.Fail`) +
                            sum(`VS.RRC.Rej.ULCE.Cong`) +
                            sum(`VS.RRC.Rej.ULIUBBand.Cong`) +
                            sum(`VS.RRC.Rej.ULPower.Cong`))
                            AS 'RRC Failures',";                              

        //CS RAB congestion (summed)
      $sql_string_first .= "(sum(VS_RAB_FailEstabCS_Code_Cong) + 
                            sum(VS_RAB_FailEstabCS_DLCE_Cong) +
                            sum(VS_RAB_FailEstabCS_ULCE_Cong) +
                            sum(VS_RAB_FailEstabCS_ULPower_Cong) +
                            sum(VS_RAB_FailEstabCS_DLPower_Cong))                      
                            AS 'CS RAB Failures',";

        //PS RAB congestion (summed)
      $sql_string_first .= "(sum(VS_RAB_FailEstabPS_Code_Cong) +
                            sum(VS_RAB_FailEstabPS_DLCE_Cong) +
                            sum(VS_RAB_FailEstabPS_ULCE_Cong) +
                            sum(VS_RAB_FailEstabPS_DLPower_Cong) +
                            sum(VS_RAB_FailEstabPS_ULPower_Cong) +
                            sum(VS_RAB_FailEstabPS_HSDPAUser_Cong) +
                            sum(VS_RAB_FailEstabPS_HSUPAUser_Cong))
                            AS 'PS RAB Failures',";

        //total data volume mb
      $sql_string_first .= "((sum(VS_HSDPA_MeanChThroughput_TotalMBytes) + sum(VS_HSUPA_MeanChThroughput_TotalMBytes))/1024)
                            AS 'Total Traffic (GB)',";
      //======================================================
      // CREATE BODY OF SQL STRING - sum
      //======================================================

      $sql_string_main = "";

      for ($x = 18; $x <= $size_of_KPI_array ; $x++) {
       $sql_string_main .= "sum(`".$KPI_field_array[$x]['Field']."`) AS `".$KPI_field_array[$x]['Field']."_sum`,";

        //create KPI name array with just the required KPI is form 18 to 35
        //$KPI_name_array[] = $KPI_field_array[$x]['Field'];

      }

      //======================================================
      // CREATE BODY OF SQL STRING - average
      //======================================================


      for ($x = 18; $x <= $size_of_KPI_array ; $x++) {
        $sql_string_main .= "avg(`".$KPI_field_array[$x]['Field']."`) AS `".$KPI_field_array[$x]['Field']."_avg`,";

        //create KPI name array with just the required KPI is form 18 to 35
        $KPI_name_array[] = $KPI_field_array[$x]['Field'];

      }

      //======================================================
      // BUILD ENTIRE SQL STRING
      //======================================================
      
      $sql_string_select = "SELECT ";

      $sql_string_main = substr($sql_string_main,0,-1);
    
      $sql_string_end = " FROM ranPU.Acceptance_Stats_3G_daily, ranPU.revenue_figures WHERE (Acceptance_Stats_3G_daily.Date BETWEEN '".$startDate."' AND '".$endDate."') AND right(Acceptance_Stats_3G_daily.CELLNAME,1)='".$sector."' AND (".$selectedCells.")"; 

      $SQL_string =  $sql_string_select.$sql_string_first.$sql_string_main.$sql_string_end;

      //======================================================
      // GET RESULT OF QUERY AND PUT INTO ARRAY 
      //======================================================

      $result = $connect->query($SQL_string);


      if ($result->num_rows > 0) {
      // output data of each row
          while($row = $result->fetch_assoc()) {
              $result_array[$pp][] = $row;
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

