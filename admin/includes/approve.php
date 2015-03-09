<?php

$con = mysqli_connect('localhost','root','','eshop');
	if(isset($_GET['order_id'])){
		$approve_id = (int)$_GET['order_id'];
		$approved =(int)$_GET['activity'];
		$approve_order = "UPDATE orders set
			order_confirmed='".$approved."' where order_id='".$approve_id."'";

			 $edit_order = mysqli_query($con,$approve_order);
	}
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit();
 ?>