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

  <div id='menu'>
    <div class="menu">
      <!-- links for nav bar -->
      <form method="POST">
    <ul>
      <li><a href="../index.php"> Home </a></li>
      <li><a href="products.php"> Product </a></li>
      <li><a href="#"> Account </a></li>
      <li><a href="#"> Sign Up </a></li>
      <li><a href="#"> Shopping Cart </a></li>
      <li><a href="contactus.php"> Contact Us </a></li>

          <?php include("productFunctions.php"); ?>
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
  <div id='content'>
    <!-- div for grid -->
    <div class="grid-container">
      <!-- require php page with function that displays grid items  -->
        <?php require_once("productFunctions.php");
        // check if search button has been clicked. if yes, and search bar is not empty, search
        if (isset($_POST['searchbutton']) && !empty($_POST['searchitem']))
        {
          search();
        }
        // otherwise, display all products
        else
        {
          allproducts();
        }
        ?>
    </div>
  </div>
</div>

  <!-- <div id='footer'>
    &copy 2018 Liani's Christmas Shop. Powered by Nana Adjoa Bentil
  </div> -->

</body>
</html>
