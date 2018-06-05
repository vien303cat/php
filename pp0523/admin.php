<?php
include_once("head.php");
include_once("head_admin.php");
echo "會員".$_SESSION["user_account"]."登入成功！<br><br>"."然而沒什麼用Q_Q<br><br><br>" ;
echo "所以你想做啥?<br>";
?>
<?php  if($lv1 ==1) { ?> 
<a href ="admin.php?goto=acc">帳號控制</a> <?php } ?>
<br>
<?php  if($lv2 ==1) { ?> 
<a href ="admin.php?goto=new">最新消息控制</a>  <?php } ?>
<br>
<?php  if($lv3 ==1) { ?> 
<a href ="admin.php?goto=photo">圖片控制</a>  <?php } ?>
<br>
<?php  if($lv4 ==1) { ?> 
<a href ="admin.php?goto=stop">停權控制</a>  <?php } ?>
<br>
<?php  if($lv5 ==1) { ?> 
<a href ="admin.php?goto=time">時間控制</a>  <?php } ?>

<?php
include_once($goto);
?>
