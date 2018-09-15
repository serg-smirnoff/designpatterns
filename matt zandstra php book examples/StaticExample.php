<?php
class StaticExample {
   static public $aNum = 0;

   static public function sayHello() {
      self::$aNum++;
      print "Привет! (" . self::$aNum . ")\n";
   }
}
?>