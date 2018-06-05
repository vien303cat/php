<?php
include_once("head.php");
if(!empty($_GET["seq"]))
    {
        $seq = $_GET["seq"] ;
        echo $seq."<br>" ;
        $sql = "update member0531 set member0531_see = '0' where member0531_seq = '$seq'";
        echo $sql."<br>" ;
        mysqli_query($link,$sql);
    }   
header("location:0531_photoadmin.php");
?>
