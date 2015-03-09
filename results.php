<!doctype html>	
<?php
include("functions/functions.php");
header("Content-type:text/html; charset:utf-8");
 ?>
<html>
<head>
<meta charset="UTF-8"/>
	<title>E-parduotuvė!</title>
	<link rel="stylesheet" href="styles/style.css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
      
  
</head>
<body>
<div class="wrapper">

 <div class="pre-header">
 	<div class="pre-header1">
 		<ul>
 			<li> <a href="#"><img src="img/help.png"/>&nbsp; Pagalba</a></li>
 		</ul>
 	</div>
 	<div class="pre-header2">
 		<ul>
 			<li> <a href="#"> Apie mus</a></li>
 			<li> <a href="#"> Kontaktai</a></li>
 			<li style="float:left;margin-left:20%;" class="list-login"> <a href="#"> Prisijungti</a></li>
      <li style="float:left;margin-left:2%;" class="list-login"> <a href="#"> Registracija</a></li>
 		</ul>
 	</div>
 </div>
	<div class="header">
		<div class="header1">
    <a href="index.php"><img src="img/logo.png" style="margin-top:-45px;"></a>    
    </div>
		<div class="header2">

		<form action="results.php" method="GET">
			<input type="text" name="search" id="text"/>
      <div class="for-submit">
			 <input type="image" src="img/search.png" name="submit" id="submit"/>
      </div>
			</form>

		</div>
		<div class="header3">
		<div class="cart" id="basket">
			Krepšelis
		</div>
			
		</div>
	</div>
  <div class="main-header">
  	<div class="menu-item">
  		<ul>
      <?php
  			getCats();
        ?>
  		</ul>
  	</div>
  </div>
  <div class="left-content">
  	<ul>
     <div class="sort">
      <p align="center">Rūšiuoti pagal</p>
        <div class="arrow_down"></div>
      </div>
      <li><a href="1">Kainą</a></li>
      <li><a href="2">Naujausi</a></li>
      <li><a href="3">Seniausi</a></li>

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
   searchPro();
    ?>
  </div>
   <div class="footer"></div>

</div>

 
</body>

</html>