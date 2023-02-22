<?php
$title = "Archive Projet";

ob_start();

?>

<section class="container mb-5">

    <h1 class="text-warning mt-5 text-decoration-underline">PROJETS</h1>
    <p class="m-4"><a href="index.php" class="text-light text-decoration-none">Retour à l'accueil</a></p>

    <div id="card">
        <?php while ($projet = $requete->fetch()) {

            $id_projet      = $projet['id'];
            $titre_projet   = $projet['title'];
            $content_projet = html_entity_decode($projet['content']);
            $date_projet    = new DateTime($projet['created_date']);

        ?>
            <div class="row">
                <div class="col mb-3">
                    <div class="card border-dark bg-light text-dark h-100">
                        <div class="card-header fw-bold">Projet</div>
                        <img src="public/assets/data.jpg" class="card-img-top" alt="data">
                        <div class="card-body">
                            <small><?= $date_projet->format('d-m-Y H:i'); ?></small>
                            <h5 class="card-title text-warning fw-bold text-capitalize"><?= $titre_projet ?></h5>
                            <p class="card-text"><?= substr($content_projet, 0, 200); ?> ...</p>
                        </div>
                        <div class="card-footer text-end">
                            <form method="post" action="index.php?page=projet" class="text-end">
                                <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade" type="submit">
                                    <a href="index.php?page=projet&id=<?php echo $id_projet; ?>" class="text-light text-decoration-none">Voir plus</a>
                                </button>
                            </form>
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