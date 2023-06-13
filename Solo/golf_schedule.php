      
<html>
    <link rel="stylesheet" type="text/css" href="main.css"> 
    <link rel="stylesheet" type="text/css" href="util.css">
    <title>高爾夫球賽程</title>
    <body>
    <img src="images/schedule.png"/>
    
    </body>
</html>

<style>
    body {
        background-image: url('images/bal.png');
        opacity: 0.8;
        font-size: 200%;
    }
</style>

<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'final_project');
    $sql = "SELECT * FROM golf ";
    echo "<br>";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 8){
        $sql = "SELECT playername FROM golf WHERE NUM = 1 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'A = '. $row['playername']. '、'; 

        $sql = "SELECT playername FROM golf WHERE NUM = 2 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'B = '. $row['playername']. '、';

        $sql = "SELECT playername FROM golf WHERE NUM = 3 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'C = '. $row['playername']. '、';

        $sql = "SELECT playername FROM golf WHERE NUM = 4 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'D = '. $row['playername']. '、';

        $sql = "SELECT playername FROM golf WHERE NUM = 5 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'E = '. $row['playername']. '、';

        $sql = "SELECT playername FROM golf WHERE NUM = 6 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'F = '. $row['playername']. '、';

        $sql = "SELECT playername FROM golf WHERE NUM = 7 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'G = '. $row['playername']. '、';

        $sql = "SELECT playername FROM golf WHERE NUM = 8 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'H = '. $row['playername']. '。';
        
    }
    else{
        function_alert("報名尚未額滿，無法查看對戰組合");
    }
    function function_alert($message) {     
        echo "<script>
        alert('$message');
        window.location.href='/final_project/afterLog/news_afterLog.html';
        </script>";
        return false;
    } 

    