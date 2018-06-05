<?php
include_once("head.php");
if(empty($_SESSION["user_account"]))
{
    header("location:0523eztest_login.php");
    exit();
}
    $ooo = "select * from member0523 where member0523_account = '".$_SESSION['user_account']."'";
    $oooo = "select member0523_work from member0523 where member0523_account = '".$_SESSION['user_account']."'";
    $cc = mysqli_query($link,$ooo);
    $ccc = mysqli_query($link,$oooo);
    $oo = mysqli_fetch_assoc($cc);
    $ooo = mysqli_fetch_assoc($ccc);
    $my_work = $oo["member0523_work"];
    $wid = $oo["member0523_account"];
    $lv1 = $oo["member0523_a_1"];
    $lv2 = $oo["member0523_a_2"];
    $lv3 = $oo["member0523_a_3"];
    $lv4 = $oo["member0523_a_4"];
    $lv5 = $oo["member0523_a_5"];
    $goto = "admin_main.php";
    if(!empty($_GET["goto"]))
    {
        $goto = $_GET["goto"].".php";
        echo $goto."<br>";
    }
    include_once("word.php");
    echo "".$ooo["member0523_work"]."<br>";
?>