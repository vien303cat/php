<?php

include_once("head.php");  //將head.php帶入 使程式碼更整齊、乾淨
/*
$zoo_animale = "月光閃亮亮復仇鬼" ;
$zoo_food = "美味蟹堡" ;
$zoo_howmuch = "500" ; 
$sql = "insert into zoo0510 value(NULL,'$zoo_animale','$zoo_food','$zoo_howmuch');";
//利用變數來新增  
*/
//$sql = "insert into zoo0510 value(NULL,'苗疆殺人蛙','人','3');";
mysqli_query($link,$sql);

?>