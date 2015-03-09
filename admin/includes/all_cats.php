<table align="center" bgcolor="orange" width="100%">

<tr>
<td colspan="8" align="center"><h2>Peržiūrėti visas kategorijas</h2></td>
</tr>

<tr>
	<th>Kategorijos nr.</th>
	<th>Kategorijos id</th>
	<th>Kategorijos pavadinimas</th>
</tr>

<?php
	include("connector.php");

	

	$run_cats=mysqli_query($con,"select * from categories");
	$i=1;

	while($row_cat=mysqli_fetch_array($run_cats)){
		$cat_id=$row_cat['cat_id'];
		$cat_title=$row_cat['cat_title'];
?>

		<tr align="center">
		<td><?php echo $i++ ?></td>
		<td><?php echo $cat_id?></td>
		<td><?php echo $cat_title ?></td>

		<td><a href="index.php?page=edit_cat&cat_id=<?php echo $cat_id ?>">Redaguoti</a></td>
		<td><a href="includes/delete_cat.php?delete_cat=<?php echo $cat_id ?>">Ištrinti</a></td>
<?php } ?>
</tr>
</table>