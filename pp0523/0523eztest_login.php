<?php
    include_once("head.php");
    /*
    if(!empty($_SESSION["user_account"]))
    {
        header("location:admin.php");
        exit();
    }
    */
    if(!empty($_POST["account"]))
    {
        $ac = $_POST["account"];
        $pw = $_POST["password"];  //因為input是用password 因此要用md5解碼
        $s91 = "select * from member0523 where member0523_account = '".$ac."' and member0523_password = '".$pw."'";
        echo $s91 ;
        $sql = mysqli_query($link,$s91);
        $totle = mysqli_num_rows($sql);
        echo "<br>".$ac."<br>".$pw."<br>".$totle ;

        if($totle ==1)
        {   
            echo ("0.0");
            $_SESSION['user_account'] = $ac; 
            header("location:admin.php"); 
        }
        else
        {
            echo "<br>帳號密碼錯誤<br>" ;
        }
    }
?>
<form action="" method="post" >
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1024" height="768" align="center" valign="middle"><table width="800" border="2" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="30%" align="center" valign="middle"><span style="font-size: 36px;">帳 號</span></td>
        <td align="left" valign="middle"><input type="text" name="account" value="" size="40" /></td>
      </tr>
      <tr>
        <td width="30%" align="center" valign="middle"><span style="font-size: 36px;">密 碼 </span></td>
        <td align="left" valign="middle"><input type="password" name="password" size="40"  /></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle"><input type="submit" value="登入" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>