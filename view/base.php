

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
      selector: 'textarea#default',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <nav class="navbar bg-dark navbar-dark navbar-expand-md sticky-top">
            <div class="container">
                <div class="navbar-brand "><a href="index.php" class="text-light text-decoration-none">Blog / Portfolio</a></div>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="text-end">
                    <div id="navbarText" class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <?php if (!isset($_SESSION['connect'])) { ?>
                                <li class="nav-item">
                                    <a href="view/connectionView.php" class="nav-link">Connexion</a>
                                </li>
                            <?php } else if (isset($_SESSION['connect'])) { ?>
                                <li class="nav-item">
                                    <a href="src/logout.php" class="nav-link">Déconnexion</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <?= $content ?>

    <footer class="bg-dark p-2">
        <p class="text-center pt-2"><a href="http://jslcode.com/" class="text-light text-decoration-none h3 "> © 2023 JSL CODE</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

</body>

</html>