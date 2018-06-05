<?php
include_once("head.php");
if(!empty($_POST["account"]) && !empty($_POST["password"]))
    {
if(!empty($_POST["nickname"]) && !empty($_POST["sex"]))
    {
        $s_account = $_POST["account"];
        $s_password = MD5($_POST["password"]);
        $s_nickname = $_POST["nickname"];
        $s_sex = $_POST["sex"];

        $sql = "select * from member0529 where member0529_account = '$s_account'";
        $cc = mysqli_query($link,$sql);
        $setted = mysqli_num_rows($cc);
        
        if($setted == 0)
        {
            $sql = "insert into member0529 value(NULL,'$s_account','$s_password','$s_nickname','$s_sex','$ss2','1')";
            echo $sql."<br>" ;
            mysqli_query($link,$sql);
        }
        else {echo "此帳號已存在！";}
    }   
    else{echo "不得有任何一筆資料為空！";}
    }
    else{echo "不得有任何一筆資料為空！";}

?>

<form actuon="" method="POST">
<table width="600" border="2" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td height="80" colspan="2" align="center" valign="middle" style="font-size: 36px">老司機註冊系統</td>
  </tr>
  <tr>
    <td width="30%" height="80" align="center" valign="middle">帳號</td>
    <td height="80" valign="middle"><input type="text" name="account" style="height:30px ;"/></td>
  </tr>
  <tr>
    <td width="30%" height="80" align="center" valign="middle">密碼</td>
    <td height="80" valign="middle"><input type="password" name="password" style="height:30px ;"/></td>
  </tr>
  <tr>
    <td width="30%" height="80" align="center" valign="middle">暱稱</td>
    <td height="80" valign="middle"><input type="text" name="nickname" style="height:30px ;"/></td>
  </tr>
  <tr>
    <td width="30%" height="80" align="center" valign="middle">性別</td>
    <td height="80" valign="middle"><input type="radio" name="sex" value="男性" />男性<br>
    <input type="radio" name="sex" value="女性" />女性<br>
    <input type="radio" name="sex" value="秘密" />秘密<br>
    </td>
  </tr>
  <tr>
    <td height="80" colspan="2" align="center" valign="middle"><input type="submit"  value="送出" style="width:120px;height:40px;font-size:15px;"/>
   &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="reset" value="重設" style="width:120px;height:40px;font-size:15px;"/></td>
  </tr>
</table>
</form>    