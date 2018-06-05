<form action = "0510SQLPHPtest.php" method="POST" >
    要搜尋哪種動物:
    <input type = "text" name="AN" ><br>
    <input type = "submit" >

    <?php

    if(!empty($_POST["AN"]))
    {
        $link = mysqli_connect("localhost","root","","re2018");
        mysqli_query($link , "SET NAMES UTF8");
        $YOO = $_POST["AN"];
        $data = " SELECT * FROM zoo0510 where zoo0510_name = '$YOO' "; //單引號一定要在雙引號裡面
        $ro   = mysqli_query($link,$data);
        $row  = mysqli_fetch_assoc($ro);
        $cnt  = mysqli_num_rows($ro);  

        if($cnt != 0)
        {
            echo $row["zoo0510_name"]."喜歡吃:".$row["zoo0510_food_type"]."  數量有".$row["zoo0510_cnt"]."隻"."<br>";
        }
        else
        {
            echo "<br>查無此動物 認真點";
        }
    }

    ?>