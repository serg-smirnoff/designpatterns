<?php


class gi_parse_StringReader extends gi_parse_Reader {
   private $in;
   private $pos; 

   function __construct( $in ) {
   $this->in = $in;
   $this->pos = 0; 
   } 

   function getChar() {
      if ( $this->pos >= strlen( $this->in ) ) { 
         return false;
      }
      $char = substr( $this->in, $this->pos, 1 );
      $this->pos++;
      return $char; 
   } 

   function getPos() {
      return $this->pos;
   } 

   function pushBackChar() {
      $this->pos--;
   } 

   function string() {
      return $this->in;
   }
} 


?>