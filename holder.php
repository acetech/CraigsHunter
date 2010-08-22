<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>
			CraigsHunter
		</title>
		<Meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<div class="Content">
			<div class="search">
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
			/* Call Search.php */
			include ('search.php');
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
			</div>
			<br><br>
			<div class="results">
				
			</div>
			<br><br>
		</div>
	</body>
</html>
<? /* QRY str ["http://rochester.craigslist.org/search/sss?query=desk&srchType=A&format=rss"] */ ?>