<?php
if (isset($_GET['id'])) {
    include_once('../repository/parameters.php');
    try {
        $pdo = new PDO(DSN, USER, PASS);
    } catch (Exception $exception) {
        echo "Problème de connexion à la base de donnée";
    }
    $id = $_GET['id'];

    $query = 'SELECT * FROM recipe WHERE id = :id';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $recipeData = $statement->fetch();
    $title = $recipeData['title'];
    $dish = $recipeData['dish'];
    $tool = $recipeData['tool'];
    $content = $recipeData['content'];
}
