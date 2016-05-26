<form>
	<input type="hidden" name="ses_id" value="<?=$sessionID ?>">
	<select name="nbPerPag">
		<option value="1">1 par page</option>
		<option value="2">2 par page</option>
		<option value="3">3 par page</option>
		<option value="4">4 par page</option>
		<option value="5">5 par page</option>
		<option value="6">6 par page</option>
		<option value="7">7 par page</option>
		<option value="8">8 par page</option>
	</select>
	<input type="submit" value="OK">
</form>

<h3>Liste des étudiants:</h3>
<?php if (isset($sessionList) && sizeof($sessionList) > 0) : ?>
<table border id="etudiants">
	<thead>
		<tr>
			<td>Nom</td>
			<td>Prénom</td>
			<td>Email</td>
			<td>Ville</td>
			<td>Nationalité</td>
			<td>Statut marital</td>
			<td>Date de naissance</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($sessionList as $currentEtudiant) : ?>
			<tr>
				<td><a href="student.php?stu_id=<?= $currentEtudiant['stu_id'] ?>"><?= $currentEtudiant['stu_name'] ?></a></td>
				<td><a href="student.php?stu_id=<?= $currentEtudiant['stu_id'] ?>"><?= $currentEtudiant['stu_firstname'] ?></a></td>
				<td><?= $currentEtudiant['stu_email'] ?></td>
				<td><?= $currentEtudiant['cit_name'] ?></td>
				<td><?= $currentEtudiant['cou_name'] ?></td>
				<td><?= $currentEtudiant['mar_name'] ?></td>
				<td><?= $currentEtudiant['birthdate'] ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<a href="list.php?ses_id=<?=$sessionID ?>&offset=<?=($currentOffset + $nbPerPage) ?>">Suivant</a><br/>
<a href="list.php?ses_id=<?=$sessionID ?>&offset=<?=$currentOffset >= $nbPerPage ? $currentOffset - $nbPerPage:''; ?>">Avant</a><br/>

<?php else :?>
aucun étudiant
<?php endif; ?>
