
$(document).ready(function(){
    
    $('.mobile').keyup(function () {
    this.value = this.value.replace(/[^0-9]/g,'');
    });

    $("#mobile").on("keyup  paste", function() {
        
        var mobile = document.getElementById("mobile").value;   
        mobile = mobile.replace(/ {1,}/g,'');
        var y=0;
        var in1 = mobile.charAt(0);
        var len = mobile.length;
        var in2=mobile.charAt(1);
        console.log(in1, in2);
        if(len>10 && in1!="0"){
            alert("Mobile Number Can't be more than 10");
            document.getElementById("mobile").value="";
        }
        else if(in1=="0" && in2=="0"){
            alert("Invaild Number");
            document.getElementById("mobile").value="";
        }
        else if(len==11){
            for(i=1;i<11;i++){
                var ch = mobile.charAt(i);
                if(i!=10){
                    var chn = mobile.charAt(i+1);
                }
                if(ch==chn){
                    y++;
                }
            }
            if(y==10){
            alert("All numbers cannot be similar");
            document.getElementById("mobile").value="";
            }
        }
        else if(len==10){
            for(i=0;i<10;i++){
                var ch = mobile.charAt(i);
                if(i!=9){
                    var chn = mobile.charAt(i+1);
                    if(ch==chn){
                    y++;
                }
                }
                
            }
            if(y==9){
            alert("All numbers cannot be similar");
            document.getElementById("mobile").value="";
            }
        }
        
    }); 
    // $(document).on('keypress','.mobile',function(e){
    //     if($(e.target).prop('value').length>=10){
    //     if(e.keyCode!=32)
    //     {return false} 
    //     }
    // });
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
// function removeSpaces(string) {
//     return string.split(' ').join('');
//    }



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



    