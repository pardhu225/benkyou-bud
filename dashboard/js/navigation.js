var drawSquares = function(color) {
    switch(color)
    {
        case "red":
            var lc = document.getElementById("left-canvas").getContext("2d");
            var rc = document.getElementById("right-canvas").getContext("2d");
            for(var i=0;i<llayers.length;i++) {
                for(var j=0;j<llayers[i].elem.length;j++) {
                    setIntervalX(function(){
                        llayers[i].elem[j].r++;
                    },20,255-llayers[i].elem[j].c);
                }
            }
    }
};

function setIntervalX(callback, delay, repetitions) {
    var x = 0;
    var intervalID = window.setInterval(function () {

       callback();

       if (++x === repetitions) {
           window.clearInterval(intervalID);
       }
    }, delay);
}

// Reset the squares only when mouse leaves the button-pane
$("#button-pane").mouseleave(function(){
    resetSquares();
});

// Attach event handler for each buttons
$("#calendarButton").click(function(){
    var offset = $("#calendar").offset().top;
    var st = $('html, body').attr('scrollTop');
    if((offset<st+20 && offset>st-20)) {
        $('html, body').animate({
            "scrollTop": offset
        },1000);
    }
});
$("#calendarButton").mouseenter(function(){
    drawSquares("lime");
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
    drawSquares('red');
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
    drawSquares("mediumpurple");
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
    drawSquares("blue");
});