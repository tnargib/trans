<main id="inscription">
	<section class="">
		<h1 class="text-center">Inscription</h1>
		<?php
			echo form_open('inscription');

			$options = array(
                'france'  => 'France',
                'murica'    => 'Etats-Unis',
                'allemagne'   => 'Allemagne',
                'bresil' => 'Brésil',
				'angleterre'    => 'Angleterre',
                'espagne'   => 'Espagne',
                'russie' => 'Russie',
				'pays_bas' => 'Pays-Bas',
				'italie' => 'Italie',
				'mexique' => 'Mexique',
				'pologne' => 'Pologne',
				'chine' => 'Chine',
				'japon' => 'Japon',
				'coree' => 'Corée du Sud',
                );

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

			$passconf = [
				'name' => 'passconf',
				'id' => 'passconf',
				'type' => 'password',
				'placeholder' => 'Confirmation mot de passe',
				'value' => set_value('passconf')
			];

			$mail = [
				'name' => 'mail',
				'id' => 'mail',
				'type' => 'email',
				'placeholder' => 'E-Mail',
				'value' => set_value('email')
			];
			$telephone = [
				'name' => 'telephone',
				'id' => 'telephone',				
				'placeholder' => 'Téléphone',
				'value' => set_value('telephone')
			];

			$nom = [
				'name' => 'nom',
				'id' => 'nom',				
				'placeholder' => 'Nom',
				'value' => set_value('nom')
			];

			$prenom = [
				'name' => 'prenom',
				'id' => 'prenom',				
				'placeholder' => 'Prénom',
				'value' => set_value('prenom')
			];

			$nomScene = [
				'name' => 'nomScene',
				'id' => 'nomScene',				
				'placeholder' => 'nom de scène',
				'value' => set_value('nomScene')
			];


			$date = [
				'name' => 'date',
				'id' => 'date',
				'type' => 'date',
				'placeholder' => 'Date de formation',
				'value' => set_value('date')
			];

			$formation = [
				'name' => 'formation',
				'id' => 'formation',				
				'placeholder' => 'Composition de votre groupe',
				'value' => set_value('formation')
			];

			$genre = [
				'name' => 'genre',
				'id' => 'genre',				
				'placeholder' => 'Genre',
				'value' => set_value('genre')
			];

			$site = [
				'name' => 'site',
				'id' => 'site',				
				'placeholder' => 'Site web',
				'value' => set_value('site')
			];

			$influence = [
				'name' => 'influence',
				'id' => 'influence',				
				'placeholder' => 'Vous êtes influencé par ...',
				'value' => set_value('influence')
			];

			
		?>
		<table style="width:100%;text-align:center;">
		<tr>
			<td colspan="2"><?php if(isset($error)) echo $error; ?></td>
		</tr>
		<tr>
			<td>
				<p><?= form_input($username) ?></p>
				<p><?= form_password($password) ?></p>
				<p><?= form_password($passconf) ?></p>
				<p><?= form_input($mail) ?></p>
				<p><?= form_input($nom) ?></p>
				<p><?= form_input($prenom) ?></p>
				<p><?= form_input($nomScene) ?></p>
				<p><?= form_input($telephone) ?></p>
				<p><?= form_dropdown('pays', $options, 'france') ?> </p>
			</td>
			<td>
				<p><?= form_input($date) ?></p>
				<p><?= form_textarea($formation) ?></p>
				<p><?= form_input($genre) ?></p>
				<p><?= form_input($site) ?></p>
				<p><?= form_textarea($influence) ?></p>
		 		
	 		</td>
		</tr>
		<tr>
			<td colspan="2">
				<p style="width:60%;margin:auto;margin-bottom: 10px;"><?= form_submit('inscription', 'S\'inscrire', ['class' => 'block']) ?></p>
			</td>
		</tr>
		</table>
		<?= form_close() ?>
	</section>
</main>
