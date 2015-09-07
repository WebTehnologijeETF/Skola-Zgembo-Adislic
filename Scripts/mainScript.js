
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

var validateSubject = function() {
	var subjectElement = document.getElementById("contactSubject");
	subjectElement.setAttribute("class", "");
	subjectElement.parentElement.children[1].setAttribute("class", "error-hidden");
	if(!isNameValid(subjectElement.value)) {
		subjectElement.setAttribute("class", "input-error");
		subjectElement.parentElement.children[1].setAttribute("class", "error-text");
		return false;
	}
	return true;
}

var validateMessage = function () {
	var messageElement = document.getElementById("contactMessage");
	messageElement.setAttribute("class", "");
	messageElement.parentElement.children[1].setAttribute("class", "error-hidden");
	if(!isNameValid(messageElement.value)) {
		messageElement.setAttribute("class", "input-error");
		messageElement.parentElement.children[1].setAttribute("class", "error-text");
		return false;
	}
	return true;
}

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

validateContactForm = function () {
	nameEvent = {};
	nameEvent.target = document.getElementsByName("firstName")[0];
	return !validateName(nameEvent) || !validateEmail() || !validateSubject() || !validateMessage();
}

sendEmail = function () {
	if(validateContactForm())
		return;

	var name = document.getElementById("contactName").value;
	var mail = document.getElementById("contactMail").value;
	var subject = document.getElementById("contactSubject").value;
	var message = document.getElementById("contactMessage").value;
 	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
           		document.getElementById("pagecontent").innerHTML = xmlhttp.responseText;
           }
           else if(xmlhttp.status == 400) {
           }
           else {
           }
        }
    }
    xmlhttp.open("POST","Services/validateContact.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("name="+ name +"&mail="+ mail +"&subject=" + subject + "&message=" + message);
}

cancelSendEmail = function () {
	document.getElementById("contactName").value = "";
	document.getElementById("contactMail").value = "";
	document.getElementById("contactSubject").value = "";
	document.getElementById("contactMessage").value = "";
}

IAgree = function () {
 	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
           		document.getElementById("pagecontent").innerHTML = xmlhttp.responseText;
           }
           else if(xmlhttp.status == 400) {
           }
           else {
           }
        }
    }
    xmlhttp.open("POST","Services/sendEmail.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();
}

var newses = [];

var getNews = function () {
	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
           		newses = JSON.parse(xmlhttp.responseText);
           		getHtml("Partial/_index.html", renderIndexPage);
           }
           else if(xmlhttp.status == 400) {
           }
           else {
           }
        }
    }
    xmlhttp.open("GET","Services/newsService.php",true);
   	xmlhttp.send();
}

var getHtml = function (url, callbackRender) {
	    var xmlhttp;
	    if (window.XMLHttpRequest) {
	        xmlhttp = new XMLHttpRequest();
	    } else {
	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
	           if(xmlhttp.status == 200){
	               callbackRender(xmlhttp.responseText);
	           }
	           else if(xmlhttp.status == 400) {
	           }
	           else {
	           }
	        }
	    }
	    xmlhttp.open("GET", url, true);
	    xmlhttp.send();
	}

var renderIndexPage = function (html) {
	document.getElementById("pagecontent").innerHTML = "";

	for(var i = 0; i < newses.length; i++) {
		document.getElementById("pagecontent").innerHTML += html;
	}
	//html prepared

	//fill withData
	for(var i = 0; i < newses.length; i++) {
		var element = document.getElementById("pagecontent").children[i];
		element.getElementsByClassName("news-header")[0].innerText = newses[i].header;
		element.getElementsByClassName("news-content")[0].getElementsByTagName("img")[0].src = newses[i].imageUrl;
		element.getElementsByClassName("news-content")[0].getElementsByTagName("p")[0].innerText = newses[i].text;
		element.getElementsByClassName("news-date")[0].innerText = newses[i].author + ' u ' + newses[i].time;
		element.getElementsByClassName("news-more")[0].href = "javascript:clickOnMoreLink(" + i + ")";
	}

}

var readMoreNews = {};

var clickOnMoreLink = function (id) {
	readMoreNews = newses[id];
	getHtml("Partial/_more.html", renderMorePage);
}

var renderMorePage = function (html) {
	document.getElementById("pagecontent").innerHTML = html;
	document.getElementById("moreHeader").innerText = readMoreNews.header;
	document.getElementById("moreImage").src = readMoreNews.imageUrl;
	document.getElementById("moreText").innerText = readMoreNews.more;
	document.getElementById("moredate").innerText = readMoreNews.author + " u " + readMoreNews.time;
}