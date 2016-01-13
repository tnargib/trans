<div id="navigation">
		<ul>
			<li><a href="<?= site_url('index') ?>">Accueil</a></li>
		<?php if(isset($user) && $user->connected) { ?>
			<li><a href="<?= site_url('todolist') ?>">Ma todo liste</a></li>
			<li><a href="<?= site_url('deconnexion') ?>">Deconnexion</a></li>
		<?php } else { ?>
			<li><a href="<?= site_url('inscription') ?>"?>Inscription</a></li>
			<li><a href="<?= site_url('connexion') ?>"?>Connexion </a></li>
		<?php } ?>
		</ul>
</div><!-- #navigation -->
