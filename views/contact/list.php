<div class="container py-4">
    <h1 class="text-center mb-4">Liste de tous les contacts</h1>
    <div class="card shadow">
        <div class="card-header">
            <a href="<?php echo base_url() . 'contact/ajouter'; ?>" class="btn btn-outline-success btn-sm px-4">Nouveau contact</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-bordered my-3" id="liste-classe">
                    <thead class="thead-dark">
                        <th class="text-center">ID</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>E-mail</th>
                        <th class="w-25">Categories</th>
                        <th class="text-center">Age</th>
                        <th class="text-center w-25">Action</th>
                    </thead>
                    <tbody>
                        <?php if ($contacts) : ?>
                            <?php foreach ($contacts as $contact) : ?>
                                <tr>
                                    <td class="text-center"><?php echo $contact->getIdContact(); ?></td>
                                    <td><?php echo ucwords($contact->getName()); ?></td>
                                    <td><?php echo $contact->getPhone(); ?></td>
                                        <td><?php echo $contact->getEmail(); ?></td>
                                    <td>
                                        <ul class="list-inline">
                                            <?php foreach($contact->getCategories() as $category) : ?>
                                                <li class="list-inline-item"
                                                        ><a href="<?php echo base_url('categorie/info/') . $category['id_category']; ?>" class="btn btn-outline-dark btn-sm px-1 py-0"><?php echo ucwords($category['label']); ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </td>
                                    <td class="text-center"><?php echo $contact->getAge(); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url() . 'contact/info/' . $contact->getIdContact(); ?>" class="btn btn-info btn-sm px-4">Info</a>
                                        <a href="<?php echo base_url() . 'contact/modifier/' . $contact->getIdContact(); ?>" class="btn btn-success btn-sm px-3"> Modifier </a>
                                        <a href="<?php echo base_url() . 'contact/supprimer/' . $contact->getIdContact(); ?>" class="btn btn-danger btn-sm px-2"> Supprimer </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td class="text-center" colspan="7"> Aucune contact disponible dans l'annuaire.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>