<main>
	<section class="small">
		<h1 class="text-center">Connexion</h1>
		<?php
			if(isset($error))
				echo $error;

			echo form_open('connexion');

			$username = [
				'name' => 'username',
				'id' => 'username',
				'placeholder' => 'Identifiant',
				'value' => set_value('username')
			];
			$password = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'placeholder' => 'Mot de passe',
				'value' => set_value('password')
			];
		?>
		<p><?= form_input($username) ?></p>
		<p><?= form_input($password) ?></p>

		<p><?= form_submit('connexion', 'Se connecter', ['class' => 'block']) ?></p>
		<?= form_close() ?>
	</section>
</main>
