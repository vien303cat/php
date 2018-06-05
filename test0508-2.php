<?php
$aaa = 100;
if( $aaa <= 10){
    echo "123<br>";
}
elseif($aaa > 10){
    echo "321";
}
echo "<br><br>";
switch($aaa) // switch : 判斷大量資料較好用，否則其功能用IF就做得到，
                      // 而且SWITCH只能判斷固定值，無法判定範圍 
{
    case 40:
        echo "40啦幹";
        break;
    case 100:
        echo "開大";
        break;
    case 39:
        echo "開小";
        break;
        default;

}   

//-----------------------------------------------------------------

$random = rand(0,100) ;
echo "<br>抽抽樂抽到66算你贏 號碼:".$random."<br>";


$randomchar = rand(97,122) ; //生出亂數為97~122
echo chr($randomchar);   // chr = 字元 , 可以用ASCII碼來寫出來
echo "<br><br>";

$password = "";
echo "新的密碼為:" ;
for($i=0;$i<8;$i++)
{
    $j = rand(1,3) ;
    if($j == 1)
    {   
    $word = rand(48,57) ;
    echo chr($word);
    }
    elseif($j == 2)
    {   
    $word = rand(65,90) ;
    echo chr($word);
    }
    elseif($j == 3)
    {   
    $word = rand(97,122) ;
    echo chr($word);
    }
}
?>