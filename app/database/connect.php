<?php

$user = "root";
$pass = "yabuki";

//DBと接続
try{
    $pdo = new PDO("mysql:host=localhost;dbname=ss21075_GithubManageApp", $user, $pass);
    //echo "DB接続成功";
} catch(PDOException $error){
    echo $error->getMessage();
}