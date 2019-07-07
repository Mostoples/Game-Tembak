levelImage = document.getElementById('level-image');
placeImage = document.getElementById('place-image');
weaponImage = document.getElementById('weapon-image');
selectedImage = document.getElementById('selected-place');





readylabelanim = document.getElementById("ready-label");

golabelanim = document.getElementById("go-label");
contsfx = document.getElementById("contsfx");
sourcesfx = document.getElementById("sourcesfx");

gunsfx = document.getElementById('gunsfx');

sfxwcount = 1;
boomsfxwcount = 1;

score = 0;

levelo = 0;

countfire = 1;

function playsiren(){
	document.getElementById('siren').play();
	document.getElementById('m1').volume = 0.2;
	document.getElementById('m2').volume = 0.2;
	document.getElementById('m3').volume = 0.2;
	document.getElementById('m3').volume = 0.2;
}

function playgameover(){
	document.getElementById('gameover').play();
}

function stopobj(){
	if (levelo == 1){
		jml = 11
	} else if(levelo == 2) {
		jml = 16
	} else if(levelo == 3) {
		jml = 21
	}
	for (i = 1; i < jml; i++){
		strobjrem = 'trash' + i.toString();
		remobj = document.getElementById(strobjrem);
		remobj.style.animationName = 'out';
		remobj.style.animationDuration = '1s';
		remobj.style.animationIterationCount = '1';
		remobj.style.top  = '-10vw';
		remobj.style.left = (i*7).toString() + 'vw';
		
	}

}

function allstop(){
	document.getElementById('contsfx').pause();
	document.getElementById('m1').pause();
	document.getElementById('m2').pause();
	document.getElementById('m3').pause();
	document.getElementById('m4').pause();
	document.getElementById('siren').pause();

}

function addplayer(a){
	playerobj = document.getElementById('playerarea');

	if (a == 1){	
		
		
		gunfire = document.getElementById('gunfire');
		strfire = "source/weapon/fire.gif"+"?a="+Math.random();
		gunfire.style.background = "url("+  strfire +")";
		gunfire.style.backgroundSize = 'cover';

		if (countfire == 11){
			countfire = 1;
			setTimeout(function(){addplayer(2);},500);
		}
		countfire += 1;

	} else if(a == 2) {
		gunfire = document.getElementById('gunfire');
		strfire = "source/weapon/reload.gif"+"?a="+Math.random();
		gunfire.style.background = "url("+  strfire +")";
		gunfire.style.backgroundSize = 'cover';
	}

	
}


function setanimready(){
	readyobj = document.getElementById('ready-label');
	readyobj.style.animationName = 'readymove';
	readyobj.style.animationDuration = '2s';
}

function setanimgameover(){
	gameoverlabel = document.getElementById('gameover-label');
	gameoverlabel.style.animationName = 'readymove';
	gameoverlabel.style.animationDuration = '2s';
	gameoverlabel.style.animationIterationCount = '1';
	
	setTimeout(function(){
		gameoverlabel2 = document.getElementById('gameover-label2');
		gameoverlabel2.style.top = '5vw';
		playagainbutton = document.getElementById('playagain-button').style;
		playagainbutton.left = '30vw';
		backpresetbutton = document.getElementById('back-preset-button').style;
		backpresetbutton.right = '30vw';
		quitbutton = document.getElementById('quit-button').style;
		quitbutton.right = '43vw';
		usernamelabelover = document.getElementById('username-label').style;
		usernamelabelover.right = '45vw';
		yourscorelabelover = document.getElementById('yourscore-label').style;
		yourscorelabelover.right = '45vw';
		
	},2000);
	
	
}


function setanimgo(){
	goobj = document.getElementById('go-label');
	goobj.style.animationName = 'readymove';
	goobj.style.animationDuration = '2s';
}


function govc(){
	document.getElementById('go-voice').play();
}

function readyvc(){
	document.getElementById('ready-voice').play();
}

