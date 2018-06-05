<?php
include_once("head.php");

if(!empty($_SESSION["user_account"]))
{
    header("location:20180529_admin.php");
}

if($nowlock ==1)
{
  if($nowlock_data["lock0529_type"] ==1)
  {
    echo "帳號已被封鎖，封鎖理由為:帳號密碼錯誤超過3次<br>封鎖時間:".$nowlock_data["lock0529_time"] ;
  }
}
else
{
if(!empty($_POST["acin"]) && !empty($_POST["pwin"]) )
{
    $ac = $_POST["acin"];
    $pw = MD5($_POST["pwin"]);
    $time = $ss2;
    $sql =" select * from member0529 where member0529_account ='$ac' and member0529_password ='$pw' and member0529_see = 1";
    mysqli_query($link,$sql);
    $totle = mysqli_num_rows(mysqli_query($link,$sql));
    if ($totle == 1)
    {
        $_SESSION["user_account"] = $ac ;  
        echo "使用者IP:".$ip;
        echo "<br><br>使用者: ".$_SESSION["user_account"]." 登入成功，等待1 秒後跳轉頁面";
        $sql = "insert into login0529 value(null,'$ac','1','$ip','$ss2')"; //紀錄登入成功的帳號
        mysqli_query($link,$sql);
        echo "<br>".$sql."<br>" ;
        header("Refresh:1; url=20180529_admin.php");
        exit();
    }
    else{
          echo "帳號密碼錯誤";
          $sql = "insert into login0529 value(null,'$ac','0','$ip','$ss2')"; //紀錄登入失敗的帳號
          echo "<br>".$sql."<br>" ;
          mysqli_query($link,$sql);

          $timeout = strtotime("+6hour-2min");
          $timeout2 = date("Y-m-d H:i:s",$timeout);  //設定半個小時之內連續錯三次

          $black_sql = "select * from login0529 where login0529_ip = '$ip' and login0529_time >='$timeout2' order by login0529_time desc limit 3 "; //抓三筆同IP的登入資料
          $black_row = mysqli_query($link,$black_sql);
          $black_totle = mysqli_fetch_assoc($black_row);
          $log_totle =mysqli_num_rows($black_row);         //避免登入次數少於3次
          $now_totle = 0;                                  //開始計算成功與失敗的次數 起始值0
          do{ $now_totle = $now_totle + $black_totle["login0529_io"];
          }while($black_totle =mysqli_fetch_assoc($black_row));
          if($log_totle >= 3)                              //避免登入次數少於3次
          {
            if($now_totle == 0)
            {
              $timeout = strtotime("+6hour+2min");
              $timeout2 = date("Y-m-d H:i:s",$timeout);
              echo "登入失敗3次<br>封鎖喔拉喔拉喔拉喔拉";
              $lock = "insert into lock0529 value(NULL,'$ip','$timeout2','1')";
              echo "<br>".$lock ;
              mysqli_query($link,$lock);
            }
          }
        }
  }
}

?>


<form action="" method="post">
<table width="600" border="2" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td height="80" colspan="2" align="center" valign="middle" style="font-size: 36px">老司機登入系統</td>
  </tr>
  <tr>
    <td width="30%" height="80" align="center" valign="middle" >帳號</td>
    <td height="80" valign="middle"><input type="text" name="acin" style="height:30px" /></td>
  </tr>
  <tr>
    <td width="30%" height="80" align="center" valign="middle" >密碼</td>
    <td height="80" valign="middle"><input type="password" name="pwin" style="height:30px"/></td>
  </tr>
  <tr>
    <td height="80" colspan="2" align="center" valign="middle"><input type="submit"  value="登入"  style="width:120px;height:40px;font-size:15px;"/>
</td>
  </tr>
</table>
</form>