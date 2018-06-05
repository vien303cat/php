<?php
include_once("head_admin.php");
if(!empty($_GET["level"]))  // empty的0即為空值 因此無法用$_GET["now"] 判斷
{ 
    echo $_GET["now"]."<br>";
    if($_GET["now"] == 0){$now = 1;}
    else{$now = 0;}
    $lv = $_GET["level"];
    $who = $_GET["who"];
    $sql = "update member0523 set member0523_a_$lv = '$now' where member0523_seq = '$who'" ;
    mysqli_query($link,$sql);    
}
 header("location:admin.php?goto=acc");
?>