<style>
body{
    background-color:#000;
    margin:0px;
}
#mydiv{
    font-family:'微軟正黑體';
    width:100%;
    height:500px;
    background-color:#FFCCCC;
}
#talk{
    font-family:'微軟正黑體';
    width:800px;
    height:500px;
    background-color:#FFFF00;
    position:fixed;
    top:50%;
    left:50%;
    margin:-250px 0 0 -400px ;
}
#back{
    font-family:'微軟正黑體';
    height:100vh;
    width:100vw;
    background-color:rgba(0,0,0,0.4);
    position:fixed;
    top:0px;
    left:0px;
}
#look{
    font-family:'微軟正黑體';
    width:548px;
    height:480px;
    margin:200px 700px;
    background-image:url(img/black.gif);
    background-repeat:no-repeat;
}
#flan{
    font-family:'微軟正黑體';
    height:100vh;
    width:100vw;
    background-color:rgba(0,0,0,0.4);
    position:fixed;
    top:0px;
    left:0px;
    display:none;
}
#flanin{
    font-family:'微軟正黑體';
    width:868px;
    height:500px;
    margin:200px 600px;
    background-image:url(img/flandre.gif);
    background-repeat:no-repeat;
}
#butt{
    margin:200px 1220px;
    font-family:'微軟正黑體';
    position:fixed;
    cursor: pointer; /*鼠標*/
    display:block;
}
#but{
    margin:200px 1425px;
    font-family:'微軟正黑體';
    position:fixed;
    cursor: pointer; /*鼠標*/
    display:block;
}
</style>

<div id="mydiv"></div><br>
<div id="talk">
    <div style="width:180px;height:50px;font-family:'微軟正黑體';font-size:36px;margin:0 auto">請輸入文字</div>
    <div style="width:180px;height:50px;font-family:'微軟正黑體';font-size:36px;margin:0 auto">
    <input id="tlk" type="text"></div>
    <div style="width:180px;height:50px;font-family:'微軟正黑體';font-size:36px;margin:0 375">
    <input type="button" value="送出" onclick="talk_print()" style=""><br>
    <input type="button" value="取消" onclick="talk_out()"></div>
</div>

<input type="button" value="alert" onclick="a01()"><br><br>
<input type="button" value="confirm" onclick="a02()"><br><br>
<input type="button" value="prompt" onclick="a03()"><br><br>
<input type="button" value="JavaScript" onclick="a04()"><br><br>
<input type="button" value="吃大麥克" onclick="open_back()"><br><br>
<input type="button" value="看芙蘭" onclick="flan_open()"><br><br>

<div id="back" >  <!--全屏廣告設定-->
<input type="button" id="butt" value="X" onclick="close_back()">
 <div id="look" onclick="go_to()"></div>
</div>

<div id="flan" >  <!--全屏廣告設定-->
<input type="button" id="but" value="X" onclick="flan_close()">
 <div id="flanin" onclick="go_to()"></div>
</div>


<script>
function a01(){
    alert("alert!!");
}
function a02(){
    if(confirm("確認是否購買")){
        alert("買辣!!"); //選擇確定的結果
    }else{
        alert("沒錢辣!!");  //選擇取消的結果
    }
}
function a03(){
    var aaa;
    if( aaa = prompt("你想說什麼")){
        add_word( "哈士奇" ,aaa);
    }else{
        alert("請輸入!");
    }
}
function a04(){
    document.getElementById("talk").style.display="block";
}
function talk_out(){
    document.getElementById("talk").style.display="none";
    document.getElementById("tlk").value = "";
}
function talk_print(){
    wow = document.getElementById("tlk").value;
    talk_out();
    add_word("擊敗人",wow);
    document.getElementById("tlk").value = "";
}

function add_word(acc,tex){
    document.getElementById("mydiv").innerHTML = document.getElementById("mydiv").innerHTML + acc + "說:" + tex +"<br>";
}

/*廣告用的FUNCTION  */
function close_back(){
    document.getElementById("back").style.display="none";
}
function open_back(){
    document.getElementById("back").style.display="block";
}
function flan_open(){
    document.getElementById("flan").style.display="block";
}
function flan_close(){
    document.getElementById("flan").style.display="none";
}
function go_to(){
    // document.location.href="https://www.gamer.com.tw/";
    window.open('https://www.gamer.com.tw/','baha');
}
</script>