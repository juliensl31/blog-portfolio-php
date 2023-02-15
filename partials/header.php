<header>
<nav class="navbar bg-dark navbar-dark navbar-expand-md sticky-top">
        <div class="container">
            <div class="navbar-brand "><a href="../index.php" class="text-light text-decoration-none">Blog / Portfolio</a></div>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="text-end">
                <div id="navbarText" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <a href="../index.php" class="nav-link ">Accueil</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="view/postArticleView.php" class="nav-link ">Ajouter un article</a>
                        </li>
                        <?php if (!isset($_SESSION['connect'])) { ?>
                        <li class="nav-item">
                            <a href="view/connectionView.php" class="nav-link">Connexion</a>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a href="../src/logout.php" class="nav-link">Déconnexion</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>