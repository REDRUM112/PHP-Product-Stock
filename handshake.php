<?php 
require_once("connection/link.php");
 
 if((isset($_POST['id'])&& $_POST['id'] !='') && (isset($_POST['upc'])&& $_POST['upc'] !=''))
{
    
$id = $link->real_escape_string($_POST['id']);
$upc = $link->real_escape_string($_POST['upc']);
$sql="INSERT INTO products (id, upc) VALUES ('".$id."', '".$upc."')";
if(!$result = $link->query($sql)){
die('There was an error running the query [' . $conn->error . ']');
}
else
{
echo "Product was added successfully!";
}
}
else
{
echo "Please fill in the Product ID and Link!";
}
?>