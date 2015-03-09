 <?php 
 if(!isset($_SESSION['logged_in'])){
  ?>
 <div class="login-input">
    <div class="login-input2">
  <form action="index.php" method="post">
    <input type="text" name="username" style="width:400px;height:30px;border:3px solid #A30C73;" /><br/><br/>
    <input type="password" name="password" style="width:400px;height:30px;border:3px solid #A30C73;"/><br/><br/>
    <input type="submit" name="prisijungti" style="width:400px;height:20px;color:#fff;background-color:#A30C73;margin-left:0.3%;"/>
  </form>
  </div>
</div>

<?php }else{
  header("Location:index.php");
} ?>


