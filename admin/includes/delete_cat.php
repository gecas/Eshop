<?php
include_once("connector.php");
	if(isset($_GET['delete_cat'])){
		$delid = (int)$_GET['delete_cat'];
		$del_pro = "DELETE from categories where cat_id = '$delid'";
		$run_del = mysqli_query($con,$del_pro);


		header("Location:../index.php?page=all_cats");
	}
 ?>