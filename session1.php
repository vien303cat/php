<?php

    session_start();  //若要呼叫session必須先到設定SESSION變數的網站(session0.php)
    echo $_SESSION["xxx"]."<br>" ;
    echo "隨機號碼:".$_SESSION['ooo']."<br>" ;
    echo "使用者帳號:".$_SESSION['name']."<br>" ;
    echo "使用者密碼:".$_SESSION['password']."<br>" ;

?>