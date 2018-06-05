<?php
include_once("head.php");
if(!empty($_POST['zoo_name'])){
  for($i=0;$i < count($_POST['zoo_name']);$i++){
    echo $_POST['zoo_name'][$i]."-".$_POST['zoo_food_type'][$i]."-".$_POST['zoo_cnt'][$i]."-".$_POST['zoo_seq'][$i]."<br>";
  }
}

$sql = "select * from zoo";
$ro = mysqli_query($link,$sql);
$cc = mysqli_fetch_assoc($ro);

?>
<form action = "" method="post">
<table width="1024" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="22" align="center" valign="middle">動物名稱</td>
    <td align="center" valign="middle">動物食物</td>
    <td align="center" valign="middle">動物數量</td>
    <td align="center" valign="middle">動物編號</td>
    <td align="center" valign="middle">操作</td>
  </tr>

<?php do{?>

  <tr>
    <td align="center" valign="middle"><input type="text" name="zoo_name[]" value="<?php echo $cc['zoo_name'];?>"></td>
    <td align="center" valign="middle"><input type="text" name="zoo_food_type[]" value="<?=$cc['zoo_food_type'];?>"></td>
    <td align="center" valign="middle"><input type="text" name="zoo_cnt[]" value="<?=$cc['zoo_cnt'];?>"></td>
    <td align="center" valign="middle"><input type="text" name="zoo_seq[]" value="<?=$cc['zoo_seq'];?>"></td>
    <td align="center" valign="middle">
      <a href="test20180517_2.php?eel=<?php echo $cc['zoo_seq'];?>">刪除</a>　
    </td>
  </tr>

<?php }while($cc = mysqli_fetch_assoc($ro));?>

  <tr>
    <td colspan="5" align="center" valign="middle"><input type="submit" value="修改"></td>
  </tr>
</table>
</form>