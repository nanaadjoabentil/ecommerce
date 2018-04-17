<!DOCTYPE html>
<html>
<header>
  <!-- include image -->
  <img src="../images/stars.jpg" alt="Picture" width= "1278px" height= "300px">
</header>
<head>
  <!-- include stylesheet -->
  <link rel="stylesheet" type="text/css" href="../css/lab2.css">
  <title>Payment</title>
</head>
<body>
  <?php require_once("productFunctions.php"); ?>
  <div id='menu'>
    <div class="menu">
      <!-- links for nav bar -->
      <form method="POST">
    <ul>
      <li><a href="../index.php"> Home </a></li>
      <li><a href="products.php"> Product </a></li>
      <li><a href="#"> Account </a></li>
      <li><a href="register.php"> Sign Up </a></li>
      <li><a href="cart.php"> Shopping Cart </a></li>
      <li><a href="contactus.php"> Contact Us </a></li>
      <li><a href="login.php"> Login </a></li>
      <li><a href="logout.php"> Logout</a></li>
      <li><input type="text" placeholder="Search by keywords" name="searchitem"></li>
      <li><input type="submit" name="searchbutton"></li>
    </form>
    </ul>
  </div>
  </div>

<!-- div for aspects of the page that will float to the left and right -->
<div id='floats'>
  <!-- div for breadcrumbs -->
  <div id='breadcrumb'>
    <!-- div to position text in breadcrumb -->
    <div class="breadcrumbtext">
      <form method="POST">
      <?php
      require_once('productFunctions.php');
      num();
      ?>
      <!-- make shopping cart image a link -->
      <a href="cart.php"><img src="../images/shopping-cart.png" alt="Cart" width="25px" height="25px"></a>
      <a href="../index.php">Continue Shopping </a> &nbsp&nbsp&nbsp

      <input type="submit" name="checkout" value="Proceed to Checkout">
    </form>
    </div>
  </div>

<!-- div for sidebar menu -->
  <div id='sidebar'>
    <div class="sidebartext">
      <br>
      <!-- show categories and brands in list format -->
      <p id="top"> Categories: </p>
          <ul>
            <li><a href="#">Christmas trees</a></li><br>
            <li><a href="#">Christmas balls</a></li><br>
            <li><a href="#">Candles</a></li><br>
            <li><a href="#">Cards</a></li><br>
            <li><a href="#">Candy Canes</a></li><br>
            <li><a href="#">Angels</a></li><br>
            <li><a href="#">Tinsels</a></li><br>
            <li><a href="#">Hangings</a></li><br>
            <li><a href="#">Wreaths</a></li><br>
            <li><a href="#">Tree Ornaments</a></li>
        </ul>

        <p id="top"> Brands: </p>
        <ul>
          <li><a href="#">Charming Tails</a></li><br>
          <li><a href="#">Chatley Creations</a></li><br>
          <li><a href="#">Heart Gifts</a></li>
    </ul>
  </div>
</div>

<!-- div for content aspect of page -->
  <div id='content'>

    <?php
    session_start();
    $itemName = $_SESSION['itemName'];
    $itemPrice = $_SESSION['itemPrice'];
    $itemQuantity = $_SESSION['itemQuantity'];
    $itemID = $_SESSION['itemID'];
    ?>

    <div class="grid-container">
      <!-- require php page with function that displays grid items  -->
        <?php require_once("productFunctions.php");
        viewCart();
         ?>
    <!-- </div> -->
    <form action="payment_success.php" method="post">
      <!-- Identify your business so that you can collect the payments. -->
      <input type="hidden" name="business" value="herschelgomez@xyzzyu.com">

      <!-- Specify a Buy Now button. -->
      <input type="hidden" name="cmd" value="_xclick">

      <!-- Specify details about the item that buyers will purchase. -->
      <input type="hidden" name="item_name" value="<?php $itemName; ?>">
      <input type="hidden" name="amount" value="<?php $itemPrice; ?>">
      <input type="hidden" name="currency_code" value="GHS">

      <!-- Display the payment button. -->
      <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="Buy Now">
      <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

    </form>

  </body>
  </html>
