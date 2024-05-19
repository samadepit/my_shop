<?php
  session_start();
  include 'clients.php';
   $customerObj = new Customers();
//   $customers=null;
// $editId= null;
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $customers = $customerObj->displyaRecordById($editId);
    foreach ($customers as $customer) ;
  }
  if(isset($_POST['update'])) {
    $customerObj->updateRecord($_POST);
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
  <h4>Modifier user</h4>
</div><br> 
<div class="container">
  <form action="modifier.php" method="POST">
  <?php

  
  
    $customers = $customerObj->displyaRecordById($editId);
    foreach ($customers as $customer) {
        ?>
        <tr>
         
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="<?= $customer['name']?>" required="">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email" value="<?= $customer['email']?>" required="">
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="username" value="<?= $customer['username']?>" required="">
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