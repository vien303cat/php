<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>include練習</title>
  </head>
  <body>


    <form action="a20180510_1.php?ww=1" method="POST"> 
     <input type="submit" value =第一名 style="width:200px;height:50px"><br><br>
    </form> 
    <form action="a20180510_1.php?ww=2" method="POST"> 
     <input type="submit" value =第二名 style="width:200px;height:50px"><br><br>
    </form> 
    <form action="a20180510_1.php?ww=3" method="POST"> 
     <input type="submit" value =第三名 style="width:200px;height:50px"><br><br>
    </form> 
    <form action="a20180510_1.php?ww=4" method="POST"> 
     <input type="submit" value =第四名 style="width:200px;height:50px"><br><br>
    </form> 
 
<!--以下5~7名為第二種方法-->    

    <form action="a20180510_1.php" method="POST">
    <input type="submit" value =第五名 name="oo" style="width:200px;height:50px">
    <input type="submit" value =第六名 name="oo" style="width:200px;height:50px">
    <input type="submit" value =第七名 name="oo" style="width:200px;height:50px"><br><br>
    </form> 
<?php



if(!empty($_GET["ww"]))
{
    if($_GET["ww"]=="1")
    {
        include("a20180510_1_1.php");
    }
    elseif($_GET["ww"]=="2")
    {   
        include("a20180510_1_2.php");
    }
    elseif($_GET["ww"]=="3")
    {   
        include("a20180510_1_3.php");
    }
    elseif($_GET["ww"]=="4")
    {   
        include("a20180510_1_4.php");
    }
}

//////////第二種方法///////////

if(!empty($_POST["oo"]))
{
    if($_POST["oo"]=="第五名")
    {
        $hi = "a20180510_1_5.php";
    }
    elseif($_POST["oo"]=="第六名")
    {
        $hi = "a20180510_1_6.php";
    }
    elseif($_POST["oo"]=="第七名")
    {
        $hi = "a20180510_1_7.php";
    }
    include ("$hi");
}

///////////////////////////////


?>

  </body>
</html>      
