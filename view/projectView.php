<?php
$title = "Projet";

ob_start();

while ($projet = $req->fetch()) {

    $id_projet      = $projet['id'];
    $titre_projet   = $projet['title'];
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

    <section id="paragraphe" class="container text-center">
        <h2 class="text-info mt-5 text-decoration-underline text-center mb-5">Présentation</h2>
        <p><?= $content_projet ?></p>
        <p class="text-end mb-5"><?= $date_projet->format('d-m-Y H:i'); ?></p>
    </section>

<?php
}
$content = ob_get_clean();

require('base.php');
?>