function setbgvolume(){
	document.getElementById('contsfx').volume = 0.2;
	document.getElementById('m1').volume = 0.6;
	document.getElementById('m2').volume = 0.6;
	document.getElementById('m3').volume = 0.6;
	document.getElementById('m3').volume = 0.6;
}





function setscore(a){
	score += a;
	document.getElementById('score-label-gameplay').innerHTML = score.toString() + ' : Score';
	document.getElementById('yourscore-label').innerHTML = 'Score' + score.toString();
}




function createaudi(){
	if (sfxwcount == 20){
		sfxwcount = 1;
	}
	addplayer(1);
	strsfxcount  = 'sfxw' + sfxwcount.toString();
	sfxwcountobj = document.getElementById(strsfxcount);
	sfxwcountobj.muted = false;
	sfxwcountobj.play();
	sfxwcount += 1;
}

function createclean(a){
	cleanstr = 'clean' + a.toString();
	cleanobj = document.getElementsById(cleanstr);
	cleanareaobj = document.getElementById('cleanarea');
	 
}

function createblast(){
	if (boomsfxwcount == 10){
		boomsfxwcount = 1;
	}
	boomstrsfxcount  = 'boomsfx' + boomsfxwcount.toString();
	boomsfxwcountobj = document.getElementById(boomstrsfxcount);
	boomsfxwcountobj.muted = false;
	boomsfxwcountobj.play();
	boomsfxwcount += 1;

}







gamescreen = document.getElementById('game-screen');
trashiconstr = "";

function trashicon(a){
	if (a == 1){
		trashiconstr = "background : url(source/trash/btl.png); background-size : cover;";
	} else if(a == 2){
		trashiconstr = "background : url(source/trash/cup.png); background-size : cover;";
	} else if(a == 3){
		trashiconstr = "background : url(source/trash/donut.png); background-size : cover;";	
	} else if(a == 4){
		trashiconstr = "background : url(source/trash/kantong.png); background-size : cover;";		
	} else if(a == 5){
		trashiconstr = "background : url(source/trash/pisang.png); background-size : cover;";		
	} else if(a == 6){
		trashiconstr = "background : url(source/trash/plastik.png); background-size : cover;";		
	} else if(a == 7){
		trashiconstr = "background : url(source/trash/pp.png); background-size : cover;";		
	} else if(a == 8){
		trashiconstr = "background : url(source/trash/stero.png); background-size : cover;";		
	} else if(a == 9){
		trashiconstr = "background : url(source/trash/btl.png); background-size : cover;";		
	} else if(a == 10){
		trashiconstr = "background : url(source/trash/btl.png); background-size : cover;";		
	} else if(a == 11){
		trashiconstr = "background : url(source/trash/stero.png); background-size : cover;";		
	} else if(a == 12){
		trashiconstr = "background : url(source/trash/pp.png); background-size : cover;";		
	} else if(a == 13){
		trashiconstr = "background : url(source/trash/cup.png); background-size : cover;";		
	} else if(a == 14){
		trashiconstr = "background : url(source/trash/kantong.png); background-size : cover;";		
	} else if(a == 15){
		trashiconstr = "background : url(source/trash/pp.png); background-size : cover;";		
	} else if(a == 16){
		trashiconstr = "background : url(source/trash/pp.png); background-size : cover;";		
	} else if(a == 17){
		trashiconstr = "background : url(source/trash/btl.png); background-size : cover;";		
	} else if(a == 18){
		trashiconstr = "background : url(source/trash/btl.png); background-size : cover;";		
	} else if(a == 19){
		trashiconstr = 'background : url(source/trash/btl.png); background-size : cover;';		
	} else if(a == 20){
		trashiconstr = 'background : url(source/trash/btl.png); background-size : cover;';		
	}
}

