

$(document).ready(function(){
    
    //========= tooltip initialisation =============
    $('[data-toggle="tooltip"]').tooltip();


    $('#collapseOne').collapse("hide");
    
    
    //========= datatable initialisation =============

    // $(function(){
    //     $("#cell_3G").dataTable({
    //     "paging":   false,
    //     "info":     false
    //     });
    // })

    // $(function(){
    //     $("#cell_3G_acceptance").dataTable({
    //     "paging":   false,
    //     "info":     false
    //     });
    // })

    // $(function(){
    //     $("#cell_4G").dataTable({
    //     "paging":   false,
    //     "info":     false
    //     });
    // })

    // $(function(){
    //     $("#cell_4G_celltab").dataTable({
    //     "paging":   false,
    //     "info":     false
    //     });
    // })

    // $(function(){
    //     $("#sector_carrier").dataTable({
    //     "paging":   false,
    //     "info":     false
    //     });
    // })    

    $(function(){
        $(".display").dataTable({
        "paging":   false,
        "info":     false
        });
    })






    //=========================
    // show loader screen when input button is presset 
    //=========================

    // $("#submit").click(function(){
    //     $("#loader").show();
    //     console.log("submit button pressed");
    // });


    //=========================
    // set Pre-date delta labels
    //=========================

    selected_preDateStart = null;
    selected_preDateEnd = null;    

    $("#startDate").chosen({width: "100%"}).change(function(){
        
        selected_preDateStart = ($("#startDate option:selected").val()); 

        var t = selected_preDateStart.split(/[- :]/);
        // Apply each element to the Date function
        selected_preDateStart = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));

        updatePreDates();            
    });


    $("#endDate").chosen({width: "100%"}).change(function(){
        selected_preDateEnd = ($("#endDate option:selected").val());
        
        var t = selected_preDateEnd.split(/[- :]/);
        // Apply each element to the Date function
        selected_preDateEnd = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));

        updatePreDates();
    });      

    function updatePreDates () {

        if (selected_preDateStart != null && selected_preDateEnd != null ){
                selected_preDateDelta = 1 + (selected_preDateEnd - selected_preDateStart)/1000/60/60/24;

            if (selected_preDateDelta == 14) {
                label_color = "success";
            } else {
                label_color = "danger";
            }

            label_message = "<span class='label label-" + label_color +  "'><strong>" + selected_preDateDelta + "</strong> Day(s) selected</span>"      

            $("#preDateDeltaDiv").html(label_message);
        }
    }



    //=========================
    // set Post-Date delta labels
    //=========================

    selected_postDateStart = null;
    selected_postDateEnd = null;    

    $("#startDate_post").chosen({width: "100%"}).change(function(){
        selected_postDateStart = ($("#startDate_post option:selected").val()); 

        var t = selected_postDateStart.split(/[- :]/);
        // Apply each element to the Date function
        selected_postDateStart = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));

        updatePostDates();            
    });


    $("#endDate_post").chosen({width: "100%"}).change(function(){
        selected_postDateEnd = ($("#endDate_post option:selected").val());
        
        var t = selected_postDateEnd.split(/[- :]/);
        // Apply each element to the Date function
        selected_postDateEnd = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));

        updatePostDates();
    });      

    function updatePostDates () {

        if (selected_postDateStart != null && selected_postDateEnd != null ){
                selected_postDateDelta = 1 + (selected_postDateEnd - selected_postDateStart)/1000/60/60/24;

            if (selected_postDateDelta == 14) {
                label_color = "success";
            } else {
                label_color = "danger";
            }

            label_message = "<span class='label label-" + label_color +  "'><strong>" + selected_postDateDelta + "</strong> Day(s) selected</span>"      

            $("#postDateDeltaDiv").html(label_message);
        }
    };

    //=========================
    // get seleted cells and put into selected cells div with GAP stats
    //=========================


    //  initialize the Chosen select
    $('.chosen-select').chosen({width: "100%"});

    //  handle the change event
    $('#cells_3G_cluster').chosen().change(function(){
        putSelectedCellsInDiv();        
    }); 

    $('#cells_3G_newSite').chosen().change(function(){
        putSelectedCellsInDiv();        
    });   

    $('#cells_4G_cluster').chosen().change(function(){
        putSelectedCellsInDiv();        
    });

    $('#cells_4G_newSite').chosen().change(function(){
        putSelectedCellsInDiv();        
    });   

    

    // create GAP cells page load or refresh ie on document ready, not change.
    putSelectedCellsInDiv();
    
    function putSelectedCellsInDiv(){
        var selectedCellsAllGAP = "";
        var cells_3G_cluster_selected = $('#cells_3G_cluster').chosen().val();
        var cells_3G_newSite_selected = $('#cells_3G_newSite').chosen().val();
        var cells_4G_cluster_selected = $('#cells_4G_cluster').chosen().val();
        var cells_4G_newSite_selected = $('#cells_4G_newSite').chosen().val();      

        $.each(cells_3G_cluster_selected, function(i, l){
            selectedCellsAllGAP += l + ", 3G Clust, green </br>";
        });     
        $.each(cells_3G_newSite_selected, function(i, l){
            selectedCellsAllGAP += l + ", 3G NewSite, orange </br>";
        });     
        $.each(cells_4G_cluster_selected, function(i, l){
            selectedCellsAllGAP += l + ", 4G Clust, yellow </br>";
        });     
        $.each(cells_4G_newSite_selected, function(i, l){
            selectedCellsAllGAP += l + ", 4G NewSite, red </br>";
        });   

        if (selectedCellsAllGAP == "" ) {
            selectedCellsAllGAP = "No cells selected........";
        }

        $("#cells_3G_ClusterDisplay").html(selectedCellsAllGAP);
    };
 
});



 