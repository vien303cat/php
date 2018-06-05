<?php
include_once("head.php");
$sql = "select * from zoo0510";
$ro = mysqli_query($link,$sql);
$cc = mysqli_fetch_assoc($ro);  //轉換成陣列

/*
do
{
    echo $cc["zoo0510_name"]."<br>";
}   while($cc = mysqli_fetch_assoc($ro));
*/

?>

<table width="1024" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle">動物編號</td>
    <td align="center" valign="middle">動物名稱</td>
    <td align="center" valign="middle">動物食物</td>
    <td align="center" valign="middle">動物數量</td>
    <td align="center" valign="middle">操作</td>
  </tr>

  <?php do{  ?>     <!--可以利用PHP中間包著HTML來製作-->
<form method="post">
  <tr>  
    <td align="center" valign="middle"><input type="text" name="seq" value="<?php echo $cc["zoo0510_seq"]; ?>"></td>
    <td align="center" valign="middle"><input type="text" name="name" value="<?php echo $cc["zoo0510_name"]; ?>"></td>
    <td align="center" valign="middle"><input type="text" name="food_type" value="<?php echo $cc["zoo0510_food_type"]; ?>"></td>
    <td align="center" valign="middle"><input type="text" name="cnt" value="<?php echo $cc["zoo0510_cnt"]; ?>"></td>
    <td align="center" valign="middle">
        <a href="test20180517_2.php?AN_sql=<?php echo $cc['zoo0510_seq']?>"> 刪除</a> <input type="submit" value="修改">
    </td>
  </tr>
  <?php  }  while($cc = mysqli_fetch_assoc($ro));  ?>
  </form>
</table>