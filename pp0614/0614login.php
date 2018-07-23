<?php
session_start();

$link = mysqli_connect("localhost","root","","myphp_2018_06");
mysqli_query($link,'SET NAMES UTF8');
$ip = $_SERVER["REMOTE_ADDR"];
$time = date("Y-m-d H:i:s",strtotime("+6hour"));

$sql = "select * from lock0416 where lock0614_ip = '$ip' and lock0614_unlock > '$time' order by lock0614_lock desc limit 1;";
$alreadylock = mysqli_query($link,$sql);
$nowlock = mysqli_num_rows($alreadylock);

$nowlock_data = mysqli_fetch_assoc($alreadylock);

if($nowlock == 1)
{
    echo "此IP目前封鎖中，給窩滾！！";
    echo "<br>解鎖時間:".$nowlock_data['lock0614_unlock'];
 ?>
<div id="hot" style="background-image:url(img/a00.png); background-color:#FFF;background-size:100% 100%;width:400px;height:400px;">
</div>
<?php
    exit();
} ?>
<?php
if(!empty($_POST["ac"]))
{
    $_SESSION["user_id"] = $_POST["ac"];   
    $ac = $_POST["ac"];
    $pw = md5($_POST["pw"]);
    $sql = "select * from account0614 where account0614_ac ='".$ac."' and account0614_pw ='".$pw."';";
    $goin = mysqli_num_rows(mysqli_query($link,$sql));
    $c2 = mysqli_fetch_assoc(mysqli_query($link,$sql) );
    if($goin == 1){
        echo $c2["account0614_nam"]."登入成功";
        $sql = "insert into login0614 value(null,'$ac','1','$ip','$time');";
        mysqli_query($link,$sql);
        //header("Refresh:1; url=0614first.php");
    }else{
        echo "帳號或是密碼錯誤";
        $sql = "insert into login0614 value( null,'$ac','0','$ip','$time');";
        mysqli_query($link,$sql);

        $timeout = strtotime("+6hour-5min");
        $timeout_real = date("Y-m-d H:i:s",$timeout);
        $sql = "select * from login0614 where login0614_ip = '$ip' and login0614_time >= '$timeout_real' order by login0614_time desc limit 3 ;";
        $hh = mysqli_query($link,$sql);      
        $logall = mysqli_fetch_assoc($hh);  //所有資料
        $logall_row = mysqli_num_rows($hh);
        $now_totle = 0;
        do{  
            $now_totle = $now_totle + $logall["login0614_io"] ;
            echo $now_totle ;
        }while($logall = mysqli_fetch_assoc($hh));
        
        if($logall_row >= 3){
            if($now_totle == 0)
            {   
                header("location:jumpjump.php");
                $timelock = strtotime("+6hour+5min");
                $timelock_real = date("Y-m-d H:i:s",$timelock);
                $sql = "insert into lock0416 value(NULL,'$ip','$time','$timelock_real');";
                mysqli_query($link,$sql);
                echo "再亂打R<br>5秒過後封鎖帳號5分鐘 881";
                header("Refresh:5;url=0614login.php");
                exit();
            }
        }



    }

}

?>

<form action="" method="POST">
<table width="800" border="2" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="20%" align="center" valign="middle">帳號</td>
    <td align="center" valign="middle"><input name="ac" type="text"></td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle">密碼</td>
    <td align="center" valign="middle"><input name="pw" type="password"></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">
    <input type="submit" value="" style="background-color:#FFF; border-style: none; background-image:url(img/b04.jpg); width: 500px; height: 300px;background-size:100% 100%;"/>
    </td>
  </tr>
</table>
</form>
