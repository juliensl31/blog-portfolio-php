<?php
$title = "Projet";

ob_start();

while ($projet = $req->fetch()) {

    $id             = $projet['id'];
    $titre_projet   = $projet['title'];
    $message_projet = html_entity_decode($projet['content']);
    $date           = $projet['created_date'];
?>

    <section id="project">
        <div class="container">
            <div id="flex-presentation">
                <div class="titre">
                    <h1 class="text-warning fw-bolder"><?= $titre_projet ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="container m-5">
        <h2 class="text-warning mt-5 text-decoration-underline text-center mb-5">Présentation</h2>
        <p class="text-light "><?= $message_projet ?></p>
        <p class="text-light text-end"><?= $date ?></p>
    </section>

<?php
}
$content = ob_get_clean();

require('base.php');
?>