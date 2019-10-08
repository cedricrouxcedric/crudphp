<?php
include_once ('../repository/parameters.php');
try {
    $pdo = new PDO(DSN, USER, PASS);
} catch (Exception $exception) {
    echo "Problème de connexion à la base de donnée";
}
$query     = 'SELECT * FROM recipe';
$statement = $pdo->query($query);
$recipes   = $statement->fetchAll(PDO::FETCH_ASSOC);
