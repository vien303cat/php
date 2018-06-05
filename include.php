<?php

include("test/classtest.php");  //include("路徑") 可以呼叫另一個檔案的語法出來
include("test/classtest.php"); //路徑為此檔案(include.php)的相對路徑

$x = "test/classtest.php" ;
include($x);                   //也可以利用變數插入

include_once("firsttest.php"); //include_once 同一個檔案不會重複INCLUDE
include_once("firsttest.php"); 
include_once("firsttest.php");


?>