




$(document).ready(function(){    


        selected_preDateStart = null;
        selected_preDateEnd = null;



        
        
        $("#preDateStart").change(function(){
            selected_preDateStart = ($("#preDateStart option:selected").val());            
            var t = selected_preDateStart.split(/[- :]/);
            // Apply each element to the Date function
            selected_preDateStart = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
            
            

            updateDates();            
        });




        $("#preDateEnd").change(function(){
            selected_preDateEnd = ($("#preDateEnd option:selected").val());
            
            var t = selected_preDateEnd.split(/[- :]/);
            // Apply each element to the Date function
            selected_preDateEnd = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
            
            updateDates();
        });      

        function updateDates () {

            if (selected_preDateStart != null && selected_preDateEnd != null ){
                selected_preDateDelta = 1 + (selected_preDateEnd - selected_preDateStart)/1000/60/60/24;

            if (selected_preDateDelta == 14) {
                label_color = "success";
            } else {
                label_color = "danger";
            }

            label_message = "<span class='label label-" + label_color +  "'><strong>" + selected_preDateDelta + "</strong> Day(s) selected</span>"      

            // $("#preDateStartDiv").html(selected_preDateStart);
            // $("#preDateEndDiv").html(selected_preDateEnd);
            $("#preDateDeltaDiv").html(label_message);
            }
        }

        
});

