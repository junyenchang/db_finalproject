<?php
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['id']);
	unset($_SESSION['user_id']);
	$conn = mysqli_connect('localhost', 'root', '', 'final_project');
	$user_id=$_POST['user_id'];
	$password=$_POST['password'];
	$password_hash=password_hash($password,PASSWORD_DEFAULT);
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		checkData($user_id, $password, $conn);
		/*$sql = "SELECT user_id,id,password FROM account WHERE user_id ='$user_id' AND password = '$password'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)==1 && $password==mysqli_fetch_assoc($result)["password"] ){

			$row = mysqli_fetch_assoc($result);
			echo "登入成功";
			$_SESSION['loggedin'] = true;
			$_SESSION['id'] = $row['id'];
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['LAST_ACTIVITY'] = $_SERVER['REQUEST_TIME'];
			setcookie("user_id", $row['user_id'], time()+3600);
			//header("Location:index_afterLog.html");
		}
		else{
				function_alert("帳號或密碼錯誤"); 
		}*/
	}
	function checkData($user_id, $password, $conn) {
		$sql = "SELECT user_id,id FROM account WHERE user_id ='$user_id' AND password = '$password'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 0) {
		  echo "帳號或密碼錯誤";
		  function_alert("帳號或密碼錯誤");
		} 
		else {
		  $row = mysqli_fetch_assoc($result);
		  echo "登入成功";
		  $_SESSION['login'] = true;
		  $_SESSION['id'] = $row['id'];
		  $_SESSION['user_id'] = $row['user_id'];
		  $_SESSION['LAST_ACTIVITY'] = $_SERVER['REQUEST_TIME'];
		  setcookie("user_id", $row['user_id'], time()+3600);
		  header("Location: afterLog/index_afterLog.html"); 
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