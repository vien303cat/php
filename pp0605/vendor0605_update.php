<?php
include_once("head.php");
$seq = $_GET["seq"];
$cal = "select * from vendor0605 where vendor0605_seq ='$seq'";
$c1  = mysqli_query($link,$cal);
$c2  = mysqli_fetch_assoc($c1);
if(!empty($_POST["name"]) )
{
$name = $_POST["name"];
$con = $_POST["con"];
$sql = "update vendor0605 set vendor0605_name='$name',vendor0605_con='$con' where vendor0605_seq ='$seq'" ;
echo $sql ;
mysqli_query($link,$sql);
header("location:vendor0605_admin.php");
}
?>

<form method="POST" action="">
修改頁面<br><br>

廠商名稱:<input type="text" name="name"    value="<?=$c2["vendor0605_name"]?>"> <br>
廠商敘述:<input type="textarea" name="con" value="<?=$c2["vendor0605_con"]?>" > <br>
<input type="submit" value="修改" /><br>

</form>

