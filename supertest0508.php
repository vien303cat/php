<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>我想要一個隨機密碼</title>
  </head>
  <body>
  <br>
  <form action = "supertest0508.php" method="POST" >
    想要產生幾位數的密碼:
    <input type = "text" name="rrr" ><br>
    <input type = "submit" >
</form>
  </body>
</html>          
<?php

//POST : 看不到URL  GET : 看的到URL 
//$_REQUEST : 可以用來呼叫值，表單格式是GET或是POST都能呼叫(方便喔:3)


if(!empty($_POST["rrr"]))  //所以用$_REQUEST也可以!
{

$password = ""; //用一個變數可以儲存值 如果要直接echo chr($word) 也可以但是就不能儲存
echo "<br><br>新的亂數密碼為:" ;
for($i=0;$i<$_POST["rrr"];$i++)
 {
    $j = rand(1,3) ;   //這樣的話機率其實不平均 
    if($j == 1)        //因為數字跟大小寫英文的機率不應該是一樣的數字應該要在低一點
    {                  //或是把$j的範圍分成適當比例來區分大小英文、數字(4.4.2) 
    $word = rand(48,57) ;
    $password = $password.chr($word);
    }
    elseif($j == 2)
    {   
    $word = rand(65,90) ;
    $password = $password.chr($word);
    }
    elseif($j == 3)
    {   
    $word = rand(97,122) ;
    $password = $password.chr($word);
    }
 }

 echo $password ;
 
 /*   //以下是老師的方法機率是最平均的，把所有的數拿來隨機
 for($i=0;$i<$_POST["rrr"];$i++)
 {
     $j = rand(0,61);
    if(($j >=10) && ($j <=35))
    {
        $c1 = chr($c1+55);
    }
    elseif($c1 >=36)
    {
        $c1 = chr($c1+61);
    }
    $password = $password.$c1;
 }
    echo $password; 
*/

}

?>