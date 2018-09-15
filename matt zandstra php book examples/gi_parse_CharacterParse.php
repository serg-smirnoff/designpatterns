<?php

class gi_parse_CharacterParse extends gi_parse_Parser {
   private $char; 

   function __construct( $char, $name=null, $options=null ) {
      parent::__construct( $name, $options );
      $this->char = $char; 
   } 

   function trigger( gi_parse_Scanner $scanner ) {
      return ( $scanner->token() == $this->char );
   } 

   protected function doScan( gi_parse_Scanner $scanner ) {
      return ( $this->trigger( $scanner ) );
   }
} 



?>