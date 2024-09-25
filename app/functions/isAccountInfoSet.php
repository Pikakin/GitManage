<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

//ログインしたことがあるか
if(isset($_SESSION["Loginusername"]) && isset($_SESSION["LoginPassword"])){
    include("app/parts/LoginForm.php");
}

else{
   //LPからログインボタン等を押したかどうか
    if(isset($_POST["isLoginSelected"]) || isset($_POST["isCreateSelected"])){
        //入力内容にエラーがあるか
        include("app/functions/checkInputedValue.php");
        //エラーが無い
        if(isset($_POST["isInputValueTrue"]))
            include("app/parts/LoginForm.php");
        else{
            include("app/parts/LoginForm.php");
        }
    }
    else{
        include("app/parts/Landing_Page.php");
    } 
}
    

    