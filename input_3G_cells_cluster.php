<div class="well" data-toggle="tooltip" title="Hold CNTRL to select multiple cells">
    <h3 class="center">3G Cells</h3><h4 class="center">(Cluster)</h4>
    <hr>
        <select id="cells_3G_cluster" name="cellCluster2[]" data-placeholder="Choose a cell..." class="chosen-select" multiple style="width:300px;" tabindex="4">
        <option value=""></option>       
            <?php foreach($cellList as $k => $v) { ?>
                <option value=<?php echo $cellList[$k];?>
                    
                    <?php
                    if (isset($selectedCells_3G_cluster)) {
                        foreach ($selectedCells_3G_cluster as $key => $selectedCell) {
                        echo isset($selectedCells_3G_cluster) && $cellList[$k] == $selectedCell ? ' selected' : '';
                        }
                    }
                    ?>
                    > <!--end of option tag -->
                    <?php echo $cellList[$k]; ?>

            <?php } ?> 
        </select>
</div>