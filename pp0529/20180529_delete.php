<?php
include_once("head.php");
if(!empty($_GET["seq"]))
    {
        $seq = $_GET["seq"] ;
        echo $seq."<br>" ;
        $sql = "update member0529 set member0529_see = '0' where member0529_seq = '$seq'";
        echo $sql."<br>" ;
        mysqli_query($link,$sql);
    }   
header("location:20180529_admin.php");
?>