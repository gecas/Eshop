
<?php
include ('../includes/db_con.php');
 ?>

	
	
	<form action="index.php?page=insert_cat" method="POST" enctype="multipart/form-data">
			<table align="center" width="1000" border="1">
			<tr align="center">
				<td colspan="2"><h2>Prideti naują kategoriją</h2></td>
			</tr>

			<tr>
				<td align="center">Kategorijos pavadinimas</td>
				<td><input type="text" name="cat_title" size="60" required/></td>
			</tr>

			<tr>
				<td colspan="2" align="right"><input type="submit" name="insert_cat" /></td>
			</tr>

			</table>
	</form>

<?php

 if(isset($_POST['insert_cat'])){

 	//form text data
 	$cat_title = $_POST['cat_title'];
 	
			$insert_cat = "INSERT INTO categories 
			(cat_title) values ('$cat_title')";

			 $run_cats = mysqli_query($con,$insert_cat);

			
			
			if($run_cats){
 			header("Location: index.php?page=categories");
 		}
}
?>