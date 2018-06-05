<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>媽媽我在這</title>
  </head>
  <body>
    <form action="test0508.php?"> <!-- form action="傳送資料到名稱" method="表單格式"<br><br> --> 
     <input type="hidden" name = "oo" value="1"><!--利用隱藏欄位來傳值(可以隱藏URL)-->
     <input type="hidden" name = "xx" value="5">
     <input type="submit" value=oo=1&xx=5 style="weight:100px;height:50px"><br><br>
    </form> 
ㄐ
    <form action="test0508.php?oo=7&xx=7" method="POST"><!--利用method="POST"來傳值-->
     <input type="submit" value=oo=7&xx=7 style="weight:100px;height:50px"><br><br>
    </form> 

    <form action="test0508.php?oo=7&xx=3" method="POST"> 
     <input type="submit" value=oo=7&xx=3 style="weight:100px;height:50px"><br><br>
    </form> 
  </body>
</html>          
