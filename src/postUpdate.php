<?php
include_once('../repository/parameters.php');
try {
    $pdo = new PDO(DSN, USER, PASS);
} catch (Exception $exception) {
    echo "Problème de connexion à la base de donnée";
}
$date      = new DateTime();
$title     = $_POST['title'];
$dish      = $_POST['dish'];
$tool      = $_POST['tool'];
$content   = $_POST['content'];
$id        = $_POST['id'];
$updatedAt = $date->format('Y-m-d H:i:s');
$query     = 'UPDATE recipe SET title = :title, dish = :dish, tool = :tool, content = :content, updated_at = :updated_at WHERE id= :id';
$statement = $pdo->prepare($query);
$statement->bindValue(':title', $title, PDO::PARAM_STR);
$statement->bindValue(':dish', $dish, PDO::PARAM_STR);
$statement->bindValue(':tool', $tool, PDO::PARAM_STR);
$statement->bindValue(':content', $content, PDO::PARAM_STR);
$statement->bindValue(':updated_at', $updatedAt, PDO::PARAM_STR);
$statement->bindValue(':id', $id, PDO::PARAM_INT);

$statement->execute();

header('Location: ../public/index.php');
