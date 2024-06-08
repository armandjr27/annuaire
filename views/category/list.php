<div class="container py-4">
    <h1 class="text-center mb-4">Liste de tous les catégories</h1>
    <div class="card shadow">
        <div class="card-header">
            <a href="<?php echo base_url() . 'categorie/ajouter'; ?>" class="btn btn-outline-success btn-sm px-4">Nouveau catégorie</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-bordered my-3" id="liste-classe">
                    <thead class="thead-dark">
                        <th class="text-center">ID</th>
                        <th>Label</th>
                        <th>Description</th>
                        <th class="text-center w-25">Contact de la catégorie</th>
                        <th class="text-center w-25">Action</th>
                    </thead>
                    <tbody>
                        <?php if ($categories) : ?>
                            <?php foreach ($categories as $category) : ?>
                                <tr>
                                    <td class="text-center"><?php echo $category->getIdCategory(); ?></td>
                                    <td><?php echo ucwords($category->getLabel()); ?></td>
                                    <td><?php echo $category->getDescription(); ?></td>
                                    <td>
                                        <ul class="list-inline">
                                            <?php if($category->getContacts()) : ?>
                                                <?php foreach($category->getContacts() as $contact) : ?>
                                                    <li class="list-inline-item mx-0"
                                                        ><a href="<?php echo base_url('contact/info/') . $contact['id_contact']; ?>" class="btn btn-outline-dark btn-sm px-1 py-0"><?php echo ucwords($contact['name']); ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <li class="list-inline-item mx-0 btn btn-dark btn-sm px-2 py-0">Aucun contact est affilié. </li>
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url() . 'categorie/info/' . $category->getIdCategory(); ?>" class="btn btn-info btn-sm px-4">Info</a>
                                        <a href="<?php echo base_url() . 'categorie/modifier/' . $category->getIdCategory(); ?>" class="btn btn-success btn-sm px-3"> Modifier </a>
                                        <a href="<?php echo base_url() . 'categorie/supprimer/' . $category->getIdCategory(); ?>" class="btn btn-danger btn-sm px-2"> Supprimer </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else :  ?>
                                <tr>
                                    <td class="text-center" colspan="5"> Aucune catégorie disponible dans l'annuaire.</td>
                                </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>