<?php
include_once("head.php");

if(!empty($_SESSION["user"]))
{
    header("location:imgshare_con.php"); 
}    
    ?>
<?php
$sql = "select * from imgshare_lock where imgshare_lock_ip = '$ip' and imgshare_lock_unlock > '$real_time' order by imgshare_lock_time desc limit 1;";
$already = mysqli_query($link,$sql);
$alreadylock = mysqli_num_rows($already) ;
$alreadylock_data = mysqli_fetch_assoc($already);
if($alreadylock == 1){
?>
    <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><p><span style="color: #666; font-size: 24px; font-family: '微軟正黑體';">此IP目前封鎖中<br />
      等待至<?=$alreadylock_data["imgshare_lock_unlock"]?>解鎖</span></p>
      <p><img src="image/Uz0nABf.gif" width="500" height="" /></p></td>
  </tr>
</table> 

<?php
exit();
} ?>

<?php

if(!empty($_POST["acc"])){
    $acc = $_POST["acc"];
    $pw = md5($_POST["pw"]);
    $sql = "select * from imgshare_member where imgshare_member_acc ='$acc' and imgshare_member_pw = '$pw';";
    $cc = mysqli_query($link,$sql);
    $goin = mysqli_num_rows($cc); 
    $c2 = mysqli_fetch_assoc(mysqli_query($link,$sql) );
    if($goin == 1){
        $_SESSION["user"] = $c2["imgshare_member_acc"] ;
        $user = $_SESSION["user"] ;
        echo "會員:".$c2["imgshare_member_acc"]."登入成功";
        $sql = "insert into imgshare_login value(null,'$acc','$ip','1','$real_time');";
        mysqli_query($link,$sql);
        $his_sql = "insert into imgshare_history value(NULL,"."'$user',"."'登入',"."'$user'".",'$ip',"."'$real_time')";
        mysqli_query($link,$his_sql);
        header("location:imgshare_con.php"); 
    }else{
        $sql = "insert into imgshare_login value(null,'$acc','$ip','0','$real_time');";
        mysqli_query($link,$sql);
        $timelock = strtotime("+6hour-5min");
        $timelock_real = date("Y-m-d H:i:s",$timelock);
        $sql = "select * from imgshare_login where imgshare_login_ip = '$ip' and imgshare_login_time >= '$timelock_real' order by imgshare_login_time desc limit 3 ;";
        $log = mysqli_query($link,$sql);
        $logall = mysqli_fetch_assoc($log);
        $logall_row = mysqli_num_rows($log);
        $now_totle = 0 ;
        $tt = 1 ;
        do{
            $now_totle = $now_totle + $logall["imgshare_login_io"] ;
        }while($logall= mysqli_fetch_assoc($log));
        ?><script>alert("帳號密碼錯誤");</script> 
        <?php
        if($logall_row >= 3){
            if($now_totle == 0){
                $timeunlock = strtotime("+6hour+10min");
                $timeunlock_real = date("Y-m-d H:i:s",$timeunlock);
                $sql = "insert into imgshare_lock value(NULL,'$ip','$real_time','$timeunlock_real');";
                mysqli_query($link,$sql);
                ?> 
                <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><p><span style="color: #666; font-size: 24px; font-family: '微軟正黑體';">
    "三次登入失敗<br>5秒過後封鎖IP10分鐘 Q_Q/"</span></p>
      </td>
  </tr>
</table> 
                <?php
                header("Refresh:5;url=imgshare_login.php");
                exit();
            }
        }
    }
}
?>

<style>
.ck {
	background-color: #FFE;
}
</style>

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><p><span style="color: #F00; font-size: 14px; text-decoration: underline; font-family: '微軟正黑體';">注意:同一個帳號五分鐘以內連續登入失敗三次將會封鎖該IP十分鐘！</span></p></td>
  </tr>
</table>
<form action="" method="POST">
<table width="800" border="4" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" colspan="4" align="center" valign="middle"><span style="font-family: '微軟正黑體'; font-size: 24px;">ImgShare 登入頁</span></td>
  </tr>
  <tr>
    <td width="15%" height="120" rowspan="2" align="center" valign="middle"><img src="image/BIxK0I2.gif" height="120 "></td>
    <td width="25%" height="60" align="center" valign="middle" class="ck">帳　號</td>
    <td width="25%" align="center" valign="middle" class="ck"><input type="text" name="acc" /></td>
    <td width="15%" height="120" rowspan="2" align="center" valign="middle"><img src="image/BIxK0I2.gif" height="120 "></td>
  </tr>
  <tr>
    <td width="25%" height="60" align="center" valign="middle"class="ck">密　碼</td>
    <td width="25%" align="center" valign="middle"class="ck"><input type="password" name="pw" /></td>
  </tr>
  <tr>
    <td height="50" colspan="4" align="center" valign="middle"><p><input type="submit" value="登入" />　
    <input type="button" value="註冊" onclick="location.href='imgshare_add.php'" /></p></td>
  </tr>
</table>
</form>