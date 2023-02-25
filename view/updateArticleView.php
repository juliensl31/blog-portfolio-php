<?php

$title = "Modification d'article";

ob_start();

?>

<section id="background">
    <div class="container">
        
        <h1 class="text-light pt-5 fw-bold mb-4"> MODIFIER UN ARTICLE</h1>

        <?php 
            while ($article = $requete->fetch()) { ?>

            <form action="index.php?page=update&id=<?php echo $_GET['id']?>" method="post"> 
                <p>
                    <label for="newSujet" name="newSujet" class="text-light mb-2 fw-bold h3">Sujet</label><br>
                    <input class="rounded w-50 border-0 p-2" type="text" name="newSujet" id="newSujet" value="<?php echo $article['subject']; ?>">
                </p>
                <p>
                    <label for="newTitre" class="text-light mb-2 fw-bold h3">Titre</label><br>
                    <input class="rounded w-50 border-0 p-2" type="text" name="newTitre" id="newTitre" value="<?php echo $article['title']; ?>">
                </p>
                <p>
                    <label for="newMessage" class="text-light mb-2 fw-bold h3">Contenu</label><br>
                    <textarea name="newMessage" id="default"><?php echo $article['content']; ?></textarea>
                </p>
                <p>
                    <button type="submit" name="update" class="bg-info text-light fw-bold border-0 w-100 p-3 rounded mb-2 text-uppercase">Modifier</button>
                </p>   
            </form>

        <?php } ?>
        
    </div>
</section>

<?php

$content = ob_get_clean();

require('base.php');
?>