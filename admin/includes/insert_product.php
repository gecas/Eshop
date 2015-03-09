

	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>

	
	<form action="" method="POST" enctype="multipart/form-data">
			<table align="center" width="1000" border="1">
			<tr align="center">
				<td colspan="2"><h2>Prideti nauja preke</h2></td>
			</tr>

			<tr>
				<td align="center">Produkto pavadinimas</td>
				<td><input type="text" name="product_title" size="60" required/></td>
			</tr>

				<tr>
				<td align="center">Produkto kategorija</td>
				<td>
					<select name="product_cat" required>
						<option>Select category</option>
						<?php

						$get_cats = "SELECT * from categories";

						$run_cats = mysqli_query($con,$get_cats);

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
						<option>Select brand</option>
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
				<input type="file" name="file[]" multiple />
				</td>
			</tr>

				<tr>
				<td align="center">Produkto kaina</td>
				<td><input type="number" name="product_price" required/></td>
			</tr>

				<tr>
				<td align="center">Produkto apibudinimas</td>
				<td><textarea name="product_desc" cols="100" rows="10"></textarea></td>
			</tr>

				<tr>
				<td align="center">Produkto keywords</td>
				<td><input type="text" name="product_keywords" size="60"/></td>
			</tr>

				<tr>
				<td colspan="2" align="right"><input type="submit" name="insert_post" /></td>
			</tr>

			</table>
	</form>

<?php

 if(isset($_POST['insert_post'])){

 	//form text data
 	$product_title = $_POST['product_title'];
 	$product_cat = $_POST['product_cat'];
 	$product_brand = $_POST['product_brand'];
 	$product_price = $_POST['product_price'];
 	$product_desc = $_POST['product_desc'];
 	$product_keywords = $_POST['product_keywords'];

 	//tikrinimas ar yra tuščių laukų
 	if(!empty($product_title)&&!empty($product_cat)&&!empty($product_brand)&&!empty($product_price)&&!empty($product_desc)&&!empty($product_keywords)){

 	//form image
		if($_FILES){
			//failu ikelimo aplankas
			$uploaddir = '../images/';
			//failu kiekis
			$c=count($_FILES['file']['name']);
			$insert_product = "INSERT INTO products 
(product_cat,product_brand,product_title,product_price,product_desc,product_keywords) 
values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_keywords')";

			 $insert_pro = mysqli_query($con,$insert_product);

			 $get_pr = mysqli_insert_id($con);

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
			 	(image_name,product_id) 
			 	values ('$uniq_name','$get_pr')";

			 	$insert_pro = mysqli_query($con,$insert_product);

			}
			
		}
 			header("Location: index.php");
 		}
 	}

?>