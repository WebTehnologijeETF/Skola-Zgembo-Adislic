var dataService = function(action, data, url, callback) {
	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
           	if(callback != undefined)
           		callback(xmlhttp.responseText);
           }
           else if(xmlhttp.status == 400) {
           }
           else {
           }
        }
    }
    xmlhttp.open(action,url,true);
    if(action == "POST" || action == "PUT") {
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("data=" + data);
	}
	else if(action == "DELETE"){
		xmlhttp.send("id=" + data);
	}
	else {
		xmlhttp.send();
	}
}

var htmlService = function(url, callback) {
	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
            if(callback != undefined)
           		callback(xmlhttp.responseText);
           }
           else if(xmlhttp.status == 400) {
           }
           else {
           }
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}