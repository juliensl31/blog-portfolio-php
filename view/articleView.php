<?php
$title = "Article";

ob_start();
 
?>

<section>
    
</section>
<section class="container mb-5">

    <h1 class="text-warning mt-5 text-decoration-underline">ARTICLES</h1> 
    <p class="m-4"><a href="index.php" class="text-light text-decoration-none">Retour à l'accueil</a></p>

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
                            <img src="public/assets/blog.jpg" class="card-img-top" alt="blog">
                        <div class="card-body">
                            <h5 class="card-title text-warning fw-bold text-capitalize"><?= $titre ?></h5>
                            <p class="card-text"><?= $message ?></p>
                        </div>
                        <div class="card-footer text-end">
                            <p class="card-text text-end"><?= $date ?></p>
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