function addnode(a){
	tempinner = "";
	if(a == 1){
		for (i = 1 ; i < 11; i++){
			trashicon(i);
			tempinner += "<div style='" + trashiconstr + "' class='trash' id='trash" + i.toString() + "' onclick='createaudi(); setscore(1); getCoordinate("+ i.toString() +");'></div>";
			
		}
	} else if(a == 2){
		for (i = 1 ; i < 16; i++){
			trashicon(i);
			tempinner += "<div style ='" + trashiconstr + "' class='trash' id='trash" + i.toString() + "' onclick='createaudi(); setscore(1); getCoordinate("+ i.toString() +");'></div>";
		}
	} else if(a == 3){
		for (i = 1 ; i < 21; i++){
			trashicon(i);
			tempinner += "<div style ='" + trashiconstr + "' class='trash' id='trash" + i.toString() + "' onclick='createaudi(); setscore(1); getCoordinate("+ i.toString() +");'></div>";
		}
	}
	console.log(tempinner)
	gamescreen.innerHTML = tempinner;
	
}

function setanimtrash(trashnum,lv){
	level = lv;
	randnum1 = Math.floor(Math.random()*10);
	randnum2 = Math.floor(Math.random()*10);
	
	if (lv == 1){
		if (randnum1 < 8){
			randnum1 = 9;
		}
	} else if(lv == 2){
		if (randnum1 < 4){
			randnum1 = 5;
		}
	} 

	trash = "";
	if (trashnum == 1){
		trash = document.getElementById('trash1');
	} else if (trashnum == 2){
		trash = document.getElementById('trash2');
	} else if (trashnum == 3){
		trash = document.getElementById('trash3');
	} else if (trashnum == 4){
		trash = document.getElementById('trash4');
	} else if (trashnum == 5){
		trash = document.getElementById('trash5');
	} else if (trashnum == 6){
		trash = document.getElementById('trash6');
	} else if (trashnum == 7){
		trash = document.getElementById('trash7');
	} else if (trashnum == 8){
		trash = document.getElementById('trash8');
	} else if (trashnum == 9){
		trash = document.getElementById('trash9');
	} else if (trashnum == 10){
		trash = document.getElementById('trash10');
	} else if (trashnum == 11){
		trash = document.getElementById('trash11');
	} else if (trashnum == 12){
		trash = document.getElementById('trash12');
	} else if (trashnum == 13){
		trash = document.getElementById('trash13');
	} else if (trashnum == 14){
		trash = document.getElementById('trash14');
	} else if (trashnum == 15){
		trash = document.getElementById('trash15');
	} else if (trashnum == 16){
		trash = document.getElementById('trash16');
	} else if (trashnum == 17){
		trash = document.getElementById('trash17');
	} else if (trashnum == 18){
		trash = document.getElementById('trash18');
	} else if (trashnum == 19){
		trash = document.getElementById('trash19');
	} else if (trashnum == 20){
		trash = document.getElementById('trash20');
	} 
		
	
	second = '10s';
	
	if (randnum1 == 1){
		second = '1s';
	} else if(randnum1 == 2){
		second = '2s';
	} else if(randnum1 == 3){
		second = '3s';
	} else if(randnum1 == 4){
		second = '4s';
	} else if(randnum1 == 5){
		second = '5s';
	} else if(randnum1 == 6){
		second = '6s';
	} else if(randnum1 == 7){
		second = '7s';
	} else if(randnum1 == 8){
		second = '8s';
	} else if(randnum1 == 9){
		second = '9s';
	} else if(randnum1 == 10){
		second = '10s';
	}
	
	movevar = 'move1';
	
	if (randnum2 == 1){
		movevar = 'move1';
	} else if(randnum2 == 2){
		movevar = 'move2';
	} else if(randnum2 == 3){
		movevar = 'move3';
	} else if(randnum2 == 4){
		movevar = 'move4';
	} else if(randnum2 == 5){
		movevar = 'move5';
	} else if(randnum2 == 6){
		movevar = 'move6';
	} else if(randnum2 == 7){
		movevar = 'move7';
	} else if(randnum2 == 8){
		movevar = 'move8';
	} else if(randnum2 == 9){
		movevar = 'move9';
	} else if(randnum2 == 10){
		movevar = 'move10';
	} 
	
	
	styled = trash.style;
	styled.animationDuration = second;
	styled.animationName = movevar;
	styled.animationIterationCount = 'infinite';
	styled.animationDirection = 'alternate';
	
	
}

