<?php
  session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'final_project');
  if($_SERVER["REQUEST_METHOD"]=="POST"){
      $user_id=$_POST["user_id"];
      $password=$_POST["passwordInput"];
      $username=$_POST["username"];
      $id=$_POST["id"];
      $check="SELECT * FROM account WHERE user_id='".$user_id."'";
      if(mysqli_num_rows(mysqli_query($conn,$check))==0){
          $sql="INSERT INTO account ( user_id, username, password, id)
            VALUES('".$user_id."','".$username."','".$password."','".$id."')";
          if(mysqli_query($conn, $sql)){
              echo "註冊成功!";
              echo "<a href='login.html'>點擊此處跳轉置登入頁面</a>";
              header("refresh:32;url=index.html");
              exit;
          }else{
              echo "Error creating table: " . mysqli_error($conn);
          }
      }
      else{
          echo "該帳號已被人使用!";
          echo "<a href='register.html'>未成功跳轉頁面請點擊此</a>";
          header('HTTP/1.0 302 Found');
          exit;
      }
  }
  mysqli_close($conn);
  function function_alert($message) { 
      echo "<script>alert('$message');
      window.location.href='login.html';
      </script>"; 
      return false;
  } 
?>