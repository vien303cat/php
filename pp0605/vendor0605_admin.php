<?php
include_once("head.php");

$cal = "select * from vendor0605";
$c1  = mysqli_query($link,$cal);
$c2  = mysqli_fetch_assoc($c1);

?>

<form method="GOT" action="">
<table width="800" border="2" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="30%" align="center" valign="middle">廠商名稱</td>
    <td width="45%" align="center" valign="middle">廠商敘述</td>
    <td width="25%" align="center" valign="middle">操作</td>
  </tr>
  <?php do { ?>
  <?php if($c2["vendor0605_see"]==1){ ?>
  <tr>
    <td width="30%" align="center" valign="middle"><?=$c2["vendor0605_name"]?></td>
    <td width="45%" align="center" valign="middle"><?=$c2["vendor0605_con"]?></td>
    <td width="25%" align="center" valign="middle">
    <a href="vendor0605_update.php?seq=<?=$c2["vendor0605_seq"]?>">修改</a>
    <a href="vendor0605_delete.php?seq=<?=$c2["vendor0605_seq"]?>">刪除</a>
    </td>
  </tr>
  <?php } ?>
  <?php }while($c2 = mysqli_fetch_assoc($c1) ) ; ?>
  <tr>
    <td colspan="3" align="center" valign="middle">
    <a href="vendor0605_add.php">新增</a><br>
    <a href="admin0605_list.php">觀看商品</a>
    </td>
  </tr>
</table>