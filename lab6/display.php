<?php
// include database file
require_once("admin/database/connect.php");

// new function that displays products on the homepage
function allproducts()
{
  // write wqery
  $sql = "SELECT product_id,product_image,product_title,product_price,product_desc FROM products ORDER BY RAND()"; //random selection order each time.

  // create new instance of database
  $connect = new Connect;

  // run query
  $run = $connect->query($sql);

  // loop through results
  while ($row = $connect->fetch())
  {
    // // display grid items in grid-item div tag

    echo '
    <form method="post">
      <div class="grid-item">
          <a href="php/views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc']. '&id='.$row['product_id'].'"><img src="'.$row['product_image'].'"></a><br>
          <a href="php/views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc']. '&id='.$row['product_id'].'" >' .$row['product_title']. '</a><br>

            '.'<p>GHS ' .$row['product_price'].'.00</p>'.'  <br>
            <button value="'.$row['product_id'].'" name="cart">Add to Cart </button>
        </div>
  </form>';
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
      echo '
        <div class="grid-item">
            <a href="php/views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc']. '&id='.$row['product_id'].'"><img src="'.$row['product_image'].'"></a><br>
            <a href="php/views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc']. '&id='.$row['product_id']. '">' .$row['product_title']. '</a><br>

              '.'<p>GHS ' .$row['product_price'].'.00</p>'.'  <br>
              <button value="'.$row['product_id'].'" name="cart">Add to Cart </button>
          </div>
        ';
    }
  }
  else
  {
    echo "No results found.";
  }
}


if (isset($_POST['cart']))
{
  addtocart();
}

function addtocart()
{
  $id = $_POST['cart'];
  $ip = $_SERVER["REMOTE_ADDR"];
  $qty = '1';

  //check if item is already inserted

  $sql = "SELECT p_id, ip_add FROM cart WHERE p_id = '$id' AND ip_add = '$ip'";

  $login =  new Connect;

  $run = $login->query($sql);

  $results = $login->fetch();

  if ($results)
  {
    echo "Product already added";
  }
  else
  {
    //add to cart
    $sql2 = "INSERT INTO cart(p_id, ip_add, qty) VALUES ('$id', '$ip', '$qty')";

    $run = $login->query($sql2);

    if ($run)
    {
      echo "Successfully added to cart";
    }
    else
    {
      echo "Could not add to cart";
    }
  }
}


function num()
{
  $bill = 0;
  $ip = $_SERVER["REMOTE_ADDR"];

  $sql = "SELECT COUNT(p_id) AS ANS FROM cart WHERE ip_add = '$ip'";

  $login = new Connect;

  $run = $login->query($sql);

  $results = $login->fetch();

  // echo "works";
  if ($results)
  {
    $login2 = new Connect;
    //setting the count variable to be displayed in breadcrumbs
    $count = $results['ANS'];

    $sql2 = "SELECT p_id, qty FROM cart WHERE ip_add = '$ip'";

    $run2 = $login2->query($sql2);

    while ($results = $login2->fetch())
    {
      $login3 = new Connect;
      $id = $results['p_id'];
      $quantity = $results['qty'];

      //getting the Price
      $sql3 = "SELECT product_price FROM products WHERE product_id = '$id'";

      $run3 = $login3->query($sql3);

      $results =  $login3->fetch();

      $price = $results['product_price'];

      $totalPrice = $quantity * $price;

      $bill = $totalPrice + $bill;
    }
    echo "Welcome Guest! &nbsp&nbsp&nbsp Total Items: " . $count . "&nbsp&nbsp&nbsp Total Price: GHS ". $bill. ".00";
  }
}


?>
