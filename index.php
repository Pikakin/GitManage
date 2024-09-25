<?php
include_once("./app/database/connect.php");
$error_message = array();
include_once("./app/functions/Login.php");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Github管理システム</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;400;500;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  </head> 
</head>
<body>
    <?php
      if(isset($_POST["nowRepo"])){
        include("app/parts/table.php");
      } else if(isset($_POST["createRepo"])){
        include("app/parts/createRepo.php");
      } else if(isset($_POST["exisUser"])){
        include("app/parts/dashboard.php");
      }else{
        include("app/functions/isAccountInfoSet.php");
      }
      ?>
</body>
</html>