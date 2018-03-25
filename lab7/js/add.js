var title = document.getElementById('title');
var category = document.getElementById('category');
var brand = document.getElementById('brand');
var price = document.getElementById('price');
var description = document.getElementById('description');
var keywords = document.getElementById('keywords');

function validate()
{
if(title.value == "")
{
  alert("Please enter a product title");
}
else if(category.value == "")
{
  alert("Please choose a product category");
}
else if(brand.value == "")
{
  alert("Please choose a brand");
}
else if(price.value == "")
{
  alert("Please enter the product's price");
}
else if(description.value == "")
{
  alert("Please enter the product description");
}
else if(keywords.value == "")
{
  alert("Please enter the appropriate keywords for this product");
}
else
{
	window.location.href = "../admin/functions.php";
}
}
