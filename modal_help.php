  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">Open Modal</button> --> 


<style>

  .standout {
    color: red;
    font-weight: bold;

  }

</style>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Acceptance Stats help and instructions</h3>
        </div>
        <div class="modal-body">
        <!-- ========================================================= -->
            <p>

            <h4>Pre and Post Dates</h4>
            Select both a "pre site on air" and "post site on air" date range of <span class="standout"> 7 </span> days. This needs to be sendisble i.e. ensure that the new site came on air between the pre 
            end post periods and that there are no outliers or anomolies in either of the periods.  Use DOT Reporting to confirm that dates selected are appropriate.  
            <br>
            <h4>3G Cells (Cluster)</h4>
            Select the 3G cells surrounding the new site i.e. any cells that might be impacted in any way the the integration of the new site. 
            <br>
            <h4>3G Cells (new site)</h4>
            Select the 3G cells of the new site only.
            <br>
            <h4>4G Cells (Cluster)</h4>
            Select the 4G cells surrounding the new site i.e. any cells that might be impacted in any way the the integration of the new site. 
            <br>
            <h4>4G Cells (new site)</h4>
            Select the 4G cells of the new site only.

                                     
            </p>
        <!-- ========================================================= -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>