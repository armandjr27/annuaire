<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (isset($title)) ? $title : ""; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('public/imgs/favicon.png') ?>" type="image/png">
    <link rel="stylesheet" href="<?php echo base_url('public/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/select2-bootstrap4.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/styles.css'); ?>">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><i class="fas fa-book-open"></i> Mon Annuaire</a>

            <!-- Toggler/collapsible Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php echo (isset($title) && strpos($title, 'Home')) ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo base_url('home'); ?>"> Accueil</a>
                    </li>
                    <li class="nav-item <?php echo isset($title) && (strpos($title, 'Contact')) ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo base_url('contacts'); ?>"> Contacts</a>
                    </li>
                    <li class="nav-item <?php echo (isset($title) && strpos($title, 'Categorie')) ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo base_url('categories'); ?>">Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="margin-top: 50px;">
        <?php echo $content; ?>
    </main>

    <footer class="my-3">
        <div class="container-fluid">
            <p class="text-center">&copy; Copyright <?php echo Date("Y"); ?> Armand Jr.</p>
        </div>
    </footer>

    <script src="<?php echo base_url('public/js/jquery-3.7.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/i18n/fr.js'); ?>"></script>
    <script type="module" src="<?php echo base_url('public/js/app.js'); ?>"></script>
</body>

</html>