<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'final_project');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user_id = $_SESSION['user_id'];
    $id = $_POST['id'];//使用者輸入的身分證字號
    $playername = "SELECT username FROM account WHERE id = '$id'";
    $check = "SELECT username FROM account WHERE user_id = '$user_id'";//檢查輸入的身分證字號對不對
    $result_playername = mysqli_query($conn, $playername);
    $result_check = mysqli_query($conn, $check);

    $row_playername = mysqli_fetch_assoc($result_playername);
    $row_check = mysqli_fetch_assoc($result_check);

    $check_account = "SELECT * FROM tennis WHERE id='$id' AND  user_id ='$user_id' ";
    
    if($row_playername == NULL){
        echo "請重新確認您的身分證字號是否輸入正確";
        echo "<a href='tennis_delete.html'>未成功跳轉頁面請點擊此</a>";
        header('refresh:32; url = tennis_delete.html');
    }
    else if($row_playername['username'] != $row_check['username']){
        echo "請重新確認您的身分證字號是否輸入正確";
        echo "<a href='tennis_delete.html'>未成功跳轉頁面請點擊此</a>";
        header('refresh:32; url = tennis_delete.html');
    }

    else if(mysqli_num_rows(mysqli_query($conn,$check_account))==0){
        echo "您並沒有報名此賽事<br>";
        echo "<a href= 'tennis.html'>請點擊此前往報名" ;
        return false;
    }
    if(mysqli_num_rows(mysqli_query($conn,$check_account))==1){
            $sql="DELETE FROM tennis WHERE user_id = '$user_id'";
            if(mysqli_query($conn,$sql)){
            echo "成功取消報名資格<br>";
            echo "<a href='/final_project/afterLog/team_signup.html'>請點擊此報名其他賽事</a>";
            }
        }
        else{
            echo "Error deleting table: " . mysqli_error($conn);
        }
    }
    


$conn->close();
?>