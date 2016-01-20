<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Festival Transmusicales 2016</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<?= link_tag('assets/js/bootstrap/js/bootstrap.js') ?>
	<?= link_tag('assets/js/bootstrap/css/bootstrap.css') ?>

	<?= link_tag('assets/css/style.css') ?>
</head>

<body>
	<header>
		<nav>
			<ul>
			<?php if (isset($user) && $user->connected) { ?>
				<li><a class="titre_head" href="<?= site_url('reserver') ?>">Réserver salle</a></li>
				<li><a class="titre_head" href="<?= site_url('profil_control') ?>">Profil</a></li>
				<li><a class="titre_head" href="<?= site_url('deconnexion') ?>">Déconnexion</a></li>
			<?php } else { ?>
				<li><a class="titre_head" href="<?= site_url('index') ?>">Accueil</a></li>
				<li><a class="titre_head" href="<?= site_url('inscription') ?>"?>Inscription</a></li>
				<li><a class="titre_head" href="<?= site_url('connexion') ?>"?>Connexion </a></li>
			<?php } ?>
			</ul>
		</nav>
	</header>
