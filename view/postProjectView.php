<?php

$title = "Ajout d'article";

session_start();

ob_start();

?>
<section id="background">
<section class="container">
    <h1 class="text-light pt-5 text-decoration-underline"> AJOUTER UN PROJET</h1>
    
    <form action="../index.php?page=admin" method="post">
        <p>
            <label for="titre" class="text-light mb-2 fw-bold h3">Titre</label><br>
            <input class="rounded w-50 border-0 p-2" type="text" name="titre_projet" id="titre">
        </p>
        <p>
            <label for="message" class="text-light mb-2 fw-bold h3">Contenu</label><br>
            <textarea name="message_projet" id="default"></textarea>
        </p>
        <p>
            <button type="submit" class="bg-info text-light fw-bold border-0 w-100 p-3 rounded mb-2 text-uppercase">Ajouter un projet</button>
        </p>
    </form>
</section>
</section>
<?php
$content = ob_get_clean();

require('base.php');
?>