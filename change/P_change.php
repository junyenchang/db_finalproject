<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'final_project');
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $user_id = $_SESSION['user_id'];
        $old_password = $_POST["old_password"];
        $new_password = $_POST["new_password"];
        $old_password_sql = "SELECT * FROM account WHERE password = '$old_password' AND  user_id ='$user_id'";
        if(mysqli_num_rows(mysqli_query($conn,$old_password_sql))==0){
            function_alert("舊密碼輸入錯誤");
            return false;
        }
        if(mysqli_num_rows(mysqli_query($conn,$old_password_sql))==1){
            $sql = "UPDATE account SET password = '$new_password' WHERE user_id='$user_id'";
            if(mysqli_query($conn,$sql)){
                echo "成功更改密碼<br>";
                echo "<a href='/final_project/login.html'>請點擊此重新登入</a>";
                header("refresh:32;url=/final_project/login.html");
                exit;
            }
            else{
                echo "Error creating table: " . mysqli_error($conn);
            }
        }
    }

    function function_alert($message) { 
        
        echo "<script>alert('$message');
        window.location.href='change.html';
        </script>"; 
        
        return false;
    } 
?>