<? 	
/*
Modified Citadel Search

Modified from my ofginal search engine for my personal site.

The Search Engine, NOTHING Here Needs To Be Edited, 
To Change The Settings, Refer to:
log_config.php And Search_config.php

I Repeat DO NOT EDIT ANYTHING HERE Unless you know what your doing.

Current Version: 2.9b
*/

if(isset($_POST['action']) == true)
{
	if($_POST['action'] == "search")
	{
		$keyword = $_POST['keyword'];
		if(strlen($keyword) <= $MinLen)
		{
			echo "<p><b>Your keyword must be longer than $MinLen characters</b><br>";
			?>
			<form action="<? echo ($_SERVER['PHP_SELF']); ?>" method="post">
				<p>
					Search:
					<input type="text" name="keyword" size="20" maxlength="100">
					<input type="submit" name="submit" value="Search">
					<input type ="hidden" name="action" value ="search">
				</p>
			</form>
			<?
		}
		else
		{
			
			/* Groom the Search */
			$keyword = preg_replace('/\s\s+/', ' ',$keyword);
			$keyword = preg_replace('/[^a-zA-Z0-9\!@#$%^&*(){}|;:,.<>?-_=+`~½\s]/', '', $keyword);
			
			/* Timer Start */
			function getmicrotime()
			{
				list($usec, $sec) = explode(" ",microtime());
			   return ((float)$usec + (float)$sec);
			}
			
			echo "Query:[$keyword]<br><br>";
			
			/* Take in Craigs info */
			/* QRY str ["http://rochester.craigslist.org/search/sss?query=desk&srchType=A&format=rss"] */
			$rawrss = new DOMDocument();
			$rawrss->load("http://rochester.craigslist.org/search/sss?query=$keyword&srchType=A&format=rss");
			$arrRss = array();
			foreach ($rawrss->getElementsByTagName('item') as $node)
			{
				$itemRSS = array ( 
					'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
					'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
					'description' => $node->getElementsByTagName('description')->item(0)->nodeValue
					);
				array_push($arrRss, $itemRSS);
				/* print_r($itemRSS); */
				echo "<br>{$itemRSS['title']}<br>";
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
		}
	}
	else
	{
	echo 'poop?';
	}
}
else
{
 ?>
<form action="<? echo ($_SERVER['PHP_SELF']); ?>" method="post">
<p>
	Search:
			<input type="text" name="keyword" size="20" maxlength="100">
			<input type="submit" name="submit" value="Search">
			<input type ="hidden" name="action" value ="search">
</p>
</form>
<?
}
?>