<?php
include ('search.php');
$query = "Rolex";

$obj = new Search();

$obj->search($query, "http://rochester.craigslist.org/search/sss?query=$query&srchType=A&format=rss");

print_r($obj);
