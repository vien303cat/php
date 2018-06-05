
<?php
session_start();
$ss = strtotime("+6hour"); //strtotime 格林威治天文臺單位時間，可以在裡面作加減
$ss2 = date("Y-m-d H:i:s",$ss);     //date(宣告格式,要把哪個東西抓進來變) 
$link = mysqli_connect("localhost","root","","re2018"); //mysqli_connect("localhost","帳號","密碼","資料庫名稱")
mysqli_query($link , "SET NAMES UTF8"); //設定編碼
$today_open = date("Y-m-d",$ss)." 00:00:00"; //老師:正確時間判斷法(今天開始時間) 
$today_close =date("Y-m-d",$ss)." 23:59:59"; //老師:正確時間判斷法(今天結束時間)
$today_open_str = strtotime("$today_open"); 
$today_close_str = strtotime("$today_close");
/*
$ss98 = strtotime("-8hour");        //今天00:00的時間 格林威治
$ss99 = strtotime("+16hour");       //明天00:00的時間 格林威治
$ss101 = date("Y-m-d H:i:s",$ss98); //今天00:00的時間
$ss100 = date("Y-m-d H:i:s",$ss99); //明天00:00的時間
*/

?>