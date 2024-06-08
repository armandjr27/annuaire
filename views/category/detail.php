<div class="container mb-5" id="info-category" style="margin-top:70px;">
    <div class="col-md-8 col-lg-6 mx-auto mt-5">
        <div class="card shadow">
            <div class="card-header bg-info text-light">
                <h2 class="card-title text-center">Fiche catégorie</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p class="card-text">Voici les infos correspondant à la catégorie sélectionné :</p>
                    <table class="table table-hover">
                        <tr>
                            <th>Identifiant :</th>
                            <td><?php echo $category->getIdCategory(); ?></td>
                        </tr>
                        <tr>
                            <th>Label :</th>
                            <td><?php echo ucwords($category->getLabel()); ?></td>
                        </tr>
                        <tr>
                            <th>Description :</th>
                            <td><?php echo $category->getDescription(); ?></td>
                        </tr>
                        <tr>
                            <th style="width:160px;">Contact de la catégorie :</th>
                            <td>
                                <ul class="list-inline">
                                    <?php if($category->getContacts()) : ?>
                                        <?php foreach($category->getContacts() as $contact) : ?>
                                            <li class="list-inline-item"
                                                ><a href="<?php echo base_url('contact/info/') . $contact['id_contact']; ?>" class="btn btn-outline-info btn-sm px-2 py-0 mx-0"><?php echo ucwords($contact['name']); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <li class="list-inline-item btn btn-info btn-sm px-2 py-0">Aucun contact est affilié.</li>
                                    <?php endif; ?>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Date de création :</th>
                            <td><?php echo $category->getCreatedAt(); ?></td>
                        </tr>
                    </table>
                </div>
                <a href="<?php echo base_url('categories'); ?>" class="btn btn-outline-info btn-block my-3 py-2">Vers la liste des catégories</a>
            </div>
        </div>
    </div>
</div>