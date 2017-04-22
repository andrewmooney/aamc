<?php
	require_once('Occurance.php');
/**
	Using object oriented programming techniques, implement a script that which reads the data/total.loss.csv and searches for the words
	"total loss" ,"t/loss","t/l","total/l","towed" in the "incident_desc" field. The script should count the occurrences of each of these words.

	The script should also count the occurance of vehicle registration numbers which are in the format XXXDDD where X = Character from a-Z and D = digits from 0-9
	The output of the script should be as follows

**********************************
	Total Loss	| n occurances
	t/loss		| n occurances
	total/l		| n occurances
	towed		| n occurances
	t/l			| n occurances
	XXXDDD		| n occurances
**********************************
*/

// open csv file
$file = fopen("data/total.loss.csv", "r");

// convert csv to string
$data = "";

if ($file) {
	while (($line = fgets($file)) !== false) {
		$data .= $line;
	};
}

$occurance_a = new Occurance($data, "Total Loss");
$occurance_b = new Occurance($data, "t/loss");
$occurance_c = new Occurance($data, "total/l");
$occurance_d = new Occurance($data, "towed");
$occurance_e = new Occurance($data, "t/l");
$occurance_f = new Occurance($data, "([a-z]){3}([0-9]){3}");

echo $occurance_a;
echo $occurance_b;
echo $occurance_c;
echo $occurance_d;
echo $occurance_e;
echo $occurance_f;