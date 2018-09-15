<?php

abstract class Marker {
   protected $test;

   function __construct( $test ) {
      $this->test = $test;
   }

   abstract function mark( $response );
}

?>