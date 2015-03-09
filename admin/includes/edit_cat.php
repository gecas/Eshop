
<?php
include ('../includes/db_con.php');
 ?>

	<?php
	if(isset($_GET['cat_id'])){
		$edit_id = (int)$_GET['cat_id'];
		$run_query = mysqli_query($con,"SELECT * from categories where cat_id='$edit_id'");

		$row_cats=mysqli_fetch_array($run_query);
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
	}
	?>
	
	<form action="" method="POST" enctype="multipart/form-data">
			<table align="center" width="1000" border="1">
			<tr align="center">
				<td colspan="2"><h2>Redaguoti kategorijas</h2></td>
			</tr>

			<tr>
				<td align="center">Kategorijos pavadinimas</td>
				<td><input type="text" name="cat_title" size="60" value="<?php echo $cat_title; ?>" required/></td>
				<input type="hidden" name="cat_edit_id" size="60" value="<?php echo $cat_id; ?>" required/>
			</tr>

			<tr>
				<td colspan="2" align="right"><input type="submit" name="edit_cat" /></td>
			</tr>

			</table>
	</form>

<?php

 if(isset($_POST['edit_cat'])){

 	//form text data
 	$cat_title = $_POST['cat_title'];
 	$cat_edit_id = $_POST['cat_edit_id'];
 	
			$update_cat = "UPDATE categories set
			cat_title='$cat_title' where cat_id='$cat_edit_id'";

			 $edit_cats = mysqli_query($con,$update_cat);

			
			
			if($edit_cats){
 			header("Location: index.php");
 		}
}
?>