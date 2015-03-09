<?php
	$con=mysqli_connect('localhost','root','','eshop');
 ?>
<form action="reg_check.php" method="post">
	<?php 
	if(isset($_SESSION["message"])){
		echo $_SESSION["message"];
		unset($_SESSION["message"]);
	} 
	?>
<div class="registration">
<label>Vartotojo vardas</label> &nbsp; <input type="text" name="nickname" value='<?php if(isset($_SESSION["nickname"])){ echo $_SESSION['nickname'];} else echo ""; ?>' /><br/>
<label>Slaptažodis</label> &nbsp; <input type="password" name="user_password" value='<?php if (isset($_SESSION['user_password'])) {echo $_SESSION['user_password']; }else echo ""; ?>'/><br/>
<label>Vardas</label> &nbsp; <input type="text" name="name" value='<?php if (isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} else echo ""; ?>' /><br/>
<label>Pavardė</label> &nbsp; <input type="text" name="surname" value='<?php if( isset($_SESSION['user_surname'])) { echo $_SESSION['user_surname'];} else echo ""; ?>' /><br/>
<label>Elektroninis paštas</label> &nbsp; <input type="text" name="email" value='<?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} else echo ""; ?>'/><br/>
<label>Adresas</label> &nbsp; <input type="text" name="address" value='<?php if(isset($_SESSION['user_address'])){ echo $_SESSION['user_address'];} else echo ""; ?>'/><br/>
<label>Telefonas</label> &nbsp; <input type="text" name="telephone" value='<?php if(isset($_SESSION['user_phone'])){ echo $_SESSION['user_phone'];} else echo ""; ?>' /><br/>
<label>Miestas</label> &nbsp; <input type="text" name="city" value='<?php if(isset($_SESSION['user_city'])){ echo $_SESSION['user_city'];} else echo ""; ?>' /><br/>
<label>Šalis</label> &nbsp; <input type="text" name="country" value='<?php if(isset($_SESSION['user_country'])){ echo $_SESSION['user_country'];} else echo ""; ?>' /><br/>
</div>

<input type="submit" name="registracija" style="float:right;" />


</form>

