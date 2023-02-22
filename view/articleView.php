<?php
$title = "Article";

ob_start();

while ($article = $requete->fetch()) {

    $id_article      = $article['id'];
    $titre_article   = $article['title'];
    $content_article = html_entity_decode($article['content']);
    $date_article    = new DateTime($article['created_date']);
    ?>

    <section id="article">
        <div class="container">
            <div id="flex-presentation">
                <div class="titre">
                    <h1 class="text-warning fw-bolder"><?= $titre_article ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section id="paragraphe" class="container text-center">

        <h2 class="text-warning mt-5 text-decoration-underline text-center mb-5">Article</h2>
        <p><?= $content_article ?></p>
        <p class="text-end mb-5"><?= $date_article->format('d-m-Y H:i'); ?></p>

    </section>

<?php
}
$content = ob_get_clean();

require('base.php');
?>