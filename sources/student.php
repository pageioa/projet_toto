<?php

// Je crée PDO
require 'inc/db.php';

//print_r($_GET);
if (!empty($_GET['stu_id'])) {
	$studentID = $_GET['stu_id'];
	//echo $sessionID; exit;

}

$sql = '
	SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate, stu_sex, stu_with_experience, stu_is_leader, ses_id
	FROM student
	LEFT OUTER JOIN country ON country.cou_id = student.cou_id
	LEFT OUTER JOIN city ON city.cit_id = student.cit_id
	LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
	WHERE stu_id = :studentIddd
';
$pdoStatement = $pdo->prepare($sql);
// bindValue
$pdoStatement->bindValue(':studentIddd', $studentID, PDO::PARAM_INT);

// Si erreur
if ($pdoStatement->execute() === false) {
	print_r($pdo->errorInfo());
}
else if ($pdoStatement->rowCount() > 0) {
	$currentEtudiant = $pdoStatement->fetch();
}


//Inclut automatiquement tous les packages de Composer (ZODIAC)
require_once __DIR__.'/vendor/autoload.php';

use Whatsma\ZodiacSign;

$calculator = new ZodiacSign\Calculator();
$jour = substr($currentEtudiant['birthdate'], 8, 2);
$mois = substr($currentEtudiant['birthdate'], 5, 2);

try {
  $zodiacSign = $calculator->calculate(intval($jour), intval($mois));
  //echo $zodiacSign . "\n";
} catch (ZodiacSign\InvalidDayException $e) {
  echo "ERROR: Invalid Day";
} catch (ZodiacSign\InvalidMonthException $e) {
  echo "ERROR: Invalid Month";
}

$traductionsFr = array(
	'aries' => 'bélier',
	'taurus' => 'taureau',
	'gemini' => 'gémeaux',
	'cancer' => 'cancer',
	'leo' => 'lion',
	'virgo' => 'vierge',
	'libra' => 'balance',
	'scorpio' => 'scorpion',
	'aquarius' => 'verseau',
	'sagittarius' => 'sagittaire',
	'capricorn' => 'capricorne',
	'pices' => 'poissons',

	);
//echo "$traductionsFr[$zodiacSign]";


require 'inc/header.php';
require 'inc/student_view.php';
require 'css/style.css';
require 'inc/footer.php';