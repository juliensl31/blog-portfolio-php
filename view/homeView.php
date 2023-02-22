<?php
$title = "Accueil";

ob_start();
?>

<section class="container min-vh-100">
    <div>
        <h1 class="text-warning mt-5 mb-4 text-decoration-underline">BLOG</h1>
        <div id="card">
            <?php while ($article = $requete->fetch()) { 
                
                $id_article = $article['id'];
                $titre_article = $article['title'];
                $content_article = html_entity_decode($article['content']);
                $date_article = new DateTime($article['created_date']);
                
            ?>
                <div class="row">
                    <div class="col mb-3">
                        <div class="card border-dark bg-dark text-light h-100">
                            <img src="public/assets/blog.jpg" class="card-img-top" alt="blog">
                            <div class="card-header fw-bold">Blog</div>
                            <div class="card-body">
                                <small><?= $date_article->format('d-m-Y H:i'); ?></small>
                                <h5 class="card-title text-warning fw-bold text-capitalize mt-2"><?= $titre_article ?></h5>
                                <p class="card-text text-justify"><?= substr($content_article, 0, 200); ?> ...</p>
                            </div>
                            <div class="card-footer">
                                <form method="post" action="index.php?page=article" class="text-end">
                                <button class="bg-warning text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade" type="submit">
                                    <a href="index.php?page=article&id=<?php echo $id_article; ?>" class="text-light text-decoration-none">Voir plus</a>
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <p class="text-end m-4"><a href="index.php?page=archive-article" class="text-warning text-decoration-none h4">Plus d'articles...</a></p>
    </div>

    <div>
        <h1 class="text-info mt-5 mb-4 text-decoration-underline">PROJET</h1>
        <div id="card">
            <?php while ($projet = $req->fetch()) {
                
                $id_projet = $projet['id'];
                $titre_projet = $projet['title'];
                $content_projet = html_entity_decode($projet['content']);
                $date_projet = new DateTime($projet['created_date']);
                
            ?>
                <div class="row">
                    <div class="col mb-3">
                        <div class="card border-dark bg-light text-dark h-100">
                            <img src="public/assets/data.jpg" class="card-img-top" alt="data">
                            <div class="card-header fw-bold">Projet</div>
                            <div class="card-body">
                                <small><?= $date_projet->format('d-m-Y H:i'); ?></small>
                                <h5 class="card-title text-info fw-bold text-capitalize mt-2"><?= $titre_projet ?></h5>
                                <p class="card-text text-justify"><?= substr($content_projet, 0, 200);?> ...</p>
                            </div>
                            <div class="card-footer">
                                <form method="post" action="index.php?page=projet" class="text-end">
                                <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade" type="submit">
                                    <a href="index.php?page=projet&id=<?php echo $id_projet; ?>" class="text-light text-decoration-none">Voir plus</a>
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <p class="text-end m-4"><a href="index.php?page=archive-projet" class="text-info text-decoration-none h4">Plus de projets...</a></p>
    </div>
</section>


<?php
$content = ob_get_clean();

require('base.php');
?>