<?php

// В этом оконечном анализаторе проверяется совпадение
// со строковым литералом
class gi_parse_StringLiteralParse extends gi_parse_Parser { 

   function trigger( gi_parse_Scanner $scanner ) {
      return ( $scanner->tokenType() == gi_parse_Scanner::APOS ||
               $scanner->tokenType() == gi_parse_Scanner::QUOTE );
   } 

   protected function push( gi_parse_Scanner $scanner ) {
      return;
   } 

   protected function doScan( gi_parse_Scanner $scanner ) {
      $quotechar = $scanner->tokenType();
      $ret = false;
      $string = "";
      while ( $token = $scanner->nextToken() ) { 
         if ( $token == $quotechar ) {
            $ret = true;
            break; 
         } 
         $string .= $scanner->token();
      } 
      if ( $string && ! $this->discard ) {
         $scanner->getContext()->pushResult( $string );
      } 
      return $ret;
   }
} 



?>