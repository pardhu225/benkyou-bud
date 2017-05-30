$("#calendarButton").click(function(){
    //alert($("#"+$("#calendarButton").attr("id").slice(0,$("#calendarButton").attr("id").indexOf("Button"))).offset().top);
    $('html, body').animate({
        "scrollTop": $("#calendar").offset().top
    },1000);
});
