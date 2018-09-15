<?php

/*
	try {
		throw new Exception('Exception');
	} catch (Exception $e) {
		$e->getMessage();
	}
	
	
	
	*/
	
$flag = false;

try{
	if ($flag != true){
		throw new Exception('Not true');
	}
}catch (Exception $e) {
	echo $e->getMessage();
}
