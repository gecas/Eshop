<?php
session_start();
include("functions/functions.php");
include("includes/db_con.php");
if(isset($_POST['prisijungti'], $_POST['password'],$_POST['username'])){
  $temp_name = trim(strip_tags($_POST['username']));
  $temp_password = md5(trim(strip_tags($_POST['password'])));
  checkacc($temp_name,$temp_password);
  /*if (!checkacc($temp_name,$temp_password)) {
    header
  }*/

}
//unset($_SESSION["item"]);

if (isset($_SESSION['logged_in'])) {
  $user_data = get_user_data($_SESSION['logged_in']);
}

if(isset($_POST['final_checkout'], $_POST['checkout'])){
    insert_orders($_SESSION['item'],$user_data);
    $body = "Jūsų užsakymas patvirtintas.Ačiū.";
    mail('geciauskasmarius@gmail.com', 'Užsakymas gautas', $body,'Užsakymas');
    header("Location:index.php?page=checkout_confirmed");
    
}

if(isset($_GET['logout'])){
  session_destroy();
  header("Location:index.php");
}
if(isset($_POST['redaguoti'], $_POST['kiekis'])){
  foreach ($_POST['kiekis'] as $key => $value) {
    if(FILTER_VAR($value,FILTER_VALIDATE_INT)){
      if($value!=0){
        $_SESSION['item'][$key]=$value;
      }
      else{
        unset ($_SESSION['item'][$key]);
      }
    }
  }
  header("Location:index.php?page=add_cart");
}
if(isset($_GET['add_cart'])){
  $cart = (int)$_GET['add_cart'];
  $item = check_item($cart);
  if($item){
    if (isset($_SESSION['item'][$cart])) {
      $_SESSION['item'][$cart]++;
    }else{
      $_SESSION['item'][$cart]=1;
    }
    header("Location: ".$_SERVER['HTTP_REFERER']);
  }
}

if(isset($_GET['delete_from_cart'])){
  $cart = (int)$_GET['delete_from_cart'];
  unset($_SESSION['item'][$cart]);
  header("Location: ".$_SERVER['HTTP_REFERER']);
}
  
  //puslapiu skaiciavimas
  if(isset($_GET["page_nr"]))
    $page = $_GET["page_nr"]; 
  else
    $page = 1;

  $kiekis = 3;

  $shift = $kiekis * ($page - 1); 
  //

 ?>
 <!doctype html>
<html>
<head>
<meta charset="UTF-8"/>
	<title>E-parduotuvė!</title>
  <base href="//localhost/eshop/" />
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
  <link rel="stylesheet" type="text/css" href="styles/bootstrap-theme.css"/>
  <link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <link href="lightgallery/skins/snow/style.css" type="text/css" media="screen" rel="stylesheet" />
  <script src="lightgallery/lightgallery.min.js" type="text/javascript"></script>
  <script type="text/javascript">lightgallery.init({resizeSync: true});</script> 
  
</head>
<body>
<div class="wrapper">

 <div class="pre-header">
 	<div class="pre-header1">
 		
 	</div>



 	<div class="pre-header2">
 		<ul>
 			<li> <a href="#"> Apie mus</a></li>
      <?php if (isset($_SESSION['logged_in'])){ 

        ?>
      <li> <a href="index.php?page=history">Pirkimų istorija</a></li>
      <li style="float:left;margin-left:20%;" class="list-login"> <a href="index.php?logout"> Atsijungti</a></li>
      <li style="float:left;margin-left:10%;" class="list-login"> <span>Sveikas , <?php echo $user_data['user_name'];?> </span></li>
      <?php }else{ ?>
 			<li style="float:left;margin-left:20%;" class="list-login"> <a href="index.php?page=login"> Prisijungti</a></li>
      <li style="float:left;margin-left:2%;" class="list-login"> <a href="registracija"> Registracija</a></li>
 	  <?php } ?>
  	</ul>
 	</div>
 </div>
	<div class="header">
		<div class="header1">
    <a href="index.php"><img src="img/logo.png" style="margin-top:-45px;"></a>  
    </div>
		<div class="header2">

		<form action="" method="GET">
			<input type="text" name="search" id="text" />
      <div class="for-submit">
			 <input type="image" src="img/search.png" name="submit" id="submit"/>
      </div>
			</form>

		</div>
		<div class="header3">
		<div class="cart" id="basket">
      
      <?php 
      if(isset($_SESSION['item'])&& !empty($_SESSION['item'])){
        $totalsum=totalsum($_SESSION['item']);
        echo "<h3><a href='index.php?page=add_cart'>Krepšelis</a></h3>";
        if ($totalsum['count']==1){
        echo $totalsum['count']." prekė";
      }
      if($totalsum['count']>1&&$totalsum['count']<10){
        echo $totalsum['count']." prekės";
      }
      if($totalsum['count']>=10){
        echo $totalsum['count']." prekių";
      }

        echo "<br/>".$totalsum['price']." €";
      } else{
        echo "<h3 align='center'>Krepšelis tuščias</h3>";
      }

       ?>
      
		</div>
			
		</div>
	</div>
  <div class="main-header">
  	<div class="menu-item">
  		<ul>
     <?php getCats(); ?>
  		</ul>
  	</div>
  </div>
  <div class="left-content">
  	<ul>
     <div class="sort">
      <p align="center">Rūšiuoti pagal</p>
        <div class="arrow_down"></div>
      </div>
      <li><a href="index.php?page=price_filter">Kainą</a></li>
      <li><a href="index.php?page=newest_pro">Naujausi</a></li>
      <li><a href="index.php?page=oldest_pro">Seniausi</a></li>
  </ul>
      <div class="cats" style="margin-top:3%;">
      <p align="center">Kategorija</p>
        <div class="arrow_down"></div>
      </div>
      <ul>
  		<?php
        getCats();
        ?>
        </ul>
      <div class="brands" style="margin-top:3%;">
        <p align="center">Prekinis ženklas</p>
        <div class="arrow_down"></div>
      </div>
      <ul>
  		<?php
      getBrands();
       ?>
  	</ul>
  </div>
  <div class="right-content">
  <?php
  if(isset($_GET['page'])){
    switch ($_GET['page']) {
      case 'login':
        include ('login.php');
        break;

        case 'catalog':
        include('includes/getCatPro.php');
        break;

        case 'mark':
        include('includes/getBrandPro.php');
        break;

        case 'details':
        include('details.php');
        break;

        case 'add_cart':
        include('add_cart.php');
        break;

        case 'price_filter':
        include('includes/price_filter.php');
        break;

        case 'newest_pro':
        include('includes/newest_pro.php');
        break;

        case 'oldest_pro':
        include('includes/oldest_pro.php');
        break;

        case 'registration':
        include('registration.php');
        break;

        case 'checkout':
        include('includes/checkout.php');
        break;

        case 'checkout_confirmed':
        include('includes/checkout_confirmed.php');
        break;

        case 'history':
        include('includes/history.php');
        break;

        case 'order_details':
        include ("includes/order_details.php");
        break;


      
      default:

        break;
    }
  }

      
         ?>
   <?php
   //padaryt su switch...
    ?>
   
    <?php 
    if (isset($_GET["search"])) {
      searchPro($_GET["search"]);
    } 

  if(!isset($_GET['search']) && !isset($_GET['page'])){
    include ('includes/getPro.php');
  }
    ?>
  </div>
   <div class="footer"></div>

</div>

 <div id="scrollTop">▲</div>
 <script src="js/bootstrap.js" type="text/javascript"></script>
</body>

</html>