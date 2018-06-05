<?php

echo date("Y-m-d H:i:s")."<br>"; // XXXX-xx-xx oo:oo:Oo 同時也是資料庫的時間格式

$ss = strtotime("+6hour"); //strtotime 格林威治天文臺單位時間，可以在裡面作加減
echo $ss."<br>" ;   
                //可以裡用date()把strtotime抓進來轉換成正常時間
$ss2 = date("Y-m-d H:i:s",$ss);     //date(宣告格式,要把哪個東西抓進來變) 
$ss99 = strtotime("+1day");
$ss100 = date("Y-m-d H:i:s",$ss99);
echo strtotime("$ss2")."<br>";
echo $ss2."<br>";
echo $ss99."<br>";
echo $ss100."<br>";
?>