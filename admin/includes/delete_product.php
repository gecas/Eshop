<?php
include_once("connector.php");
	if(isset($_GET['delete_product'])){
		$delid = (int)$_GET['delete_product'];
		$del_pro = "DELETE from products where product_id = '$delid'";
		$run_del = mysqli_query($con,$del_pro);


		header("Location:../index.php?page=all_products");
	}
 ?>