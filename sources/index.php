<?php

// Je crée PDO
require 'inc/db.php';

// J'écris ma requête
$sql = '
	SELECT ses_opening, ses_ending, ses_id
	FROM session
';
$pdoStatement = $pdo->query($sql);

// Si erreur
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
}
// sinon
else {
	// Je récupère toutes les données
	$sessionList = $pdoStatement->fetchAll();
	//print_r($sessionList);
}
// J'écris ma requête pour afficher les statistiques sur le nombre d'étudiants par ville
$sql = '
	SELECT COUNT(*) AS nb,
  	city.cit_name
	FROM
  	student
	INNER JOIN
  	city ON city.cit_id = student.cit_id
	GROUP BY
  	cit_name
  	ORDER BY nb DESC
';

$pdoStatement = $pdo->query($sql);

// Si erreur
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
}
// sinon
else {
	// Je récupère toutes les données
	$statistiques = $pdoStatement->fetchAll();
	//print_r($statistiques);
}




// J'affiche ma page
require 'inc/header.php';
require 'inc/index_view.php';
require 'inc/footer.php';