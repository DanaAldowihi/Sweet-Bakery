//  FORM VALIDATION - By Manar Alzahrani 
// initilize needed variables
var fn;
var ln;
var email;
var tel;
var msg;

    function init()
    {
        // get elements' IDs for form and input
        var contactForm = document.getElementById("contact");
        fn = document.getElementById("fn");
        ln = document.getElementById("ln");
        email = document.getElementById("email");
        tel = document.getElementById("tel");
        msg = document.getElementById("msg");

        // to make every error appear seperately under the input 
        var error1 = document.getElementById("error1");
        var error2 = document.getElementById("error2");
        var error3 = document.getElementById("error3");
        var error4 = document.getElementById("error4");
        var error5 = document.getElementById("error5");
        contactForm.onsubmit = check;
    } // end function init

	function check()
    {
        var txt = "";
        // if empty then pass error message in innerHTML
		if (fn.value == "") {
            txt = "* Please enter your first name.";
            error1.innerHTML = txt;
            return false;
        }  else if (!fn.value.match(/^[A-Za-z]+$/)) {
            txt = "* only english letters are accepted.";
            error1.innerHTML = txt;
            return false;
        }
        // to make error text disappear if the input was corrected
        error1.innerHTML = "";

        if (ln.value == "") {
            txt = "* Please enter your last name.";
            error2.innerHTML =  txt;
            return false;
        } else if (!ln.value.match(/^[A-Za-z]+$/)) {
            txt = "* only english letters are accepted.";
            error2.innerHTML = txt;
            return false;
        }
        error2.innerHTML = "";

        if (email.value == "") {
            txt = "* Please enter your email.";
            error3.innerHTML =  txt;
            return false;
        } else if (!email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
            txt = "* Invalid email format. Valid format example: mmz@xyz.com";
            error3.innerHTML =  txt;
            return false;
        }
        error3.innerHTML = "";

        if (tel.value == "") {
            txt = "* Please enter your admin mobile number.";
            error4.innerHTML =  txt;
            return false;
        } else if (!tel.value.match(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im)) {
            txt = "* Invalid number format. Valid format example: +966555555555";
            error4.innerHTML =  txt;
            return false;
        }
        error4.innerHTML = "";

        if (msg.value == "") {
            txt = "* Please enter your message.";
            error5.innerHTML =  txt;
            return false;
        }
        error5.innerHTML = "";
    }

    window.addEventListener("load", init, false);
