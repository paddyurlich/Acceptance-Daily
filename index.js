

//========= datatable initialisation =============

$(function(){
    $("#cell_3G").dataTable({
    "paging":   false,
    "info":     false
    });
})

$(function(){
    $("#cell_3G_acceptance").dataTable({
    "paging":   false,
    "info":     false
    });
})

$(function(){
    $("#cell_4G").dataTable({
    "paging":   false,
    "info":     false
    });
})

$(function(){
    $("#cell_4G_celltab").dataTable({
    "paging":   false,
    "info":     false
    });
})

$(function(){
    $("#sector_carrier").dataTable({
    "paging":   false,
    "info":     false
    });
})


$("#submit").click(function(){
    $("#loader").show();
});









$(document).ready(function(){
    //======= bootstrap tooltip =======
    //$('[data-toggle="tooltip"]').tooltip();
});


$(document).ready(function(){

    //======= loader =======
    document.getElementById("loader").style.display = "none";
    document.getElementById("container").style.display = "block";

});

