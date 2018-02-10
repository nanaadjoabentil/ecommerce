<!DOCTYPE html>
<html lang="en">
<header>
  <img src="../images/stars.jpg" alt="Picture" width="100%" height= "300px">
</header>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/add.css">
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min,js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div id='menu' >
    <div class="menu">
    <ul>
      <li><a href="../index.php"> Home </a></li>
      <li><a href="#"> Product </a></li>
      <li><a href="#"> Account </a></li>
      <li><a href="#"> Sign Up </a></li>
      <li><a href="#"> Shopping Cart </a></li>
      <li><a href="../php/contactus.php"> Contact Us </a></li>
      <li><a href="add.php"> Add New Product </a></li>
      <li><input type="search" placeholder="Search by name"></li>
      <li><input type="submit"></li>
    </ul>
  </div>
  </div>

  <div id='floats'>
    <div id='breadcrumb'>
      <div class="breadcrumbtext">
        Welcome Admin!
      </div>
    </div>


    <div id='sidebar'>
      <div class="sidebartext">
        <br>
        <p id="top"> Categories: </p>
            <ul>
              <li><a href="#">Christmas trees</a></li><br>
              <li><a href="#">Christmas balls</a></li><br>
              <li><a href="#">Candles</a></li><br>
              <li><a href="#">Trees</a></li><br>
              <li><a href="#">Candy Canes</a></li><br>
              <li><a href="#">Angels</a></li>
          </ul>

          <p id="top"> Brands: </p>
          <ul>
            <li><a href="#">Charming Tails</a></li><br>
            <li><a href="#">Chatley Creations</a></li><br>
            <li><a href="#">Heart Gifts</a></li><br>
            <li><a href="#">Christopher Radko</a></li>
      </ul>
    </div>
  </div>

<div id="content">
  <form method="POST"  id="form" enctype="multipart/form-data">
    <?php require_once("functions.php"); ?>

  <div class="form-group">
    <label for="image"> Select Product Image to Upload:</label>
    <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" required>
  </div>

  <div class="form-group">
    <label for="title">Product Title:</label>
    <input type="text" class="form-control" name= "title" id="title" required>
  </div>

  <div class="form-group">
  <label for="category">Select Category:</label>
  <select class="form-control" id="category" name="category">
    <?php
      require_once("functions.php");
      displayCategories();
    ?>
  </select>
</div>

<div class="form-group">
<label for="category">Select Brand:</label>
<select class="form-control" id="brand" name="brand">
  <?php
      require_once("functions.php");
      displayBrands();
    ?>
</select>
</div>

  <div class="form-group">
    <label for="price">Price:</label>
    <input type="number" min="1" class="form-control" id="price" name="price" required>
  </div>

  <div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" rows = "5" id="description" name="description" required></textarea>
  </div>

  <div class="form-group">
    <label for="keywords">Keywords:</label>
    <input type="text" class="form-control" id="keywords" name="keywords" required>
  </div>


  <button type="submit" class="btn btn-primary" name="add" onclick="return validate()">Submit</button>
</form>
</div>

<div id='footer'>
  &copy 2018 Liani's Christmas Shop. Powered by Nana Adjoa Bentil
</div>

<script type="text/javascript" src="../js/add.js"></script>
</body>
</html>
