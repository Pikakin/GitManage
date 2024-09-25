<?php

try {

    $stmt = $pdo->prepare('SELECT * FROM issues WHERE repository_id = :repository_id');
    $stmt->execute(['repository_id' => $_POST['nowRepo']]);

    $Issues_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>