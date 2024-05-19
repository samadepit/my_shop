<?php
  include 'category.php';
  $categoryObj = new Category();
  if(isset($_POST['submit'])) {
    $categoryObj->insertData($_POST);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP: CRUD </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Ajoute de categorie</h4>
  <a href="indexuser.php" class="btn btn-primary" style="float:right;margin-right:10px;">retour</a>
</div><br> 
<div class="container">
  <form action="ajoutercategory.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
    </div>
    <!-- <div class="form-group">
      <label for="email">category:</label>
      <input type="email" class="form-control" name="category" placeholder="Enter category" required="">
    </div> -->
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>