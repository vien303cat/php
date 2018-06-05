
<?php
session_start();
$ss = strtotime("+6hour"); //strtotime 格林威治天文臺單位時間，可以在裡面作加減
$ss2 = date("Y-m-d H:i:s",$ss);     //date(宣告格式,要把哪個東西抓進來變) 

$link = mysqli_connect("localhost","root","","re2018"); //mysqli_connect("localhost","帳號","密碼","資料庫名稱")
mysqli_query($link , "SET NAMES UTF8"); //設定編碼
?>