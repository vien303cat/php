<?php
include_once("head.php");

if(!empty($_POST["n1"]))
{
    echo $_POST["who"]."號同學訂了".$_POST["a1"]."  用餐方式: ".$_POST["n1"];
    $sql = "insert into myfood0523 value( NULL , '".$_POST["who"]."' , '".$_POST["n1"]. "','".$_POST["a1"]."','".$ss2."')" ; 
    mysqli_query($link,$sql);
}

?>

<form action="2018_05_23_test_food.php" method="post">
    午餐要假洨?<br>
    <input name="a1" type="radio" value="野菜湯" />野菜湯<br><br>
    <input name="a1" type="radio" value="安格斯牛排" />安格斯牛排<br><br>
    <input name="a1" type="radio" value="香酥炸雞漢堡" />香酥炸雞漢堡<br><br>
    <input name="a1" type="radio" value="黑糖Q彈珍珠奶茶" />黑糖Q彈珍珠奶茶<br> <!--checkbox可以重複選取-->
    -----------------------------------<br>
    外帶還是內用?<br>
    外帶<input name="n1" type="radio"    value="外帶" /><br>  <!--radio在同一個name裡面只能選一個-->
    內用<input name="n1" type="radio"    value="內用" /><br>
    斷<input name="n1" type="radio"    value="斷" /><br>
    請輸入座號<input name="who" type="text" value=""/><br>
    <br>
    <input type="submit" value="送啦" />
</form>
