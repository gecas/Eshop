<?php
	session_start();
	$con=mysqli_connect('localhost','root','','eshop');

		//$nickname=trim(strip_tags($_POST['nickname']));
		//$password = md5($_POST['user_password']);
		/*$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  		$nameErr = "Only letters and white space allowed"; 
  		return false;
		}*/
		//$name = trim(strip_tags($_POST['name']));
		//$surname = trim(strip_tags($_POST['surname']));
		/*$email = $_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION["message"] = "<p style='color:red;'>Blogas email!</p>";
	   		header("Location: ".$_SERVER["HTTP_REFERER"]);
	   		exit();
		}*/
		/*$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$emailErr = "Invalid email format"; 
  		return false;
		}*/
		//$address = $_POST['address'];
		//$telephone = $_POST['telephone'];
		//$city = $_POST['city'];
		//$country = $_POST['country'];

		$_SESSION['nickname'] =trim(strip_tags(($_POST['nickname'])));
		$_SESSION['user_password'] = $_POST['user_password'];
		$_SESSION['user_name'] = trim(strip_tags(($_POST['name'])));
		$_SESSION['user_surname'] = trim(strip_tags(($_POST['surname'])));
		$_SESSION['user_email'] = ($_POST['email']);

		$_SESSION['user_address'] = ($_POST['address']);
		$_SESSION['user_phone'] = ($_POST['telephone']);
		$_SESSION['user_city'] = ($_POST['city']);
		$_SESSION['user_country'] = ($_POST['country']);
		if (!filter_var(($_SESSION['user_email']), FILTER_VALIDATE_EMAIL)) {
			$_SESSION["message"] = "<p style='color:red;'>Blogas email!</p>";
	   		header("Location: ".$_SERVER["HTTP_REFERER"]);
	   		exit();
		}



		if(!empty ($_SESSION['nickname']) && !empty ($_SESSION['user_password']) && !empty ($_SESSION['name']) && !empty ($_SESSION['user_surname']) && !empty ($_SESSION['user_email']) && !empty ($_SESSION['user_address']) && !empty ($_SESSION['user_phone']) && !empty ($_SESSION['user_city']) && !empty ($_SESSION['user_country'])){

			$run_check= mysqli_query($con,"SELECT * from users where user_nickname='".$_SESSION['nickname']."'");
			$count_check = mysqli_num_rows($run_check);
			if($count_check==0){
				$insert_reg = "INSERT into users (user_nickname,user_password,user_name,user_surname,user_email,user_address,user_phone,user_city,user_country) 
					values ('".$_SESSION['nickname']."','".md5($_SESSION['user_password'])."','".$_SESSION['name']."','".$_SESSION['user_surname']."','".$_SESSION['user_email']."','".$_SESSION['user_address']."','".$_SESSION['user_phone']."','".$_SESSION['user_city']."','".$_SESSION['user_country']."')";
				$run_reg = mysqli_query($con,$insert_reg);

				if($run_reg){
					$_SESSION["message"] = "<p style='color:red;'>Vartotojas užregistruotas!</p>";
					header("Location:index.php?page=login");
					exit();
	    		}

	    		else{
					$_SESSION["message"] = "<p style='color:red;'>Ivyko klaida :/</p>";
					header("Location: ".$_SERVER["HTTP_REFERER"]);
					exit();
	    		}
			}
			else{
				$_SESSION["message"] = "<p style='color:red;'>Vartotojas jau yra!</p>";
				header("Location: ".$_SERVER["HTTP_REFERER"]);
				exit();
			} 
	  	}
	  	else{
			$_SESSION["message"] = "<p style='color:red;'>Ne visi laukai užpildyti!</p>";
			header("Location: ".$_SERVER["HTTP_REFERER"]);
			exit();
		}
 ?>