<?php
include_once("head.php");
$cal = "select * from vendor0605";
$c1  = mysqli_query($link,$cal);
$c2  = mysqli_fetch_assoc($c1); //拉進vendor0605的公司
if(!empty($_POST["name"])&&!empty($_POST["company"]))
{
  
  $name = $_POST["name"];
  $money = $_POST["money"];
  $content = $_POST["content"];
  $company = $_POST["company"];
  $photo_name = $_FILES["photo"]["name"];
  $photo_tmpname = $_FILES["photo"]["tmp_name"];
  $sql="insert into admin0605 value(NULL,'$name','$money','$content','$company','$photo_name')";
  echo $sql."<br>已添加資料";
  mysqli_query($link,$sql);
  if(!empty($photo_name))
  {
  copy($photo_tmpname,"image/".$photo_name); 
  }
}

?>
<form method="post" action="" enctype="multipart/form-data">
<table width="1024" border="2" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="20%" align="center" valign="middle">產品名稱</td>
    <td width="20%" align="center" valign="middle">產品單價</td>
    <td width="20%" align="center" valign="middle">產品介紹</td>
    <td width="20%" align="center" valign="middle">產品廠商</td>
    <td width="20%" align="center" valign="middle">產品圖片</td>
  </tr>
  <tr>
    <td width="20%" align="center" valign="middle"><input type="text" name="name" /></td>
    <td width="20%" align="center" valign="middle"><input type="text" name="money" /></td>
    <td width="20%" align="center" valign="middle"><input type="text" name="content" /></td>
    <td width="20%" align="center" valign="middle">
    <select name="company" id="select">
      <option value="0">請選擇</option>
    <?php do { ?>
        <option value="<?=$c2["vendor0605_name"]?>"><?=$c2["vendor0605_name"]?></option>
    <?php }while($c2 = mysqli_fetch_assoc($c1)); ?>
    </select>
    </td>
    <td width="20%" align="center" valign="middle"><input type="file" name="photo"></td>

  </tr>
  <tr>
    <td colspan="5" align="center" valign="middle"><input type="submit" value="新增"></td>
  </tr>
</table>
</form>


<br><br><br>


<?php
$cal = "select * from admin0605";
$c1  = mysqli_query($link,$cal);
$c2  = mysqli_fetch_assoc($c1);
?>

<table width="1024" border="2" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="20%" align="center" valign="middle">產品名稱</td>
    <td width="20%" align="center" valign="middle">產品單價</td>
    <td width="20%" align="center" valign="middle">產品介紹</td>
    <td width="20%" align="center" valign="middle">產品廠商</td>
    <td width="20%" align="center" valign="middle">產品圖片</td>
  </tr>
  
  <?php do { ?>
  <tr>
    <td width="20%" align="center" valign="middle"><?=$c2["admin0605_name"]?></td>
    <td width="20%" align="center" valign="middle"><?=$c2["admin0605_money"]?></td>
    <td width="20%" align="center" valign="middle"><?=$c2["admin0605_content"]?></td>
    <td width="20%" align="center" valign="middle"><?=$c2["admin0605_company"]?></td>
    <td width="20%" align="center" valign="middle"><img src="image/<?=$c2["admin0605_photo"]?>" width="100">  </td>
  </tr>
  <?php }while($c2 = mysqli_fetch_assoc($c1)); ?>
  <tr>
    <td colspan="5" align="center" valign="middle"><a href="vendor0605_admin.php">回到廠商列表</a></td>
  </tr>
</table>