<head>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
</head>

	<?php
	include ("connector.php");
	if(isset($_GET['pro_id'])){
		$edit_id=(int)$_GET['pro_id'];
		$run_query=mysqli_query($con,"SELECT * from products where product_id='$edit_id'");

		$row_product=mysqli_fetch_array($run_query);
		$product_id=$row_product['product_id'];
		$product_cat=$row_product['product_cat'];
		$product_brand=$row_product['product_brand'];
		$product_title=$row_product['product_title'];
		$product_price=$row_product['product_price'];
		$product_desc=$row_product['product_desc'];
		$product_keywords=$row_product['product_keywords'];
	?>
	<form action="index.php?page=edit_product" method="POST" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $product_id; ?>" name='prod_id' />
			<table align="center" width="1000" border="1">
				<tr align="center">
					<td colspan="2"><h2>Redaguoti prekes</h2></td>
				</tr>
				<tr>
					<td align="center">Produkto pavadinimas</td>
				<td><input type="text" name="product_title" value="<?php echo $product_title; ?>" size="60" required/></td>
				</tr>

					<tr>
					<td align="center">Produkto kategorija</td>
					<td>
						<select name="product_cat" required>
							<?php
							
							$get_cats = "SELECT * from categories";

							$run_cats = mysqli_query($con,$get_cats);
							$row_cats=mysqli_fetch_array($run_cats);
							$cat_id = $row_cats['cat_id'];
							$cat_title = $row_cats['cat_title'];

							echo "<option selected value='$cat_id'>$cat_title</option>";

							while($row_cats=mysqli_fetch_array($run_cats)){

							$cat_id = $row_cats['cat_id'];
							$cat_title = $row_cats['cat_title'];

							echo "<option value='$cat_id'>$cat_title</option>";
						}

							?>
						</select>
					</td>
				</tr>

					<tr>
					<td align="center">Produkto brandas</td>
					<td>
						<select name="product_brand" required>
							<option>Pasirinkitę prekinį ženklą</option>
							<?php

							$get_brands = "SELECT * from brands";

							$run_brands = mysqli_query($con,$get_brands);

							while($row_brands=mysqli_fetch_array($run_brands)){

							$brand_id = $row_brands['brand_id'];
							$brand_title = $row_brands['brand_title'];

							echo "<option value='$brand_id'>$brand_title</option>";
						}

							?>
						</select>
					</td>
				</tr>
						
					<tr>
					<td align="center">Produkto paveiksliukas</td>
					<td>
					<input type="file" name="file[]"  multiple />
					<?php 
							$get_img = mysqli_query($con,"select * from images where product_id = '$product_id'");
							echo "<ul>";
							while ($row_img =mysqli_fetch_array($get_img)){
								$image_name = $row_img['image_name'];
								$image_id = $row_img['image_id'];
								echo '<li style="list-style: none;float:left;margin:1%;"><img src="../images/'.$image_name.'" width="50" height="50"/></li>';
							}
							echo "</ul>";

						 ?>
					
					</td>
				</tr>

					<tr>
					<td align="center">Produkto kaina</td>
					<td><input type="text" name="product_price" value="<?php echo $product_price; ?>" required/></td>
				</tr>

					<tr>
					<td align="center">Produkto apibudinimas</td>
					<td><textarea name="product_desc" cols="100" rows="10"><?php echo $product_desc; ?></textarea></td>
				</tr>

					<tr>
					<td align="center">Produkto keywords</td>
					<td><input type="text" name="product_keywords" size="60" value="<?php echo $product_keywords; ?>" /></td>
				</tr>

					<tr>
					<td colspan="2" align="right"><input type="submit" name="insert_post" /></td>
				</tr>

			</table>
	</form>
</body>

</html>

<?php

}

 if(isset($_POST['insert_post'])){
 	//form text data
 	$product_title = $_POST['product_title'];
 	$product_cat = $_POST['product_cat'];
 	$product_brand = $_POST['product_brand'];
 	$product_price = $_POST['product_price'];
 	$product_desc = $_POST['product_desc'];
 	$product_keywords = $_POST['product_keywords'];
 	$product_id = $_POST['prod_id'];

 	//form image
 	if(!empty($_FILES['file']['tmp_name'][0])){

			//failu kiekis
			
			$insert_product = "UPDATE products 
	set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_keywords='$product_keywords' where product_id='$product_id'";
				
			 $insert_pro = mysqli_query($con,$insert_product);

			 $delete_product = "DELETE FROM images where product_id='".$product_id."'"; 
			 $delete_pro = mysqli_query($con,$delete_product);

			 $uploaddir = '../images/';
			 $c=count($_FILES['file']['name']);
			 for($i=0; $i<$c; $i++){
				//failo pletinio iskirpimas
				$file_type = explode(".", $_FILES["file"]["name"][$i]);

				$file_type = end($file_type);

				//generuojamas unikalus failo pavadinimas
				$uniq_name = uniqid().".".$file_type;

				//kelias+pavadinimas
				$uploadfile = $uploaddir.$uniq_name;

				//failu kelimas
				move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadfile);
		 		
		 		$insert_product = "INSERT into images 
		 		(image_name, product_id) values('$uniq_name','".$product_id."')";

			 	
			 	$insert_pro = mysqli_query($con,$insert_product);

			
			 	}

			}else{
			//failu ikelimo aplankas
			//$uploaddir = '../images/';
			//failu kiekis
			//$c=count($_FILES['file']['name']);
			$insert_product = "UPDATE products 
		set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_keywords='$product_keywords' where product_id='$product_id'";
				
			 $insert_pro = mysqli_query($con,$insert_product);

			/* $delete_product = "DELETE FROM images where product_id='$product_id'";

			 	

			 $delete_pro = mysqli_query($con,$delete_product);
			// $get_pr = mysqli_insert_id($con);

			//failu kelimas i serveri
			for($i=0; $i<$c; $i++){
				//failo pletinio iskirpimas
				$file_type = explode(".", $_FILES["file"]["name"][$i]);

				$file_type = end($file_type);

				//generuojamas unikalus failo pavadinimas
				$uniq_name = uniqid().".".$file_type;

				//kelias+pavadinimas
				$uploadfile = $uploaddir.$uniq_name;

				//failu kelimas
				move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadfile);
		 		
		 		$insert_product = "INSERT INTO images 
		 		(image_name, product_id) VALUES ('$uniq_name', '".$product_id."')";
			 	
			 	$insert_pro = mysqli_query($con,$insert_product);*/

			}
			

 			header("Location: index.php?page=all_products");
 		}
?>
