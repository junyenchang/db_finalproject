<html>
    <link rel="stylesheet" type="text/css" href="main.css"> 
    <link rel="stylesheet" type="text/css" href="util.css">
    <title>您報名的比賽賽程</title>
    <body></body>
</html>
<style>
@import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.overlay {
	margin-top: 70px;
}

.form-signin {
	display: flex;
	border-radius: 10px;
	flex-direction: column;
	align-items: center;
}

.field-set{
	display: flex;
	flex-direction: column;
}

body {
	background-attachment: fixed;
  	background-repeat: no-repeat;
	background-image: linear-gradient(to top, #d1fdff 0%, #fddb92 100%);
    font-family: 'Vibur', cursive;
    font-family: 'Abel', sans-serif;
	opacity: .95;
    font-family: 'Playfair Display', serif;
    color: #3e403f;
}

form {
    width: 450px;
    min-height: 500px;
    height: auto;
    border-radius: 5px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 2%;
    background-image: linear-gradient(-223deg, #d1fdff 50%, #fddb92 50%);
}

form .con {
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: space-around;
    justify-content: space-around;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    margin: 0 auto;
}

header {
    margin: 2% auto 10% auto;
    text-align: center;
}

header h2 {
    font-size: 250%;
    font-family: 'Playfair Display', serif;
    color: #3e403f;
}

header p {letter-spacing: 0.05em;}

.input-item {
    background: #fff;
    color: #333;
    padding: 14.5px 0px 15px 9px;
    border-radius: 5px 0px 0px 5px;
}

input[class="form-input"]{
    width: 300px;
    height: 50px;
  
    margin-top: 2%;
    padding: 15px;
    
    font-size: 16px;
    font-family: 'Abel', sans-serif;
    color: #5E6472;
  
    outline: none;
    border: none;
  
    border-radius: 0px 5px 5px 0px;
    transition: 0.2s linear;
    
}
input[id="txt-input"] {
	width: 250px;
}

input:focus {
    transform: translateX(-2px);
    border-radius: 5px;
}

button {
    display: inline-block;
    color: #252537;
    width: 280px;
    height: 50px;
    padding: 0 20px;
    background: #fff;
    border-radius: 5px;
    outline: none;
    border: none;
    cursor: pointer;
    text-align: center;
    transition: all 0.2s linear;
    margin: 7% auto;
    letter-spacing: 0.05em;
}
.submits {
    width: 50%;
    display: inline-block;
    float: left;
    margin-left: 2%;
}

.sign-up {
	background: #B8F2E6;
	margin: auto;
}	

button:hover {
    transform: translatey(3px);
    box-shadow: none;
}

button:hover {
    animation: ani9 0.4s ease-in-out infinite alternate;
}
@keyframes ani9 {
    0% {
        transform: translateY(3px);
    }
    100% {
        transform: translateY(5px);
    }
}
</style>
<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'final_project');
    $id=$_POST['id'];
    echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您的身分證是' . $id;
    $sql_footballteam = "SELECT * FROM footballteam WHERE id ='".$id."'";
    $result=mysqli_query($conn,$sql_footballteam);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $teamname = $row['teamname'];
        echo '你已經報名了橄欖球賽，報名資訊如下: 您的身分證字號: ' . $id . ',您的隊伍名稱' . $teamname.' <br> ' ;
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名橄欖球賽' ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_baseballteam = "SELECT * FROM baseballteam WHERE id ='".$id."'";
    $result=mysqli_query($conn,$sql_baseballteam);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $teamname = $row['teamname'];
        echo '你已經報名了棒球賽，報名資訊如下: 您的身分證字號: ' . $id . ',您的隊伍名稱' . $teamname ;
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名棒球賽' ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_soccerteam = "SELECT * FROM soccerteam WHERE id ='".$id."'";
    $result=mysqli_query($conn,$sql_soccerteam);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $teamname = $row['teamname'];
        echo '你已經報名了足球賽，報名資訊如下: 您的身分證字號: ' . $id . ',您的隊伍名稱' . $teamname ;
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名足球賽' ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_volleyballteam = "SELECT * FROM volleyballteam WHERE id ='".$id."'";
    $result=mysqli_query($conn,$sql_volleyballteam);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $teamname = $row['teamname'];
        echo '你已經報名了排球賽，報名資訊如下: 您的身分證字號: ' . $id . ',您的隊伍名稱' . $teamname ;
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名排球賽' ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_basketballteam = "SELECT * FROM basketballteam WHERE id ='".$id."'";
    $result=mysqli_query($conn,$sql_basketballteam);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $teamname = $row['teamname'];
        echo '你已經報名了籃球賽，報名資訊如下: 您的身分證字號: ' . $id . ',您的隊伍名稱' . $teamname ;
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名籃球賽' ;
        echo ' <br> ' . ' <br> ';
    }
?>