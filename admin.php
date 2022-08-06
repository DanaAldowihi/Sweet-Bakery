<!-- WORK DONE BY: MANAR ALZAHRANI | ID: 2190005844 | TASK 9 - 10 - 13 -->
<?php
// DATABASE CONNECTION
@include 'connection.php';
// log in session - to prevent going to the page without logging in
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}
?>
<?php
// ADD PRODUCT QUERY
if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $category = $_POST['category'];
   $description = $_POST['description'];
   $ingredients = $_POST['ingredients'];
   $calorie = $_POST['calorie'];
   $price = $_POST['price'];
   $stock = $_POST['stock'];
   $image = $_FILES['image']['name'];
   $image_data = $_FILES['image']['tmp_name'];
   $image_folder = 'images/'.$image;

   $insert_query = mysqli_query($con, "INSERT INTO `products`(category_id, product_name, product_desc, product_ingrediens, product_calorie, product_availability, product_price, product_picture) VALUES('$category', '$p_name', '$description', '$ingredients', '$calorie', '$price', '$stock', '$image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($image_data, $image_folder);
      $message[] = 'product add succesfully';
   }else{
      $message[] = 'could not add the product';
   }
};
// DELETE PRODUCT QUERY
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($con, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};
// UPDATE PRODUCT QUERY
if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_desc = $_POST['update_p_desc'];
   $update_p_ingredients = $_POST['update_p_ingredients'];
   $update_p_calorie = $_POST['update_p_calorie'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_stock = $_POST['update_p_stock'];
   $update_p_category = $_POST['update_p_category'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'images/'.$update_p_image;

   $update_query = mysqli_query($con, "UPDATE `products` SET category_id = '$update_p_category', product_name = '$update_p_name', product_desc = '$update_p_desc', product_ingrediens = '$update_p_ingredients', product_calorie = '$update_p_calorie', product_availability = '$update_p_stock', product_price = '$update_p_price', product_picture = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'product updated succesfully';
      header('location:admin.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:admin.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sweet Bakery | Administration</title>
  <!-- font awesome link to include icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- validation | javaScript -->
<script src = "js/checkEmpty.js"></script>

<!-- css file link  -->
<link rel="stylesheet" href="css/adminstyle.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<!-- ADMIN HEADER -->
<?php include 'adminheader.php'; ?>

<div class="container">

<section>
<!-- ADD PRODUCT FORM -->
<form action="" method="post" id="addForm" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new product</h3>
   <p>
   <input type="text" name="p_name" id="p_name" placeholder="enter the product name" class="box" >
   <small id="helpText1" ></small>
</p>

<p>
   <select name="category" id="category" class="box">
      <option disabled selected value> -- select category -- </option>
        <option>Cake&amp;CubCake</option>
        <option>Cheesecake</option>
        <option>Cookies&amp;Brownies</option>
        <option>Pies</option>
   </select>
   <small id="helpText2"></small>
</p>

<p>
   <textarea name="description" id="description"  cols="60" rows="1" placeholder="Describe the product here..." class="box"></textarea>
   <small id="helpText3" ></small>
</p>

<p>
   <textarea name="ingredients" id="ingredients"  cols="60" rows="1" placeholder="Type the ingredients for the product here..." class="box"></textarea>
   <small id="helpText4" ></small>
</p>

<p>
   <input type="number" name="calorie" id="calorie" min="0" placeholder="enter product calories" class="box">
   <small id="helpText5" ></small>
</p>

<p>
   <input type="number" name="price" id="price" min="0" placeholder="enter the product price" class="box">
   <small id="helpText6"></small>
</p>
<p>
   <input type="number" name="stock" id="stock" min="0" placeholder="enter the product quantity" class="box">
   <small id="helpText7"></small>
</p>

<p>
   <input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg" class="box" style="padding: 0.9rem 2.2rem;">
   <small id="helpText8"></small>
</p>
   <input type="submit" value="add the product" name="add_product" id="add_product" class="btn">
</form>
<!-- <div id = "helpText" style="position: absolute; right: 760px; top: 216px; font-size: 1.4rem; color: #6b1c0e;"></div> -->
</section>

<!-- PRODUCTS DATABASE TABLE -->
<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>product quantity</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($con, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
         <td><img src="images/<?php echo $row['product_picture']; ?>" height="100" alt="<?php echo $row['product_name']; ?>"></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['product_price']; ?> SAR</td>
            <td><?php echo $row['product_availability']; ?></td>
            <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<!-- UPDATE PRODUCT FORM -->
<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>
   <!-- Validation | javaScript .. it is placed here so it doesn't cause errors with add form validation -->
<script src = "js/updatecheck.js"></script>
   <form action="" id="upForm" method="post" enctype="multipart/form-data">
   <img src="images/<?php echo $fetch_edit['product_picture']; ?>" height="100" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <p>
      <input type="text" id="up_p_name" class="box" required name="update_p_name" value="<?php echo $fetch_edit['product_name']; ?>">
      <small id="Text1"></small>
         </p>
         <p>
      <select class="box" id="up_category" name="update_p_category" value="<?php echo $fetch_edit['category_id']?>">
        <option value= "Cake&amp;CubCake" <?php if($fetch_edit['category_id'] == 'Cake&CubCake') {echo "selected";} ?>>Cake&amp;CubCake</option>
        <option value= "Cheesecake" <?php if($fetch_edit['category_id'] == 'Cheesecake') {echo "selected";} ?>>Cheesecake</option>
        <option value= "Cookies&amp;Brownies" <?php if($fetch_edit['category_id'] == 'Cookies&Brownies') {echo "selected";} ?>>Cookies&amp;Brownies</option>
        <option value= "Pies" <?php if($fetch_edit['category_id'] == 'Pies') {echo "selected";} ?>>Pies</option>
   </select>
   <small id="Text2"></small>
         </p>
         <p>
      <textarea class="box" id="up_desc" name="update_p_desc"><?php echo $fetch_edit['product_desc']; ?></textarea>
      <small id="Text3"></small>
         </p>
         <p>
      <textarea class="box" id="up_ingr" name="update_p_ingredients"><?php echo $fetch_edit['product_ingrediens']; ?></textarea>
      <small id="Text4"></small>
         </p>
         <p>
      <input type="number" min="0" class="box" id="up_calorie" name="update_p_calorie" value="<?php echo $fetch_edit['product_calorie']; ?>">
      <small id="Text5"></small>
         </p>
         <p>
      <input type="number" min="0" class="box" id="up_price" name="update_p_price" value="<?php echo $fetch_edit['product_price']; ?>">
      <small id="Text6"></small>
         </p>
         <p>
      <input type="number" min="0" class="box" id="up_stock" name="update_p_stock" value="<?php echo $fetch_edit['product_availability']; ?>">
      <small id="Text7"></small>
         </p>
         <p>
      <input type="file" class="box" id="up_image" name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <small id="Text8"></small>
         </p>
      <input type="submit" value="Update Product" name="update_product" class="option-btn">
      <input type="reset" value="cancel" id="close-edit" class="delete-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>
<!-- pop-up window | javaScript  -->
<script src="js/adminscript.js"></script>
</div>
<!-- FOOTER -->
<?php include 'footer.html' ;?>
</body>
</html>