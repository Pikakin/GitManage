<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$patternUsername = '/^[a-zA-Z0-9]*$/';
$patternPassword = '/^[a-zA-Z0-9!@#$%^~]*$/';

if(isset($_POST["CreateButton"])){
    if (!(preg_match($patternUsername, $_POST["CreateUsername"]))) {
        $error_message["CreateUsername"] = "ユーザ名に使用できない文字が含まれています(使用可能文字：数字、英大文字、英小文字)";
    }
    else if (strlen($_POST["CreateUsername"]) > 39) {
        $error_message["CreateUsername"] = "ユーザ名の長さを39文字以内にしてください";
    }
    else if (!(preg_match($patternPassword, $_POST["CreatePassword"]))) {
        $error_message["CreatePassword"] = "パスワードに使用できない文字が含まれています(使用可能文字：数字、英大文字、英小文字、!、@、#、\$、%、^、~)";
    }
    else if (strlen($_POST["CreatePassword"]) < 8 || strlen($_POST["CreatePassword"]) > 32) {
        $error_message["CreatePassword"] = "パスワードの長さは8〜32文字にしてください";
    }
    else if ($_POST["CreatePassword"] != $_POST["CreateConfirmedPassword"]) {
        $error_message["CreatePass"] = "再入力されたパスワードが一致しません";
    }
    else {
        $_POST["isInputValueTrue"] = 'true';
    }
}
?>
