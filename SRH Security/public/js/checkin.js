$(document).ready(function () {
    $('#barcode').focus();
   $('.check_in_type').change(function () {
       var val=$(this).val();
       if (val=="Check In"){
           $('#message').text("Check In Selected");
       }
       else {
           $('#message').text("Check Out Selected");
       }
       $('#barcode').focus();
       $('#success').text('');

   });
    var timer;
    var delay = 1000;
   $("#barcode").bind('input',function () {
       window.clearTimeout(timer);
       timer = window.setTimeout(function(){
           //insert delayed input change action/event here
           $('#check_in_button').click();

       }, delay);
   })
/*
    $("#barcode").off("keypress paste change", function(){

        var i= $(this).val().length;
        //$('#message').text(i);
        if (i>=5){
            $('#check_in_button').click();
        }

    })
*/
});