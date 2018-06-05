<?php
include_once("head_admin.php");
if($lv1 != 1)
{
    header("location:admin.php");
    exit();
}
$cal = "select * from member0523";
$c1  = mysqli_query($link,$cal);
$c2  = mysqli_fetch_assoc($c1);
$yn[0] = "關閉" ;
$yn[1] = "<spen style='color:#FF0000;'>開啟</spen>" ;
?>

<table width="800" border="2" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">帳號</td>
    <td align="center">部門</td>
    <td align="center">帳號控制</td>
    <td align="center">最新消息控制</td>
    <td align="center">圖片控制</td>
    <td align="center">停權控制</td>
    <td align="center">時間控制</td>
    <td align="center">關閉帳號</td>
  </tr>
  
  <?php do{ ?>
  <tr>
    <td align="center"><?php echo $c2["member0523_account"] ; ?></td>
    <td align="center"><?php echo $c2["member0523_work"];  ?></td>
    <td align="center"><a href="acc_api.php?now=<?=$c2["member0523_a_1"];?>&level=1&who=<?=$c2["member0523_seq"]?>">
    <?php echo $yn[$c2["member0523_a_1"]];?>
    </a>
    </td>
    <td align="center"><a href="acc_api.php?now=<?=$c2["member0523_a_2"];?>&level=2&who=<?=$c2["member0523_seq"]?>">
    <?php echo $yn[$c2["member0523_a_2"]];?>
    </a></td>
    <td align="center"><a href="acc_api.php?now=<?=$c2["member0523_a_3"];?>&level=3&who=<?=$c2["member0523_seq"]?>">
    <?php echo $yn[$c2["member0523_a_3"]];?>
    </a></td>
    <td align="center"><a href="acc_api.php?now=<?=$c2["member0523_a_4"];?>&level=4&who=<?=$c2["member0523_seq"]?>">
    <?php echo $yn[$c2["member0523_a_4"]];?>
    </a></td>
    <td align="center"><a href="acc_api.php?now=<?=$c2["member0523_a_5"];?>&level=5&who=<?=$c2["member0523_seq"]?>">
    <?php echo $yn[$c2["member0523_a_5"]];?>
    </a></td>
    <td align="center">&nbsp;</td>
  </tr>
  <?php }while($c2 = mysqli_fetch_assoc($c1) ) ?>
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
</table>