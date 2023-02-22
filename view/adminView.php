<?php
$title = "Admin";

ob_start();

?>


<section class="container mb-5 ">


    <div class="mt-5 text-center">
        <button class="btn btn-warning m-2 d-inline"><a href="view/postProjectView.php" class="text-light text-decoration-none">Ajouter un projet</a></button>
        <button class="btn btn-warning m-2 d-inline"><a href="view/postArticleView.php" class="text-light text-decoration-none">Ajouter un article</a></button>
    </div>

    <h1 class="text-warning text-center mt-3 text-decoration-underline">ARTICLES</h1>

    <div id="card">
        <?php while ($article = $requete->fetch()) {

            $id_article      = $article['id'];
            $titre_article   = $article['title'];
            $content_article = html_entity_decode($article['content']);
            $date_article    = new DateTime($article['created_date']);

        ?>
            <div class="row">
                <div class="col mb-3">
                    <div class="card border-dark bg-light text-dark h-100">
                        <div class="card-header fw-bold">Blog</div>
                        <div class="card-body">
                        <small><?= $date_article->format('d-m-Y H:i'); ?></small>
                            <h5 class="card-title text-warning fw-bold text-capitalize mt-2"><?= $titre_article ?></h5>
                            <p class="card-text"><?= substr($content_article, 0, 200); ?> ...</p>
                        </div>
                        <div class="card-footer text-end">
                            <form method="post" action="index.php?page=update" class="d-inline">
                                <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade" type="submit">
                                    <a href="index.php?page=update&id=<?php echo $id_article; ?>" class="text-light text-decoration-none">Modifier</a>
                                </button>
                            </form>
                            <form method="post" action="index.php?page=admin" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $id_article; ?>" />
                                <button type="submit" name="delete" class="delete bg-danger text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


    <h1 class="text-warning text-center mt-5 text-decoration-underline">PROJET</h1>

    <div id="card">
        <?php while ($projet = $req->fetch()) {

            $id_projet      = $projet['id'];
            $titre_projet   = $projet['title'];
            $message_projet = html_entity_decode($projet['content']);
            $date_projet    = new DateTime($projet['created_date']);

        ?>
            <div class="row">
                <div class="col mb-3">
                    <div class="card border-dark bg-light text-dark h-100">
                        <div class="card-header fw-bold">Projet</div>
                        <div class="card-body">
                            <small><?= $date_projet->format('d-m-Y H:i'); ?></small>
                            <h5 class="card-title text-warning fw-bold text-capitalize"><?= $titre_projet ?></h5>
                            <p class="card-text"><?= substr($message_projet, 0, 200); ?> ...</p>
                        </div>
                        <div class="card-footer text-end">
                            <form method="post" action="index.php?page=update_project" class="d-inline">
                                <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade_project" type="submit">
                                    <a href="index.php?page=update_project&id=<?php echo $id_projet; ?>" class="text-light text-decoration-none">Modifier</a>
                                </button>
                            </form>
                            <form method="post" action="index.php?page=admin" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $id_projet; ?>" />
                                <button type="submit" name="delete_project" class="delete bg-danger text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase">Supprimer</button>
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