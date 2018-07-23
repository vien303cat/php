<style>
    body {
	background-image: url(img/BG3.png);
	background-repeat: repeat;
}
</style>

  <embed src="bgm/bgm.mp3" volume="30" width="0" height="0"></embed>

<?php
session_start();
$ip = $_SERVER["REMOTE_ADDR"];  //查詢IP
$time = strtotime("+6hour"); //strtotime 格林威治天文臺單位時間，可以在裡面作加減
$real_time = date("Y-m-d H:i:s",$time);     //date(宣告格式,要把哪個東西抓進來變) 
$link = mysqli_connect("localhost","root","","justbefun"); //mysqli_connect("localhost","帳號","密碼","資料庫名稱")
mysqli_query($link , "SET NAMES UTF8"); //設定編碼
$today_open = date("Y-m-d",$time)." 00:00:00"; //老師:正確時間判斷法(今天開始時間) 
$today_close =date("Y-m-d",$time)." 23:59:59"; //老師:正確時間判斷法(今天結束時間)
$today_open_str = strtotime("$today_open"); 
$today_close_str = strtotime("$today_close");

?>



