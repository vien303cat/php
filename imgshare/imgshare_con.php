<?php
include_once("head.php");
if(empty($_SESSION["user"]))
{
    header("location:imgshare_login.php"); 
}   
$user = $_SESSION["user"] ;
$sql = "select * from imgshare_member";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$sql = "select * from imgshare_member where imgshare_member_acc = '$user'";
$iflog = mysqli_num_rows(mysqli_query($link,$sql));
if($iflog == 0){
    $_SESSION["user"]=""
    ?><script>
    alert('請登入，謝謝');   </script> <?php

    header("Refresh:0;url=imgshare_login.php");

}

if(!empty($_GET["goout"])){
    echo "已登出，1秒後跳轉至登入畫面";
    $his_sql = "insert into imgshare_history value(NULL,"."'$user',"."'登出',"."'$user'".",'$ip',"."'$real_time')";
    mysqli_query($link,$his_sql);
    $_SESSION["user"]="";
    header("Refresh:1; url=imgshare_login.php");
    exit();
}

if(!empty($_POST["title"]) )
{
  $user = $_SESSION["user"];
  $s_title = $_POST["title"];
  $s_content = $_POST["content"];
  $photo_name = $_FILES["photo"]["name"];
  $photo_tmpname = $_FILES["photo"]["tmp_name"];
  $photo_type = $_FILES["photo"]["type"];
  if($photo_type == "image/jpeg"){$type = ".jpg";}
  if($photo_type == "image/png"){$type = ".png";}
  if($photo_type == "image/gif"){$type = ".gif";}
  $photoname = date("YmdHis",$time).$type ;
  $sql = "insert into imgshare_con value(NULL,'$user','$s_title','$s_content','$photoname','$real_time')";
  mysqli_query($link,$sql);
  $his_sql = "insert into imgshare_history value(null,'$user','新增圖片','$photoname','$ip','$real_time')" ;
  mysqli_query($link,$his_sql);
  copy($photo_tmpname,"image/content/".$photoname);
}
?>

<form method="post" action="" enctype="multipart/form-data">
<table width="600" border="2" align="center" cellpadding="2" cellspacing="0">
       <tr>
         <td colspan="2" align="center" valign="middle">使用者:<?=$_SESSION["user"]?> 
                  <a href="imgshare_con.php?goout=1">登出</a>
                  <a href="imgshare_admin.php">管理者介面</a>
        </td>
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


<?php
$sql = "select * from imgshare_con";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);

?>

<table width="1024" border="2" align="center" cellpadding="2" cellspacing="0" style="background-color: rgba(255,255,255,0.5);">
  <tr>
    <td width="15%" align="center" valign="middle">帳號</td>
    <td width="15%" align="center" valign="middle">標題</td>
    <td width="20%" align="center" valign="middle">內文</td>
    <td width="20%" align="center" valign="middle">圖片</td>
    <td width="15%" align="center" valign="middle">時間</td>
  </tr>

  <?php do{ ?>
    <tr>
    <td width="15%" align="center" valign="middle"><?php echo $c2["imgshare_con_acc"] ; ?></td>
    <td width="15%" align="center" valign="middle"><?php echo $c2["imgshare_con_title"] ; ?></td>
    <td width="20%" align="center" valign="middle"><?php echo $c2["imgshare_con_con"] ; ?></td>
    <td width="20%" align="center" valign="middle"><img src="image/content/<?php echo $c2["imgshare_con_pho"];?>" width="100"> </td>
    <td width="15%" align="center" valign="middle"><?php echo $c2["imgshare_con_time"] ; ?></td>
    </tr>
    <?php }while($c2 = mysqli_fetch_assoc($c1) ) ?> 
  </table>

