<?php

// В этом абстрактном классе хранятся вложенные анализаторы
abstract class gi_parse_CollectionParse extends gi_parse_Parser {
   protected $parsers = array(); 

   function add( gi_parse_Parser $p ) {
      if ( is_null( $p ) ) { 
         throw new Exception( "argument is null" );
      }
      $this->parsers[]= $p;
      return $p; 
   } 

   function term() {
      return false; 
   }
} 



?>