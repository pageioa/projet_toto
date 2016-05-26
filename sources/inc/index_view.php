
<h3>Sessions à ESCH-BELVAL:</h3>
<ul>
<?php foreach ($sessionList as $key=>$value) : ?>
	<li><a href="list.php?ses_id=<?= $value['ses_id'] ?>">
		du <?= $value['ses_opening'] ?> 
		au <?= $value['ses_ending'] ?></a></li>
<?php endforeach; ?>
</ul>

<h3>Statistiques:</h3>
<table border id="statistiques">
	<thead>
		<tr>
			<td>Ville</td>
			<td>Nombre <br/> étudiants</td>
		</tr>
	</thead>
<?php foreach ($statistiques as $key => $value) : ?>
	<tbody>
		<tr>
			<td><?= $value['cit_name'] ?></td>
			<td><?= $value['nb'] ?></td>
		</tr>
	</tbody>
<?php endforeach; ?>
</table>

