&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 比大小囉ㄏㄏ <br><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="test0508.php?oo=1&xx=5">oo=1&xx=5</a><br><br> 
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="test0508.php?oo=2&xx=1">oo=2&xx=1</a><br><br>  
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="test0508.php?oo=6&xx=9">oo=6&xx=9</a><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="test0508.php?oo=999&xx=999">oo=999&xx=999</a><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="test0508.php?oo=8763&xx=0">oo=8763&xx=0</a><br><br>
<?php

if(empty($_GET["oo"]))
{
        echo("快點選喔拉喔拉喔拉");
}
if(!empty($_GET["oo"]))
{
        if($_GET["oo"] > $_GET["xx"])
        {
            echo("oo比較大 , oo=  ".$_GET["oo"]);
        }
        elseif($_GET["xx"] > $_GET["oo"])
        {
            echo("xx比較大 , xx=  ".$_GET["xx"]);
        }
        elseif($_GET["xx"] == $_GET["oo"])
        {
            echo("沒什麼好爭的，都一樣大，oo = xx = ".$_GET["xx"]);
        }
}


?>

<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>媽媽我還在這</title>
</head>
<body>
<form action="botton0508.php"> 
     <br><br>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" value=回去按鈕頁面 style="weight:500px;height:50px"><br><br>
    </form> 
</body>
</html>