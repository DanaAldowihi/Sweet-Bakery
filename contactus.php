<!-- By: Manar Alzahrani ID: 2190005844 -->
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Contact us</title>
     <!-- validation | javaScript -->
    <script src = "js/contactchck.js"></script>
      <!-- css link -->
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
  <?php include 'header.html'; ?>
  <div class="contactUs">
    <div>
      <h2>Get in Touch</h2>
    </div>
    <div class="box">
      <div class="contact form">
          <h3>Reach us</h3>
          <form id="contact">
            <div class="formBox">
              <div class="row50">
                <div class="inputBox">
                  <span>First Name</span>
                  <p>
                  <input id="fn" type="text" placeholder="Rahaf"><br>
                  <small id="error1"></small>
                  </p>
                </div>
                <div class="inputBox">
                  <span>Last Name</span>
                  <p>
                  <input id="ln" type="text" placeholder="Alenizi"><br>
                  <small id="error2"></small>
                  </p>
                </div>
              </div>
              <div class="row50">
                <div class="inputBox">
                  <span>Email</span>
                  <p>
                    <!-- type is text so javascript can validate it, if email then html message will appear instead of javascript -->
                  <input id="email" type="text" placeholder="raenizi@email.com"><br>
                  <small id="error3"></small>
                  </p>
                </div>
                <div class="inputBox">
                  <span>Mobile</span>
                  <p>
                  <input id="tel" type="tel" placeholder="+966 55 555 5555"><br>
                  <small id="error4"></small>
                  </p>
                </div>
              </div>
              <div class="row100">
                <div class="inputBox">
                   <span>Message</span>
                   <p>
                   <textarea id="msg" cols="55" placeholder="Write your message here..."></textarea><br>
                   <small id="error5"></small>
                  </p>
                </div>
               </div>
               <div class="row100">
                <div class="inputBox">
                 <input type="submit" value="Send">
                </div>
              </div>
            </div>
          </form>
      </div>
      <div class="contact info">
        <h3>Contact Info</h3>
        <div class="infoBox">
         <div>
            <span><ion-icon name="location-outline"></ion-icon></span>
            <p>Dammam, Alsharqiya <br>Saudi Arabia</p>
         </div>
          <div>
            <span><ion-icon name="mail-outline"></ion-icon></span>
           <a href="mailto:loremipsum@email.com">sweetbakery@email.com</a>
         </div>
         <div>
            <span><ion-icon name="call-outline"></ion-icon></span>
           <a href="tel:+966551233210">+966 55 123 3210</a>
         </div>
        </div>
      </div>
      <div class="contact map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14296.158345388376!2d50.06094505083068!3d26.389908687629617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49fd27dd9dc787%3A0x5e89d20c61d38f2f!2z2K_Yp9mG2KrZitmE2KcgRGFudGVsbGE!5e0!3m2!1sen!2ssa!4v1647041774846!5m2!1sen!2ssa"  style="border:0; height:295px" allowfullscreen="" loading="lazy"></iframe>
      </div>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </div>
   </div>
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