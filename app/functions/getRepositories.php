<?php

try {

    // user_idが$user['id']のレコードを取得するクエリ
    $stmt = $pdo->prepare('SELECT * FROM repositories WHERE user_id = :user_id');
    $stmt->execute(['user_id' => $user['id']]);

    // 結果を取得し、repositories_arrayに代入
    $repositories_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>