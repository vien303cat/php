<?php
$ss = strtotime("+6hour"); //strtotime 格林威治天文臺單位時間，可以在裡面作加減
$ss2 = date("YmdHis",$ss);     //date(宣告格式,要把哪個東西抓進來變) 
$link = mysqli_connect("localhost","root","","myphp_2018_06"); //mysqli_connect("localhost","帳號","密碼","資料庫名稱")
mysqli_query($link , "SET NAMES UTF8"); //設定編碼


    if(!empty($_FILES["mypic"]["name"]))
    {
        for($i=0 ; $i < count($_FILES["mypic"]["name"]) ; $i++)
        {   
            if(!empty($_FILES["mypic"]["name"][$i]))
            {
            echo "<br>開始上傳第".($i+1)."個檔案...".
            "<br>檔案名稱:".$_FILES["mypic"]["name"][$i].
            "<br>檔案大小:".$_FILES["mypic"]["size"][$i]."KB".
            "<br>檔案類型:".$_FILES["mypic"]["type"][$i].
            "<br>從".$_FILES["mypic"]["tmp_name"][$i]."上傳<br><br>"; 
            

            if($_FILES["mypic"]["type"][$i] == "image/jpeg"){
                $nowname = $ss2.$i.".jpg";
                echo $nowname;
            }
            if($_FILES["mypic"]["type"][$i] == "image/png"){
                $nowname = $ss2.$i.".png";
                echo $nowname;
            }
            if($_FILES["mypic"]["type"][$i] == "image/gif"){
                $nowname = $ss2.$i.".gif";
                echo $nowname;
            }

            copy($_FILES["mypic"]["tmp_name"][$i],"img/".$nowname);
            $sql = "insert into photo0619 value(NULL,'$nowname');";
            mysqli_query($link,$sql);
            }
        }
    }
    else
    {
        echo "no files!!!!!!!!" ;
    }
?>


<form action="" method="post" enctype="multipart/form-data">
<input type="button" value="新增" id="inp" onclick="add_pic()" /> <input type="submit" value="傳送" /><br><br>
<span id="aa"><input type="file" name="mypic[]" /></span><br><br>
<input type="file" name="mypic[]" /><br><br>
<input type="file" name="mypic[]" /><br><br>
<input type="file" name="mypic[]" /><br><br>
</form>

<script>
    function add_pic(){
        var my_file = '<br><br><input type="file" name="mypic[]" />';
        document.getElementById("aa").innerHTML = document.getElementById("aa").innerHTML + my_file;
    }
    </script>