<?php
// include database file
require_once("admin/database/connect.php");

// new function that displays products on the homepage
function homeDisplay()
{
  // write wqery
  $sql = "SELECT product_image,product_title,product_price,product_desc FROM products ORDER BY RAND()"; //random selection order each time.

  // create new instance of database
  $connect = new Connect;

  // run query
  $run = $connect->query($sql);

  // loop through results
  while ($row = $connect->fetch())
  {
    // // display grid items in grid-item div tag

    echo '<div class="grid-item">
          <a href=" php/views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc'].'"><img src="'.$row['product_image'].'"></a>
          <a href="php/views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc']. '" >' .$row['product_title']. '</a><br>

            '.'GHS ' .$row['product_price'].'.00'.'  
            <input type="button" value="Add to Cart">
        </div>';

    // echo "<div class=\"grid-item\">";
    // echo "<a href=\"php/views.php\">" . $results['product_title'] . "</a><br>";
    // echo "<a href=\"php/views.php\"><img src=".$results['product_image']."></a>"."GHS ". $results['product_price'].".00"."<br>";
    // echo "<a href=\"php/views.php\">View Product Details </a><br>";
    // echo "<input type=\"button\" value=\"Add to Cart\">";
    // // end loop
    // echo "</div>";
  }
}

?>
