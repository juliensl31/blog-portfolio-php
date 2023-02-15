<?php
$title = "Article";


ob_start();
?>

<section class="container">
   <h1 class="text-warning mt-5 text-decoration-underline">ARTICLES</h1> 
   <p class="m-4"><a href="index.php" class="text-light text-decoration-none">Retour à l'accueil</a></p> 
</section>
<section class="container" id="card">
    <?php while ($article = $requete->fetch()) { ?>
        <div class="row">
            <div class="col mb-3">
                <div class="card border-dark bg-light text-dark h-100">
                    <div class="card-header fw-bold">Blog</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $article['title'] ?></h5>
                        <p class="card-text"><?= $article['content'] ?></p>
                        <p class="card-text text-end"><?= $article['created_date'] ?></p>
                    </div>
                    <div class="card-footer">
                        <form method="post" action="index.php?page=article" class="text-end">
                            <input type="hidden" name="id" value="<?php echo $article['id'] ?>" />
                            <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase">
                                <a href="view/updateView.php" class="text-light text-decoration-none">Modifier</a>
                            </button>
                            <button type="submit" name="delete" class="delete bg-danger text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</section>

<?php
$content = ob_get_clean();

require('base.php');
?>