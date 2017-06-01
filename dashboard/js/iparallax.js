$("#content-pane").css({"background-color":"black"});

//Layer constructor function
var layer = function(param) {
	this.elem = [];
	this.parallax = param.parallax;
	this.randomFunction = param.randFunction;
	var rf = this.randomFunction;
	for(var i=0;i<param.num_squares;i++) {
        var ret = {
            s: Math.round(Math.random()*(param.max_side - param.min_side) + param.min_side),
            x: Math.round(param.randomFunction()*param.width),
            y: Math.round(Math.random()*param.height),
            c: Math.random()*(param.max_gray - param.min_gray) + param.min_gray,
            o: (Math.random()*(param.max_opacity - param.min_opacity) + param.min_opacity),
            r: 0,
            g: 0,
            b: 0,
            fo: 0,
            r_grad:0,
            g_grad:0,
            b_grad:0,
            o_grad:0
        };
        ret.r = ret.g = ret.b = ret.c;
        ret.fo = ret.o;
		this.elem.push(ret);
	}
};

var llayers = [];
var rlayers = [];
var resetFlag = false;
var REPETETIONS = 20;
var DELAY = 20;

//Initiate all the squares at the starting itself: called when doc is ready
var startup = function() {

	var left = document.getElementById("left-canvas");
	var right = document.getElementById("right-canvas");
	left.height = $("body").height();
	right.height = $("body").height();
	var lc = $("#left-canvas").get(0).getContext("2d");
	var rc = $("#right-canvas").get(0).getContext("2d");


	// Push in the first layer
	llayers.push(new layer({
		height: left.height,
		width: right.width,
		num_squares: 55,
		max_side: 30,
		min_side: 25,
		max_gray: 220,
		min_gray: 175,
		max_opacity: 0.6,
		min_opacity: 0.2,
		parallax: 0.01,
        grad: function(){},
		randomFunction: function() {
			return Math.random()*Math.random()*Math.random();
		}
	}));
	rlayers.push(new layer({
		height: left.height,
		width: right.width,
		num_squares: 55,
		max_side: 30,
		min_side: 25,
		max_gray: 220,
		min_gray: 175,
		max_opacity: 0.6,
		min_opacity: 0.2,
		parallax: 0.01,
        grad: function(){},
		randomFunction: function() {
			return 1-Math.random()*Math.random()*Math.random();
		}
	}));

	// Push in the second layer
	llayers.push(new layer({
		height: left.height,
		width: right.width,
		num_squares: 50,
		max_side: 25,
		min_side: 15,
		max_gray: 220,
		min_gray: 175,
		max_opacity: 0.6,
		min_opacity: 0.2,
		parallax: 0.25,
        grad: function(){},
		randomFunction: function() {
			return Math.random()*Math.random();
		}
	}));
	rlayers.push(new layer({
		height: left.height,
		width: right.width,
		num_squares: 50,
		max_side: 25,
		min_side: 15,
		max_gray: 220,
		min_gray: 175,
		max_opacity: 0.6,
		min_opacity: 0.2,
		parallax: 0.25,
		randomFunction: function() {
			return 1-Math.random()*Math.random();
		}
	}));

	// Push in the third layer
	llayers.push(new layer({
		height: left.height,
		width: right.width,
		num_squares: 40,
		max_side: 15,
		min_side: 7,
		max_gray: 220,
		min_gray: 175,
		max_opacity: 0.6,
		min_opacity: 0.2,
		parallax: 0.5,
        grad: function(){},
		randomFunction: function() {
			return Math.random()*Math.random();
		}
	}));
	rlayers.push(new layer({
		height: left.height,
		width: right.width,
		num_squares: 40,
		max_side: 15,
		min_side: 7,
		max_gray: 220,
		min_gray: 175,
		max_opacity: 0.6,
		min_opacity: 0.2,
		parallax: 0.5,
        grad: function(){},
		randomFunction: function() {
			return 1-Math.random()*Math.random();
		}
	}));

	// Push in the fourth layer
	llayers.push(new layer({
		height: left.height,
		width: right.width,
		num_squares: 40,
		max_side: 7,
		min_side: 0,
		max_gray: 220,
		min_gray: 175,
		max_opacity: 0.6,
		min_opacity: 0.2,
		parallax: 0.75,
        grad: function(){},
		randomFunction: function() {
			return Math.random()*Math.random();
		}
	}));
	rlayers.push(new layer({
		height: left.height,
		width: right.width,
		num_squares: 40,
		max_side: 7,
		min_side: 0,
		max_gray: 220,
		min_gray: 175,
		max_opacity: 0.6,
		min_opacity: 0.2,
		parallax: 0.75,
        grad: function(){},
		randomFunction: function() {
			return 1-Math.random()*Math.random();
		}
	}));

	$(window).scroll(drawCanvas);
	drawCanvas();
};

