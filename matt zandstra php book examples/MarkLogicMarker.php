<?php

class MarkLogicMarker extends Marker {
   private $engine;

   function __construct( $test ) {
      parent::__construct( $test );
      // $this->engine = new MarkParse( $test );
   }

   function mark( $response ) {
      // return $this->engine->evaluate( $response );
      // Возвратим фиктивное значение 
      return true;
   }
}

?>