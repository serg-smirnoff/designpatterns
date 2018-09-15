<?php


class gi_parse_SequenceParse extends gi_parse_CollectionParse { 

   function trigger( gi_parse_Scanner $scanner ) { 
      if ( empty( $this->parsers ) ) { 
         return false; 
      } 
      return $this->parsers[0]->trigger( $scanner ); 
   } 

   protected function doScan( gi_parse_Scanner $scanner ) { 
      $start_state = $scanner->getState(); 
      foreach( $this->parsers as $parser ) { 
         if ( ! ( $parser->trigger( $scanner ) && 
                  $scan=$parser->scan( $scanner )) ) { 
            $scanner->setState( $start_state ); 
            return false; 
         } 
     } 
     return true; 
   }
} 




?>