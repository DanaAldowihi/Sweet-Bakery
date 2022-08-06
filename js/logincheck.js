//  FORM VALIDATION - By Manar Alzahrani and Zainab Alibrahim
// initilize needed variables
var usrname;
var password;

    function init()
    {
        // get elements' IDs for form and input
        var logForm = document.getElementById("loginForm");
        usrname = document.getElementById("usrname");
        password = document.getElementById("password");

        // to make every error appear seperately under the input 
        var msg1 = document.getElementById("msg1");
        var msg2 = document.getElementById("msg2");

        logForm.onsubmit = check;
    } // end function init
    
	function check()
    {
        var txt = "";
        // if empty then pass error message in innerHTML
		if (usrname.value == "") {
            txt = "* Please enter your admin username.";
            msg1.innerHTML = txt;
            return false;
        } 
        // to make error text disappear if the input was corrected
        msg1.innerHTML = "";

        if (password.value == "") {
            txt = "* Please enter your admin password.";
            msg2.innerHTML =  txt;
            return false;
        }
        msg2.innerHTML = "";

    }
	
    window.addEventListener("load", init, false);