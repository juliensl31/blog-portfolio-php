<?php

	session_start();

	require_once('src/option.php');

	if(isset($_SESSION['connect'])) {

		header('location: index.php');
		exit();

	}

	if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])) {

		// Connexion à la bdd
		require_once('src/connection.php');

		// Variables
		$email			= htmlspecialchars($_POST['email']);
		$password		= htmlspecialchars($_POST['password']);
		$passwordTwo	= htmlspecialchars($_POST['password_two']);

		// Les mots de passe sont-ils différents ?
		if($password != $passwordTwo) {

			header('location: inscription.php?error=1&message=Vos mots de passe ne sont pas identiques.');
			exit();

		}

		// L'adresse email est-elle correcte ?
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			header('location: inscription.php?error=1&message=Votre adresse email est invalide.');
			exit();

		}
		
		// L'adresse email est-elle en doublon ?
		$req = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM user WHERE email = ?');
		$req->execute([$email]);

		while($emailVerification = $req->fetch()) {

			if($emailVerification['numberEmail'] != 0) {

				header('location: inscription.php?error=1&message=Votre adresse email est déjà utilisée par un autre utilisateur.');
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

		header('location: inscription.php?success=1');
		exit();

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Netflix</title>
	<link rel="stylesheet" type="text/css" href="design/default.css">
	<link rel="icon" type="image/png" href="assets/favicon.png">
</head>
<body>

	<?php require_once('src/header.php'); ?>
	
	<section>
		<div id="login-body">
			<h1>S'inscrire</h1>

			<?php if(isset($_GET['error']) && isset($_GET['message'])) {

				echo '<div class="alert error">'.htmlspecialchars($_GET['message']).'</div>';

			} else if(isset($_GET['success'])) {

				echo '<div class="alert success">Vous êtes désormais inscrit. <a href="index.php">Connectez-vous</a>.</div>';

			} ?>

			<form method="post" action="inscription.php">
				<input type="email" name="email" placeholder="Votre adresse email" required />
				<input type="password" name="password" placeholder="Mot de passe" required />
				<input type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
				<button type="submit">S'inscrire</button>
			</form>

			<p class="grey">Déjà sur Netflix ? <a href="index.php">Connectez-vous</a>.</p>
		</div>
	</section>

	<?php require_once('src/footer.php'); ?>
</body>
</html>