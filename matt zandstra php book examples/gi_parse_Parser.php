<?php

abstract class gi_parse_Parser { 

   const GIP_RESPECTSPACE  = 1;
   protected $respectSpace = false;
   protected static $debug = false;
   protected $discard      = false;
   protected $name;
   private static $count=0;
 
   function __construct( $name=null, $options=null ) { 
      if ( is_null( $name ) ) {
         self::$count++;
         $this->name = get_class( $this ) . " (" . self::$count.")"; 
      } else { 
         $this->name = $name;
      }

      if ( is_array( $options ) ) { 
         if ( isset( $options[self::GIP_RESPECTSPACE] ) ) {
            $this->respectSpace=true;
         }
      }
   } 

   protected function next( gi_parse_Scanner $scanner ) {
      $scanner->nextToken();
      if ( ! $this->respectSpace ) { 
         $scanner->eatWhiteSpace();
      }
   } 

   function spaceSignificant( $bool ) {
      $this->respectSpace = $bool;
   } 

   static function setDebug( $bool ) {
      self::$debug = $bool;
   } 

   function setHandler( gi_parse_Handler $handler ) {
      $this->handler = $handler; 
   } 

   final function scan( gi_parse_Scanner $scanner ) {
      if ( $scanner->tokenType() == gi_parse_Scanner::SOF ) { 
         $scanner->nextToken();
      }
      $ret = $this->doScan( $scanner );
      if ( $ret && ! $this->discard && $this->term() ) { 
         $this->push( $scanner );
      }
      if ( $ret ) { 
         $this->invokeHandler( $scanner );
      } 

      if ( $this->term() && $ret ) { 
         $this->next( $scanner );
      }
      $this->report("::scan returning $ret");
      return $ret; 
   } 

   function discard() {
      $this->discard = true;
   } 

   abstract function trigger( gi_parse_Scanner $scanner ); 

   function term() {
      return true;
   } 

   // Закрытые и защищенные функции 

   protected function invokeHandler( gi_parse_Scanner $scanner ) { 
      if ( ! empty( $this->handler ) ) {
         $this->report( "calling handler: " 
                       . get_class( $this->handler ) );
         $this->handler->handleMatch( $this, $scanner ); 
      }
   } 

   protected function report( $msg ) {
      if ( self::$debug ) {
         print "<{$this->name}> " . get_class( $this ) . ": $msg\n";
      }
   } 

   protected function push( gi_parse_Scanner $scanner ) {
      $context = $scanner->getContext();
      $context->pushResult( $scanner->token() ); 
   } 

   abstract protected function doScan( gi_parse_Scanner $scan );
}


?>