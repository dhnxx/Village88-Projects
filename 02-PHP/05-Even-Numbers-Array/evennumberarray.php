<?php

$arr = array(); 

for ($num = 2; $num <= 1000; $num++)
{

	if ($num % 2 == 0) {

		$arr[] = $num; 
	}


}

var_dump($arr);

