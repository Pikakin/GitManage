<?php

?>

<div class="left-contentWrapper">
    <div class="left-content">
        <span> 
            <div class="left-contentTitle">Top repositories</div>
            <?php 
            echo '<form id="repo" method="post">
                    <input type="hidden" name="reloadToOwn" value= "true">
                    <input type="hidden" name="createRepo" value= "true">
                    <input type="hidden" name="LoginUsername" value= '. $_POST["LoginUsername"] .' >
                    <input type="hidden" name="LoginPassword" value= '. $_POST["LoginPassword"] .' >
                    <button type="submit">
                        New ..
                    </button>
                </form>';
        ?>
        </span>
        <?php 
        foreach ($repositories_array as $repository){
            echo '<form id="repo" method="post">
                    <input type="hidden" name="reloadToOwn" value= "true">
                    <input type="hidden" name="LoginUsername" value= '. $_POST["LoginUsername"] .' >
                    <input type="hidden" name="LoginPassword" value= '. $_POST["LoginPassword"] .' >
                    <input type="hidden" name="nowRepo" value= ' . $repository["id"] . ' >
                    <input type="hidden" name="nowRepoName" value= ' . $repository["repository_name"] . ' >
                    <button type="submit" style="background: none; border: none; padding: 0; font-size: 17px; color: #888;">
                        ' . $user["username"] . '/' . $repository["repository_name"] . '
                    </button>
                </form>';
        }
        ?>
    </div>
</div>