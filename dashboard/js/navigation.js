$("#calendarButton").click(function(){
    var offset = $("#calendar").offset().top;
    var st = $('html, body').attr('scrollTop');
    if(!(offset<st+20 && offset>st-20))
        $('html, body').animate({
            "scrollTop": offset
        },1000);
});
$("#calendarButton").mouseover(function(){
    $(this).animate({
        "border-radius": "20px",
        "background-color": "rgba(0, 102, 0, 1)"
    },100);
});
$("#calendarButton").mouseleave(function(){
    $(this).animate({
        "border-radius": "10px",
        "background-color": "#000"
    },500);
});


$("#recommendationsButton").click(function(){
    var offset = $("#calendar").offset().top;
    var st = $('html, body').attr('scrollTop');
    if(!(offset<st+20 && offset>st-20))
        $('html, body').animate({
            "scrollTop": $("#recommendations").offset().top
        },1000);
});
$("#recommendationsButton").mouseover(function(){
    $(this).animate({
        "border-radius": "20px",
        "background-color": "rgb(128, 32, 0, 0)"
    },100);
});
$("#recommendationsButton").mouseleave(function(){
    $(this).animate({
        "border-radius": "10px",
        "background-color": "#000"
    },500);
});



$("#tasksButton").click(function(){
    var offset = $("#calendar").offset().top;
    var st = $('html, body').attr('scrollTop');
    if(!(offset<st+20 && offset>st-20))
        $('html, body').animate({
            "scrollTop": $("#tasks").offset().top
        },1000);
});
$("#tasksButton").mouseover(function(){
    $(this).animate({
        "border-radius": "20px",
        "background-color": "rgba(128, 32, 0, 0.5)"
    },100);
});
$("#tasksButton").mouseleave(function(){
    $(this).animate({
        "border-radius": "10px",
        "background-color": "#000"
    },500);
});



$("#nearest-eventsButton").click(function(){
    var offset = $("#calendar").offset().top;
    var st = $('html, body').attr('scrollTop');
    if(!(offset<st+20 && offset>st-20))
        $('html, body').animate({
            "scrollTop": $("#nearest-events").offset().top
        },1000);
});
$("#nearest-eventsButton").mouseover(function(){
    $(this).animate({
        "border-radius": "20px",
        "background-color": "rgba(128, 32, 0, 0.5)"
    },100);
});
$("#nearest-eventsButton").mouseleave(function(){
    $(this).animate({
        "border-radius": "10px",
        "background-color": "#000"
    },500);
});