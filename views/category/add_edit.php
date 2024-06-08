<div class="container" id="ajout-category" style="margin-top:70px;">
    <div class="col-md-8 col-lg-5 mx-auto mt-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-light">
                <?php if (isset($category)) : ?>
                    <h3 class="text-center">Modifier catégorie </h3>
                <?php else : ?>
                    <h3 class="text-center">Ajouter une catégorie</h3>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo isset($category) ? base_url('categorie/sauver/') . $category->getIdCategory() : base_url('categorie/sauver'); ?>">
                    <div class="form-group">
                        <label for="label">Label</label>
                        <input type="text" name="label" id="label" class="form-control" placeholder="Nom de la categorie" required value="<?php echo isset($category) ? ucwords($category->getLabel()) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="4" id="description" name="description" required><?php echo isset($category) ? $category->getDescription() : 'Description...'; ?></textarea>
                    </div>
                    <?php if (isset($category)) : ?>
                        <button type="submit" class="btn btn-dark px-4">Modifier</button>
                    <?php else : ?>
                        <button type="submit" class="btn btn-dark px-4">Ajouter</button>
                    <?php endif; ?>
                    <button type="reset" class="btn btn-outline-danger px-4">Annuler</button>
                </form>
            </div>
        </div>
    </div>
</div>