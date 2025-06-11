<?php  


require_once "../views/layout/header.inc.php";

?>
<body>
        <header>
            <!-- place navbar here -->
             <nav
                class="navbar navbar-expand-sm navbar-ligth bg-dark"
             >
                <div class="container">
                    <a class="navbar-brand  text-white" href="#">Gestion des Comptes</a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-white" href="#" aria-current="page"
                                    >Tableau de Bord
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white" href="index.php?controller=compte&action=list">Compte</a>
                            </li>
                            
                        </ul>

                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle"></i> <?php echo $_SESSION['user']['nomComplet']?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><?php echo $_SESSION['user']['role']?></a></li>
                                    <li><a class="dropdown-item" href="#">Paramètres</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="index.php?controller=security&action=logout">Déconnexion</a></li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                </div>
             </nav>
             
        </header>

<?php   echo $view;?>    
<?php require_once "../views/layout/footer.inc.php"?>
</body>
</html>