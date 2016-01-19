<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Festival Transmusicales 2016</title>
	<meta charset="utf-8">
	<?= link_tag('assets/css/style.css') ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
	<header>
		<nav>
			<ul>
			<?php if (isset($user) && $user->connected) { ?>
				<li><a href="<?= site_url('index') ?>">Réserver salle</a></li>
				<li><a href="<?= site_url('profil/index') ?>">Mon profil</a></li>
				<li><a href="<?= site_url('deconnexion') ?>">Déconnexion</a></li>
			<?php } else { ?>
				<li><a href="<?= site_url('index') ?>">Accueil</a></li>
				<li><a href="<?= site_url('inscription') ?>"?>Inscription</a></li>
				<li><a href="<?= site_url('connexion') ?>"?>Connexion </a></li>
			<?php } ?>
			</ul>
		</nav>
	</header>
