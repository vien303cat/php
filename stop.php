<?php

header("Refresh:3");         // 每三秒重置一次網頁
echo "目前國外時間為".date("H:i:s")."<br>";
$ss  = strtotime("+6hour"); 
$ss2 = date("Y-m-d H:i:s",$ss);
echo "轉換為台灣時間:".$ss2."<br>";



$stop_time_start = strtotime("2018-05-10 13:30:10");
$stop_time_end   = strtotime("2018-05-10 14:00:00");
$R = 0 ;                    //用來判斷現在狀態的變數起始值是0
if(($ss >= $stop_time_start) && ($ss < $stop_time_end))
{
    $R = 1 ;
}
if($R == 1 )
{
    header("location:stop_no.php");
    exit();
}
?>