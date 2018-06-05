&nbsp&nbsp&nbsp&nbsp&nbsp 從3開始起跳,每跳一次會+2,老大你想加幾次? <br><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="firsttest.php?ooo=1">1次</a><br><br> 
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="firsttest.php?ooo=5">5次</a><br><br>  
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="firsttest.php?ooo=14">14次</a><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="firsttest.php?ooo=7">7次</a><br><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="firsttest.php?ooo=4129889">林北不想算啦</a><br><br>

<input type="text" value="don't input" name="first"><br><br> 
<?php
 
if(empty($_GET["ooo"]))    //因為一開始URL沒有值 直接略過這個if往下判斷的話會error
{
  $_GET["ooo"]=0 ;
  echo "快點選辣,我一秒鐘幾十萬上下跟你在這邊算國小數學喔? <br>";
}
if(!empty($_GET["ooo"])&& $_GET["ooo"] < 100)
{
  for($i=3 ; $i<=(3+($_GET["ooo"]*2)) ; $i+=2)
  {
  echo $i ."<br>";
  }
  
  echo "------------------------<br>";
  echo "最後加總結果:".($i-=2)."<br>";

///////////////////////  ~FUNNY TIME~

  if($_GET["ooo"] < 4){
  echo "才".$_GET["ooo"]."次也要我算喔= =?<br>";
  }
  
  if($_GET["ooo"] >= 4 && $_GET["ooo"] <= 10)
  {
  echo "算".$_GET["ooo"]."次而已 , ezez \0.</ <br>";
  }
  
  if($_GET["ooo"] > 10 && $_GET["ooo"] <= 100)
  {
  echo $_GET["ooo"]."次?有點累喔 , 給錢給錢3Q<br>";
  }
  
}  
  if($_GET["ooo"] > 100)
  {
  echo "不想算就走開啦 , 奇怪诶你 , 難道你不知道這一切都是你自己再跟自己說話而已嗎ㄏㄏ<br>";
  }
    
//////////////////////


?>