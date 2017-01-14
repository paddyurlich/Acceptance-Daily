<div class="well" data-toggle="tooltip" title="Select a 14 day range for Acceptance Stats">  
    <h3 class="center">Post Dates</h3>
    <hr>
    <label>Start time/date:</label>
    <select id="startDate_post" name="startDate_post" data-placeholder="Choose a start date..." style="width:200px;" tabindex="4">
    <option value=""></option>       
        <?php foreach($dateList as $k => $v) { ?>
            <option value="<?php echo $dateList[$k] ?>" <?php echo isset($startDate_post) && $dateList[$k] == $startDate_post ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>                      
        <?php } ?> 
    </select>

    <br/><br/>

    <label>End time/date: </label>
    <select id="endDate_post" name="endDate_post" data-placeholder="Choose an end date..." style="width:200px;" tabindex="4">
        <option value=""></option>       
        <?php foreach($dateList as $k => $v) { ?>
            <option value="<?php echo $dateList[$k] ?>" <?php echo isset($endDate_post) && $dateList[$k] == $endDate_post ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>                      
        <?php } ?> 
    </select>

    <br><br>

    <div id="postDateDeltaDiv">
        <?php
            $startDate_post = strtotime($startDate_post);
            $endDate_post = strtotime($endDate_post);
            $deltaPostDate =  $endDate_post - $startDate_post;
            $deltaPostDate = 1 + round($deltaPostDate/60/60/24); // convert to days

            if($deltaPostDate == 14){
                $label_color = "success";
            } else {
                $label_color = "danger";
            }


            if ($startDate_post>0 && $endDate_post>0){
                echo '<span class="label label-';
                echo $label_color;
                echo '"><strong>';
                echo $deltaPostDate;
                echo "</strong> Day(s) selected</span>";
            }
        ?>
        </div>



</div>