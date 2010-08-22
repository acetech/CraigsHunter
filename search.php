<?php
/* Search Function */

			
			/* Groom the Search */
			$keyword = preg_replace('/\s\s+/', ' ',$keyword);
			$keyword = preg_replace('/[^a-zA-Z0-9\!@#$%^&*(){}|;:,.<>?-_=+`~½\s]/', '', $keyword);
			
			/* Timer Start */
			function getmicrotime()
			{
				list($usec, $sec) = explode(" ",microtime());
			   return ((float)$usec + (float)$sec);
			}
			
			echo "Query:[$keyword]<br><a href=\"http://rochester.craigslist.org/search/?areaID=126&amp;subAreaID=&amp;query=&amp;catAbb=sss\">Source</a><br><hr>";
			
			/* Take in Craigs info */
			/* QRY str ["http://rochester.craigslist.org/search/sss?query=desk&srchType=A&format=rss"] */
			$url = "http://rochester.craigslist.org/search/sss?query=$keyword&srchType=A&format=rss";
			/* 1and1
			$rawrss = new DOMDocument();
			$rawrss->load("http://rochester.craigslist.org/search/sss?query=$keyword&srchType=A&format=rss");
			*/
			$foo = file_get_contents($url); 
			$rawrss = new DOMDocument(); 
			$rawrss->loadXML($foo);
			$arrRss = array();
			foreach ($rawrss->getElementsByTagName('item') as $node)
			{
				$itemRSS = array ( 
					'title' => 			$node->getElementsByTagName('title')->item(0)->nodeValue,
					'link' => 			$node->getElementsByTagName('link')->item(0)->nodeValue,
					'description' => 	$node->getElementsByTagName('description')->item(0)->nodeValue
					);
				array_push($arrRss, $itemRSS);
				/* print_r($itemRSS); */
				/* Trim & to "&amp;" for Validity */
				/* b$itemRSS['title'] = preg_replace('&', '\&amp\;', $itemRSS['title']); */
				
				echo "<a href=\"{$itemRSS['link']}\">{$itemRSS['title']}</a><br><br>Dsc:{$itemRSS['description']}<br><hr>";
				/*
				<item rdf:about="http://rochester.craigslist.org/fuo/1891692752.html">
				<title><![CDATA[Desk chair - excellent condition (Rochester, NY downtown) $60]]></title>
				<link>http://rochester.craigslist.org/fuo/1891692752.html</link>
				<description><![CDATA[Rolling/netted back desk chair.  Great for computer or office desk.  I just purchased recently for $125.  Selling for half that.]]></description>
				<dc:date>2010-08-10T17:30:00-04:00</dc:date>
				<dc:language>en-us</dc:language>
				<dc:rights>Copyright &#x26;copy; 2010 craigslist, inc.</dc:rights>
				<dc:source>http://rochester.craigslist.org/fuo/1891692752.html</dc:source>
				<dc:title><![CDATA[Desk chair - excellent condition (Rochester, NY downtown) $60]]></dc:title>
				<dc:type>text</dc:type>
				<dcterms:issued>2010-08-10T17:30:00-04:00</dcterms:issued>
				</item>
				*/
			}

?>