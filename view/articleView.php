<?php
$title = "Article";

ob_start();
?>

<section class="container">

    <h1 class="text-light mt-5 text-decoration-underline">ARTICLE</h1>
    <?php while ($article = $requete->fetch()) { ?>
        <div class="row">
            <div class="col mb-3">
                <div class="card border-light bg-dark text-light h-100">
                    <div class="card-header fw-bold">Blog</div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $article['title'] ?></h5>
                        <p class="card-text"><?= $article['content'] ?></p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text text-end"><?= $article['created_date'] ?></p>
                        <form method="post" action="index.php?page=article" class="text-end">
                            <input type="hidden" name="id" value="<?php echo $article['id'] ?>" />
                            <button type="submit" name="update" class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase">Modifier un article</button>
                            <button type="submit" name="delete" class=" delete bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase">Supprimer un article</button>
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