<?php

$con = mysqli_connect('localhost','root','','eshop');

$text = $_REQUEST ['text'];
$text = preg_replace('#[^a-z0-9]#i', '', $text);

$query = "SELECT * FROM products where product_title LIKE '%$text%'";
$action = mysqli_query($con,$query);
$result = mysqli_num_rows($action);

while ($res = mysqli_fetch_array($action)){
	$output =$res['product_title'].'<br/>';	
	$id = $res['product_id'];

	echo "<a href='details.php?pro_id=$id'>$output</a>";
}


?>