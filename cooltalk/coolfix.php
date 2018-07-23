<?php
include_once("head.php");
$user = $_SESSION["user"];
$sql = "select * from cool_member where cool_member_acc = '$user' and cool_member_AI = '1' ";
$ifAI = mysqli_num_rows(mysqli_query($link,$sql));
if($ifAI == 0){
    ?><script>
    alert('很抱歉 您並沒有管理員權限');    
</script><?php
}if($ifAI == 0){ header("Refresh:0;url=index.php"); }


if($ifAI == 1){ ?>
    <table width="1024" border="0" align="center" cellpadding="100" cellspacing="0">
  <tr>

  <td align="center" valign="middle"><span style="color: #F00; font-family: '華康新綜藝體W5'; font-size: 36px;">
        抱歉！目前網頁維修中...
    </span>
    <p><a href="cooltotle.php"><img src="img/fixing.png" width="800"  /></a> </p>
    </td>
    </tr>
</table>
<?php } 
?>
