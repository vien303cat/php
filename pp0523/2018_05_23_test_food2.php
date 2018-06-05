<?php
include_once("head.php");
if(!empty($_POST["n1"]))
{    
    $sql2 = "insert into myfood0523 value( NULL , '".$_POST["who"]."' , '".$_POST["n1"]. "','".$_POST["a1"]."','".$ss2."')" ; 
    mysqli_query($link,$sql2);
}
?>
<form action="2018_05_23_test_food2.php" method="post">
    午餐要假洨?<br>
    <table width="800" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center" valign="middle">餐點</td>
    <td align="center" valign="middle"> <input name="a1" type="radio" value="野菜湯" />野菜湯</td>
    <td align="center" valign="middle"><input name="a1" type="radio" value="安格斯牛排" />安格斯牛排</td>
    <td align="center" valign="middle"><input name="a1" type="radio" value="香酥炸雞漢堡" />香酥炸雞漢堡</td>
    <td align="center" valign="middle"> <input name="a1" type="radio" value="黑糖Q彈珍珠奶茶" />黑糖Q彈珍珠奶茶</td>
  </tr>
  <tr>
    <td width="10%" align="center" valign="middle">用餐方法</td>
    <td align="center" valign="middle"> 外帶<input name="n1" type="radio"    value="外帶" /></td>
    <td align="center" valign="middle">內用<input name="n1" type="radio"    value="內用" /></td>
    <td align="center" valign="middle">斷<input name="n1" type="radio"    value="斷" /></td>
    <td align="center" valign="middle">&nbsp;</td>
  </tr>
</table>
    <br>請輸入座號<input name="who" type="text" value=""/><br>
    <br>
    <input type="submit" value="送出" />
<br><br>
今日訂餐:<br><br>
<?php

$sql = "select * from myfood0523";
$ro = mysqli_query($link,$sql);
$cc = mysqli_fetch_assoc($ro);
do{
    $ti = $cc["myfood0523_time"];
    if(strtotime("$ti") >=  $today_open_str && strtotime("$ti") <= $today_close_str)
    {
    echo $cc["myfood0523_namber"]."號同學訂了".$cc["myfood0523_food"]." |用餐方式: ".$cc["myfood0523_howeat"]."|時間:".$cc["myfood0523_time"]."<br>";
    }
} while($cc = mysqli_fetch_assoc($ro) )

?>
</form>