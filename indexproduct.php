<?php
  
  include 'product.php';
  $produitObj = new Produits();
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $produitObj->deleteRecord($deleteId);
  }
     
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP: CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>Tous les produits</h4>
</div><br><br> 
<div class="container">
  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>

  <h2>Product
    <a href="ajouterproduit.php" class="btn btn-primary" style="float:right;">Add New Record</a>
    <a href="indexuser.php" class="btn btn-primary" style="float:right;margin-right:10px;">Users</a>
    <a href="indexcategory.php" class="btn btn-primary" style="float:right;margin-right:10px;">category</a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>image</th>
        <th>Name</th>
        <th>description</th>
        <th>price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $customers = $produitObj->displayData(); 
          foreach ($customers as $customer) {
        ?>
        <tr> 
            <!-- <img src="data:image/jpeg " alt=""> -->
          <td><?= $customer['id'] ?></td>
          <td><img src="./image/<?= $customer['image']; ?>" alt="" height="50px"></td>
          <!-- <img src='data:image/jpeg' , 'base64_encode($customer['image'])' alt=""> -->
          <td><?= $customer['name'] ?></td>
          <td><?= $customer['description'] ?></td>
          <td><?= $customer['price'] ?> F CFA</td>
          <td>
            <a href="modifierproduct.php?editId=<?php echo $customer['id'] ?>" style="color:green ">
              <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
            <a href="indexproduct.php?deleteId=<?php echo $customer['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <p><a href="index.php" class="flex-c-m trans-04 p-lr-11"> <strong>Retour au produit</strong></p>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>