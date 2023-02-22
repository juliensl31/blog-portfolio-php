<?php
$title = "Archive Article";

ob_start();

?>


<section class="container mb-5">

    <h1 class="text-warning mt-5 text-decoration-underline">ARTICLES</h1>
    <p class="m-4"><a href="index.php" class="text-light text-decoration-none">Retour à l'accueil</a></p>

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
                        <img src="public/assets/blog.jpg" class="card-img-top" alt="blog">
                        <div class="card-body">
                            <small><?= $date_article->format('d-m-Y H:i'); ?></small>
                            <h5 class="card-title text-warning fw-bold text-capitalize mt-2"><?= $titre_article ?></h5>
                            <p class="card-text"><?= substr($content_article, 0, 200); ?> ...</p>
                        </div>
                        <div class="card-footer text-end">
                            <form method="post" action="index.php?page=article" class="text-end">
                                <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade" type="submit">
                                    <a href="index.php?page=article&id=<?php echo $id_article; ?>" class="text-light text-decoration-none">Voir plus</a>
                                </button>
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