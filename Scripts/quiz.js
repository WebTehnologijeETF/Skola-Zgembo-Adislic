var states = [];

var loadStates = function () {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
               states = JSON.parse(xmlhttp.responseText);
           }
           else if(xmlhttp.status == 400) {
           }
           else {
           }
        }
    }
    xmlhttp.open("GET", "https://restcountries.eu/rest/v1/all", true);
    xmlhttp.send();
}


var score;
var time;
var intervalId;
var currentState;
var numberOfLives;

var startnext = function () {
	if(states.length > 0) {
		if(!currentState) {
			setNextStateAsCurrent();
			document.getElementById("startnext").innerText = "Sledece";
			resetScore();
			resetTimer();
			startTimer();
			resetNumberOfLives();
		}
		else if(currentState.capital == document.getElementById("capitalcityid").value && time > 0) {
			if(intervalId)
				clearInterval(intervalId);
			setNextStateAsCurrent();
			updateScore();
			resetTimer();
			startTimer();
		}
		else if(numberOfLives > 0) {
			if(intervalId)
				clearInterval(intervalId);
			updateNumberOfLives();
			resetTimer();
			setNextStateAsCurrent();
			startTimer();
		}
		else {
			if(intervalId)
				clearInterval(intervalId);
			dialog = document.getElementById("dialog");
			dialog.style.visibility = (dialog.style.visibility == "visible") ? "hidden" : "visible";
			document.getElementById("scoreDialog").innerText = score;
		}
	}
}


var setNextStateAsCurrent = function () {
	currentState = states[Math.floor(Math.random()*1000000000000000) % 248];
	document.getElementById("capitalcityid").value = "";
	document.getElementById("stateName").innerText = currentState.name;
}

var updateScore = function () {
	score += 5;
	document.getElementById("score").innerText = score;

}

var resetScore = function () {
	score = 0;
}

var resetTimer = function () {
	time = 10;
}

var updateTime = function () {
	time -= 1;
	document.getElementById("time").innerText = time;
	if(time == 0) {
		if(intervalId)
			clearInterval(intervalId);
		startnext();
	}
}

var startTimer = function() {
	intervalId = setInterval(updateTime, 1000);
}

var resetNumberOfLives = function () {
	numberOfLives = 3;
	document.getElementById("hertz1").style.visibility = "visible"; 
	document.getElementById("hertz2").style.visibility = "visible"; 
	document.getElementById("hertz3").style.visibility = "visible"; 
}

var updateNumberOfLives = function () {
	numberOfLives -= 1;
	switch(numberOfLives) {
		case 0:
			document.getElementById("hertz3").style.visibility = "hidden"; 
		case 1:
			document.getElementById("hertz2").style.visibility = "hidden"; 
		case 2:
			document.getElementById("hertz1").style.visibility = "hidden"; 
			break;
	}
}

var cancel = function () {
	score = undefined;
	time = undefined;
	intervalId = undefined;
	currentState = undefined;
	numberOfLives = undefined;


	document.getElementById("hertz1").style.visibility = "visible"; 
	document.getElementById("hertz2").style.visibility = "visible"; 
	document.getElementById("hertz3").style.visibility = "visible"; 
	
	document.getElementById("startnext").innerText = "Start";
	dialog = document.getElementById("dialog");
	document.getElementById("stateName").innerText = "";
	document.getElementById("capitalcityid").value = "";
	document.getElementById("time").innerText = "";
	document.getElementById("score").innerText = "";
	dialog.style.visibility = (dialog.style.visibility == "visible") ? "hidden" : "visible";
}
