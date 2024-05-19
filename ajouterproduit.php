<?php
  include 'product.php';
  $produitObj = new Produits();
  if(isset($_POST['submit'])) {
    $produitObj->insertData($_POST,$_FILES);

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP: CRUD (Add, Edit, Delete, View) Application using OOP (Object Oriented Programming) and MYSQL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Ajout de produit</h4>
</div><br> 

<div class="container">
  <form action="ajouterproduit.php" method="POST" enctype="multipart/form-data">
  <a href="indexuser.php" class="btn btn-primary" style="float:right;margin-right:10px;">retour</a>
  <div class="form-group">
  <label for="category_id">Category:</label>
  <select class="form-control" name="category_id" required="">
    <?php 
    $categories = $produitObj->displaycategorie();
    foreach ($categories as $category) : ?>
      <option value="<?php echo $category['id']; ?>">
        <?php echo $category['name']; ?>
      </option>
    <?php endforeach; ?>
  </select>
</div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="email">Description</label>
      <textarea class="form-control" name="description" placeholder="Enter description" required=""></textarea>
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" name="price" placeholder="Enter price" required="">
    </div>
    <div class="form-group">
      <label for="password">Enter image:</label>
      <input type="file" class="form-control" name="image"  required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>