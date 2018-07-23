<marquee><span style="font-size: 36px;font-family: '微軟正黑體';">哈囉您好，歡迎來到CoolTalk聊天室\^O^/</span></marquee><br><br>
<?php
include_once("head.php");


if(!empty($_POST["acc"]) && !empty($_POST["pw"])){
  $acc = $_POST["acc"];
  $pw = md5($_POST["pw"]);
  $nick = $_POST["nick"];
  $int = $_POST["int"];

  $sql = "select * from cool_member where cool_member_acc = '$acc' ";
  $cc = mysqli_query($link,$sql);
  $setted = mysqli_num_rows($cc);
  if($setted == 0)
  {
  $sql = "insert into cool_member value(NULL,'$acc','$pw','$nick','$int','0','1')";
?>
<script>alert("註冊成功!點確定跳至登入頁!");</script> 
  <?php
  mysqli_query($link,$sql);
  header("Refresh:0.1;url=coollogin.php");
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
    <td height="50" colspan="4" align="center" valign="middle"><span style="font-family: '微軟正黑體'; font-size: 24px;">CoolTalk 註冊頁</span></td>
  </tr>
  <tr>
    <td width="15%" height="120" rowspan="4" align="center" valign="middle"><img src="img/beside.gif" height="120 "></td>
    <td width="25%" height="30" align="center" valign="middle" class="ck">帳　號</td>
    <td width="25%" height="30" align="center" valign="middle" class="ck"><input type="text" name="acc" /></td>
    <td width="15%" height="120" rowspan="4" align="center" valign="middle"><img src="img/beside.gif" height="120 "></td>
  </tr>
  <tr>
    <td width="25%" height="30" align="center" valign="middle"class="ck">密　碼</td>
    <td width="25%" height="30" align="center" valign="middle"class="ck"><input type="password" name="pw" /></td>
  </tr>
  <tr>
    <td width="25%" height="30" align="center" valign="middle"class="ck">暱　稱</td>
    <td width="25%" height="30" align="center" valign="middle"class="ck"><input type="text" name="nick" /></td>
  </tr>
  <tr>
    <td width="25%" height="30" align="center" valign="middle"class="ck">興　趣</td>
    <td width="25%" height="30" align="center" valign="middle"class="ck"><input type="text" name="int" /></td>
  </tr>
  <tr>
    <td height="50" colspan="4" align="center" valign="middle"><p><input type="submit" value="送出" /></p></td>
  </tr>
</table>
</form>

<script>
  function outtext()
  {
    alert("註冊成功!");
  }
  </script>