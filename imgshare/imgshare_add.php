<?php
include_once("head.php");

if(!empty($_POST["acc"]) && !empty($_POST["pw"])){
  $acc = $_POST["acc"];
  $pw = md5($_POST["pw"]);
  $ad = 0 ;
  if(!empty($_POST["admin"]) && $_POST["admin"] == 'iamhandsome'){
      $ad = 1 ;
  } 
  $sql = "select * from imgshare_member where imgshare_member_acc = '$acc' ";
  $cc = mysqli_query($link,$sql);
  $setted = mysqli_num_rows($cc);
  if($setted == 0)
  {
  $sql = "insert into imgshare_member value(NULL,'$acc','$pw','$real_time','$ad','1')";

if($ad == 0){ 
?>
<script>alert("註冊成功!點確定跳至登入頁!");</script> 
  <?php }else{ ?>
     <script> alert("超帥管理員註冊成功0v0"); </script> 
     <?php } 
  mysqli_query($link,$sql);
  header("Refresh:0.1;url=imgshare_login.php");
  }else{
    ?><script>alert("此帳號已有人使用!");</script> 
<?php
  }
}
?>


<style>
.ck {
	background-color: #FFE;
}   
</style>

<form action="" method="POST">
<table width="800" border="4" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" colspan="4" align="center" valign="middle"><span style="font-family: '微軟正黑體'; font-size: 24px;">Imgshare 註冊頁</span></td>
  </tr>
  <tr>
    <td width="15%" height="120" rowspan="3" align="center" valign="middle"><img src="image/BIxK0I2.gif" height="120 "></td>
    <td width="25%" height="30" align="center" valign="middle" class="ck">帳　號</td>
    <td width="25%" height="30" align="center" valign="middle" class="ck"><input type="text" name="acc" /></td>
    <td width="15%" height="120" rowspan="3" align="center" valign="middle"><img src="image/BIxK0I2.gif" height="120 "></td>
  </tr>
  <tr>
    <td width="25%" height="30" align="center" valign="middle"class="ck">密　碼</td>
    <td width="25%" height="30" align="center" valign="middle"class="ck"><input type="password" name="pw" /></td>
  </tr>
  <tr>
    <td width="25%" height="30" align="center" valign="middle"class="ck">管理員註冊序號</td>
    <td width="25%" height="30" align="center" valign="middle"class="ck"><input type="text" name="admin" /></td>
  </tr>
  <tr>
    <td height="50" colspan="4" align="center" valign="middle"><p><input type="submit" value="送出" /> <input type="button" value="上一頁" onclick="javascript:location.href='imgshare_login.php'" /></p></td>
  </tr>
</table>
</form>

<script>
  function outtext()
  {
    alert("註冊成功!");
  }
  </script>