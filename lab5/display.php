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
  }
}

// function that searches through database for items and displays them
function search()
{
  // get search bar input and store in variable called searchitem
  $searchitem = $_POST['searchitem'];

  // sql query to get information about search results
  $sql = "SELECT product_title, product_image, product_price, product_desc FROM products WHERE product_keywords LIKE '%$searchitem%'";

  $login =  new Connect;

  $run = $login->query($sql);

  if ($run)
  {
    while ($row = $login->fetch())
    {
      // display search results in grid format
      echo '<div class="grid-item">
            <a href="php/views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc'].'"><img src="'.$row['product_image'].'"></a><br>
            <a href="php/views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc']. '">' .$row['product_title']. '</a><br>

              <h3>'.'GHS ' .$row['product_price'].'.00'.'  <br> </h3>
              <input type="button" value="Add to Cart">
          </div>';
    }
  }
  else
  {
    echo "No results found.";
  }
}

?>
