<?php
$titleError = '';
$toolError  = '';
$dishError  = '';
$title      = '';
$tool       = '';
$dish       = '';
$content    = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $i = 0;
    $title   = $_POST['title'];
    $content = $_POST['content'];
    if (empty($title)) {
        $i++;
        $titleError = 'Il faut donner un nom à cette recette';
    }
    $tool = $_POST['tool'];
    if (empty($tool)) {
        $i++;
        $toolError = 'Il faut choisir un ustensile';
    }
    if (!isset($_POST['dish'])) {
        $i++;
        $dishError = 'Il faut choisir une catégorie';
    } else {
        $dish = $_POST['dish'];
    }
    if ($i === 0) {
        include_once ('../repository/parameters.php');
        try {
            $pdo = new PDO(DSN, USER, PASS);
        } catch (Exception $exception) {
            echo "Problème de connexion à la base de donnée";
        }
        $date      = new DateTime();
        $updatedAt = $date->format('Y-m-d H:i:s');;
        $query = 'INSERT INTO recipe (title, dish, tool, content, updated_at) VALUES (:title, :dish, :tool, :content, :updated_at)';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':dish', $dish, PDO::PARAM_STR);
        $statement->bindValue(':tool', $tool, PDO::PARAM_STR);
        $statement->bindValue(':content', $content, PDO::PARAM_STR);
        $statement->bindValue(':updated_at', $updatedAt, PDO::PARAM_STR);

        $statement->execute();

        echo 'Votre recette a bien été soumise';
    }

}