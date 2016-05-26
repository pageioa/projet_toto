<?php

// Je crée PDO
require 'inc/db.php';

//print_r($_GET);
if (!empty($_GET['ses_id'])) {
	$sessionID = $_GET['ses_id'];
	//echo $sessionID; exit;

	//nombre d'etudiants per page
	$nbPerPage = 4;
	$currentOffset = 0;
	if (isset($_GET['offset'])) {
		$currentOffset = intval($_GET['offset']);
	}
}


$sql = '
	SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate
	FROM student
	LEFT OUTER JOIN country ON country.cou_id = student.cou_id
	LEFT OUTER JOIN city ON city.cit_id = student.cit_id
	LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
	WHERE ses_id = :sessionIddd
	LIMIT :offset, :nbPerPag
';
$pdoStatement = $pdo->prepare($sql);
// bindValue
$pdoStatement->bindValue(':sessionIddd', $sessionID, PDO::PARAM_INT);
$pdoStatement->bindValue(':nbPerPag', $nbPerPage, PDO::PARAM_INT);
$pdoStatement->bindValue(':offset', $currentOffset, PDO::PARAM_INT);

// Si erreur
if ($pdoStatement->execute() === false) {
	//print_r($pdo->errorInfo());
}
else if ($pdoStatement->rowCount() > 0) {
	$sessionList = $pdoStatement->fetchAll();
}

require 'inc/header.php';
require 'inc/list_view.php';
require 'css/style.css';
require 'inc/footer.php';