<?php
$link = mysqli_connect("localhost","root","","myphp_2018_07") ;
mysqli_query($link,"SET NAMES UTF8");
$sql = "select * from data0703" ;
$c1 = mysqli_query($link,$sql);
$c2 = mysqli_fetch_assoc($c1);
?>
  <script src="jquery-3.3.1.min.js"></script>
<table width="1024" border="1" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="20%" align="center" valign="middle">內容</td>
    <td width="20%" align="center" valign="middle">姓名</td>
    <td width="20%" align="center" valign="middle">電話</td>
    <td width="20%" align="center" valign="middle">地址</td>
    <td width="10%" align="center" valign="middle">操作</td>
  </tr>
  <?php do{ if($c2["data0703_display"] == 1){ ?> 
  <tr id="d<?=$c2["data0703_seq"]?>" ><!--要套用到JS 就必須給欄位ID 當欄位內容有改變的時候 呼叫FUNCTION以便隨時更改-->
    <td width="20%" align="center" valign="middle"><input type="text" id="con<?=$c2["data0703_seq"]?>" value="<?=$c2["data0703_con"]?>" 
    onchange="update('<?=$c2["data0703_seq"]?>','con')" onclick="save_now_word('con<?=$c2["data0703_seq"]?>')" /></td>
    <td width="20%" align="center" valign="middle"><input type="text" id="name<?=$c2["data0703_seq"]?>" value="<?=$c2["data0703_name"]?>" 
    onchange="update('<?=$c2["data0703_seq"]?>','name')" onclick="save_now_word('name<?=$c2["data0703_seq"]?>')" /></td>
    <td width="20%" align="center" valign="middle"><input type="text" id="phone<?=$c2["data0703_seq"]?>" value="<?=$c2["data0703_phone"]?>" 
    onchange="update('<?=$c2["data0703_seq"]?>','phone')" onclick="save_now_word('phone<?=$c2["data0703_seq"]?>')" /></td>
    <td width="20%" align="center" valign="middle"><input type="text" id="where<?=$c2["data0703_seq"]?>" value="<?=$c2["data0703_where"]?>" 
    onchange="update('<?=$c2["data0703_seq"]?>','where')" onclick="save_now_word('where<?=$c2["data0703_seq"]?>')" /></td>
    <td width="10%" align="center" valign="middle"><input type="button" value="刪除" onclick="del(<?=$c2["data0703_seq"]?>)"/></td>
  </tr>
  <?php } }while($c2 = mysqli_fetch_assoc($c1)) ?>
</table>
<script>
    var now_word = "";
    function save_now_word(nw){
        now_word = document.getElementById(nw).value;
    }
    function update(oo,xx){
        zz = xx+oo;
        if(confirm("確認是否修改")){
        vv = document.getElementById(zz).value;
        $.post("0703update_api.php",{xx,oo,vv},function(gg){
            alert("修改完成!");
        });}else{alert("不要亂改!"); document.getElementById(zz).value = now_word ;}
    }
    function del(ss){
        if(confirm("是否要刪除?")){
        $.post("0703delete_api.php",{ss},function(dd){
            document.getElementById("d"+ss).innerHTML=""; //清空欄位  
            // document.getElementById("d"+ss).style.display="none"; //隱藏欄位  
        }); }else{alert("那你按屁喔");}
    }

</script>