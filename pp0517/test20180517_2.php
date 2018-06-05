<form action ="test20180517_2.php?" method="GET">
請選擇要刪除的動物編號:<input type = "text" name="AN_sql" ><br>
<input type = "submit" >&nbsp;&nbsp;<input type = "reset" >
</form>

<?php
include_once("head.php"); 
if(!empty($_GET["AN_sql"])) 
{

    $del = $_GET["AN_sql"] ;
    $sql = "delete from zoo0510 where zoo0510_seq = $del ; " ; //刪除指令

    /*

    // 老師作法:引用SQL指令叫出輸入的資料，再判斷列數是否存在
    $check = "select * from zoo0510 where zoo0510_seq = '$del'" ;
    $ro = mysqli_query($link,$check); //引用SQL指令$check
    $totle = mysqli_num_rows($ro);    //判斷列數
    if($totle > 0) 
    {
        echo ("<br>第".$del."筆資料已刪除<br>"); 
        mysqli_query($link, $sql);
    } 
    else {echo "此筆資料不存在<br>";} 

    */

    

    //翔翔作法:直接判斷影響列數
    //放在if裡面也會被執行， mysqli_affected_rows($link)=>影響到的列數 若大於0則執行
    
    if(mysqli_query($link, $sql) && mysqli_affected_rows($link) > 0) 
    {
        echo ("<br>第".$del."筆資料已刪除<br>");  
    } 
    else {echo "此筆翔翔不存在<br>";}

     

}
else{echo "<br>請輸入資料<br>";}
?>