var drawLayer = function(l, context) {
    var scrollTop = $(window).scrollTop();
    for(var i=0;i<l.elem.length;i++) {
        context.fillStyle = "rgba("+Math.round(l.elem[i].r)+","+Math.round(l.elem[i].g)+","+Math.round(l.elem[i].b)+","+l.elem[i].fo+")";
        context.fillRect(l.elem[i].x, l.elem[i].y + l.parallax * scrollTop, l.elem[i].s, l.elem[i].s);
    }
};

var drawCanvas = function() {
    var right = document.getElementById("right-canvas");
    var left = document.getElementById("left-canvas");
    var rc = document.getElementById("right-canvas").getContext("2d");
    var lc = document.getElementById("left-canvas").getContext("2d");
    rc.clearRect(0,0,right.width,right.height);
    lc.clearRect(0,0,left.width,left.height);
    for(var i=0;i<rlayers.length;i++) {
        drawLayer(rlayers[i], rc);
        drawLayer(llayers[i], lc);
    }
};

$(document).on("ready",startup);

var drawSquares = function(color) {
    for(var i=0;i<llayers.length;i++) {
        for(var j=0;j<llayers[i].elem.length;j++) {
            switch(color) {
                case "red":
                    llayers[i].elem[j].r_grad = (255 - llayers[i].elem[j].r)/REPETETIONS;
                    rlayers[i].elem[j].r_grad = (255 - rlayers[i].elem[j].r)/REPETETIONS;

                    llayers[i].elem[j].g_grad = (0 - llayers[i].elem[j].g)/REPETETIONS;
                    rlayers[i].elem[j].g_grad = (0 - rlayers[i].elem[j].g)/REPETETIONS;

                    llayers[i].elem[j].b_grad = (0 - llayers[i].elem[j].b)/REPETETIONS;
                    rlayers[i].elem[j].b_grad = (0 - rlayers[i].elem[j].b)/REPETETIONS;


                    break;
                case "lime":
                    llayers[i].elem[j].g_grad = (255 - llayers[i].elem[j].r)/REPETETIONS;
                    rlayers[i].elem[j].g_grad = (255 - rlayers[i].elem[j].r)/REPETETIONS;

                    llayers[i].elem[j].r_grad = (0 - llayers[i].elem[j].g)/REPETETIONS;
                    rlayers[i].elem[j].r_grad = (0 - rlayers[i].elem[j].g)/REPETETIONS;

                    llayers[i].elem[j].b_grad = (0 - llayers[i].elem[j].b)/REPETETIONS;
                    rlayers[i].elem[j].b_grad = (0 - rlayers[i].elem[j].b)/REPETETIONS;
                    break;
                case "mediumpurple":
                    llayers[i].elem[j].r_grad = (147 - llayers[i].elem[j].r)/REPETETIONS;
                    rlayers[i].elem[j].r_grad = (147 - rlayers[i].elem[j].r)/REPETETIONS;

                    llayers[i].elem[j].g_grad = (112 - llayers[i].elem[j].g)/REPETETIONS;
                    rlayers[i].elem[j].g_grad = (112 - rlayers[i].elem[j].g)/REPETETIONS;

                    llayers[i].elem[j].b_grad = (219 - llayers[i].elem[j].b)/REPETETIONS;
                    rlayers[i].elem[j].b_grad = (219 - rlayers[i].elem[j].b)/REPETETIONS;
                    break;
                case "blue":
                    llayers[i].elem[j].b_grad = (255 - llayers[i].elem[j].r)/REPETETIONS;
                    rlayers[i].elem[j].b_grad = (255 - rlayers[i].elem[j].r)/REPETETIONS;

                    llayers[i].elem[j].g_grad = (0 - llayers[i].elem[j].g)/REPETETIONS;
                    rlayers[i].elem[j].g_grad = (0 - rlayers[i].elem[j].g)/REPETETIONS;

                    llayers[i].elem[j].r_grad = (0 - llayers[i].elem[j].b)/REPETETIONS;
                    rlayers[i].elem[j].r_grad = (0 - rlayers[i].elem[j].b)/REPETETIONS;
                    break;
                case "original":
                    resetFlag = true;
                    llayers[i].elem[j].r_grad = (llayers[i].elem[j].c - llayers[i].elem[j].r)/REPETETIONS;
                    rlayers[i].elem[j].r_grad = (rlayers[i].elem[j].c - rlayers[i].elem[j].r)/REPETETIONS;

                    llayers[i].elem[j].g_grad = (llayers[i].elem[j].c - llayers[i].elem[j].g)/REPETETIONS;
                    rlayers[i].elem[j].g_grad = (rlayers[i].elem[j].c - rlayers[i].elem[j].g)/REPETETIONS;

                    llayers[i].elem[j].b_grad = (llayers[i].elem[j].c - llayers[i].elem[j].b)/REPETETIONS;
                    rlayers[i].elem[j].b_grad = (rlayers[i].elem[j].c - rlayers[i].elem[j].b)/REPETETIONS;

                    llayers[i].elem[j].o_grad = (llayers[i].elem[j].o - llayers[i].elem[j].fo)/REPETETIONS;
                    rlayers[i].elem[j].o_grad = (rlayers[i].elem[j].o - rlayers[i].elem[j].fo)/REPETETIONS;
            }
            if(color!== "original") {
                llayers[i].elem[j].o_grad = (Math.random()*(1-.6) +.6 - llayers[i].elem[j].fo)/REPETETIONS;
                rlayers[i].elem[j].o_grad = (Math.random()*(1-.6) +.6 - rlayers[i].elem[j].fo)/REPETETIONS;
            }
        }
    }
    
    if(color!=="original")
        setIntervalX(function(){
            if(!resetFlag) {
                for(var i=0;i<llayers.length;i++) {
                    for(var j=0;j<llayers[i].elem.length;j++) {
                         {
                            llayers[i].elem[j].r += llayers[i].elem[j].r_grad;
                            rlayers[i].elem[j].r += llayers[i].elem[j].r_grad;

                            llayers[i].elem[j].g += llayers[i].elem[j].g_grad;
                            rlayers[i].elem[j].g += rlayers[i].elem[j].g_grad;

                            llayers[i].elem[j].b += llayers[i].elem[j].b_grad;
                            rlayers[i].elem[j].b += rlayers[i].elem[j].b_grad;

                            llayers[i].elem[j].fo += llayers[i].elem[j].o_grad;
                            rlayers[i].elem[j].fo += rlayers[i].elem[j].o_grad;
                        }
                    }
                }
                drawCanvas();
            }
        }, DELAY, REPETETIONS);
    else
        setIntervalX(function(){
            for(var i=0;i<llayers.length;i++) {
                for(var j=0;j<llayers[i].elem.length;j++) {
                     {
                        llayers[i].elem[j].r += llayers[i].elem[j].r_grad;
                        rlayers[i].elem[j].r += llayers[i].elem[j].r_grad;

                        llayers[i].elem[j].g += llayers[i].elem[j].g_grad;
                        rlayers[i].elem[j].g += rlayers[i].elem[j].g_grad;

                        llayers[i].elem[j].b += llayers[i].elem[j].b_grad;
                        rlayers[i].elem[j].b += rlayers[i].elem[j].b_grad;

                        llayers[i].elem[j].fo += llayers[i].elem[j].o_grad;
                        rlayers[i].elem[j].fo += rlayers[i].elem[j].o_grad;
                    }
                }
            }
            drawCanvas();
        }, DELAY, REPETETIONS, function(){resetFlag=false;});
};

