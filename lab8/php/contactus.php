<!DOCTYPE html>
<html>
<header>
  <!-- include header image -->
  <img src="../images/stars.jpg" alt="Picture" width= "1278px" height= "300px">
</header>
<head>
  <!-- include stylesheet -->
  <link rel="stylesheet" type="text/css" href="../css/lab2.css">
  <title></title>
</head>
<body>
  <!-- <div id='header'>
    Header
  </div> -->

  <div id='menu' >
    <div class="menu">
    <ul>
      <form method="POST">
        <?php include("productFunctions.php"); ?>
      <li><a href="../index.php"> Home </a></li>
      <li><a href="#"> Product </a></li>
      <li><a href="#"> Account </a></li>
      <li><a href="#"> Sign Up </a></li>
      <li><a href="#"> Shopping Cart </a></li>
      <li><a href="contactus.php"> Contact Us </a></li>
      <li><a href="login.php"> Login </a></li>
      <li><a href="logout.php"> Logout</a></li>
      <li><input type="search" placeholder="Search by name" name="searchitem"></li>
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
      <?php require_once('productFunctions.php'); ?>
      Welcome Guest! &nbsp&nbsp&nbsp Total Items: <?php echo $count; ?> &nbsp&nbsp&nbsp Total Price: GHS <?php echo $totalPrice; ?>

      <!-- make shopping cart image a link -->
      <a href="#"><img src="../images/shopping-cart.png" alt="Cart" width="25px" height="25px"></a>
      <a href="#">Go To Cart </a>
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
<div id="content">
  <br><br><br><br><br><br><br>
    You can reach us through our email: lianichristmas@outlook.com
    <br><br>
    Or, you can come by and visit our shops in Accra Central, Cantonments and Tema.
    <br><br><br><br><br><br><br><BR><br><br>
</div>

<!-- footer -->
  <div id='footer'>
    &copy 2018 Liani's Christmas Shop. Powered by Nana Adjoa Bentil
  </div>

</body>
</html>
