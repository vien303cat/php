<?php
   
    //session可以把它當作一個跨網頁存在的變數
    //session跟cookies的差別 
    //session : 儲存在server端
    //cookie :  儲存在用戶端


    session_start();               //若要使用session都要先用session_start();
    $_SESSION["xxx"] = 999 ;
    $_SESSION['ooo'] = rand(0,100) ;
    $_SESSION['name'] = "vien303cat" ;
    $_SESSION['password'] = "你還真想知道啊?" ;
    echo ("資料登入完畢 請至session1.php");

    
    
?>