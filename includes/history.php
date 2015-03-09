<table align="center" bgcolor="orange" width="100%" border="1">

<tr>
<td colspan="15" align="center"><h2>Užsakymų istorija</h2></td>
</tr>

<tr>
	<th align="center">Užsakymo id.</th>
	<th align="center">Patvirtintas</th>
	<th>Papildomai</th>
</tr>

<?php
	$con = mysqli_connect('localhost','root','','eshop');

	
	$query = "select order_id, order_confirmed from orders where user_id =".$_SESSION['logged_in'];
	$run_query=mysqli_query($con,$query);

	while($row_elem=mysqli_fetch_array($run_query)){
		$order_id=$row_elem['order_id'];
		$confirmed = $row_elem['order_confirmed'];


?>

		<tr align="center">
		<td><?php echo $order_id?></td>
		<td><?php 
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
		?></td>
		<td><a href="index.php?page=order_details&order_id=<?php echo $order_id ?>">Detaliau</a></td>
<?php } ?>
</tr>
</table>