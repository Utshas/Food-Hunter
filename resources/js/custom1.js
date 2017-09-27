$(document).ready(function(){
    $("#password").keyup(function(){
        var count=$(this).val().length;
        // $(".pass_strength").text(count);
        if(count<1){
           	$(".pass_strength").text("");
            	$(".pass_strength").removeClass("red");        	$(".pass_strength").removeClass("orange");           	$(".pass_strength").removeClass("green");
        }
        else if(count<6){
            	$(".pass_strength").text("Weak");
            	$(".pass_strength").addClass("red");
            	$(".pass_strength").removeClass("orange");          	$(".pass_strength").removeClass("green");
        }
        else if(count<=10){
            	$(".pass_strength").text("Good");
            	$(".pass_strength").addClass("orange");
           	$(".pass_strength").removeClass("red");          	$(".pass_strength").removeClass("green");
        }
        else{
            	$(".pass_strength").text("Strong");
            	$(".pass_strength").addClass("green");
           	$(".pass_strength").removeClass("red");                                           	$(".pass_strength").removeClass("orange");
        }
    });
});
