<?php
// include/connect database page to this page
require_once("database/connect.php");

// function to get and display categories from database
function displayCategories()
{
  $connection = new Connect;

  $sql = "SELECT cat_id, cat_name FROM categories";
  $run = $connection->query($sql);

   while ($results = $connection->fetch())
   {
     echo "<option value=". $results['cat_id'] . ">" . $results['cat_name'] . "</option>";
   }
}

// function to get and display brands from database
function displayBrands()
{
      $connection = new Connect;

      $sql = "SELECT brand_id, brand_name FROM brands";
      $run = $connection->query($sql);

       while ($results = $connection->fetch())
       {
         echo "<option value=". $results['brand_id'] . ">" . $results['brand_name'] . "</option>";
       }
}

// if button had been clicked, run add product function.
if(isset($_POST['add']))
{
  addProduct();
}

// function to add product to the database
function addProduct()
{
  $title = $_POST['title'];
  $category = $_POST['category'];
  $brand = $_POST['brand'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $image = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
  $image_name = addslashes($_FILES['fileToUpload']['name']);
  $image_size = getimagesize($_FILES['fileToUpload']['tmp_name']);
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../images/" . $_FILES["fileToUpload"]["name"]);
  $image = "images/" . $_FILES["fileToUpload"]["name"];


  $keywords = $_POST['keywords'];

  $connect = new Connect;

  $sql = "INSERT INTO products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords)
  VALUES ('$category', '$brand', '$title', '$price', '$description', '$image', '$keywords')";

  $run = $connect->query($sql);

  if ($run)
  {
    echo "Insert Successful";
  }
  else
  {
    echo "Problem inserting.";
  }
}
?>
