<?php
 
    session_start(); 
    if(isset($_SESSION['login'])){
        $_SESSION = array();
        echo session_name();
        if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-3600);
        }
    }
    setcookie("user_id", "", time()-3600);
    session_destroy(); 
    header("Location: index.html"); 
