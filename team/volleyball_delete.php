<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'final_project');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user_id = $_SESSION['user_id'];
    $id = $_SESSION['id'];
    $teamname = $_POST["teamname"];
    $check_account = "SELECT * FROM volleyball WHERE id='$id' AND  user_id ='$user_id' ";
    if(mysqli_num_rows(mysqli_query($conn,$check_account))==0){
        echo "您並沒有報名此賽事<br>" ;
        return false;
    }
    if(mysqli_num_rows(mysqli_query($conn,$check_account))==1){
        $sql_team="DELETE FROM volleyballteam WHERE teamname = '$teamname'";
        if(mysqli_query($conn,$sql_team)){
            $sql="DELETE FROM  volleyball WHERE user_id = '$user_id'";
            if(mysqli_query($conn,$sql)){
            echo "成功取消報名資格<br>";
            echo "<a href='/final_project/afterLog/team_signup.html'>請點擊此報名其他賽事</a>";
            }
        }
        else{
            echo "Error deleting table: " . mysqli_error($conn);
        }
    }
}
    


$conn->close();
?>