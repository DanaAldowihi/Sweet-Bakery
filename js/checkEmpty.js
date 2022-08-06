//  FORM VALIDATION - By Manar Alzahrani
// initilize needed variables
var p_name;
var price;
var stock;
var category;
var image;
var description;
var ingredients;
var calorie;
    function init()
    {
        // get elements' IDs for form and input
        var myForm = document.getElementById("addForm");
        p_name = document.getElementById("p_name");
        category = document.getElementById("category");
        description = document.getElementById("description");
        ingredients = document.getElementById("ingredients");
        calorie = document.getElementById("calorie");
        price = document.getElementById("price");
        stock = document.getElementById("stock");
        image = document.getElementById("image");

        // to make every error appear seperately under the input 
        var helpText1 = document.getElementById("helpText1");
        var helpText2 = document.getElementById("helpText2");
        var helpText3 = document.getElementById("helpText3");
        var helpText4 = document.getElementById("helpText4");
        var helpText5 = document.getElementById("helpText5");
        var helpText6 = document.getElementById("helpText6");
        var helpText7 = document.getElementById("helpText7");
        var helpText8 = document.getElementById("helpText8");
        myForm.onsubmit = check;
    } // end function init
    
	function check()
    {
        var pass = "";
        // if empty then pass error message in innerHTML
		if (p_name.value == "") {
            pass = "* Please enter product name.";
            helpText1.innerHTML =  pass;
            return false;
        } 
        // to make error text disappear if the input was corrected
        helpText1.innerHTML = "";

        if (category.value == "") {
            pass = "* Please enter category.";
            helpText2.innerHTML =  pass;
            return false;
        }
        helpText2.innerHTML = "";

		if (description.value == ""){
            pass = "* Please enter product description.";
            helpText3.innerHTML =  pass;
            return false;
        }
        helpText3.innerHTML = "";
        
        if (ingredients.value == "") {
            pass = "* Please enter product ingredients.";
            helpText4.innerHTML =  pass;
            return false;
        }
        helpText4.innerHTML = "";

        if (calorie.value == "") {
            pass = "* Please enter product calorie.";
            helpText5.innerHTML =  pass;
            return false;
        }
        helpText5.innerHTML = "";

        if (price.value == "") {
            pass = "* Please enter product price.";
            helpText6.innerHTML =  pass;
            return false;
        }
        helpText6.innerHTML = "";

        if (stock.value == "") {
            pass = "* Please enter product quantity.";
            helpText7.innerHTML =  pass;
            return false;
        }
        helpText7.innerHTML = "";

        if (image.value == "") {
            pass = "* Please enter product image.";
            helpText8.innerHTML =  pass;
            return false;
        }
        helpText8.innerHTML = "";

    }
	
    window.addEventListener("load", init, false);