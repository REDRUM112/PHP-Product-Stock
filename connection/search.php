<?php 
$sql = "SELECT products.id, products.upc FROM inventory.products";
if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($link, htmlspecialchars($_GET['search']));
    $sql = "SELECT products.id, products.upc FROM inventory.products WHERE products.id = '$name'
	UNION
	SELECT products.id, products.upc FROM inventory.products WHERE products.upc = '$name'";
}
if ($result = mysqli_query($link, $sql)) {
?>
	<table class="table table-striped table-hover" style="width:60%;">	
<tr>
<th width="20%">Product ID</th>
<th>Product Link</th>
</tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
	<td><?php echo $row['id']; ?></td>
    <td><a href="<?php echo $row['upc']; ?>" target="_blank"><?php echo $row['upc']; ?></a></td>
    </tr>
    <?php
    }
}
?>
</table>
<?php mysqli_close($link); ?>
</div>





