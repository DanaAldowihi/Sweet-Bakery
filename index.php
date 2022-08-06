<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sweet Bakery</title>
    <link rel="stylesheet" href="css/styleindex.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
  </head>

  <body>
    <?php include 'header.html'; ?>

    <section id="sectionone" class="screen">
      <div id="scene">
        <div data-depth="0.1" class="bg">
          <img src="images/homepage.jpg" alt="" />
        </div>

        <div data-depth="1.2" class="macaron">
          <img src="images/Macaron-PNG.png" width="500" alt="" />
        </div>
        <div data-depth="0.1" class="text">
          <h1 style="text-align: left;">Making every celebration sweeter.</h1>

        </div>

        </div>
      </div>
    </section>
    <?php if (!empty($_COOKIE['purchased'])){
      echo "<h1 style='text-align:center; margin: 30px;'>Buy Again</h1>";
    } ?>  
    <section class="itemss">
      <?php
          if (!empty($_COOKIE['purchased'])){
            $purchased = json_decode($_COOKIE['purchased'],true);
            $cookie_count = count($purchased);
    
            for($i=0 ;$i<$cookie_count ;$i++){
    
            $pid = $purchased[$i]['product_id'];
            $pname = $purchased[$i]['product_name'];
            $imgUrl = $purchased[$i]['product_picture'];
            $pprice = $purchased[$i]['product_price'];
            $pstock = $purchased[$i]['quantity'];
            ?>
            <div class="item">
                <a href="product_details.php?id=<?php echo $pid;?>">
                    <img src="<?php echo $imgUrl;?>" alt="<?php echo $value['product_name'];?>">
                    <h3><?php echo htmlspecialchars($pname);?></h3>
                    <h3><?php echo htmlspecialchars($pstock);?></h3>
                    <button>view details</button>
                </a>
            </div>
            <?php
        
      }
    }
        ?>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="index.js" type="text/javascript"></script>

    <script src="js/index.js" type="text/javascript"></script>

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
