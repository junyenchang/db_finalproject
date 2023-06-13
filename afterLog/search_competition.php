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
    $user_id = $_SESSION['user_id'];
    echo "<br><br><br><br><br><br><br><br>";
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您的  ID  是  " ' . $user_id;
    $sql_badminton = "SELECT * FROM badminton WHERE user_id ='".$user_id."'";
    $result=mysqli_query($conn,$sql_badminton);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row = mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $username = $row['playername'];
        echo '  "   你已經報名了羽球，報名資訊如下: 您的身分證字號: "   ' . $id . '    " ,您報名時使用的名字 "  ' . $username.'     "     ' ;
        echo "<a href= /final_project/afterLog/team_cancel.html>如欲取消報名請點擊此處 </a>";
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名羽球比賽。    ' ;
        echo "<a href= /final_project/Solo/badminton.html>如欲報名請點擊此處 </a>" ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_golf = "SELECT * FROM golf WHERE user_id ='".$user_id."'";
    $result=mysqli_query($conn,$sql_golf);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $username = $row['playername'];
        echo '  "   你已經報名了高爾夫球，報名資訊如下: 您的身分證字號: "   ' . $id . '    " ，您報名時使用的名字 "  ' . $username.'     "     ' ;
        echo "<a href= /final_project/afterLog/team_cancel.html>如欲取消報名請點擊此處 </a>";
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名高爾夫球比賽。    ' ;
        echo "<a href= /final_project/Solo/golf.html>如欲報名請點擊此處 </a>" ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_tennis = "SELECT * FROM tennis WHERE user_id ='".$user_id."'";
    $result=mysqli_query($conn,$sql_tennis);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $username = $row['playername'];
        echo '  "   你已經報名了網球，報名資訊如下: 您的身分證字號: "   ' . $id . '    " ，您報名時使用的名字 "  ' . $username.'     "     ';
        echo "<a href= /final_project/afterLog/team_cancel.html>如欲取消報名請點擊此處 </a>";
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名網球比賽。    ' ;
        echo "<a href= /final_project/Solo/tennis.html>如欲報名請點擊此處 </a>" ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_baseball = "SELECT * FROM baseball WHERE user_id ='".$user_id."'";
    $result=mysqli_query($conn,$sql_baseball);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $username = $row['playername'];
        echo '  "   你已經報名了棒球，報名資訊如下: 您的身分證字號: "   ' . $id . '    " ，您報名時使用的名字 "  ' . $username.'     "     ';
        echo "<a href= /final_project/afterLog/team_cancel.html>如欲取消報名請點擊此處 </a>";
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名棒球比賽。    ' ;
        echo "<a href= /final_project/team/baseball.html>如欲報名請點擊此處 </a>" ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_basketball = "SELECT * FROM basketball WHERE user_id ='".$user_id."'";
    $result=mysqli_query($conn,$sql_basketball);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $username = $row['playername'];
        echo '  你已經報名了籃球，報名資訊如下: 您的身分證字號: ' . $id . ',您報名時使用的名字' . $username ;
        echo "<a href= /final_project/afterLog/team_cancel.html>如欲取消報名請點擊此處 </a>";
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名籃球比賽。    ' ;
        echo "<a href= /final_project/team/basketball.html>如欲報名請點擊此處 </a>" ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_football = "SELECT * FROM football WHERE user_id ='".$user_id."'";
    $result=mysqli_query($conn,$sql_football);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $username = $row['playername'];
        echo '  你已經報名了橄欖球，報名資訊如下: 您的身分證字號: ' . $id . ',您報名時使用的名字' . $username ;
        echo "<a href= /final_project/afterLog/team_cancel.html>如欲取消報名請點擊此處 </a>";
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名橄欖球比賽。  ' ;
        echo "<a href= /final_project/team/football.html>如欲報名請點擊此處 </a>" ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_soccer = "SELECT * FROM soccer WHERE user_id ='".$user_id."'";
    $result=mysqli_query($conn,$sql_soccer);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $username = $row['playername'];
        echo ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;你已經報名了足球，報名資訊如下: 您的身分證字號: ' . $id . ',您報名時使用的名字' . $username ;
        echo "<a href= /final_project/afterLog/team_cancel.html>如欲取消報名請點擊此處 </a>";
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名足球比賽。    ' ;
        echo "<a href= /final_project/team/soccer.html>如欲報名請點擊此處 </a>" ;
        echo ' <br> ' . ' <br> ';
    }
    $sql_volleyball = "SELECT * FROM volleyball WHERE user_id ='".$user_id."'";
    $result=mysqli_query($conn,$sql_volleyball);
    if (mysqli_num_rows($result)==1 ){  //資料庫有報名的帳號
        $row=mysqli_fetch_assoc($result) ;
        $id = $row['id'];
        $username = $row['playername'];
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;你已經報名了排球，報名資訊如下: 您的身分證字號: ' . $id . ',您報名時使用的名字' . $username ;
        echo "<a href= /final_project/afterLog/team_cancel.html>如欲取消報名請點擊此處 </a>";
        echo ' <br> ' . ' <br> ';
    }
    else{
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您並沒有報名排球比賽。    ' ;
        echo "<a href= /final_project/team/volleyball.html>如欲報名請點擊此處 </a>" ;
        echo ' <br> ' . ' <br> ';
    }
?>