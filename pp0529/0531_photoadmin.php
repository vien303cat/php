<?php
include_once("head.php");


if(!empty($_SESSION["user_account"]))
{
    echo "歡淫光臨，".$_SESSION["user_account"]."<br><br><br>" ; 
}
$cal = "select * from member0531";
$c1  = mysqli_query($link,$cal);
$c2  = mysqli_fetch_assoc($c1);

?>

<form method="GET" action="0531_photocontent.php">
<table width="1024" border="2" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="15%" align="center" valign="middle">帳號</td>
    <td width="15%" align="center" valign="middle">標題</td>
    <td width="20%" align="center" valign="middle">內文</td>
    <td width="20%" align="center" valign="middle">圖片</td>
    <td width="15%" align="center" valign="middle">時間</td>
    <td width="15%" align="center" valign="middle">動作</td>
  </tr>

  <?php do{ ?>
    <?php if ($c2["member0531_see"] == 1) { ?> 
    <tr>
    <td width="15%" align="center" valign="middle"><?php echo $c2["member0531_account"] ; ?></td>
    <td width="15%" align="center" valign="middle"><?php echo $c2["member0531_title"] ; ?></td>
    <td width="20%" align="center" valign="middle"><?php echo $c2["member0531_content"] ; ?></td>
    <td width="20%" align="center" valign="middle"><img src="imagee/<?php echo $c2["member0531_photo"];?>" width="100"> </td>
    <td width="15%" align="center" valign="middle"><?php echo $c2["member0531_time"] ; ?></td>
    <td width="15%" align="center" valign="middle"><a href="0531_photocontent.php?seq=<?=$c2["member0531_seq"]?>">修改</a>
    <a href="0531_photodelet.php?seq=<?=$c2["member0531_seq"]?>">刪除</a>


    </td>
    </tr>
    <?php } ?>
    <?php }while($c2 = mysqli_fetch_assoc($c1) ) ?> 
    <td colspan="6" align="center" valign="middle"><a href="0531_photoinput.php">新增</a></td>
  </table>
  </form>