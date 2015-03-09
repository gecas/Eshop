<?php
	session_start();
	include ("../functions/functions.php");

	if(isset($_POST['admin_login'], $_POST['admin_password'],$_POST['admin_nickname'])){
  $temp_adm_name = $_POST['admin_nickname'];
  $temp_adm_password = $_POST['admin_password'];
  checkadm($temp_adm_name,$temp_adm_password);
}

if(isset($_GET['logout'])){
 	session_destroy();
 	header("Location:index.php");
 }
 ?>

<html>
<head>
	<title>Valdymo pultas</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		if(isset($_SESSION['admin'])){

	 ?>
	<div class="header">
		<a href="index.php?logout">Atsijungti</a>
	</div>
	<div class="left-menu">
		<ul>
			<li><a href="index.php?page=products">Produktai</a></li>
			<li><a href="index.php?page=categories">Kategorijos</a></li>
			<li><a href="index.php?page=orders">Užsakymai</a></li>
			<li><a href="index.php?page=whattodo">Reik padaryt!!!</a></li>
		</ul>
	</div>
	<div class="right-content">
		<?php
		if(isset($_GET['page'])){
			switch ($_GET['page']) {
				case 'products':
					include ("includes/products.php");
					break;

				case 'insert_product':
				include ("includes/insert_product.php");
				break;

				case 'edit_product':
				include ("includes/edit_product.php");
				break;

				case 'all_products':
				include ("includes/all_products.php");
				break;

				case 'categories':
				include ("includes/categories.php");
				break;

				case 'insert_cat':
				include ("includes/insert_cat.php");
				break;

				case 'edit_cat':
				include ("includes/edit_cat.php");
				break;

				case 'all_cats':
				include ("includes/all_cats.php");
				break;

				case 'orders':
				include ("includes/orders.php");
				break;

				case 'edit_order':
				include ("includes/edit_order.php");
				break;

				case 'order_details':
				include ("includes/order_details.php");
				break;

				case 'whattodo':
				include ("includes/whattodo.php");
				break;
				
				default:
					# code...
					break;
			}
			
				}
		 ?>
	
	</div>
		
	</div>
<?php } else { 		 ?>
		<form action="" method="post">
			<input type="text" name="admin_nickname" /> Vartotojo vardas <br/>
			<input type="password" name="admin_password" /> Slaptažodis <br/>
			<input type="submit" name="admin_login" />
		</form>

		<?php } ?>
</body>
</html>