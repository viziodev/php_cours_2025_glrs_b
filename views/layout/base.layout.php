<?php  require_once "../views/layout/header.inc.php";?>
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
                        
                    </div>
                </div>
             </nav>
             
        </header>

<?php   echo $view;?>    
<?php require_once "../views/layout/footer.inc.php"?>
</body>
</html>