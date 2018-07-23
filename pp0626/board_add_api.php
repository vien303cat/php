<?php
session_start();
$ss = strtotime("+6hour"); //strtotime 格林威治天文臺單位時間，可以在裡面作加減
$ss2 = date("Y-m-d H:i:s",$ss);
$link = mysqli_connect("localhost","root","","myphp_2018_06"); //mysqli_connect("localhost","帳號","密碼","資料庫名稱")
mysqli_query($link , "SET NAMES UTF8"); 
$id ="bz";
if(empty($_SESSION["talk_no"])){
    $tt3 = date("YmdHis",$ss);  
    $_SESSION["talk_no"] = $tt3 ;
}
if(!empty($_POST["my_talk"])){
    $sql = "insert into board_log value (null ,'".$id."','".$_POST["my_talk"]."','".$_SESSION["talk_no"]."','".$ss2."','127.0.0.1')";
    mysqli_query($link,$sql);
}

?>