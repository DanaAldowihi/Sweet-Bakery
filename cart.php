<DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SHOPPING CART</title>
  <link type="text/css" rel="stylesheet" href="css/cartstyle.css">
</head>
<body>
  <?php include 'header.html'; ?>
      <section id="cart">
        <div class="cart-container">
          <div class="Header">
            <h1 class="Heading">Shopping Cart</h1>
            <h1 class="Action action_cart">
              <a href="removeall.php"><input type="reset" value="Remove all" ></a>
            </h1>
          </div>


          <div id="cartList">
          <h2 id="emptycart" style="text-align: center;"> Empty cart! </br></h2></br></br>
          </div>








          <hr class="hr-cart">
          <div class="checkout">
            <div class="total">
              <div>
                <div class="Subtotal">Sub-Total</div>
                <div class="items" id="totalItems">0 items</div>
              </div>
              <div class="total-amount" id="totalAmount">0 SR</div>
            </div>
            <form action="resetcart.php">
            <!-- <a href="cart.php?action=checkout"> -->
              <?php 
              session_start();
              if (isset($_SESSION['cartList'])) { ?>
              <input type="submit" name= "chkout" value="Checkout" class="button">
            <!-- </a> -->
            </form>
            <?php }  ?>
        

          </div>
        </div>
      </section>
      <?php include 'footer.html'; ?>
  <script>
        function updateCartList(){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                var total = JSON.parse(xhttp.responseText);

                if(total.list){
                    var products = total.list;
                }else{
                    var products = [];
                }
                document.getElementById('total_cart_items').innerHTML = total.total;
                console.log(products);

                var currency = 'SR';
                var h = ``;
                /*if(localStorage.getItem("products")){
                    var products = JSON.parse(localStorage.getItem("products"));
                }else{
                    var products = [];
                }*/
                var totalPrice = 0;
                for (var i = 0; i < products.length; i++) {
                    totalPrice += Number(products[i].product_price) * Number(products[i].quantity);
                    h += `<div class="Cart-Items">
                    <div class="image-box">
                      <img src="${products[i].product_picture}" style="height: 120px;" />
                    </div>
                    <div class="about">
                      <br>
                      <br>
                      <br>
                      <h5 class="title">${products[i].product_name}</h5>
                      <br>
                    </div>
                    <div class="itemno">
                      <select name="itemno" id="" data-id="${products[i].product_id}" onchange="changeQuantity(this);">
                        <option value="1"`;

                    if(products[i].quantity == 1){
                        h += ' selected';
                    }
                    h += `>1</option>
                        <option value="2"`;
                    if(products[i].quantity == 2){
                        h += ' selected';
                    }
                    h += `>2</option>
                        <option value="3"`;
                    if(products[i].quantity == 3){
                        h += ' selected';
                    }
                    h += `>3</option>
                        <option value="4"`;
                    if(products[i].quantity == 4){
                        h += ' selected';
                    }
                    h += `>4</option>
                        <option value="5"`;
                    if(products[i].quantity == 5){
                        h += ' selected';
                    }
                    h += `>5</option>
                      </select>
                    </div>
                    <div class="prices">
                      <div class="amount">${products[i].product_price}</div>
                      <div class="save">
                        <u>Save for later</u>
                      </div>
                      <div class="remove">
                        <u onclick="removeProducts(${products[i].product_id});">Remove</u>
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>`;
                }

                document.getElementById('cartList').innerHTML = h;
                document.getElementById('totalItems').innerHTML = products.length + ((products.length > 1) ? ' items' : ' item');;
                document.getElementById('totalAmount').innerHTML = totalPrice + ' ' + currency;

                if(products.length == 0){
                    document.getElementsByClassName('action_cart')[0].style.display='none';
                    document.getElementsByClassName('hr-cart')[0].style.display='none';
                    document.getElementsByClassName('checkout')[0].style.display='none';
                }


              }
            xhttp.open("GET", "add_to_cart.php?get_list=true", true);
            xhttp.send();



        }

        updateCartList();

        function changeQuantity(selection){
            var quantityNumber = selection.value;
            var pId = selection.getAttribute('data-id');
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                updateCartList();
              }
            xhttp.open("GET", "add_to_cart.php?change_q=" + quantityNumber + "&id=" + pId, true);
            xhttp.send();
        }

        function removeProducts(id){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                updateCartList();
              }
            xhttp.open("GET", "add_to_cart.php?remove=" + id, true);
            xhttp.send();
        }

        function removeAllCart(){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                updateCartList();
              }
            xhttp.open("GET", "add_to_cart.php?remove_all=true", true);
            xhttp.send();
        }

  </script>
</body>
</html>
