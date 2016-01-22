<main>
	<section class="">
		<h1 class="text-center">Réservation de salle</h1>

		<h2>Rechercher une salle</h2>
		<?php
			echo form_open('search');

			$nom = [
				'name' => 'nom_salle',
				'id' => 'nom_salle',
				'placeholder' => 'Nom de salle',
				'value' => set_value('nom_salle')
			];

			$cap_min = [
				'name' => 'cap_min',
				'id' => 'cap_min',
				'type' => 'number',
				'style' => 'width:90%;',
				'value' => set_value('cap_min')
			];

			$cap_max = [
				'name' => 'cap_max',
				'id' => 'cap_max',
				'type' => 'number',
				'style' => 'width:90%;',
				'value' => set_value('cap_max')
			];

			$acces_hand = [
				'name' => 'acces_hand',
				'id' => 'acces_hand',
				'type' => 'checkbox',
				'style' => 'width:10%',
				'value' => set_value('acces_hand')
			];

			$type_salle = array(
        'salle_concert'  => 'Salle de concert',
        'bar'    => 'Bar',
      );

			$adresse = [
				'name' => 'adresse',
				'id' => 'adresse',
				'placeholder' => 'Adresse',
				'value' => set_value('adresse')
			];

			$telephone = [
				'name' => 'telephone',
				'id' => 'telephone',
				'placeholder' => 'Telephone',
				'value' => set_value('telephone')
			];

		?>

		<?php if(isset($error)) echo "<center>". $error . "</center>"; ?>

		<p>Nom de salle : <?= form_input($nom) ?></p>
		<table>
		<tr>
			<td style="text-align: center">
				<p>Capacité minimale : <?= form_input($cap_min) ?></p>
			</td>
			<td  style="text-align: center">
				<p>Capacité maximale : <?= form_input($cap_max) ?></p>
			</td>
		</tr>
		</table>

		<p>Adresse : <?= form_input($adresse) ?></p>
		<p>Téléphone : <?= form_input($telephone) ?></p>

		<p>Type de salle : <?= form_dropdown('Type de salle', $type_salle, 'salle_concert') ?> </p>
		<p style="display:inline-block;">Accès handicapé : </p><?= form_input($acces_hand) ?>

		<?= form_submit('search', 'Lancer la recherche', ['class' => 'block']) ?>
		<?= form_close() ?>
	</section>
</main>
