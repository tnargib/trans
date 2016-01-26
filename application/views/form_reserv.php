<main>
	<section style="width:80%">
		<h1 class="text-center">Réservation de salle</h1>

		<h2>Quand voulez vous réserver ?</h2>
		<?php
			echo form_open('reservation_control/add_reserv');

      $date = [
				'name' => 'date',
				'id' => 'date',
				'type' => 'date',
				'placeholder' => 'Format YYYY-MM-DD',
				'value' => set_value('date')
			];

			$horaire = array(
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
            '00'  => '00',
		    );

		?>

		<?php if(isset($error)) echo "<center>". $error . "</center>"; ?>

    <p>Horaire : <?= form_dropdown('horaire', $horaire) ?> </p>

		<p>Date : <?= form_input($date) ?></p>

		<?= form_submit('search', 'Lancer la recherche', ['class' => 'block']) ?>
		<?= form_close() ?>

	</section>
</main>