function level(lv){
	addnode(lv);
	if (lv == 1){
		for (i = 1; i < 11; i++){
			setanimtrash(i,lv);
		}
	} else if(lv == 2){
		for (i = 1; i < 16; i++){
			setanimtrash(i,lv);
		}
	} else if(lv == 3){
		for (i = 1; i < 21; i++){
			setanimtrash(i,lv);
		}
	}

}


	
function gameplay(){
	level(1);
}




function changeBG(a,b){
	
	if (a == 1){
		if (b == 1){
			
			levelImage.style.background = 'url(source/weapon/ketapel.png)'; 
		} else if (b == 2) {
			
			levelImage.style.background = 'url(source/weapon/ketapel.png)'; 
		} else if (b == 3) {
			
			levelImage.style.background = 'url(source/weapon/ketapel.png)'; 
		}
		
		levelImage.style.backgroundSize = 'cover';
		
	} else if (a == 2) {
		
		if (b == 1){
			
			weaponImage.style.background = 'url(source/weapon/ketapel.png)'; 
		} else if (b == 2) {
			
			weaponImage.style.background = 'url(source/weapon/tembak.png)'; 
		} else if (b == 3) {
			
			weaponImage.style.background = 'url(source/weapon/panah.png)'; 
		}
		weaponImage.style.backgroundSize = 'cover';
		
	} else if (a == 3) {
		if (b == 1){
			
			placeImage.style.background = 'url(source/button/Pantai.png)'; 
			selectedImage.style.background = 'url(source/bg/streetls.png)';
		} else if (b == 2) {
			
			placeImage.style.background = 'url(source/button/ikonpantai.png)'; 
			selectedImage.style.background = 'url(source/bg/alley.jpg)';
		} else if (b == 3) {
			
			placeImage.style.background = 'url(source/button/iconpasar.png)'; 
			selectedImage.style.background = 'url(source/bg/2.gif)';
		}
		
		placeImage.style.backgroundSize = 'cover';
		selectedImage.style.backgroundSize = 'cover';
	}
	
	
	
	
}

time = 0;
function setime(a){
	levelo = a;
	if (a == 1){
		time = 180;
		console.log(time);
	} else if(a == 2){
		time = 120;
	} else if(a == 3){
		time = 60;
	}
	document.getElementById("time-label-gameplay").innerHTML = time.toString() + ' : Time';
}

function musikrand(){
	a = Math.floor(Math.random()*10);
	if (a < 8){document.getElementById('m1').play();}
	else if (a == 8){document.getElementById('m2').play();}
	else if (a == 9){document.getElementById('m3').play();}
	else if (a == 10){document.getElementById('m4').play();}

}

function injurytime(){
	timelabel = document.getElementById('time-label-gameplay');
	timelabel.style.animationName = 'injury';
	timelabel.style.animationDuration = '0.5s';
	timelabel.style.animationIterationCount = 'infinite';
	timelabel.style.animationDirection = 'alternate';
	timelabel.style.animationTimingFunction = 'liniear';

}

function runDatabase(){
	
	document.innerHTML += '<?php setscore('+ score.toString() +'); dbup(); ?>';
	
}



function timmer(){
	
    document.getElementById("time-label-gameplay").innerHTML = time.toString() + ' : Time';
	time -= 1;
	
	

	if (time == -1){
		allstop();
		stopobj();
		setanimgameover();
		playgameover();
		document.getElementById('link-restart').href = "gameplay.php?score=" + score.toString();
		document.getElementById('link-preset').href = "preset.php?score=" + score.toString();
		document.getElementById('link-menu').href = "menu.php?score=" + score.toString();
		//runDatabase();
		
	} else if (time == 10){
		injurytime();
		
	} else if (time == 8){
		playsiren();
	}
	
    setTimeout(timmer,1000);
	
}



/*
readylabelanim.addEventListener("animationstart", function() {
		govc();
}, false);

readylabelanim.addEventListener("animationend", function() {
		setanimgo();
}, false);

golabelanim.addEventListener("animationstart", function() {
		
}, false);

golabelanim.addEventListener("animationend", function() {
		timmer();
		level(levelo);
}, false);
*/


