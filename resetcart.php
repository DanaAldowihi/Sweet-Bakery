<?php

include 'connection.php';
// Dana Aldowaihi - Manar Alzahrani 
session_start();
  setcookie('purchased', json_encode($_SESSION['cartList']));

session_unset();
session_destroy();

header('location:checkout.php');

?>