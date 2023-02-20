<?php

session_start();

// Routeur
require('controller/controller.php');


    try {
        if(isset($_GET['page'])) {
    
            if($_GET['page'] == 'accueil') {

                home();
                
                }
                else if ($_GET['page'] == 'article') {

                    if (isset($_POST['titre']) && !empty($_POST['message'])) {
                        addArticle(htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['message']));
                    } 
                    else if(isset($_POST['delete'])) {
                        removeArticle($id);
                    }
                    else {
                    article(); 
                    }
                }
                else if($_GET['page'] == 'update'){

                    if (isset($_POST['update']) && isset($_POST['newTitre']) && isset($_POST['newMessage']) && is_int($_GET['id'])) {
                        changeArticle(htmlspecialchars($_POST['newTitre']), htmlspecialchars($_POST['newMessage']));
                    }
                    else {
                    updatingArticle();  
                    }
                    
                }
            else {
               throw new Exception("Cette page n'existe pas ou à été supprimée.");
            }
        }
        else {
            home();
        }
    } 
    catch (Exception $e) {
        $error = $e->getMessage();
        require('view/404.php');
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/design/css/style.css">    
    <title>Accueil</title>
    
</head>

<body>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>