(function() {

	var onMouseEnterLi = function(event) {
		if(event.target.className == "sub") {
			event.target.style.borderLeft = "4px solid #FFFFFF"
		}
		else {
			event.target.style.backgroundColor = "#FFFFFF";
			event.target.style.borderRight = "1px solid #89C13C";
			event.target.style.borderLeft = "1px solid #89C13C";
			if(event.target.className == "has-sub")
				event.target.children[1].style.visibility = "visible";
		}
	}
	var onMouseLeaveLi = function(event) {
		if(event.target.className == "sub") {
			event.target.style.borderLeft = "4px solid #89C13C"
		}
		else {
			event.target.style.backgroundColor = "#89C13C";
			if(event.target.className == "has-sub") 
				event.target.children[1].style.visibility = "hidden";
		}
	}

	var ulElement = document.getElementById("settings-menu").children[0];
	for(var key in ulElement.children) {
		ulElement.children[key].onmouseenter = onMouseEnterLi;
		ulElement.children[key].onmouseleave = onMouseLeaveLi;
		if(ulElement.children[key].className == "has-sub") {
			for(var subkey in ulElement.children[key].children[1].children) {
				ulElement.children[key].children[1].children[subkey].onmouseenter = onMouseEnterLi;
				ulElement.children[key].children[1].children[subkey].onmouseleave = onMouseLeaveLi;
			}
		}
	}
})();
