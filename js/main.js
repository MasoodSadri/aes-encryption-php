/*
--	AES Encryption
--	Masood Sadri
*/



// Key Validation
	function validate() {
		var key = document.getElementById('key').value;
		var text = document.getElementById('text').value;
		if (key.length > 1 && text.length > 1) {
			return true;
		}
		else {
			$("#alert").fadeIn("slow");
			$("#alert").delay(2000).fadeOut("slow");
			return false;
		}
	}