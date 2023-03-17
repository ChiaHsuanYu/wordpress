<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="expires" content="0">
        <meta http-equiv="cache-control" content="no-cache">
        <script src="./javascript/jquery-3.1.1.min.js"></script>
        <script src="./javascript/login.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <title>余家瑄的個人履歷</title>
    </head>
    <input type="hidden" id="base_url" value="http://localhost/wordpress/">
    <body class="loginBody">
        <div class="loginBg">
            <div class="loginTitle">余家瑄的個人履歷</div>
                <div class="loginBox">
                    <label for="account">帳號</label><input type="text" id="account" maxlength="30"><br />
                    <label for="password">密碼</label><input type="password" id="password" maxlength="30"><br />
                    <div class="alertMsg" id="alertMsg"></div>
                    <hr>
                    <input type="button" class="button width_60px" value="登入" onclick="login();"/>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 
    session_start();

    // 判斷是否執行登出動作
    if(isset($_GET['action']) && isset($_SESSION['user_info'])){
        if($_GET['action'] == 'logout'){
            // 呼叫登出API
            echo "<script> logout(); </script>";
        }
    }
    
?>