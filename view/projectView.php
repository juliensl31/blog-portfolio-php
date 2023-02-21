<?php
$title = "Projet";

ob_start();
 
?>


<section class="container vh-100">

    <h1 class="text-warning mt-5 text-decoration-underline">PROJETS</h1> 
    <p class="m-4"><a href="index.php" class="text-light text-decoration-none">Retour à l'accueil</a></p>

    <div id="card">
        <?php while ($projet = $requete->fetch()) {

            $id = $projet['id'];
            $titre_projet = $projet['title'];
            $message_projet = $projet['content'];
            $date = $projet['created_date'];
        ?>
            <div class="row">
                <div class="col mb-3">
                    <div class="card border-dark bg-light text-dark h-100">
                        <div class="card-header fw-bold">Projet</div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $titre_projet ?></h5>
                            <p class="card-text"><?= $message_projet ?></p>
                        </div>
                        <div class="card-footer text-end">
                            <p class="card-text text-end"><?= $date ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php
$content = ob_get_clean();

require('base.php');
?>