<!DOCTYPE html>
<html>
<header>
  <!-- include image -->
  <img src="../images/stars.jpg" alt="Picture" width= "1278px" height= "300px">
</header>
<head>
  <!-- include stylesheet -->
  <link rel="stylesheet" type="text/css" href="../css/lab2.css">
  <title></title>
</head>
<body>

  <?php
  $image = $_GET['image'];
  $title = $_GET['title'];
  $price = $_GET['price'];
  $description = $_GET['description'];
  ?>


  <div id='menu'>
    <div class="menu">
      <!-- links for nav bar -->
    <ul>
      <li><a href="../index.php"> Home </a></li>
      <li><a href="#"> Product </a></li>
      <li><a href="#"> Account </a></li>
      <li><a href="#"> Sign Up </a></li>
      <li><a href="#"> Shopping Cart </a></li>
      <li><a href="php/contactus.php"> Contact Us </a></li>
      <li><input type="search" placeholder="Search by name"></li>
      <li><input type="submit"></li>
    </ul>
  </div>
  </div>

<!-- div for aspects of the page that will float to the left and right -->
<div id='floats'>
  <!-- div for breadcrumbs -->
  <div id='breadcrumb'>
    <!-- div to position text in breadcrumb -->
    <div class="breadcrumbtext">
      Welcome Guest!
      <!-- make shopping cart image a link -->
      <a href="#"><img src="../images/shopping-cart.png" alt="Cart" width="25px" height="25px"></a>
      <a href="#">Go To Cart </a>
    </div>
  </div>

  <!-- div for sidebar menu -->
    <div id='sidebar'>
      <div class="sidebartext">
        <br>
        <p id="top"> Categories: </p>
            <ul>
              <li><a href="#">Christmas trees</a></li><br>
              <li><a href="#">Christmas balls</a></li><br>
              <li><a href="#">Candles</a></li><br>
              <li><a href="#">Cards</a></li><br>
              <li><a href="#">Candy Canes</a></li><br>
              <li><a href="#">Angels</a></li>
          </ul>

          <p id="top"> Brands: </p>
          <ul>
            <li><a href="#">Charming Tails</a></li><br>
            <li><a href="#">Chatley Creations</a></li><br>
            <li><a href="#">Heart Gifts</a></li>
      </ul>
    </div>
  </div>


  <div id="content" style="background-color:white">
    <div class="big">
      <img src="../<?php echo $image; ?>" width="350px" height="350px">
        <p>
          <BR><BR><BR>
         <span id= "itemname"> <?php echo $title; ?> <br><br><br></span>
        <span id="price"> Price </span> : GHS <?php echo $price; ?> .00<br><br>
          <span id="description"> Description </span>: <?php echo $description; ?> <br><br>
          <span id="quantity"> Quantity in Stock </span>: 10 <br><br>
          <input type="button" value="Add to Cart">
          <a href="../index.php"><input type="button" value="Return"></a>
  </p>

    </div>
  </div>

  <div id='footer'>
    &copy 2018 Liani's Christmas Shop. Powered by Nana Adjoa Bentil
  </div>
