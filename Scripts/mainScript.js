
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
	 if(validateName(firstNameEvent)  &&  validateName(lastnameEvent) && validateEmail() && validatePass() && validateConfirmPass())
	 {
	 	var user = {
	 		firstName: firstName.value,
	 		lastName: lastName.value,
	 		email: document.getElementsByName("email")[0].value,
	 		pass: document.getElementsByName("pass")[0].value,
	 		role: 1
	 	};
	 	dataService("POST",JSON.stringify(user), "Services/addUser.php", getAllUsers);
	 }
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

var logout = function() {
	dataService("GET", null, "Services/logout.php", reload);
}

var login = function() {
	var login = {
		email: document.getElementById("emailId").value,
		pass: document.getElementById("password").value
	};
	dataService("POST", JSON.stringify(login), "Services/login.php", reload);
}

var reload = function(response) {
	if(response == true)
		htmlService("index.php", renderIndex);
}

var getAllNews = function() {
	dataService("GET", null, "Services/getNews.php", callBackGetAllNews);
}

var callBackGetAllNews = function(response) {
	newses = JSON.parse(response);
	htmlService("Partial/_index.html", renderHomePage);
}

var renderHomePage = function (html) {
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

var clickOnMoreLink = function (id) {
	readMoreNews = newses[id];
	htmlService("Partial/_more.html", renderMorePage);
}

var renderMorePage = function (html) {
	document.getElementById("pagecontent").innerHTML = html;
	document.getElementById("newsId").value = readMoreNews.id;
	document.getElementById("moreHeader").innerText = readMoreNews.header;
	document.getElementById("moreImage").src = readMoreNews.imageUrl;
	document.getElementById("moreText").innerText = readMoreNews.more;
	document.getElementById("moredate").innerText = readMoreNews.author + " u " + readMoreNews.time;
	dataService("GET", null, "Services/getNumberOfComments.php?data=" + readMoreNews.id, showNumberOfComments);
}

var renderIndex = function (response) {
	document.open();
    document.write(response);
    document.close();
}
var resetAddUserForm = function () {
	if (document.getElementsByName("firstName")[0] != undefined) {
		document.getElementsByName("firstName")[0].value = "";
		document.getElementsByName("lastName")[0].value = "";
		document.getElementsByName("email")[0].value ="";
		document.getElementsByName("pass")[0].value = "";
		document.getElementsByName("confirmPass")[0].value = "";
	}
}

var getAllUsers = function () {
	resetAddUserForm();
	dataService("GET", null, "Services/getUsers.php", fillUsersTableWithData);
}

var users = [];

var fillUsersTableWithData = function (response) {
	users = JSON.parse(response);
	var table = document.getElementById("booksTableTbody");
	while(table.rows.length > 0) {
	  table.deleteRow(0);
	}
	for(var key in users) {
		var row = table.insertRow(0);
		var cell1 = row.insertCell(0);
    	var cell2 = row.insertCell(1);
    	var cell3 = row.insertCell(2);
    	var cell4 = row.insertCell(3);
    	var cell5 = row.insertCell(4);

    	cell1.innerHTML = users[key].firstName;
    	cell2.innerHTML = users[key].lastName;
    	cell3.innerHTML = users[key].email;
    	cell4.innerHTML = users[key].role == 1 ? "Administrator" : "Korisnik";
    	cell5.innerHTML = "<img src='Content/edit.png' alt='edit' onclick='openUserEditDialog(" + key + ")'> <img src='Content/delete.png' alt='delete' onclick='deleteUser(" + users[key].id  + ")'>";
	}
}

var deleteUser = function(id) {
	dataService("DELETE", id ,"Services/deleteUser.php", getAllUsers);
}

var openUserEditDialog = function (index) {
	var user = users[index];
	document.getElementById("editTitle").value = user.firstName;
	document.getElementById("editDescription").value = user.lastName;
	document.getElementById("editPrice").value = user.email;
	document.getElementById("userId").value = user.id;
	dialog = document.getElementById("editDialog");
	dialog.style.visibility = "visible";
}

var editUser = function() {
	var user =  {
		id: document.getElementById("userId").value,
		firstName: document.getElementById("editTitle").value,
		lastName: document.getElementById("editDescription").value,
		email: document.getElementById("editPrice").value,
		role: 1
	};
	dataService("PUT", JSON.stringify(user), "/Services/editUser.php", getAllUsers);
	dialog = document.getElementById("editDialog");
	dialog.style.visibility = "hidden";
}

var addNews = function() {
	var news = {
		header: document.getElementById("headerId").value,
	 	imageUrl: document.getElementById("image").value,
	 	text: document.getElementById("text").value,
	 	more: document.getElementById("moretext").value
	};
	dataService("POST", JSON.stringify(news), "Services/addNews.php", getAllNewsAdmin);
}

var getAllNewsAdmin = function(response) {
	dataService("GET", null, "Services/getNews.php", fillTableWithNewses);
}

var fillTableWithNewses = function (response) {
	newses = JSON.parse(response);
	var table = document.getElementById("booksTableTbody");
	while(table.rows.length > 0) {
	  table.deleteRow(0);
	}
	for(var key in newses) {
		var row = table.insertRow(0);
		var cell1 = row.insertCell(0);
    	var cell2 = row.insertCell(1);
    	var cell3 = row.insertCell(2);
    	var cell4 = row.insertCell(3);
    	var cell5 = row.insertCell(4);

    	cell1.innerHTML = newses[key].header;
    	cell2.innerHTML = newses[key].imageUrl;
    	cell3.innerHTML = newses[key].text;
    	cell4.innerHTML = newses[key].more;
    	cell5.innerHTML = "<img src='Content/edit.png' alt='edit' onclick='openNewsEditDialog(" + key + ")'> <img src='Content/delete.png' alt='delete' onclick='deleteNews(" + newses[key].id  + ")'>";
	}
}

var deleteNews = function(id) {
	dataService("DELETE", id ,"Services/deleteNews.php", getAllNewsAdmin);
}

var openNewsEditDialog = function (index) {
	var news = newses[index];
	document.getElementById("newsId").value = news.id,
	document.getElementById("editHeader").value = news.header,
	document.getElementById("editImage").value = news.imageUrl,
	document.getElementById("editText").value = news.text,
	document.getElementById("editMoreText").value = news.more,
	dialog = document.getElementById("editDialog");
	dialog.style.visibility = "visible";
}

var editNews = function () {
	var news = {
		id: document.getElementById("newsId").value,
		header: document.getElementById("editHeader").value,
	 	imageUrl: document.getElementById("editImage").value,
	 	text: document.getElementById("editText").value,
	 	more: document.getElementById("editMoreText").value
	};
	dataService("PUT", JSON.stringify(news), "/Services/editNews.php", getAllNewsAdmin);
	dialog = document.getElementById("editDialog");
	dialog.style.visibility = "hidden";
}


var showNumberOfComments = function (response) {
	document.getElementById("commentNumberText").innerText = response == 0 ? "Nema komentara" : (response + " komentara");
}

var showHideComments = function () {
	var element = document.getElementsByClassName("arrowRight")[0];
	if(element != undefined) {
		element.setAttribute("class", "arrowDown");
		document.getElementById("commentSection").style.visibility = "visible";
		getAllComments();
	}
	else {
		element = document.getElementsByClassName("arrowDown")[0];
		element.setAttribute("class", "arrowRight");
		document.getElementById("commentSection").style.visibility = "hidden";
	}
}

var comments = [];

var getAllComments = function() {
	dataService("GET", null, "Services/getNumberOfComments.php?data=" + readMoreNews.id, showNumberOfComments);
	dataService("GET", null, "Services/getComments.php?data=" + document.getElementById("newsId").value, renderComments);
}

var renderComments = function (response) {
	comments = JSON.parse(response);
	htmlService("Partial/_comment.html", fillWithComments);
}

var fillWithComments = function (response) {
	commentsElement = document.getElementById("comments");
	commentsElement.innerHTML = "";
	for(var key in comments) {
		commentsElement.innerHTML += response;
	}

	//fill with data 

	for(var i = 0; i < commentsElement.children.length; i++) {
		var comment = commentsElement.children[i];

		comment.children[0].innerText = comments[i].visitor;
		comment.children[1].innerText = comments[i].email;
		comment.children[1].href = "mailto: " + comments[i].email;
		comment.children[2].innerText = comments[i].text;
		comment.children[3].innerText = comments[i].time;
	}
}


var addComment = function () {
	var comment = {
		newsid: document.getElementById("newsId").value,
		email: document.getElementById("mail").value,
		visitor: document.getElementById("name").value,
		text: document.getElementById("text").value
	};

	dataService("POST", JSON.stringify(comment), "Services/addComment.php", getAllComments);
}

var getAllNewsHeaders = function () {
	dataService("GET", null, "Services/getNews.php", callBackPopulateSelect);
}

var callBackPopulateSelect = function (response) {
	newses = JSON.parse(response);
	var x = document.getElementById("news");
	for(var key in newses) {
		var option = document.createElement("option");
		option.text = newses[key].header;
		option.id = newses[key].id;
		x.add(option);
	}
}

var onSelectChange = function (event) {
	id = event.target.selectedOptions[0].id;
	dataService("GET", null, "Services/getComments.php?data=" + id, fillCommentsTable);
}

var fillCommentsTable = function (response) {
	var comentsForAdmin = JSON.parse(response);

	var table = document.getElementById("booksTableTbody");
	while(table.rows.length > 0) {
	  table.deleteRow(0);
	}
	for(var key in comentsForAdmin) {
		var row = table.insertRow(0);
		var cell1 = row.insertCell(0);
    	var cell2 = row.insertCell(1);
    	var cell3 = row.insertCell(2);
    	var cell4 = row.insertCell(3);
    	var cell5 = row.insertCell(4);

    	cell1.innerHTML = comentsForAdmin[key].visitor;
    	cell2.innerHTML = comentsForAdmin[key].email;
    	cell3.innerHTML = comentsForAdmin[key].text;
    	cell4.innerHTML = comentsForAdmin[key].time;
    	cell5.innerHTML = "<img src='Content/delete.png' alt='delete' onclick='deleteComment(" + comentsForAdmin[key].id  + ")'>";
	}
}

var deleteComment = function (id) {
	dataService("DELETE", id, "Services/deleteComment.php", callBackGetAllComents);
}

var callBackGetAllComents = function (response) {
	var event = {
		target: {
			selectedOptions: [{id: document.getElementById("news").selectedOptions[0].id }]
		}
	};
	onSelectChange(event);
}