<?php

class Test{
	
	public $publicProperty;
	private	$privateProperty;
	protected $protectedProperty;
	
	public function __construct(){
		return $this->privateProperty = 4;
	}
	
	public function publicMethod() {
		return $this->publicProperty + $this->privateProperty;
	}
	
	public function __destruct(){		
	}
	
}

$test = new Test();
$test->publicProperty = 2;
echo $test->publicMethod();

?>