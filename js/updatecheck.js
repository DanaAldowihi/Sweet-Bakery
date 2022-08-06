//  FORM VALIDATION - By Manar Alzahrani
// initilize needed variables
var up_p_name;
var up_price;
var up_stock;
var up_category;
var up_image;
var up_description;
var up_ingredients;
var up_calorie;
    function init()
    {
        // get elements' IDs for form and input
        var upForm = document.getElementById("upForm");
        up_p_name = document.getElementById("up_p_name");
        up_category = document.getElementById("up_category");
        up_description = document.getElementById("up_desc");
        up_ingredients = document.getElementById("up_ingr");
        up_calorie = document.getElementById("up_calorie");
        up_price = document.getElementById("up_price");
        up_stock = document.getElementById("up_stock");
        up_image = document.getElementById("up_image");

        // to make every error appear seperately under the input 
        var Text1 = document.getElementById("Text1");
        var Text2 = document.getElementById("Text2");
        var Text3 = document.getElementById("Text3");
        var Text4 = document.getElementById("Text4");
        var Text5 = document.getElementById("Text5");
        var Text6 = document.getElementById("Text6");
        var Text7 = document.getElementById("Text7");
        var Text8 = document.getElementById("Text8");
        upForm.onsubmit = check;
    } // end function init
    
	function check()
    {
        var pass1 = "";
        // if empty then pass error message in innerHTML
		if (up_p_name.value == "") {
            pass1 = "* Please enter product name.";
            Text1.innerHTML =  pass1;
            return false;
        } 
        // to make error text disappear if the input was corrected
        Text1.innerHTML = "";

        if (up_category.value == "") {
            pass1 = "* Please enter category.";
            Text2.innerHTML =  pass1;
            return false;
        }
        Text2.innerHTML = "";

		if (up_description.value == ""){
            pass1 = "* Please enter product description.";
            Text3.innerHTML =  pass1;
            return false;
        }
        Text3.innerHTML = "";
        
        if (up_ingredients.value == "") {
            pass1 = "* Please enter product ingredients.";
            Text4.innerHTML =  pass1;
            return false;
        }
        Text4.innerHTML = "";

        if (up_calorie.value == "") {
            pass1 = "* Please enter product calorie.";
            Text5.innerHTML =  pass1;
            return false;
        }
        Text5.innerHTML = "";

        if (up_price.value == "") {
            pass1 = "* Please enter product price.";
            Text6.innerHTML =  pass1;
            return false;
        }
        Text6.innerHTML = "";

        if (up_stock.value == "") {
            pass1 = "* Please enter product quantity.";
            Text7.innerHTML =  pass1;
            return false;
        }
        Text7.innerHTML = "";

        if (up_image.value == "") {
            pass1 = "* Please enter product image.";
            Text8.innerHTML =  pass1;
            return false;
        }
        Text8.innerHTML = "";

    }
	
    window.addEventListener("load", init, false);