<?php

/*
*	This class will lookup a Craigslist Seach and return an array of the results
*/
function search ($keyword, $url)
{
	/* ???
	function __construct($keyword=null, $url=null) {
	*/

		/* Groom the Search */
		$keyword = preg_replace('/\s\s+/', ' ',$keyword); 
		$keyword = preg_replace('/[^a-zA-Z0-9\!@#$%^&*(){}|;:,.<>?-_=+`~�\s]/', '', $keyword);

		/* Take in Craigs info */
		$CLcontents = file_get_contents($url); 
		$rawrss = new DOMDocument(); 
		$rawrss->loadXML($CLcontents);
		$craigsRss = array();
		
		/* DO NOT DELETE ME!!!
		<item rdf:about="http://rochester.craigslist.org/fud/1910888064.html">
		<title><![CDATA[Computer Desk For College (Gates near 390) $99]]></title>
		<link>http://rochester.craigslist.org/fud/1910888064.html</link>
		<description><![CDATA[Computer Desk For College – Plus CD Storage – New Still in Box - Never Opened - Large Desk Space 36 L x 20 W x 53 H to Top Shelf (30” High Desk) – Pull out Key Board Drawer – Storage on Bottom – Book Shelf up Top – Great for all Students – Big Stores $199.99 – Now $99.99 – Call Today 585-328-6288.]]></description>
		<dc:date>2010-08-21T09:41:08-04:00</dc:date>
		<dc:language>en-us</dc:language>
		<dc:rights>Copyright &#x26;copy; 2010 craigslist, inc.</dc:rights>
		<dc:source>http://rochester.craigslist.org/fud/1910888064.html</dc:source>
		<dc:title><![CDATA[Computer Desk For College (Gates near 390) $99]]></dc:title>
		<dc:type>text</dc:type>
		<dcterms:issued>2010-08-21T09:41:08-04:00</dcterms:issued>
		</item>
		*/
		
		foreach ($rawrss->getElementsByTagName('item') as $node)
		{
			$title = $node->getElementsByTagName('title')->item(0)->nodeValue;
			$link = $node->getElementsByTagName('link')->item(0)->nodeValue;
			$description = $node->getElementsByTagName('description')->item(0)->nodeValue;
			/* todo parse ^ into these */
			$name = "";
			$location = "";
			$price = "";
			
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
	/* ???
	}
	*/
	
	/* Timer Start */
	function getmicrotime()
	{
		list($usec, $sec) = explode(" ",microtime());
	    return ((float)$usec + (float)$sec);
	}	
}
