<?php

	session_start();

	require_once('option.php');

	if(isset($_SESSION['connect'])) {

		header('location: index.php');
		exit();

	}

	if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])) {

		// Connexion à la bdd
		require_once('../model/Manager.php');

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
		$bdd = require_once('../model/Manager.php');
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
		addUser(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['secret']));

		header('location: inscription.php?success=1');
		exit();

	}
?>

<?php
$title = "Inscription";

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
					<li class="nav-item">
						<a href="connection.php" class="nav-link">Connexion</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
<section id="connection">
	<div id="login-body">
		<h1>S'inscrire</h1>

		<?php if (isset($_GET['error']) && isset($_GET['message'])) {

			echo '<div class="alert error">' . htmlspecialchars($_GET['message']) . '</div>';
		} else if (isset($_GET['success'])) {

			echo '<div class="alert success">Vous êtes désormais inscrit. <a href="index.php">Connectez-vous</a>.</div>';
		} ?>

		<form method="post" action="inscription.php">
			<input type="email" name="email" placeholder="Votre adresse email" required />
			<input type="password" name="password" placeholder="Mot de passe" required />
			<input type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
			<button id="identifier" type="submit">S'inscrire</button>
		</form>

		<p class="grey">Déjà inscrit ? <a href="connection.php">Connectez-vous</a>.</p>
	</div>
</section>
<?php
$content = ob_get_clean();

require('../view/base.php');
?>