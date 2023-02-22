<?php
$title = "Article";

ob_start();
 
?>

<section id="article">
    <div class="container">
        <div id="flex-presentation">
            <div class="gauche-presentation">
                <!-- <h1 class="text-warning fw-bolder">Blog</h1> -->
                <!-- <span>Un projet de mise en relation entre freelances pour les aider à faire le grand pas vers le monde de l’entreprenariat.</span> -->
            </div>
        </div>
    </div>
</section>
<section class="container mb-5">
    
    <?php while ($article = $requete->fetch()) {

        $id = $article['id'];
        $titre = $article['title'];
        $message = html_entity_decode($article['content']);
        $date = $article['created_date'];
    ?>
        
        <h1 class="text-warning mt-5 text-decoration-underline"><?= $titre ?></h1>
        <p class="text-light"><?= $message ?></p>
        <p class="text-light text-end"><?= $date ?></p>
            
    <?php } ?>

</section>

<?php
$content = ob_get_clean();

require('base.php');
?>