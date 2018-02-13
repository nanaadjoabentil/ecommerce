<?php
// include database file
require_once("admin/database/connect.php");

// new function that displays products on the homepage
function homeDisplay()
{
  // write wqery
  $sql = "SELECT product_image,product_title,product_price FROM products ORDER BY RAND()"; //random selection order each time.

  // create new instance of database
  $connect = new Connect;

  // run query
  $run = $connect->query($sql);

  // loop through results
  while ($results = $connect->fetch())
  {
    // display grid items in grid-item div tag
    echo "<div class=\"grid-item\">";
    echo "<a href=\"php/views.php\">" . $results['product_title'] . "</a><br>";
    echo "<a href=\"php/views.php\"><img src=".$results['product_image']."></a>"."GHS ". $results['product_price'].".00"."<br>";
    echo "<a href=\"php/views.php\">View Product Details </a><br>";
    echo "<input type=\"button\" value=\"Add to Cart\">";
    // end loop
    echo "</div>";
  }
}

// new function to display products on new page
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
