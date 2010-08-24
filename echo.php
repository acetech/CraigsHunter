<?php

/*
*	Gonna Borrow this.
*/
class CLParse
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
	function ParseCost($title=null) 
	{
		
		// Title Line
		$title = '22in flat screen LG monitor (fairport ny) $120';// Location and Price
		//$title = '22in flat screen LG monitor $120';// Price Only
		//$title = '22in flat screen LG monitor (fairport ny)';// Location Only
		//$title = '22in flat screen LG monitor';// Neither
		
		$split = explode(' ', $title);
		$res = '';
		foreach ($split as $i)
		{
			//echo substr($i, 0, 1);
			if (substr($i, 0, 1) == '$')
			{
				$res = $i;
				break;
			}
		}
		
		return $res;	
	}
	
	function ParseLocus($title=null)
	{
		
		// Title Line
		$title = '22in flat screen LG monitor (fairport ny) $120';// Location and Price
		//$title = '22in flat screen LG monitor $120';// Price Only
		//$title = '22in flat screen LG monitor (fairport ny)';// Location Only
		//$title = '22in flat screen LG monitor';// Neither
		
		$split = explode(' ', $title);
		$res = '';
		foreach ($split as $i)
		{
			//echo substr($i, 0, 1);
			if (substr($i, 0, 1) == '(')
			{
				// Found the Location?
				$res = $i;
				break;
			}
			elseif 
		}
		
		return $res;
	}
}

 
?>