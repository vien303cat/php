<?php

$link = mysqli_connect("localhost","root","","re2018"); //mysqli_connect("localhost","帳號","密碼","資料庫名稱")
mysqli_query($link , "SET NAMES UTF8");   //設定編碼

$data = "SELECT * FROM zoo0510 ";    //把SQL語法設定成變數(等於放到下面的裡面)

//以下的練習除了使用判斷式以外也能利用SQL的語法先來篩選
// $data = " SELECT * FROM zoo0510 where zoo0510_food_type != "人" " ;  

$ro   = mysqli_query($link,$data);   //用變數ro紀錄執行SQL語法

//如果是新增、修改、刪除的話 只需要mysqli_query($link,$data);就可以了

$row  = mysqli_fetch_assoc($ro);     //把執行的結果轉成陣列 
$cnt  = mysqli_num_rows($ro);        //計算執行結果的數量
//以上插入SQL的語法為了方便所以把指令都設成變數

do  //練習:要找到不吃人的動物
{
    if($row["zoo0510_food_type"] != "人")
    {
        echo $row["zoo0510_name"]."喜歡吃:".$row["zoo0510_food_type"]."  數量有".$row["zoo0510_cnt"]."隻"."<br>";
    }
}while($row  = mysqli_fetch_assoc($ro));

$row  = mysqli_fetch_assoc($ro);     //把執行的結果轉成陣列

// echo $cnt;

?>
