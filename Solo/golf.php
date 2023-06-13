<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'final_project');
    
    $id = $_POST['id'];//使用者輸入的身分證字號
    $user_id = $_SESSION['user_id'];//紀錄登入時的使用者

    $playername = "SELECT username FROM account WHERE id = '$id'";
    $check = "SELECT username FROM account WHERE user_id = '$user_id'";//檢查輸入的身分證字號對不對
    $result_playername = mysqli_query($conn, $playername);
    $result_check = mysqli_query($conn, $check);

    $row_playername = mysqli_fetch_assoc($result_playername);
    $row_check = mysqli_fetch_assoc($result_check);
    $sql = "SELECT * FROM golf";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) >= 8){
        echo "目前此項比賽報名名額已滿，無法報名~~~";
        echo "<a href='/final_project/afterLog/index_afterLog.html'>點此回到主頁面</a>";
        header('refresh:32; url = /final_project/afterLog/index_afterLog.html');
    }
    else if($row_playername == NULL){
        echo "請重新確認您的身分證字號是否輸入正確";
        echo "<a href='golf.html'>未成功跳轉頁面請點擊此</a>";
        header('refresh:32; url = golf.html');
    }

    else if($row_playername['username'] != $row_check['username']){
        echo "請重新確認您的身分證字號是否輸入正確";
        echo "<a href='golf.html'>未成功跳轉頁面請點擊此</a>";
        header('refresh:32; url = golf.html');
    }
    else{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $playername = $row_playername['username'] ;
            $sql = "SELECT * FROM golf WHERE user_id ='$user_id'";
            $result=mysqli_query($conn,$sql);
            if (mysqli_num_rows($result)==0 ){  //資料庫沒有相同的帳號
                do{$NUM = rand(1,8);
                    $check=" SELECT * FROM golf WHERE NUM ='".$NUM."'" ;
                    }
                    while(mysqli_num_rows(mysqli_query($conn,$check))==1);
                $sql_fin = "INSERT INTO golf ( NUM, user_id, playername, id) VALUES('$NUM','$user_id','$playername','$id')";
                if(mysqli_query($conn, $sql_fin)){
                        echo "登錄資訊成功，已經完成報名!";
                        echo "<a href='/final_project/afterLog/index_afterLog.html'>點擊此處跳轉置登入頁面</a>";
                        header("refresh:32;url= /final_project/afterLog/index_afterLog.html");
                        exit;
                    }else{
                        echo "Error creating table: " . mysqli_error($conn);
                    }
                }
            else{
                    echo "您已經報名過該比賽，請勿重新報名!";
                    echo "<a href=' /final_project/afterLog/team_signup.html'>未成功跳轉頁面請點擊此</a>";
                    header('refresh:32;url= /final_project/afterLog/team_signup.html');
                    exit;
                }
        }
    }

    function function_alert($message) {     
        echo "<script>
        alert('$message');
        window.location.href='index.html';
        </script>"; 
        return false;
    } 
    $conn->close();
?>