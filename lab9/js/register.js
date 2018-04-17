var custname = document.getElementById('name');
var custemail = document.getElementById('email');
var custpass = document.getElementById('password');
var country = document.getElementById('country');
var city = document.getElementById('city');
var tel = document.getElementById('tel');
var image = document.getElementById('fileToUpload');
var address = document.getElementById('address');

function validate()
{
  if (custname.value == "")
  {
    alert("Please enter your name");
  }
  else if (custemail.value == "")
  {
    alert("Please enter your email");
  }
  else if (custpass.value == "")
  {
    alert("Please enter a password");
  }
  else if (country.value == "")
  {
    alert("Please enter your country of origin");
  }
  else if (city.value == "")
  {
    alert("Please enter your city of residence");
  }
  else if (tel.value == "")
  {
    alert("Please enter your telephone number");
  }
  else if (address.value == "")
  {
    alert("Please enter your address");
  }
  else
  {
    window.location.href = "productFunctions.php";
  }
}

var email = document.getElementById('email');
var password = document.getElementById('password');
function validatelogin()
{
  else if (email.value == "")
  {
    alert("Please enter your email");
  }
  else if (password.value == "")
  {
    alert("Please enter a password");
  }
}
