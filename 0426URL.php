<?php
                                       //******修改網頁之URL*****
echo $_GET["a"]."<br>";
echo $_GET["b"]."<br>";

/*
if(條件){}  else{   }
if(條件){}  else if(條件2){} eles if(條件3){} .....  else{    }
*/
if( !empty($_GET["c"]) )       // *常用*  empty():不存在或等於0  !:反向  
{                              
  echo $_GET["c"]."<br>";
}
if( !empty($_GET["d"]) )     
{ 
  echo $_GET["d"]."<br>";
}
?>