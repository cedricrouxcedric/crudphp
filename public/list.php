<?php
include_once ('header.php');
include_once ('nav.php');
include_once ('../repository/listRepository.php');
?>
<div class="container">
    <ul class="list-group">
        <?php foreach ($recipes as $recipe) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $recipe['title'] ?>
                <div>
                    <a href="index.php?id=<?= $recipe['id'] ?>">Modifier</a>
                    <a href="delete.php">Supprimer</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
