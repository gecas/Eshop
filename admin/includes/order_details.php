<table align="center" bgcolor="orange" width="100%" border="1">

<tr>
<td colspan="15" align="center"><h2>Peržiūrėti visus užsakymus</h2></td>
</tr>

<tr>
	<th>Prekės pav.</th>
	<th>Kiekis</th>
	<th>Kaina</th>
</tr>

<?php
	include("connector.php");

	
	//$query = "select orders.order_id,products.product_title,orders_products.product_quantity, users.user_name,users.user_surname,users.user_email,users.user_address,users.user_phone,users.user_city,users.user_country,products.product_price,orders.order_confirmed from users,orders,orders_products,products where orders.user_id = users.user_id and orders.order_id=orders_products.order_id and products.product_id = orders_products.product_id";
	if(isset($_GET['order_id'])){
		$new_id = (int)$_GET['order_id'];
	$query = "select products.product_title, orders_products.product_quantity,products.product_price from products,orders_products where products.product_id=orders_products.product_id and orders_products.order_id=".$new_id;
	$run_query=mysqli_query($con,$query);

	while($row_elem=mysqli_fetch_array($run_query)){
		$title=$row_elem['product_title'];
		$quant = $row_elem['product_quantity'];
		$price = $row_elem['product_price'];
	?>

		<tr align="center">
		<td><?php echo $title?></td>
		<td><?php echo $quant?></td>
		<td><?php echo number_format($price*$quant,2); ?>Eur</td>
<?php } ?>
</tr>
</table>



<?php } else {
	echo "Tokio užsakymo prekių nėra";
}?>