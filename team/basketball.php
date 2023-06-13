<?php
    session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'final_project');
    $user_id=$_SESSION['user_id'];
    $playername=$_POST['playername'];
    $id=$_POST['id'];
    $teamname=$_POST['team_name'];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "SELECT * FROM basketball WHERE user_id ='".$user_id."'";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)==0 ){//資料庫沒有相同的帳號
            do{$NUM = rand(1,8);
                $check=" SELECT * FROM basketball WHERE NUM ='".$NUM."'" ;
                }
                while(mysqli_num_rows(mysqli_query($conn,$check))==1);  
            $sql = "INSERT INTO basketball ( NUM, user_id, playername, id, teamname)
                VALUES('".$NUM."' ,'".$user_id."','".$playername."','".$id."','".$teamname."')";
            
            if(mysqli_query($conn, $sql)){
                    $sql_after = "SELECT teamname FROM basketball WHERE user_id = '$user_id'";
                    $result_after = mysqli_query($conn, $sql_after);
                    $row = mysqli_fetch_assoc($result_after);
                    $_SESSION['team_name'] = $row['teamname'];
                    echo "登錄隊長資訊成功，接下來請完成隊員報名!";
                    echo "<a href='basketball_team.html'>點擊此處進行隊員報名</a>";
                    header("refresh:32;url=basketball_team.html");
                    exit;
                }else{
                    echo "Error creating table: " . mysqli_error($conn);
                }
            }
        else{
                echo "您已經報名過該比賽，請勿重新報名!";
                echo "<a href='/final_Project/afterLog/index_afterLog.html'>未成功跳轉頁面請點擊此</a>";
                header('refresh:32;url=/final_project/index_afterLog.html');
                exit;
            }
        
    }
    mysqli_close($link);
    function function_alert($message) {     
        echo "<script>
        alert('$message');
        window.location.href='login.html';
        </script>"; 
        return false;
    } 
    $conn->close();
?>