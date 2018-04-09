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
    session_start();
    if (!empty($_SESSION['login']))
    {
    echo "Welcome ".$_SESSION['name']."! &nbsp&nbsp&nbsp Total Items: " . $count . "&nbsp&nbsp&nbsp Total Price: GHS ". $bill. ".00";
    }
    else
    {
      echo "Welcome Guest! &nbsp&nbsp&nbsp Total Items: " . $count . "&nbsp&nbsp&nbsp Total Price: GHS ". $bill. ".00";
      }
  }
}

//function to get items from cart
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
      //display cart items in grid form
      echo '
      <form method="post">
        <div class="grid-item">
            <a href="views.php"><img src="../'.$row['product_image'].'"></a><br>
            <a href="views.php">' .$row['product_title']. '</a><br><br>
            <p>Quantity = <br><br><br>
            <input type="number" min="1" value='.$qty.' style="width:30px;" name="number">
            <button name="updatebutton" value='.$id.'>Update</button></p>
              '.'<p>Unit price = GHS ' .$row['product_price'].'.00</p>'.'  <br>
              <p>Total Price = GHS '.$row['product_price'] * $qty.'.00</p>
              <button value="'.$id.'" name="deletecart">Remove </button>
          </div>
  </form>';
    }
  }
}

if (isset($_POST['deletecart']))
{
  deleteCart();
}

if(isset($_POST['checkout']))
{
  session_start();
  if (!empty($_SESSION['id']))
  {
    header("location: checkout.php");
  }
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


if(isset($_POST['updatebutton']) && !empty($_POST['number']))
{
  updateQuantity();
}

function updateQuantity()
{
  $quantity = $_POST['number'];
  $id = $_POST['updatebutton'];
  $ip = $_SERVER['REMOTE_ADDR'];

  $sql = "UPDATE cart SET qty = '$quantity' WHERE p_id = '$id' AND ip_add = '$ip'";

  $login = new Connect;

  $run = $login->query($sql);
}

if(isset($_POST['registercustomer']))
{
  registerUser();
}
//function to register user
function registerUser()
{
  $ip = $_SERVER['REMOTE_ADDR'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $tel = $_POST['tel'];
  $address = $_POST['address'];
  $image = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
  $image_name = addslashes($_FILES['fileToUpload']['name']);
  $image_size = getimagesize($_FILES['fileToUpload']['tmp_name']);
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../images/" . $_FILES["fileToUpload"]["name"]);
  $image = "images/" . $_FILES["fileToUpload"]["name"];

  $nameCheck = '/^([a-zA-Z\' -]+)(\s)?([a-z\' -]*)/';
  $emailCheck = '/[a-zA-Z0-9_.+]+@[a-zA-Z0-9-]+.*[a-zA-Z]{6,}+$/';
  $passwordCheck = '/([a-zA-Z0-9*!@#$%^&*()_+{}|:"\'<?>;.,\/=-`~]*)/';
  $countryCheck = '/[a-zA-Z\' ]*/';
  $cityCheck = '/[a-zA-Z\' ,-]*/';
  $telCheck = '/[0-9]{10}/';
  $addressCheck = '/[a-zA-Z\' 0-9,-]*/';

  if (preg_match($nameCheck, $name) == 0)
  {
    echo "Please enter a valid name";
  }
  // else if (preg_match($emailCheck, $email) == 0)
  // {
  //   echo "Please enter a valid email";
  // }
  else if(preg_match($passwordCheck, $password) == 0)
  {
    echo "Please enter a valid password";
  }
  else if(preg_match($countryCheck, $country) == 0)
  {
    echo "Please enter a valid country";
  }
  else if(preg_match($cityCheck,$city) == 0)
  {
    echo "Please enter a valid city";
  }
  else if(preg_match($telCheck,$tel) == 0)
  {
    echo "Please enter a valid telephone number";
  }
  else if(preg_match($addressCheck,$address) == 0)
  {
    echo "Please enter a valid address";
  }
  else {

    $sql = "INSERT INTO customer(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address)
            VALUES('$ip','$name','$email','$password','$country','$city','$tel','$image','$address')";

    $connect = new Connect;

    $run = $connect->query($sql);

    if ($run)
    {
      header("location: cart.php");
    }
    else
    {
      echo "Could not register user";
    }
  }
}

if(isset($_POST['logincustomer']))
{
  validatelogin();
}

function validatelogin()
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT customer_id, customer_name FROM customer WHERE customer_email = '$email' AND customer_pass = '$password'";

  $connect = new Connect;

  $run = $connect->query($sql);

  $results = $connect->fetch();

  if ($results)
  {
    session_start();
    $_SESSION['id'] = $results['customer_id'];
    $_SESSION['name'] = $results['customer_name'];
    $_SESSION['login'] = true;
    header("location: ../index.php");
  }
}

?>
