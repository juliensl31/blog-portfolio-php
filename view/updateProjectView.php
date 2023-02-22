<?php

$title = "Modification de projet";

// session_start();

ob_start();


?>

<section id="background">
    <section class="container">
        <h1 class="text-light pt-5 text-decoration-underline"> MODIFIER UN PROJET</h1>
        <?php while ($projet = $req->fetch()) {?>
            <form action="index.php?page=update_project&id=<?php echo $_GET['id']?>" method="post"> 
                <p>
                    <input type="hidden" name="id" value="<?php echo $projet['id']; ?>" />
                    <label for="newTitreProjet" class="text-light mb-2 fw-bold h3">Titre</label><br>
                    <input class="rounded w-50 border-0 p-2" type="text" name="newTitreProjet" id="newTitre" value="<?php echo $projet['title']; ?>">
                </p>
                <p>
                    <label for="newMessageProjet" class="text-light mb-2 fw-bold h3">Contenu</label><br>
                    <textarea name="newMessageProjet" id="mytextarea"><?php echo $projet['content']; ?></textarea>
                </p>
                <p>
                    <button type="submit" name="update_project" class="bg-info text-light fw-bold border-0 w-100 p-3 rounded mb-2 text-uppercase">Modifier</button>
                </p>   
            </form>
            <?php } ?>
    </section>
</section>
<?php
$content = ob_get_clean();

require('base.php');
?>