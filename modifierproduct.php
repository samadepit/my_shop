<?php
  session_start();
  include 'product.php';
  $produitObj = new Produits();
//   $customers=null;
// $editId= null;
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $customers = $produitObj->displyaRecordById($editId);
    foreach ($customers as $customer) ;
  }
  if(isset($_POST['update'])) {
    $produitObj->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP: CRUD </title>
  <meta charset="utf-8">
  <meta name="viewport"  content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
<h4>Modifier produits</h4>
</div><br> 
<div class="container">
  <form action="modifierproduct.php" method="POST" enctype="multipart/form-data">
  <?php

    $customers = $produitObj->displyaRecordById($editId);
    foreach ($customers as $customer) {
        ?>
        <tr>
         
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="<?= $customer['name']?>" required="">
    </div>
    <div class="form-group">
      <label for="description"> Description:</label>
      <input type="text" class="form-control" name="description" value="<?= $customer['description']?>" required="">
    </div>
    <div class="form-group">
    <label for="price"> price:</label>
        <input type="number" name="price" class="form-control" value="<?= $customer['price']?>" required="">
    </div>
    <div class="form-group">
      <label for="password">Enter image:</label>
      <input type="file" class="form-control" name="image"  required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?= $customer['id']; ?>">
      <!-- <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update"> -->
      <button name="update" class="btn btn-primary" style="float:right;" value="update">update</button>
      <?php } 
       ?>

    </div>
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>