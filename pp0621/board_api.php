<?php
session_start();
$ss = strtotime("+6hour"); //strtotime 格林威治天文臺單位時間，可以在裡面作加減
$ss2 = date("Y-m-d H:i:s",$ss);
$link = mysqli_connect("localhost","root","","myphp_2018_06"); //mysqli_connect("localhost","帳號","密碼","資料庫名稱")
mysqli_query($link , "SET NAMES UTF8"); 
$id ="bz";
if(empty($_SESSION["talk_no"])){
    $tt3 = date("YmdHis",$ss);  
    $_SESSION["talk_no"] = $tt3 ;
}

$sql = "select * from board_log where board_log_no = '".$_SESSION["talk_no"]."' ";
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
do{?>

    <?=$c2["board_log_name"]?>說了:<?=$c2["board_log_cont"]?>   時間:<?=$c2["board_log_time"]?><br>

<?php }while($c2 = mysqli_fetch_assoc($c1));


?>

