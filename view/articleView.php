<?php
$title = "Article";

ob_start();

?>

<?php

    while ($article = $requete->fetch()) {

        $id_article      = $article['id'];
        $sujet_article   = $article['subject'];
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
    <hr class="divider">
    <h2 class="text-warning fw-bold text-capitalize"><?= $sujet_article ?></h2>
    <p><?= $content_article ?></p>
    <p class="text-end mb-5"><?= $date_article->format('d-m-Y H:i'); ?></p>
    <hr class="divider">
</section>

<?php } ?>

<section class="container">

    <h3 class="text-warning mb-3 fw-bold">Commentaires</h3>

    <form action="index.php?page=article&id=<?php echo $_GET['id'] ?>" method="post">
        <p>
            <textarea name="content" id="default" placeholder="Ajouter un commentaire..."></textarea>
        </p>

        <?php if (!isset($_SESSION['connect'])) { ?>

        <p>
            <button class="bg-warning  border-0 w-100 p-3 rounded mb-3 text-uppercase">
                <a href="view/connectionView.php" class="text-light fw-bold text-decoration-none">Veuillez vous connecter pour laisser un commentaire</a>
            </button>
        </p>

        <?php } else if (isset($_SESSION['connect'])) { ?>

        <p>
            <input type="hidden" name="article_id" value="<?php echo $id_article; ?>" />
            <button type="submit" name="comment" class="bg-warning text-light fw-bold border-0 w-100 p-3 rounded mb-3 text-uppercase">Ajouter un commentaire</button>
        </p>

        <?php } ?>

    </form>

    <div class="mb-5">
        <?php

            while ($commentaire = $req->fetch()) {

                $article_id_comment = $commentaire['article_id'];
                
                if ($id_article == $article_id_comment) {
                    
                    $id_comment         = $commentaire['id'];
                    $content_comment    = $commentaire['comment_content']; 
                    $date_comment       = new DateTime($commentaire['created_date']);

        ?>
        <div class="bg-light shadow-sm p-1 rounded m-1 text-dark w-75">
            <p class="p-1"><?= $content_comment ?></p>
            <p class="text-end p-1"><small><?= $date_comment->format('d/m/Y H:i') ?></small></p>
        </div>

        <?php } } ?>

    </div>

</section>

<?php

$content = ob_get_clean();

require('base.php');
?>