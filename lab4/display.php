<?php
require_once("admin/database/connect.php");

function homeDisplay()
{
  $sql = "SELECT product_image,product_title,product_price FROM products";

  $connect = new Connect;

  $run = $connect->query($sql);

  while ($results = $connect->fetch())
  {
    echo "<div class=\"grid-item\">";
    echo "<a href=\"php/view4.php\">" . $results['product_title'] . "</a><br>";
    echo "<a href=\"php/view4.php\"><img src=".$results['product_image']."></a>".$results['product_price']."<br>";
    echo "<a href=\"php/view1.php\">View Product Details </a><br>";
    echo "<input type=\"button\" value=\"Add to Cart\">";
    echo "</div>";
  }
}

function productDisplay()
{
  //name
  //description
  //image
  //price
  //quantity
  //review
  //add to cart
  //return

}

?>
