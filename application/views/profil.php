<main>
	<section class="">
		<h1 class="text-center">Profil de <?php echo $artiste->nomscene ?> <a href="<?= site_url('editer_profil') ?>"> <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i> Editer</button> </a></h1> 

		<p>Nom de scène : <?php echo $artiste->nomscene ?></p>
		<p>Nom : <?php echo $artiste->nom ?></p>
		<p>Prénom : <?php echo $artiste->prenom ?></p>



		<p>Pays : <?php echo $artiste->pays ?></p>
		<p>Année de formation : <?php echo $artiste->datedebut ?></p>
		<p>Composition du groupe : <?php echo $artiste->formation ?></p>
		<p>Genre : <?php echo $artiste->genre ?></p>

		<p>Vos influences : <?php echo $artiste->artiste_simil ?></p>
		<h2>Coordonnées</h2>
		<p><i class="fa fa-envelope-o"></i> Mail : <?php echo $artiste->mail ?></p>
		<p><i class="fa fa-phone"></i> Téléphone : <?php echo $artiste->telephone ?></p>
		<p><i class="fa fa-globe"></i> Site web : <?php echo $artiste->siteweb ?></p>

		<h1 class="text-center">Vos Concerts prévus</h1>
		<table class="table table-striped">
			<thead>
      <tr>
        <th>Lieux</th>
        <th>Date</th>
        <th>Horaire</th>
				<th>Validation</th>
      </tr>
    </thead>
    <tbody>
			<?php foreach ($reservation as $row): ?>
				<tr>
				<?php foreach ($row as $value): ?>
					<td><?php echo $value ?></td>
				<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
    </tbody>
		</table>
	</section>
</main>
