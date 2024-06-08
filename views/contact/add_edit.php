<div class="container" id="ajout-contact" style="margin-top:70px;">
    <div class="col-md-8 col-lg-5 mx-auto my-5">
        <div class="card shadow pb-4">
            <div class="card-header bg-dark text-light">
                <?php if ($contact) : ?>
                    <h3 class="text-center">Modifier contact </h3>
                <?php else : ?>
                    <h3 class="text-center">Nouveau contact</h3>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <form method="post" 
                      action="<?php echo $contact ? base_url('contact/sauver/') . $contact->getIdContact() : base_url('contact/sauver'); ?>">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Entrer le nom du contact" required value="<?php echo $contact ? ucwords($contact->getName()) : ''; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Entrer l'email du contact" required value="<?php echo $contact ? $contact->getEmail() : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">N° Téléphone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Entrer n° téléphone du contact" required value="<?php echo $contact ? $contact->getPhone() : ''; ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" class="form-control" placeholder="Entrer l'âge du contact" min="15" required value="<?php echo $contact ? $contact->getAge() : ''; ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label for="categories">Catégories</label>
                        <select placeholder="Sélectionner un ou plusieurs catégories" data-allow-clear="1" name="categories[]" multiple style="width:100%;">
                            <?php if ($categories) : ?>
                                <?php foreach($categories as $category) : ?>
                                <option 
                                    <?php
                                        if ($contact)
                                        {
                                            foreach ($contact->getCategories() as $label) {
                                                echo (in_array($category->getLabel(), $label)) ? 'selected' : '';
                                            }
                                        }
                                    ?> 
                                    value="<?php echo $category->getIdCategory(); ?>"
                                    ><?php echo ucwords($category->getLabel()); ?>
                                </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <?php if ($contact) : ?>
                        <button type="submit" class="btn btn-dark px-4">Modifier</button>
                    <?php else : ?>
                        <button type="submit" class="btn btn-dark px-4">Ajouter</button>
                    <?php endif; ?>
                    <button type="button" class="btn btn-outline-danger px-4">Annuler</button>
                </form>
            </div>
        </div>
    </div>
</div>