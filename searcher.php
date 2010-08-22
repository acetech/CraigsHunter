<?php
include ('SearchEngine.php');
$query = "Rolex";

$obj = new Search();

$query = "Rolex";
$results = $obj->search("http://rochester.craigslist.org/search/sss?query=$query&srchType=A&format=rss");

print_r($results);

?>