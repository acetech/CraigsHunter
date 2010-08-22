<?php

/*
*	Gonna Borrow this.
*/
class EMail 
{
	
	function __construct() 
	{
		//Startup
	}

	/************************************************************************************************
	**																								*
	**	This function takes a craigslist Page and trims everything except the email address			*
	**																								*
	**	Will Return Email or Bool(False)																	*
	**																								*
	************************************************************************************************/
	function getemail($url=null) 
	{
		
		/* Take in Craigs page */
		$CLcontents = file_get_contents($url);
		
		// EMail Line
		// Reply to: <a href="mailto:sale-swgxr-1912504093@craigslist.org?subject=Little%20Tikes%20Lighted%20Art%20Desk%20-%20%2435%20(Penfield)&amp;body=%0A%0Ahttp%3A%2F%2Frochester.craigslist.org%2Fbab%2F1912504093.html%0A">sale-swgxr-1912504093@craigslist.org</a> <sup>[<a href="http://www.craigslist.org/about/help/replying_to_posts" target="_blank">Errors when replying to ads?</a>]</sup><br>
		// Reply to: see below <br>
		
		//$email = end(explode('mailto:',$CLcontents));
		//$email = current(explode('?subject=',$email));
		$email = current(explode('?subject=', current(explode(' <br>',end(explode('mailto:',end(explode('Reply to: ',$CLcontents))))))));
		
		$valid = filter_var($email, FILTER_VALIDATE_EMAIL);
		
		// Returns Email Address to caller
		//return $email;
		return $valid;
	}
}
?>