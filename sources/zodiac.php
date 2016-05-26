<?php

//Inclut automatiquement tous les packages de Composer
require_once __DIR__.'/vendor/autoload.php';

use Whatsma\ZodiacSign;

$calculator = new ZodiacSign\Calculator();

try {
  $zodiacSign = $calculator->calculate(28,1);
  //echo $zodiacSign . "\n";
} catch (ZodiacSign\InvalidDayException $e) {
  echo "ERROR: Invalid Day";
} catch (ZodiacSign\InvalidMonthException $e) {
  echo "ERROR: Invalid Month";
}

$traductiosFr = array(
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
echo "$traductiosFr[$zodiacSign]";