<?php
include("app/parts/header.php");
include("app/functions/checkInputedValue.php");
include("app/parts/PrintValueError.php");
?>
<style>
a {
    position: relative;
    display: inline-block;
    text-decoration: none;
}

a::before {
    pointer-events: none;
    opacity: 0;
    transition: all .3s ease;

    content: "";
    width: 0;
    height: 0;
    position: absolute;

    transform: translate(-50%, 0);
    left: 50%;
    bottom: calc(100% - 5px);
    border: 5px solid transparent;
    border-top-color: #000;
}

a::after {
    pointer-events: none;
    opacity: 0;
    transition: all .3s ease;

    content: attr(aria-label);
    position: absolute;
    white-space: nowrap;
    width: auto;
    background: #000;
    color: #fff;
    padding: 5px 10px;
    border-radius: 3px;
    font-size: 12px;
    font-family: "Noto Sans JP", sans-serif;
    transform: translate(-50%, 0);
    left: 50%;
    bottom: calc(100% + 5px);
}

a:hover::before,
a:hover::after {
    opacity: 1;
}
*
input[type="text"],
input[type="password"] {
    margin-bottom: 7px;
    padding: 4px;
    padding-left: 10px;
    width: 215px;
    height: 27px;
    border: none;
    outline: none;
    border-bottom: 2px solid #aaa;
    font-weight: 400;
    font-size: 16px;
    transition: 0.3s ease;
    font-family: "Noto Sans JP", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    border-radius: 5px;
}

input[type="submit"] {
    margin-top: 25px;
    margin-bottom: 20px;
    width: 160px;
    height: 50px;
    font-size: 18px;
    background-color: #9b6025;
    border: none;
    border-radius: 2px;
    color: #fff;
    font-weight: 500;
    transition: 0.3s all;
    cursor: pointer;
    border-radius: 7px;
    font-family: "Noto Sans JP", sans-serif;
}

input[type="submit"]:hover {
    background-color: #794b1d;
}
</style>
<div id="loginForm">
    <details name="AccountForm" <?php if($_POST["isLoginSelected"] == "true")echo 'open'; ?>>
        <summary style='font-family: "Rampart One", sans-serif; font-weight: 400; font-style: normal; font-size: 30px; margin-left: 90px;'>ログインする</summary>
        <div class="loginBox">
            <form method="POST">
                <h1 style='font-family: "Rampart One", sans-serif; font-weight: 400; font-style: normal; font-size: 50px;'>ログイン</h1>
                <div style="margin-bottom: 10px; font-size: 15px; font-weight: 500; margin-left: 2px;"><label>Username</label></div>
                <input type="text" name="LoginUsername" required value='<?php if(isset($_POST["LoginUsername"])) echo $_POST["LoginUsername"]?>'/>
                <div style="margin-bottom: 8px; font-size: 15px; font-weight: 500; margin-left: 2px;"><label>Password</label></div>
                <input type="password" name="LoginPassword" required/>
                <input type="hidden" name="isCreateSelected" value= '<?php echo "false";?>'>
                <input type="hidden" name="isLoginSelected" value= '<?php echo "true";?>'>
                <input type="submit" name="LoginButton" value="ログイン" />
            </form>
        </div>
    </details>
    
    <details name="AccountForm" <?php if($_POST["isCreateSelected"] == "true")echo 'open'; ?>>
        <summary style='font-family: "Rampart One", sans-serif; font-weight: 400; font-style: normal; font-size: 30px; margin-right: 80px;'>アカウントを作成</summary>
        <div class="CreateAccountBox">
            <form method="POST">
                <h1 style='font-family: "Rampart One", sans-serif; font-weight: 400; font-style: normal; font-size: 40px;'>アカウント作成</h1>
                <div style="margin-bottom: 10px; font-size: 15px; font-weight: 500; margin-left: 2px;"><label><a aria-label="使用可能文字：数字、英大文字、英小文字（３９文字以内）">Username</a></label></div>
                <input type="text" name="CreateUsername" required value='<?php if(isset($_POST["CreateUsername"])) echo $_POST["CreateUsername"]?>'/>
                <div style="margin-bottom: 10px; font-size: 15px; font-weight: 500; margin-left: 2px;"><label><a aria-label="使用可能文字：数字、英大文字、英小文字、!、@、#、$、%、^、~（８〜３２文字）">Password</a></label></div>
                <input type="password" name="CreatePassword" required/>
                <div style="margin-bottom: 10px; font-size: 15px; font-weight: 500; margin-left: 2px;"><label>Confirm Password</label></div>
                <input type="password" name="CreateConfirmedPassword"  required/>
                <input type="hidden" name="isCreateSelected" value= '<?php echo "true";?>'>
                <input type="hidden" name="isLoginSelected" value= '<?php echo "false";?>'>
                <input type="submit" name="CreateButton" value="アカウント作成" />
            </form>
        </div>
    </details>
</div>
<center style="margin: 100px;">@ss21075</center>
