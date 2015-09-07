(function () {
	getAllNews();
})();

var ajaxFunctionPartialLoads = function (url) {
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
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}



var ajaxLoad = function(nameOfPage) {
	switch(nameOfPage) {
		case "index":
			getAllNews();
			break;
		case "timetable1":
			ajaxFunctionPartialLoads("Partial/_timetableI.html");
			break;
		case "timetable2":
			ajaxFunctionPartialLoads("Partial/_timetableII.html");
			break;
		case "timetable3":
			ajaxFunctionPartialLoads("Partial/_timetableIII.html");
			break;
		case "timetable4":
			ajaxFunctionPartialLoads("Partial/_timetableIV.html");
			break;
		case "partners":
			ajaxFunctionPartialLoads("Partial/_partners.html");
			break;
		case "aboutus":
			ajaxFunctionPartialLoads("Partial/_aboutus.html");
			break;
		case "contact":
			ajaxFunctionPartialLoads("Partial/_contact.html");
			break;
		case "adduser":
			ajaxFunctionPartialLoads("Partial/_adduser.html");
			getAllUsers();
			break;
		case "quiz":
			ajaxFunctionPartialLoads("Partial/_quiz.html");
			loadStates();
			break;
		case "books": 
			ajaxFunctionPartialLoads("Partial/_books.html");
			getAllBooks();
			break;
		case "login":
			ajaxFunctionPartialLoads("Partial/_login.html");
			break;
		case "novosti":
			ajaxFunctionPartialLoads("Partial/_news.html");
			getAllNewsAdmin();
			break;
		case "comments": 
			ajaxFunctionPartialLoads("Partial/_commentsAdmin.html");
			getAllNewsHeaders();
			break;
	}
} 


