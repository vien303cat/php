<?php
$link = mysqli_connect("localhost","root","","myphp_2018_07") ;
mysqli_query($link,"SET NAMES UTF8");

if(!empty($_POST["ss"])){
    $seq = $_POST["ss"] ;
    $sql = " update data0703 set data0703_display = '0' where data0703_seq = '$seq' ;"; 
    mysqli_query($link,$sql);
}
?>