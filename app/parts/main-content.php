<?php
?>

<div class="main-contentWrapper">
    <div class="main-content">
        <div class="main-contentTitle">Home</div>
            <?php 
            foreach ($repositories_array as $repository){
                echo '<div class="main-contentRepoWrapper"><div class="main-contentRepo"><form id="repo" method="post">
                        <input type="hidden" name="reloadToOwn" value= "true">
                        <input type="hidden" name="LoginUsername" value= '. $_POST["LoginUsername"] .' >
                        <input type="hidden" name="LoginPassword" value= '. $_POST["LoginPassword"] .' >
                        <input type="hidden" name="nowRepo" value= ' . $repository["id"] . ' >
                        <input type="hidden" name="nowRepoName" value= ' . $repository["repository_name"] . ' >
                        <button type="submit" style="background: none; border: none; padding: 0;  font-size: 20px; color: #888;">
                            ' . $user["username"] . '/' . $repository["repository_name"] . '
                        </button>
                    </form>';
                $_POST['nowRepo'] = $repository["id"];
                include("app/functions/getIssues.php");
                if ($Issues_array) {
                    echo '<table border="1" style="font-size: 14px; margin: 10px; margin-bottom: 0px;">';
                    echo '<tr><th>イシューURL</th><th>タイトル</th><th>ラベル</th><th>状態</th></tr>';
                    foreach ($Issues_array as $Issues) {
                        echo '<tr>';
                        echo '<td><a href="https://github.com/'.$user["username"].'/'.$_POST['nowRepo'].'/commits/'.$Issues['issue_commit'].'">コミットURL<a></br>'; 
                        echo '<a href="https://github.com/'.$user["username"].'/'.$_POST['nowRepo'].'/tree/'.$Issues['issue_commit'].'">ツリーURL<a></br>'; 
                        echo '<a href="https://github.com/'.$user["username"].'/'.$_POST['nowRepo'].'/compare/'.$Issues['issue_commit'].'...'.$Issues['complete_commit'].'">コミット差分URL<a></br>'; 
                        echo '</td>';
                        echo '<td>' . ($Issues['issue_title']) . '</td>';
                        echo '<td>' . ($Issues['label']) . '</td>';
                        echo '<td>' . ($Issues['status']) . '</td>';
                    }
                    echo '</table>';
                } else {
                    echo '<center style="font-size: 14px; margin: 10px; margin-bottom: 0px;">Not found.</center>';
                }
                echo '</div></div>';
            }
            $_POST['nowRepo'] = NULL;
            ?>
    </div>
</div>