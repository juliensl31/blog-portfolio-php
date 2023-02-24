<?php

$title = "Ajout d'article";

ob_start();

?>

<section id="background">
    <div class="container">

        <h1 class="pt-5 mb-5 text-light"> AJOUTER UN ARTICLE</h1>
        
        <form action="../index.php?page=admin" method="post">
            <p>
                <label for="titre" class="text-light mb-2 fw-bold h3">Titre</label><br>
                <input class="rounded w-50 border-0 p-2" type="text" name="titre" id="titre">
            </p>
            <p>
                <label for="message" class="text-light mb-2 fw-bold h3">Contenu</label><br>
                <textarea name="message" id="default"></textarea>
            </p>
            <p>
                <button type="submit" class="bg-warning text-light fw-bold border-0 w-100 p-3 rounded mb-5 text-uppercase">Ajouter un article</button>
            </p>
        </form>
        
    </div>
</section>

<?php
$content = ob_get_clean();

require('base.php');
?>