<table align="center" bgcolor="orange" width="100%">

<tr>
<td colspan="8" align="center"><h2>Peržiūrėti visas prekes</h2></td>
</tr>

<tr>
	<th>Įrašo_id</th>
	<th>Pavadinimas</th>
	<th>Prekės kategorija</th>
	<th>Prekinis ženklas</th>
	<th>Paveiksliukas</th>
	<th>Kaina</th>
	<th>Aprašymas</th>
	<th>Gairės</th>
	<th>Redaguoti</th>
	<th>Ištrinti</th>
</tr>

<?php
	include("connector.php");

	

	$run_products=mysqli_query($con,"select * from products");
	$i=1;

	while($row_products=mysqli_fetch_array($run_products)){
		$pro_id=$row_products['product_id'];
		$product_title=$row_products['product_title'];
		$product_cat=$row_products['product_cat'];
		$product_brand=$row_products['product_brand'];
		$product_price = $row_products['product_price'];
		$product_desc = substr($row_products['product_desc'],0,100).'...';
		$product_keywords = $row_products['product_keywords'];
	

	  $get_img = "SELECT image_name from images where product_id='$pro_id'";
      $run_img = mysqli_query($con,$get_img);
      $row_img = mysqli_fetch_array($run_img);
      $image_name = $row_img['image_name'];

      $get_cat = "SELECT cat_title from categories where cat_id = '$product_cat'";
      $run_cat = mysqli_query($con,$get_cat);
      $row_cat = mysqli_fetch_array($run_cat);
      $cat_name = $row_cat['cat_title'];
?>

		<tr align="center">
		<td><?php echo $i++ ?></td>
		<td><?php echo $product_title?></td>
		<td><?php echo $cat_name ?></td>
		<td><?php echo $product_brand ?></td>
		<td><img width="120" height="120"src="../images/<?php echo $image_name; ?>"></td>
		<td><?php echo $product_price ?></td>
		<td><?php echo $product_desc ?></td>
		<td><?php echo $product_keywords ?></td>

		<td><a href="index.php?page=edit_product&pro_id=<?php echo $pro_id ?>">Redaguoti</a></td>
		<td><a href="includes/delete_product.php?delete_product=<?php echo $pro_id ?>">Ištrinti įrašą</a></td>
<?php } ?>
</tr>
</table>