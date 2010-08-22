<?php

/*
*	This class will lookup a Craigslist Seach and return an array of the results
*/
class Search {
	
	function __construct() {
		//do nothing
	}

	/**
	*	This function takes a craigslist search URL and returns the information back in an Array()
	*/
	function search($url=null) {

		/* Groom the Search
		$keyword = preg_replace('/[+]\s\s+/', ' ',$keyword); // replace '+' Space, and multi spaces with one space
		$keyword = preg_replace('/[^a-zA-Z0-9\!@#$%^&*(){}|;:,.<>?-_=+`~�\s]/', '', $keyword); // replace anythiong thats not normal with nothing
		*/
		
		/* Take in Craigs info */
		$CLcontents = file_get_contents($url); 
		$rawrss = new DOMDocument(); 
		$rawrss->loadXML($CLcontents);
		$craigsRss = array();
		
		
		foreach ($rawrss->getElementsByTagName('item') as $node)
		{
			$title = $node->getElementsByTagName('title')->item(0)->nodeValue;
			$link = $node->getElementsByTagName('link')->item(0)->nodeValue;
			$description = $node->getElementsByTagName('description')->item(0)->nodeValue;
			/* todo: parse ^ into these */
			$name = ""; //this should be at the beginning of the title description string, with 0 or more location and price
			$location = ""; //location is optional, it occurs after name and before price, price is also optional, location occurs within parentheses
			$price = ""; //price is optional, this occurs after location wich is option as well, it will have a dollar sign and follow a number format
			
			// Working on the next three
			//$divide = preg_split('/(\\$[0-9]+(?:\\.[0-9][0-9])?)(?![\\d])/', $title, 1);
			//var_dump($divide);
			//echo '<br>';
			//current(explode(')',end(explode('(',$title))));
			
			$itemRSS = array ( 
				'title' => $title,
				'link' => $link,
				'description' => $description,
				'name' => $name,
				'location' => $location,
				'price' => $price
			);				
			//Each item will be pusshed into an array named $arrRss
			array_push($craigsRss, $itemRSS);
			
		}
		
		//Returns Array with Craigslist information
		return $craigsRss;
	}
	
	function getmicrotime()
	{
		list($usec, $sec) = explode(" ",microtime());
	    return ((float)$usec + (float)$sec);
	}	
}
?>
