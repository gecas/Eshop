<?php
$con = mysqli_connect('localhost','root','','eshop');


function getCats(){
	global $con;

	$get_cats = "SELECT * from categories";
	$run_cats = mysqli_query($con, $get_cats);

	while($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

		echo "<li><a href='index.php?page=catalog&cat=$cat_id'>$cat_title</a></li>";
	}
}


function getBrands(){
	global $con;
	$get_brands = "SELECT * from brands";

	$run_brands = mysqli_query($con,$get_brands);

	while($row_brands=mysqli_fetch_array($run_brands)){

		$brand_id = $row_brands['brand_id'];
		$brand_title = $row_brands['brand_title'];

		echo "<li><a href='index.php?page=mark&brand=$brand_id'>$brand_title</a></li>";
	}

}



function searchPro($param){
	global $con;
	$search_query = $param;
	$get_pro = "select * from products where product_title like '%".$search_query."%'";
	new_pro($get_pro);
}


function new_pro($query){
	global $con;

	$get_pro = $query;
	 $run_pro = mysqli_query($con,$get_pro);
	 $count_brand_pro = mysqli_num_rows($run_pro);
	 if($count_brand_pro==0){
 		echo "<h2>Nebuvo rasta rezultatu</h2>";
 	}else{

	while($row_pro = mysqli_fetch_array($run_pro)){

      $pro_id = $row_pro['product_id'];
      $pro_cat = $row_pro['product_cat'];
      $pro_brand = $row_pro['product_brand'];
      $pro_title = $row_pro['product_title'];
      $pro_desc = substr($row_pro['product_desc'],0,120 ).'...';
      $pro_price = $row_pro['product_price'];
  

      $get_pro2 = "SELECT image_name from images where product_id='$pro_id'";
      $run_pro2 = mysqli_query($con,$get_pro2);
      $row_pro2 = mysqli_fetch_array($run_pro2);
      $image_name = $row_pro2['image_name'];

  echo "  <div class='content-item'>
      <figure>
        <h4 align='center'><a href='index.php?page=details&pro_id=$pro_id' style='text-decoration:none;'> $pro_title</a></h4>
        <a href='index.php?page=details&pro_id=$pro_id' style='float:left;' > <img src='images/$image_name' width='300' height='200'></a>
        <figcaption align='center'>
          <p>$pro_desc</p>
          <br/>
         <a href='index.php?add_cart=$pro_id' style='float:left;margin-left:2%;''  class='addProduct'><img src='img/cart.png' alt='Pridėkite į krepšelį' width='25' height='25'></a>
          <span style='float:left;'><b>Kaina : $pro_price €</b></span>
         <div class='more'>
        <a href='irasas/$pro_id' style='float:right;margin-right:4%;'' class='more'>Daugiau...</a>
        </div>
        </figcaption>
        </figure>
  </div>";
      } 
  }
}	

function checkacc($temp_name,$temp_password){
	global $con;

	$get_acc = "SELECT user_id from users where user_nickname ='$temp_name' and user_password = '$temp_password'";
 		$run_acc = mysqli_query($con,$get_acc);

 		$count_acc = mysqli_num_rows($run_acc);

 		if($count_acc==1){
 			$row_acc = mysqli_fetch_array($run_acc);
 			$_SESSION['logged_in'] = $row_acc['user_id'];
 			return true;
 		} else{
 			return false;
 		}
	}

	function checkadm($temp_adm_name,$temp_adm_password){
	global $con;

	$get_adm = "SELECT admin_id from admin where admin_nickname ='$temp_adm_name' and admin_password = '$temp_adm_password'";
 		$run_adm = mysqli_query($con,$get_adm);

 		$count_adm = mysqli_num_rows($run_adm);

 		if($count_adm==1){
 			$row_adm = mysqli_fetch_array($run_adm);
 			$_SESSION['admin'] = $row_adm['admin_id'];
 			return true;
 		} else{
 			return false;
 		}
	}

	function get_user_data($user_id){
		global $con;

		$get_acc = "SELECT * from users where user_id='$user_id'";
 		$run_acc = mysqli_query($con,$get_acc);
 		return mysqli_fetch_array($run_acc);
	}


	function get_admin_data($admin_id){
		global $con;

		$get_adm = "SELECT * from admin where admin_id='$admin_id'";
 		$run_adm = mysqli_query($con,$get_adm);
 		return mysqli_fetch_array($run_adm);
	}

	function check_item($product_id) {
		global $con;

		$get_item = "SELECT product_id from products where product_id='$product_id'";
 		$run_item = mysqli_query($con,$get_item);
 		
 		$count_item= mysqli_num_rows($run_item);

 		if($count_item==1){
 			return true;
 		} else{
 			return false;
 		}
	}

	function get_product_data($product_id){
			global $con;
		$get_item = "SELECT * from products where product_id='$product_id'";
 		$run_item = mysqli_query($con,$get_item);

 		return mysqli_fetch_array($run_item);
	}

	function totalsum($item){
		$sum = 0;
        $price =0;
        foreach ($item as $key => $value) {
          $data = get_product_data($key);
          $price+=$data["product_price"]*$value;
          $sum+=$value;
        }
        return array('price' => $price, 'count' => $sum);
	}


	function insert_orders($item,$user_data){
		global $con;

		if (!empty($item)) {
			$insert_orders = 'INSERT into orders (user_id) values ('.$user_data["user_id"].')';
			$run_orders = mysqli_query($con,$insert_orders);
			$kint = mysqli_insert_id($con);
			foreach ($item as $key => $value) {
				$get_product_data = get_product_data($key);
				if(!empty ($get_product_data)){
					$insert = "INSERT into orders_products (order_id,product_id,product_quantity) 
					values ($kint,$key,$value)";
					$run_insert = mysqli_query($con,$insert);
				}
			}
		}
	}

	function set_pages($kategorija, $irasai, $kiekis=10){
		echo "<center><ul class='pagination pagination-sm' style='list-style: none;'>";
		$k=0;
		for ($i=0; $i < $irasai; $i+=$kiekis) {
			$k++;
			echo "<li style='display: inline-block;'><a style='text-decoration: none; color: #0C21B8; ' href='?page=catalog&cat=".$kategorija."&page_nr=".$k."'>  ".$k." </a></li>";
		}
		echo "</ul></center>";
	}

 ?>




