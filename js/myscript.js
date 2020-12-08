$(document).ready(function(){
    $('.mobile').keyup(function () {
    this.value = this.value.replace(/[^0-9]/g,'');
    });
    $(document).on('keypress','.mobile',function(e){
        if($(e.target).prop('value').length>=10){
        if(e.keyCode!=32)
        {return false} 
        }
    });
    $("#fname").keyup(function() {
       
         $(this).val($(this).val().replace(/  +/g, ' '));
    });
    $("#sans").keyup(function() {
        $(this).val($(this).val().replace(/  +/g, ' '));
    });

    $(".password").keyup(function() {
        $(this).val($(this).val().replace(/\s/g, ""));
    });

    $('.nameclass').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                e.preventDefault();
            }
        }
    });
});
function removeSpaces(string) {
    return string.split(' ').join('');
   }



   // Script of the seprated Header files
   $(function() {
	$('.team a').Chocolat();
    });
    $(function() {		
        $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
    });    
    jQuery(function($) {
        $(".swipebox").swipebox();
    });