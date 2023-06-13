<?php
  session_start();
  $conn = mysqli_connect('localhost', 'root', '', 'final_project');

    //用二維陣列
    $player_info = array(
        array(0=>$_POST['playername_1'],1=>$_POST['id_1']),
        array(0=>$_POST['playername_2'],1=>$_POST['id_2']),
        array(0=>$_POST['playername_3'],1=>$_POST['id_3']),
        array(0=>$_POST['playername_4'],1=>$_POST['id_4']),
        array(0=>$_POST['playername_5'],1=>$_POST['id_5']),
        array(0=>$_POST['playername_6'],1=>$_POST['id_6']),
        array(0=>$_POST['playername_7'],1=>$_POST['id_7']),
        array(0=>$_POST['playername_8'],1=>$_POST['id_8']),
        array(0=>$_POST['playername_9'],1=>$_POST['id_9'])
    );

    $teamname = $_SESSION['team_name'];
    echo $teamname;
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $flag = 0;
        for($i = 0; $i < count($player_info); $i++){
            $player_name = $player_info[$i][0];
            $player_id = $player_info[$i][1];
            $sql = sprintf("INSERT INTO footballteam ( teamname, playername, id) VALUES('$teamname','$player_name','$player_id')");
            echo $player_name;
            if (mysqli_query($conn, $sql)) {
                echo "insert success";
            } 
            else{
                $flag = 1;
            }
        }

        if($flag == 0){
            echo "登錄隊員資訊成功，完成報名!";
            echo "<a href='/final_project/afterLog/index_afterLog.html'>點擊此處跳轉置主頁面</a>";
            header("refresh:32;url=/final_project/afterLog/index_afterLog.html");
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
        

    function function_alert($message) {     
        echo "<script>
        alert('$message');
        window.location.href='login.html';
        </script>"; 
        return false;
    } 
    $conn->close();
?>