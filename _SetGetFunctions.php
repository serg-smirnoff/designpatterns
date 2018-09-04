<?php 

class GetSet {
	
	private $number = 1;
	
	public function __get($name){
		echo "You get {$name}";
	}
	
	public function __set($name, $val){
		echo "You set {$name} to {$val}";
	}
	
}

$obj = new GetSet();
//echo $obj->number;
echo $obj->number = 13;

?>