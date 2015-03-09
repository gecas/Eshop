  
  <?php
      if(isset($_GET['pro_id'])){

        $product_id = $_GET['pro_id'];
        $get_pro = "select * from products where product_id='$product_id'";
        $run_pro = mysqli_query($con,$get_pro);

        $get_pro2 = "SELECT image_name from images where product_id='$product_id'";
        $run_pro2 = mysqli_query($con,$get_pro2);
        $row_pro2 = mysqli_fetch_array($run_pro2);
        $image_name = $row_pro2['image_name'];

        echo "  <div class='content-item'>
            <figure>
              <a href='images/$image_name' rel='lightgallery[flowers]'>
               <img src='images/$image_name' width='400' height='300' style='margin-left:5%;float=left;'></a>
              </figure>
        ";

          while($row_pro = mysqli_fetch_array($run_pro)){

              $pro_id = $row_pro['product_id'];
              $pro_title = $row_pro['product_title'];
              $pro_price = $row_pro['product_price'];
              
              $pro_desc = $row_pro['product_desc'];

              echo " 
              <div class='content-text'>
              <figure>
                <h3 align='center'>$pro_title</h3>
                <figcaption>
                  <p align='center'>$pro_desc</p>
                  <br/>
                 <a href='index.php?add_cart=$pro_id' style='float:left;margin-left:2%;margin-top:40%;'  class='addProduct'><img src='img/cart.png' alt='Pridėkite į krepšelį' width='40' height='40'></a>
                  <span style='float:left;margin-left:47%;'><b><p align='center'>Kaina : $pro_price €</p></b></span>
                </figcaption>
                </figure>
          </div>
         </div>
          ";

            }

        echo "<div class='content-item'>";
        while($row_pro2 = mysqli_fetch_array($run_pro2)){
              $image_name = $row_pro2['image_name'];
              echo "
              <figure style = 'float: left; margin: 5px;'>
              <a href='images/$image_name' rel='lightgallery[flowers]'>
                 <img src='images/$image_name' width='100' height='100' style='margin-left:7%;'></a>
                </figure>";
        }
        echo "<div style='clear:both;'></div>";
        echo " </div>";

}
?>