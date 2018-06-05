<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title>媽我還在這</title>
  </head>
  <body>
  <form action="classtest.php" method="POST">  
  <table width="500" border="1" align="center">
  <tr>
    <td align="center" valign="middle">學生姓名</td>
    <td align="center" valign="middle">學生座號</td>
  </tr>
  <tr>
    <td align="center" valign="middle">
    <input type="text" name="studentname[]" value="小明">
    </td>
    <td align="center" valign="middle">
    <input type="text" name="number[]"      value="01">
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle">
    <input type="text" name="studentname[]" value="小花">
    </td>
    <td align="center" valign="middle">
    <input type="text" name="number[]"      value="02">
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle">
    <input type="text" name="studentname[]" value="小陳">
    </td>
    <td align="center" valign="middle">
    <input type="text" name="number[]"      value="03">
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle">
    <input type="text" name="studentname[]" value="小ㄏ">
    </td>
    <td align="center" valign="middle">
    <input type="text" name="number[]"      value="04">
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle">
    <input type="text" name="studentname[]" value="小蘭">
    </td>
    <td align="center" valign="middle">
    <input type="text" name="number[]"      value="05">
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle" colspan="2">
    <input type="submit" value="送啦">&nbsp;<input type="reset" value="Re:從零開始"></td>
  </tr>
</table><br>

 <?php
 
  if(!empty($_POST["number"][0]))
  {
    for($i=0 ; $i<count($_POST["studentname"]) ; $i++)
    {
      echo "<p style='text-align: center;'>"."學生姓名:".$_POST["studentname"][$i]."&nbsp&nbsp&nbsp&nbsp&nbsp"."學生座號:".$_POST["number"][$i]."<br>"."</p>";
    }
  }
 ?>
 
  </body>
</html>


