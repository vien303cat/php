<marquee scrollAmount=10><span style="color: #F00;font-size: 36px;font-family: '微軟正黑體';">介面簡陋請見諒，努力更新中^^"</span></marquee>
<?php
include_once("head.php");

if(!empty($_GET["text"])){
    $seq = $_GET["text"] ;
    $sql = "select * from cool_talk where cool_talk_seq = '$seq' " ;
    $c1 = mysqli_query($link,$sql); 
    $c2 = mysqli_fetch_assoc($c1);
    if(!empty($_POST["ouo"]) && $_POST["ouo"] == 1 ){
        $chtext = $_POST["chtext"];
        $sql = " update cool_talk set cool_talk_con = '$chtext' where cool_talk_seq ='$seq' ";
        mysqli_query($link,$sql);
        ?><script>alert('修改成功'); </script><?php

        header("Refresh:0;url=index.php");
    }

    ?>
    <form action="" method="post">
    <table width="90%" border="1" cellspacing="0" align="center" cellpadding="5">
    <tr>
    <td width="20%" align="left" valign="middle"><?=$c2["cool_talk_time"]?></td>
    <td width="60%" align="left" valign="middle">興趣是<?=$c2["cool_talk_int"]?>的 <span style="color: #F00;"><?=$c2["cool_talk_nick"]?></span> 說:
    <input type="text" style="width:60%; height:100%;" name="chtext" value="<?=$c2["cool_talk_con"]?>" /></td>
    <td width="10%" align="center" valign="middle"><input type="submit" value="修改" onclick="javascript:location.href='index.php'" /><input type="button" value="上一頁" onclick="javascript:location.href='index.php'"/></td>
    <input type="hidden" name="ouo" value="1" />
    </tr>
    </table>
    </form>
<?php } ?>



<?php
if(!empty($_GET["del"])){
    $seq = $_GET["del"] ;
    $sql = "select * from cool_talk where cool_talk_seq = '$seq' " ;
    $c1 = mysqli_query($link,$sql); 
    $c2 = mysqli_fetch_assoc($c1);
    $del = $_POST["del"];
        $sql = " update cool_talk set cool_talk_display = '0' where cool_talk_seq ='$seq' ";
        mysqli_query($link,$sql);
        ?><script>alert('刪除成功'); </script><?php

        header("Refresh:0;url=index.php");
}
?>