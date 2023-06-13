<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'final_project');
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $user_id = $_SESSION['user_id'];
        $old_username = $_POST["old_username"];
        $new_username = $_POST["new_username"];
        $old_username_sql = "SELECT * FROM account WHERE username = '$old_username' AND  user_id ='$user_id'";
        if(mysqli_num_rows(mysqli_query($conn,$old_username_sql))==0){
            function_alert("舊使用者姓名輸入錯誤");
            return false;
        }
        if(mysqli_num_rows(mysqli_query($conn,$old_username_sql))==1){
            $sql="UPDATE account SET username = '$new_username' WHERE user_id='$user_id'";
            if(mysqli_query($conn,$sql)){
                echo "成功更改使用者姓名<br>";
                echo "<a href='/final_project/afterLog/index_afterLog.html'>回到首頁</a>";
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