<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include_once("head.php"); 

if(!empty($_POST["name"]))
{
    $sseq  = $_POST["seq"] ;
    $sname = $_POST["name"];
    $sfood = $_POST["food_type"];
    $cnt   = $_POST["cnt"];
    
  for($i=0 ; $i< count($_POST["name"]) ; $i++)
  {
    $sql2  = " update zoo0510 set zoo0510_name = '".$sname[$i]."',
    zoo0510_food_type ='".$sfood[$i]."',
    zoo0510_cnt = '".$cnt[$i]."' 
    where zoo0510_seq = '".$sseq[$i]."';" ;
    echo $_POST["name"][$i]."-".$_POST["food_type"][$i]."-".$_POST["cnt"][$i]."<br>" ; 
    mysqli_query($link,$sql2) ;
  }

 
}

$sql = "select * from zoo0510";
$ro = mysqli_query($link,$sql);
$cc = mysqli_fetch_assoc($ro);  //轉換成陣列

?>
<form action="t1_0523.php" method="post">
<table width="1024" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>  
    <td align="center" valign="middle">動物編號</td>
    <td align="center" valign="middle">動物名稱</td>
    <td align="center" valign="middle">動物食物</td>
    <td align="center" valign="middle">動物數量</td>
    <td align="center" valign="middle">操作</td>
  </tr>

  <?php 
  do{  ?>     
  <tr>  
    <td align="center" valign="middle"><input type="hidden" name="seq[]" value="<?php echo $cc["zoo0510_seq"]; ?>"></td>
    <td align="center" valign="middle"><input type="text" name="name[]" value="<?php echo $cc["zoo0510_name"]; ?>"></td>
    <td align="center" valign="middle"><input type="text" name="food_type[]" value="<?php echo $cc["zoo0510_food_type"]; ?>"></td>
    <td align="center" valign="middle"><input type="text" name="cnt[]" value="<?php echo $cc["zoo0510_cnt"]; ?>"></td>
    <td align="center" valign="middle"><a href="test20180517_2.php?eel=<?php echo $cc['zoo_seq'];?>">刪除</a></td>
  </tr>

  <?php  }  while($cc = mysqli_fetch_assoc($ro));  ?>
  <tr>
  <td colspan="5" align="center" valign="middle"> <input type="submit" value="修改"></td>
  
  </tr>
</table>
</form>