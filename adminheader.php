

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="headertop">

   <div class="flextop">

      <a href="admin.php"><img src="images/logo-removebg-preview.png" style="float: left; margin-left:10px; margin-top: 5px; width:100px; height:100px"></a>

      <nav class="navbartop">
         <a href="admin.php">add products</a>
         <a href="adminsearch.php">search products</a>
      </nav>

      <div class="iconstop">
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-boxtop">
         <p>Full name: <span><?php echo $_SESSION['admin_fn'], " ", $_SESSION['admin_ln'];?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
      </div>

   </div>

</header>