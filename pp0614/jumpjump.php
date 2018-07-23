<?php
session_start();
$x = rand(0,100);
$y = rand(0,100);
if(empty($_SESSION["time"]))
{
    $_SESSION["time"] =20 ;
}
if(!empty($_POST["cost"]))
{
    $_SESSION["time"] -=1 ;
    if($_SESSION["time"] == 0 )
    {
        echo("恭喜完成，五秒後跳至登入頁面^_^");
        header("Refresh:5;url=0614login.php");
        exit();
    }
}
header("Refresh:0.5");
?>

<style>
body {
	background-image: url(img/BG2.png);
	background-repeat: repeat;
}
#button{
    background-color: transparent;
    border-style: none; 
    background-image:url(img/a04.png);
    width: 200px; 
    height: 200px;
    background-size:100% 100%;
    position: relative;
    top:<?=$x?>%;
    left: <?=$y?>%;
}
</style>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle">與敲口i露米亞一起玩遊戲
    <br>要點擊<?=$_SESSION["time"]?>次露米亞才能回去登入頁面哦:3</td>
  </tr>
</table>
<form action="" method="POST">
    <input type="hidden" name="cost" value="1"/>
    <input type="submit" id="button" value="" onclick=""/>
   
</form>
<script>

</script>