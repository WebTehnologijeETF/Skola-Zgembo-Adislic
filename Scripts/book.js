var books = [];

postBook = function (action, product) {
 	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
           		getAllBooks();
           		if(action == "dodavanje")
           			resetAdd();
           }
           else if(xmlhttp.status == 400) {
           }
           else {
           }
        }
    }
    xmlhttp.open("POST","http://zamger.etf.unsa.ba/wt/proizvodi.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("akcija="+ action +"&brindexa=16065&proizvod=" + product);
}

addBook = function () {
	if(!validateTitle("add") || !validatePrice("add"))
		return;
	var book = {};
	book.naziv = document.getElementById("titleId").value;
	book.opis = document.getElementById("descriptionId").value;
	book.cijena = parseFloat(document.getElementById("priceId").value);
	postBook("dodavanje", JSON.stringify(book));
}

editBook = function () {
	if(!validateTitle("edit") || !validatePrice("edit"))
		return;
	var book = {};
	book.id = editId;
	book.naziv = document.getElementById("editTitle").value;
	book.opis = document.getElementById("editDescription").value;
	book.cijena = document.getElementById("editPrice").value;
	postBook("promjena", JSON.stringify(book));
	cancelEditDialog();
}

deleteBook = function (id) {
	var book = {};
	book.id = id;
	postBook("brisanje", JSON.stringify(book));
}

populateTable = function() {
	var tableBody = "<tbody id='booksTableTbody'> ";
	for(key in books) {
		tableBody += "<tr> <td>";
		tableBody += books[key].naziv + "</td> <td>";
		tableBody += books[key].opis + "</td>  <td>";
		tableBody += books[key].cijena + " KM</td> <td>";
		tableBody += "<img src='Content/edit.png' alt='edit' onclick='openEditDialog(" + books[key].id + ")'> <img src='Content/delete.png' alt='delete' onclick='deleteBook(" + books[key].id + ")'> </td> </tr>";
	}
	tableBody += " </tbody>"
	var tbody = document.getElementById("booksTableTbody");
    var temp = tbody.ownerDocument.createElement('div');
    temp.innerHTML = '<table>' + tableBody + '</table>';

    tbody.parentNode.replaceChild(temp.firstChild.firstChild, tbody);
}

getAllBooks = function() {
	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
           	   books = JSON.parse(xmlhttp.responseText);
               populateTable();
           }
           else if(xmlhttp.status == 400) {
           }
           else {
           }
        }
    }
    xmlhttp.open("GET", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16065", true);
    xmlhttp.send();
}

var editId;

openEditDialog = function(id) {
	editId = id;
	var book = books.filter(function(item) { return item.id == id; })[0];
	document.getElementById("editTitle").value = book.naziv;
	document.getElementById("editDescription").value = book.opis;
	document.getElementById("editPrice").value = book.cijena;
	dialog = document.getElementById("editDialog");
	dialog.style.visibility = "visible";
}


cancelEditDialog = function () {
	dialog = document.getElementById("editDialog");
	dialog.style.visibility = "hidden";
}

validateTitle = function (type) {
	titleElement = type == 'add' ? document.getElementById("titleId") : document.getElementById("editTitle");
	titleElement.style.border =  type == "add" ? "none" : "1px solid #888888";
	if(titleElement.value.trim().length == 0) {
		titleElement.style.border = "1px solid red";
		return false;
	}
	return true;
}

validatePrice = function (type) {
	priceElement = type == "add" ? document.getElementById("priceId") : document.getElementById("editPrice");
	priceElement.style.border = type == "add" ? "none" : "1px solid #888888";
	try {
		var val = parseFloat(priceElement.value);

		if(isNaN(val))
			throw " ";
	}
	catch(ex) {
		priceElement.style.border = "1px solid red";
		return false;
	}
	return true;
}

resetAdd = function() {
	document.getElementById("titleId").value = "";
	document.getElementById("descriptionId").value = "";
	document.getElementById("priceId").value = "";
}