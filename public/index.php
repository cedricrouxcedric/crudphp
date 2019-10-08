<?php
include_once ('header.php');
include_once ('nav.php');
include_once ('../src/form.php');
include_once('../src/update.php');
?>
<div class="container">
    <form method="post" action="<?= isset($id) ? '../src/postUpdate.php' : 'index.php' ?>">
        <input type="hidden" value="<?= isset($id) ? $id : '' ?>" name="id">
        <div class="form-group">
            <label for="title">
                Titre de la recette
            </label>
            <input class="form-control <?= $titleError === '' ? '' : 'is-invalid'?>" type="text" name="title" id="title" value="<?= $title ?>">
            <div class="invalid-feedback">
                <?= $titleError ?>
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="starter" name="dish" id="starter" <?php if ($dish === "starter") : ?> checked <?php endif; ?>>
            <label class="form-check-label" for="starter">Entrée</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="maincourse" name="dish" id="maincourse" <?php if ($dish === "maincourse") : ?> checked <?php endif; ?>>
            <label class="form-check-label" for="maincourse">Plat</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="desert" name="dish" id="desert" <?php if ($dish === "desert") : ?> checked <?php endif; ?>>
            <label class="form-check-label" for="desert">Dessert</label>
            <span><?= $dishError ?></span>
        </div>
        <div class="form-group">
            <label for="tool">Ustensile</label>
            <select class="form-control" name="tool" id="tool">
                <option value="">Choisissez un ustensile</option>
                <option value="spoon" <?php if ($tool === "spoon") : ?> selected <?php endif; ?>>Cuillère</option>
                <option value="fork" <?php if ($tool === "fork") : ?> selected <?php endif; ?>>Fourchette</option>
                <option value="knife" <?php if ($tool === "knife") : ?> selected <?php endif; ?>>Couteau</option>
                <option value="whip" <?php if ($tool === "whip") : ?> selected <?php endif; ?>>Fouet</option>
            </select>
            <span><?= $toolError ?></span>
        </div>
        <div class="form-group">
            <label for="content">Recette</label>
            <textarea class="form-control" id="content" name="content"><?= $content ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer la recette</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
