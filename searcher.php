<?php
include ('SearchEngine.php');
include ('GetEmail.php');
$query = "Monitor";

$srch = new Search();
$eml = new EMail();

$results = $srch->search("http://rochester.craigslist.org/search/sss?query=$query&srchType=A&format=rss");



//print_r($results);

// Return each email address from each result
/* No Need to Waste Processor and bandwith
foreach ($results as $value)
{
	$emailvar = $eml->getemail($value['link']);
	
	echo 'Result :[';
	echo strtolower($value['title']);
	echo '] - EMail:[';
	echo $emailvar;
	echo ']<br><br>';
}
*/
?>
