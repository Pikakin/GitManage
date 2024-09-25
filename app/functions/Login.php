<?php

$_POST["exisUser"] = NULL;
if(isset($_POST["LoginButton"]) || isset($_POST["reloadToOwn"])){
    $users_array = array();
    $sql = "SELECT * FROM users";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $users_array = $statement;

    foreach($users_array as $users){
        if($_POST["LoginUsername"] == $users["username"] && $_POST["LoginPassword"] == $users["password"]){
            $_POST["exisUser"] = "true";
            $user = array("id"=> $users["id"], "username" => $users["username"]);
        }
    }
    if(is_null($_POST["exisUser"])){
        $error_message["exisUser"] = "ユーザ名またはパスワードが違います";
    }
}

if(isset($_POST["CreateButton"])){
    try {
        $new_accountname = $_POST["CreateUsername"];
        $new_password= $_POST['CreatePassword'];
        $sql = "INSERT INTO users(username, password) VALUES(:username, :password);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $new_accountname);
        $stmt->bindParam(':password', $new_password);
        $stmt->execute();
        $users_array = array();

        $sql = "SELECT * FROM users";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $users_array = $statement;

        $_POST["LoginUsername"] = $_POST["CreateUsername"];
        $_POST["LoginPassword"] = $_POST["CreatePassword"];
        foreach($users_array as $users){
            if($_POST["LoginUsername"] == $users["username"] && $_POST["LoginPassword"] == $users["password"]){
                $_POST["exisUser"] = "true";
                $user = array("id"=> $users["id"], "username" => $users["username"]);
            }
        }
        if(is_null($_POST["exisUser"])){
            $error_message["exisUser"] = "ユーザ名またはパスワードが違います";
        }
    } catch (PDOException $e) {
        $error_message["exisUser"] = "ユーザ名が重複しています";
    }

}
