<form action="" method="post">
<table align="center" width="800">
<?php
	//$totalsum = totalsum();
 ?>
<?php
	$i =0;
 ?>
<tr align="center">
		<th>Prekės nr.</th>
		<th>Prekės pavadinimas</th>
		<th>Prekės nuotrauka</th>
		<th>Kiekis</th>
		<th>Kaina</th>
		</tr>
<?php 
if(!empty($_SESSION['item'])){
	foreach ($_SESSION['item'] as $key => $value) {
		$data = get_product_data($key);
		$i++;
		 $get_pro2 = "SELECT image_name from images where product_id='$key'";
	      $run_pro2 = mysqli_query($con,$get_pro2);
	      $row_pro2 = mysqli_fetch_array($run_pro2);
	      $image_name = $row_pro2['image_name'];

		?>
		
		<tr align="center" >
			<td><?php echo $i."."; ?></td>
			<td><?php echo $data['product_title']; ?></td>
			<td><img width="120" height="120" src="images/<?php echo $image_name; ?>" alt=""></td>
			
			<td><input name="kiekis[<?php echo $key ?>]" type="number" size='2' style="width:40px;" min='0' max='999' value="<?php echo $value ?>"></td>
			<td><?php echo $data["product_price"]*$value; ?> €</td>
			<td><a href="index.php?delete_from_cart=<?php echo $key ?>">Ištrinti</a></td>
		</tr>

		<?php } ?>
	
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td colspan="2"><p>Galutinė kaina:<?php  echo $totalsum['price']." €"; ?> </p></td>
   </tr><br/>
     <tr>
		<td></td>
		<td></td>
		<td colspan="1"><input type="submit" name="redaguoti" value="Redaguoti" /></td>
		<?php if(isset($_SESSION['logged_in'])) {?>
		<td colspan="1"><a href="index.php?page=checkout">Apmokėti</a></td>
		
	<?php } else {?>
		 <td colspan="2">Norėdami tęsti, turite <a href="index.php?page=login">Prisijungti</a></td>
		<?php } ?>
   </tr>
  
<?php } ?>
 <?php
 if($i==0){
 	echo "<p>Krepšelis tuščias.</p>";
 }
  ?>

  
</table>

</form>