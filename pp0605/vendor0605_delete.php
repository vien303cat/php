<?php
include_once("head.php");

if(!empty($_GET["seq"]) )
{
$seq = $_GET["seq"];
$sql = "update vendor0605 set vendor0605_see ='0' where vendor0605_seq = $seq" ;
echo $sql ;
mysqli_query($link,$sql);
}
header("location:vendor0605_admin.php");