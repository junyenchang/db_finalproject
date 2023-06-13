<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'final_project');
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $user_id = $_SESSION['user_id'];
        $old_id = $_POST["old_id"];
        $new_id = $_POST["new_id"];
        $old_id_sql = "SELECT * FROM account WHERE id = '$old_id' AND  user_id ='$user_id'";
        if(mysqli_num_rows(mysqli_query($conn,$old_id_sql))==0){
            function_alert("舊身分證字號輸入錯誤");
            return false;
        }
        if(mysqli_num_rows(mysqli_query($conn,$old_id_sql))==1){
            $sql="UPDATE account SET id = '$new_id'WHERE user_id='$user_id'";
            if(mysqli_query($conn,$sql)){
                echo "成功更改身分證字號<br>";
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