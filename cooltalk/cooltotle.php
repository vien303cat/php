<?php
include_once("head.php");
$user = $_SESSION["user"];
$sql = "select * from cool_member where cool_member_acc = '$user' and cool_member_AI = '1' ";
$ifAI = mysqli_num_rows(mysqli_query($link,$sql));
$fkAI = (mysqli_query($link,$sql));
$AI = mysqli_fetch_assoc($fkAI);
$AIname = $AI["cool_member_nick"] ;
if(!empty($_POST["acc"])){
$acc = $_POST["acc"];
$nick = $_POST["nick"];
$int = $_POST["int"];
$AIA = $_POST["AI"];
$display = $_POST["display"];
$seq = $_POST["seq"];
for($i=0 ; $i <count($_POST["acc"]) ; $i++){
    $sql = " update cool_member set cool_member_acc = '$acc[$i]',
    cool_member_nick = '$nick[$i]',
    cool_member_int = '$int[$i]',
    cool_member_AI = '$AIA[$i]',
    cool_member_display = '$display[$i]' where cool_member_seq = '$seq[$i]';" ;
    
    mysqli_query($link,$sql);
}
}

if($ifAI == 0){
    ?><script>
    alert('很抱歉 您並沒有管理員權限');    
</script><?php
}if($ifAI == 0){ header("Refresh:0;url=index.php"); }

if($ifAI == 1){ 
    $sql = "select * from cool_member ";
    $c1 =mysqli_query($link,$sql);
    $c2 = mysqli_fetch_assoc($c1);
    ?>
<form action="" method="post">
<table width="1024" border="1" align="center" cellpadding="5" cellspacing="0">
<tr>
    <td colspan="5" align="center" valign="middle"><marquee scrollAmount=10><span style="color: #F00;font-size: 36px;font-family: '微軟正黑體';">管理員:<?=$AIname?> 揪咪0.<</span></marquee></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">帳號</td>
    <td width="20%" align="center" valign="middle">暱稱</td>
    <td width="20%" align="center" valign="middle">興趣</td>
    <td width="20%" align="center" valign="middle">管理員權限</td>
    <td width="20%" align="center" valign="middle">是否存在</td>
  </tr>
  <?php do{ ?>
  <tr>
  <input type="hidden" name="seq[]" value="<?=$c2["cool_member_seq"]?>" />
    <td align="center" valign="middle"><input type="text" name="acc[]" value="<?=$c2["cool_member_acc"]?>" /></td>
    <td align="center" valign="middle"><input type="text" name="nick[]" value="<?=$c2["cool_member_nick"]?>"/></td>
    <td align="center" valign="middle"><input type="text" name="int[]" value="<?=$c2["cool_member_int"]?>" /></td>
    <td align="center" valign="middle"><input type="text" name="AI[]" value="<?=$c2["cool_member_AI"]?>"/></td>
    <td align="center" valign="middle"><input type="text" name="display[]" value="<?=$c2["cool_member_display"]?>"/></td>
  </tr>
  <?php }while($c2 = mysqli_fetch_assoc($c1) ) ?>
  <tr>
    <td colspan="5" align="center" valign="middle"><input type="submit" value="執行修改" onclick="success()" />  <input type="button" value="回首頁" onclick="javascript:location.href='index.php'"/></td>
  </tr>
</table>
</form>


<?php } 
?>
<script>
  function success()
  {
    alert("修改成功!");
  } 
  </script>