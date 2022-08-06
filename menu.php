<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MENU</title>
    <link type="text/css" rel="stylesheet" href="css/cssm.css">
  </head>
  <body>
    <?php include 'header.html'; ?>
    <section id="menubar">
      <div>
        <pp>MENU</pp>
      </div>
    </section>
    <section class="menu">
      <div class="item">
        <a href="Cake.php">
          <img src="images/pinkcakecut.jpeg" alt="Cake&amp;CubCake">
        </a>
        <h1>Cake&amp;CubCake</h1>
      </div>
      <div class="item">
        <a href="Cheesecakes.php">
          <img src="images/chees11.jpg" alt="Cheesecake">
        </a>
        <h1>Cheesecake</h1>
      </div>
      <div class="item">
        <a href="Cookies.php">
          <img src="images/cookmaincut.jpeg" alt="Cookies&amp;Brownies">
        </a>
        <h1>Cookies&amp;Brownies</h1>
      </div>
      <div class="item">
        <a href="Pies.php">
          <img src="images/piess.webp" alt="Pies">
        </a>
        <h1>Pies</h1>
      </div>
    </section>
    <?php include 'footer.html'; ?>
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