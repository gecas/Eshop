<?php
if(isset($_GET['brand'])){
 		$brand_id = $_GET['brand'];

 		$get_brand_pro = "SELECT * from products where product_brand ='$brand_id'";
 	  
    new_pro($get_brand_pro);

 		
  }
?>