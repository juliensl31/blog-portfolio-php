<?php
$title = "Archive Projet";

ob_start();

?>

<section class="container mb-5">

    <h1 class="text-info mt-5 text-decoration-underline">PROJETS</h1>

    <p class="m-4"><a href="index.php" class="text-dark text-decoration-none">Retour à l'accueil</a></p>

    <div class="row">

        <?php while ($projet = $requete->fetch()) {
            
            $id_projet          = $projet['id'];
            $titre_projet       = $projet['title'];
            $techno_projet      = $projet['techno'];
            $content_projet     = html_entity_decode($projet['content']);
            $date_projet        = new DateTime($projet['created_date']);
            
        ?>

    <div class="col-md-4 mb-3">
        <div class="card border-dark bg-light text-dark h-100">
            <img src="public/assets/data.jpg" class="card-img-top" alt="data">
            <div class="card-header fw-bold">Projet</div>
            <div class="card-body">
                <small><?= $date_projet->format('d-m-Y H:i'); ?></small>
                <h5 class="card-title text-info fw-bold text-capitalize mt-2"><?= $titre_projet ?></h5>
                <h6 class="text-dark fw-bold text-capitalize">Technologie:</h6>
                <h6 class="text-info"><?= $techno_projet ?></h6>
                <p class="card-text text-justify"><?= substr($content_projet, 0, 200);?> ...</p>
            </div>
            <div class="card-footer">
                <form method="post" action="index.php?page=projet" class="text-end">
                    <button class="bg-info text-light fw-bold border-0 p-3 rounded mb-2 text-uppercase" name="upgrade" type="submit">
                        <a href="index.php?page=projet&id=<?php echo $id_projet; ?>" class="text-light text-decoration-none">Voir plus</a>
                    </button>
                </form>
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