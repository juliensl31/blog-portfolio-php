<?php

$title = "Modification d'article";

// session_start();

ob_start();

echo '<div style="border: solid 2px #F00">';
    echo '<div style="; background-color:#CCC">@'.__FILE__.' : '.__LINE__.'</div>';
    echo '<pre style="background-color: rgba(255,255,255, 0.8);">';
    print_r($_GET);
    echo '</pre>';
echo '</div>';

?>
<section id="background">
<section class="container">
    <h1 class="text-light pt-5 text-decoration-underline"> MODIFIER UN ARTICLE</h1>
    <form action="../index.php?page=article" method="post">
        <p>
            <label for="titre" class="text-light mb-2 fw-bold h3">Titre</label><br>
            <input class="rounded w-50 border-0 p-2" type="text" name="titre" id="titre" value="">
        </p>
        <p>
            <label for="message" class="text-light mb-2 fw-bold h3">Contenu</label><br>
            <textarea name="message" id="mytextarea"><?php echo $_GET['title']; ?></textarea>
        </p>
        <p>
            <button type="submit" name="update" class="bg-info text-light fw-bold border-0 w-100 p-3 rounded mb-2 text-uppercase">Modifier</button>
        </p>
    </form>
</section>
</section>
<?php
$content = ob_get_clean();

require('base.php');
?>