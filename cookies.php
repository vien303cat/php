

<?php

// setcookie("變數名稱","內容(如果是字串要標記起來)",持續時間      ,"限定可使用的路徑","限定可使用的DNS");
// setcookie( 必須輸入 ,          必須輸入         ,分頁離開後失效,  沒有特別限制    ,     當前的DNS  );
     

    setcookie("www",'字串的話要標起來',time()+100,"/aaa/");    
    echo $_COOKIE["www"] ;
?>