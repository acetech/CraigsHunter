<?php

/*
*	This class will lookup a Craigslist Seach and return an array of the results
*/
public class search {
	function __construct($keyword=null, $url=null) {

		/* Groom the Search */
		$keyword = preg_replace('/\s\s+/', ' ',$keyword);
		$keyword = preg_replace('/[^a-zA-Z0-9\!@#$%^&*(){}|;:,.<>?-_=+`~�\s]/', '', $keyword);

		/* Take in Craigs info */
		$CLcontents = file_get_contents($url); 
		$rawrss = new DOMDocument(); 
		$rawrss->loadXML($CLcontents);
		$craigsRss = array();
		
		foreach ($rawrss->getElementsByTagName('item') as $node)
		{
			$title = $node->getElementsByTagName('title')->item(0)->nodeValue,
			$link = $node->getElementsByTagName('link')->item(0)->nodeValue,
			$description = $node->getElementsByTagName('description')->item(0)->nodeValue
			
			$itemRSS = array ( 
				'title' => $title,
				'link' => $link,
				'description' => $description			
			);				
			//Each item will be pusshed into an array named $arrRss
			array_push($craigsRss, $itemRSS);
		}
		
		//Returns Array with Craigslist information
		return $craigsRss;
	}
	
	/* Timer Start */
	function getmicrotime()
	{
		list($usec, $sec) = explode(" ",microtime());
	    return ((float)$usec + (float)$sec);
	}	
}
