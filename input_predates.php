<div class="well" data-toggle="tooltip" title="Select a 14 day range for Acceptance Stats">  
    <h3 class="center">Pre Dates</h3>
    <hr>  
    
    <label>Start time/date:</label>
    <select id="startDate" name="startDate" data-placeholder="Choose a start date..." style="width:200px;" tabindex="4">
        <option value=""></option>       
        <?php foreach($dateList as $k => $v) { ?>
            <option value="<?php echo $dateList[$k] ?>" <?php echo isset($startDate) && $dateList[$k] == $startDate ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>  </option>                    
        <?php } ?> 
    </select>

    <br/><br/>

    <label>End time/date: </label>
    <select id="endDate" name="endDate" data-placeholder="Choose an end date..." style="width:200px;" tabindex="4">
        <option value=""></option>       
        <?php foreach($dateList as $k => $v) { ?>
            <option value="<?php echo $dateList[$k]?>" <?php echo isset($endDate) && $dateList[$k] == $endDate ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>                      
        <?php } ?> 
    </select>

    <br><br>
    

    <div id="preDateDeltaDiv">
        <?php
            $startDate = strtotime($startDate);
            $endDate = strtotime($endDate);
            $deltaPreDate =  $endDate - $startDate;
            $deltaPreDate = 1 + round($deltaPreDate/60/60/24); // convert to days

            if($deltaPreDate == 14){
                $label_color = "success";
            } else {
                $label_color = "danger";
            }
            
            if ($startDate_post>0 && $endDate_post>0){
                echo '<span class="label label-';
                echo $label_color;
                echo '"><strong>';
                echo $deltaPreDate;
                echo "</strong> Day(s) selected</span>";
            }
        ?>    
    </div>

 

</div>