<?php

	require_once('../src/option.php');

	if(isset($_SESSION['connect'])) {

		header('location: connectionView.php');
		exit();

	}

	if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])) {

		// Connexion à la bdd
		require_once('../src/connection.php');

		// Variables
		$email			= htmlspecialchars($_POST['email']);
		$password		= htmlspecialchars($_POST['password']);
		$passwordTwo	= htmlspecialchars($_POST['password_two']);

		// Les mots de passe sont-ils différents ?
		if($password != $passwordTwo) {

			header('location: inscriptionView.php?error=1&message=Vos mots de passe ne sont pas identiques.');
			exit();

		}

		// L'adresse email est-elle correcte ?
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			header('location: inscriptionView.php?error=1&message=Votre adresse email est invalide.');
			exit();

		}
		
		// L'adresse email est-elle en doublon ?
		$req = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM user WHERE email = ?');
		$req->execute([$email]);

		while($emailVerification = $req->fetch()) {

			if($emailVerification['numberEmail'] != 0) {

				header('location: inscriptionView.php?error=1&message=Votre adresse email est déjà utilisée par un autre utilisateur.');
				exit();

			}

		}

		// Chiffrement du mot de passe
		$password = "aq1".sha1($password."123")."25";

		// Secret
		$secret = sha1($email).time();
		$secret = sha1($secret).time();

		// Ajouter un utilisateur
		$req = $bdd->prepare('INSERT INTO user(email, password, secret) VALUES(?, ?, ?)');
		$req->execute([$email, $password, $secret]);

		header('location: inscriptionView.php?success=1');
		exit();

	}
?>

<?php
$title = "Inscription";

ob_start();
?>
<section class="d-flex flex-grow-1" id="background">
	<div id="login-body" class="p-5 mt-5 rounded text-light mx-auto my-auto bg-secondary bg-opacity-50">
		<h1 class="text-uppercase">S'inscrire</h1>

		<?php if (isset($_GET['error']) && isset($_GET['message'])) {

			echo '<div class="alert error">' . htmlspecialchars($_GET['message']) . '</div>';
			
		} else if (isset($_GET['success'])) {

			echo '<div class="bg-success rounded p-2 mb-2 text-center">Vous êtes désormais inscrit. <a href="connectionView.php" class="text-light">Connectez-vous</a></div>';
		} ?>

		<form method="post" action="inscriptionView.php">
			<input type="email" name="email" placeholder="Votre adresse email" required />
			<input type="password" name="password" placeholder="Mot de passe" required />
			<input type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
			<button type="submit" class="bg-info text-light fw-bold border-0 w-100 p-3 rounded mb-2 text-uppercase">S'inscrire</button>
		</form>

		<p class="text-warning fw-bold">Déjà inscrit ? <a href="connectionView.php" class="text-light text-decoration-none">Connectez-vous</a></p>
	</div>
</section>
<?php
$content = ob_get_clean();

require('base.php');
?>