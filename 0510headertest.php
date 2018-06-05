<?php  //題目:當11:45之後開這檔案會到雅虎 11:50之後開這檔案會跳到估狗

echo "目前國外時間為".date("H:i:s")."<br>";
$ss  = strtotime("+6hour");
$ss2 = date("H:i:s",$ss);
echo "轉換為目前時間為:".$ss2."<br>";
$ss3 = date("His",$ss);
echo "當11:45之後開這檔案會到yahoo<br>
      11:50之後開這檔案會跳到google<br>
      還沒到跳頁時間哦!<br>"   ; 
echo $ss3."<br>";

 if($ss3 >= 114500 && ss3 <115000)
 {  
   header("location:https://tw.yahoo.com/");     
 }
 if($ss3 >= 115000)
 {  
   header("location:http://www.google.com");    
 }                                                 
    
?>