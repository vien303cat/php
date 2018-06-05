<form action = "test0503.php" method="POST" enctype="multipart/form-data">

<table width="300" border="1" align="center">
  <tr>
    <td align="center" valign="middle">請選擇檔案啦</td>
  </tr>
  <tr>
    <td align="center" valign="middle"> <input type="file" name="upup[]"></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><input type="file" name="upup[]"</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><input type="file" name="upup[]"</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><input type="submit" value="上傳"></td>
  </tr>
</table>
</form>

<?php
    if(isset($_FILES["upup"]["name"]))
    {
        for($i=0 ; $i < count($_FILES["upup"]["name"]) ; $i++)
        {
            echo "<br>開始上傳第".($i+1)."個檔案..."."<br>檔案名稱:".$_FILES["upup"]["name"][$i] 
            ."<br>檔案大小:".$_FILES["upup"]["size"][$i]."KB"."<br>檔案類型:".$_FILES["upup"]["type"][$i] 
            ."<br>從".$_FILES["upup"]["tmp_name"][$i]."上傳<br><br>" ;

            copy($_FILES["upup"]["tmp_name"][$i] , "../image0503/".$_FILES["upup"]["name"][$i] );
        }
    }
    else
    {
        echo "no files!!!!!!!!" ;
    }

?>