/* global */
$(document).ready(function () {
     $(".hi").hide();
     $("body").on("click", "#sign-up", function(){
        $(".hi").slideToggle(500); 
     });
});

