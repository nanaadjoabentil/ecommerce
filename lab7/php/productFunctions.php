<?php
// include database file
require_once("../admin/database/connect.php");

function allproducts()
{
  // write query
  $sql = "SELECT product_id, product_image,product_title,product_price,product_desc FROM products ORDER BY RAND()"; //random selection order each time.

  // create new instance of database
  $connect = new Connect;

  // run query
  $run = $connect->query($sql);

  // loop through results
  while ($row = $connect->fetch())
  {
    // // display grid items in grid-item div tag

    echo '
    <form method = "post">
      <div class="grid-item">
          <a href="views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc']. '&id='.$row['product_id'].'"><img src="../'.$row['product_image'].'"></a><br>
          <a href="views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc']. '&id='.$row['product_id']. '" >' .$row['product_title']. '</a><br>

            '.'<p>GHS ' .$row['product_price'].'.00</p>'.'  <br>
            <button value="'.$row['product_id'].'" name="cart">Add to Cart</button>
        </div>
    </form>';
}
}

// function to search through database for search results
function search()
{
  $searchitem = $_POST['searchitem'];

  $sql = "SELECT product_id,product_title, product_image, product_price, product_desc FROM products WHERE product_keywords LIKE '%$searchitem%'";

  $login =  new Connect;

  $run = $login->query($sql);

  if ($run)
  {
    while ($row = $login->fetch())
    {
      echo '
      <form method="post">
        <div class="grid-item">
            <a href="views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc']. '&id='.$row['product_id'].'"><img src="../'.$row['product_image'].'"></a><br>
            <a href="views.php?image='.$row['product_image']. '&title='.$row['product_title']. '&price='.$row['product_price']. '&description='.$row['product_desc']. '&id='.$row['product_id']. '">' .$row['product_title']. '</a><br>

              '.'<p>GHS ' .$row['product_price'].'.00</p>'.'  <br>
              <button value="'.$row['product_id'].'" name="cart">Add to Cart </button>
          </div>
      </form>';
    }
  }
  else
  {
    echo "Could not search.";
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

  //   if ($run)
  //   {
  //     echo "Successfully added to cart";
  //   }
  //   else
  //   {
  //     echo "Could not add to cart";
  //   }
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

function viewCart()
{
  $ip = $_SERVER["REMOTE_ADDR"];

  //get product details from Cart
  $sql = "SELECT p_id, qty FROM cart WHERE ip_add = '$ip'";

  $login = new Connect;

  $run = $login->query($sql);

  while ($results = $login->fetch())
  {
    //set item id to variable
    $id = $results['p_id'];
    $qty = $results['qty'];

    //get item name, picture, price
    $sql2 = "SELECT product_title, product_price, product_image FROM products WHERE product_id = '$id'";

    $login2 = new Connect;

    $run2 = $login2->query($sql2);

    while ($row = $login2->fetch())
    {
      echo '
      <form method="post">
        <div class="grid-item">
            <a href="views.php"><img src="../'.$row['product_image'].'"></a><br>
            <a href="views.php">' .$row['product_title']. '</a><br><br>
            <p>Quantity = '.$qty.'</p>
              '.'<p>Unit price = GHS ' .$row['product_price'].'.00</p>'.'  <br>
              <p>Total Price = GHS '.$row['product_price'] * $qty.'.00</p>
              <button value="'.$id.'" name="deletecart">Remove from Cart </button>
          </div>
  </form>';
    }
  }
}

if (isset($_POST['deletecart']))
{
  deleteCart();
}

//function to remove item from cart
function deleteCart()
{
  $id = $_POST['deletecart'];
  $ip = $_SERVER["REMOTE_ADDR"];

  $sql = "DELETE FROM cart WHERE p_id = '$id' AND ip_add = '$ip'";

  $login = new Connect();

  $run = $login->query($sql);

}

?>
