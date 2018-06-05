&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp你想要多少錢呢? <br><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="0426test.php?xxx=100">一百萬</a><br><br> 
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="0426test.php?xxx=50">五十萬</a><br><br>  
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="0426test.php?xxx=101">更多的錢</a><br><br>


<?php
/*
html a標籤 = 超連結 
用法: <a href="要去的網址"> 連結名稱 </a>
*/
/////////////////////////////////////////////////

//$_GET["xxx"] = 判斷的話會error
{0 ; 
if(empty($_GET["xxx"]))    //因為一開始URL沒有值 直接略過這個if往下
  $_GET["xxx"]=0 ;
} 
if($_GET["xxx"] ==100)
{
echo("<br>"."<br>"."<br>"."AAA 恭喜獲得一百萬"."<br>");
}
else if($_GET["xxx"]==50)
{
echo("<br>"."<br>"."<br>"."BBB 恭喜獲得五十萬"."<br>");
}
else if($_GET["xxx"]>100)
{
echo("<br>"."<br>"."<br>"."ERROR 媽蛋 你這個貪心鬼"."<br>");
}
         
?>
 


<br><br><br><br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="0426test.php?xxx=0">重選</a>     