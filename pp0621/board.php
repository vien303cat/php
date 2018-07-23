<?php
session_start();
$ss = strtotime("+6hour"); //strtotime 格林威治天文臺單位時間，可以在裡面作加減
$ss2 = date("Y-m-d H:i:s",$ss);
$link = mysqli_connect("localhost","root","","myphp_2018_06"); //mysqli_connect("localhost","帳號","密碼","資料庫名稱")
mysqli_query($link , "SET NAMES UTF8"); 
$id ="bz";
if(empty($_SESSION["talk_no"])){
    $tt3 = date("YmdHis",$ss);  
    $_SESSION["talk_no"] = $tt3 ;
}
if(!empty($_POST["my_talk"])){
    $sql = "insert into board_log value (null ,'".$id."','".$_POST["my_talk"]."','".$_SESSION["talk_no"]."','".$ss2."','127.0.0.1')";
    mysqli_query($link,$sql);
}

?>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title></title>
  <script src="jquery-3.3.1.min.js"></script>
  <style>
      body{
          margin:0px;
      }
      #all_talk{
          width:1024px;
          height:500px;
          background-color:#fff687;
          margin:0 auto;
          overflow:auto;
      }
      #input_talk{
          width:200px;
          height:100px;
          margin:20 auto;
      }
      #all_talk_back{
          width:1024px;
          height:500px;
          background-image:url(load.gif);
          background-color:rgba(255,255,255,1);
          background-size:50px 50px;
          display:block;
          background-repeat:no-repeat;
          background-position:center center;
          position:fixed;
          left:50%;
          margin: 0 0 0 -512px;
      }
  </style>
  </head>
  <body>
  <div id="all_talk_back"></div>
  <div id="all_talk"></div>
    <form method="post">
    <div id="input_talk">
    <input name="my_talk"><input type="submit" value="嗆聲">
    </div>
    </form>
    </body>
    </html>
<!--
1.送出文字欄位的值or內容並處理他 (不限定使用技術)
    1-1 開啟頁面時設定一組本次談話的編號以SESSION儲存(使用者端)
    1-2 開啟頁面時設定一組本次談話的編號session儲存(客服端)(由使用者設定的session) 練習時先不管他
    1-3 把對話的內容送出API處理(新增用)
    1-4 API接受到內容記錄在LOG中(DB)
2.讀取資料庫中本次談話的內容並顯示在頁面上 (建議使用AJAX)
    2-1 設定定時送出訊息給API請他提供LOG中的對話紀錄(搜尋用)
    2-2 API收到訊息後撈DB資料並回傳給頁面
    2-3 頁面接收到回傳值後顯示在網頁上
結束時清空SESSION
-->
    <script>
        function no_load(){
            $("#all_talk_back").hide();
        }
        function now_load(){
            setTimeout(function(){
                now_load();
                $.post("board_api.php",{},function(){
                    
                });
            },2000);
        }
        now_load();
    </script>
