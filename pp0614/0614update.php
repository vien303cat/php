<?php
  session_start();
  $link =mysqli_connect("localhost","root","","myphp_2018_06");
  mysqli_query($link , 'SET NAMES UTF8');
  $my_id =  $_SESSION['user_id'];

  if(!empty($_POST["m_a_name"])){
    $sql="update my_account set m_a_name = '".$_POST["m_a_name"]."' where m_a_id = '".$my_id."'";
    mysqli_query($link,$sql);
  }
  $sql="select * from my_account where m_a_id = '".$my_id."'";
  $rr = mysqli_query($link,$sql);
  $rrr = mysqli_fetch_assoc($rr);

?>
<form method="post">
  <?php echo $rrr["m_a_seq"]?><br>
  <?php echo $rrr["m_a_id"]?><br>
  <input name="m_a_name" value="<?php echo $rrr["m_a_name"]?>"><br>
  <?php echo $rrr["m_a_tel"]?><br>
  <?php echo $rrr["m_a_con"]?><br><br>
  <input type="submit" value = "修改">
</form>