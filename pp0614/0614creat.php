<?php
$link = mysqli_connect("localhost","root","","myphp_2018_06");
mysqli_query($link,'SET NAMES UTF8');
if(!empty($_POST["ac"]))
{


    $ac = $_POST["ac"];
    $pw = md5($_POST["pw"]);
    $nam = $_POST["nam"];
    $phone = $_POST["phone"];
    $loc = $_POST["loc"];
    $sql = "insert into account0614 value(null,'".$ac."','".$pw."','".$nam."','".$phone."','".$loc."','1');";
    echo $sql ;
    mysqli_query($link,$sql);
   
}
header("location:0614first.php");
?>
