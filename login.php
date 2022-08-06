<?php

include 'connection.php';
session_start();

if(isset($_POST['submit'])){

   $usrname = mysqli_real_escape_string($con, $_POST['usrname']);
   $pass = mysqli_real_escape_string($con, $_POST['password']);

   $select_users = mysqli_query($con, "SELECT * FROM `admin` WHERE Username = '$usrname' AND Password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users)>0){

      $row = mysqli_fetch_assoc($select_users);

         $_SESSION['admin_fn'] = $row['First_name'];
         $_SESSION['admin_ln'] = $row['Last_name'];
         $_SESSION['admin_id'] = $row['Admin_ID'];
         header('location:admin.php');

   }else if ($usrname != $row['Username'] || $password != $row['Password']){
      $message[] = 'Uh oh, incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign in | Administration</title>

   <script src = "js/logincheck.js"></script>
   <link rel="stylesheet" href="css/loginstyle.css">

</head>
<body>
<?php include 'header.html'; ?>
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
   
<div class="form-container">

   <form action="" id="loginForm" method="post">
   <img src="images/logo-removebg-preview.png" style="margin-top: 5px; width:120px; height:120px">
      <h3>Administration Login</h3>
      <p>
      <input type="text" id= "usrname" name="usrname" placeholder="enter your username" class="box">
      <small id="msg1"></small>
      </p>
      <p>
      <input type="password" id="password" name="password" placeholder="enter your password" class="box">
      <small id="msg2"></small>
      </p>
      <input type="submit" id="login" name="submit" value="login now" class="btn">
      <p>Not an admin? <a href="index.php">Enjoy shopping as a guest!</a></p>
   </form>

</div>

</body>
</html>