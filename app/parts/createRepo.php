<?php
include("app/parts/header.php");
?>
<div class="main-content">
        <div class="main-contentRepoWrapper">
            <div class="main-contentRepo">
                <form method="POST" style="margin-top: 10px;">
                    <label style="font-size: 30px">レポジトリーを追加</label><br>
                    <input type="text" name="newRepo" id="newRepo" placeholder="レポジトリー名を入力..." required><br>

                    <input type="hidden" name="reloadToOwn" value= true>
                    <input type="hidden" name="createRepo" value= true>
                    <input type="hidden" name="LoginUsername" value= '<?php echo $_POST["LoginUsername"]; ?>' >
                    <input type="hidden" name="LoginPassword" value= '<?php echo $_POST["LoginPassword"]; ?>' >
                    <input type="hidden" name="nowRepoName" value= '<?php echo $_POST["nowReponame"]; ?>' >

                    <input type="submit" id="submit" name="submit" value="submit">
                </form>
            </div>
        </div>
    </div>
    
<?php

if(isset($_POST['submit'])){
    try{
    $repository_name = $_POST['newRepo'];
    $user_id = $user['id'];


    $sql = "INSERT INTO repositories(repository_name, user_id) VALUES(:repository_name, :user_id);";
    $stmt = $pdo -> prepare($sql);
    $stmt -> bindParam(':repository_name', $repository_name);
    $stmt -> bindParam(':user_id', $user_id);
    $stmt -> execute();
    }catch(PDOException $e){
        echo "<center style='color: red;'>レポジトリーを作成できませんでした</center>";
    };
}
?>
<center style="margin: 100px;">@ss21075</center>
