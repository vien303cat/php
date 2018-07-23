<style>
    body {
	background-color: rgba(250, 184, 250, 0.801);
	background-repeat: repeat;
}

</style>

  <embed src="bgm/bgm.mp3" volume="30" width="0" height="0"></embed>

<?php
session_start();
$ip = $_SERVER["REMOTE_ADDR"];  //查詢IP
$time = strtotime("+6hour"); //strtotime 格林威治天文臺單位時間，可以在裡面作加減
$real_time = date("Y-m-d H:i:s",$time);     //date(宣告格式,要把哪個東西抓進來變) 
$link = mysqli_connect("localhost","root","","imgshare"); //mysqli_connect("localhost","帳號","密碼","資料庫名稱")
mysqli_query($link , "SET NAMES UTF8"); //設定編碼
$today_open = date("Y-m-d",$time)." 00:00:00"; //老師:正確時間判斷法(今天開始時間) 
$today_close =date("Y-m-d",$time)." 23:59:59"; //老師:正確時間判斷法(今天結束時間)
$today_open_str = strtotime("$today_open"); 
$today_close_str = strtotime("$today_close");

if(!empty($_SESSION["user"])){
    $user = $_SESSION["user"] ;
    $sql ="select * from imgshare_member where imgshare_member_acc = '$user' and imgshare_member_display = '0' ";
    $acc_lock = mysqli_query($link,$sql);
    $acc_alredylock = mysqli_num_rows($acc_lock) ;
    if($acc_alredylock == 1){
        ?>
     <script> alert("本帳號目前已被封鎖，請準備500$ 聯絡管理員以解鎖"); </script> 
     <?php 
    
     $_SESSION["user"] = "";

    } 
    if($acc_alredylock == 1){ header("Refresh:0;url=imgshare_login.php");exit; }
    
}

?>
