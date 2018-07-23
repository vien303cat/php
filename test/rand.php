<?php
for($i=1;$i<=22;$i++)
{
    $Q1 = rand(1,8);
    $Q2 = rand(1,8);
    while($Q2 == $Q1)
    {
        $Q2 = rand(1,8);
    }
    if($Q1 > $Q2)
    {
        $ww = $Q1 ;
        $Q1 = $Q2 ;
        $Q2 = $ww ;
    }
    echo $i."號同學:第".$Q1."題,第".$Q2."題<br>";
    
}
?>
YA