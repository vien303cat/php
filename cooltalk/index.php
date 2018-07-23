<body style="padding: 20px;">
<?php
include_once("head.php");
if(!empty($_SESSION["user"])){
    $user = $_SESSION["user"];
    $sql = "select * from cool_member where cool_member_acc ='$user';" ;
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
}else{ $_SESSION["user"] = "" ; }
if(!empty($_POST["talk"])){
    $acc = $user ;
    $nick = $c2["cool_member_nick"];
    $int = $c2["cool_member_int"];
    $con = $_POST["talk"];
    $sql = "insert into cool_talk value(NULL,'$acc','$nick','$int','$con','$ip','$real_time','1');";
    mysqli_query($link,$sql);
}
$sql = "select * from cool_talk order by cool_talk_time desc";
$s1  = mysqli_query($link,$sql);
$s2  = mysqli_fetch_assoc($s1);
$talk_seq = $s2["cool_talk_seq"];
$talk_acc = $s2["cool_talk_acc"];
$talk_nick = $s2["cool_talk_nick"];
$talk_int = $s2["cool_talk_int"];
$talk_con = $s2["cool_talk_con"];
$talk_ip = $s2["cool_talk_ip"];
$talk_time = $s2["cool_talk_time"];
$talk_display = $s2["cool_talk_display"];

?>
<style>
    #bt1{
        margin:30px 400px;
        width:85px;
        font-family:'微軟正黑體';
        position:absolute;
        cursor: pointer; /*鼠標*/
    }
    #bt2{
        margin:30px 500px;
        width:85px;
        font-family:'微軟正黑體';
        position:absolute;
        cursor: pointer; /*鼠標*/
    }
    .t1{
        font-family:'微軟正黑體';
        font-size:20px;
        color:#FFF;
        background-color:rgba(0,0,0,0.5);
    }
    .t2{
        font-family:'微軟正黑體';
        font-size:20px;
        color:#000;
        background-color:rgba(255,255,255,0.5);
    }
    </style>

<div style=" background-color:rgba(2500,200,0,0.5); ">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="90%" align="center" valign="middle" ><span style="font-size: 48px; font-family: 'Arial Black', Gadget, sans-serif;">Cool Talk </span>
    <?php 
    if(!empty($_SESSION["user"]))
    { ?>
        <input id="bt1" type="button" value="登出" onclick="javascript:location.href='coollogin.php'"/>
        <?php }else{?>
        <input id="bt1" type="button" value="登入" onclick="javascript:location.href='coollogin.php'"/>
    <?php } ?>
    <input id="bt2" type="button" value="管理者介面" onclick="javascript:location.href='coolfix.php'"/>
    </td>
  </tr>
</table>
<br>
<?php
if(!empty($_SESSION["user"]))
{ ?>
<form action="" method="POST">
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
      <td width ="80"><img src="img/talk.gif" alt="" width="80"  /></td>
    <td align="left" valign="middle">
        <span style=" color: #00F; font-size: 24px;"><?=$c2["cool_member_nick"]?></span> 說:
        <input type="text" name="talk" style="width:30%; height:100%;"/>
        <input type="submit" value="送出"/></td>
  </tr>
</table>
</form>
<?php } ?>
<marquee scrollAmount=20>
    <span style="font-size: 36px;font-family: '微軟正黑體';">最新消息:<?=$s2["cool_talk_time"]?>   興趣是<?=$s2["cool_talk_int"]?>的 <span style="color: #F00;"><?=$s2["cool_talk_nick"]?></span> 說:<?=$s2["cool_talk_con"]?></span>
    </marquee><br><br>
<br>
<div  style="padding: 20px 20px 20px 170px; ">
<table width="90%" border="0" cellspacing="0" cellpadding="5">
    <?php $i = 1 ; 
    do{ if ($s2["cool_talk_display"] == 1){
    if($i == 1){
        $i = 2 ;
    }else{ $i = 1 ; }
    ?>
    <tr class="t<?=$i?>">
    <td width="20%" align="left" valign="middle"><?=$s2["cool_talk_time"]?></td>
    <td width="60%" align="left" valign="middle">興趣是<?=$s2["cool_talk_int"]?>的 <span style="color: #F00;"><?=$s2["cool_talk_nick"]?></span> 說:<?=$s2["cool_talk_con"]?></td>
    <td width="20%" align="center" valign="middle">
   
    <?php 
    if($s2["cool_talk_acc"] == $_SESSION["user"]){
    ?>    
    
     <a href="cooltext.php?text=<?=$s2['cool_talk_seq']?>">編輯</a> 
     <a href="cooltext.php?del=<?=$s2['cool_talk_seq']?>">刪除</a> 
     　
    <?php } ?>
    
    </td>
    </tr>
    <?php } ?>
   <?php }while($s2 = mysqli_fetch_assoc($s1) ) ?>
</table>

</div>
</div>