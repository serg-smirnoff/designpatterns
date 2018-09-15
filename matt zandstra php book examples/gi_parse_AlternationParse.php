<?php


// Здесь достигается совпадение, если один или другой
// вложенный анализатор достигает совпадения.
class gi_parse_AlternationParse extends gi_parse_CollectionParse { 

   function trigger( gi_parse_Scanner $scanner ) {
      foreach ( $this->parsers as $parser ) {
         if ( $parser->trigger( $scanner ) ) {
            return true; 
         }
       }
       return false; 
   } 

   protected function doScan( gi_parse_Scanner $scanner ) {
      $type = $scanner->tokenType();
      foreach ( $this->parsers as $parser ) { 
         $start_state = $scanner->getState(); 
         if ( $type == $parser->trigger( $scanner ) &&
              $parser->scan( $scanner ) ) {
            return true; 
         }
      }
      $scanner->setState( $start_state );
      return false; 
   }
} 



?>