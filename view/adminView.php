<?php
$title = "Admin";

ob_start();
 
?>


<section class="container ">

    
    <div class="mt-5">
        <button class="btn btn-outline-warning m-2 d-inline"><a href="index.php" class="text-light text-decoration-none">Retour à l'accueil</a></button>
        <button class="btn btn-outline-warning m-2 d-inline"><a href="view/postProjectView.php" class="text-light text-decoration-none">Ajouter un projet</a></button>
        <button class="btn btn-outline-warning m-2 d-inline"><a href="view/postArticleView.php" class="text-light text-decoration-none">Ajouter un article</a></button>
    </div>

    <h1 class="text-warning mt-5 text-decoration-underline">ARTICLES</h1>
    
    <div id="card">
        <?php while ($article = $requete->fetch()) {

            $id = $article['id'];
            $titre = $article['title'];
            $message = $article['content'];
            $date = $article['created_date'];
        ?>
            <div class="row">
                <div class="col mb-3">
                    <div class="card border-dark bg-light text-dark h-100">
                        <div class="card-header fw-bold">Blog</div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $titre ?></h5>
                            <p class="card-text"><?= $message ?></p>
                        </div>
                        <div class="card-footer text-end">
                            <p class="card-text text-end"><?= $date ?></p>
                            <form method="post" action="index.php?page=update" class="d-inline" >
                                <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade" type="submit">
                                    <a href="index.php?page=update&id=<?php echo $id;?>"
                                     class="text-light text-decoration-none">Modifier</a> 
                                </button>
                            </form>
                            <form method="post" action="index.php?page=admin" class="d-inline" >
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                <button type="submit" name="delete" class="delete bg-danger text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    
    
    <h1 class="text-warning mt-5 text-decoration-underline">PROJET</h1>
    
    <div id="card">
        <?php while ($projet = $req->fetch()) {

            $id = $projet['id'];
            $titre = $projet['title'];
            $message = $projet['content'];
            $date = $projet['created_date'];
        ?>
            <div class="row">
                <div class="col mb-3">
                    <div class="card border-dark bg-light text-dark h-100">
                        <div class="card-header fw-bold">Blog</div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $titre ?></h5>
                            <p class="card-text"><?= $message ?></p>
                        </div>
                        <div class="card-footer text-end">
                            <p class="card-text text-end"><?= $date ?></p>
                            <form method="post" action="index.php?page=update" class="d-inline" >
                                <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade" type="submit">
                                    <a href="index.php?page=update&id=<?php echo $id;?>"
                                     class="text-light text-decoration-none">Modifier</a> 
                                </button>
                            </form>
                            <form method="post" action="index.php?page=admin" class="d-inline" >
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                <button type="submit" name="delete" class="delete bg-danger text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php
$content = ob_get_clean();

require('base.php');
?>