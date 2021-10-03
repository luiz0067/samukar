// form_validation v. 2.0
//  ----------------------------
// | Euroweb Internet GmbH     |
//  ----------------------------
//	Last changed:	15. 11. 2006


function validateForm(formular) {
	var error = 0;
	var currentLabel = '';
	var currentField = '';
	var klasse = '';
	var newClass = '';
	
	

	  
	
    // Inspect all of the document's labels ...
    for (var i = 0; i < document.getElementsByTagName("label").length; i++) {
        currentLabel = document.getElementsByTagName("label")[i];
        if (currentLabel.htmlFor) {
            currentField = document.getElementById(currentLabel.htmlFor);
        }
	}
	
	// Inspect all of the document's labels ...
	for (var i = 0; i < document.getElementsByTagName("label").length; i++) {
		currentLabel = document.getElementsByTagName("label")[i];
		if (currentLabel.htmlFor) {
			currentField = document.getElementById(currentLabel.htmlFor);
		}
		klasse = currentLabel.className;
		newClass = currentLabel.className.replace(/ error/, '');
		
		// Check if the current label belongs to the form we want to validate
		if (currentLabel.form == formular && currentField) {

			// ...  and if it is required at all, or has to be a number, or an e-mail address.
				
				// Rueckruf exists: Mark phone number field as required
				if (currentField.name == 'Rueckruf') {
					if (currentField.checked == true) {
						document.getElementById('label-telefon').className += ' required rueckruf';
					} else {
						var newTelClass = document.getElementById('label-telefon').className.replace(/ required rueckruf/, '');
						document.getElementById('label-telefon').className = newTelClass;
					}
				}
				
				// required field (but neither numeric nor an e-mail)
				if (klasse.match(/required/)) {
					if (currentField.value == '') {
						currentLabel.className = newClass;
						currentLabel.className += ' error';
						error = 1;
					} else {
						currentLabel.className = newClass;
					}
				}
				
				// numeric field
				if (klasse.match(/number/)) {
					var numeric = isNumber(currentField);
					if (!numeric && !klasse.match(/required/) && currentField.value != '') {
						currentLabel.className = newClass;
						currentLabel.className += ' error';
						error = 1;
					} else {
						currentLabel.className = newClass;
					}
					if (!numeric && klasse.match(/required/)) {
						currentLabel.className = newClass;
						currentLabel.className += ' error';
						error = 1;
					} else {
						if (error == 0) {
							currentLabel.className = newClass;
						}
					}
				}
				
				// e-mail address
				if (klasse.match(/mail/)) {
					var valid = isMailValid(currentField);
					if (!valid && currentField.value != '') {
						currentLabel.className = newClass;
						currentLabel.className += ' error';
						error = 1;
					} else {
						currentLabel.className = newClass;
					}
					if (!valid && klasse.match(/required/)) {
						currentLabel.className = newClass;
						currentLabel.className += ' error';
						error = 1;
					} else {
						if (error == 0) {
							currentLabel.className = newClass;
						}
					}
				}


		}
		
	} // end for

	
	// Return TRUE and proceed sending the form if no errors occured.
	// Return FALSE in case of errors and display the error message,
	// then focus on the ID of the element containing the error message.
	
	// (The window.location.href call comes in handy if the page containing
	//	the form is as high as serveral screens,
	//  but can be safely removed without preventing the script to function properly).
	if (error === 0) {
		return true;
	} else {
		document.getElementById("fehlermeldung").style.display = 'block';
		window.location.href = "#fehlermeldung";
		return false;
	}
		
}



// Additional functions for numeric and e-mail validation
function isNumber(field) {
	var returnvar = (isNaN(parseInt(field.value)) == true) ? false : true;
	return returnvar;
}

function isMailValid(field) {
	var returnvar = (field.value.match(/^[\w\.\-]+@([\w\-]+\.)+[a-zA-Z]+$/)) ? true : false;
	return returnvar;
}