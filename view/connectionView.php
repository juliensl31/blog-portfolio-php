<?php

session_start();

require_once('../src/option.php');

if (!empty($_POST['email']) && !empty($_POST['password'])) {

	// Connexion à la bdd
	require_once('../src/connection.php');

	// Variables
	$email			= htmlspecialchars($_POST['email']);
	$password		= htmlspecialchars($_POST['password']);

	// L'adresse email est-elle correcte ?
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		header('location: connectionView.php?error=1&message=Votre adresse email est invalide.');
		exit();
	}

	// Chiffrement du mot de passe
	$password = "aq1" . sha1($password . "123") . "25";

	// L'adresse email est-elle bien utilisée ?
	$req = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM user WHERE email = ?');
	$req->execute([$email]);

	while ($emailVerification = $req->fetch()) {

		if ($emailVerification['numberEmail'] != 1) {

			header('location: connectionView.php?error=1&message=Impossible de vous authentifier correctement.');
			exit();
		}
	}

	// Connexion
	$req = $bdd->prepare('SELECT * FROM user WHERE email = ?');
	$req->execute([$email]);

	while ($user = $req->fetch()) {

		if ($password == $user['password']) {

			$_SESSION['connect'] = 1;
			$_SESSION['email']	 = $user['email'];

			if (isset($_POST['auto'])) {

				setcookie('auth', $user['secret'], time() + 365 * 24 * 3600, '/', null, false, true);
			}

			header('location: connectionView.php?success=1');
			exit();
		} else {

			header('location: connectionView.php?error=1&message=Impossible de vous authentifier correctement.');
			exit();
		}
	}
}

?>


<?php
$title = "Connexion";

ob_start();
?>
    <nav class="navbar bg-dark navbar-dark navbar-expand-md sticky-top">
        <div class="container">
            <div class="navbar-brand">Blog / Portfolio</div>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="text-end">
                <div id="navbarText" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link ">Accueil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<section class="d-flex flex-grow-1">
	<div id="login-body" class="p-5 mt-5 rounded text-light mx-auto my-auto bg-secondary bg-opacity-50">

		<?php if (isset($_SESSION['connect'])) { ?>

			<h1>Bonjour !</h1>
			<?php
			if (isset($_GET['success'])) {
				echo '<div class="bg-success rounded p-2 mb-2 text-center">Vous êtes maintenant connecté</div>';
			} ?>
			<small><a href="../src/logout.php" class="text-light text-decoration-none">Déconnexion</a></small>

		<?php } else { ?>
			<h1 class="text-uppercase">S'identifier</h1>

			<?php if (isset($_GET['error'])) {

				if (isset($_GET['message'])) {
					echo '<div class="bg-danger rounded p-2 mb-2 text-center">' . htmlspecialchars($_GET['message']) . '</div>';
				}
			} ?>

			<form method="post" action="connectionView.php">
				<input type="email" class="bg-dark" name="email" placeholder="Votre adresse email" required />
				<input type="password" class="bg-dark" name="password" placeholder="Mot de passe" required />
				<button type="submit" class="bg-info text-light fw-bold border-0 w-100 p-3 rounded mb-2 text-uppercase">S'identifier</button>
				<label id="option" class="text-warning mt-2 d-block fw-bold"><input class="m-2" type="checkbox" name="auto" checked />Se souvenir de moi</label>
			</form>


			<p class="text-warning fw-bold">Première visite ? <a href="inscriptionView.php" class="text-light text-decoration-none">Inscrivez-vous</a></p>
		<?php } ?>
	</div>
</section>
<?php
$content = ob_get_clean();

require('base.php');
?>