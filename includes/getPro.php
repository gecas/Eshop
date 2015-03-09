<?php

  if(isset($_GET["page_nr"]))
    $page = $_GET["page_nr"]; 
  else
    $page = 1;
  $table = 'products'; //lenteles pavadinimas 

	$get_pro = mysqli_query($con,"SELECT * FROM ".$table." order by product_id LIMIT $shift, $kiekis");
  $result=mysqli_fetch_array($get_pro);

  $query2 =mysqli_query($con,"SELECT count(product_id) count FROM ".$table);
  $result2 = mysqli_fetch_array($query2);
  
  echo "<center><ul class='pagination' style='list-style: none;'>";
  $k=0;
  for ($i=0; $i < $result2['count']; $i+=$kiekis) {
    $k++;

    echo "<li style='display: inline-block;'><a style='text-decoration: none; color: #0C21B8; ' href='?page_nr=".$k."'> ".$k." </a></li>";
  }
  echo "</ul></center>";
  new_pro("SELECT * FROM ".$table." order by product_id LIMIT $shift, $kiekis");

  ?>