<main>
	<section style="width:80%">
		<h1 class="text-center">Réservation de salle</h1>

		<h2>Rechercher une salle</h2>
		<?php
			echo form_open('reservation_control/search');

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

			$date = [
				'name' => 'date',
				'id' => 'date',
				'type' => 'date',
				'placeholder' => 'Format YYYY-MM-DD',
				'value' => set_value('cap_max')
			];

			$horaire = array(
		        '00'  => '00',
		        '01'  => '01',
		        '02'  => '02',
		        '03'  => '03',
		        '04'  => '04',
		        '05'  => '05',
		        '06'  => '06',
		        '07'  => '07',
		        '08'  => '08',
		        '09'  => '09',
		        '10'  => '10',
		        '11'  => '11',
		        '12'  => '12',
		        '13'  => '13',
		        '14'  => '14',
		        '15'  => '15',
		        '16'  => '16',
		        '17'  => '17',
		        '18'  => '18',
		        '19'  => '19',
		        '20'  => '20',
		        '21'  => '21',
		        '22'  => '22',
		        '23'  => '23',
		        '24'  => '24',
		    );

			$acces_hand = [
				'name' => 'acces_hand',
				'id' => 'acces_hand',
				'style' => 'width:10%',
			];

			$type_salle = array(
		        'salle de concert'  => 'Salle de concert',
		        'bar'    => 'Bar',
		    );

			$adresse = [
				'name' => 'adresse',
				'id' => 'adresse',
				'placeholder' => 'Adresse',
				'value' => set_value('adresse')
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

		<p>Type de salle : <?= form_dropdown('type_salle', $type_salle) ?> </p>

		<p>horaire : <?= form_dropdown('horaire', $horaire) ?> </p>

		<p>date : <?= form_input($date) ?></p>

		<p style="display:inline-block;">Accès handicapé : </p><?= form_checkbox($acces_hand) ?>

		<?= form_submit('search', 'Lancer la recherche', ['class' => 'block']) ?>
		<?= form_close() ?>

		<?php if (isset($salles)): ?>
		<h1 class="text-center">Résultat de la recherche</h1>

		
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Capacité</th>
				<th>Adresse</th>
				<th>Téléphone</th>
				<th>Type de salle</th>
				<th>Accès handicapé</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($salles as $row): ?>
		<tr>
			<td><?php echo $row['nom']; ?></td>
			<td><?php echo $row['capacite'] ?></td>
			<td><?php echo $row['adresse'] ?></td>
			<td><?php echo $row['telephone'] ?></td>
			<td><?php echo $row['type_salle'] ?></td>
			<?php if ($row['acces_handicap'] == 'f') {
				echo '<td>Non</td>';
			} else {
				echo '<td>Oui</td>';
			} ?>

			<td><?php echo anchor('Reservation_control/add/'.$row.'/'.$_SESSION['user'], 'Réserver') ?></td>
		</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		<?php endif; ?>
		
	</section>
</main>
