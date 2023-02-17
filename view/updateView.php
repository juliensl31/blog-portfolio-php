<?php

$title = "Modification d'article";

// session_start();

ob_start();


?>

<section id="background">
<section class="container">
    <h1 class="text-light pt-5 text-decoration-underline"> MODIFIER UN ARTICLE</h1>
    
    <form action="../index.php?page=article" method="post">
        <p>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
            <label for="titre" class="text-light mb-2 fw-bold h3">Titre</label><br>
            <input class="rounded w-50 border-0 p-2" type="text" name="titre" id="titre" value="<?php echo $_GET['title']; ?>">
        </p>
        <p>
            <label for="message" class="text-light mb-2 fw-bold h3">Contenu</label><br>
            <textarea name="message" id="mytextarea"><?php echo $_GET['content']; ?></textarea>
        </p>
        <p>
            <button type="submit" class="bg-info text-light fw-bold border-0 w-100 p-3 rounded mb-2 text-uppercase">Modifier</button>
        </p>
        
    </form>
</section>
</section>
<?php
$content = ob_get_clean();

require('base.php');
?>