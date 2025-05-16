<!DOCTYPE html>

<html lang="pt-BR" class="dark-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $this->e($title) ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.png" />

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatable/datatables-combinado.min.css">


    <!-- Page CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <script src="/assets/js/config.js"></script>

    <style>
        div.container {
            width: 80%;
        }

        #content {
            zoom: 0.85;
        }

        #zoom90 {
            zoom: 0.9;
        }
    </style>

</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <?php $this->insert('partials/mensagens') ?>
        <div class="layout-container">

            <!-- Inicio Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <?php $this->insert('partials/menu') ?>
            </aside>
            <!-- Inicio Menu -->

            <div class="layout-page">

                <!-- Inicio do NavBar -->
                <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached 
                align-items-center bg-navbar-theme" id="layout-navbar">
                    <?php $this->insert('partials/navbar') ?>
                </nav>
                <!-- Fim do NavBar -->

                <!-- Inicio do Conteudo -->
                <div class="content-wrapper">
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <!-- <div class="layout-demo-wrapper"></div> -->
                        <div class="layout-demo-placeholder">
                            <?= $this->section('content') ?>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Fim do Conteudo -->


                <!-- Inico do Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <?php $this->insert('partials/footer') ?>
                </footer>
                <!-- Fim do Footer -->

            </div>

            <div class="layout-overlay layout-menu-toggle"></div>

        </div>
    </div>


    <!-- Scripts -->
    <?php $this->insert('partials/scripts') ?>
</body>

</html>