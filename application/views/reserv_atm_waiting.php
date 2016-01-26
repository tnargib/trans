<main>
	<section class="large">
    <ul class="nav nav-tabs nav-justified">
      <li role="presentation"><a href="<?php echo site_url('atm_reserv_control/index') ?>">Réservations Validés</a></li>
      <li role="presentation" class="active"><a href="<?php echo site_url('atm_reserv_control/waiting') ?>">Réservations en attente</a></li>
      <li role="presentation"><a href="<?php echo site_url('atm_reserv_control/refused') ?>">Réservation refusés</a></li>
    </ul>

    <table class="table table-striped">
		<thead>
			<tr>
				<th>salle</th>
				<th>artiste</th>
				<th>date (YYYY-MM-DD)</th>
        <th>horaire</th>
        <th></th>
        <th></th>
      </tr>
		</thead>
		<tbody>
		<?php foreach ($reserv as $row): ?>
		<tr>
			<td><?php echo $row['nom']; ?></td>
			<td><?php echo $row['nomscene'] ?></td>
			<td><?php echo $row['date_reservation'] ?></td>
			<td><?php echo $row['horaire'] ?></td>
      <td><?php echo anchor('atm_reserv_control/accept/'.$row['id_res'], 'Accepter') ?></td>
      <td><?php echo anchor('atm_reserv_control/refuse/'.$row['id_res'], 'Refuser') ?></td>
		</tr>
		<?php endforeach; ?>
		</tbody>

		</table>

	</section>
</main>
