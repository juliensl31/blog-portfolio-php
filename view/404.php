<?php
    $title = "404";

    ob_start();
?>
    
<section class="container vh-100">
        
    <h1>OUPS !!</h1>
    <p><?= $error ?></p>
        
</section>

<?php
    $content = ob_get_clean();
    
    require('base.php');
?>