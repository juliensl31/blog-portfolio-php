<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/design/css/style.css">
    <script src="https://cdn.tiny.cloud/1/vmzf778o0oenm6a4iu7s93p4am2rqkrfulgd9c8hjbv95nyz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <title><?= $title ?></title>
</head>

<body>
    <nav class="navbar bg-dark navbar-dark navbar-expand-md sticky-top">
        <div class="container">
            <div class="navbar-brand "><a href="../index.php" class="text-light text-decoration-none">Blog / Portfolio</a></div>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="text-end">
                <div id="navbarText" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <!-- <li class="nav-item">
                            <a href="../index.php" class="nav-link ">Accueil</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="view/postArticleView.php" class="nav-link ">Ajouter un article</a>
                        </li>
                        <?php if (!isset($_SESSION['connect'])) { ?>
                        <li class="nav-item">
                            <a href="view/connectionView.php" class="nav-link">Connexion</a>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a href="../src/logout.php" class="nav-link">Déconnexion</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <?= $content ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>

</html>