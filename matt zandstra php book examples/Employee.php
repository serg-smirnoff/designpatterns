<?php
abstract class Employee {
   protected $name;
   private static $types = array( 'Minion', 'CluedUp', 'WellConnected' );

   function __construct( $name ) {
      $this->name = $name;
   }

   abstract function fire();

   static function recruit( $name ) {
      $num = rand( 1, count( self::$types ) )-1;
      $class = self::$types[$num];
      return new $class( $name );
}


}
?>