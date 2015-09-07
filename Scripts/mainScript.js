
///add ervents onmouse leave and on mouse enter on li tags in setting men


var isNameValid = function(name) {
	return name.trim().length > 1;
}

isEmailValid = function(email) {
	regExp = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regExp.test(email);
}

var validateName = function(event) {
	event.target.setAttribute("class", "");
	event.target.parentElement.children[1].setAttribute("class", "error-hidden");
	if(!isNameValid(event.target.value)) {
		event.target.setAttribute("class", "input-error");
		event.target.parentElement.children[1].setAttribute("class", "error-text");
		return false;
	}
	return true;
};

var validateEmail = function() {
	var emailElement = document.getElementsByName("email")[0];
	emailElement.setAttribute("class", "");
	emailElement.parentElement.children[1].setAttribute("class", "error-hidden");
	if(!isEmailValid(emailElement.value)) {
		emailElement.setAttribute("class", "input-error");
		emailElement.parentElement.children[1].setAttribute("class", "error-text");
		return false;
	}
	return true;
};

var validatePass = function() {
	var passElement = document.getElementsByName("pass")[0];
	passElement.setAttribute("class", "");
	passElement.parentElement.children[1].setAttribute("class", "error-hidden");
	if(passElement.value.length < 6) {
		passElement.setAttribute("class", "input-error");
		passElement.parentElement.children[1].setAttribute("class", "error-text");
		return false;
	}
	return true;
};

var validateConfirmPass = function() {
	var confrimPassElement = document.getElementsByName("confirmPass")[0];
	var passElement = document.getElementsByName("pass")[0];
	confrimPassElement.setAttribute("class", "");
	confrimPassElement.parentElement.children[1].setAttribute("class", "error-hidden");
	if(confrimPassElement.value != passElement.value) {
		confrimPassElement.setAttribute("class", "input-error");
		confrimPassElement.parentElement.children[1].setAttribute("class", "error-text");
		return false;
	}
	return true;
};

var submitAddUser = function() {
	 var firstName = document.getElementsByName("firstName")[0];
	 var lastName = document.getElementsByName("lastName")[0];
	 var firstNameEvent = {};
	 firstNameEvent.target = firstName;
	 var lastnameEvent = {};
	 lastnameEvent.target = lastName;
	 return validateName(firstNameEvent)  &&  validateName(lastnameEvent) && validateEmail() && validatePass() && validateConfirmPass();
};

var onClickOutsideSettings = function(event) {
	if(event.target.id != "settings" || (event.target.id == "settings" && document.getElementById("settings-menu").children[0].style.visibility == "visible")) {
		document.getElementById("settings-menu").children[0].style.visibility = "hidden";
		if(event.target.className == "sub")
			event.target.parentElement.style.visibility = "hidden";
		else if(event.target.parentElement.className == "sub")
			event.target.parentElement.parentElement.style.visibility = "hidden";
		else if(event.target.parentElement.parentElement.className == "sub") {
			event.target.parentElement.parentElement.parentElement.style.visibility = "hidden";
		}
		else if(event.target.children[0] && event.target.children[0].className == "sub")
			event.target.style.visibility = "hidden";
	}
	else if(event.target.id == "settings" && document.getElementById("settings-menu").style.visibility != "visible")  {
		document.getElementById("settings-menu").children[0].style.visibility = "visible";
	}
}

