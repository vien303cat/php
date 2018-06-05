<?php
include_once("head.php") ;
if(!empty($_POST["account"]))
{
    $s_account = $_POST["account"];
    $s_password = $_POST["password"];
    $s_YA = $_POST["YA"];

    $sql = "select * from member0523 where member0523_account = '$s_account'";
    $cc = mysqli_query($link,$sql);
    $totle = mysqli_num_rows($cc);
    if($totle == 0)
    {
      $sql = "insert into member0523 value(NULL,'$s_account','$s_password','$s_YA',0,0,0,0,0)" ;
      mysqli_query($link,$sql);
      for($i=0;$i<count($_POST["level"]);$i++)
        {
          $sql = "update member0523 set ".$_POST["level"][$i]." = '1' where member0523_account = '$s_account' ";
          echo $sql."<br>" ;
          mysqli_query($link,$sql);
        } 
    }
    else
    {
      echo ("帳號已存在");
    }
}
?>
<form action="" method="post">
<table width="800" border="3" align="center" cellspacing="0" cellpadding="2">
  <tr>
    <td width="20%" align="center" valign="middle">帳號</td>
    <td align="center" valign="middle"><input name="account" type="text"/></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">密碼</td>
    <td align="center" valign="middle"><input name="password" type="password"/></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">單位</td>
    <td align="center" valign="middle">
        <select name="YA">     <!--下拉式選單 selected =>預設-->
        <option value="系統部" >系統部</option>
        <option value="開發部" >開發部</option>
        <option value="營運部" >營運部</option> 
        <option value="客服部" selected="">客服部</option>
        <option value="建築師巴部" >建築師巴部</option>
        </select></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">權限</td>
    <td align="center" valign="middle">
        帳號控制<input name="level[]" type="checkbox" value="member0523_a_1"/>
        最新消息控制<input name="level[]" type="checkbox" value="member0523_a_2"/>
        圖片控制<input name="level[]" type="checkbox" value="member0523_a_3"/>
        停權控制<input name="level[]" type="checkbox" value="member0523_a_4"/>
        時間控制<input name="level[]" type="checkbox" value="member0523_a_5"/>
</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><input type="submit" value="送出"/></td>
  </tr>
</table>
</form>
