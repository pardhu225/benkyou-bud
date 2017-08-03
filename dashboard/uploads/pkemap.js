var LEGENDS = ['Arceus','Articuno','Azelf','Celebi','Cobalion','Cresselia','Darkrai','Deoxys','Dialga','Diancie','Entei','Genesect','Giratina','Groudon','Ho-oh','Hoopa','Jirachi','Keldeo','Kyogre','Kyurem','Landorus','Latias','Latios','Lugia','Manaphy','Meloetta','Mespirit','Mew','Mewtwo','Moltres','Palkia','Phione','Raikou','Rayquaza','Regice','Regigigas','Regirock','Registeel','Reshiram','Rotom','Shaymin','Suicune','Terrakion','Thundurus','Tornadus','Uxie','Victini','Victini','Virizion','Volcanion','Xerneas','Yveltal','Zapdos','Zekrom','Zygarde'];
var unique = false, legend = true, nonnormal = false;
/* 	1: top
	2: bottom
	3: left
	4: right
	5: top left
	6: bottom left
	7: top right
	8: bottom right
*/

var id,id2=-1;
function f() {
	if(id2!=-1) 
		clearInterval(id2);
	$("title").text("Searching...");
	var pkm = $("#pkmnappear");
	var i = 0;
	id = setInterval(function(){
		var poke = getPokemon();
		if(poke==="loading")
			return;
		if(poke==="none") {
			moveRandom();
			return;
		}
		if(isRequiredPokemon(poke)) {
			console.log(poke+" appeared.");
			console.log("Took "+i+" loops to find one");
			id2 = setInterval(function(){
				$("title").text(poke+" appeared.");
				setTimeout(function(){$("title").text("Abbey chutiye!!!")},1000);
			},2000);
			clearInterval(id);
		} else {
			console.log(poke);
			moveRandom();
		}
	},500);
};

function moveRandom() {
	var arrows,dir;
	var pos = getPos();

	if(pos.x<=2) {
		if($("#arrows img[data-mapmov$='4']").length===1) {
			$("#arrows img[data-mapmov$='4']").click();
			return;
		}
		if(pos.y>2)
			if($("#arrows img[data-mapmov$='7']").length===1) {
				$("#arrows img[data-mapmov$='7']").click();
				return;
			}
		if(pos.y<24)
			if($("#arrows img[data-mapmov$='8']").length===1) {
				$("#arrows img[data-mapmov$='8']").click();
				return;
			}
	}

	if(pos.x>=30) {
		if($("#arrows img[data-mapmov$='3']").length===1) {
			$("#arrows img[data-mapmov$='3']").click();
			return;
		}
		if(pos.y>2)
			if($("#arrows img[data-mapmov$='5']").length===1) {
				$("#arrows img[data-mapmov$='5']").click();
				return;
			}
		if(pos.y<24)
			if($("#arrows img[data-mapmov$='6']").length===1) {
				$("#arrows img[data-mapmov$='6']").click();
				return;
		}
	}

	if(pos.y<=2) {
		if($("#arrows img[data-mapmov$='2']").length===1) {
			$("#arrows img[data-mapmov$='2']").click();
			return;
		}
		if(pos.x>2)
			if($("#arrows img[data-mapmov$='6']").length===1) {
				$("#arrows img[data-mapmov$='6']").click();
				return;
			}
		if(pos.x<30)
			if($("#arrows img[data-mapmov$='8']").length===1) {
				$("#arrows img[data-mapmov$='8']").click();
				return;
			}
	}

	if(pos.y>=24) {
		if($("#arrows img[data-mapmov$='1']").length===1) {
			$("#arrows img[data-mapmov$='1']").click();
			return;
		}
		if(pos.x>2)
			if($("#arrows img[data-mapmov$='5']").length===1) {
				$("#arrows img[data-mapmov$='5']").click();
				return;
			}
		if(pos.x<30)
			if($("#arrows img[data-mapmov$='7']").length===1) {
				$("#arrows img[data-mapmov$='7']").click();
				return;
			}
	}
	while(true) {
		arrows = $("#arrows table tbody tr img[src*='arrow']");
		dir = Math.round(Math.random()*arrows.length);
		if($(arrows[dir]).attr("src") && $(arrows[dir]).attr("src").indexOf("no.gif")===-1)
			break;
	}
	$(arrows[dir]).click();
};


function isRequiredPokemon(str) {
	if(unique && str.indexOf("/strong>")===-1)
		return true;

	if(nonnormal && (str.indexOf("hiny")!==-1 || str.indexOf("ystic")!==-1 || str.indexOf("ark")!==-1 || str.indexOf("etallic")!==-1 || str.indexOf("hadow")!==-1))
		return true;

	if(legend)
		for(var i=0;i<LEGENDS.length;i++)
			if(str.indexOf(LEGENDS[i])!=-1)
				return true;

	return false;
}
var stop = function() {
	clearInterval(id);
	id=-1;
};

var getPos = function() {
	var i = 0;
	var arrows = $("#arrows table tbody tr img[src*='arrow']");
	for(;$(arrows[i]).attr("src").indexOf("no.gif")!==-1;i++);
	var str = $(arrows[i]).attr("data-mapmov");
	var arr = str.split(",");
	var ret = {
		x:Number(arr[0]),
		y:Number(arr[1]),
	};
	switch(Number(arr[2])) {
		case 1: ret.y++; break;
		case 2: ret.y--; break;
		case 3: ret.x++; break;
		case 4: ret.x--; break;
		case 5: ret.x++; ret.y++; break;
		case 6: ret.x++; ret.y--; break;
		case 7: ret.x--; ret.y++; break;
		case 8: ret.x--; ret.y--; break;
	}
	return ret;
};
function getPokemon() {
	var pkm = $("#pkmnappear");
	if(pkm[0].innerHTML==="<b>No wild Pokémon appeared.</b><br><i>Keep moving around to find one.</i>")
		return "none";
	if(pkm[0].innerHTML==="<p class=\"large\">Searching for Pokémon...</p><p>Please wait...</p>")
		return "loading";

	return pkm[0].innerHTML.substring(pkm[0].innerHTML.indexOf("Wild ")+5,pkm[0].innerHTML.indexOf(" appeared."));
}

function getLevel() {
	var pok = getPokemon();
	if(pok==="none" || pok==="loading") return -1;

	var str = $($("#pkmnappear form p")[1]).html();
	str = str.substring(7,str.indexOf("<"));
	return Number(str);
}
