<h3>Donées d'étudiant(e):</h3>
<ul>
	<li><?= $currentEtudiant['stu_name'] ?></li>
	<li><?= $currentEtudiant['stu_firstname'] ?></li>
	<li><?= $currentEtudiant['stu_email'] ?></li>
	<li><?= $currentEtudiant['cit_name'] ?></li>
	<li><?= $currentEtudiant['cou_name'] ?></li>
	<li><?= $currentEtudiant['mar_name'] ?></li>
	<li><?= $currentEtudiant['birthdate'] ?></li>
	<li><?= $traductionsFr[$zodiacSign] ?></li>
	<li><?php 
		if ($currentEtudiant['stu_sex'] == 'M') {
			echo "Homme";
			}
		else {
			echo "Femme";
		} 
		?></li>
	<li><?php
		if ($currentEtudiant['stu_with_experience'] == true) {
			echo "Avec expérience";
			}
		else {
			echo "Pas d'expérience";
		} 
		?></li>
	<li><?php
		if ($currentEtudiant['stu_is_leader'] == true) {
			echo "Oui";
			}
		else {
			echo "Non";
		} 
		?></li>
</ul>
<ul>
	<li><a href="list.php?ses_id=<?= $currentEtudiant['ses_id'] ?>">Retour</a></li>
</ul>
