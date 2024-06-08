<div class="container mb-5" id="info-contact" style="margin-top:70px;">
    <div class="col-md-8 col-lg-6 mx-auto mt-5">
        <div class="card shadow">
            <div class="card-header bg-info text-light">
                <h2 class="card-title text-center">Fiche contact</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p class="card-text lead">Voici les infos correspondant à la contact sélectionné :</p>
                    <table class="table table-hover">
                        <tr>
                            <th>Identifiant :</th>
                            <td><?php echo $contact->getIdContact(); ?></td>
                        </tr>
                        <tr>
                            <th>Nom :</th>
                            <td><?php echo ucwords($contact->getName()); ?></td>
                        </tr>
                        <tr>
                            <th>N° Téléphone :</th>
                            <td><?php echo $contact->getPhone(); ?></td>
                        </tr>
                        <tr>
                            <th>E-mail :</th>
                            <td><?php echo $contact->getEmail(); ?></td>
                        </tr>
                        <tr>
                            <th>Age :</th>
                            <td><?php echo $contact->getAge(); ?></td>
                        </tr>
                        <tr>
                            <th style="width:160px;">Catégories :</th>
                            <td>
                                <ul class="list-inline">
                                    <?php foreach($contact->getCategories() as $category) : ?>
                                        <li class="list-inline-item"
                                            ><a href="<?php echo base_url('categorie/info/') . $category['id_category']; ?>" class="btn btn-outline-info btn-sm px-2 py-0"><?php echo ucwords($category['label']); ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Date de création :</th>
                            <td><?php echo $contact->getCreatedAt(); ?></td>
                        </tr>
                    </table>
                </div>
                <a href="<?php echo base_url('contacts'); ?>" class="btn btn-outline-info btn-block my-3 py-2">Vers la liste des contacts</a>
            </div>
        </div>
    </div>
</div>