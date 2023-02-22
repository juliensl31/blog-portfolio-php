<?php
$title = "Article";

ob_start();

while ($article = $requete->fetch()) {

    $id         = $article['id'];
    $titre      = $article['title'];
    $message    = html_entity_decode($article['content']);
    $date       = $article['created_date'];
?>

    <section id="article">
        <div class="container">
            <div id="flex-presentation">
                <div class="titre">
                    <h1 class="text-warning fw-bolder"><?= $titre ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="container mb-5">

        <h2 class="text-warning mt-5 text-decoration-underline text-center mb-5">Présentation</h2>
        <p class="text-light"><?= $message ?></p>
        <p class="text-light text-end"><?= $date ?></p>

    </section>

<?php
}
$content = ob_get_clean();

require('base.php');
?>