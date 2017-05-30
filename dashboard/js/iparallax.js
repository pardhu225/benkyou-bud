$("#content-pane").css({"background-color":"white"});

//Layer constructor function
var layer = function(param) {
	this.elem = [];
	this.parallax = param.parallax;
	this.randomFunction = param.randFunction;
	var rf = this.randomFunction;
	for(var i=0;i<param.num_squares;i++) {
		this.elem.push({
			s: Math.round(Math.random()*(param.max_side - param.min_side) + param.min_side),
			x: Math.round(param.randomFunction()*param.width),
			y: Math.round(Math.random()*param.height),
			c: Math.round(Math.random()*(param.max_gray - param.min_gray) + param.min_gray),
			o: (Math.random()*(param.max_opacity - param.min_opacity) + param.min_opacity)
		});
	}
};

var startup = function() {

	var left = document.getElementById("left-canvas");
	var right = document.getElementById("right-canvas");
	left.height = $("body").height();
	right.height = $("body").height();
	var lc = $("#left-canvas").get(0).getContext("2d");
	var rc = $("#right-canvas").get(0).getContext("2d");

	var llayers = [];
	var rlayers = [];

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
		randomFunction: function() {
			return 1-Math.random()*Math.random();
		}
	}));


	var drawLayer = function(l, context) {
		var scrollTop = $(window).scrollTop();
		for(var i=0;i<l.elem.length;i++) {

			context.fillStyle = "rgba("+l.elem[i].c+","+l.elem[i].c+","+l.elem[i].c+","+l.elem[i].o+")";
			context.fillRect(l.elem[i].x, l.elem[i].y + l.parallax * scrollTop, l.elem[i].s, l.elem[i].s);
		}
	};

	var drawCanvas = function() {
		rc.clearRect(0,0,right.width,right.height);
		lc.clearRect(0,0,left.width,left.height);
		for(var i=0;i<rlayers.length;i++) {
			if(true) {
				drawLayer(rlayers[i], rc);
				drawLayer(llayers[i], lc);
			}
		}
	};

	$(window).scroll(drawCanvas);
	drawCanvas();
};

$(document).on("ready",startup);