<form action ="test20180517_1.php" method="POST">
動物名稱:<input type = "text" name="AN_name" ><br>
動物食物:<input type = "text" name="AN_food" ><br>
動物數量:<input type = "text" name="AN_howmuch" ><br>
<input type = "submit" >&nbsp;&nbsp;<input type = "reset" >
</form>

<?php
include_once("head.php"); 
if(!empty($_POST["AN_name"]))  //這是偷懶做法，不然可以利用&&抓到三個的值
{
    $s1 = $_POST["AN_name"];
    $s2 = $_POST["AN_food"];
    $s3 = $_POST["AN_howmuch"];
    $sql = "insert into zoo0510 value(NULL,'$s1','$s2','$s3');";
    mysqli_query($link,$sql);
    echo ("<br>已添加資料<br>");
}
else
{echo "<br>請輸入資料<br>";}
?>