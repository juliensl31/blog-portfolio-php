<?php
$title = "Archive Article";

ob_start();

?>


<section class="container mb-5">

    <h1 class="text-warning mt-5 text-decoration-underline">ARTICLES</h1>
    <p class="m-4"><a href="index.php" class="text-dark text-decoration-none">Retour à l'accueil</a></p>

    <div class="row">

        <?php while ($article = $requete->fetch()) { 
            
            $id_article         = $article['id'];
            $sujet_article      = $article['subject'];
            $titre_article      = $article['title'];
            $content_article    = html_entity_decode($article['content']) ;
            $date_article       = new DateTime($article['created_date']);
            
        ?>

    <div class="col-md-4 mb-3">
        <div class="card border-dark bg-dark text-light h-100">
            <img src="public/assets/blog.jpg" class="card-img-top" alt="blog">
            <div class="card-header fw-bold text-capitalize"><?= $sujet_article ?></div>
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
        <?php } ?>
    </div>
</section>

<?php
$content = ob_get_clean();

require('base.php');
?>