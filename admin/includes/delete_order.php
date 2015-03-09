<?php 
	include_once("connector.php");
?>

<?php

	if(isset($_GET['delete_order'])){
		$id = (int)$_GET['delete_order'];
		$query = "delete from orders where order_id='$id'";
		$run_query = mysqli_query($con,$query);
		$query2 = "delete from orders_products where order_id='$id'";
		$run_query2 = mysqli_query($con,$query);
	}
	header ("Location: ".$_SERVER["HTTP_REFERER"]);
 ?>