function singeladdtrash(a){
	trashicon(a);
    tempinner = "<div style='" + trashiconstr + "' class='trash' id='trash" + a.toString() + "' onclick='createaudi(); setscore(1); getCoordinate("+ a.toString() +");'></div>";
	gamescreen.innerHTML += tempinner;
	setanimtrash(a,level);
}

boomi = 1;

function getplustime(){
	timelb = document.getElementById('time-label-gameplay').style;
	timelb.animationName = 'gettime';
	timelb.animationDuration = '1s';
	timelb.animationIterationCount = '1';
	timelb.animationDirection = 'alternate';
	setTimeout(function(){timelb.animationName = '';},1000);

}

function getpoint(){
	pointlabel = document.getElementById('score-label-gameplay').style;
	pointlabel.animationName = 'getpoint';
	pointlabel.animationDuration = '1s';
	pointlabel.animationIterationCount = '1';
	pointlabel.animationDirection = 'alternate';
	setTimeout(function(){pointlabel.animationName = '';},1000);

}

function boom(x,y){
	if(boomi == 11){boomi = 1}
	getplustime();
	getpoint();

	time += 5;
	
	strboom = 'boom';
	strboom += boomi.toString();

	boomelemclas = document.getElementsByClassName('boom');

	boomelem = document.getElementById(strboom);
	boomelem.style.left = x;
	boomelem.style.top = y;
	boomelem.style.visibility = 'visible';
	createblast();
	boomi += 1;
	setTimeout(function rem(){boomelem.style.left = '-100vw'; boomelem.style.top = '-100vw'; boomelem.style.visibility = 'hidden'; boomelemclas.style.visibility = 'hidden'; boomelemclass.style.left = '-100vw'; boomelemclass.style.top = '-100vw'
 },1000);
}


function getCoordinate(a){
	trashid = 'trash';
	if (a == 1){
		trashid += '1';
	} else if(a == 2){
		trashid += '2';
	} else if(a == 3){
		trashid += '3';
	} else if(a == 4){
		trashid += '4';
	} else if(a == 5){
		trashid += '5';
	} else if(a == 6){
		trashid += '6';
	} else if(a == 7){
		trashid += '7';
	} else if(a == 8){
		trashid += '8';
	} else if(a == 9){
		trashid += '9';
	} else if(a == 10){
		trashid += '10';
	} else if(a == 11){
		trashid += '11';
	} else if(a == 12){
		trashid += '12';
	} else if(a == 13){
		trashid += '13';
	} else if(a == 14){
		trashid += '14';
	} else if(a == 15){
		trashid += '15';
	} else if(a == 16){
		trashid += '16';
	} else if(a == 17){
		trashid += '17';
	} else if(a == 18){
		trashid += '18';
	} else if(a == 19){
		trashid += '19';
	} else if(a == 20){
		trashid += '20';
	}

	objtrash = document.getElementById(trashid);
	xaxis = window.getComputedStyle(objtrash, null).getPropertyValue("left");
	yaxis = window.getComputedStyle(objtrash, null).getPropertyValue("top");
		

	objtrash.remove();
	boom(xaxis,yaxis);

	setTimeout(singeladdtrash(a),1000)
	

}

xaxisplayer = 0;










var mouse_monitor = function(e) {
	xaxisplayer = e.pageX;
	if (xaxisplayer > 850){
		xaxisplayer = 850;
	}
	console.log(xaxisplayer);
	document.getElementById('playerarea').style.left = xaxisplayer;
  
}



document.addEventListener('DOMContentLoaded', function (){
	this.addEventListener('mousemove', mouse_monitor);
	addplayer(2);
	setbgvolume();
	setTimeout(function(){readyvc();},2800);
	setTimeout(function(){setanimready();},3000);
	setTimeout(function(){govc();},4800);
	setTimeout(function(){setanimgo()},5000);
	setTimeout(function(){timmer();level(levelo);musikrand(); },6000);
	
}, false);
