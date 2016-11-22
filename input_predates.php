<div class="well">  
    <h3 class="center">Pre Dates</h3>
    <hr>  
    <em>Start time/date:</em>
    <select name="startDate" data-placeholder="Choose a start date..." class="chosen-select" style="width:200px;" tabindex="4">
    <option value=""></option>       
        <?php foreach($dateList as $k => $v) { ?>
            <option value="<?php echo $dateList[$k] ?>" <?php echo isset($startDate) && $dateList[$k] == $startDate ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>  </option>                    
        <?php } ?> 
    </select>

    <br/><br/>

    <em>End time/date: </em>
    <select name="endDate" data-placeholder="Choose an end date..." data-toggle="tooltip" title="Hooray!" class="chosen-select" style="width:200px;" tabindex="4">
        <option value=""></option>       
        <?php foreach($dateList as $k => $v) { ?>
            <option value="<?php echo $dateList[$k]?>" <?php echo isset($endDate) && $dateList[$k] == $endDate ? ' selected' : '' ?>> <?php echo $dateList[$k]; ?>                      
        <?php } ?> 
    </select>
</div>