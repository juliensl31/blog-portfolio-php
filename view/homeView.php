<?php
$title = "Accueil";

ob_start();
?>

<section class="container min-vh-100">
    <div>
        <h1 class="text-warning mt-5 text-decoration-underline">ARTICLE</h1>
        <div id="card">
            <?php while ($article = $requete->fetch()) { ?>
                <div class="row">
                    <div class="col mb-3">
                        <div class="card border-dark bg-light text-dark h-100">
                            <div class="card-header fw-bold">Blog</div>
                            <img src="public/assets/blog.jpg" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <h5 class="card-title text-warning fw-bold text-capitalize"><?= $article['title'] ?></h5>
                                <p class="card-text"><?= $article['content'] ?></p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text text-end"><?= $article['created_date'] ?></p>
                                <form method="post" action="index.php?page=article" class="text-end">
                                <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade" type="submit">
                                    <a href="index.php?page=article&id=<?php echo $article['id']; ?>" class="text-light text-decoration-none">Voir Article</a>
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
        <h1 class="text-warning mt-5 text-decoration-underline">PROJET</h1>
        <div id="card">
            <?php while ($projet = $req->fetch()) { ?>
                <div class="row">
                    <div class="col mb-3">
                        <div class="card border-dark bg-light text-dark h-100">
                            <div class="card-header fw-bold">Projet</div>
                            <img src="public/assets/data.jpg" class="card-img-top" alt="data">
                            <div class="card-body">
                                <h5 class="card-title text-warning fw-bold text-capitalize"><?= $projet['title'] ?></h5>
                                <p class="card-text"><?= $projet['content'] ?></p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text text-end"><?= $projet['created_date'] ?></p>
                                <form method="post" action="index.php?page=projet" class="text-end">
                                <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade" type="submit">
                                    <a href="index.php?page=projet&id=<?php echo $projet['id']; ?>" class="text-light text-decoration-none">Voir le projet</a>
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <p class="text-end m-4"><a href="index.php?page=archive-projet" class="text-warning text-decoration-none h4">Plus de projet...</a></p>
    </div>
</section>


<?php
$content = ob_get_clean();

require('base.php');
?>