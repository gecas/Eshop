<?php
	$con=mysqli_connect('localhost','root','','eshop');
 ?>
<form action="" method="post">
<div class="registration">
<label>Vartotojo vardas</label> &nbsp; <input type="text" name="nickname" /><br/>
<label>Slaptažodis</label> &nbsp; <input type="password" name="user_password" /><br/>
<label>Vardas</label> &nbsp; <input type="text" name="name" /><br/>
<label>Pavardė</label> &nbsp; <input type="text" name="surname" /><br/>
<label>Elektroninis paštas</label> &nbsp; <input type="email" name="email" value="@" /><br/>
<label>Adresas</label> &nbsp; <input type="text" name="address" /><br/>
<label>Telefonas</label> &nbsp; <input type="text" name="telephone" /><br/>
<label>Miestas</label> &nbsp; <input type="text" name="city" /><br/>
<label>Šalis</label> &nbsp; <input type="text" name="country" /><br/>
</div>

<input type="submit" name="registracija" style="float:right;" />


</form>

<?php
	global $con;
	if(isset($_POST['registracija'])){
		$nickname=$_POST['nickname'];
		$password = md5($_POST['user_password']);
		/*$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  		$nameErr = "Only letters and white space allowed"; 
  		return false;
		}*/
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];
		/*$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$emailErr = "Invalid email format"; 
  		return false;
		}*/
		$address = $_POST['address'];
		$telephone = $_POST['telephone'];
		$city = $_POST['city'];
		$country = $_POST['country'];

		if(!empty ($nickname) && !empty ($password) && !empty ($name) && !empty ($surname) && !empty ($email) && !empty ($address) && !empty ($telephone) && !empty ($city) && !empty ($country)){

			$run_check= mysqli_query($con,"SELECT * from users where user_nickname='$nickname'");
			$count_check = mysqli_num_rows($run_check);

			if($count_check==0){

		$insert_reg = "INSERT into users (user_nickname,user_password,user_name,user_surname,user_email,user_address,user_phone,user_city,user_country) 
		values ('$nickname','$password','$nickname','$surname','$email','$address','$telephone','$city','$country')";

		$run_reg = mysqli_query($con,$insert_reg);
		if($run_reg){
			print_r("<p style='color:red;'>Vartotojas užregistruotas!</p>");
			header("Location:index.php?page=login");
	    	}

	  
	  else{
		print_r("<p style='color:red;'>Vartotojas jau yra!</p>");
		} 
		  } 

	  }
	    else{
		print_r("<p style='color:red;'>Ne visi laukai užpildyti!</p>");
		
	}
	}
 ?>