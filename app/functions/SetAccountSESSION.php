<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST["LoginButton"])){
    $escaped["LoginUsername"] = htmlspecialchars($_POST["LoginUsername"], ENT_QUOTES | ENT_HTML5, "UTF-8");
    $_SESSION["LoginUsername"] = $escaped["LoginUsername"];

    $escaped["LoginPassword"] = htmlspecialchars($_POST["LoginPassword"], ENT_QUOTES | ENT_HTML5, "UTF-8");
    $_SESSION["LoginPassword"] = $escaped["LoginPassword"];
}

if(isset($_POST["CreateButton"])){

    $escaped["CreateUsername"] = htmlspecialchars($_POST["CreateUsername"], ENT_QUOTES | ENT_HTML5, "UTF-8");
    $_SESSION["CreateUsername"] = $escaped["CreateUsername"];
}
?>