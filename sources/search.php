<?php

// Je crée PDO
require 'inc/db.php';

$etudianteKey = array();

if (!empty($_GET['search'])) {
	$etudianteKey = $_GET['search'];

	if (isset($_GET['search'])) {
			$etudianteKey = $_GET['search'];
			
		

	$sql = '
			SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate
			FROM student
			LEFT OUTER JOIN country ON country.cou_id = student.cou_id
			LEFT OUTER JOIN city ON city.cit_id = student.cit_id
			LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
			WHERE stu_name LIKE :searchAll 
			OR stu_firstname LIKE :searchAll
			OR cou_name LIKE :searchAll
			OR mar_name LIKE :searchAll
			OR cit_name LIKE :searchAll
			OR stu_email LIKE :searchAll
		';
		$pdoStatement = $pdo->prepare($sql);
		// bindValue
		$pdoStatement->bindValue(':searchAll', '%'.$etudianteKey.'%');
		

		// Si erreur
		if ($pdoStatement->execute() === false) {
			//print_r($pdo->errorInfo());

		}
		else if ($pdoStatement->rowCount() > 0) {
			$sessionList = $pdoStatement->fetchAll();
	}

	}
}

require 'inc/header.php';
require 'inc/list_view.php';
require 'css/style.css';
require 'inc/footer.php';