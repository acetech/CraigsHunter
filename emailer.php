<?php

include ('GetEmail.php');

$obj = new EMail();

$results = $obj->getemail("http://rochester.craigslist.org/fuo/1912479989.html"); // Email Address
//$results = $obj->getemail("http://rochester.craigslist.org/bab/1912328994.html"); // No Email Addess

var_dump($results);
?>