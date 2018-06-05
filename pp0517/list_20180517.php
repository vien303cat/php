<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include_once("head.php"); 
if(isset($_POST["seq"]))
{   
    $sseq  = $_POST["seq"] ;
    $sname = $_POST["name"];
    $sfood = $_POST["food_type"];
    $cnt   = $_POST["cnt"];

    $sql2 = "update zoo0510 set zoo0510_name = '$sname',zoo0510_food_type ='$sfood',zoo0510_cnt = '$cnt' where zoo0510_seq = $sseq ; ";
    mysqli_query($link,$sql2);
}


$sql = "select * from zoo0510";
$ro = mysqli_query($link,$sql);
$cc = mysqli_fetch_assoc($ro);  //轉換成陣列

?>

<table width="1024" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle">動物編號</td>
    <td align="center" valign="middle">動物名稱</td>
    <td align="center" valign="middle">動物食物</td>
    <td align="center" valign="middle">動物數量</td>
    <td align="center" valign="middle">操作</td>
  </tr>

<!--可以利用PHP中間包著HTML來製作-->
  <?php do{  ?>     
<form action="list_20180517.php" method="post">
  <tr>  
    <td align="center" valign="middle"><input type="text" name="seq" value="<?php echo $cc["zoo0510_seq"]; ?>"></td>
    <td align="center" valign="middle"><input type="text" name="name" value="<?php echo $cc["zoo0510_name"]; ?>"></td>
    <td align="center" valign="middle"><input type="text" name="food_type" value="<?php echo $cc["zoo0510_food_type"]; ?>"></td>
    <td align="center" valign="middle"><input type="text" name="cnt" value="<?php echo $cc["zoo0510_cnt"]; ?>"></td>
    <td align="center" valign="middle"> <input type="submit" value="修改"></td>
  
  </tr>
  </form>
  <?php  }  while($cc = mysqli_fetch_assoc($ro));  ?>
  <tr>
  
  </tr>
</table>