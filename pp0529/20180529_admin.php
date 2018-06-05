<?php
include_once("head.php");

if(!empty($_GET["goout"]))
{
    echo "已登出，1秒後跳轉至登入畫面";
    $_SESSION["user_account"]="";
    header("Refresh:1; url=20180529_login.php");
    exit();
}
if(!empty($_SESSION["user_account"]))
{
    echo "歡迎光臨，".$_SESSION["user_account"]."<br><br><br>" ; 
}

$cal = "select * from member0529";
$c1  = mysqli_query($link,$cal);
$c2  = mysqli_fetch_assoc($c1);


if(!empty($_POST["seq"]))
{
    for($i=0;$i<count($_POST["seq"]);$i++)
    {
    $c2seq =  $_POST["seq"][$i];
    $c2nick = $_POST["nick"][$i];
    
    $sql = "update member0529 set member0529_nickname ='$c2nick' where member0529_seq = $c2seq";
    echo $sql."<br>";
    mysqli_query($link,$sql);
    }
}


?>
<form action="20180529_admin.php" method="POST">
<form action="20180529_delete.php" method="get">
<table width="800" border="2" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="5%" align="center" valign="middle">編號</td>
    <td width="15%" align="center" valign="middle">帳號</td>
    <td width="15%" align="center" valign="middle">密碼</td>
    <td width="15%" align="center" valign="middle">暱稱</td>
    <td width="15%" align="center" valign="middle">性別</td>
    <td width="15%" align="center" valign="middle">註冊時間</td>
    <td width="10%" align="center" valign="middle">動作</td>
  </tr>
  <?php do{ ?>
  <?php if ($c2["member0529_see"] == 1) { ?> 
  <tr>
    <td width="5%"  align="center" valign="middle"><?php echo $c2["member0529_seq"] ; ?></td>
    <td width="15%" align="center" valign="middle"><?php echo $c2["member0529_account"] ; ?></td>
    <td width="15%" align="center" valign="middle"><?php echo $c2["member0529_password"] ; ?></td>
    <td width="15%" align="center" valign="middle">
    <input type="text" name="nick[]" value=<?php echo $c2["member0529_nickname"]?>>
    <input type="hidden" name="seq[]" value =<?php echo $c2["member0529_seq"]?>>
    </td>
    <td width="15%" align="center" valign="middle"><?php echo $c2["member0529_sex"] ; ?></td>
    <td width="15%" align="center" valign="middle"><?php echo $c2["member0529_time"] ; ?></td>
    <td width="10%" align="center" valign="middle"><a href ="20180529_delete.php?seq=<?=$c2["member0529_seq"];?>">刪除</a></td> 
  <?php } ?>
  <?php }while($c2 = mysqli_fetch_assoc($c1) ) ?> 
  <tr>
    <td colspan="7" align="center" valign="middle"><input type="submit" value="送出" style="width:200px;"/></td>
  </tr>
  <tr>
    <td colspan="7" align="center" valign="middle"><a href ="20180529_admin.php?goout=1"> 登出</a></td>
  </tr>
</table>
</form>
</form>