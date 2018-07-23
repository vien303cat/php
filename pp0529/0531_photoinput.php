<?php
include_once("head.php");

if(!empty($_POST["title"]))
{
  $s_account = $_SESSION["user_account"];
  $s_title = $_POST["title"];
  $s_content = $_POST["content"];
  $photo_name = $_FILES["photo"]["name"];
  echo $photo_name;
  $photo_tmpname = $_FILES["photo"]["tmp_name"];
  $photo_type = $_FILES["photo"]["type"];
  if($photo_type == "image/jpeg"){$type = ".jpg";}
  if($photo_type == "image/png"){$type = ".png";}
  $photoname = date("YmdHis",$ss).$type ;
  $time = $ss2 ;
  $sql = "insert into member0531 value(NULL,'$s_account','$s_title','$s_content','$photoname','$ss2','1')";
  echo "傳送成功!!YAAAAAAAAAAAAAAAAAAAA<br>" ;
  mysqli_query($link,$sql);
  copy($photo_tmpname,"imagee/".$photoname);
  header("location:0531_photoadmin.php");
}

?>


<form method="post" action="" enctype="multipart/form-data">
<table width="600" border="2" align="center" cellpadding="2" cellspacing="0">
       <tr>
         <td colspan="2" align="center" valign="middle">呱呱叫新增系統</td>
       </tr>
       <tr>
         <td width="15%" align="center" valign="middle">標題</td>
         <td height="50" align="left" valign="middle"><input type="text" name="title" style="height:30px ;"/></td>
       </tr>
       <tr>
         <td width="15%" align="center" valign="middle">內文</td>
         <td height="50" align="left" valign="middle"><textarea name="content" style="height:70px ;"></textarea></td>
       </tr>
       <tr>
         <td align="center" valign="middle">圖片</td>
         <td height="50" align="left" valign="middle"><input type="file" name="photo"></td>
       </tr>
       <tr>
         <td height="50" colspan="2" align="center" valign="middle"><input type="submit" value="送出" /> </td>
       </tr>
     </table>
     </form>