
 <table align="center" bgcolor="orange" width="100%" border="1">

<tr>
<td colspan="15" align="center"><h2>Peržiūrėti visus užsakymus</h2></td>
</tr>

<tr>
	<th>Užsakymo id</th>
	<th>Vardas</th>
	<th>Pavardė</th>
	<th>El. paštas</th>
	<th>Telefonas</th>
	<th>Adresas</th>
	<th>Miestas</th>
	<th>Šalis</th>
	<th>Patvirtintas</th>
	<th colspan="4">Funkcijos</th>
</tr>

<?php
	include("connector.php");

	
	//$query = "select orders.order_id,products.product_title,orders_products.product_quantity, users.user_name,users.user_surname,users.user_email,users.user_address,users.user_phone,users.user_city,users.user_country,products.product_price,orders.order_confirmed from users,orders,orders_products,products where orders.user_id = users.user_id and orders.order_id=orders_products.order_id and products.product_id = orders_products.product_id";
	
	$query = "select orders.order_id, users.user_name,users.user_surname,users.user_email,users.user_address,users.user_phone,users.user_city,users.user_country,orders.order_confirmed from users,orders where orders.user_id = users.user_id";
	$run_query=mysqli_query($con,$query);

	while($row_elem=mysqli_fetch_array($run_query)){
		$order_id=$row_elem['order_id'];
		$user_name = $row_elem['user_name'];
		$user_surname = $row_elem['user_surname'];
		$user_email = $row_elem['user_email'];
		$user_phone = $row_elem['user_phone'];
		$user_address = $row_elem['user_address'];
		$user_city = $row_elem['user_city'];
		$user_country = $row_elem['user_country'];
		$confirmed = $row_elem['order_confirmed'];


?>

		<tr align="center">
		<td><?php echo $order_id?></td>
		<td><?php echo $user_name?></td>
		<td><?php echo $user_surname?></td>
		<td><?php echo $user_email?></td>
		<td><?php echo $user_phone?></td>
		<td><?php echo $user_address?></td>
		<td><?php echo $user_city?></td>
		<td><?php echo $user_country?></td>
	    <td>
	    <?php 
	    	switch ($confirmed) {
	    		case 0:
	    			echo "Nepatvirtintas";
	    			break;

	    			case 1:
	    			echo "Patvirtintas";
	    			break;

	    			case 2:
	    			echo "Atšauktas";
	    			break;
	    		
	    		default:
	    			echo "Nepatvirtintas";
	    			break;
	    	}
	   
	    ?>
	    </td>
		<td><a href="includes/approve.php?order_id=<?php echo $order_id ?>&activity=1">Patvirtinti</a></td>
		<td><a href="includes/approve.php?order_id=<?php echo $order_id ?>&activity=2">Atšaukti</a></td>
		<td><a href="index.php?page=order_details&order_id=<?php echo $order_id ?>">Detaliau</a></td>
		<td><a href="includes/delete_order.php?delete_order=<?php echo $order_id ?>">Ištrinti</a></td>
<?php } ?>
</tr>
</table>


