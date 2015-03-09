<?php 
if(isset($_GET['cat'])){
	$cat_id = $_GET['cat'];
	/*if(isset($_GET["page_nr"]))
		$page = $_GET["page_nr"]; 
	else
		$page = 1;

	$kiekis = 1;

	$shift = $kiekis * ($page - 1); */

	//$get_pro = mysqli_query($con,"SELECT * FROM products WHERE kategorija_id=".$cat_id." order by product_id LIMIT $shift, $kiekis");
	//$result=mysqli_fetch_array($get_pro);

	$query2 =mysqli_query($con,"SELECT count(product_id) count FROM products WHERE product_cat=".$cat_id);
	$result2 = mysqli_fetch_array($query2);

	set_pages($cat_id, $result2["count"], $kiekis);



	$get_pro = "SELECT * FROM products WHERE product_cat=".$cat_id." order by product_id LIMIT $shift, $kiekis";

	//$get_pro = "SELECT * from products where product_cat ='$cat_id'";

	new_pro($get_pro);

}
  ?>