<?php
$title = "Projet";

ob_start();

    while ($projet = $req->fetch()) {

        $id_projet      = $projet['id'];
        $titre_projet   = $projet['title'];
        $techno_projet  = $projet['techno'];
        $content_projet = html_entity_decode($projet['content']);
        $date_projet    = new DateTime($projet['created_date']);
?>

<section id="project">
    <div class="container">
        <div id="flex-presentation">
            <div class="titre">
                <h1 class="text-info fw-bolder"><?= $titre_projet ?></h1>
            </div>
        </div>
    </div>
</section>

<section id="paragraphe" class="container">
    <h2 class="text-info mt-5 text-decoration-underline text-center mb-5">Présentation</h2>
    <h5 class="text-dark fw-bold">Technologie: <h6 class="text-info fw-bold"><?= $techno_projet ?></h6></h5>
    <p><?= $content_projet ?></p>
    <div class="text-end text-dark mb-5">
        <small><?= $date_projet->format('d-m-Y H:i'); ?></small>
    </div>
</section>

<?php
}
$content = ob_get_clean();

require('base.php');
?>