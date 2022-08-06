<?php
if(!isset($_REQUEST['id'])){
  header('Location: index.php');
  exit;
}

require_once('connection.php');
$sql = "SELECT * FROM products WHERE id = '".$_REQUEST['id']."'";
$result = $con->query($sql);
if ($result->num_rows == 1) {
  $row = $result->fetch_object();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Product details</title>
    <link type="text/css" rel="stylesheet" href="css/ProductDetail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

  </head>
  <body>
<?php include 'header.html';?>
<!-- Manar Alzahrani - Task 14 -->
<div class="popup" id="popup-1">
    <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup()">&times;</div>
                <h2>Need to customise it?</h2>
                <p>
Convey us your needs, likes and allergies. At our bakery, customers always come first, and then comes the delicious stuff we bake!

</br></br>Contact us: +966 555555555 </p>
            </div>
</div>
<button onclick="togglePopup()" style="position: absolute; left: 1270px; top: 190px; background-color:white;"><i class="fa-solid fa-circle-info" style="   font-size: 25px;
   line-height: 70px;"></i></button>
<script>
function togglePopup(){

document.getElementById("popup-1").classList.toggle("active");

}
</script>
<!-- end of Task 14 -->
    <section id="prodect">
      <div class="flex-container">
        <div class="big-pic">
          <img src="images/<?php echo $row->product_picture;?>" id="product_picture" style="width: 50%;">
        </div>
        <div>
          <table>
            <thead>
              <tr>
                <th colspan="2" id="product_name"><?php echo htmlspecialchars($row->product_name);?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="2" style="font-size: large;"><?php echo htmlspecialchars($row->product_desc);?></td>
              </tr>
              <tr>
                <td>ingrediens</td>
                <td><?php echo htmlspecialchars($row->product_ingrediens);?></td>
              </tr>
              <tr>
                <td>price</td>
                <td id="product_price"><?php echo htmlspecialchars($row->product_price);?></td>
              </tr>
              <tr>
                <td>calorie</td>
                <td><?php echo htmlspecialchars($row->product_calorie);?></td>
              </tr>
              <tr>
                <td>Availability</td>
                <td><?php echo htmlspecialchars($row->product_availability);?></td>
              </tr>
              <?php
              if($row->product_availability > 0 ){
                ?>
                <tr>
                  <td>Quantity</td>
                  <td>
                    <input type="number" id="quantity" value="1" name="quantity" min="1" max="<?php echo $row->product_availability;?>">
                    
                  </td>
                </tr>
                <tr>
                  <td colspan="2" style="border-bottom:0px;display: flex;width: 100%;margin-left: calc(50% - 92px);">
                    <button type="button" data-id="<?php echo $row->id;?>" onclick="addToCard(this, 'buy now');">Buy now</button>
                    <button type="button" data-id="<?php echo $row->id;?>" onclick="addToCard(this, 'add to cart');">Add to the cart</button>
                  </td>
                </tr>
                <?php
              } 
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </section>
    <?php include 'footer.html'; ?>
  <script language="JavaScript" type="text/javascript">

    function addToCard(btn, type){

      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        var total = JSON.parse(xhttp.responseText);
        document.getElementById('total_cart_items').innerHTML = total.total;
        console.log(total);

          if(type == 'buy now'){

            window.location.href = 'cart.php';
          }
        }
      xhttp.open("GET", "add_to_cart.php?add_to_cart=" + btn.getAttribute('data-id') + "&product_name=" + document.getElementById('product_name').innerHTML + "&product_picture=" + document.getElementById('product_picture').getAttribute('src') + "&product_price=" + document.getElementById('product_price').innerHTML + "&quantity="
      + document.getElementById('quantity').value, true);
      xhttp.send();
    return false;}

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        var total = JSON.parse(xhttp.responseText);
        document.getElementById('total_cart_items').innerHTML = total.total;
      }
    xhttp.open("GET", "add_to_cart.php?get_list=true", true);
    xhttp.send();
  </script>
  </body>
</html>
