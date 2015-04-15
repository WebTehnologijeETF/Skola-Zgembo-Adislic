
function validateName(name) {
	return name.length > 0;
}

function validateEmail(email) {
	var regex = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return  regex.test(email);
}

function validateTel(tel) {
	var regex = /^\+[0-9]{3}\ [0-9]{2}\ [0-9]{3}-[0-9]{3,4}$/;
	return regex.test(tel);
}

function validateJMBG(jmbg) {
	var regex = /^[0-9]{13}$/;
	return regex.test(jmbg);
}

function validatePassword(password) {
	return password.length >= 6;
}

function onValidateFirstName() {
	var firstName = document.getElementById("firstName").value;
	if(!validateName(firstName)) {
		document.getElementById("firstNameGreska").setAttribute("class", "prikaziGresku");
		return false;
	}
	else {
		document.getElementById("firstNameGreska").setAttribute("class", "skriven");
		return true;
	}
}

function onValidateLastName() {
	var lastName = document.getElementById("lastName").value;
	if(!validateName(lastName)) {
		document.getElementById("lastNameGreska").setAttribute("class", "prikaziGresku");
		return false;
	}
	else {
		document.getElementById("lastNameGreska").setAttribute("class", "skriven");
		return true;
	}
}
function onValidateEmail() {
	var email = document.getElementById("email").value;
	if(!validateEmail(email)) {
		document.getElementById("emailGreska").setAttribute("class", "prikaziGresku");
		return false;
	}
	else {
		document.getElementById("emailGreska").setAttribute("class", "skriven");
		return true;
	}
}
function onValidateTel() {
	var tel = document.getElementById("tel").value;
	if(!validateTel(tel)) {
		document.getElementById("telGreska").setAttribute("class", "prikaziGresku");
		return false;
	}
	else {
		document.getElementById("telGreska").setAttribute("class", "skriven");
		return true;
	}
}
function onValidateJMBG() {
	var jmbg = document.getElementById("JMBG").value;
	if(!validateJMBG(jmbg)) {
		document.getElementById("JMBGGreska").setAttribute("class", "prikaziGresku");
		return false;
	}
	else {
		document.getElementById("JMBGGreska").setAttribute("class", "skriven");
		return true;
	}
}
function onValidateStudentName() {
	var studentName = document.getElementById("studentName").value;
	if(!validateName(studentName)) {
		document.getElementById("studentNameGreska").setAttribute("class", "prikaziGresku");
		return false;
	}
	else {
		document.getElementById("studentNameGreska").setAttribute("class", "skriven");
		return true;
	}
}
function onValidatePassword() {
	var password = document.getElementById("password").value;
	if(!validatePassword(password)) {
		document.getElementById("passwordGreska").setAttribute("class", "prikaziGresku");
		return false;
	}
	else {
		document.getElementById("passwordGreska").setAttribute("class", "skriven");
		return true;
	}
}
function onValidateConfirmPassword() {
	var password = document.getElementById("password").value;
	var confirmPassword = document.getElementById("confirmPassword").value;
	if(password !== confirmPassword) {
		document.getElementById("potvrdaGreska").setAttribute("class", "prikaziGresku");
		return false;
	}
	else {
		document.getElementById("potvrdaGreska").setAttribute("class", "skriven");
		return true;
	}
}

function validateWholeForm() {
	return onValidateFirstName() && onValidateLastName() && onValidateEmail() && onValidateJMBG() && onValidateStudentName() && onValidateTel() && onValidatePassword() && onValidateConfirmPassword();
}

function submitFunction() {
	if(!validateWholeForm()) return false;
	var ok = window.confirm("Vas zahtjev je spreman pritisnite ok da biste poslali!");
	if(ok) {
		
	}
	else {
		return false;
	}
}
