$(document).ready(function(){
    var max_word="100";
    $("#remain").html("<b>"+max_text+ " remain</b>");
    $("textarea").keyup(function(){
        var word_length = $("textarea").val().txt.replace( /[^\w ]/g, "" ).split( /\s+/ ).length
        
        var text = $('#remain').text();
        var wordsCount = text.split(' ').length;
        $("#remain").html("<br>"+wordsCount+ " Words remaining</br>")
    });
});

$(document).ready(function(){
    var color = $("#bg_color").val();
    $("body").css("background",color);
    
    $("#bg_color").change(function(){
       color = $("#bg_color").val(); 
        $("body").css("background",color);
    });
});


$(document).ready(function(){
    $("#datepicker").datepicker();
});

