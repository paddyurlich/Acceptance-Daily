<div class="well">  
    <h3 class="center">Post Dates</h3>
    <hr>
    <label>Start time/date:</label>
    <select name="startDate_post" data-placeholder="Choose a start date..." class="chosen-select" style="width:200px;" tabindex="4">
    <option value=""></option>       
        <?php foreach($dateList as $k => $v) { ?>
            <option value="<?php echo $dateList[$k] ?>" <?php echo isset($startDate_post) && $dateList[$k] == $startDate_post ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>                      
        <?php } ?> 
    </select>

    <br/><br/>

    <label>End time/date: </label>
    <select name="endDate_post" data-placeholder="Choose an end date..." class="chosen-select" style="width:200px;" tabindex="4">
        <option value=""></option>       
        <?php foreach($dateList as $k => $v) { ?>
            <option value="<?php echo $dateList[$k] ?>" <?php echo isset($endDate_post) && $dateList[$k] == $endDate_post ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>                      
        <?php } ?> 
    </select>
</div>