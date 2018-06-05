<?php
include_once("head.php");
if(!empty($_GET["seq"]))
{
  $mseq = $_GET["seq"];
  $cal = "select * from member0531 where member0531_seq = '$mseq'";
  $c1  = mysqli_query($link,$cal);
  $c2  = mysqli_fetch_assoc($c1);

}
?>

<table width="1024" border="2" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><?=$c2['member0531_title']?></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><img src="imagee/<?php echo $c2["member0531_photo"];?>" ></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><?=nl2br($c2['member0531_content'])?></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><a href="0531_photoadmin.php">上一頁</a></td>
  </tr>
</table>