function resetSquares() {
    console.log("Resetting squares");
    drawSquares("original");
}

function setIntervalX(callback, delay, repetitions, endf) {
    var x = 0;
    var intervalID = window.setInterval(function () {

       callback();

       if (++x === repetitions) {
           window.clearInterval(intervalID);
           if(endf!==undefined)
            endf();
       }
    }, delay);
    return intervalID;
}

// Reset the squares only when mouse leaves the button-pane
$("#buttons-pane").mouseleave(function(){
    resetSquares();
});

// Attach event handler for each button
$("#calendarButton").click(function(){
    var offset = $("#calendar").offset().top;
    var st = $('html, body').attr('scrollTop');
    $('html, body').animate({"scrollTop": offset},1000);
    
});
$("#calendarButton").mouseenter(function(){
    drawSquares("lime");
});

$("#recommendationsButton").click(function(){
    var offset = $("#calendar").offset().top;
    var st = $('html, body').attr('scrollTop');
    $('html, body').animate({"scrollTop": $("#recommendations").offset().top},1000);
});
$("#recommendationsButton").mouseenter(function(){
    drawSquares('red');
});

$("#tasksButton").click(function(){
    var offset = $("#calendar").offset().top;
    var st = $('html, body').attr('scrollTop');
    $('html, body').animate({"scrollTop": $("#tasks").offset().top},1000);
});
$("#tasksButton").mouseenter(function(){
    drawSquares("mediumpurple");
});

$("#nearest-eventsButton").click(function(){
    var offset = $("#calendar").offset().top;
    var st = $('html, body').attr('scrollTop');
    $('html, body').animate({"scrollTop": $("#nearest-events").offset().top},1000);
});
$("#nearest-eventsButton").mouseenter(function(){
    drawSquares("blue");
});