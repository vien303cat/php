<?php
$link = mysqli_connect("localhost","root","","myphp_2018_07") ;
mysqli_query($link,"SET NAMES UTF8");
$seq = $_POST["oo"];    //索引鍵
$val = $_POST["vv"];    //值
$row = $_POST["xx"];    //欄位


//通常名稱跟欄位會不一樣 就要想辦法把名稱轉換成欄位
//==========================方式1=============================
/*
if($row == "a1"){$word = "data0703_con";}
if($row == "a2"){$word = "data0703_name";}
if($row == "a3"){$word = "data0703_phone";}
if($row == "a4"){$word = "data0703_where";}
*/
//===========================================================
//==========================方式2=============================
/*
$laa["a1"] = "data0703_con";
$laa["a2"] = "data0703_name";
$laa["a3"] = "data0703_phone";
$laa["a4"] = "data0703_where";
$word = $laa[$row];
*/
//===========================================================

if(!empty($_POST["vv"])){
    $sql = "update data0703 set data0703_".$row." = '".$val."' where data0703_seq = '".$seq."' ;";
    mysqli_query($link,$sql);
}

?>  