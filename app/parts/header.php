<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
.A {
    position: relative;
    display: inline-block;
    text-decoration: none;
}

.A::before {
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

.A::after {
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

.A:hover::before,
.A:hover::after {
    opacity: 1;
}
</style>
<link rel="stylesheet" href="assets/style.css" />
<section class="header">
    <div class="header-left">
        <form id="github-form" method="post">
            <input type="hidden" name="reloadToOwn" value= "">
            <input type="hidden" name="isCreateSelected" value= "" >
            <input type="hidden" name="isLoginSelected" value= "" >
            <input type="hidden" name="LoginUsername" value= "" >
            <input type="hidden" name="LoginPassword" value= "" >
            <button type="submit" style="background: none; border: none; padding: 0;">
                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M17 16L21 12M21 12L17 8M21 12L7 12M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8" stroke="#374151" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
            </button>
        </form>
        <form id="github-form" method="post">
            <input type="hidden" name="reloadToOwn" value= '<?php if(isset($_POST["exisUser"]))echo "true" ?>'>
            <input type="hidden" name="isCreateSelected" value= '<?php echo $_POST["isCreateSelected"];?>' >
            <input type="hidden" name="isLoginSelected" value= '<?php echo $_POST["isLoginSelected"];?>' >
            <input type="hidden" name="LoginUsername" value= '<?php if(isset($_POST["LoginUsername"]))echo $_POST["LoginUsername"];?>' >
            <input type="hidden" name="LoginPassword" value= '<?php if(isset($_POST["LoginPassword"]))echo $_POST["LoginPassword"];?>' >
            <button type="submit" style="background: none; border: none; padding: 0;">
                <svg class="github-icon" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974 0 4.406 2.857 8.145 6.821 9.465.499.09.679-.217.679-.481 0-.237-.008-.865-.011-1.696-2.775.602-3.361-1.338-3.361-1.338-.452-1.152-1.107-1.459-1.107-1.459-.905-.619.069-.605.069-.605 1.002.07 1.527 1.028 1.527 1.028.89 1.524 2.336 1.084 2.902.829.091-.645.351-1.085.635-1.334-2.214-.251-4.542-1.107-4.542-4.93 0-1.087.389-1.979 1.024-2.675-.101-.253-.446-1.268.099-2.64 0 0 .837-.269 2.742 1.021a9.582 9.582 0 0 1 2.496-.336 9.554 9.554 0 0 1 2.496.336c1.906-1.291 2.742-1.021 2.742-1.021.545 1.372.203 2.387.099 2.64.64.696 1.024 1.587 1.024 2.675 0 3.833-2.33 4.675-4.552 4.922.355.308.675.916.675 1.846 0 1.334-.012 2.41-.012 2.737 0 .267.178.577.687.479C19.146 20.115 22 16.379 22 11.974 22 6.465 17.535 2 12.026 2z"></path></svg>
            </button>
        </form>
        <?php 
        if(isset($_POST["nowRepo"])){
            echo "<span>".$user["username"]."/".$_POST["nowRepoName"]."</span>";
        }else if(isset($_POST["exisUser"])) {
            echo "<span>ようこそ！".$user["username"]."さん</span>"; 
        } else {
            echo "GitHub管理システムへようこそ";
        }
        ?>
    </div>
    <div style="margin-right: 70px; margin-top: 0px;">
        <img src="assets/moon.png" id="icon"/>
    </div>
</section>
<script>
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function applyDarkMode(isDarkMode) {
        if (isDarkMode) {
            document.body.classList.add("dark-modeBody");
            var loginBox = document.querySelector(".loginBox");
            if (loginBox) loginBox.classList.add("dark-modeForm");
            var createAccountBox = document.querySelector(".CreateAccountBox");
            if (createAccountBox) createAccountBox.classList.add("dark-modeForm");
            var errorMessage = document.querySelector(".errorMessage");
            if (errorMessage) errorMessage.classList.add("dark-modeError");
            document.querySelector("#icon").src = "assets/sun.png";
            document.querySelector(".header").classList.add("dark-modeHeader");
            document.querySelector(".github-icon path").style.fill = "white";
        } else {
            document.body.classList.remove("dark-modeBody");
            var loginBox = document.querySelector(".loginBox");
            if (loginBox) loginBox.classList.remove("dark-modeForm");
            var createAccountBox = document.querySelector(".CreateAccountBox");
            if (createAccountBox) createAccountBox.classList.remove("dark-modeForm");
            var errorMessage = document.querySelector(".errorMessage");
            if (errorMessage) errorMessage.classList.remove("dark-modeError");
            document.querySelector("#icon").src = "assets/moon.png";
            document.querySelector(".header").classList.remove("dark-modeHeader");
            document.querySelector(".github-icon path").style.fill = "rgba(35, 34, 34, 1)";
        }       
    }

    document.addEventListener("DOMContentLoaded", function() {
        var darkMode = getCookie('darkMode') === 'true';
        applyDarkMode(darkMode);
    });

    document.querySelector("#icon").onclick = function() {
        var isDarkMode = !document.body.classList.contains("dark-modeBody");
        applyDarkMode(isDarkMode);
        setCookie('darkMode', isDarkMode, 7);
    };
    function checkWidth() {
        // 画面の横幅を取得
        var width = window.innerWidth;
        // 横幅が1000px以上の場合に要素を表示
        if (width >= 1500) {
            document.getElementById("Right").style.display = "block";
        } else {
            document.getElementById("Right").style.display = "none";
        }
    }

    // ページがロードされたときと、画面サイズが変更されたときにチェック
    window.onload = checkWidth;
    window.onresize = checkWidth;

</script>
