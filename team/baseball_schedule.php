<html>
    <link rel="stylesheet" type="text/css" href="main.css"> 
    <link rel="stylesheet" type="text/css" href="util.css">
    <title>棒球賽程</title>
    <body>
    <img src="images/schedule.png"/>
    <style>
    body {
        background-image: url('images/ball.png');
        opacity: 0.8;
        font-size: 200%;
    }
</style>
</body>
</html>

<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'final_project');
    $sql = "SELECT * FROM baseball ";
    $result = mysqli_query($conn, $sql);
    echo "<br>";
    if(mysqli_num_rows($result) == 8){
        $sql = "SELECT teamname FROM baseball WHERE NUM = 1 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'A = '. $row['teamname']. '、'; 

        $sql = "SELECT teamname FROM baseball WHERE NUM = 2 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'B = '. $row['teamname']. '、';

        $sql = "SELECT teamname FROM baseball WHERE NUM = 3 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'C = '. $row['teamname']. '、';

        $sql = "SELECT teamname FROM baseball WHERE NUM = 4 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'D = '. $row['teamname']. '、';

        $sql = "SELECT teamname FROM baseball WHERE NUM = 5 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'E = '. $row['teamname']. '、';

        $sql = "SELECT teamname FROM baseball WHERE NUM = 6 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'F = '. $row['teamname']. '、';

        $sql = "SELECT teamname FROM baseball WHERE NUM = 7 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'G = '. $row['teamname']. '、';

        $sql = "SELECT teamname FROM baseball WHERE NUM = 8 ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo 'H = '. $row['teamname']. '。';
        
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

    