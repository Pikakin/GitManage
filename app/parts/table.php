<?php
include("app/functions/getIssues.php");
include("app/functions/getRepositories.php");
include("app/parts/header.php");
?>

    <div class="main-content">
        <div class="main-contentRepoWrapper">
            <div class="main-contentRepo">
                <form method="POST" style="margin-top: 10px; font-size: 17px;">
                    <label for="Title">イシュータイトル</label>
                    <input type="text" name="Title" id="Title" required><br>

                    <label for="Label">選択してください</label><br>
                    <input type="radio" name="Label" value="bug" required>バグ<br>
                    <input type="radio" name="Label" value="feature" required>機能要求<br>

                    <label for="Rank">優先順位</label>
                    <input type="number" name="Rank" id="Rank" required><br>

                    <label for="Status">進捗状況</label><br>
                    <input type="radio" name="Status" value="not_started" required>未着手<br>
                    <input type="radio" name="Status" value="in_progress" required>着手中<br>
                    <input type="radio" name="Status" value="completed" required>完了<br>

                    <label for="Commit_ID">イシューコミットID</label>
                    <input type="text" name="Commit_ID" id="Commit_ID" required><br>

                    <label for="Complete_ID">完了コミット</label>
                    <input type="text" name="Complete_ID" id="Complete_ID"><br>
                    <input type="hidden" name="reloadToOwn" value= true>
                    <input type="hidden" name="LoginUsername" value= '<?php echo $_POST["LoginUsername"]; ?>' >
                    <input type="hidden" name="LoginPassword" value= '<?php echo $_POST["LoginPassword"]; ?>' >
                    <input type="hidden" name="nowRepo" value= '<?php echo $_POST["nowRepo"]; ?>' >
                    <input type="hidden" name="nowRepoName" value= '<?php echo $_POST["nowRepoName"]; ?>' >

                    <input type="submit" id="submit" name="submit" value="submit">
                </form>
            </div>
        </div>
    </div>
   

<?php

$sql = "SELECT MAX(id) AS max_id FROM issues;";
$stmt = $pdo -> query($sql);
$row_max_id = $stmt -> fetch(PDO::FETCH_ASSOC);
$id = $row_max_id['max_id'] + 1;

if(isset($_POST['submit'])){
    
    $issue_title = $_POST['Title'];
    $label = $_POST['Label'];
    $priority = $_POST['Rank'];
    $status = $_POST['Status'];
    $commit_id = $_POST['Commit_ID'];
    $complete_id = $_POST['Complete_ID'];
    $repository_id = $_POST['nowRepo'];

    $sql = "INSERT INTO issues(id, issue_title, label, priority, status, issue_commit, complete_commit, repository_id) VALUES(:id, :issue_title, :label, :priority, :status, :commit_id, :complete_id, :repository_id);";
    $stmt = $pdo -> prepare($sql);
    $stmt -> bindParam(':id', $id);
    $stmt -> bindParam(':issue_title', $issue_title);
    $stmt -> bindParam(':label', $label);
    $stmt -> bindParam(':priority', $priority);
    $stmt -> bindParam(':status', $status);
    $stmt -> bindParam(':commit_id', $commit_id);
    $stmt -> bindParam(':complete_id', $complete_id);
    $stmt -> bindParam(':repository_id', $repository_id);

    $stmt -> execute();
}else{
    for($i = 1; $i <= $row_max_id['max_id']; $i++){ 
        if(isset($_POST[$i])){
            $sql = "UPDATE issues SET priority=:priority, status=:status,  complete_commit=:complete_commit WHERE id=:id;";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(':id', $i);
            $stmt -> bindParam(':priority', $_POST['Rank']);
            $stmt -> bindParam(':status', $_POST['Status']);
            $stmt -> bindParam(':complete_commit', $_POST['Complete_ID']);
            
            $stmt -> execute();
        }
    }
}

include("app/functions/getIssues.php");

if ($Issues_array) {
    echo '<center><table border="1">';
    echo '<tr><th>イシューID</th><th>イシューURL</th><th>タイトル</th><th>ラベル</th><th>イシューコミットID</th><th>状態</th><th>優先順位</th><th>完了コミットID</th></tr>';
    foreach ($Issues_array as $Issues) {
        echo '<tr>';
        echo '<td>' . $Issues['id'].'</td>';
        echo '<td><a href="https://github.com/'.$user["username"].'/'.$_POST['nowRepo'].'/commits/'.$Issues['issue_commit'].'">コミットURL<a></br>'; 
        echo '<a href="https://github.com/'.$user["username"].'/'.$_POST['nowRepo'].'/tree/'.$Issues['issue_commit'].'">ツリーURL<a></br>'; 
        echo '<a href="https://github.com/'.$user["username"].'/'.$_POST['nowRepo'].'/compare/'.$Issues['issue_commit'].'...'.$Issues['complete_commit'].'">コミット差分URL<a></br>'; 
        echo '</td>';
        echo '<td>' . ($Issues['issue_title']) . '</td>';
        echo '<td>' . ($Issues['label']) . '</td>';
        echo '<td>' . ($Issues['issue_commit']) . '</td>';
        $not_started = "";
        $in_progress = "";
        $completed = "";
        
        if(strcmp(($Issues['status']), "not_started") == 0){
            $not_started = "selected";
        }elseif(strcmp(($Issues['status']), "in_progress") == 0){
            $in_progress = "selected";
        }elseif(strcmp(($Issues['status']), "completed") == 0){
            $completed = "selected";
        }
        echo '<form method="POST">';
        echo '<td><select name="Status">';
        echo '<option value="not_started" '.$not_started.' required>未着手</option>';
        echo '<option value="in_progress" '.$in_progress.' required>着手中</option>';
        echo '<option value="completed" '.$completed.' required>完了</option>';
        echo '</select></td>';
        echo '<td><input type="number" name="Rank" id="Rank" value='.($Issues['priority']).' required><br></td>';
        echo '<td><input type="text" name="Complete_ID" id="Complete_ID" value='.($Issues['complete_commit']).'><br></td>';
        echo '<td><input type="submit" id="'.($Issues['id']).'" name="'.($Issues['id']).'" value="更新"></td>';
        echo '<input type="hidden" name="nowRepo" value= '. $_POST["nowRepo"] .' >';
        echo '<input type="hidden" name="nowRepoName" value= '. $_POST["nowRepoName"] .' >';
        echo '<input type="hidden" name="LoginUsername" value= ' . $_POST["LoginUsername"] .' >';
        echo '<input type="hidden" name="LoginPassword" value= ' . $_POST["LoginPassword"] .' >';
        echo '<input type="hidden" name="reloadToOwn" value= true >';
        echo '</form>';
        echo '</tr>';
    
    }
    echo '</table></center>';
} else {
    echo '<center>Not found.</center>';
}
echo '<center style="margin: 100px;">@ss21075</center>';
?>
