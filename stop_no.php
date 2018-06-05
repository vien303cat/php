<?php

header("Refresh:3"); // 每三秒烛置一次網頁
$ss  = strtotime("+6hour"); 
$ss2 = date("Y-m-d H:i:s",$ss);


$stop_time_start = strtotime("2018-05-10 13:30:10");
$stop_time_end   = strtotime("2018-05-10 14:00:00");    
$R = 1 ;   //用來判斷現在狀態的變數起始值是0
if(($ss < $stop_time_start) || ($ss > $stop_time_end))
{
    $R = 0 ;
}
if($R == 0 )
{
    header("location:stop.php");
    exit();
}
?>

正在維護中 請稍候