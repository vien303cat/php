<?php

$ALLtimemachane = date("Y-m-d H:i:s"); //時間格式 可以上網查PHP date函式
$timemachane = date("Y-m-d-H-i-s"); //若要使用時間變數改檔名不能有特殊符號(24行)
echo $ALLtimemachane."<br>";

if(isset($_FILES["rrr"])) // 如果 name=rrr 有上傳檔案了  $_FILES為系統字元
{
    echo $_FILES["rrr"]["name"]."<br>"; //echo name=rrr的檔名
    echo $_FILES["rrr"]["tmp_name"]."<br>"; //echo name=rrr的檔案路徑
    echo $_FILES["rrr"]["size"]."<br>"; //echo name=rrr的檔案大小 不能上傳超過2MB
    echo $_FILES["rrr"]["type"]."<br>"; //echo name=rrr的檔案類型
    echo " 上傳成功！ " ;
    //copy( 來源 , 目標(以該檔案的位置的相對路徑，且不能有中文) );
    // "/"  >  根目錄      "../資料夾" > 上一層
    //copy( $_FILES["rrr"]["tmp_name"] , "../aaa2018/".$_FILES["rrr"]["name"]."copy");
   

    $error = "請選擇JPEG格式或是PNG格式的圖檔上傳" ;
    if($_FILES["rrr"]["type"] == "image/jpeg"){$timemachane = $timemachane.".jpg" ;$error ='0';}
    if($_FILES["rrr"]["type"] == "image/png"){$timemachane = $timemachane.".png";$error ='0';}
    if($error == '0')
    {
        copy($_FILES["rrr"]["tmp_name"] , "./aaa2018/".$timemachane );   
    }
    else
    {
        echo $error;
    }
}

?>

<form action = "change.php" method="POST" enctype="multipart/form-data">
 <!-- enctype="multipart/form-data"為上傳類型(要背) -->
    <input type="file" name="rrr"><br>
    <input type="submit" value="上傳">
</form>

----------------------------------------------------------

<form action = "change.php" method="POST" >
    <input type = "text" name="rrr" ><br>
    <input type="file" name="rrr"><br>
    <input type = "submit"  value"一般送出">
</form>