<?php 
require_once("connection/link.php");
 
 if((isset($_POST['id'])&& $_POST['id'] !=''))
{
    
$id = $link->real_escape_string($_POST['id']);
$sql="DELETE FROM products WHERE id='$id'";
if(!$result = $link->query($sql)){
die('There was an error running the query [' . $link->error . ']');
}
else
{
echo "Product was deleted successfully!";
}
}
else
{
echo "Please add a product ID";
}
?>