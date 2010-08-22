<?php 

$string = '22in flat screen LG monitor (fairport ny) $120';
$replace = explode(' ', $string);

//var_dump($replace);

foreach ($replace as $i)
{
	//echo substr($i, 0, 1);
	if (substr($i, 0, 1) == '$')
		{
			echo $i;
		}
} 
 
?>