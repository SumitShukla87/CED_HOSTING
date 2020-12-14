
$(document).ready(function () {

    $('.mobile').keyup(function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $("#mobile").on("keyup  paste", function () {

        var mobile = document.getElementById("mobile").value;
        mobile = mobile.replace(/ {1,}/g, '');
        var y = 0;
        var in1 = mobile.charAt(0);
        var len = mobile.length;
        var in2 = mobile.charAt(1);
        console.log(in1, in2);
        if (len > 10 && in1 != "0") {
            alert("Mobile Number Can't be more than 10");
            document.getElementById("mobile").value = "";
        }
        else if (in1 == "0" && in2 == "0") {
            alert("Invaild Number");
            document.getElementById("mobile").value = "";
        }
        else if (len == 11) {
            for (i = 1; i < 11; i++) {
                var ch = mobile.charAt(i);
                if (i != 10) {
                    var chn = mobile.charAt(i + 1);
                }
                if (ch == chn) {
                    y++;
                }
            }
            if (y == 10) {
                alert("All numbers cannot be similar");
                document.getElementById("mobile").value = "";
            }
        }
        else if (len == 10) {
            for (i = 0; i < 10; i++) {
                var ch = mobile.charAt(i);
                if (i != 9) {
                    var chn = mobile.charAt(i + 1);
                    if (ch == chn) {
                        y++;
                    }
                }

            }
            if (y == 9) {
                alert("All numbers cannot be similar");
                document.getElementById("mobile").value = "";
            }
        }

    });
    // $(document).on('keypress','.mobile',function(e){
    //     if($(e.target).prop('value').length>=10){
    //     if(e.keyCode!=32)
    //     {return false} 
    //     }
    // });
    $("#fname").keyup(function () {

        $(this).val($(this).val().replace(/  +/g, ' '));
    });
    $("#sans").keyup(function () {
        $(this).val($(this).val().replace(/  +/g, ' '));
    });

    $(".password").keyup(function () {
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

    $('.test1').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });











});
// function removeSpaces(string) {
//     return string.split(' ').join('');
//    }



// Script of the seprated Header files
// $(function () {
//     $('.team a').Chocolat();
// });
// $(function () {
//     $(' #da-thumbs > li ').each(function () { $(this).hoverdir(); });
// });
// jQuery(function ($) {
//     $(".swipebox").swipebox();
// });





$(document).ready(function(){
    $('.inputVal').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
    val = val.replace(/[^0-9\.]/g,'');
    if(val.split('.').length>2)
    val = val.replace(/\.+$/,"");
    }
    $(this).val(val);
    });
    
    // $('select').blur(function(){
    // var val = $(this).val();
    // if(val==""){
    // $('#eb1').html("*Required");
    // $(this).focus();
    // $(this).css("border", "2px solid red");
    // }
    // else {
    // $(this).css("border", "2px solid green");
    // $('#eb1').html("");
    // }
    // });
    
    $('#pname').blur(function(){
    var val = $(this).val();
    if(val==""){
    $('#e1').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    if(val){
    var pat = /^\d*?[a-zA-Z][a-zA-Z0-9\-]{1,}\d*$/i.test($("#pname").val());
    if(!pat){
    $('#e1').html("*Please Enter In Valid Format");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    else {
    $(this).css("border", "2px solid green");
    $('#e1').html("");
    }
    }
    });
    
    $('#mprice').blur(function(){
    var val = $(this).val();
    if(val==""){
    $('#e2').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    else {
    $(this).css("border", "2px solid green");
    $('#e2').html("");
    }
    });
    
    $('#aprice').blur(function(){
    var val = $(this).val();
    if(val==""){
    $('#e3').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    else {
    $(this).css("border", "2px solid green");
    $('#e3').html("");
    }
    });
    
    $('#sku').blur(function(){
    var val = $(this).val();
    if(val==""){
    $('#e4').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    if(val){
    var pat = /^\d?[a-zA-Z0-9#-]+?[a-zA-Z0-9][a-zA-Z0-9\-#]{1,}\d*$/i.test($("#sku").val());
    if(!pat){
    $('#e4').html("Only #,- allowed. Must contain 2 non-special characters !!");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    else {
    $(this).css("border", "2px solid green");
    $('#e4').html("");
    }
    }
    });
    
    $('#webspace').blur(function(){
    var val = $(this).val();
    if(val==""){
    $('#e5').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    else {
    $(this).css("border", "2px solid green");
    $('#e5').html("");
    }
    });
    
    $('#bandwidth').blur(function(){
    var val = $(this).val();
    if(val==""){
    $('#e6').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    else {
    $(this).css("border", "2px solid green");
    $('#e6').html("");
    }
    });
    
    $('#fdomain').blur(function(){
    var val = $(this).val();
    if(val==""){
    $('#e7').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    if(val){
    var pat = /(^[0-9]*$)|(^[A-Za-z]+$)/i.test($("#fdomain").val());
    if(!pat){
    $('#e7').html("Only alphabetic/numeric values allowed.");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    else {
    $(this).css("border", "2px solid green");
    $('#e7').html("");
    }
    }
    });
    
    $('#launguage').blur(function(){
    var val = $(this).val();
    if(val==""){
    $('#e8').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    if(val){
    var pat = /^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$/i.test($("#launguage").val());
    if(!pat){
    $('#e8').html("Only alphabetic/numeric values allowed.");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    else {
    $(this).css("border", "2px solid green");
    $('#e8').html("");
    }
    }
    });
    
    $('#mail').blur(function(){
    var val = $(this).val();
    if(val==""){
    $('#e9').html("*Required");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    if(val){
    var pat = /(^[0-9]*$)|(^[A-Za-z]+$)/i.test($("#mail").val());
    if(!pat){
    $('#e9').html("Only alphabetic/numeric values allowed.");
    $(this).focus();
    $(this).css("border", "2px solid red");
    }
    else {
    $(this).css("border", "2px solid green");
    $('#eb11').html("");
    }
    }
    });
    });



