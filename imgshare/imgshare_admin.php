<?php
include_once("head.php");
if(empty($_SESSION["user"]))
{
    header("location:imgshare_login.php"); 
}    
$user = $_SESSION["user"] ;
$sql = "select * from imgshare_member";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$sql = "select * from imgshare_member where imgshare_member_acc = '$user' and imgshare_member_admin = '1' ";
$ifAI = mysqli_num_rows(mysqli_query($link,$sql));
if($ifAI == 0){
    ?><script>
    alert('很抱歉 您並沒有管理員權限');   
</script><?php
}if($ifAI == 0){ header("Refresh:0;url=imgshare_con.php"); }



if(!empty($_POST["acc"]) && !empty($_POST["pw"])){
    $ac = $_POST["acc"];
    $pw = $_POST["pw"];
    $admin = $_POST["admin"];
    $lock = $_POST["display"];
    $seq = $_POST["seq"];
    $sql = " update imgshare_member set imgshare_member_acc = '$ac',imgshare_member_admin = '$admin',imgshare_member_display = '$lock' 
    where imgshare_member_seq = '$seq';" ;
    mysqli_query($link,$sql); 
    $his_sql = "insert into imgshare_history value(null,'$user','修改會員資料','/帳號 =$ac/管理權限 = $admin/是否封鎖=$lock  ','$ip','$real_time');" ;
    mysqli_query($link,$his_sql);

    header("location:imgshare_admin.php");
}
if(!empty($_GET["del"])){
    $del = $_GET["del"]; 
    $his_sql = "insert into imgshare_history value(null,'$user','刪除帳號','seq = $del','$ip','$real_time')" ;
    mysqli_query($link,$his_sql);
   $sql = " DELETE FROM imgshare_member where imgshare_member_seq = '$del' ;"; 
   mysqli_query($link,$sql);
   
   ?><script>
   alert("好壞喔...該筆資料已經「真的」刪除了QAQ");    
</script><?php
    mysqli_query($link,$sql);
    $_GET["del"] = "";
    header("Refresh:0;url=imgshare_admin.php");
}


?>



<table width="1024" border="2" align="center" cellpadding="2" cellspacing="0" style="background-color: rgba(255,255,255,0.5);">
  <tr>
    <td width="15%" align="center" valign="middle">帳號</td>
    <td width="15%" align="center" valign="middle">密碼(改完自動變md5加密)</td>
    <td width="10%" align="center" valign="middle">帳號管理權限(1=管理員)</td>
    <td width="20%" align="center" valign="middle">註冊時間</td>
    <td width="15%" align="center" valign="middle">封鎖(0=封鎖)</td>
    <td width="15%" align="center" valign="middle">操作</td>
  </tr>

  <?php do{ ?>
    <form method="post" action="imgshare_admin.php">
    <tr>
    <input type="hidden" name="seq" value="<?=$c2["imgshare_member_seq"]?>" />
    <td width="15%" align="center" valign="middle"><?=$c2["imgshare_member_acc"]?></td>
    <input type="hidden" name="acc" value="<?=$c2["imgshare_member_acc"]?>" />
    <td width="15%" align="center" valign="middle"><?=$c2["imgshare_member_pw"]?></td>
    <input type="hidden" name="pw" value="<?=$c2["imgshare_member_pw"]?>" />
    <td width="10%" align="center" valign="middle"><input type="text" name="admin" value="<?=$c2["imgshare_member_admin"]?>" /></td>
    <td width="20%" align="center" valign="middle"><?=$c2["imgshare_member_time"]?></td>
    <input type="hidden" name="time" value="<?=$c2["imgshare_member_time"]?>" />
    <td width="15%" align="center" valign="middle"><input type="text" name="display" value="<?=$c2["imgshare_member_display"]?>" /></td>
    <td width="15%" align="center" valign="middle"><input type="submit" value="修改">  
    <a href ="imgshare_admin.php?del=<?=$c2["imgshare_member_seq"]?>">刪除</a>
</td>
    </tr>
    </form>
    <?php }while($c2 = mysqli_fetch_assoc($c1) ) ?> 
    <tr>
    <td colspan="6" align="center" valign="middle"><p><input type="button" value="上一頁" onclick="javascript:location.href='imgshare_con.php'"/>  </p></td>
  </tr>
  </table>
  