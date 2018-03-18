<!DOCTYPE html>
<html>
<head>
</head>
<body>

<form method="post">
  <input type="submit" name="ip">
</form>


</body>
</html>

<?php
require_once('php/productFunctions.php');
if (isset($_POST['ip']))
{
  get_ip_address() ;
}

?>
