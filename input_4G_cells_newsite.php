<div class="well" data-toggle="tooltip" title="Hold CNTRL to select multiple cells">
    <h3 class="center">4G Cells</h3><h4 class="center">(new site)</h4>
        <hr>
        <select id="cells_4G_newSite" name="cell4Gpre[]" data-placeholder="Choose a cell..." class="chosen-select" multiple style="width:300px;" tabindex="4">
        <option value=""></option>       
            <?php foreach($cellList4G as $k => $v) { ?>
                <option value=<?php echo $cellList4G[$k];?>
                    
                    <?php
                    if (isset($selectedCells_4G_newSite)) {
                        foreach ($selectedCells_4G_newSite as $key => $selectedCell) {
                        echo isset($selectedCells_4G_newSite) && $cellList4G[$k] == $selectedCell ? ' selected' : '';
                        }
                    }
                    ?>

                    > <!--end of option tag -->

                    <?php echo $cellList4G[$k]; ?>  

            <?php } ?> 
        </select>
</div>