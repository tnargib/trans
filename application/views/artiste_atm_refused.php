<main>
	<section class="large">
		<ul class="nav nav-tabs nav-justified">
      <li role="presentation"><a href="<?php echo site_url('atm_artiste_control/index') ?>">Inscription Validés</a></li>
      <li role="presentation"><a href="<?php echo site_url('atm_artiste_control/waiting') ?>">Inscription en attente</a></li>
      <li role="presentation" class="active"><a href="<?php echo site_url('atm_artiste_control/refused') ?>">Inscription refusés</a></li>
    </ul>

    <table class="table table-striped">
		<thead>
			<tr>
				<th>Nom de scène</th>
				<th>Nom</th>
				<th>Prénom</th>
        <th>Mail</th>
        <th>Téléphone</th>
        <th>Pays</th>
        <th>Année de début</th>
        <th>Formation</th>
        <th>Genre</th>
        <th>Site web</th>
        <th>Influence</th>
				<th></th>
      </tr>
		</thead>
		<tbody>
		<?php foreach ($artistes as $row): ?>
		<tr>
			<td><?php echo $row['nomscene']; ?></td>
			<td><?php echo $row['nom'] ?></td>
			<td><?php echo $row['prenom'] ?></td>
			<td><?php echo $row['mail'] ?></td>
      <td><?php echo $row['telephone'] ?></td>
      <td><?php echo $row['pays'] ?></td>
      <td><?php echo $row['datedebut'] ?></td>
      <td><?php echo $row['formation'] ?></td>
      <td><?php echo $row['genre'] ?></td>
      <td><?php echo $row['siteweb'] ?></td>
      <td><?php echo $row['artiste_simil'] ?></td>
			<td><?php echo anchor('', 'Rajouter') ?></td>
		</tr>
		<?php endforeach; ?>
		</tbody>
		</table>

	</section>
</main>
