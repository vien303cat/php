<marquee><span style="font-size: 36px;font-family: '微軟正黑體';">哈囉您好，歡迎來到CoolTalk聊天室\^O^/</span></marquee><br><br>

<?php
include_once("head.php");
if(!empty($_SESSION["user"]))
{
  $_SESSION["user"] = "";
}
if(!empty($_SESSION["time"]))
{
    header("location:jumpjump.php");
}
$sql = "select * from cool_lock where cool_lock_ip = '$ip' and cool_lock_unlock > '$real_time' and cool_lock_specal ='0' order by cool_lock_time desc limit 1;";
$already = mysqli_query($link,$sql);
$alreadylock = mysqli_num_rows($already) ;
$alreadylock_data = mysqli_fetch_assoc($already);
if($alreadylock == 1){
?>
    <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><p><span style="color: #666; font-size: 24px; font-family: '微軟正黑體';">此IP目前封鎖中<br />
      等待至<?=$alreadylock_data["cool_lock_unlock"]?>解鎖或著是<a href="jumpjump.php">跟露米亞玩遊戲</a>來解鎖</span></p>
      <p><img src="img/a00.png" width="500" height="" /></p></td>
  </tr>
</table> 
<?php
exit();
}

if(!empty($_POST["acc"])){
    $acc = $_POST["acc"];
    $pw = md5($_POST["pw"]);
    $sql = "select * from cool_member where cool_member_acc ='$acc' and cool_member_pw = '$pw';";
    $cc = mysqli_query($link,$sql);
    $goin = mysqli_num_rows($cc); 
    $c2 = mysqli_fetch_assoc(mysqli_query($link,$sql) );
    if($goin == 1){
        $_SESSION["user"] = $c2["cool_member_acc"] ;
        echo "會員:".$c2["cool_member_nick"]."登入成功";
        $sql = "insert into cool_login value(null,'$acc','1','$ip','$real_time');";
        mysqli_query($link,$sql);
        header("location:index.php"); 
    }else{
        $sql = "insert into cool_login value(null,'$acc','0','$ip','$real_time');";
        mysqli_query($link,$sql);
        $timelock = strtotime("+6hour-5min");
        $timelock_real = date("Y-m-d H:i:s",$timelock);
        $sql = "select * from cool_login where cool_login_ip = '$ip' and cool_login_time >= '$timelock_real' order by cool_login_time desc limit 3 ;";
        $log = mysqli_query($link,$sql);
        $logall = mysqli_fetch_assoc($log);
        $logall_row = mysqli_num_rows($log);
        $now_totle = 0 ;
        $tt = 1 ;
        do{
            $now_totle = $now_totle + $logall["cool_login_io"] ;
        }while($logall= mysqli_fetch_assoc($log));
        if($logall_row >= 3){
            if($now_totle == 0){
                $timeunlock = strtotime("+6hour+5min");
                $timeunlock_real = date("Y-m-d H:i:s",$timeunlock);
                $sql = "insert into cool_lock value(NULL,'$ip','$real_time','$timeunlock_real','0');";
                mysqli_query($link,$sql);
                ?> 
                <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><p><span style="color: #666; font-size: 24px; font-family: '微軟正黑體';">
    "三次登入失敗<br>5秒過後封鎖帳號5分鐘 Q_Q/"</span></p>
      </td>
  </tr>
</table> 
                <?php
                header("Refresh:5;url=coollogin.php");
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
    <td align="center" valign="middle"><p><span style="color: #F00; font-size: 14px; text-decoration: underline; font-family: '微軟正黑體';">注意:同一個IP五分鐘以內連續登入失敗三次將會封鎖該IP五分鐘！</span></p></td>
  </tr>
</table>
<form action="" method="POST">
<table width="800" border="4" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" colspan="4" align="center" valign="middle"><span style="font-family: '微軟正黑體'; font-size: 24px;">CoolTalk 登入頁</span></td>
  </tr>
  <tr>
    <td width="15%" height="120" rowspan="2" align="center" valign="middle"><img src="img/beside.gif" height="120 "></td>
    <td width="25%" height="60" align="center" valign="middle" class="ck">帳　號</td>
    <td width="25%" align="center" valign="middle" class="ck"><input type="text" name="acc" /></td>
    <td width="15%" height="120" rowspan="2" align="center" valign="middle"><img src="img/beside.gif" height="120 "></td>
  </tr>
  <tr>
    <td width="25%" height="60" align="center" valign="middle"class="ck">密　碼</td>
    <td width="25%" align="center" valign="middle"class="ck"><input type="password" name="pw" /></td>
  </tr>
  <tr>
    <td height="50" colspan="4" align="center" valign="middle"><p><input type="submit" value="登入" />　
    <input type="button" value="註冊" onclick="location.href='cooladmin.php'" /></p></td>
  </tr>
</table>
</form>