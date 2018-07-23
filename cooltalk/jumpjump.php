
<?php
$link = mysqli_connect("localhost","root","","justbefun"); //mysqli_connect("localhost","帳號","密碼","資料庫名稱")
mysqli_query($link , "SET NAMES UTF8");
$ip = $_SERVER["REMOTE_ADDR"];
$sql="update cool_lock set cool_lock_specal = '1' where cool_lock_ip ='$ip' order by cool_lock_time desc limit 1 ;";
session_start();
$x = rand(0,400);
$y = rand(0,1180);
if(empty($_SESSION["time"]))
{
    $_SESSION["time"] =30 ;
}
if(!empty($_POST["cost"]))
{
    $_SESSION["time"] -=1 ;
    if($_SESSION["time"] == 0 )
    {   
        mysqli_query($link,$sql);
        echo("恭喜完成，五秒後跳至登入頁面^_^");
        header("Refresh:5;url=coollogin.php");

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
    background-color:transparent; 
    border-style: none; 
    background-image:url(img/a04.png);
    width: 200px; 
    height: 200px;
    background-size:100% 100%;
    position: relative;
    top:<?=$x?>px;
    left: <?=$y?>px;
}
</style>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle">與敲口i露米亞一起玩遊戲^O^/
    <br>要點擊<?=$_SESSION["time"]?>次露米亞才能回去登入頁面哦<br>忘了講一但進來沒玩完不能出去哦^O^/</td>
  </tr>
</table>
<form action="" method="POST">
    <input type="hidden" name="cost" value="1"/>
    <input type="submit" id="button" value="" onclick=""/>
   
</form>
<script>

</script>