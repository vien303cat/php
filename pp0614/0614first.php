
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
  <form action="0614creat.php" method="POST" name="cool">
<table width="1024" border="2" align="center" cellspacing="0" cellpadding="2">
  <tr>
    <td width="10%" align="center" valign="middle">帳號</td>
    <td align="center" valign="middle"><input name="ac" id="ac" size="100" type="text"></td>
  </tr>
  <tr>
    <td width="10%" align="center" valign="middle">密碼</td>
    <td align="center" valign="middle"><input name="pw" id="pw" size="100" type="password"></td>
  </tr>
  <tr>
    <td width="10%" align="center" valign="middle">姓名</td>
    <td align="center" valign="middle"><input name="nam" id="nam" size="100" type="text"></td>
  </tr>
  <tr>
    <td width="10%" align="center" valign="middle">電話</td>
    <td align="center" valign="middle"><input name="phone" id="phone" size="100" type="text"></td>
  </tr>
  <tr>
    <td width="10%" align="center" valign="middle">地址</td>
    <td align="center" valign="middle"><input name="loc" id="loc" size="100" type="text"></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" >

      <div id="hot" style="background-image:url(img/a03.png); background-color:#FFF;background-size:100% 100%;width:114px;height:111px;" 
      ></div><br>

      <div style="background-image:url(img/a02.png); background-color:#FFF;background-size:100% 100%;width:114px;height:111px;" 
      onclick="xxx();"></div><br>

      <a href="javascript:xxx();"><img src="img/a01.png" width="114" height="111"></a><br>

      <input type="submit" value="" style="background-color:#FFF; border-style: none; background-image:url(img/a04.png); width: 114px; height: 111px;background-size:100% 100%;"/>
    </td>
  </tr>
</table>
</form>
</body>

<script>
  function xxx()
  {
    document.cool.submit(); //指定的form(name = cool) 執行submit;
  }
  document.getElementById("hot").onclick=function(){
    xxx();
  }
</script>
