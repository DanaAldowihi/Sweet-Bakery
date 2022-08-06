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

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sweet Bakery | Administration</title>

   <!-- css file link  -->
   <link rel="stylesheet" href="css/adminstyle.css">
</head>  
<body>
   <!-- ADMIN HEADER -->
    <?php include 'adminheader.php'; ?>
    <!-- SEARCH PAGE HEADING -->
    <div class="heading">
    <h3 style="margin-top: 20px;">Search a Product!</h3>
       <img src="uploaded_img/search.png" alt="" height="280" width="600">
   </div>
   <!-- SEARCH PRODUCT TO EDIT OR DELETE FORM -->
    <section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="search products..." class="box">
      <input type="submit" name="submit" value="search" class="btn">
   </form>
    </section> 
 
    <?php
   //  DELETE BUTTON QUERY
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
      // UPDATE BUTTON QUERY
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
   <!-- UPDATE FORM -->
   <section class="edit-form-container">

   <?php
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($con, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
   <img src="images/<?php echo $fetch_edit['product_picture']; ?>" height="100" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['product_name']; ?>">
      <select class="box" required name="update_p_category" value="<?php echo $fetch_edit['category_id']?>">
        <option value= "Cake&amp;CubCake" <?php if($fetch_edit['category_id'] == 'Cake&CubCake') {echo "selected";} ?>>Cake&amp;CubCake</option>
        <option value= "Cheesecake" <?php if($fetch_edit['category_id'] == 'Cheesecake') {echo "selected";} ?>>Cheesecake</option>
        <option value= "Cookies&amp;Brownies" <?php if($fetch_edit['category_id'] == 'Cookies&Brownies') {echo "selected";} ?>>Cookies&amp;Brownies</option>
        <option value= "Pies" <?php if($fetch_edit['category_id'] == 'Pies') {echo "selected";} ?>>Pies</option>
   </select>
      <textarea class="box" required name="update_p_desc"><?php echo $fetch_edit['product_desc']; ?></textarea>
      <textarea class="box" required name="update_p_ingredients"><?php echo $fetch_edit['product_ingrediens']; ?></textarea>
      <input type="number" min="0" class="box" required name="update_p_calorie" value="<?php echo $fetch_edit['product_calorie']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['product_price']; ?>">
      <input type="number" min="0" class="box" required name="update_p_stock" value="<?php echo $fetch_edit['product_availability']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
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
<script src="js/script.js"></script>
<!-- DISPLAY SEARCH RESULTS IN A TABLE -->
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
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         // SEARCH AND MATCH WITH INPUT KEYWORD BY USING "LIKE"
         $select_products = mysqli_query($con, "SELECT * FROM `products` WHERE product_name LIKE '%{$search_item}%'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
   ?>

         <tr>
         <td><img src="images/<?php echo $fetch_product['product_picture']; ?>" height="100" alt="<?php echo $fetch_product['product_name']; ?>"></td>
            <td><?php echo $fetch_product['product_name']; ?></td>
            <td><?php echo $fetch_product['product_price']; ?> SAR</td>
            <td><?php echo $fetch_product['product_availability']; ?></td>
            <td>
               <a href="adminsearch.php?delete=<?php echo $fetch_product['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="adminsearch.php?edit=<?php echo $fetch_product['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            }
         }else{
            echo '<p class="empty">no result found!</p>';
         }
      }else{
         echo '<p class="empty">search something!</p>';
      }
   ?>
      </tbody>
   </table>

</section>
<?php include 'footer.html'; ?>
</body>
</html>