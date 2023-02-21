<?php
$title = "Accueil";

ob_start();
?>

<section class="container vh-100">
    <div>
        <h1 class="text-warning mt-5 text-decoration-underline">ARTICLE</h1>
        <div id="card">
            <?php while ($article = $requete->fetch()) { ?>
                <div class="row">
                    <div class="col mb-3">
                        <div class="card border-dark bg-light text-dark h-100">
                            <div class="card-header fw-bold">Blog</div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $article['title'] ?></h5>
                                <p class="card-text"><?= $article['content'] ?></p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text text-end"><?= $article['created_date'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <p class="text-end m-4"><a href="index.php?page=article" class="text-warning text-decoration-none h4">Plus d'articles...</a></p>
    </div>

    <div>
        <h1 class="text-warning mt-5 text-decoration-underline">PROJET</h1>
        <div id="card">
            <?php while ($projet = $requete->fetch()) { ?>
                <div class="row">
                    <div class="col mb-3">
                        <div class="card border-dark bg-light text-dark h-100">
                            <div class="card-header fw-bold">Blog</div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $projet['title'] ?></h5>
                                <p class="card-text"><?= $projet['content'] ?></p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text text-end"><?= $projet['created_date'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <p class="text-end m-4"><a href="index.php?page=projet" class="text-warning text-decoration-none h4">Plus de projet...</a></p>
    </div>
</section>


<?php
$content = ob_get_clean();

require('base.php');
?>