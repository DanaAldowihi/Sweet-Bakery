<?php
require_once('connection.php');
$category_id = "Pies";
$sql = "SELECT * FROM products WHERE category_id = '$category_id'";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pies</title>
    <link type="text/css" rel="stylesheet" href="css/cssm.css">
  </head>
  <body>
   
 <?php include 'header.html' ; ?>

    <section id="menubar">
      <div>
        <p>MENU</p>
        <br>
        <ul id="linkmenu">
          <li>
            <a href="cake.php">Cake&amp;Cubcake</a>
          </li>
          <li>
            <a href="Cheesecakes.php">Cheesecakes</a>
          </li>
          <li>
            <a href="Cookies.php">Cookies&amp;Brownies</a>
          </li>
          <li>
            <a href="Pies.php">Pies</a>
          </li>
        </ul>
      </div>
    </section>
    <section class="itemss">
      <?php
        foreach ($result as $key => $value) {
            ?>
            <div class="item">
                <a href="product_details.php?id=<?php echo $value['id'];?>">
                    <img src="images/<?php echo $value['product_picture'];?>" alt="<?php echo $value['product_name'];?>">
                    <h3><?php echo htmlspecialchars($value['product_name']);?></h3>
                    <h3><?php echo htmlspecialchars($value['product_price']);?></h3>
                    <button>veiw details</button>
                </a>
            </div>
            <?php
        }
        ?>
    </section>
    
<?php include 'footer.html' ; ?>

    <script>
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