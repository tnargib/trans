<main>
	<section class="large">
    <ul class="nav nav-tabs nav-justified">
      <li role="presentation"><a href="<?php echo site_url('atm_reserv_control/index') ?>">Réservations validées</a></li>
      <li role="presentation" class="active"><a href="<?php echo site_url('atm_reserv_control/waiting') ?>">Réservations en attente</a></li>
      <li role="presentation"><a href="<?php echo site_url('atm_reserv_control/refused') ?>">Réservationq refusées</a></li>
    </ul>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Salle</th>
                    <th>Artiste</th>
                    <th>Date (YYYY-MM-DD)</th>
            <th>Horaire</th>
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
