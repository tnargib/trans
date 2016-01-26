<main>
	<section class="">
		<h1 class="text-center">Profil de <?php echo $artiste->nomscene ?> <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i> Editer</button></h1> 


		<?php
			echo form_open('edition');
			
			$options = array(
                'France'  => 'France',
                'Etats-Unis'    => 'Etats-Unis',
                'Allemagne'   => 'Allemagne',
                'Brésil' => 'Brésil',
				'Angleterre'    => 'Angleterre',
                'Espagne'   => 'Espagne',
                'Russie' => 'Russie',
				'Pays-bas' => 'Pays-Bas',
				'Italie' => 'Italie',
				'Mexique' => 'Mexique',
				'Pologne' => 'Pologne',
				'Chine' => 'Chine',
				'Japon' => 'Japon',
				'Corée du Sud' => 'Corée du Sud',
            );
			
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
				'placeholder' => $artiste->mail,		 
				'value' => $artiste->mail
			];
			$telephone = [
				'name' => 'telephone',
				'id' => 'telephone',				
				'value' => $artiste->telephone,
				'placeholder' => $artiste->telephone
			];

			$nom = [
				'name' => 'nom',
				'id' => 'nom',			
				'placeholder' => $artiste->nom,	
				'value' => $artiste->nom
			];

			$prenom = [
				'name' => 'prenom',
				'id' => 'prenom',		
				'placeholder' => $artiste->prenom,		
				'value' => $artiste->prenom
			];

			$nomScene = [
				'name' => 'nomScene',
				'id' => 'nomScene',			
				'placeholder' => $artiste->nomscene,	
				'value' => $artiste->nomscene
			];


			$date = [
				'name' => 'date',
				'id' => 'date',
				'type' => 'number',		
				'placeholder' => $artiste->datedebut,		
				'value' => $artiste->datedebut
			];

			$formation = [
				'name' => 'formation',
				'id' => 'formation',
				'placeholder' => $artiste->formation,				
				'value' => $artiste->formation
			];

			$genre = [
				'name' => 'genre',
				'id' => 'genre',
				'placeholder' => $artiste->genre,				
				'value' => $artiste->genre
			];

			$site = [
				'name' => 'site',
				'id' => 'site',
				'placeholder' => $artiste->siteweb,				
				'value' => $artiste->siteweb
			];

			$influence = [
				'name' => 'influence',
				'id' => 'influence',	
				'placeholder' => $artiste->artiste_simil,		
				'value' => $artiste->artiste_simil
			]; 
			
		?>

		<?php if(isset($error)) echo "<center>". $error . "</center>"; ?>
		
		<p>Nom de scène : <?= form_input($nomScene) ?></p>
		<p>Mot de passe : <?= form_password($password) ?></p>
		<p>Confirmation mot de passe : <?= form_password($passconf) ?></p>
		<p>Nom : <?= form_input($nom) ?></p>
		<p>Prénom : <?= form_input($prenom) ?></p>


		<p>Pays : <?= form_dropdown('pays', $options, $artiste->pays) ?></p>
		<p>Année de formation : <?= form_input($date) ?></p>
		<p>Composition du groupe : <?= form_input($formation) ?></p>
		<p>Genre : <?= form_input($genre) ?></p>

		<p>Vos influences : <?= form_input($influence) ?></p>
		<h2>Coordonnées</h2>
		<p><i class="fa fa-envelope-o"></i> Mail : <?= form_input($mail) ?></p>
		<p><i class="fa fa-phone"></i> Téléphone : <?= form_input($telephone) ?></p>
		<p><i class="fa fa-globe"></i> Site web : <?= form_input($site) ?></p>

		<?= form_submit('edition', 'Enregistrer vos modifications', ['class' => 'block']) ?>
		<?= form_close() ?>
	</section>
</main>
