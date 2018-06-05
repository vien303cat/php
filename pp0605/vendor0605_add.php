<?php
include_once("head.php");

if(!empty($_POST["name"]) )
{
$name = $_POST["name"];
$content = $_POST["content"];
$sql = "insert into vendor0605 value(NULL,'$name','$content','1')" ;
echo $sql ;
mysqli_query($link,$sql);
header("location:vendor0605_admin.php");
}
?>

<form method="post" action="">
新增頁面<br><br>

廠商名稱:<input type="text" name="name" /> <br>
廠商敘述:<textarea name="content" cols="45" rows="3"></textarea><br>
<input type="submit" value="送出" /><br>

</form>