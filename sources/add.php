<?php

// Je crée PDO
require 'inc/db.php';

// Gestion du POST
$errorList = array();
// Si le formulaire a été soumis
if (!empty($_POST)) {
	// Je récupère tous les champs du formulaires
	// si isset($_POST['studentName']) == true alors récupère la valeur de $_POST['studentName'], sinon, la valeur ''
	$name = isset($_POST['studentName']) ? $_POST['studentName'] : '';
	/*équivalent à
	if (isset($_POST['studentName'])) {
		$name = $_POST['studentName'];
	}
	else {
		$name = '';
	}*/
	$firstname = isset($_POST['studentFirstname']) ? $_POST['studentFirstname'] : '';
	$email = isset($_POST['studentEmail']) ? $_POST['studentEmail'] : '';
	$birthdate = isset($_POST['studentBirhtdate']) ? $_POST['studentBirhtdate'] : '';
	$cityID = isset($_POST['cit_id']) ? intval($_POST['cit_id']) : 0;
	$countryID = isset($_POST['cou_id']) ? intval($_POST['cou_id']) : 0;
	$maritalID = isset($_POST['mar_id']) ? intval($_POST['mar_id']) : 0;

	if (empty($name)) {
		$errorList[] = 'Le nom est vide';
	}
	if (empty($firstname)) {
		$errorList[] = 'Le prénom est vide';
	}
	if (empty($email)) {
		$errorList[] = 'L\'email est vide';
	}
	else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$errorList[] = 'L\'email est incorrect';
	}
	if (empty($birthdate)) {
		$errorList[] = 'La date de naissance est vide';
	}
	if (empty($cityID)) {
		$errorList[] = 'La ville est manquante';
	}
	if (empty($countryID)) {
		$errorList[] = 'La nationalité est manquante';
	}

	if (empty($errorList)) {
		echo 'je peux insérer en DB<br />';
	}
	// Sinon, afficher le contenu du tableau $errorList dans view.php
}


// Fin POST

$etudiantListe = array();
$citiesList = array(
	1 => 'Arlon',
	2 => 'Luxembourg',
	3 => 'Verdun',
	4 => 'Longwy',
	5 => 'Rodange',
	6 => 'Pissange',
	7 => 'Pétange',
);
$countriesList = array(
	1 => 'France',
	2 => 'Luxembourg',
	3 => 'Belgique',
	4 => 'Chine',
	6 => 'Allemagne',
);
$maritalStatusList = array(
	1 => 'Célibataire',
	2 => 'Marié(e)',
	3 => 'Divorcé(e)',
	4 => 'Veuf/veuve',
);

$sql = '
	SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate
	FROM student
	LEFT OUTER JOIN country ON country.cou_id = student.cou_id
	LEFT OUTER JOIN city ON city.cit_id = student.cit_id
	LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
';
$pdoStatement = $pdo->query($sql);

// Si erreur
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
}
else if ($pdoStatement->rowCount() > 0) {
	$etudiantListe = $pdoStatement->fetchAll();
}

require 'inc/header.php';
require 'inc/add_view.php';
require 'inc/footer.php';